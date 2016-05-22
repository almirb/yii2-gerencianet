<?php

namespace tests\models;

use codeonyii\gerencianet\models\Shipping;
use Yii;

/**
 * Class ShippingTest
 *
 * @package tests\models
 */
class ShippingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test whether shipping is created with given values
     */
    public function testCreate()
    {
        $model = new Shipping([
            'name' => 'Shipping to someone else',
            'value' => 1000,
            'payee_code' => 'abcdefABCDEF0123456789abcdefABCD'
        ]);

        $this->assertTrue($model->validate());
    }

    /**
     * test whether shipping is created with api
     */
    public function testCreateWithApi()
    {
        $result = Yii::$app->gerencianet->addShipping([
            'name' => 'Shipping to someone else',
            'value' => 1000,
            'payee_code' => 'abcdefABCDEF0123456789abcdefABCD'
        ]);

        $this->assertTrue($result);
    }
}
