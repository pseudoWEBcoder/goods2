<?php

/* @var $this yii\web\View */
use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = 'Json';
?>
<div class="site-index">
<?php
echo GridView::widget([
'id' => 'kv-grid-demo',

'dataProvider' => $dataProvider,

'filterModel' => $searchModel,

'columns' => $gridColumns, // check the configuration for grid columns by clicking button above

'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false

'headerRowOptions' => ['class' => 'kartik-sheet-style'],

'filterRowOptions' => ['class' => 'kartik-sheet-style'],

// 'pjax' => true, // pjax is set to always true for this demo

// set your toolbar

'toolbar' => [

[

'content' =>

Html::button('<i class="fas fa-plus"></i>', [

'class' => 'btn btn-success',

//'title' => Yii::t('kvgrid', 'Add Book'),

'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");'

]) . ' '.

Html::a('<i class="fas fa-redo"></i>', ['grid-demo'], [

'class' => 'btn btn-outline-secondary',

'title'=>'Reset Grid',

'data-pjax' => 0, 

]), 

'options' => ['class' => 'btn-group mr-2']

],

'{export}',

'{toggleData}',

],

'toggleDataContainer' => ['class' => 'btn-group mr-2'],

// set export properties

'export' => [

'fontAwesome' => true

],

// parameters from the demo form

'bordered' => $bordered,

'striped' => $striped,

'condensed' => $condensed,

'responsive' => $responsive,

'hover' => $hover,

'showPageSummary' => $pageSummary,

'panel' => [

'type' => GridView::TYPE_PRIMARY,

'heading' => $heading,

],

'persistResize' => false,

'toggleDataOptions' => ['minCount' => 10],

'exportConfig' => $exportConfig,

'itemLabelSingle' => 'book',

'itemLabelPlural' => 'books'

]);


?>
   
</div>
