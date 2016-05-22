<?php

namespace tests\functional;

use codeonyii\gerencianet\GerenciaNetInstallments;
use Yii;
use yii\web\JsExpression;

/**
 * Class GerenciaNetInstallmentsTest
 *
 * @package tests\functional
 */
class GerenciaNetInstallmentsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * test whether asset is registered or not
     */
    public function testAssetRegister()
    {
        $view = Yii::$app->view;

        GerenciaNetInstallments::widget([
            'total' => 1000,
            'brand' => 'visa',
            'callback' => new JsExpression('function() {
            }')
        ]);

        $this->assertEquals(1, sizeof($view->js));
    }
}
