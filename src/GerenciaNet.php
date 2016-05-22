<?php

namespace codeonyii\gerencianet;

use codeonyii\gerencianet\models\Customer;
use codeonyii\gerencianet\models\Metadata;
use codeonyii\gerencianet\models\Item;
use codeonyii\gerencianet\models\payment\Billet;
use codeonyii\gerencianet\models\payment\CreditCard;
use codeonyii\gerencianet\models\Shipping;
use Guzzle\Common\Exception\BadMethodCallException;
use yii\base\Component;

class GerenciaNet extends Component
{
    /**
     * https://docs.gerencianet.com.br/minhas-aplicacoes
     * Create an application and get the client id and client secret information to let you consume GerenciaNet's API.
     *
     * @var string client_id
     */
    public $client_id;

    /**
     * At the same place (application management), you can get the client secret information
     *
     * @var string client_secret
     */
    public $client_secret;

    /**
     * @var bool whether is product or dev
     */
    public $sandbox = true;

    /**
     * @var int the returned id after charge()
     */
    private $chargeId;

    /**
     * @var Gerencianet GerenciaNet object
     */
    private $api;

    /**
     * @var array array of products to be charged
     */
    private $items = [];

    /**
     * @var array array of shipping to be charged
     */
    private $shipping = [];

    /**
     * @var array array of metadata
     */
    private $metadata;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var array array of errors
     */
    public $errors = [];

    /**
     * create the object and returns it.
     *
     * @return \Gerencianet\Gerencianet
     */
    public function getApi()
    {
        if (empty($this->api)) {
            $this->api = new \Gerencianet\Gerencianet([
                'client_id' => $this->client_id,
                'client_secret' => $this->client_secret,
                'sandbox' => $this->sandbox
            ]);
        }

        return $this->api;
    }

    /**
     * clear everything
     */
    public function refresh()
    {
        $this->chargeId = null;
        $this->items = [];
        $this->shipping = [];
        $this->metadata = [];
        $this->customer = null;
        $this->errors = null;
    }

    /**
     * add a product
     *
     * @param array $item
     * @return bool
     */
    public function addItem($item)
    {
        $model = new Item($item);

        if ($model->validate()) {
            $this->items[] = $item;
            return true;
        }

        $this->errors = $model->errors;
        return false;
    }

    /**
     * add a shipping
     *
     * @param array $shipping
     * @return bool
     */
    public function addShipping($shipping)
    {
        $model = new Shipping($shipping);

        if ($model->validate()) {
            $this->shipping[] = $shipping;
            return true;
        }

        $this->errors = $model->errors;
        return false;
    }

    /**
     * add a metadata
     *
     * @param array $metadata
     * @return bool
     */
    public function addMetadata($metadata)
    {
        $model = new Metadata($metadata);

        if ($model->validate()) {
            $this->metadata = $metadata;
            return true;
        }

        $this->errors = $model->errors;
        return false;
    }

    /**
     * Charge
     *
     * @return mixed
     */
    public function charge()
    {
        if (empty($this->items)) {
            throw new BadMethodCallException("You need to set at least one item.");
        }

        if (empty($this->shipping)) {
            throw new BadMethodCallException("You need to set at least one shipping.");
        }

        if (empty($this->metadata)) {
            throw new BadMethodCallException("You need to set the metadata.");
        }

        $body = [
            'items' => $this->items,
            'shippings' => $this->shipping,
            'metadata' => $this->metadata,
        ];

        $charge = $this->getApi()->createCharge([], $body);

        if (!empty($charge['code']) && $charge['code'] == 200) {
            $this->chargeId = $charge['data']['charge_id'];

            $this->items = [];
            $this->shipping = [];
            $this->metadata = [];
        }

        return $charge;
    }

    /**
     * set a customer to be billed
     *
     * @param $customer
     * @return bool
     */
    public function addCustomer($customer)
    {
        $model = new Customer($customer);

        if ($model->validate()) {
            $this->customer = $customer;
            return true;
        }

        $this->errors = $model->errors;
        return false;
    }

    /**
     * @param $paymentType
     * @return bool
     */
    public function payCharge($paymentType)
    {
        if (empty($this->customer)) {
            throw new BadMethodCallException("You need to set the customer.");
        }

        if (empty($this->chargeId)) {
            throw new BadMethodCallException("Ops. Did you charge? It is missing the charge id");
        }

        $params = [
            'id' => $this->chargeId,
        ];

        $body = [
            'payment' => []
        ];

        $model = null;
        if ($paymentType instanceof Billet) {
            $model = new Billet($paymentType);
            $model->customer = $this->customer;

            if (!$model->validate()) {
                $this->errors = $model->errors;
                return false;
            }

            $body['payment'][] = [
                'banking_billet' => $model->toArray()
            ];
        } elseif ($paymentType instanceof CreditCard) {
            $model = new CreditCard($paymentType);
            $model->customer = $this->customer;

            if (!$model->validate()) {
                $this->errors = $model->errors;
                return false;
            }

            $body['payment'][] = [
                'credit_card' => $paymentType->toArray()
            ];
        } else {
            throw new \InvalidArgumentException("The param should be an instance of Billet or CreditCard.");
        }

        $this->getApi()->payCharge($params, $body);
    }
}
