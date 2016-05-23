<?php
return [
    'components' => [
        'gerencianet' => [
            'class' => 'codeonyii\gerencianet\GerenciaNet',
            'client_id' => 'client_id',
            'client_secret' => 'client_secret',
            'sandbox' => true,
            'javascript' => "<script type='text/javascript'>var s=document.createElement('script');s.type='text/javascript';var"
        ],
        'assetManager' => [
            'basePath' => '@tests/data/assets',
            'baseUrl' => '/',
        ]
    ],
];