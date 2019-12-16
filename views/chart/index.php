<?php
/* @var $this yii\web\View */

/* @var $query \yii\db\ActiveQuery */

use practically\chartjs\Chart;

\app\assets\ChartAsset::register($this);
foreach ($data as $index => $datum) {


}
$script = /** @lang JavaScript */
    'var data =
' . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . ';
dataprovider = function () {
    debugger;
    let cleandata = {"labels":[], "vals":[]};
    for (var i in data)
        {let  el =  data[i];
        cleandata["labels"].push(new Date(parseInt(el["t"]) ? parseInt(el["t"]) : null));
        cleandata["vals"].push((parseFloat(el["y"]) ? parseFloat(el["y"]) : null));
        
        }
    return cleandata;
}
const config = {

    type: \'line\',
    data: {
        labels: dataprovider()["labels"],
        datasets: [{
            label: \'Line\',
            data: dataprovider()["vals"],
            borderColor: \'#D4213D\',
            fill: false,
        },],
    },
    options: {
        scales: {
            xAxes: [{
                type: \'time\',
            },],
        },
        pan: {
            enabled: true,
            mode: \'xy\',
        },
        zoom: {
            enabled: true,
            mode: \'xy\', // or \'x\' for "drag" version
        },
        dragData: true,
    },
};


debugger;
new Chart(document.getElementById(\'chart\'), config);
';
$js = New  \yii\web\JsExpression($script);
$this->registerJs($js);
echo \yii\helpers\Html::tag('canvas', '', ['id' => 'chart'])
?>