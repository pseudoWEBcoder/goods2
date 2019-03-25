<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\finpix\ReceiptItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receipt-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_guid')->textInput() ?>

    <?= $form->field($model, 'transaction_id')->textInput() ?>

    <?= $form->field($model, 'item_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'item_cost')->textInput() ?>

    <?= $form->field($model, 'item_discount')->textInput() ?>

    <?= $form->field($model, 'item_price')->textInput() ?>

    <?= $form->field($model, 'item_amount')->textInput() ?>

    <?= $form->field($model, 'item_pos')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'locally_changed')->textInput() ?>

    <?= $form->field($model, 'server_timestamp')->textInput() ?>

    <?= $form->field($model, 'deleted')->textInput() ?>

    <?= $form->field($model, 'item_exported')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
