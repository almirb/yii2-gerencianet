<?php

namespace tests\models\payment;

use codeonyii\gerencianet\models\Customer;
use codeonyii\gerencianet\models\payment\Address;
use codeonyii\gerencianet\models\payment\CreditCard;
use Yii;

/**
 * Class CreditCardTest
 *
 * @package tests\models\payment
 */
class CreditCardTest extends \PHPUnit_Framework_TestCase
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

        $billingAddress = new Address([
            'street' => 'Av. JK',
            'number' => 909,
            'neighborhood' => 'Bauxita',
            'zipcode' => '35400000',
            'city' => 'Ouro Preto',
            'state' => 'MG',
        ]);

        $model = new CreditCard([
            'installments' => 1,
            'billing_address' => $billingAddress,
            'payment_token' => '6426f3abd8688639c6772963669bbb8e0eb3c319',
            'customer' => $customer
        ]);

        $this->assertTrue($model->validate());
    }
}
