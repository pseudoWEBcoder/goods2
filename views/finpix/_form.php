<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\finpix\Tranzaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tranzaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'transaction_guid')->textInput() ?>

    <?= $form->field($model, 'transaction_datetime')->textInput() ?>

    <?= $form->field($model, 'transaction_datetime_000')->textInput() ?>

    <?= $form->field($model, 'budget_id')->textInput() ?>

    <?= $form->field($model, 'transaction_type')->textInput() ?>

    <?= $form->field($model, 'from_account_id')->textInput() ?>

    <?= $form->field($model, 'to_account_id')->textInput() ?>

    <?= $form->field($model, 'from_currency3')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'to_currency3')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'from_value')->textInput() ?>

    <?= $form->field($model, 'to_value')->textInput() ?>

    <?= $form->field($model, 'is_planned')->textInput() ?>

    <?= $form->field($model, 'seller_id')->textInput() ?>

    <?= $form->field($model, 'seller_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seller_sms_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'source_id')->textInput() ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'latitude')->textInput() ?>

    <?= $form->field($model, 'longitude')->textInput() ?>

    <?= $form->field($model, 'image_file_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'raw')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'locked')->textInput() ?>

    <?= $form->field($model, 'locally_changed')->textInput() ?>

    <?= $form->field($model, 'server_timestamp')->textInput() ?>

    <?= $form->field($model, 'deleted')->textInput() ?>

    <?= $form->field($model, 'exported')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
