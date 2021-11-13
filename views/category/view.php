<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
?>
<div class="category-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'time:datetime',
            'text:ntext',
        ],
    ]) ?>

</div>
