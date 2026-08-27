# TP: Annuaire des Etudiants

Ton objectif est de récupérer une liste d'étudiants depuis un fichier JSON local et de l'afficher sur une page web en séparant bien la logique de requête et la logique d'affichage.

## Ennoncé

- Utiliser le fichier students-v1.json contenant un tableau de 250 000 objets représentant des étudiants (avec les propriétés : nom, age, filiere).

```json
[
  { "nom": "Alice", "age": 22, "filiere": "Informatique" },
  { "nom": "Bob", "age": 24, "filiere": "Réseaux" },
  { "nom": "Charlie", "age": 21, "filiere": "Design" }
  ...
]
```

- Crée un fichier index.html avec un bouton "Charger les étudiants" et une table HTML avec l'id results.

- Dans un fichier app.js, écris une fonction requestListStudents(url, callbackSucces, callbackErreur) qui encapsule la logique de XMLHttpRequest.

    N.B: Utiliser JSON.parse() pour convertir le contenu du fichier en tableau d'objet.

- Écris deux fonctions distinctes (tes callbacks) : l'une pour générer du HTML à partir des données reçues "displayStudents", l'autre pour afficher un message d'erreur "displayErrors".

- Créer la liste d'étudiant uniquement à partir de javascript c'est à dire les lignes dans la table HTML seront créer à partir de javascript.

- Ajoute un écouteur d'événement "click" sur le bouton "Charger les étudiants" pour déclencher la requête et d'afficher la liste d'étudiants dans tbody de la table HTML.

- Créer un module javascript "string_helper.js". Dans ce module, crée une fonction toLowerCase a qui on passera un paramètre string et qui retournera ce string en minuscule et une autre fonction toUpperCase qui prendra aussi un paramètre string et qui le retournera en majuscule

- Appeler ce module dans votre fichier js students.js et utiliser les fonctions dans ce module pour mettre le nom de chaque étudiants en majuscule ou minuscule selon votre préférence.
