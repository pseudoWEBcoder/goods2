<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\finpix\ReceiptItem */

$this->title = 'Create Receipt Item';
$this->params['breadcrumbs'][] = ['label' => 'Receipt Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receipt-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
