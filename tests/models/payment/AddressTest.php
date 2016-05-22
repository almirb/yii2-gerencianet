<?php

namespace tests\models;

use codeonyii\gerencianet\models\payment\Address;
use Yii;

/**
 * Class AddressTest
 *
 * @package tests\models\payment
 */
class AddressTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test whether metadata is created with given values
     */
    public function testCreate ()
    {
        $model = new Address([
            'street' => 'Av. JK',
            'number' => 909,
            'neighborhood' => 'Bauxita',
            'zipcode' => '35400000',
            'city' => 'Ouro Preto',
            'state' => 'MG',
        ]);

        $this->assertTrue($model->validate());
    }
}