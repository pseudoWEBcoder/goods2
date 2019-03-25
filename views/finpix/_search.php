<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\finpix\TranzactionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tranzaction-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'transaction_guid') ?>

    <?= $form->field($model, 'transaction_datetime') ?>

    <?= $form->field($model, 'transaction_datetime_000') ?>

    <?= $form->field($model, 'budget_id') ?>

    <?php // echo $form->field($model, 'transaction_type') ?>

    <?php // echo $form->field($model, 'from_account_id') ?>

    <?php // echo $form->field($model, 'to_account_id') ?>

    <?php // echo $form->field($model, 'from_currency3') ?>

    <?php // echo $form->field($model, 'to_currency3') ?>

    <?php // echo $form->field($model, 'from_value') ?>

    <?php // echo $form->field($model, 'to_value') ?>

    <?php // echo $form->field($model, 'is_planned') ?>

    <?php // echo $form->field($model, 'seller_id') ?>

    <?php // echo $form->field($model, 'seller_name') ?>

    <?php // echo $form->field($model, 'seller_sms_name') ?>

    <?php // echo $form->field($model, 'source_id') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'image_file_name') ?>

    <?php // echo $form->field($model, 'raw') ?>

    <?php // echo $form->field($model, 'locked') ?>

    <?php // echo $form->field($model, 'locally_changed') ?>

    <?php // echo $form->field($model, 'server_timestamp') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <?php // echo $form->field($model, 'exported') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
