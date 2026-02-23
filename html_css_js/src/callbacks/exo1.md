# Exercice 1 : La base (Fonction de rappel synchrone)

## Énoncé

Créez une fonction nommée processString qui prend deux paramètres

- Une chaîne de caractères (ex: un nom).

- Une fonction de callback.

La fonction processString doit afficher "Traitement en cours..." dans la console, puis exécuter la callback en lui passant la chaîne de caractères. Ensuite, créez deux fonctions simples à utiliser comme callbacks :

- toUpperCaseCallback : convertit la chaîne en majuscules et l'affiche.

- lengthCallback : affiche la longueur de la chaîne.