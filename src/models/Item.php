<?php

namespace codeonyii\gerencianet\models;

use yii\base\Model;

class Item extends Model
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $amount;

    /**
     * @var double
     */
    public $value;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'amount', 'value'], 'required'],
            [['name'], 'string'],
            [['amount'], 'integer'],
            [['value'], 'number'],
        ];
    }
}
