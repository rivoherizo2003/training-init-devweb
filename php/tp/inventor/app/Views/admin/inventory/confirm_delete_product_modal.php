<div class="modal-overlay" id="confirm-delete-product-modal" role="dialog" aria-modal="true">
    <!-- Le conteneur principal de la modale -->
    <div class="modal">
        <div class="modal__header">
            <h2 class="modal__title">Confirmation</h2>
        </div>

        <div class="modal__body">
            <p>Are you sure to delete this product?</p>
            <div class="modal__footer">
                <!-- data-modal-close servira de déclencheur en JS -->
                <button type="button" class="btn btn--outline" data-modal-close>No</button>
                <a href="#" class="btn btn--primary btn-confirm" data-modal-approve>Yes</a>
            </div>
        </div>
    </div>
</div>
