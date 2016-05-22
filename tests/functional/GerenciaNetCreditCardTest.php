<?php

namespace tests\functional;

use codeonyii\gerencianet\GerenciaNetCreditCard;
use Yii;
use yii\web\JsExpression;

/**
 * Class GerenciaNetCreditCardTest
 *
 * @package tests\functional
 */
class GerenciaNetCreditCardTest extends \PHPUnit_Framework_TestCase
{

    /**
     * test whether asset is registered or not
     */
    public function testAssetRegister()
    {
        $view = Yii::$app->view;

        GerenciaNetCreditCard::widget([
            'options' => [
                    'brand' => 'visa',
                    'number' => '9999999999999999',
                    'cvv' => '123',
                    'expiration_month' => '01',
                'expiration_year' => '2015'
            ],
            'callback' => new JsExpression('function() {
            }')
        ]);

        $this->assertEquals(1, sizeof($view->js));
    }
}
