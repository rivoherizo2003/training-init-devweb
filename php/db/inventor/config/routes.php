<?php

use Codemdg\Core\Http\Route;
use Codemdg\Inventor\Controllers\DashboardController;
use Codemdg\Inventor\Controllers\InventoryController;
use Codemdg\Inventor\Controllers\SecurityController;

Route::add( '/', SecurityController::class, 'showLogin');
Route::add('/dashboard', DashboardController::class, 'showDashboard');
Route::add('/inventory', InventoryController::class, 'showInventory');