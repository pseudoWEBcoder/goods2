<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\finpix\ReceiptItem */

$this->title = 'Update Receipt Item: ' . $model->_id;
$this->params['breadcrumbs'][] = ['label' => 'Receipt Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', 'id' => $model->_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="receipt-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
