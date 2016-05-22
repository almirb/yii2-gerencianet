<?php

namespace tests\models;

use codeonyii\gerencianet\models\Customer;
use codeonyii\gerencianet\models\payment\Billet;
use Yii;

/**
 * Class BilletTest
 *
 * @package tests\models\payment
 */
class BilletTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test whether metadata is created with given values
     */
    public function testCreate()
    {
        $customer = new Customer([
            'name' => 'Gorbadoc Oldbuck',
            'cpf' => '04267484171',
            'phone_number' => '5144916523',
            'email' => 'oldbuck@gerencianet.com.br',
            'birth' => '1977-01-15'
        ]);

        $model = new Billet([
            'expire_at' => '2018-12-12',
            'customer' => $customer,
            'instructions' => [
                'Pay only with money',
                'Do not pay with gold'
            ],
        ]);

        $this->assertTrue($model->validate());
    }
}
