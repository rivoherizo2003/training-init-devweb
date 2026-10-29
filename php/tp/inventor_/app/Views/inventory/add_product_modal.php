<?php

use Codemdg\Core\Http\Route;
?>
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
                    <select class="form__input" data-url-list-categories="<?= Route::generateUrl("category.list") ?>"
                    id="category">
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