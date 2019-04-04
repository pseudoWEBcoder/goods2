<?php

use app\models\ItemStatuses;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searches\ItemsHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$h = $h ? $h : 1;
$this->title = 'История изменений';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-history-index">

    <h<?= $h ?>><?= Html::encode($this->title) ?></h<?= $h ?>>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            ['attribute' => 'diff', 'format' => 'html', 'value' => function ($model, $key, $that) {
                $arr = json_decode($model->diff, 1);
                if (!is_array($arr['old']))
                    return;
                $ul = [];
                $statuses = \yii\helpers\ArrayHelper::map(ItemStatuses::find()->asArray()->all(), 'id', 'text');

                foreach ($arr['old'] as $attributte => $oldval) {
                    $newval = $arr['new'][$attributte];
                    if (!($oldval == $newval)) {
                        switch ($attributte) {

                            case 'commit':
                                $oldval = date('d.m.Y h:i:s', $oldval);
                                $newval = date('d.m.Y h:i:s', $newval);
                                break;
                            case 'status_id':
                                $oldval = $statuses[$oldval];
                                $newval = $statuses[$newval];
                                break;
                        }
                        $li = implode(' ', [Html::tag('strong', $attributte, ['class' => 'text-muted']), Html::tag('span', $oldval, ['class' => 'oldval text-info']) . Html::tag('span', '&rarr;', ['class' => ' text-danger']), Html::tag('span', $newval, ['class' => 'newval text-success'])]);
                        if (!empty($newval))
                            $ul[] = $li;
                        else
                            $ul[] = Html::tag('strike', $li);

                    }
                }
                return Html::ul($ul, ['encode' => false]);

            }, 'format' => 'html'],


            'time:datetime',
            'text:ntext', 'items_id', 'id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
