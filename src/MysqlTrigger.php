<?php

namespace Programic\Triggers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Expression;

class MysqlTrigger
{
    private Trigger $trigger;

    public function __construct(Trigger $trigger)
    {
        $this->trigger = $trigger;
    }

    public function create(bool $ifNotExists): bool
    {
        $queryString = $this->createExpression();

        $statementIfNotExists = ($ifNotExists) ? '[IF NOT EXISTS]' : null;
        $triggerName = $this->trigger->getName();
        $triggerTiming = $this->trigger->getTiming();
        $triggerEvent = $this->trigger->getEvent();
        $table = $this->trigger->getTable();

        return DB::statement("
            CREATE TRIGGER $statementIfNotExists $triggerName
            $triggerTiming $triggerEvent
            ON $table FOR EACH ROW
                $queryString
        ");
    }

    public function execute()
    {
        $queryString = $this->createExpression();

        return DB::statement($queryString);
    }

    public function drop(bool $ifExists = false): bool
    {
        $statementIfExists = ($ifExists) ? '[IF EXISTS]' : null;
        $triggerName = $this->trigger->name();

        return DB::statement("DROP TRIGGER $statementIfExists $triggerName;");
    }

    private function createExpression(): string
    {
        $expression = call_user_func($this->trigger->getStatement());

        if ($expression instanceof Expression) {
            $queryString = $expression->getValue();
        } elseif ($expression instanceof DB) {
            $queryString = $expression->toSql();
        } elseif ($expression instanceof string) {
            $queryString = $expression;
        } else {
            throw new \Exception('expression has wrong instance');
        }

        return $queryString;
    }
}
