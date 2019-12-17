<?php

namespace app\controllers;

use app\Helpers\DaDataHelper;
use app\models\ContactForm;
use app\models\LoginForm;
use Yii;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionDadata($inn = null)
    {
        header('Content-Type: application/json');
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->formatters = ['json' => [
            'class' => 'yii\web\JsonResponseFormatter',
            'prettyPrint' => true,
            'encodeOptions' =>/*JSON_UNESCAPED_SLASHES | */
                JSON_UNESCAPED_UNICODE,

        ]
        ];
        $found = DaDataHelper::dadata('findById/party', ['query' => $inn, 'count' => 1]);
        return $found;

    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionMigrate()
    {
        $connection = Yii::$app->db;
        $sql1 = file_get_contents(Yii::getAlias('@app/migrations/31-03-2019.sql'));
        $transaction = $connection->beginTransaction();
        try {
            $connection->createCommand($sql1)->execute();
            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
        return $this->render('about');
    }

    public function actionGraph()
    {

        $all = \app\models\Items::find()->JoinWith('receipt')->select(['items.*', 'receipt.*', new Expression("strftime('%s',receipt.date_time)/10 as timestamp")])->asArray()->limit(100)->all();
//echo '<pre>';
        foreach ($all as $i => $v) {
            $time = \DateTime::createFromFormat('Y-m-d\TH:i:s', $v['date_time']);
//die(var_dump([$time,$v]));
            if ($time) {
                $ts = $time->format('U');

                $data[] = ['t' => $ts, 'y' => $v['price'] / 100, 'label' => $v['name']];
            }
        }
//$data=ArrayHelper::map($all,'timestamp','name');
//VarDumper::dump([$data,$all]);
        return $this->render('graph', ['data' => $data]);
    }
}
