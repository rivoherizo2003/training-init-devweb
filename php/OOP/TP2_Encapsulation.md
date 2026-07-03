# TP 2 : Protéger les données (L'Encapsulation)

## Objectif pédagogique

Comprendre l'utilité de la POO pour sécuriser et restreindre l'accès aux données.

## Énoncé

1. Créez une classe CompteBancaire.

2. Ajoutez une propriété solde (flottant) qui doit être strictement inaccessible de l'extérieur (private).

3. Créez un constructeur qui initialise le solde à une valeur passée en paramètre (ou à 0.0 par défaut).

4. Créez une méthode deposer(float $montant): void qui ajoute de l'argent au solde uniquement si le montant est strictement positif. Sinon, le code doit lever une exception.

5. Créez une méthode retirer(float $montant): void qui retire de l'argent uniquement si le montant est positif et inférieur ou égal au solde actuel. Sinon, le code doit lever une exception.

6. Créez un accesseur (Getter) nommé getSolde(): float pour permettre la consultation sécurisée du solde de l'extérieur.

## Solution

```php
<?php
declare(strict_types=1);

class CompteBancaire 
{
    private float $solde;

    public function __construct(float $soldeInitial = 0.0) 
    {
        $this->solde = $soldeInitial;
    }

    public function deposer(float $montant): void 
    {
        if ($montant > 0) {
            $this->solde += $montant;
        } else {
            throw new InvalidArgumentException("Montant invalide.");
        }
    }

    public function retirer(float $montant): void 
    {
        if ($montant > 0 && $this->solde >= $montant) {
            $this->solde -= $montant;
        } else {
            throw new Exception("Fonds insuffisants.");
        }
    }

    public function getSolde(): float 
    {
        return $this->solde;
    }
}

try {
    $monCompte = new CompteBancaire(100.0);
    $monCompte->deposer(50.0);
    $monCompte->retirer(30.0);
    
    echo "Solde actuel : " . $monCompte->getSolde() . " €\\n";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "\\n";
}
```
