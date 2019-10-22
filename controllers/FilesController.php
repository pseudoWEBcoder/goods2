<?php

namespace app\controllers;

use Yii;
use app\models\finpix\Tranzaction;
use app\models\finpix\TranzactionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\FileHelper;
use yii\helpers\Html;

/**
 * FinpixController implements the CRUD actions for Tranzaction model.
 */
class FilesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
public function actionGetfile($name){
	
	
	$f= realpath($i='/sdcard/DCIM/Camera/стиралка/'.$name);
	
	\Yii::$app->response->format = yii\web\Response::FORMAT_RAW;
	 \Yii::$app->response->headers->add('content-type','image/jpg');
	 \Yii::$app->response->data = file_get_contents($f); 
	return \Yii::$app->response;
//	var_dump($name, $f,  $i); 
//	die(__FILE__);
return Yii::$app->response->sendFile($f);
}
    /**
     * Lists all Tranzaction models.
     * @return mixed
     */
    public function actionIndex()
    {
	$found =FileHelper::findFiles('/sdcard/DCIM/Camera/стиралка');
	foreach($found as $k=>$v)
{	$arr[$k]['name']=basename($v);
	$arr[$k]['realpath']=realpath($v);
	
		$arr[$k]['date']=fileatime($arr[$k]['realpath']);
		}/*
		usort($arr, function ($a,  $b) {
		return ($a['date' ]> $b['date']); 
		});*/
   $dataProvider = new ArrayDataProvider([
 'allModels' => $arr,
     'sort' => [
          'attributes' => ['date', 'name'],
     ],
     'pagination' => [
         'pageSize' => 10,
     ],
]);



return $this->render('index', [
        //    'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
'gridColumns'=>['date:datetime',
[ 'attribute'=>'name', 'value'=>function ($model, $key, $index, $widget) { 
   return Html::a($model['name'], ['/files/getfile','name'=>$model['name']]); 
}, 
//'filterType'=>GridView::FILTER_COLOR, 
'vAlign'=>'middle', 
'format'=>'raw', 
'width'=>'150px', 
'noWrap'=>true ],
],
'responsive'=>false
        ]);
    }

    /**
     * Displays a single Tranzaction model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tranzaction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tranzaction();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tranzaction model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tranzaction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tranzaction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tranzaction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tranzaction::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
