<?php

namespace Programic\Triggers\Facades;

use Illuminate\Support\Facades\Facade;

class Trigger extends Facade
{

    /**
     * Get a task builder instance.
     *
     * @return \Illuminate\Database\Schema\Builder
     */
    protected static function getFacadeAccessor()
    {
        return 'trigger';
    }
}
