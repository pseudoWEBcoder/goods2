<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

//$db2 = require __DIR__ . '/db2.php';
$config = [
    'id' => 'basic',
'timeZone' => 'Europe/Moscow',
    'basePath' => dirname(__DIR__),
'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ql_aKuqgW6qLUPy_-ZTjpF5cav1arIXy',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
 'db_finpix' => $db2,
'formatter' => [
'locale' => 'ru-RU',
 'dateFormat' => 'dd.MM.yyyy',
'defaultTimeZone'=>'Europe/Moscow',
'timeZone'=>'Europe/Moscow',
 'decimalSeparator' => ',',
 'thousandSeparator' => ' ',
 'currencyCode' => 'EUR', ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
    'modules' => ['gridview' => ['class' => 'kartik\grid\Module',], 'gallery' => [
        'class' => 'dvizh\gallery\Module',
        'imagesStorePath' => dirname(dirname(__DIR__)) . '/web/images/store', //path to origin images
        'imagesCachePath' => dirname(dirname(__DIR__)) . '/web/images/cache', //path to resized copies
        'graphicsLibrary' => 'GD',
        'placeHolderPath' => '@webroot/images/placeHolder.png',
        'adminRoles' => ['administrator', 'admin', 'superadmin'],
    ],],
];
//var_dump(YII_ENV_DEV);
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['[::ffff:127.0.0.1]', '127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['[::ffff:127.0.0.1]', '127.0.0.1', '::1'],
    ];
//$config['modules']['gii']['generators'] = [ 'kartikgii-crud' => ['class' => 'warrence\kartikgii\crud\Generator'], ];
}

return $config;
