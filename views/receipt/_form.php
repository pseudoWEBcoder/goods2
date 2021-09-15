<?php

use app\models\Icons;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Receipt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receipt-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    foreach ($model->icons as $index => $icon) {
        echo Html::img($icon->getUploadUrl('src'), ['class' => 'img-thumbnail']);
    }
    ?>
    <?= $form->field($model, 'icon_ids')->widget(Select2::classname(), [
        'data' => Icons::listAll(),
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => true
        ],
    ]); ?>
    <?php ob_start(); ?>
    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'updated')->textInput() ?>

    <?= $form->field($model, 'commit')->textInput() ?>

    <?= $form->field($model, 'user_inn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fiscal_document_number')->textInput() ?>

    <?= $form->field($model, 'fiscal_sign')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'operator')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'total_sum')->textInput() ?>

    <?= $form->field($model, 'nds_no')->textInput() ?>

    <?= $form->field($model, 'shift_number')->textInput() ?>

    <?= $form->field($model, 'fiscal_drive_number')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'counter_submission_sum')->textInput() ?>

    <?= $form->field($model, 'taxation_type')->textInput() ?>

    <?= $form->field($model, 'kkt_reg_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_time')->textInput() ?>

    <?= $form->field($model, 'ecash_total_sum')->textInput() ?>

    <?= $form->field($model, 'prepayment_sum')->textInput() ?>

    <?= $form->field($model, 'cash_total_sum')->textInput() ?>

    <?= $form->field($model, 'postpayment_sum')->textInput() ?>

    <?= $form->field($model, 'request_number')->textInput() ?>

    <?= $form->field($model, 'operation_type')->textInput() ?>

    <?= $form->field($model, 'receipt_code')->textInput() ?>

    <?= $form->field($model, 'user')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'message_fiscal_sign')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'raw_data')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nds18')->textInput() ?>

    <?= $form->field($model, 'nds10')->textInput() ?>

    <?= $form->field($model, 'fns_url')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'operator_inn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'modifiers')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'retail_place_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'storno_items')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'retail_place')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'prepaid_sum')->textInput() ?>

    <?= $form->field($model, 'internet_sign')->textInput() ?>

    <?= $form->field($model, 'fns_site')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'machine_number')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seller_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fiscal_document_format_ver')->textInput() ?>

    <?= $form->field($model, 'provision_sum')->textInput() ?>

    <?= $form->field($model, 'buyer_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'payment_agent_type')->textInput() ?>

    <?= $form->field($model, 'properties_user')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'credit_sum')->textInput() ?>

    <?= $form->field($model, 'address_to_check_fiscal_sign')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sender_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nds_calculated10')->textInput() ?>

    <?= $form->field($model, 'user_property')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'properties')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nds_calculated18')->textInput() ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'authority_uri')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'protocol_version')->textInput() ?>

    <?= $form->field($model, 'operator_transfer_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'buyer_phone_or_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'provider_phone')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'operator_phone_to_transfer')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'code')->textInput() ?>

    <?= $form->field($model, 'retail_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'operator_transfer_inn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'operator_to_receive_phone')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'operator_transfer_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'payment_agent_operation')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'payment_agent_phone')->textarea(['rows' => 6]) ?>
    <?php echo \yii\bootstrap\Collapse::widget([
        'items' => [
            // equivalent to the above
            [
                'label' => 'больше',
                'content' => ob_get_clean(),
                // open its content by default
                //    'contentOptions' => ['class' => 'in']
            ]
        ]
    ]); ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
