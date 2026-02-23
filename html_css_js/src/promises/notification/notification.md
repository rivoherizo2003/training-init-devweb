# L'Exercice : Le Système de Notifications "Smart Stack"

Objectif : Créer un système de notifications qui s'empilent, s'animent, et s'auto-détruisent de manière asynchrone, tout en restant interactives.

Énoncé :

    Créez une fonction createNotification(message, duration).

    - Etape 0: Créer un bouton qui lancera cette fonction lorsqu'on clique dessus
    - Étape 1 (DOM) : La fonction doit créer un élément <div> avec la classe .toast, lui injecter le message et l'ajouter à un conteneur #notification-container.

    - Étape 2 (Style & Animation) : * Dès l'ajout, la notification doit être invisible (ex: opacity: 0).

        Créer une fonction delay(ms) qui permetra de créer un objet Promise et qui prendra comme paramètre le temps d'attente(utiliser settimeout pour definir une temps d'attente). 
        Après l'appel de cette fonction avec await, passez l'opacité de la notification(.toast) à 1 pour créer un effet de fondu et appliquer une animation css transform

    - Étape 3 (Événement & Interaction) : * La notification doit rester affichée pendant duration 5 secondes.

        Mais, si l'utilisateur clique sur la notification avant la fin du délai, elle doit se fermer immédiatement.

    - Étape 4 (Nettoyage Asynchrone) : * Une fois le délai passé (ou le clic effectué), jouez une animation de sortie (opacité à 0) et avec la propriété css transform

    Attendez la fin de l'animation avant de supprimer réellement l'élément du DOM (element.remove()). Donc ici il faudra faire appel à notre function delay avec await

    NB: Avec la propriété css transform vous pouvez animer la notification de la manière suivante:
    - la notification apparaitra doucement et glissera de droite à gauche.
    - A la fermeture, la notification disparaitra doucement et glissera de gauche à droite
    - Notez que vous devez créer un fichier css pour y mettre les styles du .toast pour qu'il soit présentable en tant que notification