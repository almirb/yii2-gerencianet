<?php

namespace codeonyii\gerencianet;

use Yii;
use yii\web\AssetBundle;

class GerenciaNetAsset extends AssetBundle
{

    public function init()
    {
        Yii::$app->view->registerJs(
            Yii::$app->gerencianet->javascript
        );
        parent::init();
    }
}