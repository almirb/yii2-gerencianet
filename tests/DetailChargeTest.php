<?php

namespace tests;

use codeonyii\gerencianet\models\payment\Billet;
use Yii;

/**
 * Class DetailChargeTest
 *
 * @package tests
 */
class DetailChargeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * test whether detailCharge will work or not
     */
    public function testDetailCharge()
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
        $data = Yii::$app->gerencianet->detailCharge($result['charge_id']);

        $this->assertEquals($result['charge_id'], $data['charge_id']);
    }
}
