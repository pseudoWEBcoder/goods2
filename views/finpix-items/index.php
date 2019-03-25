<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\finpix\ReceiptItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receipt Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receipt-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Receipt Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            '_id',
            'item_guid',
            'transaction_id',
            'item_name:ntext',
            'item_cost',
            //'item_discount',
            //'item_price',
            //'item_amount',
            //'item_pos',
            //'category_id',
            //'locally_changed',
            //'server_timestamp:datetime',
            //'deleted',
            //'item_exported',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
