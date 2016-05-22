<?php

namespace codeonyii\gerencianet;

use Yii;
use yii\base\Widget;

class GerenciaNetInstallments extends Widget
{

    /**
     * @var int amount including shipping
     */
    public $total;

    /**
     * from original documentation:
     * https://docs.gerencianet.com.br/transacoes/metodos-de-pagamento/cartao
     * visa, Bandeira Visa
     * mastercard, Bandeira MasterCard
     * jcb, Bandeira JCB
     * diners, Bandeira Dinners
     * amex, Bandeira AmericanExpress
     * discover, Bandeira Discover
     * elo, Bandeira Elo
     * aura, Bandeira Aura
     *
     * @var string brand
     */
    public $brand;

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

        $js = <<<JS
\$gn.ready(function(checkout) {
    checkout.getInstallments({$this->total}, '{$this->brand}', {$this->callback});
});
JS;

        $view->registerJs(Yii::$app->gerencianet->javascript);
        $view->registerJs($js);
    }
}
