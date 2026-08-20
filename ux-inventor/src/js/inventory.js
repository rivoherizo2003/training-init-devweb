class Modal{
    constructor(modalId){
        this.modalElement = document.getElementById(modalId);

        if(!this.modalElement){
            console.error(`Modal ${modalId} not exists`);
            return;
        }

        this.open = this.open.bind(this);
        this.close = this.close.bind(this);

        this._initEventListeners();
    }

    _initEventListeners(){
        const triggers = document.querySelectorAll(`[data-modal-target="${this.modalElement.id}"]`);
        triggers.forEach(trigger => {
            trigger.addEventListener("click", this.open);
        });

        // Trouver tous les boutons "fermer" à l'intérieur de cette modale
        const closeButtons = this.modalElement.querySelectorAll('[data-modal-close]');
        closeButtons.forEach(btn => {
            btn.addEventListener('click', this.close);
        });

        // Fermer la modale si on clique sur l'arrière-plan (l'overlay)
        this.modalElement.addEventListener('click', (event) => {
            if (event.target === this.modalElement) {
                this.close();
            }
        });
    }

    open() {
        this.modalElement.classList.add('modal-overlay--active');
    }

    close() {
        this.modalElement.classList.remove('modal-overlay--active');
    }
}

// Instanciation de notre objet lors du chargement de la page
document.addEventListener('DOMContentLoaded', () => {
    // Création d'une instance pour la modale d'ajout de produit
    const addProductModal = new Modal('add-product-modal');
});