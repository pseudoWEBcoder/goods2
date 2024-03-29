<?php

use kartik\builder\Form;
use kartik\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Notes $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="notes-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
    echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            // 'author_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Author ID...']],

            //  'created' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Created...']],

            //  'updated' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Updated...']],
            'title' => ['type' => Form::INPUT_TEXT, 'options' => []],
            'body' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => 'kartik\editors\Summernote', 'options' => []],


        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
