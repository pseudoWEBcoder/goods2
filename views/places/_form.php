<?php

use kartik\builder\Form;
use kartik\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Places $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="places-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
    echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'created' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Созданный...']],

            'updated' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Обновлено...']],

            'description' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => 'Enter Description...', 'rows' => 6]],

            'name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Имя...', 'maxlength' => 255]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
