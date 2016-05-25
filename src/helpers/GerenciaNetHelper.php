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
            'visa' => 'Visa',
            'mastercard' => 'MasterCard',
            'jcb' => 'JCB',
            'diners' => 'Dinners',
            'amex' => 'AmericanExpress',
            'discover' => 'Discover',
            'elo' => 'Elo',
            'aura' => 'Aura',
        ];
    }
}
