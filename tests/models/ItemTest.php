<?php

namespace tests\models;

use codeonyii\gerencianet\models\Item;
use Yii;

/**
 * Class ItemTest
 *
 * @package tests\models
 */
class ItemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test whether item is created with given values
     */
    public function testCreate()
    {
        $model = new Item([
            'name' => 'Item 1',
            'amount' => 1,
            'value' => 1000
        ]);

        $this->assertTrue($model->validate());
    }

    /**
     * test whether item is created with api
     */
    public function testCreateWithApi()
    {
        $result = Yii::$app->gerencianet->addItem([
            'name' => 'Item 1',
            'amount' => 1,
            'value' => 1000
        ]);

        $this->assertTrue($result);
    }
}
