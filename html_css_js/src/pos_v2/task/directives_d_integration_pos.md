# Directives d'Intégration Design - Interface POS

Ce document contient le cahier des charges visuel pour l'intégration de l'interface de caisse (Point de Vente). Vous devez respecter scrupuleusement ces consignes pour valider l'aspect graphique du projet.

## 1. Architecture CSS : Variables et Pseudo-classe :root

Pour garantir un code propre et maintenable, il est strictement exigé de ne pas coder les couleurs ou les tailles "en dur" un peu partout dans vos différentes règles CSS.

Vous devez obligatoirement utiliser la pseudo-classe racine (`:root`) au tout début de votre feuille de style pour y déclarer toutes vos couleurs, tailles et espacements sous forme de variables CSS personnalisées. Vous ferez ensuite appel à ces variables dans le reste de votre document.

## 2. Palette de Couleurs et Affectations

Voici les codes couleurs hexadécimaux à enregistrer dans vos variables et la manière dont vous devez les appliquer :

### Fonds (Backgrounds)
* **Bleu-Gris très clair (#f1f5f9)** : À utiliser exclusivement pour la couleur de fond globale de la page entière.
* **Blanc pur (#ffffff)** : À appliquer en fond pour toutes les grandes cartes (conteneurs) de l'interface.
* **Gris-Bleu ultra clair (#f8fafc)** : À utiliser comme fond pour les champs de formulaire (inputs de recherche) et les zones de contrôle de quantité.

### Textes
* **Bleu Nuit foncé (#0f172a)** : Couleur de texte principale. À utiliser pour les grands titres, le nom des produits et les valeurs chiffrées importantes.
* **Gris Ardoise (#64748b)** : Couleur de texte secondaire. Destinée aux sous-titres sous les titres de cartes, aux textes d'accompagnement et aux en-têtes des tableaux.
* **Gris Clair (#94a3b8)** : Pour les textes très discrets, comme les références sous le nom d'un produit dans le panier ou l'icône de loupe.

### Boutons et Actions
* **Bleu Primaire (#38bdf8)** : Couleur de fond du bouton "Ajouter au Panier" et couleur de l'icône "+" dans le tableau catalogue.
* **Bleu Primaire Foncé (#0284c7)** : Couleur de fond du bouton "Ajouter au Panier" au survol de la souris.
* **Noir/Bleu très sombre (#0f172a)** : Couleur de fond du gros bouton final "Encaisser & Imprimer".
* **Noir légèrement éclairci (#1e293b)** : Couleur de fond du bouton "Encaisser" au survol.
* **Rouge Alerte (#ef4444)** : Couleur de l'icône de suppression (croix) dans le panier et du texte pour la ligne de réduction.
* **Rouge très clair (#fee2e2)** : Couleur de fond qui doit apparaître uniquement au survol du bouton de suppression.

### Éléments de Statuts et Mises en avant
* **Vert Succès (#10b981)** : Couleur du texte et de la petite puce pour le badge "Caisse Ouverte" en haut de la page. Son fond doit être un vert très pâle (#ecfdf5).
* **Orange (#f59e0b)** : Couleur utilisée pour mettre en évidence la somme du "Net à Payer" ainsi que l'icône de la carte statistique correspondante. Son fond associé pour les icônes est un orange très pâle (#fffbeb).

### Bordures
* **Gris standard (#e2e8f0)** : Couleur pour les bordures de toutes les cartes principales et des champs de saisie.
* **Gris très léger (#f1f5f9)** : Pour les lignes de séparation subtiles, notamment entre chaque ligne de vos tableaux.

## 3. Typographie & Polices de caractères

Vous ne devez importer aucune police externe (comme Google Fonts) pour ce projet, afin de garantir un temps de chargement nul. Vous devez utiliser une "System Font Stack" (pile de polices système). 

### Choix des polices (Font-family)
* **Police Globale** : Déclarez une liste de polices sans-serif natives s'adaptant à l'OS de l'utilisateur. L'ordre doit être : polices système Apple (San Francisco), puis BlinkMacSystemFont, Segoe UI (Windows), Roboto (Android), Helvetica, Arial, et enfin la valeur générique sans-serif.
* **Police Monospace** : Pour les références textuelles des produits (ex: REF-401), utilisez la famille système "ui-monospace" avec "monospace" en solution de repli.

### Tailles et Graisses à respecter
* **Titre principal de la page** : Taille de 1.35rem, en gras.
* **Titres des cartes (Catalogue, Panier, etc.)** : Taille de 1.2rem, en gras.
* **Sous-titres descriptifs des cartes** : Taille de 0.875rem, en graisse normale.
* **Chiffres géants (Cartes statistiques)** : Taille de 1.85rem, en gras.
* **Ligne du Total "Net à régler"** : Taille de 1.25rem, en extra-gras.
* **Textes standards (nom des produits, boutons)** : Taille comprise entre 0.875rem et 0.9rem.
* **En-têtes des tableaux** : Taille de 0.8rem, en graisse moyenne.
* **Références des produits (Monospace)** : Taille de 0.75rem.

## 4. Formes et Espacements

* **Arrondis** : Prévoyez trois tailles d'arrondis via vos variables (Petit 6px, Moyen 10px, Grand 14px). Les grands s'appliquent aux cartes, les moyens aux champs de texte/boutons, les petits aux petits boutons d'action (quantités).
* **Espacements** : La page doit avoir des marges internes aérées (24px à 28px). Utilisez les grilles (Grid) ou Flexbox pour espacer vos éléments avec un écart standard de 16px entre les différentes cartes ou colonnes.
* **Ombres** : Les cartes blanches principales doivent posséder une ombre portée très légère pour se détacher du fond gris de la page.