<?php

use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $model app\models\Items */
VarDumper::dump(Yii::$app->formatter->timeZone);
?>
<div class="items-view">
<?=
DetailView::widget([
 'model' => $model,
 'attributes' => [
 'id',
 'created',
 'updated',
 'quantity',
 'price',
 'name:ntext',
 'nds_sum',
 'nds_rate',
 'sum',
 [
'attribute'=> 'receipt_id',
'format'=>'html',
'value'=>Html::a($u=Url::toRoute(['/receipt/view','id'=>$model->receipt_id]),
$u,['role'=>'modal-remote'])],
 'nds18',
 'nds10',
 'calculation_type_sign',
 'calculation_subject_sign',
 'modifiers:ntext',
 'nds_no',
 'payment_type',
 'nds',
 'nds_calculated10',
 'nds_calculated18',
 'properties:ntext',
 'payment_agent_by_product_type',
 'product_type',
 'excise',
 'commit',
 ],
'template' => function($attribute, $index, $widget){ 
//your code for rendering here. e.g. 
	if($attribute['value']) {
 return "<tr><th>{$attribute['label']}</th><td>{$attribute['value']}</td></tr>"; 
} 
}
 ]) ?>
</div>