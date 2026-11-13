# Banque d'Icônes SVG - Projet POS

Ce document rassemble toutes les icônes au format SVG (Scalable Vector Graphics) nécessaires pour l'interface de notre Point de Vente (POS). 

**Consigne d'intégration :** Copiez simplement le code `<svg>...</svg>` de l'icône souhaitée et collez-le directement dans votre fichier HTML à l'endroit où vous voulez l'afficher (par exemple, à l'intérieur d'une balise `<button>`).

*Astuce : Toutes ces icônes utilisent `stroke="currentColor"`, ce qui signifie qu'elles prendront automatiquement la couleur du texte ou du bouton dans lequel elles sont placées !*

---

## 1. Icônes des Tableaux (Actions Rapides)

### Ajouter un article (Le "+")

**Utilité :** S'affiche dans la colonne "Action" du catalogue pour intégrer un produit au panier.

```html
<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
  <path d="M5 12h14"></path>
  <path d="M12 5v14"></path>
</svg>
```

### Supprimer une ligne (La Croix)

**Utilité :** S'affiche dans la colonne "Action" du panier pour retirer un produit de la sélection.

```html
<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
  <line x1="18" y1="6" x2="6" y2="18"></line>
  <line x1="6" y1="6" x2="18" y2="18"></line>
</svg>
```

---

## 2. Icônes des Boutons Principaux (Call-to-Action)

### Nouveau Ticket (Corbeille)

**Utilité :** Dans le panneau de règlement, pour réinitialiser la commande et vider le panier.

```html
<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <path d="M3 6h18"></path>
  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
</svg>
```

### Encaisser & Imprimer (Imprimante)

**Utilité :** Le gros bouton principal de validation de la commande.

```html
<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <polyline points="6 9 6 2 18 2 18 9"></polyline>
  <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
  <rect x="6" y="14" width="12" height="8"></rect>
</svg>
```

### Ajouter au panier (Gros bouton "+")

**Utilité :** Le bouton situé sous la barre de recherche rapide (Quick Add).

```html
<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <circle cx="12" cy="12" r="10"></circle>
  <line x1="12" y1="8" x2="12" y2="16"></line>
  <line x1="8" y1="12" x2="16" y2="12"></line>
</svg>
```

---

## 3. Icônes d'Interface (Champs et En-tête)

### Loupe de recherche

**Utilité :** Se place à l'intérieur des champs de texte de filtrage (Catalogue et Panier).

```html
<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <circle cx="11" cy="11" r="8"></circle>
  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
</svg>
```

### Caddie (En-tête de l'application)

**Utilité :** S'affiche tout en haut à gauche, à côté du grand titre "Point de Vente (POS) / Facturation".

```html
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <circle cx="9" cy="21" r="1"></circle>
  <circle cx="20" cy="21" r="1"></circle>
  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
</svg>
```

---

## 4. Icônes des Cartes Statistiques (En haut de page)

### Carton "Total Articles" (Statistique 1)

**Utilité :** L'icône de la première carte indiquant le nombre d'articles enregistrés.

```html
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
  <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
  <line x1="12" y1="22.08" x2="12" y2="12"></line>
</svg>
```

### Coche "Montant Brut" (Statistique 2)

**Utilité :** L'icône de la deuxième carte indiquant le montant sous-total de la vente.

```html
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
  <polyline points="22 4 12 14.01 9 11.01"></polyline>
</svg>
```

### Carte Bancaire "Net à Payer" (Statistique 3)

**Utilité :** L'icône de la troisième carte (en orange) indiquant le total TTC.

```html
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
  <line x1="1" y1="10" x2="23" y2="10"></line>
</svg>
```

### Icones emojis

**Utilité :** Copier et coller pour utiliser ces emojis dans notre page html

```html
<span>📦</span> Catalogue &amp; Articles Disponibles
<span>🛒</span> Panier &amp; Produits Sélectionnés
<span>💳</span> Récapitulatif &amp; Règlement
🏦 Virement
💵 Espèces
```
