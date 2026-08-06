<?php

use Codemdg\Core\Views\BlockBuilder;

BlockBuilder::extends("admin/default_admin.php");
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
                    <h4 class="card__stat-subtitle">Categories</h4>
                    <div class="card__stat-score">
                        14
                    </div>
                    <span class="text-muted">Last 7 days</span>
                </div>
            </div>
            <div class="card__stat-item">
                <div class="card__stat-item-wrapper">
                    <h4>Total products<h4>
                            14<br>
                            Last 7 days
                </div>
            </div>
            <div class="card__stat-item">
                <div class="card__stat-item-wrapper">
                    <h4 class="card__stat-subtitle">Total selling</h4>
                    14<br>
                    Last 7 days
                </div>
            </div>
            <div class="card__stat-item">
                <div class="card__stat-item-wrapper">
                    <h4>Low stock</h4>
                    14<br>
                    Last 7 days
                </div>
            </div>
        </div>
    </div>

    <div class="card card--products">
        <h2 class="card__title">Products</h2>
    </div>
</div>

<?php BlockBuilder::endBlock() ?>