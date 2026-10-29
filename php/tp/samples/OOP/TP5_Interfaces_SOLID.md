# TP 5 : Le contrat universel (Interfaces et bases SOLID)

## Objectif pédagogique
Introduire l'abstraction par les Interfaces. Faire assimiler aux étudiants qu'un code devient modulaire et évolutif lorsqu'il dépend de contrats (abstractions) plutôt que d'implémentations rigides.

## Énoncé
1. Créez une interface `Loggable` avec `getLogMessage(): string;`.
2. Créez `Utilisateur` et `ErreurSysteme` qui l'implémentent.
3. Créez un `Logger` avec la méthode `enregistrer(Loggable $element)`.

## Solution
```php
<?php
declare(strict_types=1);

interface Loggable 
{
    public function getLogMessage(): string;
}

class Utilisateur implements Loggable 
{
    public function __construct(private string $pseudo) {}
    public function getLogMessage(): string { return "Nouvel utilisateur: " . $this->pseudo; }
}

class ErreurSysteme implements Loggable 
{
    public function __construct(private int $codeErreur) {}
    public function getLogMessage(): string { return "Erreur: " . $this->codeErreur; }
}

class Logger 
{
    public function enregistrer(Loggable $element): void 
    {
        echo "[LOG] " . $element->getLogMessage() . "\n";
    }
}

$logger = new Logger();
$user = new Utilisateur("DevStudent");
$erreur = new ErreurSysteme(404);

$logger->enregistrer($user);
$logger->enregistrer($erreur);
```
