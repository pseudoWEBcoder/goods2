<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\ItemStatuses */
/* @var $form yii\widgets\ActiveForm */
$rf = new ReflectionClass('\kartik\grid\GridView');
?>

<div class="item-statuses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'color')->textarea(['rows' => 6]) ?>
    <p>стутсы могут быть:</p>
    <pre><?= var_export($rf->getConstants(), 1) ?></pre>
    <?= $form->field($model, 'icon')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'updated')->textInput() ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
