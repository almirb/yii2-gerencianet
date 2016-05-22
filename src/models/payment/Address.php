<?php

namespace codeonyii\gerencianet\models\payment;

use yii\base\Model;

class Address extends Model
{
    /**
     * @var string
     */
    public $street;

    /**
     * @var int
     */
    public $number;

    /**
     * @var string
     */
    public $neighborhood;

    /**
     * @var int
     */
    public $zipcode;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $state;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['street', 'number', 'neighborhood', 'zipcode', 'city', 'state'], 'required'],
            [['street', 'neighborhood', 'city', 'state'], 'string'],
            [['number', 'zipcode'], 'integer'],
        ];
    }
}
