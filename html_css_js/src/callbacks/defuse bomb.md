# TP: Defuse bomb

Ton objectif est de créer un mini-jeu de tension. Une bombe est amorcée avec un compte à rebours. Le joueur a un temps limité pour cliquer sur le bouton de désamorçage.

## Ennoncé

- Crée une fonction startGame(duration, onTick) qui retourne une Promise.

- Le paramètre onTick est un callback appelé chaque seconde pour rafraîchir l'interface utilisateur.

- Si le joueur clique sur le bouton "Désamorcer" avant la fin du temps, la Promise est résolue (succès).

- Si le temps tombe à zéro, la Promise est rejetée (échec/explosion).

- Gère le résultat de la Promise avec .then() et .catch() pour afficher le message final.