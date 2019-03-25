<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\finpix\Tranzaction */

$this->title = $model->_id;
$this->params['breadcrumbs'][] = ['label' => 'Tranzactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tranzaction-view">

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
            'transaction_guid',
            'transaction_datetime:datetime',
            'transaction_datetime_000:datetime',
            'budget_id',
            'transaction_type',
            'from_account_id',
            'to_account_id',
            'from_currency3:ntext',
            'to_currency3:ntext',
            'from_value',
            'to_value',
            'is_planned',
            'seller_id',
            'seller_name:ntext',
            'seller_sms_name:ntext',
            'source_id',
            'notes:ntext',
            'latitude',
            'longitude',
            'image_file_name:ntext',
            'raw:ntext',
            'locked',
            'locally_changed',
            'server_timestamp:datetime',
            'deleted',
            'exported',
        ],
    ]) ?>

</div>
