<?php

use Codemdg\Core\Http\RequestResolver;
use Codemdg\Core\Http\Route;

define('ROOT', dirname(__DIR__));

require_once ROOT . "/vendor/autoload.php";
require_once ROOT . "/config/bootstrap.php";
require_once ROOT . "/config/routes.php";

$requestResolve = new RequestResolver(Route::getRoutes());
$requestResolve->resolve($_SERVER['REQUEST_URI']);