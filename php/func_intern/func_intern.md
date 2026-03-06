# Fonction interne PHP

Ne pas utiliser de boucle mais faites des recherches pour trouver la fonction interne de php qui permet de manipuler un tableau.

## Exo 1: Filtrer des données

Objectif : Filtrer les éléments d'un tableau selon une condition (un prédicat) et retourner un tableau contenant uniquement les éléments validés.

À partir d'une liste d'utilisateurs, ne gardez que ceux qui sont majeurs (18 ans ou plus).

```php
$users = [
    ['nom' => 'Alice', 'age' => 25],
    ['nom' => 'Benoit', 'age' => 15],
    ['nom' => 'Claire', 'age' => 18],
    ['nom' => 'David', 'age' => 12],
];
```

## Exo 2 : Condenser des données

Objectif : Réduire un tableau à une seule valeur cumulative (un total, une chaîne concaténée, etc.). C'est une fonction essentielle pour les statistiques.

Calculez le montant total d'un panier d'achat. Chaque article a une quantité et un prix unitaire.

```php
$panier = [
    ['produit' => 'Clavier', 'prix' => 50, 'quantite' => 1],
    ['produit' => 'Souris',  'prix' => 25, 'quantite' => 2],
    ['produit' => 'Écran',   'prix' => 150, 'quantite' => 1],
];

// À faire : Calculer le $totalGlobal
// Résultat attendu: // 250 €
```

## Exo 3: Extraction d'une colonne

Objectif : Extraire toutes les valeurs d'une clé spécifique dans un tableau multidimensionnel. Très utile pour récupérer une liste d'IDs ou de noms.
Énoncé

Vous avez une liste de produits provenant d'une base de données. Vous devez extraire uniquement les noms des produits pour les afficher dans une liste déroulante (select).

```php
$produits = [
    ['id' => 1, 'ref' => 'A12', 'nom' => 'Smartphone'],
    ['id' => 2, 'ref' => 'B45', 'nom' => 'Tablette'],
    ['id' => 3, 'ref' => 'C78', 'nom' => 'Laptop'],
];

// À faire : Extraire uniquement les noms

// Résultat : ['Smartphone', 'Tablette', 'Laptop']
```
