<?php

namespace Programic\Triggers\Traits;

trait WithTiming
{
    public function before(): self
    {
        $this->timing = 'before';

        return $this;
    }

    public function after(): self
    {
        $this->timing = 'after';

        return $this;
    }

    public function getTiming(): string
    {
        return strtoupper($this->timing);
    }
}
