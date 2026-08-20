<?php

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
            <table class="table-list-products">
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
                    <!-- Produit 1 -->
                    <tr>
                        <td>Sucre en poudre</td>
                        <td>$150</td>
                        <td>120 Packets</td>
                        <td>20 Packets</td>
                        <td>01/10/2027</td>
                        <td><span class="text-success">In-stock</span></td>
                        <td></td>
                    </tr>

                    <!-- Produit 2 -->
                    <tr>
                        <td>Sel fin</td>
                        <td>$45</td>
                        <td>10 Packets</td>
                        <td>15 Packets</td>
                        <td>12/05/2028</td>
                        <td><span class="text-warning">Low stock</span></td>
                        <td></td>
                    </tr>

                    <!-- Produit 3 -->
                    <tr>
                        <td>Concentré de Tomate</td>
                        <td>$320</td>
                        <td>0 Packets</td>
                        <td>10 Packets</td>
                        <td>15/11/2026</td>
                        <td><span class="text-danger">Out of stock</span></td>
                        <td></td>
                    </tr>

                    <!-- Produit 4 -->
                    <tr>
                        <td>Lait en poudre</td>
                        <td>$890</td>
                        <td>65 Packets</td>
                        <td>20 Packets</td>
                        <td>04/09/2027</td>
                        <td><span class="text-success">In-stock</span></td>
                        <td></td>
                    </tr>

                    <!-- Produit 5 -->
                    <tr>
                        <td>Café soluble</td>
                        <td>$1050</td>
                        <td>5 Packets</td>
                        <td>10 Packets</td>
                        <td>20/01/2028</td>
                        <td><span class="text-warning">Low stock</span></td>
                        <td></td>
                    </tr>

                    <!-- Produit 6 -->
                    <tr>
                        <td>Sachets de Thé</td>
                        <td>$210</td>
                        <td>80 Packets</td>
                        <td>15 Packets</td>
                        <td>30/08/2027</td>
                        <td><span class="text-success">In-stock</span></td>
                        <td></td>
                    </tr>

                    <!-- Produit 7 -->
                    <tr>
                        <td>Biscuits secs</td>
                        <td>$180</td>
                        <td>200 Packets</td>
                        <td>50 Packets</td>
                        <td>12/12/2026</td>
                        <td><span class="text-success">In-stock</span></td>
                        <td></td>
                    </tr>

                    <!-- Produit 8 -->
                    <tr>
                        <td>Tablettes de Chocolat</td>
                        <td>$560</td>
                        <td>0 Packets</td>
                        <td>20 Packets</td>
                        <td>05/05/2027</td>
                        <td><span class="text-danger">Out of stock</span></td>
                        <td></td>
                    </tr>

                    <!-- Produit 9 -->
                    <tr>
                        <td>Beurre doux</td>
                        <td>$430</td>
                        <td>8 Packets</td>
                        <td>15 Packets</td>
                        <td>10/10/2026</td>
                        <td><span class="text-warning">Low stock</span></td>
                        <td></td>
                    </tr>

                    <!-- Produit 10 -->
                    <tr>
                        <td>Fromage râpé</td>
                        <td>$670</td>
                        <td>42 Packets</td>
                        <td>10 Packets</td>
                        <td>25/11/2026</td>
                        <td><span class="text-success">In-stock</span></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="product-list-footer">
            <button type="button" class="btn btn--outline">Previous</button>
            <p>Page 1 of 10</p>
            <button type="button" class="btn btn--outline">Next</button>
        </div>
    </div>
</div>

<div class="modal-overlay" id="add-product-modal" role="dialog" aria-modal="true">

    <!-- Le conteneur principal de la modale -->
    <div class="modal">
        <div class="modal__header">
            <h2 class="modal__title">New Product</h2>
        </div>

        <div class="modal__body">
            <!-- Zone d'upload d'image (simplifiée pour l'exemple) -->
            <div class="modal__upload">
                <div class="modal__dropzone"></div>
                <div class="modal__uploader">
                    <p><span class="text-gray-light">Drag image here</span><br>or<br> <a href="#"
                            class="text-primary">Browse image</a></p>
                    <input type="file" name="file-product" id="" class="d-none">
                </div>
            </div>

            <!-- Formulaire -->
            <form class="form" id="addProductForm">
                <div class="form__group">
                    <label class="form__label" for="productName">Product Name</label>
                    <input class="form__input" type="text" id="productName" placeholder="Enter product name">
                </div>
                <div class="form__group">
                    <label class="form__label" for="productId">Product ID</label>
                    <input class="form__input" type="text" id="productId" placeholder="Enter product ID">
                </div>
                <!-- D'autres champs similaires ici (Category, Buying Price, etc.) -->
                <div class="form__group">
                    <label class="form__label" for="category">Category</label>
                    <select class="form__input" id="category">
                        <option value="">Select product category</option>
                    </select>
                </div>

                <div class="form__group">
                    <label class="form__label" for="buying-price">Buying Price</label>
                    <input class="form__input" type="text" id="buying-price" placeholder="Enter buying price">
                </div>

                <div class="form__group">
                    <label class="form__label" for="quantity">Quantity</label>
                    <input class="form__input" type="text" id="quantity" placeholder="Enter quantity">
                </div>

                <div class="form__group">
                    <label class="form__label" for="unit">Unit</label>
                    <input class="form__input" type="text" id="unit" placeholder="Enter product unit">
                </div>

                <div class="form__group">
                    <label class="form__label" for="expiry-date">Expiry date</label>
                    <input class="form__input" type="text" id="expiry-date" placeholder="Enter expiry date">
                </div>

                <div class="form__group">
                    <label class="form__label" for="threshold-value">Threshold Value</label>
                    <input class="form__input" type="text" id="threshold-value" placeholder="Enter threshold value">
                </div>

                <div class="modal__footer">
                    <!-- data-modal-close servira de déclencheur en JS -->
                    <button type="button" class="btn btn--outline" data-modal-close>Discard</button>
                    <button type="submit" class="btn btn--primary">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php BlockBuilder::endBlock() ?>

<?php
BlockBuilder::startBlock("additionnal_js");
?>
<script src="<?= APP_URL ?>/assets/js/inventory.js"></script>
<?php
BlockBuilder::endBlock();
?>