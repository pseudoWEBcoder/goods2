<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

return [
    /* [
         'class' => 'kartik\grid\CheckboxColumn',
         'width' => '20px',
     ],*/
    [
        'class' => 'kartik\grid\ExpandRowColumn',
        'width' => '50px',
        'value' => function ($model, $key, $index, $column) {
            return GridView::ROW_COLLAPSED;
        },
        // uncomment below and comment detail if you need to render via ajax
        'detailUrl' => Url::to(['/items/detail']),

        'headerOptions' => ['class' => 'kartik-sheet-style'],
        'expandOneOnly' => true
    ],
    [

        'format' => 'raw',
        'attribute' => 'status_id',
        //'filter' => ['да', 'нет'],
        'filter' => \app\models\ItemStatuses::find()->select(['text', 'text'])->indexBy('id')->column(),
        'value' => /**
         * @param $model \app\models\Items
         * @param $key
         * @param $w
         */
            function ($model, $key, $w) {
                return Html::tag('i', null, ['class' => $model->status->icon]);
            }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'format' => 'raw',
        'value' => /**
         * @param $model \app\models\Items
         * @param $key
         * @param $w
         */
            function ($model, $key, $w) {
                $images = $model->getImages();
                //  foreach($images as $img) {
                //retun url to full image
                $a = Html::a(Html::img($images[0]->getUrl('30x30')), $images[0]->getUrl(), ['rel' => 'fancybox', 'title' => $model->name]);
                return $a;
//}
            }

    ], 'id',
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'commit',
        'format' => 'raw',
        'value' => function ($model, $key, $w) {
            $cn = $model->getComments()->count();
            return
                Html::a('<i class="glyphicon glyphicon-comment"></i>&nbsp; ' . ($cn > 0 ? Html::tag('span', $cn, ['class' => 'badge']) : '' . $cn), ["comment", 'id' => $model->id], ['role' => 'modal-remote', 'class' => 'pull-left'])
                . Html::a('<i class="glyphicon glyphicon-open"></i>&nbsp; ' . (Html::tag('span', '', ['class' => 'badge'])), ["commit", 'id' => $model->id, 'status' => 'open'], ['role' => 'modal-remote', 'class' => 'pull-right'])
                . Html::a('<i class="glyphicon glyphicon-remove"></i>&nbsp; ' . (Html::tag('span', '', ['class' => 'badge'])), ["commit", 'id' => $model->id, 'status' => 'fail'], ['role' => 'modal-remote', 'class' => 'pull-right text-danger'])
                .
                Html::a('<i class="glyphicon glyphicon-check"></i>&nbsp; ' . (Html::tag('span', '', ['class' => 'badge'])), ["commit", 'id' => $model->id], ['role' => 'modal-remote', 'class' => 'pull-right text-success']) .
                ($model->status_id == \app\models\ItemStatuses::STATUS_MARK ? '' : Html::a('<i class="glyphicon glyphicon-barcode"></i>&nbsp; ' . (Html::tag('span', '', ['class' => 'badge'])), ["commit", 'id' => $model->id, 'status' => 'mark'], ['role' => 'modal-remote', 'class' => 'pull-right text-muted']));
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'name',
        'format' => 'raw',
        'value' => function ($model, $val, $key) {

            return $model->quantity == 1 ? $model->name : $model->name . ' <span class="text-info"> ' . ($model->price / 100) . '&nbsp;&times;&nbsp;' . $model->quantity . '&nbsp;=&nbsp;' . (($model->price / 100) * $model->quantity) . '</span>';
        }
    ],
    // 'formatedPrice',
    'formatedSum',

    ['attribute' => 'formatedTotalSum', 'group' => true],
    // 'receipt.date_time',
    [
        'group' => true,
        'value' => function ($model, $val, $key) {

            return Yii::$app->formatter->asDate($model->receipt->date_time, 'php:d.m.Y h:i:s');
        }

    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'receipt.user',
        'group' => true
    ],
    /*  [
          'class' => 'kartik\grid\SerialColumn',
          'width' => '30px',
      ],*/
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    /*  [
          'class'=>'\kartik\grid\DataColumn',
          'attribute'=>'created',
      ],
      [
          'class'=>'\kartik\grid\DataColumn',
          'attribute'=>'updated',
      ],
      [
          'class'=>'\kartik\grid\DataColumn',
          'attribute'=>'quantity',
      ],
      [
          'class'=>'\kartik\grid\DataColumn',
          'attribute'=>'price',
      ],*/

    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'nds_sum',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'nds_rate',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'sum',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'receipt_id',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'nds18',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'nds10',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'calculation_type_sign',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'calculation_subject_sign',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'modifiers',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'nds_no',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'payment_type',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'nds',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'nds_calculated10',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'nds_calculated18',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'properties',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'payment_agent_by_product_type',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'product_type',
    // ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'excise',
    // ],

    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false,// for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'],
    ],

];   