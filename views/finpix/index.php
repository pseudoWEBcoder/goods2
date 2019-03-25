<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\finpix\TranzactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tranzactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tranzaction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tranzaction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->_id), ['view', 'id' => $model->_id]);
        },
    ]) ?>
</div>
