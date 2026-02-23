/**
 * Utilitaire pour créer une pause "awaitable"
 */
const delay = (ms) => new Promise(resolve => setTimeout(resolve, ms));

setTimeout(() => {
    console.log("hello")
}, 10000);

async function createNotification(message, duration = 3000) {
    const container = document.getElementById('notification-container');
    
    // 1. Création de l'élément
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.textContent = message;
    toast.style.opacity = '0';
    toast.style.transform = 'translateX(20px)';
    container.appendChild(toast);

    // 2. Animation d'entrée (Asynchrone)
    await delay(10); // Petit délai pour laisser au DOM le temps de calculer le rendu
    toast.style.opacity = '1';
    toast.style.transform = 'translateX(0)';

    // 3. Logique de fermeture (Le premier arrivé gagne : Temps ou Clic)
    await new Promise((resolve) => {
        const timeoutId = setTimeout(resolve, duration);
        
        toast.addEventListener('click', () => {
            clearTimeout(timeoutId); // Annule le timer si on clique
            resolve();
        }, { once: true }); // S'assure que l'évent est nettoyé
    });

    // 4. Animation de sortie
    toast.style.opacity = '0';
    toast.style.transform = 'translateX(20px)';
    
    // Attendre la fin de la transition CSS (0.5s dans notre CSS)
    await delay(500);
    toast.remove();
}

// Test du système
document.getElementById('btn-notify').addEventListener('click', () => {
    createNotification("Nouvelle mise à jour disponible !", 5000);
});