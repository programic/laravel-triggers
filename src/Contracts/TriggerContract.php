<?php

namespace Programic\Triggers\Contracts;

use \Programic\Triggers\Trigger;

interface TriggerContract
{
    public function run(Trigger $trigger): Trigger;
}
