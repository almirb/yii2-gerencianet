<?php

namespace tests;

use codeonyii\gerencianet\models\payment\Billet;
use Yii;

/**
 * Class PayChargeTest
 *
 * @package tests
 */
class PayChargeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * check if pay charge will throw an exception without client
     *
     * @expectedException \BadMethodCallException
     */
    public function testPayChargeWithoutCustomer ()
    {
        Yii::$app->gerencianet->payCharge([]);
    }

    /**
     * check if pay charge will throw an exception without charge
     *
     * @expectedException \BadMethodCallException
     */
    public function testPayChargeWithoutCharge ()
    {
        Yii::$app->gerencianet->refresh();
        Yii::$app->gerencianet->addCustomer([
            'name' => 'Gorbadoc Oldbuck',
            'cpf' => '04267484171',
            'phone_number' => '5144916523'
        ]);

        Yii::$app->gerencianet->payCharge([]);
    }

    /**
     * check if charge will throw an exception with null shipping
     *
     * @expectedException \InvalidArgumentException
     */
    public function testPayChargeParams ()
    {
        $this->charge();
        Yii::$app->gerencianet->addCustomer([
            'name' => 'Gorbadoc Oldbuck',
            'cpf' => '04267484171',
            'phone_number' => '5144916523'
        ]);

        Yii::$app->gerencianet->payCharge([]);
    }

    /**
     * check if pay charge will work with billet
     */
    public function testPayChargeBillet ()
    {
        $this->charge();
        Yii::$app->gerencianet->addCustomer([
            'name' => 'Gorbadoc Oldbuck',
            'cpf' => '04267484171',
            'phone_number' => '5144916523'
        ]);

        $model = new Billet([
            'expire_at' => '2018-12-12',
            'instructions' => [
                'Pay only with money',
                'Do not pay with gold'
            ],
        ]);

        $result = Yii::$app->gerencianet->payCharge($model);
        var_dump($result);exit;
    }

    /**
     * Charge
     */
    private function charge ()
    {
        Yii::$app->gerencianet->addItem([
            'name' => 'Item 1',
            'amount' => 1,
            'value' => 1000
        ]);

        Yii::$app->gerencianet->addShipping([
            'name' => 'Shipping to someone else',
            'value' => 1000,
        ]);

        Yii::$app->gerencianet->addMetadata([
            'custom_id' => 'Product 0001',
            'notification_url' => 'http://codeonyii.com.br/notification'
        ]);

        Yii::$app->gerencianet->charge();
    }
}