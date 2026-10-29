<?php

declare(strict_types=1);

namespace Codemdg\Core\Connectors;

use Codemdg\Core\Connectors\ConnectorInterface;
use Codemdg\Core\Dto\DbConnectorDto;
use Exception;
use Override;
use PDO;
use PDOException;

class MysqlConnector implements ConnectorInterface
{
    #[Override]
    public function connect(DbConnectorDto $dbConnectorDto): PDO
    {
        try {
            $conn = new PDO(sprintf("mysql:host=%s;dbname=%s", $dbConnectorDto->serverName, $dbConnectorDto->dbname), $dbConnectorDto->username, $dbConnectorDto->dbpassword);
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
            return $conn;
        } catch (PDOException $e) {
            throw new Exception("Connection failed to MySql: " . $e->getMessage());
        }
    }
}
