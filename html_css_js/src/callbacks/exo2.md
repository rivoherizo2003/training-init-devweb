# Exercice 2 : La Calculatrice Modulaire

## Objectif : Comprendre comment une callback permet de changer le comportement d'une fonction sans modifier son code interne

### Énoncé

Vous devez créer un système de calcul flexible.

Créez une fonction "maître" nommée calculer. Elle doit accepter trois paramètres :

- nombre1 (nombre)
- nombre2 (nombre)
- operationCallback (une fonction qui définit l'opération mathématique à effectuer).

La fonction calculer doit retourner le résultat de l'exécution de operationCallback avec les deux nombres.

Créez deux fonctions de rappel nommées addition et multiplication.

Utilisez calculer pour faire une addition (5 + 3) et une multiplication (5 * 3).

Bonus : Appelez calculer avec une fonction anonyme (fléchée) directement dans les arguments pour effectuer une soustraction, sans créer de fonction nommée au préalable.