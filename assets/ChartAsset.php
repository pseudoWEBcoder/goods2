<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ChartAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    //public $sourcePath = '@bower//chart-js/dist';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
"https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js",
"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js",
"https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/0.6.6/chartjs-plugin-zoom.js",
"https://cdn.jsdelivr.net/npm/chartjs-plugin-dragdata@1.0.4/dist/chartjs-plugin-dragdata.min.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
