<?php

namespace codeonyii\gerencianet\models;

use yii\base\Model;

class Shipping extends Model
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var double
     */
    public $value;

    /**
     * @var string
     */
    public $payee_code;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'value'], 'required'],
            [['name', 'payee_code'], 'string'],
            [['value'], 'number'],
            [['payee_code'], 'match', 'pattern' => '/[a-fA-F0-9]{32}/']
        ];
    }
}
