<?php

declare(strict_types=1);

namespace Codemdg\Core\Connectors;

use Codemdg\Core\Dto\DbConnectorDto;
use PDO;

class PostgresqlConnector implements ConnectorInterface{
    public function connect(DbConnectorDto $dbConnectorDto): PDO
    {
        throw new \Exception('PostgreSQL connector not implemented');
    }
}