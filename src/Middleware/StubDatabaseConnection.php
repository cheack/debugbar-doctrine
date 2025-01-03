<?php

namespace Cheack\DebugbarDoctrine\Middleware;

/**
 * A stub implementation of Laravel's database connection class.
 * This class is used to fulfill the requirement of a database connection
 * when dispatching the `QueryExecuted` event, even though an actual connection
 * is not necessary. It provides a minimal implementation to satisfy the interface.
 */
class StubDatabaseConnection extends \Illuminate\Database\Connection
{
    public function __construct()
    {
    }

    public function getName()
    {
        return null;
    }
}
