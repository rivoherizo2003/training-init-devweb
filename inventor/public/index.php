<?php
require  dirname(__DIR__) . "/vendor/autoload.php";

use App\Controllers\HelloworldController;

$helloController = new HelloworldController();
$helloController->index();
var_dump("helloworld here");
