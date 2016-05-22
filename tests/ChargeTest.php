<?php

namespace tests;

use Yii;

/**
 * Class ChargeTest
 *
 * @package tests
 */
class ChargeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * check if charge will throw an exception without items
     *
     * @expectedException \BadMethodCallException
     */
    public function testChargeWithoutItems ()
    {
        Yii::$app->gerencianet->charge();
    }

    /**
     * check if charge will throw an exception without shipping
     *
     * @expectedException \BadMethodCallException
     */
    public function testChargeWithoutShipping ()
    {
        Yii::$app->gerencianet->addItem([
            'name' => 'Item 1',
            'amount' => 1,
            'value' => 1000
        ]);

        Yii::$app->gerencianet->charge();
    }

    /**
     * check if charge will throw an exception without metadata
     *
     * @expectedException \BadMethodCallException
     */
    public function testChargeWithoutMetadata ()
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

        Yii::$app->gerencianet->charge();
    }


    /**
     * test whether charge will work or not
     */
    public function testCharge ()
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

        $charge = Yii::$app->gerencianet->charge();

        $this->assertEquals($charge['code'], 200);
    }
}