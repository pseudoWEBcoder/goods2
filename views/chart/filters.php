<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \app\models\ChartFilters */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tranzaction-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'horizontal'
    ]); ?>

    <?= $form->field($model, 'day') ?>

    <?= $form->field($model, 'month')->dropDownList($model::$monthes, ['multiple' => true]) ?>

    <?= $form->field($model, 'year') ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
