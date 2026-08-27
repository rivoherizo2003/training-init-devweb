// 1. Fonction générique gérant la requête XHR
function getListStudents(url, callbackSucces, callbackErreur) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    
    xhr.onload = function () {
        // readyState 4 signifie que l'opération est terminée
        if (xhr.status === 200) {
                const donnees = JSON.parse(xhr.responseText);
                callbackSucces(donnees); // Appel du callback de succès
            } else {
                callbackErreur(`Erreur serveur : ${xhr.status}`); // Appel du callback d'erreur
            }
    };
    
    xhr.send();
}

// 2. Fonction de callback en cas de succès (Logique d'affichage)
function displayStudents(etudiants) {
    const conteneur = document.getElementById('resultat');
    
    // Utilisation de map() et join() pour un code plus "clean" sans boucle for
    const htmlString = '<ul>' + 
        etudiants.map(etudiant => `<li>${etudiant.nom} (${etudiant.filiere})</li>`).join('') +
        '</ul>';
        
    conteneur.innerHTML = htmlString;
}

// 3. Fonction de callback en cas d'erreur
function handleErrors(message) {
    const conteneur = document.getElementById('resultat');
    conteneur.innerHTML = `<p style="color: red;"><strong>Erreur :</strong> ${message}</p>`;
}

// 4. Initialisation des événements
document.getElementById('btn-charger').addEventListener('click', () => {
    // Injection des fonctions de callback lors de l'appel
    getListStudents('etudiants.json', displayStudents, handleErrors);
});