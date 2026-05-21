# Énoncé : Gestion d'un inventaire de Stock

Vous travaillez pour une boutique en ligne. Vous devez gérer un petit inventaire de produits. Chaque produit est défini par son nom, son prix unitaire et sa quantité en stock.

## Objectifs :

    Créer un tableau multidimensionnel (un tableau contenant des tableaux associatifs) nommé $inventaire.

    Ajouter au moins 3 produits (ex: "Clavier", "Souris", "Moniteur").

    Calculer la valeur totale du stock (somme de : prix × quantité pour chaque produit).

    Afficher l'inventaire dans un tableau HTML propre.

    Ajouter une condition visuelle : si la quantité d'un produit est inférieure à 5, afficher le nom du produit en rouge  pour indiquer une "Alerte Stock".

    ```php
    <?php
        // 1. Définition des données (La Logique)
        $inventaire = [
            [
                "nom" => "Clavier Mécanique",
                "prix" => 89.90,
                "quantite" => 12
            ],
            [
                "nom" => "Souris Sans Fil",
                "prix" => 45.00,
                "quantite" => 3 // Alerte stock
            ],
            [
                "nom" => "Écran 27 pouces",
                "prix" => 249.00,
                "quantite" => 7
            ],
            [
                "nom" => "Tapis de souris XXL",
                "prix" => 15.00,
                "quantite" => 2 // Alerte stock
            ]
            
        ]; 
    ```
