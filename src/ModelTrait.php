<?php

namespace QuanKim\DynamoDb;

use Illuminate\Support\Facades\App;

trait ModelTrait
{
    public static function boot()
    {
        parent::boot();

        $observer = static::getObserverClassName();

        static::observe(new $observer(
            App::make('QuanKim\DynamoDb\DynamoDbClientInterface')
        ));
    }

    public static function getObserverClassName()
    {
        return 'QuanKim\DynamoDb\ModelObserver';
    }

    public function getDynamoDbTableName()
    {
        return $this->getTableName();
    }
}
