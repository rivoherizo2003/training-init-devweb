<?php

use Codemdg\Core\Http\Route;
use Codemdg\Core\Views\BlockBuilder;

BlockBuilder::extends("admin/default_admin.php");
BlockBuilder::startBlock("active_menu_inventory");
echo "sidebar__link--active";
BlockBuilder::endBlock();
BlockBuilder::startBlock("additionnal_css");
?>
<link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/assets/css/inventory.css">
<?php
BlockBuilder::endBlock();
BlockBuilder::startBlock("content_admin");
?>
<div class="inventory-content">
    <div class="card card--inventory">
        <h2 class="card__title">Overall inventory</h2>
        <div class="card__stats">
            <div class="card__stat-item">
                <div class="card__stat-item-wrapper">
                    <h4 class="text-primary">Categories</h4>
                    <div class="card__stat-score">
                        14
                    </div>
                    <span class="text-gray-light">Last 7 days</span>
                </div>
            </div>
            <div class="card__stat-item">
                <div class="card__stat-item-wrapper">
                    <h4 class="text-warning">Total products<h4>
                            14<br>
                            <span class="text-gray-light">Last 7 days</span>
                </div>
            </div>
            <div class="card__stat-item">
                <div class="card__stat-item-wrapper">
                    <h4 class="text-purple">Total selling</h4>
                    14<br>
                    <span class="text-gray-light">Last 7 days</span>
                </div>
            </div>
            <div class="card__stat-item">
                <div class="card__stat-item-wrapper">
                    <h4 class="text-light-red">Low stock</h4>
                    14<br>
                    <span class="text-gray-light">Last 7 days</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-products">
        <div class="card-products__header">
            <h2 class="card__title">Products</h2>
            <button class="btn btn--primary" data-modal-target="add-product-modal">
                Add Product
            </button>
        </div>
        <div class="card-products__list">
            <table class="table-list-products" id="table-products" data-url-list-products="<?= Route::generateUrl("products.list") ?>">
                <thead>
                    <tr>
                        <th>Products</th>
                        <th>Buying Price</th>
                        <th>Quantity</th>
                        <th>Threshold Value</th>
                        <th>Expiry Date</th>
                        <th>Availability</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="product-list-footer">
            <button type="button" class="btn btn--outline" id="btn-previous">Previous</button>
            <p>Page <span id="spn-current-page">1</span> of <span id="spn-total-pages">10</span></p>
            <button type="button" class="btn btn--outline" id="btn-next">Next</button>
        </div>
    </div>
</div>
<?php
BlockBuilder::include("admin/inventory/add_product_modal.php");
BlockBuilder::include("admin/inventory/confirm_delete_product_modal.php");
BlockBuilder::include("admin/inventory/edit_product_modal.php");
?>

<?php BlockBuilder::endBlock() ?>

<?php
BlockBuilder::startBlock("additionnal_js");
?>
<script type="module" src="<?= APP_URL ?>/assets/js/inventory.js"></script>
<script type="module" src="<?= APP_URL ?>/assets/js/product.js"></script>
<?php
BlockBuilder::endBlock();
?>
