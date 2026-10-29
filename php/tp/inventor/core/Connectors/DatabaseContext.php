<?php

declare(strict_types=1);

namespace Codemdg\Core\Connectors;

use Codemdg\Core\Dto\DbConnectorDto;
use Exception;
use PDO;

class DatabaseContext
{
    private static ?DatabaseContext $instance = null;

    private ?PDO $pdo = null;
    
    public static function getInstance(): DatabaseContext 
    {
        if(self::$instance === null){
            self::$instance = new DatabaseContext();
        }

        return self::$instance;
    }

    public function connect(ConnectorInterface $connectorDB, DbConnectorDto $dbConnectorDto):void
    {
        if($this->pdo === null){
            if($connectorDB === null){
                throw new Exception("Error: No connection strategy defined", 1);
            }

            $this->pdo = $connectorDB->connect($dbConnectorDto);
        }
    }

    public function getPDO():PDO
    {
        return $this->pdo;
    }
}
