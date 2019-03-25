<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Items */
/* @var $form ActiveForm */
?>
<div class="CommitForm">

    <?php $form = ActiveForm::begin(); /*?>

        <?= $form->field($model, 'created') ?>
        <?= $form->field($model, 'updated') ?>
        <?= $form->field($model, 'price') ?>
        <?= $form->field($model, 'nds_sum') ?>
        <?= $form->field($model, 'nds_rate') ?>
        <?= $form->field($model, 'sum') ?>
        <?= $form->field($model, 'receipt_id') ?>
        <?= $form->field($model, 'nds18') ?>
        <?= $form->field($model, 'nds10') ?>
        <?= $form->field($model, 'calculation_type_sign') ?>
        <?= $form->field($model, 'calculation_subject_sign') ?>
        <?= $form->field($model, 'nds_no') ?>
        <?= $form->field($model, 'payment_type') ?>
        <?= $form->field($model, 'nds') ?>
        <?= $form->field($model, 'nds_calculated10') ?>
        <?= $form->field($model, 'nds_calculated18') ?>
        <?= $form->field($model, 'payment_agent_by_product_type') ?>
        <?= $form->field($model, 'product_type') ?>
        <?= $form->field($model, 'excise') ?>
     
        <?= $form->field($model, 'quantity') ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'modifiers') ?>
        <?= $form->field($model, 'properties') ?>
       <?= $form->field($model, 'commit') */?>
<?= $form->field($model, 'commit', [/*'inline'=>true,'enableLabel'=>false*/]) ->radioList(
array_merge([time()=>'OK'],$model->commitStatuses),
 [ 'id' => 'blog_type', 'class' => 'btn-group', 
'data-toggle' => 'buttons',
 'unselect' => null,
 'item' => function ($index, $label, $name, $checked, $value) {
 return '<label class="btn btn-primary' . 
($checked ? ' active' : '') . '">' . Html::radio($name, $checked, ['value' => $value, 'class' => 'project-status-btn']) . $label . '</label>'; }, ]);
 /*?>

        <div class="form-group">
            <?= */Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- CommitForm -->
