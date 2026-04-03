# Exercice POO PHP : Système de Notification Multi-Canal (Interfaces & SOLID)

## Objectif

L'objectif est de créer un système de gestion de formulaires capable d'envoyer des notifications sur différents supports sans modifier le code de la classe principale. Cela permet de respecter le principe **Open/Closed** (Ouvert à l'extension, fermé à la modification).

## Contexte

Vous développez un module de contact pour une entreprise. Selon l'importance du message ou les préférences de l'administrateur, la notification doit pouvoir être envoyée par :

Le formufaire devra avoir les champs suivantes:

- Numéro téléphone
- Email
- Contenu du message
- Choix:
  - Envoyer par email
  - Envoyer par sms
  - Envoyer sur linkedin
  - Envoyer sur facebook
- Un bouton submit pour envoyer

*Note : Chaque classe doit simuler l'envoi avec un `echo` spécifique (ex: "Notification Facebook envoyée : [message]").*

*Note : Garder en tête que demain l'entreprise vous demande d'ajouter un autre type de notification à envoyer.*
