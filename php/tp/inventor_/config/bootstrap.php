<?php

use Codemdg\Core\Connectors\DatabaseContext;
use Codemdg\Core\Connectors\MysqlConnector;
use Codemdg\Core\Dto\DbConnectorDto;

session_start();

require_once ROOT . "/config/config.php";

$databaseContext = DatabaseContext::getInstance();

$databaseContext->connect(new MysqlConnector(), new DbConnectorDto(
    serverName: $databaseCredentials["host"],
    dbname: $databaseCredentials["dbname"],
    username: $databaseCredentials["user"],
    dbpassword: $databaseCredentials["password"]
));
