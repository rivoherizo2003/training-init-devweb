# Exercice POO PHP : Système de Notification Multi-Canal (Interfaces & SOLID)

## Objectif

L'objectif est de créer un système d'export capable de créer un fichier au format demandé avec le contenu dans le champ "contenu". Cela permet de respecter le principe **Open/Closed** (Ouvert à l'extension, fermé à la modification).

## Contexte

Vous développez un module d'export pour une entreprise. Selon les besoins de l'administrateur, il peut choisir quel type de fichier il veut comme résultat.

Le formufaire devra avoir les champs suivantes:

- Nom du fichier (input:text)
- Contenu (Textarea)
- Choix:
  - pdf
  - csv
  - txt
- Un bouton submit pour Exporter

***Note*** :

- Chaque classe doit **créer un fichier soit .pdf, .txt , .csv , .txt et ce fichier devra contenir ce que l'utilisateur a saisit dans le champ "Contenu"**

- Garder en tête que demain l'entreprise vous demande d'ajouter un autre type d'export.

- Il faut une jolie interface svp.
