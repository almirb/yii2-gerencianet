<?php

namespace tests\models;

use codeonyii\gerencianet\models\Metadata;
use Yii;

/**
 * Class MetadataTest
 *
 * @package tests\models
 */
class MetadataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test whether metadata is created with given values
     */
    public function testCreate ()
    {
        $model = new Metadata([
            'custom_id' => 'Product 0001',
            'notification_url' => 'http://my_domain.com/notification'
        ]);

        $this->assertTrue($model->validate());
    }

    /**
     * test whether metadata is created with api
     */
    public function testCreateWithApi ()
    {
        $result = Yii::$app->gerencianet->addMetadata([
            'custom_id' => 'Product 0001',
            'notification_url' => 'http://my_domain.com/notification'
        ]);

        $this->assertTrue($result);
    }
}