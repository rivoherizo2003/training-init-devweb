import Modal from "./components/Modal.js";

// Instanciation de notre objet lors du chargement de la page
document.addEventListener("DOMContentLoaded", () => {
  // Création d'une instance pour la modale d'ajout de produit
  new Modal("add-product-modal");
});
