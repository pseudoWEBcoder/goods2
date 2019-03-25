<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\finpix\ReceiptItem */

$this->title = $model->_id;
$this->params['breadcrumbs'][] = ['label' => 'Receipt Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="receipt-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_id',
            'item_guid',
            'transaction_id',
            'item_name:ntext',
            'item_cost',
            'item_discount',
            'item_price',
            'item_amount',
            'item_pos',
            'category_id',
            'locally_changed',
            'server_timestamp:datetime',
            'deleted',
            'item_exported',
        ],
    ]) ?>

</div>
