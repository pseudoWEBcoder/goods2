<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Items */

echo newerton\fancybox\FancyBox::widget([
    'target' => 'a[rel=fancybox]',
    'helpers' => true,
    'mouse' => true,
    'config' => [
        'maxWidth' => '90%',
        'maxHeight' => '90%',
        'playSpeed' => 7000,
        'padding' => 0,
        'fitToView' => false,
        'width' => '70%',
        'height' => '70%',
        'autoSize' => false,
        'closeClick' => false,
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
        'prevEffect' => 'elastic',
        'nextEffect' => 'elastic',
        'closeBtn' => false,
        'openOpacity' => true,
        'helpers' => [
            'title' => ['type' => 'float'],
            'buttons' => [],
            'thumbs' => ['width' => 68, 'height' => 50],
            'overlay' => [
                'css' => [
                    'background' => 'rgba(0, 0, 0, 0.8)'
                ]
            ]
        ],
    ]
]);
?>
<div class="items-view">
    <?php
    $images = $model->getImages();
    foreach ($images as $img) {
        echo Html::a(Html::img($images[0]->getUrl('100x')), $images[0]->getUrl(), ['rel' => 'fancybox', 'title' => $model->name]);
    }
    ?>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            ['attribute' => 'created',
                'format' => 'datetime'],
            'updated:datetime',
            'quantity',
            'price',
            'name:ntext',
            'nds_sum',
            'nds_rate',
            'sum',
            [
                'attribute' => 'receipt_id',
                'format' => 'html',
                'value' => Html::a($u = Url::toRoute(['/receipt/view', 'id' => $model->receipt_id]),
                    $u, ['role' => 'modal-remote'])],
            'nds18',
            'nds10',
            'calculation_type_sign',
            'calculation_subject_sign',
            'modifiers:ntext',
            'nds_no',
            'payment_type',
            'nds',
            'nds_calculated10',
            'nds_calculated18',
            'properties:ntext',
            'payment_agent_by_product_type',
            'product_type',
            'excise',
            'commit:datetime',
            'status.text',
        ],
        'template' => function ($attribute, $index, $widget) {
//your code for rendering here. e.g.
            if ($attribute['value']) {
                $captionOptions = Html::renderTagAttributes(ArrayHelper::getValue($attribute, 'captionOptions', []));
                $contentOptions = Html::renderTagAttributes(ArrayHelper::getValue($attribute, 'contentOptions', []));
                return strtr('<tr><th{captionOptions}>{label}</th><td{contentOptions}>{value}</td></tr>', [
                    '{label}' => $attribute['label'],
                    '{value}' => $widget->formatter->format($attribute['value'], $attribute['format']),
                    '{captionOptions}' => $captionOptions,
                    '{contentOptions}' => $contentOptions,
                ]);
            }
        }
    ]) ?>
    <?= $this->render('/comment/list', ['dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getComments()])]) ?>
</div>