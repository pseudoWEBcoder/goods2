<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\finpix\ReceiptItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receipt-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'item_guid') ?>

    <?= $form->field($model, 'transaction_id') ?>

    <?= $form->field($model, 'item_name') ?>

    <?= $form->field($model, 'item_cost') ?>

    <?php // echo $form->field($model, 'item_discount') ?>

    <?php // echo $form->field($model, 'item_price') ?>

    <?php // echo $form->field($model, 'item_amount') ?>

    <?php // echo $form->field($model, 'item_pos') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'locally_changed') ?>

    <?php // echo $form->field($model, 'server_timestamp') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <?php // echo $form->field($model, 'item_exported') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
