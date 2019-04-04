<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemsHistory */

$this->title = 'Create Items History';
$this->params['breadcrumbs'][] = ['label' => 'Items Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
