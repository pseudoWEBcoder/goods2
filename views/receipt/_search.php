<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searches\ReceiptSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receipt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created') ?>

    <?= $form->field($model, 'updated') ?>

    <?= $form->field($model, 'commit') ?>

    <?= $form->field($model, 'user_inn') ?>

    <?php // echo $form->field($model, 'fiscal_document_number') ?>

    <?php // echo $form->field($model, 'fiscal_sign') ?>

    <?php // echo $form->field($model, 'operator') ?>

    <?php // echo $form->field($model, 'total_sum') ?>

    <?php // echo $form->field($model, 'nds_no') ?>

    <?php // echo $form->field($model, 'shift_number') ?>

    <?php // echo $form->field($model, 'fiscal_drive_number') ?>

    <?php // echo $form->field($model, 'counter_submission_sum') ?>

    <?php // echo $form->field($model, 'taxation_type') ?>

    <?php // echo $form->field($model, 'kkt_reg_id') ?>

    <?php // echo $form->field($model, 'date_time') ?>

    <?php // echo $form->field($model, 'ecash_total_sum') ?>

    <?php // echo $form->field($model, 'prepayment_sum') ?>

    <?php // echo $form->field($model, 'cash_total_sum') ?>

    <?php // echo $form->field($model, 'postpayment_sum') ?>

    <?php // echo $form->field($model, 'request_number') ?>

    <?php // echo $form->field($model, 'operation_type') ?>

    <?php // echo $form->field($model, 'receipt_code') ?>

    <?php // echo $form->field($model, 'user') ?>

    <?php // echo $form->field($model, 'message_fiscal_sign') ?>

    <?php // echo $form->field($model, 'raw_data') ?>

    <?php // echo $form->field($model, 'nds18') ?>

    <?php // echo $form->field($model, 'nds10') ?>

    <?php // echo $form->field($model, 'fns_url') ?>

    <?php // echo $form->field($model, 'operator_inn') ?>

    <?php // echo $form->field($model, 'modifiers') ?>

    <?php // echo $form->field($model, 'retail_place_address') ?>

    <?php // echo $form->field($model, 'storno_items') ?>

    <?php // echo $form->field($model, 'retail_place') ?>

    <?php // echo $form->field($model, 'prepaid_sum') ?>

    <?php // echo $form->field($model, 'internet_sign') ?>

    <?php // echo $form->field($model, 'fns_site') ?>

    <?php // echo $form->field($model, 'machine_number') ?>

    <?php // echo $form->field($model, 'seller_address') ?>

    <?php // echo $form->field($model, 'fiscal_document_format_ver') ?>

    <?php // echo $form->field($model, 'provision_sum') ?>

    <?php // echo $form->field($model, 'buyer_address') ?>

    <?php // echo $form->field($model, 'payment_agent_type') ?>

    <?php // echo $form->field($model, 'properties_user') ?>

    <?php // echo $form->field($model, 'credit_sum') ?>

    <?php // echo $form->field($model, 'address_to_check_fiscal_sign') ?>

    <?php // echo $form->field($model, 'sender_address') ?>

    <?php // echo $form->field($model, 'nds_calculated10') ?>

    <?php // echo $form->field($model, 'user_property') ?>

    <?php // echo $form->field($model, 'properties') ?>

    <?php // echo $form->field($model, 'nds_calculated18') ?>

    <?php // echo $form->field($model, 'message') ?>

    <?php // echo $form->field($model, 'authority_uri') ?>

    <?php // echo $form->field($model, 'protocol_version') ?>

    <?php // echo $form->field($model, 'operator_transfer_address') ?>

    <?php // echo $form->field($model, 'buyer_phone_or_address') ?>

    <?php // echo $form->field($model, 'provider_phone') ?>

    <?php // echo $form->field($model, 'operator_phone_to_transfer') ?>

    <?php // echo $form->field($model, 'code') ?>

    <?php // echo $form->field($model, 'retail_address') ?>

    <?php // echo $form->field($model, 'operator_transfer_inn') ?>

    <?php // echo $form->field($model, 'operator_to_receive_phone') ?>

    <?php // echo $form->field($model, 'operator_transfer_name') ?>

    <?php // echo $form->field($model, 'payment_agent_operation') ?>

    <?php // echo $form->field($model, 'payment_agent_phone') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
