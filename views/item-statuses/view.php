<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ItemStatuses */
?>
<div class="item-statuses-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text:ntext',
            'color:ntext',
            'icon:ntext',
            'updated',
        ],
    ]) ?>

</div>
