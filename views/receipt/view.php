<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Receipt */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Receipts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="receipt-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created',
            'updated',
            'commit',
            'user_inn:ntext',
            'fiscal_document_number',
            'fiscal_sign:ntext',
            'operator:ntext',
            'total_sum',
            'nds_no',
            'shift_number',
            'fiscal_drive_number:ntext',
            'counter_submission_sum',
            'taxation_type',
            'kkt_reg_id:ntext',
            'date_time',
            'ecash_total_sum',
            'prepayment_sum',
            'cash_total_sum',
            'postpayment_sum',
            'request_number',
            'operation_type',
            'receipt_code',
            'user:ntext',
            'message_fiscal_sign:ntext',
            'raw_data:ntext',
            'nds18',
            'nds10',
            'fns_url:ntext',
            'operator_inn:ntext',
            'modifiers:ntext',
            'retail_place_address:ntext',
            'storno_items:ntext',
            'retail_place:ntext',
            'prepaid_sum',
            'internet_sign',
            'fns_site:ntext',
            'machine_number:ntext',
            'seller_address:ntext',
            'fiscal_document_format_ver',
            'provision_sum',
            'buyer_address:ntext',
            'payment_agent_type',
            'properties_user:ntext',
            'credit_sum',
            'address_to_check_fiscal_sign:ntext',
            'sender_address:ntext',
            'nds_calculated10',
            'user_property:ntext',
            'properties:ntext',
            'nds_calculated18',
            'message:ntext',
            'authority_uri:ntext',
            'protocol_version',
            'operator_transfer_address:ntext',
            'buyer_phone_or_address:ntext',
            'provider_phone:ntext',
            'operator_phone_to_transfer:ntext',
            'code',
            'retail_address:ntext',
            'operator_transfer_inn:ntext',
            'operator_to_receive_phone:ntext',
            'operator_transfer_name:ntext',
            'payment_agent_operation:ntext',
            'payment_agent_phone:ntext',
        ],
'template' => function($attribute, $index, $widget){ 
//your code for rendering here. e.g. 
	if($attribute['value']) {
 return "<tr><th>{$attribute['label']}</th><td>{$attribute['value']}</td></tr>"; 
} 
}

    ]) ;?>
<?php 
$args=['items/index','ItemsSearch'=>['receipt_id'=>$model->id]];
echo Html::a('все товары в чеке',Url::toRoute($args))?>

</div>
