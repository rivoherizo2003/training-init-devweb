# TP 4 : Ne pas se répéter (L'Héritage)

## Objectif pédagogique

Comprendre le concept d'héritage et la visibilité protected. Apprendre à réutiliser du code existant sans le dupliquer (respect du principe DRY) et à surcharger une méthode (Override).

## Énoncé

1. Créez une classe de base appelée Employe contenant deux propriétés protégées (protected) : nom et salaireBase. Ajoutez une méthode calculerSalaire(): float qui retourne simplement le salaire de base.

2. Créez une classe Manager qui hérite (extends) de la classe Employe.

3. Ajoutez au Manager une propriété privée prime (flottant).

4. Redéfinissez le constructeur du Manager pour qu'il prenne en charge le nom, le salaire de base ET la prime, tout en appelant le constructeur de la classe parente via parent::__construct().

5. Surchargez la méthode calculerSalaire() dans la classe Manager afin qu'elle renvoie le salaire de base additionné de la prime.

## Solution
```php
<?php
declare(strict_types=1);

class Employe 
{
    public function __construct(protected string $nom, protected float $salaireBase) {}
    public function calculerSalaire(): float { return $this->salaireBase; }
}

class Manager extends Employe 
{
    public function __construct(string $nom, float $salaireBase, private float $prime) 
    {
        parent::__construct($nom, $salaireBase); 
    }

    public function calculerSalaire(): float 
    {
        return parent::calculerSalaire() + $this->prime;
    }
}

$employe = new Employe("Alice", 2000.0);
$manager = new Manager("Bob", 2000.0, 500.0);

echo $employe->getNom() . " gagne " . $employe->calculerSalaire() . " €\\n";
echo $manager->getNom() . " gagne " . $manager->calculerSalaire() . " €\\n";
```
