<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searches\ItemCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Item Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'item_id',
//            'category_id',

            ['attribute' => 'item_name',
                'label' => 'товар',
                'value' => function ($model) {
                    return $model->item->name;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'ajax' => [
                            'url' => Url::to(['/items/json']),
                            'dataType' => 'json',
                            'data' => new \yii\web\JsExpression('function(params) { return {q:params.term}; }')
                        ]
                    ]
                ],
                //  'filter' => \yii\helpers\ArrayHelper::map(\app\models\Items::find()->asArray()->all(), 'id', 'name')
            ], ['attribute' => 'category_name',
                'label' => 'категория',
                'value' => function ($model) {
                    return $model->category->text;
                },
                'filterType' => GridView::FILTER_SELECT2,

                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Category::find()->asArray()->all(), 'id', 'text')
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
