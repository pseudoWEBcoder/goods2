<?php

namespace app\controllers;

use app\Helpers\DaDataHelper;
use app\models\ContactForm;
use app\models\Items;
use app\models\LoginForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class ChartController extends Controller
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
        $query =  Items::find()->joinWith(['receipt'/*, 'comments'*/])->orderBy(['receipt.date_time' => SORT_DESC])->asArray()->limit(null)->select(['receipt.date_time',  'name',  'price']);
        $all = ($query)->all();
        foreach ($all as $index => $item) {
            $time = \DateTime::createFromFormat('Y-m-d\TH:i:s', $item/*["receipt"]*/["date_time"]);
            if ($time) {
                $ts = $time->format('U');
                $data[] = ['t' => $ts*1000, 'y' => $item['price'] / 100, 'tix' => $item['name'],  'd'=>$item["date_time"]];

            }
        }
        return $this->render('index', compact('data',  'query'));
    }


}
