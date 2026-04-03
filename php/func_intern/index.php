<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $adultes = array_filter($utilisateurs, fn($user) => $user['age'] >= 18);
    // $adultes = [
//     ['nom' => 'Alice', 'age' => 25],
//     ['nom' => 'Claire', 'age' => 18],
// ];
    // Note : array_filter préserve les clés d'origine. 
    // Utilisez array_values($adultes) si vous voulez réindexer de 0 à N.
    // sum = sum+note;
    $panier = [
        ['produit' => 'Clavier', 'prix' => 50, 'quantite' => 1],
        ['produit' => 'Souris', 'prix' => 25, 'quantite' => 2],
        ['produit' => 'Écran', 'prix' => 150, 'quantite' => 1],
    ];

    $totalGlobal = array_reduce($panier, function ($accumulateur, $item) {
        return $accumulateur + ($item['prix'] * $item['quantite']);
    }, 0); // 0 est la valeur initiale de l'accumulateur
    
    echo "Total du panier : $totalGlobal €"; // 250 €
    
    $produits = [
        ['id' => 1, 'ref' => 'A12', 'nom' => 'Smartphone'],
        ['id' => 2, 'ref' => 'B45', 'nom' => 'Tablette'],
        ['id' => 3, 'ref' => 'C78', 'nom' => 'Laptop'],
    ];

    // À faire : Extraire uniquement les noms
    $nomsSeuls = array_column($produits, 'nom');

    // Résultat : ['Smartphone', 'Tablette', 'Laptop']
    ?>
    <p>
        array_map,Transformation de chaque item,Un tableau de même taille<br>
        array_filter,Tri/Sélection selon condition,Un tableau plus court (ou vide)<br>
        array_reduce,"Agrégation (somme, concaténation)","Une seule valeur (int, string, etc.)"<br>
        array_column,Extraction d'une propriété,Un tableau simple (1D)
    </p>
</body>

</html>