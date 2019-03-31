<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Items */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'updated')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nds_sum')->textInput() ?>

    <?= $form->field($model, 'nds_rate')->textInput() ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <?= $form->field($model, 'receipt_id')->textInput() ?>

    <?= $form->field($model, 'nds18')->textInput() ?>

    <?= $form->field($model, 'nds10')->textInput() ?>

    <?= $form->field($model, 'calculation_type_sign')->textInput() ?>

    <?= $form->field($model, 'calculation_subject_sign')->textInput() ?>

    <?= $form->field($model, 'modifiers')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nds_no')->textInput() ?>

    <?= $form->field($model, 'payment_type')->textInput() ?>

    <?= $form->field($model, 'nds')->textInput() ?>

    <?= $form->field($model, 'nds_calculated10')->textInput() ?>

    <?= $form->field($model, 'nds_calculated18')->textInput() ?>

    <?= $form->field($model, 'properties')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'payment_agent_by_product_type')->textInput() ?>

    <?= $form->field($model, 'product_type')->textInput() ?>

    <?= $form->field($model, 'excise')->textInput() ?>

    <?= $form->field($model, 'commit')->textInput() ?>
    <?= $form->field($model, 'status_id')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\ItemStatuses::find()->all(), 'id', 'text'),
        'options' => ['placeholder' => 'выбрать  статус'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
