<?php
$dbf='db.sqlite';
$dbf='/storage/emulated/0/Download/finpix20190317-0320.backup';
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
