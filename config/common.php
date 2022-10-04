<?php

$params = \yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$db = \yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/db.php'),
    require(__DIR__ . '/db-local.php')
);

return [
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'maxFileSize' => 10240,
                ],
                [
                    'class' => 'yii\log\FileTarget', //в файл
                    'categories' => ['fail'], //категория логов
                    'logFile' => '@runtime/logs/fails.log', //куда сохранять
                    'logVars' => [], //не добавлять в лог глобальные переменные ($_SERVER, $_SESSION...)
                    'maxFileSize' => 10240,
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
];