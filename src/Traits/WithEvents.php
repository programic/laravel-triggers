<?php

namespace Programic\Triggers\Traits;

trait WithEvents
{
    public function insert()
    {
        $this->event = 'insert';

        return $this;
    }

    public function delete(): self
    {
        $this->event = 'delete';

        return $this;
    }

    public function update(): self
    {
        $this->event = 'update';

        return $this;
    }

    public function onEvent(string $event): self
    {
        $this->event = $event;

        return $this;
    }

    public function getEvent(): string
    {
        return strtoupper($this->event);
    }
}
