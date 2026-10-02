# Énoncé 1

Créez un tableau php $students a partir du fichier students-v2.json. Chaque étudiant est un tableau associatif avec un nom, filière et une liste de notes (un tableau d'entiers).

Créez une fonction computeAvg(array $notes): float qui retourne la moyenne d'un tableau de notes.

Créez une fonction getMention(float $moyenne): string qui retourne :

    - "Excellent" si moyenne≥16

    - "Bien" si moyenne≥12

    - "Passable" si moyenne≥10

    - "Insuffisant" sinon.

Pour les mentions créer un Enum(faites des recherches).

Affichez les résultats dans une page HTML propre(Utiliser une balise table).