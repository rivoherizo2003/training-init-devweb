<?php

use Codemdg\Core\Http\Route;
use Codemdg\Core\Views\BlockBuilder;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventor</title>
    <link rel="stylesheet" href="/assets/css/main.css">

    <?= BlockBuilder::renderBlock("additionnal_css", "") ?>
</head>

<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="sidebar">     
            <div class="sidebar__logo">
                <img src="/assets/images/logo.png" alt="Logo">
                <span>Inventor</span>
            </div>
            <nav class="sidebar__nav">
                <a href="<?=  Route::generateUrl('show.dashboard') ?>" class="sidebar__link <?= BlockBuilder::renderBlock("active_menu_dashboard") ?>"><img src="/assets/images/Home.svg" alt="">Dashboard</a>
                <a href="<?=  Route::generateUrl('show.inventory') ?>" class="sidebar__link <?= BlockBuilder::renderBlock("active_menu_inventory") ?>"><img src="/assets/images/Inventory.svg" alt="">Inventory</a>
                <a href="#" class="sidebar__link"><img src="/assets/images/Report.svg" alt="">Reports</a>
                <a href="#" class="sidebar__link"><img src="/assets/images/Suppliers.svg" alt="">Suppliers</a>
                <a href="#" class="sidebar__link"><img src="/assets/images/Order.svg" alt="">Orders</a>
                <a href="#" class="sidebar__link"><img src="/assets/images/Manage Store.svg" alt="">Manage Store</a>
            </nav>
            <div class="sidebar__bottom">
                <a href="#" class="sidebar__link"><img src="/assets/images/Settings.svg" alt="">Settings</a>
                <a href="<?= Route::generateUrl("logout") ?>" class="sidebar__link"><img src="/assets/images/Log Out.svg" alt="">Log Out</a>
            </div>
        </aside>

        <!-- Main -->
        <div class="admin-main">
            <!-- Header -->
            <header class="header">
                <div class="header__search">
                    <img src="/assets/images/Search.svg" alt="">
                    <input type="text" class="header__search-input" placeholder="Search product, supplier, order">
                </div>
                <div class="header__actions">
                    <img src="/assets/images/Notification.svg" alt="Notifications">
                    <img src="https://i.pravatar.cc/36" alt="Avatar" class="header__avatar">
                </div>
            </header>
            <?= BlockBuilder::renderBlock("content_admin", "") ?>

        </div>
    </div>
    <?= BlockBuilder::renderBlock("additionnal_js", "") ?>
</body>

</html>