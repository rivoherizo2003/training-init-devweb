# Exercice 3 : Simulation Asynchrone (Le "Callback Hell" simulé)

## Objectif : Comprendre l'utilité des callbacks pour gérer des tâches qui prennent du temps (simulation d'appel réseau) et gérer les erreurs

### Énoncé

Nous allons simuler le téléchargement d'un fichier utilisateur. Créez une fonction downloadUserFile qui prend 3 paramètres:

- filePath (string).
- successCallback (fonction à appeler si tout se passe bien).
- errorCallback (fonction à appeler en cas d'échec).

## Contraintes

Utilisez setTimeout pour simuler un délai de 2 secondes. À l'intérieur du timeout, simulez une condition aléatoire :

- Si le chemin du fichier est vide ou null, appelez errorCallback avec le message "Chemin invalide".

- Sinon, appelez successCallback avec le message "Fichier [nom] téléchargé avec succès".

- Le code appelant doit gérer les deux cas (succès et erreur).
