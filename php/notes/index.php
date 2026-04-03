<?php
declare(strict_types=1);

/**
 * Calcule la moyenne d'un tableau de notes.
 * * @param int[] $notes
 * @return float
 */
function calculerMoyenne(array $notes): float {
    if (empty($notes)) {
        return 0.0;
    }
    return array_sum($notes) / count($notes);
}

/**
 * Retourne une appréciation basée sur la moyenne.
 */
function genererAppreciation(float $moyenne): string {
    return match (true) {
        $moyenne >= 16 => 'Excellent',
        $moyenne >= 12 => 'Bien',
        $moyenne >= 10 => 'Passable',
        default        => 'Insuffisant',
    };
}

// Données d'entrée
$etudiants = [
    [
        'nom'   => 'Alice Dupont',
        'notes' => [15, 18, 14]
    ],
    [
        'nom'   => 'Marc Stevens',
        'notes' => [8, 10, 9]
    ],
    [
        'nom'   => 'Sophie Martin',
        'notes' => [12, 13, 11]
    ]
];
// foreach($etudiants as $etudiant)
// $etudiant = [
    //     'nom'   => 'Alice Dupont',
    //     'notes' => [15, 18, 14]
    // ]
    // $etudiant['notes'] -> [15,18,14]
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats Étudiants</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; }
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Bulletin de notes</h1>
    <table>
        <thead>
            <tr>
                <th>Étudiant</th>
                <th>Moyenne</th>
                <th>Appréciation</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $etudiant) : 
                $moyenne = calculerMoyenne($etudiant['notes']);
                $appreciation = genererAppreciation($moyenne);
            ?>
            
                <tr>
                    <td><?= htmlspecialchars($etudiant['nom']) ?></td>
                    <td><?= number_format($moyenne, 2) ?> / 20</td>
                    <td><strong><?= $appreciation ?></strong></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>