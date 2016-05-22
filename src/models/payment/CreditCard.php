<?php

namespace codeonyii\gerencianet\models\payment;

use codeonyii\gerencianet\models\Customer;
use yii\base\Model;

class CreditCard extends Model
{
    /**
     * @var integer
     */
    public $installments;

    /**
     * @var Address
     */
    public $billing_address;

    /**
     * A payment_token represents a credit card number at Gerencianet.
     *
     * For testing purposes, you can go to your application playground in your Gerencianet's account. At the payment
     * endpoint you'll see a button that generates one token for you. This payment token will point to a random test
     * credit card number.
     *
     * @var string
     */
    public $payment_token;

    /**
     * @var Customer
     */
    public $customer;

    /**
     * @var Discount
     */
    public $discount;

    /**
     * @inheritdoc
     */
    public function rules ()
    {
        return [
            [['installments', 'billing_address', 'payment_token', 'customer'], 'required'],
            [['payment_token'], 'string'],
            [['billing_address', 'customer', 'discount'], 'safe'],
        ];
    }
}