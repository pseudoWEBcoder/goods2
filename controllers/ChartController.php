<?php

namespace app\controllers;

use app\models\ChartFilters;
use app\models\Items;
use Yii;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

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
    public function actionAverage()
    {
        $model = new  ChartFilters();
        $data = [];
        $query = Items::find()->joinWith(['receipt'/*, 'comments'*/])->orderBy(['receipt.date_time' => SORT_DESC])->asArray()->limit(null)->select([
            'date_min' => new  Expression('(receipt.date_time)'),
            'date_max' => new  Expression('max(receipt.date_time)'),
            'total_sum' => new  Expression('sum(`total_sum`)'),
            'count' => new  Expression('count(*)'),
            'd' => 'strftime(\'%d\',`receipt`.`date_time`)*1',
            'm' => 'strftime(\'%m\',`receipt`.`date_time`)*1',
            'y' => 'strftime(\'%Y\',`receipt`.`date_time`)*1'
        ])->where(['and', ['y' => 2019], ['m' => [3]]])->asArray()->groupBy(['Y', 'm', 'd'])->orderBy(['d' => SORT_ASC, 'm' => SORT_ASC, 'y' => SORT_ASC]);
        $model->filter(Yii::$app->request->get(), $query);
        $all = ($query)->all();

        foreach ($all as $index => $item) {
            $time = \DateTime::createFromFormat('Y-m-d\TH:i:s', $strdate = "{$item['y']}-{$item['m']}-{$item['d']}T00:00:00");
            $grouped[$item['y']][$item['m']][$item['d']] = $item;
            if ($time) {
                $ts = $time->format('U');
                $data[] = ['t' => $ts * 1000, 'y' => $item['total_sum'] / 100, 'tix' => $item['count'], 'd' => $strdate];

            }
        }
//        foreach ($grouped as $index => &$item) {
//            ksort($item);
//            foreach ($item as $key => &$value) {
//                ksort($value,  SORT_NUMERIC );
//            }
//       }

        $grouped = $grouped[date('Y')];
        return $this->render('avg', compact('data', 'query', 'model', 'grouped'));
    }


    public function actionIndex()
    {
        $model = new  ChartFilters();
        $data = [];
        $query = Items::find()->joinWith(['receipt'/*, 'comments'*/])->orderBy(['receipt.date_time' => SORT_DESC])->asArray()->limit(null)->select(['receipt.date_time', 'name', 'price']);
        $model->filter(Yii::$app->request->get(), $query);
        $all = ($query)->all();

        foreach ($all as $index => $item) {
            $time = \DateTime::createFromFormat('Y-m-d\TH:i:s', $item/*["receipt"]*/ ["date_time"]);
            if ($time) {
                $ts = $time->format('U');
                $data[] = ['t' => $ts * 1000, 'y' => $item['price'] / 100, 'tix' => $item['name'], 'd' => $item["date_time"]];

            }
        }
        return $this->render('index', compact('data', 'query', 'model'));
    }


}
