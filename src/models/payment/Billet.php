<?php

namespace codeonyii\gerencianet\models\payment;

use codeonyii\gerencianet\models\Customer;
use yii\base\Model;

class Billet extends Model
{
    /**
     * @var string
     */
    public $expire_at;

    /**
     * @var Customer
     */
    public $customer;

    /**
     * @var array
     */
    public $instructions;

    /**
     * @inheritdoc
     */
    public function rules ()
    {
        return [
            [['expire_at', 'customer'], 'required'],
            [['expire_at'], 'string'],
            [['instructions'], 'safe'],
        ];
    }
}