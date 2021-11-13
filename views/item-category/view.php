<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ItemCategory */
?>
<div class="item-category-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'item_id',
            'category_id',
        ],
    ]) ?>

</div>
