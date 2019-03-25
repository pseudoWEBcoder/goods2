<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searches\ItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created') ?>

    <?= $form->field($model, 'updated') ?>

    <?= $form->field($model, 'quantity') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'nds_sum') ?>

    <?php // echo $form->field($model, 'nds_rate') ?>

    <?php // echo $form->field($model, 'sum') ?>

    <?php // echo $form->field($model, 'receipt_id') ?>

    <?php // echo $form->field($model, 'nds18') ?>

    <?php // echo $form->field($model, 'nds10') ?>

    <?php // echo $form->field($model, 'calculation_type_sign') ?>

    <?php // echo $form->field($model, 'calculation_subject_sign') ?>

    <?php // echo $form->field($model, 'modifiers') ?>

    <?php // echo $form->field($model, 'nds_no') ?>

    <?php // echo $form->field($model, 'payment_type') ?>

    <?php // echo $form->field($model, 'nds') ?>

    <?php // echo $form->field($model, 'nds_calculated10') ?>

    <?php // echo $form->field($model, 'nds_calculated18') ?>

    <?php // echo $form->field($model, 'properties') ?>

    <?php // echo $form->field($model, 'payment_agent_by_product_type') ?>

    <?php // echo $form->field($model, 'product_type') ?>

    <?php // echo $form->field($model, 'excise') ?>

    <?php // echo $form->field($model, 'commit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
