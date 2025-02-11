<?php

declare(strict_types=1);

namespace Cheack\DebugbarDoctrine\Middleware;

use Doctrine\DBAL\Driver as DriverInterface;
use Doctrine\DBAL\Driver\Middleware as MiddlewareInterface;

class Middleware implements MiddlewareInterface
{
    public function wrap(DriverInterface $driver): DriverInterface
    {
        return new Driver($driver);
    }
}
