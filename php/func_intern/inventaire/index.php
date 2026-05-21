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

/**
 * Calcule la valeur totale d'un inventaire
 * @param array $items
 * @return float
 */
function calculerValeurStock(array $items): float {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['prix'] * $item['quantite'];
    }
    return $total;
}

$valeurTotale = calculerValeurStock($inventaire);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion de Stock</title>
    <style>
        table { border-collapse: collapse; width: 60%; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .alerte { color: #d9534f; font-weight: bold; background-color: #f9f2f2; }
        .total-row { background-color: #eee; font-weight: bold; }
    </style>
</head>
<body>

    <h1>Inventaire de la boutique</h1>

    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix Unitaire</th>
                <th>Quantité</th>
                <th>Sous-total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inventaire as $produit): ?>
                <?php 
                    // Logique d'affichage spécifique
                    $estEnAlerte = $produit['quantite'] < 5;
                    $sousTotal = $produit['prix'] * $produit['quantite'];
                ?>
                <tr class="<?= $estEnAlerte ? 'alerte' : '' ?>">
                    <td><?= htmlspecialchars($produit['nom']) ?></td>
                    <td><?= number_format($produit['prix'], 2) ?> €</td>
                    <td><?= $produit['quantite'] ?></td>
                    <td><?= number_format($sousTotal, 2) ?> €</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="3">Valeur totale du stock</td>
                <td><?= number_format($valeurTotale, 2) ?> €</td>
            </tr>
        </tfoot>
    </table>

</body>
</html>