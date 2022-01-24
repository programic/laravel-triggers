<?php

namespace Programic\Triggers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Programic\Triggers\Traits\WithTiming;
use Programic\Triggers\Traits\WithEvents;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

class Trigger
{
    use WithTiming;
    use WithEvents;

    private string $name;
    private string $table;
    private string $timing;
    private string $event;
    private $statement;

    public function create(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function on(string $table): self
    {
        $this->table = $table;

        return $this;
    }

    public function statement(callable $statement): self
    {
        $this->statement = $statement;

        return $this;
    }

    public function getName(): string
    {
        return Str::snake($this->name);
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function getStatement(): callable
    {
        return $this->statement;
    }
}
