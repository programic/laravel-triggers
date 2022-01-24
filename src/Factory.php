<?php

namespace Programic\Triggers;

use Programic\Triggers\Contracts\TriggerContract;

abstract class Factory implements TriggerContract
{
    public function run(Trigger $trigger): Trigger
    {
        return $trigger;
    }
}
