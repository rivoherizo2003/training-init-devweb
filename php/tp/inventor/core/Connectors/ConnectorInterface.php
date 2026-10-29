<?php

declare(strict_types=1);

namespace Codemdg\Core\Connectors;

use Codemdg\Core\Dto\DbConnectorDto;
use PDO;

interface ConnectorInterface{
    function connect(DbConnectorDto $dbConnectorDto):PDO;
}