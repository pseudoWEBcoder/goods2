<?php

namespace app\controllers;

use app\models\Category;
use app\models\Comment;
use app\models\CommentSearch;
use app\models\ItemCategory;
use app\models\Items;
use app\models\ItemsSearch;
use app\models\ItemStatuses;
use kartik\grid\EditableColumnAction;
use Yii;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * ItemsController implements the CRUD actions for Items model.
 */
class ItemsController extends Controller
{
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'edititem' => [                                       // identifier for your editable action
                'class' => EditableColumnAction::className(),     // action class name
                'modelClass' => Items::className(),                // the update model class
                'outputValue' => function ($model, $attribute, $key, $index) {
                    $fmt = Yii::$app->formatter;
                    $value = $model->$attribute;                 // your attribute value
                    if ($attribute === 'buy_amount') {           // selective validation by attribute
                        return $fmt->asDecimal($value, 2);       // return formatted value if desired
                    } elseif ($attribute === 'publish_date') {   // selective validation by attribute
                        return $fmt->asDate($value, 'php:Y-m-d');// return formatted value if desired
                    } elseif ($attribute === 'place_id') {
                        $value = $model->place->name;
                        return $value;
                    } elseif ($attribute === 'category') {
                        //$value = $model->category_ids = [$value];
                        return $value;
                    } elseif ($attribute === 'category_ids') {
                        $value = ArrayHelper::getColumn($all = ItemCategory::find()->where(['item_id' => $model->id])->with(['category'])->all(), 'category.text');
                        return implode(PHP_EOL, is_array($value) ? $value : []);
                    }
                    return '';                                   // empty is same as $value
                },
                'outputMessage' => function ($model, $attribute, $key, $index) {
                    if (isset($_POST["Items"][$index]["category_ids"]))
                        foreach ($_POST["Items"][$index]["category_ids"] as $index => $category_id) {
                            if (is_numeric($category_id))
                                continue;/* отлично эта сама создастся */
                            else {
                                $exists = Category::find()->where(['text' => $category_id])->exists();
                                if (!$exists) {
                                    $category = new Category (['text' => $category_id]);
                                    if ($category->save()) {
                                        $itemcategory = new ItemCategory(['item_id' => $model->id, 'category_id' => $category->id]);
                                        $itemcategory->save();
                                        $model->refresh();
                                    }
                                }
                            }
                        }
                    return '';                                  // any custom error after model save
                },
                // 'showModelErrors' => true,                     // show model errors after save
                // 'errorOptions' => ['header' => '']             // error summary HTML options
                // 'postOnly' => true,
                // 'ajaxOnly' => true,
                // 'findModel' => function($id, $action) {},
                // 'checkAccess' => function($action, $model) {}
            ]
        ]);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Items models.
     * @return mixed
     */
    public function actionIndex()
    {
        Url::remember(Url::current());
        $searchModel = new ItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//receipt.date_time
        $dataProvider->query->joinWith(['receipt', 'comments'])->orderBy(['receipt.date_time' => SORT_DESC]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDetail()
    {
        if (isset($_POST['expandRowKey'])) {
            $model = \app\models\Items::findOne($_POST['expandRowKey']);
            return $this->renderPartial('view', ['model' => $model]);
        } else {
            return '<div class="alert alert-danger">No data found</div>';
        }
    }

    public function actionJson($q = null, $id = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query();
            $query->select('id, name AS text')
                ->from(Items::tableName())
                ->where(['like', 'name', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Items::find($id)->name];
        }
        return $out;
    }

    public function actionCommit($id, $status = null)
    {
//Yii::$app->response='json';
        $model = $this->findModel($id);
//$debug=var_export($_POST,1);
//return $this->renderAjax($debug);
//die(__FILE__.__LINE__);
        $model->commit = time();
        $model->status_id = ItemStatuses::STATUS_OK;/*OK*/
        if ($status == 'fail')
            $model->status_id = ItemStatuses::STATUS_FAIL;/*OK*/
        if ($status == 'open')
            $model->status_id = ItemStatuses::STATUS_OPEN;/*OPEN*/
        if ($status == 'mark')
            $model->status_id = ItemStatuses::STATUS_MARK;/*MARK*/
        if ($model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);

            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];

            return $this->redirect(['items/index']);

        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Items model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "Items #" . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    public function actionCommit1($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "commit \"" . $model->name . '"',
                    'content' => $this->renderAjax('CommitForm', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Items #" . $id,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
//	return implode($model->getErrors());
                return [
                    'title' => "Update Items #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }


    /**
     * Creates a new Items model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Items();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Create new Items",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new Items",
                    'content' => '<span class="text-success">Create Items success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
            } else {
                return [
                    'title' => "Create new Items",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

    }

    public function actionComment()
    {
        $request = Yii::$app->request;
        $model = $this->findModel($request->get('id'));
        $comment = new Comment;

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                $searchModel = new CommentSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andWhere(['items_id' => $model->id])->addOrderBy(['time' => SORT_DESC]);
                return [
                    'title' => ($title = "комментарии к  " . $model->name),
                    'content' => $this->renderAjax('/comment/create', [
                            'model' => $comment,
                            'item' => $model,
                            'title' => $title
                        ]) . $this->renderAjax('/comment/list', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                        ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($comment->load($request->post()) && $comment->validate()) {
                $comment->link('items', $model);
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new comment post" . __LINE__,
                    'content' => '<span class="text-success">Create Items success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
            } else {
                return [
                    'title' => "Create new comment" . implode(PHP_EOL, ['comment' => $comment->getErrors(), 'model' => $model->getErrors()]) . __LINE__,
                    'content' => $this->renderAjax('/comment/create', [
                        'model' => $comment,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('/comment/create', [
                    'model' => $comment,
                ]);
            }
        }

    }

    /**
     * Updates an existing Items model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Update Items #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Items #" . $id,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Update Items #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Items model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $model->commit = null;
        $model->status_id = null;
        $model->save();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

    /**
     * Delete multiple existing Items model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }

    }

    /**
     * Finds the Items model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Items the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Items::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
