<?php

namespace codeonyii\gerencianet\models\payment;

use yii\base\Model;

class Discount extends Model
{
    const TYPE_CURRENCY = 'currency';

    const TYPE_PERCENTAGE = 'percentage';

    /**
     * @var string
     */
    public $type;

    /**
     * @var double
     */
    public $value;

    /**
     * @inheritdoc
     */
    public function rules ()
    {
        return [
            [['type', 'value'], 'required'],
            [['value'], 'number'],
            [['type'], 'in', 'range' => [static::TYPE_CURRENCY, static::TYPE_PERCENTAGE]],
        ];
    }
}