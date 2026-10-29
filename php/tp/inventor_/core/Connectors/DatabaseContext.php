<?php

declare(strict_types=1);

namespace Codemdg\Core\Connectors;

use Codemdg\Core\Dto\DbConnectorDto;
use PDO;

class DatabaseContext
{
    private ?PDO $pdo = null;

    private static ?DatabaseContext $instance = null;
    
    public static function getInstance(): DatabaseContext
    {
        if(self::$instance === null){
            self::$instance = new DatabaseContext();
        }

        return self::$instance;
    }


    public function connect(ConnectorInterface $connectorDB, DbConnectorDto $dbConnectorDto): void {
        if($this->pdo === null){
            $this->pdo = $connectorDB->connect($dbConnectorDto);
        }
    }

    public function getPDO():PDO
    {
        return $this->pdo;
    }
}
