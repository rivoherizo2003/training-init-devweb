# TP: Annuaire des Etudiants

Ton objectif est de récupérer une liste d'étudiants depuis un fichier JSON local et de l'afficher sur une page web en séparant bien la logique de requête et la logique d'affichage.

## Ennoncé

- Crée un fichier etudiants.json contenant un tableau de trois objets représentant des étudiants (avec les propriétés : nom, age, filiere).

```json
[
  { "nom": "Alice", "age": 22, "filiere": "Informatique" },
  { "nom": "Bob", "age": 24, "filiere": "Réseaux" },
  { "nom": "Charlie", "age": 21, "filiere": "Design" }
]
```

- Crée un fichier index.html avec un bouton "Charger les étudiants" et une balise div vide (avec un id = results).

- Dans un fichier app.js, écris une fonction requeteAJAX(url, callbackSucces, callbackErreur) qui encapsule la logique de XMLHttpRequest.

    N.B: Utiliser JSON.parse() pour convertir le contenu du fichier en tableau d'objet.

- Écris deux fonctions distinctes (tes callbacks) : l'une pour générer du HTML à partir des données reçues "displayStudents", l'autre pour afficher un message d'erreur "displayErrors".

     N.B: Créer une liste à puce. Mettre dans chaque balise "li" un étudiant (Vous allez devoir boucler sur la liste d'objet étudiants).

- Ajoute un écouteur d'événement sur le bouton pour déclencher la requête et d'afficher la liste d'étudiants dans le div "results".
