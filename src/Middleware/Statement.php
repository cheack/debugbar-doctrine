<?php

declare(strict_types=1);

namespace Cheack\DebugbarDoctrine\Middleware;

use Doctrine\DBAL\Driver\Middleware\AbstractStatementMiddleware;
use Doctrine\DBAL\Driver\Result;
use Doctrine\DBAL\Driver\Statement as StatementInterface;
use Doctrine\DBAL\ParameterType;

class Statement extends AbstractStatementMiddleware
{
    use ExecutionTime;

    /** @var array<mixed> */
    public array $params = [];

    public function __construct(
        StatementInterface $statement,
        private string $sql,
    ) {
        parent::__construct($statement);
    }

    /**
     * {@inheritDoc}
     */
    public function bindValue($param, $value, $type = ParameterType::STRING): void
    {
        $this->params[$param] = $value;

        parent::bindValue($param, $value, $type);
    }

    /**
     * {@inheritDoc}
     */
    public function execute($params = null): Result
    {
        return $this->time(fn () => parent::execute($params), $this->sql, $this->params);
    }
}
