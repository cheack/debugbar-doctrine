<?php

namespace Cheack\DebugbarDoctrine\Middleware;

use Doctrine\DBAL\Driver as DriverInterface;
use Doctrine\DBAL\Driver\Middleware as MiddlewareInterface;

class Middleware implements MiddlewareInterface
{
    /**
     * {@inheritDoc}
     */
    public function wrap(DriverInterface $driver): DriverInterface
    {
        return new Driver($driver);
    }
}
