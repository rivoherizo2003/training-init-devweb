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
                <h2 class="card__stat-subtitle">Categories</h2>
                14<br>
                Last 7 days
            </div>
            <div class="card__stat-item">
                Total products<br>
                14<br>
                Last 7 days
            </div>
            <div class="card__stat-item">
                Total selling<br>
                14<br>
                Last 7 days
            </div>
            <div class="card__stat-item">
                Low stock<br>
                14<br>
                Last 7 days
            </div>
        </div>
    </div>

    <div class="card card--products">
         <h2 class="card__title">Products</h2>
    </div>
</div>

<?php BlockBuilder::endBlock() ?>