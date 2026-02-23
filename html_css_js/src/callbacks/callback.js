// EXO 1. Définition de la fonction principale (High Order Function)
const processString = (str, callbackTokonyAntsoina) => {
    //let age = 0;
    console.log("Traitement"+str+" en cours...");
    // On exécute la fonction reçue en paramètre
    callbackTokonyAntsoina(str);
   //toUpperCaseCallback(age);
};

// 2. Définition des callbacks
const toUpperCaseCallback = (text) => {
    console.log(`Résultat : ${text.toUpperCase()}`);
};

const lengthCallback = (text) => {
    console.log(`Longueur du texte : ${text.length} caractères`);
};

const hello = (firstname) => {
    console.log(`hello ${firstname}`);
}

processString("rakoto", hello);
// 3. Utilisation
processString("javascript", toUpperCaseCallback); 
// Sortie: Traitement en cours... Résultat : JAVASCRIPT

processString("développeur", lengthCallback); 
// Sortie: Traitement en cours... Longueur du texte : 11 caractères

//EXO 2
const compute = (nbr1, nbr2, callbackOperation) => {
    let result = callbackOperation(nbr1, nbr2);

    return result;
}

const addition = (x, y) => {
    return x+y;
}

const mutliply = (z, w) => {
    return z * w;
}

//interpollation variable
let res = compute(2, 3, addition);
console.log(`addition 2 + 3 = ${res}`);

let resultMultiply = compute(2, 3, mutliply);
console.log(`multiply 2 * 3 = ${resultMultiply}`);

let resultSoustract = compute(2,3,(nbr1, nbr2) => {
    return nbr1 - nbr2;
} );
console.log(`soustract 2 - 3 = ${resultSoustract}`);
//EXO 3
/**
 * Simule un téléchargement asynchrone
 * @param {string} filePath 
 * @param {Function} onSuccess 
 * @param {Function} onError 
 */
const downloadUserFile = (filePath, onSuccess,  onError) => {
    console.log(`Démarrage du téléchargement de ${filePath || 'fichier inconnu'}...`);
    // Simulation d'un délai réseau de 2000ms
    setTimeout(() => {
        // Validation simple
        console.log(filePath + " "+!filePath);
        if (!filePath) {
            console.log("aty");
            // Cas d'erreur : on déclenche le callback d'erreur
            onError(new Error("Chemin du fichier invalide ou manquant."));
        } else {
            // Cas de succès : on déclenche le callback de succès
            const response = `Fichier '${filePath}' téléchargé avec succès.`;
            onSuccess(response);
        }
    }, 2000);
};

// --- Utilisation (Scénarios) ---

// Scénario 1 : Succès
const handleSuccess = (message) => {
    console.log("✅ SUCCESS :", message);
    // Ici, on pourrait lancer une autre action (ex: ouvrir le fichier)
};

const handleError = (error) => {
    console.error("❌ ERROR :", error.message);
};

// Test succès
downloadUserFile("mon_cv.pdf", handleSuccess, handleError);

// Test échec (après 2 secondes également)
downloadUserFile("", handleSuccess, handleError);

// Note : En JavaScript moderne, pour éviter d'imbriquer trop de callbacks 
// (Callback Hell), on privilégie souvent les Promesses (Promises) 
// et async/await, mais comprendre ce motif est essentiel.

let myPromise = new Promise(function(myResolve, myReject){
    
});