# TP 1 : De la réalité au code (La Classe et l'Objet)

## Objectif pédagogique

Comprendre qu'une classe est un "plan de construction" (une moule) et qu'un objet est la structure concrète créée à partir de ce moule (une instance).

## Énoncé

1. Créez une classe `Livre`.
2. Donnez-lui les propriétés suivantes : `titre` (chaîne), `auteur` (chaîne), et `nombreDePages` (entier).
3. Créez un constructeur (`__construct`) permettant d'initialiser ces propriétés.
4. Créez une méthode `afficherDetails()` qui retourne une phrase résumant le livre.
5. Instanciez deux livres et affichez le résultat.

## Solution

```php
<?php
declare(strict_types=1);

class Livre 
{
    public string $titre;
    public string $auteur;
    public int $nombreDePages;

    public function __construct(string $titre, string $auteur, int $nombreDePages) 
    {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->nombreDePages = $nombreDePages;
    }

    public function afficherDetails(): string 
    {
        return "Le livre '{$this->titre}' écrit par {$this->auteur} contient {$this->nombreDePages} pages.";
    }
}

// L'objet est la réalisation concrète du plan
$livre1 = new Livre("Le Petit Prince", "Antoine de Saint-Exupéry", 93);
$livre2 = new Livre("1984", "George Orwell", 328);

echo $livre1->afficherDetails() . "\\n";
echo $livre2->afficherDetails() . "\\n";
```
