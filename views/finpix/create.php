<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\finpix\Tranzaction */

$this->title = 'Create Tranzaction';
$this->params['breadcrumbs'][] = ['label' => 'Tranzactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tranzaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
