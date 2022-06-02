<?php

namespace Programic\Triggers\Facades;

use Illuminate\Support\Facades\Schema as DefaultSchema;
use Programic\Triggers\MysqlTrigger;
use \Programic\Triggers\Trigger;

class Schema extends DefaultSchema
{
    public static function trigger($trigger)
    {
        return (new MysqlTrigger($trigger))->execute();
    }

    public static function createTrigger(string $trigger, $ifNotExists = false): bool
    {
        return (new MysqlTrigger((new $trigger())->run(new Trigger())))->create($ifNotExists);
    }

    public static function createTriggerIfNotExists(string $trigger): bool
    {
        return self::createTrigger($trigger, true);
    }

    public static function recreateTrigger(string $trigger, $ifExists = false): bool
    {
        self::dropTrigger($trigger, $ifExists);

        return self::createTrigger($trigger);
    }

    public static function dropTrigger(string $trigger, $ifExists = false): bool
    {
        return (new MysqlTrigger((new $trigger())->run(new Trigger())))->drop($ifExists);
    }

    public static function dropTriggerIfExists(string|array $trigger): bool
    {
        return self::dropTrigger($trigger, true);
    }
}
