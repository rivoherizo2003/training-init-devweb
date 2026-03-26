# Scénario illustrant l'utilisation d'interface

## Scénario 1

Ton application doit générer des rapports. Aujourd'hui, on veut du PDF. Demain, le client demandera du CSV ou du JSON. Si tu codes tout dans une seule classe, ton code deviendra une "classe Dieu" (monstrueuse et impossible à maintenir).

1. L'Interface (Le Contrat)

On définit ce qu'est un "Exportateur". On se moque de la bibliothèque utilisée (TCPDF, DomPDF, etc.), on veut juste une méthode export.

```php
<?php

interface ReportExporter {
    /**
     * @param array $data Données à transformer
     * @return string Chemin du fichier généré ou contenu
     */
    public function export(array $data): string;
}
```

1. Les Implémentations (Respect du Principe de Responsabilité Unique - SRP)

Chaque classe ne fait qu'une seule chose : s'occuper de son format.

```php
<?php

class PdfExporter implements ReportExporter {
    public function export(array $data): string {
        // Logique complexe de mise en page PDF...
        return "Rapport_PDF_Genere.pdf";
    }
}

class CsvExporter implements ReportExporter {
    public function export(array $data): string {
        // Logique de conversion en CSV...
        return "Rapport_Data.csv";
    }
}
```

1. Le Code "Client" (Respect du Principe d'Inversion de Dépendance - DIP)

La classe qui génère le rapport ne dépend pas d'un format, mais de l'interface. On dit qu'elle est découplée.

On introduit une douille (l'Interface).
La maison ne connaît que la douille. L'ampoule ne connaît que la douille. Tant que l'ampoule respecte le format de la douille (E27 par exemple), tu peux mettre une ampoule LED, halogène ou connectée sans jamais toucher aux murs de ta maison.

```php
<?php 
class ReportGenerator {
    private ReportExporter $exporter;

    // Injection de dépendance via le constructeur
    public function __construct(ReportExporter $exporter) {
        $this->exporter = $exporter;
    }

    public function generate(array $data): void {
        echo "Début de la génération...\n";
        $file = $this->exporter->export($data);
        echo "Fichier disponible ici : $file\n";
    }
}

// --- Utilisation ---

$data = ['id' => 1, 'nom' => 'Rapport Annuel'];

// On peut changer l'injecteur sans modifier ReportGenerator
$report = new ReportGenerator(new PdfExporter());
$report->generate($data);

$reportCsv = new ReportGenerator(new CsvExporter());
$reportCsv->generate($data);
```

### 💎 Pourquoi est-ce du "Clean Code" ?

#### 🛡️ 1. Le Typage Fort (Sécurité Native)

En PHP, si tu essaies de passer une classe qui n'implémente pas `ReportExporter` au constructeur de `ReportGenerator`, le moteur PHP lèvera une erreur **immédiatement**.

* **Impact :** C'est une sécurité énorme en production.
* **Contrat :** On garantit que l'objet possède les méthodes attendues avant même d'exécuter la logique métier.

### 🚀 2. L'OCP (Open/Closed Principle)

Le principe veut qu'une entité logicielle soit **fermée à la modification** mais **ouverte à l'extension**.

* **Fermé :** Ton `ReportGenerator` est stable, on n'y touche plus (évite les régressions).
* **Ouvert :** Tu peux ajouter 10 formats d'exports différents simplement en créant de nouvelles classes, sans modifier le cœur du système.

## Scénario 2

Tu dois envoyer une confirmation de commande. Au début, tu envoies un Email. Plus tard, ton patron te dit : "On veut aussi envoyer un SMS pour les clients Premium".

Si tu n'utilises pas le DIP, tu vas devoir modifier ta classe OrderService à chaque fois qu'on change de moyen de communication. C'est ce qu'on veut éviter.

1. L'Abstraction (La "Douille")

On crée une interface qui définit l'action d'envoyer un message, peu importe le canal.

```php
<?php

interface MessageSender {
    public function send(string $to, string $message): bool;
}

```

2. Les Implémentations (Les "Ampoules")

On crée nos classes concrètes de bas niveau. Chacune s'occupe de la technique spécifique (API Mailjet, API Twilio, etc.).

```php
<?php

class EmailProvider implements MessageSender {
    public function send(string $to, string $message): bool {
        echo "📧 Envoi de l'Email à $to : $message\n";
        return true;
    }
}

class SmsProvider implements MessageSender {
    public function send(string $to, string $message): bool {
        echo "📱 Envoi du SMS à $to : $message\n";
        return true;
    }
}
```

3. La Logique Métier (Le Haut Niveau)

La classe OrderProcessor ne sait pas comment le message part. Elle sait juste qu'elle a un MessageSender.

```php
<?php

class OrderProcessor {
    private MessageSender $sender;

    // On injecte l'interface (DIP)
    public function __construct(MessageSender $sender) {
        $this->sender = $sender;
    }

    public function confirmOrder(string $contact, int $orderId): void {
        $msg = "Votre commande #$orderId est validée !";
        
        // Utilisation transparente du service injecté
        $this->sender->send($contact, $msg);
    }
}
```

Pourquoi c'est puissant ?

Regarde comment on utilise le code maintenant. Le changement se fait à l'extérieur de la logique métier :

```php
<?php

// Pour un client classique (Email)
$processor = new OrderProcessor(new EmailProvider());
$processor->confirmOrder("client@exemple.com", 101);

// Pour un client Premium (SMS) - On change juste l'injection !
$premiumProcessor = new OrderProcessor(new SmsProvider());
$premiumProcessor->confirmOrder("+33612345678", 102);
```