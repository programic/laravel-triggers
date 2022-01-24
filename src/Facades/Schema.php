<?php

namespace Programic\Triggers\Facades;

use Illuminate\Support\Arr;
use Programic\Triggers\MysqlTrigger;
use \Programic\Triggers\Trigger;

class Schema extends \Illuminate\Support\Facades\Schema
{
    public static function createTrigger(string $trigger, $ifNotExists = false): bool
    {
        return (new MysqlTrigger((new $trigger())->run(new Trigger())))->create($ifNotExists);
    }

    public static function createTriggerIfNotExists(string $trigger): bool
    {
        return self::createTrigger($trigger, true);
    }

    public static function dropTrigger(string $trigger): bool
    {
        return (new MysqlTrigger((new $trigger())->run(new Trigger())))->drop();
    }

    public static function dropTriggerIfExists(string|array $trigger): bool
    {
        return (new MysqlTrigger((new $trigger())->run(new Trigger())))->drop(true);
    }
}
