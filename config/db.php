<?php
$dbf='db.sqlite';
$dbf='/storage/emulated/0/www/public/json/db/db4.db';
if (is_dir('C:\Windows'))
    $dbf = dirname(__FILE__) . '/../../json/db/db4.db';
//var_dump([$dbf,realpath($dbf)]);

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'sqlite:'.realpath($dbf),
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
