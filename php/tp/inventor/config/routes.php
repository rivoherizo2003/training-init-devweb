<?php

use Codemdg\Core\Http\Route;
use Codemdg\Inventor\Controllers\CategoryController;
use Codemdg\Inventor\Controllers\DashboardController;
use Codemdg\Inventor\Controllers\InventoryController;
use Codemdg\Inventor\Controllers\ProductController;
use Codemdg\Inventor\Controllers\SecurityController;

Route::add(url: '/', className: SecurityController::class, methodName:'showLogin', routeName:'show.login');
Route::add(url: '/logout', className: SecurityController::class, methodName:'logout', routeName:'logout');
Route::add(url:'/admin/dashboard', className: DashboardController::class, methodName:'showDashboard', routeName:'show.dashboard');
Route::add(url:'/admin/inventory', className: InventoryController::class, methodName:'showInventory', routeName:'show.inventory');

//Product
Route::add(url:"/admin/add-product", className:ProductController::class, methodName:"addProduct", routeName:"product.add", methodHttp:"POST");
Route::add(url:"/admin/products", className:ProductController::class, methodName:"listProducts", routeName:"products.list", methodHttp:"GET");
Route::add(url:"/admin/delete", className:ProductController::class, methodName:"deleteProduct", routeName:"product.delete", methodHttp:"GET");
Route::add(url:"/admin/show-edit", className:ProductController::class, methodName:"showEdit", routeName:"product.show.edit", methodHttp:"GET");
Route::add(url:"/admin/save-product", className:ProductController::class, methodName:"saveProduct", routeName:"product.save", methodHttp:"POST");


//Category
Route::add(url:"/admin/categories", className:CategoryController::class, methodName:"getListCategory", routeName:"category.list", methodHttp:"GET");
