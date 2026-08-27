# TP JavaScript : Tableau de bord, Filtrage et Pagination de données volumineuses

## Objectif du TP

Mettre en pratique la manipulation du DOM, la gestion des événements, le filtrage de données en JavaScript et l'implémentation d'une pagination pour gérer un grand volume de données de manière performante.

## Matériel fourni

* Un fichier de données nommé `etudiants-v2.json` contenant 250 000 objets structurés ainsi : `{ "nom": "Alice", "age": 22, "filiere": "Informatique" }`[cite: 2].

---

## Partie 1 : Mise en place de l'Interface Utilisateur (HTML/CSS)

Avant de coder la logique, vous devez construire la structure de la page. Créez un fichier HTML contenant :

* **Les filtres de recherche :**
  * Un champ de saisie (`input` texte) pour rechercher par nom.
  * Un menu déroulant (`select`) pour filtrer par filière (avec une option par défaut "Toutes les filières").
* **Le tableau des résultats :** Un tableau (`table`) avec un en-tête statique (Nom, Âge, Filière) et un corps (`tbody`) vide.
* **Les contrôles de pagination :** Sous le tableau, ajoutez une section contenant :
  * Un bouton "Précédent".
  * Un indicateur de page courante (ex: "Page 1 sur 25").
  * Un bouton "Suivant".
  * Un menu déroulant pour choisir le nombre de résultats par page (ex: 10, 20, 50, 100).

## Partie 2 : Chargement des données et Pagination (JavaScript)

* **Récupération des données :** Écrivez un script permettant de charger le fichier `etudiants-v2.json` (par exemple stocké dans une variable `allStudents`)[cite: 2].
* **Variables d'état :** Créez des variables pour stocker : la page courante (ex: `currentPage` initialisée à 1) et le nombre d'éléments par page (ex: `itemsPerPage` initialisé à 20).
* **Fonction d'affichage paginée :** Créez une fonction (ex: `renderTable()`) qui ne prend qu'une "tranche" (`slice`) du tableau global d'étudiants en fonction de la `currentPage` et du `itemsPerPage`. Cette fonction doit :
  1. Vider le `tbody`.
  2. Générer les lignes HTML uniquement pour les étudiants de la page en cours.
  3. Mettre à jour l'indicateur de page et désactiver le bouton "Précédent" sur la page 1 et "Suivant" sur la dernière page.

## Partie 3 : Implémentation des contrôles de pagination

* **Navigation :** Ajoutez des écouteurs d'événements sur les boutons "Précédent" et "Suivant" pour modifier la `currentPage` et rappeler la fonction `renderTable()`.
* **Changement de limite :** Ajoutez un écouteur sur le `select` du "nombre d'éléments par page". Lorsqu'il change, mettez à jour `itemsPerPage`, réinitialisez `currentPage` à 1 et mettez à jour l'affichage.

## Partie 4 : Génération dynamique des filières

* **Extraction sans doublon :** Parcourez l'ensemble des étudiants (`allStudents`). Extrayez toutes les filières existantes en veillant à ignorer les doublons (indice : utilisez un `Set` et stockez le résultat dans une variable `uniqueMajors`).
* **Alimentation du menu déroulant :** Générez dynamiquement les options de votre `select` de filières à partir de ce Set.

## Partie 5 : Implémentation du Filtrage Croisé (Nom et Filière)

* **Logique de filtrage global :** Créez une fonction `filterStudents()` qui sera appelée à chaque fois que le champ texte OU le `select` de filière est modifié.
* **Le filtre doit :**
  1. Récupérer la valeur du champ texte (ex: `searchQuery`) et celle du menu déroulant (ex: `selectedMajor`).
  2. Créer un nouveau tableau (ex: `filteredStudents`) contenant uniquement les étudiants qui correspondent aux *deux* critères en même temps (le nom contient la recherche ET la filière correspond).
  3. **Réinitialiser `currentPage` à 1** (car le nombre total de résultats vient de changer).
  4. Passer ce tableau `filteredStudents` à votre fonction `renderTable()`.

---

## Maquette du Résultat Attendu

Voici la structure visuelle attendue de votre interface :

> 🏢 **Portail des Étudiants**
>
> 🔍 **Rechercher :** [   Bo.............. ]  🎓 **Filière :** [ Droit            ▼ ]
> 
> *Résultats trouvés : 10*
> 
> | Nom | Âge | Filière |
> | :--- | :--- | :--- |
> | Bob | 29 | Droit |
> | Bob | 20 | Droit |
> | Bob | 22 | Droit |
> | Bob | 24 | Droit |
> | Bob | 26 | Droit |
> | Bob | 27 | Droit |
> | Bob | 19 | Droit |
> | Bob | 28 | Droit |
> | Bob | 21 | Droit |
> | Bob | 30 | Droit |
>
> ⏪ [ Précédent ]  --  Page 1 sur 2  --  [ Suivant ] ⏩  
> *Afficher : [ 10 ▼ ] par page*