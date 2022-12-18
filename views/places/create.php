<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Places $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Places',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Places'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="places-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
