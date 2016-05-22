<?php

namespace codeonyii\gerencianet\models;

use yii\base\Model;

class Metadata extends Model
{
    /**
     * @var string
     */
    public $custom_id;

    /**
     * @var int
     */
    public $notification_url;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['custom_id', 'notification_url'], 'required'],
            [['custom_id'], 'string'],
            [['notification_url'], 'url'],
        ];
    }
}
