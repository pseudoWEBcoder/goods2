<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- --><? /*= $form->field($model, 'time')->textInput() */ ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <!-- --><? /*= $form->field($model, 'items_id')->textInput() */ ?>

    <div class="form-group">
        <? /*= Html::submitButton('Save', ['class' => 'btn btn-success']) */ ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
