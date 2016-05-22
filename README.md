# Gerencianet for Yii2


An implementation of [Gerencianet](http://gerencianet.com.br).

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ composer require code-on-yii/yii2-gerencianet:*
```

or add

```
"code-on-yii/yii2-gerencianet": "*"
```

to the `require` section of your `composer.json` file.

## Usage

Append in your config file:

```php
'components' => [
    'gerencianet' => [
        'class' => 'codeonyii\gerencianet\GerenciaNet',
        'client_id' => '',
        'client_secret' => '',
        'sandbox' => true
    ]
]
```

**Add a product**
```php
Yii::$app->gerencianet->addProduct([
   'name' => 'Item 1',
   'amount' => 1,
   'value' => 1000
]);
```

**Add a shipping**
```php
Yii::$app->gerencianet->addShipping([
    'name' => 'My Shipping',
    'value' => 2000
]);
```

**Add a metadata**
```php
Yii::$app->gerencianet->addMetadata([
    'custom_id' => 'Product 0001',
    'notification_url' => 'http://my_domain.com/notification'
]);
```

**Charge**
```php
Yii::$app->gerencianet->charge();
```


## Testing

```bash
$ ./vendor/bin/phpunit
```