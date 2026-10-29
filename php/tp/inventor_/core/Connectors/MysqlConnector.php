<?php

declare(strict_types=1);

namespace Codemdg\Core\Connectors;

use Codemdg\Core\Dto\DbConnectorDto;
use Exception;
use PDO;
use PDOException;

class MysqlConnector implements ConnectorInterface{
    public function connect(DbConnectorDto $dbConnectorDto): PDO
    {
        try {
            $dsn  = sprintf("mysql:host=%s;dbname=%s", $dbConnectorDto->getServerName(), $dbConnectorDto->getDbname());

            $pdo = new PDO($dsn, $dbConnectorDto->getUsername(), $dbConnectorDto->getDbpassword());

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (PDOException $e) {
            throw new Exception("Connection failed to MySql: " . $e->getMessage());
        }
    }
}