<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searches\ReceiptSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receipts';
$this->params['breadcrumbs'][] = $this->title;
$js = /** @lang JavaScript */
    <<<end
jQuery(document).on('click','.toggle_tditems',  function (event, el){
    jQuery('.tditems').slideToggle('fast');
    event.preventDefault();
    event.stopPropagation();
})
end;
$this->registerJs($js);
?>
<div class="receipt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Receipt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'user:text',
            'date_time:datetime',
            ['attribute' => 'formatedTotalSum', 'label' => 'сумма', 'value' => /**
             * @param $model \app\models\Receipt
             * @param $key integer
             * @return string
             */ function ($model, $key) {
                $total_sum = $model->total_sum / 100;
                if ($total_sum > 2000)
                    return Html::tag('span', $model->formatedTotalSum, ['class' => 'text-danger']);
                else if (($total_sum > 200) && ($total_sum < 2000))
                    return Html::tag('span', $model->formatedTotalSum, ['class' => 'text-warning']);
                else
                    return Html::tag('span', $model->formatedTotalSum, []);
            }, 'format' => 'html'],
            //  'updated',
            //   'commit',
            //   'user_inn:ntext',
            ['label' => 'count', 'value' => function ($model) {

                return $model->getItems()->count();
            }, 'format' => 'integer'
            ], ['label' => 'товары', 'value' => function ($model) {
                $view = $_GET['view'] ?? 'table';
                $items = $model->items;
                // $items = $model->getItems()->orderBy(['sum' => SORT_DESC])->all();
                $map = \yii\helpers\ArrayHelper::map($items, 'id', 'name');
                /** @var \app\models\Items $item */
                foreach ($items as $index => $item) {
                    $tr [] = '<tr>';
                    $tr [] = '<td>' . $item->name . '</td>';
                    $tr [] = '<td class="text-muted">' . $item->quantity . '</td>';
                    $tr [] = '<td class="text-muted">' . $item->formatedSum . '</td>';
                    $tr [] = '</tr>';

                    $li [] = '<li>';
                    $li [] = '<span class="pull-left">' . $item->name . '</span>';
                    $li [] = '<span class="pull-right text-muted">' . $item->formatedSum . '</span>';
                    $li [] = '</li>';
                }
                switch ($view) {
                    case  'list_cost':
                        return ($li && count($li)) ? ('<ul>' . implode('', $li) . '</ul>') : '';
                        break;
                    case  'list':
                        return Html::ul($map);
                        break;
                    case  'table':
                        return ($tr && count($tr)) ? ('<table class="table table-bordered table-striped table-hover">' . implode(PHP_EOL, $tr) . '</table>') : '';
                        break;

                }

                //return ($tr && count($tr)) ? ('<table class="table table-bordered table-striped">' . implode(PHP_EOL, $tr) . '</table>') : '';

            }, 'format' => 'raw'
                , 'filter' => Html::a('свернуть', '#', ['class' => 'toggle_tditems']) .
                    '<form>' . '
<select name="view">
<option value=""></option>
<option value="list_cost">list_cost</option>
<option value="list">list</option>
<option value="table">table</option>
</select> <input type="submit" value="ok"></form>', 'contentOptions' => ['class' => 'tditems'
                ]
            ],
            //'fiscal_document_number',
            //'fiscal_sign:ntext',
            //'operator:ntext',
            //'total_sum',
            //'nds_no',
            //'shift_number',
            //'fiscal_drive_number:ntext',
            //'counter_submission_sum',
            //'taxation_type',
            //'kkt_reg_id:ntext',
            //'date_time',
            //'ecash_total_sum',
            //'prepayment_sum',
            //'cash_total_sum',
            //'postpayment_sum',
            //'request_number',
            //'operation_type',
            //'receipt_code',
            //'user:ntext',
            //'message_fiscal_sign:ntext',
            //'raw_data:ntext',
            //'nds18',
            //'nds10',
            //'fns_url:ntext',
            //'operator_inn:ntext',
            //'modifiers:ntext',
            //'retail_place_address:ntext',
            //'storno_items:ntext',
            //'retail_place:ntext',
            //'prepaid_sum',
            //'internet_sign',
            //'fns_site:ntext',
            //'machine_number:ntext',
            //'seller_address:ntext',
            //'fiscal_document_format_ver',
            //'provision_sum',
            //'buyer_address:ntext',
            //'payment_agent_type',
            //'properties_user:ntext',
            //'credit_sum',
            //'address_to_check_fiscal_sign:ntext',
            //'sender_address:ntext',
            //'nds_calculated10',
            //'user_property:ntext',
            //'properties:ntext',
            //'nds_calculated18',
            //'message:ntext',
            //'authority_uri:ntext',
            //'protocol_version',
            //'operator_transfer_address:ntext',
            //'buyer_phone_or_address:ntext',
            //'provider_phone:ntext',
            //'operator_phone_to_transfer:ntext',
            //'code',
            //'retail_address:ntext',
            //'operator_transfer_inn:ntext',
            //'operator_to_receive_phone:ntext',
            //'operator_transfer_name:ntext',
            //'payment_agent_operation:ntext',
            //'payment_agent_phone:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
