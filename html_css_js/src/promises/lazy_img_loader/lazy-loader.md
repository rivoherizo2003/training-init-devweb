# Exercice 1 : Le "Lazy Loader" d'Images Séquentiel

Objectif : Charger une liste d'images les unes après les autres pour ne pas saturer la bande passante, avec une gestion d'erreur visuelle.

Énoncé : 1. Vous recevez un tableau d'URLs : ['img1.jpg', 'img2.jpg', 'error.jpg', 'img3.jpg'].
2. Créez une fonction loadImage(url) qui retourne une Promise. Elle doit créer un élément <img>, attendre que l'image soit chargée (onload) pour résoudre, ou échouer (onerror) si l'URL est invalide.
3. Créez une fonction displayGallery(urls) qui parcourt le tableau et affiche les images dans un div #gallery une par une (la deuxième ne commence que quand la première est affichée).
4. Si une image échoue, affichez un message d'erreur dans le DOM à sa place et continuez le chargement des suivantes.