# Exercice : afficher les districts, communes et fokontany avec JavaScript

## Objectif

Créer une page `index.html` qui récupère les données du fichier `fokontany.json` avec `fetch`, puis affiche les informations de localisation au clic sur des boutons.

L'exercice permet de pratiquer :

- la récupération de données JSON avec `fetch`
- la manipulation de tableaux et d'objets en JavaScript
- l'affichage dynamique dans le DOM
- la gestion des événements avec `addEventListener`

## Fichiers à utiliser

Dans le dossier `html_css_js/src/localization`, vous devez utiliser :

- `fokontany.json` : fichier contenant les données de localisation
- `index.html` : page HTML à créer

## Structure du fichier JSON

Le fichier `fokontany.json` contient un objet JavaScript organisé sur 4 niveaux :

1. les régions
2. les districts de chaque région
3. les communes de chaque district
4. les fokontany de chaque commune

La structure générale est la suivante :

```json
{
  "ANALAMANGA": {
    "Ambohidratrimo": {
      "Ambato": [
        {
          "commune": "Ambato",
          "region": "ANALAMANGA",
          "fokontany": "Ambanimaso",
          "district": "Ambohidratrimo"
        }
      ]
    }
  }
}
```

Attention : les noms des régions, districts et communes sont des clés d'objet.

## Travail demandé

Créer une page `index.html` qui contient :

1. Un titre principal.
2. Un `select` permettant de sélectionner une région.
3. Un bouton pour afficher la liste des districts de la région sélectionnée.
4. Un `select` permettant de sélectionner un district.
5. Un bouton pour afficher la liste des communes du district sélectionné.
6. Un `select` permettant de sélectionner une commune.
7. Un bouton pour afficher la liste des fokontany de la commune sélectionnée.
8. Une zone d'affichage dans laquelle les résultats apparaissent.
9. Du CSS pour rendre l'affichage plus lisible.
10. Un message d'erreur si le fichier JSON ne peut pas être chargé.
11. Un message indiquant que les données sont en cours de chargement.
12. Un champ de recherche pour filtrer les régions, districts, communes ou fokontany.
13. Personnalisez chaque input, select avec du CSS.

Les trois listes à puces doivent s'afficher uniquement lorsqu'on clique sur le bouton correspondant.

## Fonctionnement attendu

### 1. Sélection d'une région et affichage des districts

Au chargement des données, remplir automatiquement le premier `select` avec la liste des régions.

L'utilisateur doit pouvoir :

1. choisir une région dans le `select`
2. cliquer sur le bouton "Afficher les districts"
3. voir uniquement les districts de la région sélectionnée

Exemple :

```text
Région sélectionnée : ANALAMANGA
- Ambohidratrimo
- Andramasina
- Anjozorobe
```

### 2. Sélection d'un district et affichage des communes

Le `select` des districts doit être rempli avec les districts disponibles.

L'utilisateur doit pouvoir :

1. choisir un district dans le `select`
2. cliquer sur le bouton "Afficher les communes"
3. voir uniquement les communes du district sélectionné

Exemple :

```text
District sélectionné : Ambohidratrimo
- Ambato
- Ambatolampy
- Ambohidratrimo
```

### 3. Sélection d'une commune et affichage des fokontany

Le `select` des communes doit être rempli avec les communes disponibles.

L'utilisateur doit pouvoir :

1. choisir une commune dans le `select`
2. cliquer sur le bouton "Afficher les fokontany"
3. voir uniquement les fokontany de la commune sélectionnée

Exemple :

```text
Commune sélectionnée : Ambato
- Ambanimaso
- Ambato
- Ambatoharanana
```

Pour afficher le nom d'un fokontany, utiliser la propriété `fokontany` de chaque objet.


### 4. Champ de recherche

Ajouter un champ de recherche permettant de filtrer les résultats affichés.

Le champ de recherche doit pouvoir filtrer :

- les régions
- les districts
- les communes
- les fokontany

Par exemple, si la liste des fokontany est affichée et que l'utilisateur tape `Ambato`, la zone d'affichage doit montrer uniquement les fokontany qui contiennent ce texte.

## Contraintes techniques

- Utiliser obligatoirement `fetch` pour récupérer les données.
- Ne pas écrire les données directement dans le fichier HTML.
- Utiliser JavaScript pour créer ou modifier le contenu affiché dans la page.
- Utiliser un événement `click` pour chaque bouton.
- Utiliser un événement `change` sur les `select` si vous voulez mettre à jour les choix disponibles.
- Effacer l'ancien affichage avant d'afficher une nouvelle liste.
- Le fichier principal de la page doit s'appeler `index.html`.
- Utiliser `Object.keys()` pour récupérer les régions, les districts et les communes.
- Utiliser la propriété `fokontany` pour récupérer le nom de chaque fokontany.

## Critères de validation

L'exercice est réussi si :

- la page `index.html` charge bien le fichier `fokontany.json`
- un message de chargement s'affiche pendant la récupération des données
- un message d'erreur s'affiche si le fichier JSON ne peut pas être chargé
- les régions sont disponibles dans un `select`
- les districts sont affichés après sélection d'une région et clic sur le bouton
- les communes sont affichées après sélection d'un district et clic sur le bouton
- les fokontany sont affichés après sélection d'une commune et clic sur le bouton
- le champ de recherche filtre les résultats affichés
- la page contient du CSS pour rendre l'affichage lisible
- les trois affichages utilisent les données venant du fichier JSON
