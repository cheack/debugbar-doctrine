<?php

declare(strict_types=1);

namespace Cheack\DebugbarDoctrine\Middleware;

use Illuminate\Database\Events\QueryExecuted;

use function microtime;

trait ExecutionTime
{
    /**
     * Measure the execution time of a callable and log it as a query execution event.
     */
    protected function time(callable $callable, string $sql, array|null $params = null): mixed
    {
        $start  = microtime(true);
        $result = $callable();
        $end    = microtime(true);

        event(new QueryExecuted($sql, $params ?: [], ($end - $start) * 1000, new StubDatabaseConnection()));

        return $result;
    }
}
