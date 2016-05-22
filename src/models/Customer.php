<?php

namespace codeonyii\gerencianet\models;

use yii\base\Model;

class Customer extends Model
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $cpf;

    /**
     * @var string
     */
    public $phone_number;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string format php:Y-m-d
     */
    public $birth;

    /**
     * @var Address
     */
    public $address;

    /**
     * @inheritdoc
     */
    public function rules ()
    {
        return [
            [['name', 'cpf', 'phone_number'], 'required'],
            [['name', 'cpf', 'phone_number'], 'string'],
            [['email'], 'email'],
            [['birth'], 'date', 'format' => 'php:Y-m-d'],
            [['address'], 'safe'],
        ];
    }
}