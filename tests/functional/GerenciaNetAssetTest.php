<?php

namespace tests\functional;

use codeonyii\gerencianet\GerenciaNetAsset;
use codeonyii\gerencianet\GerenciaNetCreditCard;
use Yii;

/**
 * Class GerenciaNetAssetTest
 *
 * @package tests\functional
 */
class GerenciaNetAssetTest extends \PHPUnit_Framework_TestCase
{

    /**
     * test whether asset is registered or not
     */
    public function testAssetRegister()
    {
        $view = Yii::$app->view;

        GerenciaNetAsset::register($view);
        $this->assertEquals(1, sizeof($view->js));
    }
}
