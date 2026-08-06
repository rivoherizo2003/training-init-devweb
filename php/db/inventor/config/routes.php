<?php

use Codemdg\Core\Http\Route;
use Codemdg\Inventor\Controllers\DashboardController;
use Codemdg\Inventor\Controllers\InventoryController;
use Codemdg\Inventor\Controllers\SecurityController;

Route::add(url: '/', className: SecurityController::class, methodName:'showLogin', routeName:'show.login');
Route::add(url: '/logout', className: SecurityController::class, methodName:'logout', routeName:'logout');
Route::add(url:'/admin/dashboard', className: DashboardController::class, methodName:'showDashboard', routeName:'show.dashboard');
Route::add(url:'/admin/inventory', className: InventoryController::class, methodName:'showInventory', routeName:'show.inventory');