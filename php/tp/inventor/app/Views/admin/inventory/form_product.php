<?php

use Codemdg\Core\Http\Route;
use Codemdg\Inventor\Dtos\ProductDto;

/** @var ?ProductDto $productEdit  **/
$productDtoEdit = $productDto ?? null;
?>
<!-- Formulaire -->
<form class="form" id="form-product" action="<?= Route::generateUrl("product.save") ?>">
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
            <input class="form__input" type="text" id="product-mame" placeholder="Enter product name" value="<?= $productEditDto->productName ?? "" ?>" name="product-name">
        </div>

    </div>
    <div class="form__group">
        <label class="form__label" for="product-id">Product ID</label>
        <div class="form-control">
            <input class="form__input" type="text" id="product-id" name="product-id" placeholder="Enter product ID" value="<?= $productEditDto->productRef ?? "" ?>" name="">
        </div>

    </div>
    <!-- D'autres champs similaires ici (Category, Buying Price, etc.) -->
    <div class="form__group">
        <label class="form__label" for="category">Category</label>
        <div class="form-control">
            <select class="form__input" name="category-product" id="category" data-url-list-categories="<?= Route::generateUrl("category.list") ?>" data-category-selected="<?= $productEditDto->categoryId ?? "" ?>">
                <option value="">Select product category</option>
            </select>
        </div>
    </div>

    <div class="form__group">
        <label class="form__label" for="buying-price">Buying Price</label>
        <input class="form__input" type="number" id="buying-price" name="buying-price" placeholder="Enter buying price" value="<?= $productEditDto->buyingPrice ?? "" ?>">
    </div>

    <div class="form__group">
        <label class="form__label" for="quantity">Quantity</label>
        <input class="form__input" name="quantity" type="number" value="<?= $productEditDto->quantity ?? 0 ?>" id="quantity" value="" placeholder="Enter quantity">
    </div>

    <div class="form__group">
        <label class="form__label" for="unit">Unit</label>
        <input class="form__input" type="text" name="unit" id="unit" placeholder="Enter product unit" value="<?= $productEditDto->unit ?? "" ?>">
    </div>

    <div class="form__group">
        <label class="form__label" for="expiry-date">Expiry date</label>
        <input class="form__input" name="expiry-date" type="date" value="<?= $productEditDto->expiryDate ?? "" ?>" id="expiry-date" placeholder="Enter expiry date">
    </div>

    <div class="form__group">
        <label class="form__label" for="threshold-value">Threshold Value</label>
        <input class="form__input" type="number" name="threshold-value" value="<?= $productEditDto->thresholdvalue ?? "" ?>" id="threshold-value" placeholder="Enter threshold value">
    </div>

    <div class="modal__footer">
        <!-- data-modal-close servira de déclencheur en JS -->
        <button type="button" class="btn btn--outline" data-modal-close>Discard</button>
        <button type="submit" class="btn btn--primary">Save</button>
    </div>
