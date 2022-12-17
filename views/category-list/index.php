<?php

use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\searches\CategorySearch $searchModel
 */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Category', ['create'], ['class' => 'btn btn-success'])*/ ?>
    </p>

    <?php Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'time:datetime',
            'text:ntext',
            [
                'attribute' => 'items',
                'label' => 'товары',
                'format' => 'raw',
                'value' => function ($model) {
                    $cn = count($model->items);

                    return $cn ? \yii\bootstrap\Collapse::widget([
                        'items' => [
                            'количество' => $cn,
//                'Second panel' => [
//                    'content' => 'This is the second collapsable menu',
//                ],
                            [
                                'label' => 'список',
                                'content' => Html::ol(ArrayHelper::map($model->items, 'id', function ($model) {
                                    return Html::a($model->name, ['/items', 'ItemsSearch' => ['id' => $model->id]]);
                                }), ['encode' => false])
                            ], [
                                'label' => 'сумма',
                                'content' => Html::tag('p', number_format(array_sum($arr = ArrayHelper::map($model->items, 'id', function ($model) {
                                        return $model->sum * 1;
                                    })) / 100, 0, '.', ' '))
                            ],
                        ]
                    ]) : null;

                }

            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['category-list/view', 'id' => $model->id, 'edit' => 't']),
                            ['title' => Yii::t('yii', 'Edit'),]
                        );
                    }
                ],
            ],
        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,

        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ' . Html::encode($this->title) . ' </h3>',
            'type' => 'info',
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]);
    Pjax::end(); ?>

</div>
