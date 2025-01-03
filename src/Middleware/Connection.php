<?php

declare(strict_types=1);

namespace Cheack\DebugbarDoctrine\Middleware;

use Doctrine\DBAL\Driver\Middleware\AbstractConnectionMiddleware;
use Doctrine\DBAL\Driver\Result;
use Doctrine\DBAL\Driver\Statement as StatementInterface;

class Connection extends AbstractConnectionMiddleware
{
    use ExecutionTime;

    public function prepare(string $sql): StatementInterface
    {
        return new Statement(parent::prepare($sql), $sql);
    }

    public function query(string $sql): Result
    {
        return $this->time(fn () => parent::query($sql), $sql);
    }
}
