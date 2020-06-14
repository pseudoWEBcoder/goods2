<?php
/* @var $this yii\web\View */
/* @var $model \app\models\ChartFilters */

/* @var $query \yii\db\ActiveQuery */

\app\assets\ChartAsset::register($this);
foreach ($data as $index => $datum) {


}
$script = /** @lang JavaScript */
    'var data =
' . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . ';
dataprovider = function () {
    debugger;let  d ;  
    let cleandata = {"labels":[], "vals":[],  "names":[],  "dates":[],  "raw":[]};
    for (var i in data)
        {let  el =  data[i];
        cleandata["labels"].push(d =  new Date(parseInt(el["t"]) ? parseInt(el["t"]) : null));
        cleandata["vals"].push((parseFloat(el["y"]) ? parseFloat(el["y"]) : null));
        cleandata["names"].push(el["tix"]);
        cleandata["dates"].push(el["d"]);
        cleandata["raw"].push(el);
        if(typeof  (d )=="date")
            
        cleandata["grouped"]
        }
    return cleandata;
}
var customTooltips = function(tooltip,  all  ) {
			// Tooltip Element
			debugger;
			var tooltipEl = document.getElementById(\'chartjs-tooltip\');

			if (!tooltipEl) {
				tooltipEl = document.createElement(\'div\');
				tooltipEl.id = \'chartjs-tooltip\';
				tooltipEl.innerHTML = \'<table></table>\';
				this._chart.canvas.parentNode.appendChild(tooltipEl);
			}
			
index = tooltip.dataPoints["0"].index ;		
			let  dp = dataprovider(),  Point = {};
Point["name"] =  dp["names"][index];
Point["date"] =  dp["dates"][index];
			// Hide if no tooltip
			if (tooltip.opacity === 0) {
				tooltipEl.style.opacity = 0;
				return;
			}

			// Set caret Position
			tooltipEl.classList.remove(\'above\', \'below\', \'no-transform\');
			if (tooltip.yAlign) {
				tooltipEl.classList.add(tooltip.yAlign);
			} else {
				tooltipEl.classList.add(\'no-transform\');
			}

			function getBody(bodyItem) {
				return bodyItem.lines;
			}

			// Set Text
			if (tooltip.body) {
				var titleLines = tooltip.title || [];
				var bodyLines = tooltip.body.map(getBody);

				var innerHtml = \'<thead>\';

				titleLines.forEach(function(title) {
					innerHtml += \'<tr><th>\' + title + \'</th><th>\'+Point["name"]+\'</th></tr>\';
				});
				innerHtml += \'</thead><tbody>\';

				bodyLines.forEach(function(body, i) {
					var colors = tooltip.labelColors[i];
					var style = \'background:\' + colors.backgroundColor;
					style += \'; border-color:\' + colors.borderColor;
					style += \'; border-width: 2px\';
					var span = \'<span class="chartjs-tooltip-key" style="\' + style + \'"></span>\';
					innerHtml += \'<tr><td>\' + span + body + \'</td></tr>\';
				});
				innerHtml += \'</tbody>\';

				var tableRoot = tooltipEl.querySelector(\'table\');
				tableRoot.innerHTML = innerHtml;
			}

			var positionY = this._chart.canvas.offsetTop;
			var positionX = this._chart.canvas.offsetLeft;

			// Display, position, and set styles for font
			tooltipEl.style.opacity = 1;
			tooltipEl.style.left = positionX + tooltip.caretX + \'px\';
			tooltipEl.style.top = positionY + tooltip.caretY + \'px\';
			tooltipEl.style.fontFamily = tooltip._bodyFontFamily;
			tooltipEl.style.fontSize = tooltip.bodyFontSize + \'px\';
			tooltipEl.style.fontStyle = tooltip._bodyFontStyle;
			tooltipEl.style.padding = tooltip.yPadding + \'px \' + tooltip.xPadding + \'px\';
		};
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
        title: {
						display: true,
						text: \'Chart.js Line Chart - Custom Tooltips\'
					},
					tooltips: {
						enabled: false,
						mode: \'index\',
						position: \'nearest\',
						custom: customTooltips
					}
    },
};


debugger;
new Chart(document.getElementById(\'chart\'), config);
';
$js = New  \yii\web\JsExpression($script);
$this->registerJs($js);
echo \yii\helpers\Html::tag('canvas', '', ['id' => 'chart']);
echo $this->render('filters', ['model' => $model]);
?>