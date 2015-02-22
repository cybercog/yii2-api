<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2-api',
    'username' => getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD'),
    'charset' => 'utf8',
    'enableSchemaCache' => true,
    /* Duration of schema cache. */
    'schemaCacheDuration' => 3600,
    /* Name of the cache component used. Default is 'cache'.*/
    //'schemaCache' => 'cache',
];
