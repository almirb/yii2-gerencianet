<?php

namespace codeonyii\gerencianet;

use Yii;
use yii\base\Widget;

class GerenciaNetCreditCard extends Widget
{

    /**
     * ~~~php
     * [
     *      'brand' => 'visa',
     *      'number' => '9999999999999999',
     *      'cvv' => '123',
     *      'expiration_month' => '01',
     *      'expiration_year' => '2015'
     * ]
     *
     * from documentation:
     * https://docs.gerencianet.com.br/transacoes/metodos-de-pagamento/cartao
     * brand, Bandeira do cartão
     * number, Número do cartão sem formatação
     * cvv, Código de segurança do cartão
     * expiration_month, Mês de expiração do cartão no formato "MM"
     * expiration_year, Ano de expiração do cartão no formato "YYYY"
     *
     * @var array of options
     */
    public $options = [];

    /**
     * @var string JS callback function
     */
    public $callback = 'function () {}';

    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run();

        $this->registerClientScript();
    }

    /**
     * register all gerencia net JS for creditcard payment token generation
     */
    public function registerClientScript()
    {
        $view = Yii::$app->view;
        $options = json_encode($this->options);

        $js = <<<JS
\$gn.ready(function(checkout) {
    checkout.getPaymentToken({$options}, {$this->callback});
});
JS;

        $view->registerJs(Yii::$app->gerencianet->javascript);
        $view->registerJs($js);
    }
}
