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


            <!-- Formulaire -->
            <form class="form" id="form-add-product" action="<?= Route::generateUrl("product.add") ?>">
                <div class="modal__upload">
                    <div class="modal__dropzone">
                        <img src="" id="img-preview" width="200px" class="d-none" alt="" srcset="">
                    </div>
                    <div class="modal__uploader">
                        <p><span class="text-gray-light">Drag image here</span><br>or<br> <a href="#" id="hrf-upload-file"
                                class="text-primary">Browse image</a></p>
                        <input type="file" name="file-product" id="file-product" class="d-none" accept="image/*">
                    </div>
                </div>
                <div class="form__group">
                    <label class="form__label" for="product-mame">Product Name</label>
                    <div class="form-control">
                        <input class="form__input" type="text" id="product-mame" placeholder="Enter product name" value="Stylos" name="product-name">
                    </div>

                </div>
                <div class="form__group">
                    <label class="form__label" for="product-id">Product ID</label>
                    <div class="form-control">
                        <input class="form__input" type="text" id="product-id" name="product-id" placeholder="Enter product ID" value="<?= "P" . rand(100000, 900000) ?>" name="">
                    </div>

                </div>
                <!-- D'autres champs similaires ici (Category, Buying Price, etc.) -->
                <div class="form__group">
                    <label class="form__label" for="category">Category</label>
                    <div class="form-control">
                        <select class="form__input" name="category-product" id="category" data-url-list-categories="<?= Route::generateUrl("category.list") ?>">
                            <option value="">Select product category</option>
                        </select>
                    </div>
                </div>

                <div class="form__group">
                    <label class="form__label" for="buying-price">Buying Price</label>
                    <input class="form__input" type="number" id="buying-price" name="buying-price" placeholder="Enter buying price" value="<?= rand(2000, 9000) ?>">
                </div>

                <div class="form__group">
                    <label class="form__label" for="quantity">Quantity</label>
                    <input class="form__input" name="quantity" type="number" value="<?= rand(2000, 9000) ?>" id="quantity" value="" placeholder="Enter quantity">
                </div>

                <div class="form__group">
                    <label class="form__label" for="unit">Unit</label>
                    <input class="form__input" type="text" name="unit" id="unit" placeholder="Enter product unit" value="pcs">
                </div>

                <div class="form__group">
                    <label class="form__label" for="expiry-date">Expiry date</label>
                    <input class="form__input" name="expiry-date" type="date" value="2029-09-09" id="expiry-date" placeholder="Enter expiry date">
                </div>

                <div class="form__group">
                    <label class="form__label" for="threshold-value">Threshold Value</label>
                    <input class="form__input" type="number" name="threshold-value" value="<?= rand(10, 90) ?>" id="threshold-value" placeholder="Enter threshold value">
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
