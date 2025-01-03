<?php

namespace Cheack\DebugbarDoctrine\Middleware;

use Doctrine\DBAL\Driver\Middleware\AbstractDriverMiddleware;

class Driver extends AbstractDriverMiddleware
{
    /**
     * {@inheritDoc}
     */
    public function connect(array $params): Connection
    {
        return new Connection(parent::connect($params));
    }
}
