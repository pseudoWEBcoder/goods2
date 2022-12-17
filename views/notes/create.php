<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Notes $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Notes',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Notes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notes-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
