<?php

namespace codeonyii\gerencianet\helpers;

class GerenciaNetHelper
{
    /**
     * set of brands allowed by GerenciaNet
     *
     * @return array
     */
    public static function getBrands()
    {
        return [
            'visa' => 'Bandeira Visa',
            'mastercard' => 'Bandeira MasterCard',
            'jcb' => 'Bandeira JCB',
            'diners' => 'Bandeira Dinners',
            'amex' => 'Bandeira AmericanExpress',
            'discover' => 'Bandeira Discover',
            'elo' => 'Bandeira Elo',
            'aura' => 'Bandeira Aura',
        ];
    }
}
