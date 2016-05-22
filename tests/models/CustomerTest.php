<?php

namespace tests\models;

use codeonyii\gerencianet\models\Customer;
use Yii;

/**
 * Class CustomerTest
 *
 * @package tests\models
 */
class CustomerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test whether shipping is created with given values
     */
    public function testCreate()
    {
        $model = new Customer([
            'name' => 'Gorbadoc Oldbuck',
            'cpf' => '04267484171',
            'phone_number' => '5144916523',
            'email' => 'oldbuck@gerencianet.com.br',
            'birth' => '1977-01-15'
        ]);

        $this->assertTrue($model->validate());
    }

    /**
     * test whether shipping is created with api
     */
    public function testCreateWithApi ()
    {
        $result = Yii::$app->gerencianet->addCustomer([
            'name' => 'Gorbadoc Oldbuck',
            'cpf' => '04267484171',
            'phone_number' => '5144916523'
        ]);

        $this->assertTrue($result);
    }
}