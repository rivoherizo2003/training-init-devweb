<?php

use Codemdg\Core\Http\Route;
use Codemdg\Inventor\Controllers\CategoryController;
use Codemdg\Inventor\Controllers\DashboardController;
use Codemdg\Inventor\Controllers\InventoryController;
use Codemdg\Inventor\Controllers\SecurityController;

//map url to controller localhost:8000/dashboard
Route::add("/", SecurityController::class, "showLogin", "show.login");
Route::add("/logout", SecurityController::class, "logout", "logout");

Route::add("/admin/inventory", InventoryController::class, "showInventory", "show.inventory");

Route::add("/admin/dashboard", DashboardController::class, "showDashboard", "show.dashboard");

Route::add(url:"/admin/categories", className: CategoryController::class, methodName: "getListCategory", routeName: "category.list");