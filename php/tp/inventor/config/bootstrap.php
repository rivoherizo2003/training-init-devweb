<?php

use Codemdg\Core\Connectors\DatabaseContext;
use Codemdg\Core\Connectors\MysqlConnector;
use Codemdg\Core\Dto\DbConnectorDto;
use Codemdg\Core\Enum\HttpCode;

session_set_cookie_params([
    'lifetime' => 0,            // Le cookie expire à la fermeture du navigateur
    'path' => '/',
    'domain' => '',             // Laissez vide pour le domaine actuel
    'secure' => false,           // Le cookie ne voyage que sur HTTPS (essentiel en prod)
    'httponly' => true,         // 🛡️ INTERDIT la lecture via JavaScript (Anti-XSS)
    'samesite' => 'Lax'         // 🛡️ Protège contre les attaques CSRF
]);

set_error_handler(function(int $severity, string $message, string $file, int $line) {
    if (!(error_reporting() & $severity)) {//0010 & 0110 => 0010
       return;
    }
    throw new \ErrorException($message, 0, $severity, $file, $line);
});

set_exception_handler(function(\Throwable $e){
    http_response_code(HttpCode::INTERNAL_SERVER_ERROR->value);

    header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'error' => 'Internal Server Error',
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]);
        exit;
});

session_start();

require_once ROOT . "/config/config.php";

$databaseContext = DatabaseContext::getInstance();

$databaseContext->connect(new MysqlConnector(), new DbConnectorDto($databaseCredentials["host"], $databaseCredentials["dbname"], $databaseCredentials["user"], $databaseCredentials["password"]));
