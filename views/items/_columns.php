<?php
use yii\helpers\Url;

use yii\helpers\Html;
return [
   /* [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],*/
[
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'commit',
'format'=>'raw',
'value'=>function($model,$key,$w){
	$cn =$model->getComments()->count();
return Html::a('<i class="glyphicon glyphicon-comment"></i>&nbsp; '.($cn>0?Html::tag('span',$cn,['class'=>'badge']):''.$cn),
                                ["comment",'id'=>$model->id],['role'=>'modal-remote','class'=>'pull-left'] ).
Html::a('<i class="glyphicon glyphicon-check"></i>&nbsp; '.(Html::tag('span','',['class'=>'badge'])),
                                ["commit",'id'=>$model->id],['role'=>'modal-remote','class'=>'pull-right'] );
}
     ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'name',
    ],
'formatedPrice',
   // 'receipt.date_time',
[
'group'=>true,
'value'=>function($model,$val,$key){
	
return Yii::$app->formatter->asDate($model->receipt->date_time, 'php:d.m.Y h:i:s');
}

],
[
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'receipt.user',
'group'=>true
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
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   