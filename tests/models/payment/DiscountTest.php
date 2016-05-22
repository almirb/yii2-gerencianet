<?php

namespace tests\models;

use codeonyii\gerencianet\models\payment\Discount;
use Yii;

/**
 * Class DiscountTest
 *
 * @package tests\models\payment
 */
class DiscountTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test whether metadata is created with given values
     */
    public function testCreate ()
    {
        $model = new Discount([
            'type' => Discount::TYPE_PERCENTAGE,
            'value'=> 10
        ]);

        $this->assertTrue($model->validate());
    }
}