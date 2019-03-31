<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@webroot/css/commennt-list.css');
// взял отсюда https://bootsnipp.com/snippets/z1pD1
?>
<section class="comment-list">


    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => '_itemembed'
        /*function ($model, $key, $index, $widget) {
                return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
            },*/
    ]) ?>
</section>
