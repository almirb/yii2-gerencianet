<?php

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

Yii::setAlias('@tests', __DIR__);

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/config/main.php'),
    require(__DIR__ . '/config/main-local.php')
);

new \yii\console\Application($config);