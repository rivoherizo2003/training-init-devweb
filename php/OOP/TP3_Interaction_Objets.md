# TP 3 : Les objets qui communiquent entre eux

## Objectif pédagogique

Montrer comment la POO permet de modéliser un système complexe en organisant des interactions de type "association" et "composition" entre plusieurs classes distinctes.

## Énoncé

1. Créez une classe Article avec deux propriétés privées : nom (chaîne) et prix (flottant). Implémentez la promotion de constructeur (PHP 8+) ainsi que les getters nécessaires.

2. Créez une classe Panier possédant une propriété privée $articles initialisée comme un tableau vide.

3. Ajoutez une méthode ajouterArticle(Article $article): void à la classe Panier. Le type hinting doit garantir qu'on ne passe que des instances de la classe Article.

4. Ajoutez une méthode calculerTotal(): float au Panier qui parcourt la liste des articles et retourne la somme totale cumulée.

## Solution

```php
<?php
declare(strict_types=1);

class Article 
{
    public function __construct(private string $nom, private float $prix) {} 
    public function getPrix(): float { return $this->prix; }
    public function getNom(): string { return $this->nom; }
}

class Panier 
{
    private array $articles = [];

    public function ajouterArticle(Article $article): void 
    {
        $this->articles[] = $article;
    }

    public function calculerTotal(): float 
    {
        $total = 0.0;
        foreach ($this->articles as $article) {
            $total += $article->getPrix();
        }
        return $total;
    }
}

$panier = new Panier();
$panier->ajouterArticle(new Article("Clavier", 45.99));
$panier->ajouterArticle(new Article("Souris", 25.50));

echo "Total du panier : " . $panier->calcularTotal() . " €\\n";
```
