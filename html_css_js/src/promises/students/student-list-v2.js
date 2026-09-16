// Définition des clés utilisées dans le localStorage pour mémoriser
// la page courante et le nombre d'éléments affichés par page.
const STORAGE_KEYS = {
    currentPage: 'student-current-page',
    itemsPerPage: 'student-items-per-page'
};

// Nombre d'éléments affichés par défaut dans le tableau.
const DEFAULT_ITEMS_PER_PAGE = 20;

// Tableau complet des étudiants chargé depuis le JSON.
let allStudents = [];

// Tableau filtré selon la recherche et la filière sélectionnée.
let filteredStudents = [];

// Page actuellement affichée dans la pagination.
let currentPage = getStoredValue(STORAGE_KEYS.currentPage, 1);

// Nombre d'étudiants à afficher par page.
let itemsPerPage = getStoredValue(STORAGE_KEYS.itemsPerPage, DEFAULT_ITEMS_PER_PAGE);

// Récupération des éléments du DOM qui seront manipulés plus tard.
const searchInput = document.getElementById('search-query');
const majorSelect = document.getElementById('select-major');
const tableBody = document.getElementById('student-table-body');
const resultsCount = document.getElementById('results-count');
const prevButton = document.getElementById('prev-page');
const nextButton = document.getElementById('next-page');
const pageIndicator = document.getElementById('page-indicator');
const itemsPerPageSelect = document.getElementById('items-per-page');

// Fonction qui lit une valeur dans le localStorage.
// Si la clé n'existe pas, on renvoie la valeur de secours (fallback).
function getStoredValue(key, fallback) {
    try {
        const value = localStorage.getItem(key);
        if (value === null) return fallback;
        const parsed = Number(value);
        return Number.isNaN(parsed) ? fallback : parsed;
    } catch (error) {
        return fallback;
    }
}

// Fonction qui enregistre une valeur dans le localStorage.
function saveStoredValue(key, value) {
    try {
        localStorage.setItem(key, String(value));
    } catch (error) {
        console.warn('Impossible de sauvegarder dans localStorage :', error);
    }
}

// Fonction qui enregistre à la fois la page courante
// et le nombre d'éléments par page dans le stockage local.
function updateLocalPaginationState() {
    saveStoredValue(STORAGE_KEYS.currentPage, currentPage);
    saveStoredValue(STORAGE_KEYS.itemsPerPage, itemsPerPage);
}

// Fonction qui remplit le sélecteur de filières avec les valeurs uniques.
// On évite les doublons grâce à Set puis on trie les filières alphabétiquement.
function populateMajorFilter(students) {
    // Extraction des filières sans doublons.
    const majors = [...new Set(students.map((student) => student.filiere).filter(Boolean))].sort((a, b) => a.localeCompare(b));
    const currentValue = majorSelect.value || 'all';

    // On réinitialise le menu déroulant pour éviter des doublons à chaque chargement.
    majorSelect.innerHTML = '<option value="all">Toutes les filières</option>';

    // Ajout de chaque filière comme option du select.
    majors.forEach((major) => {
        const option = document.createElement('option');
        option.value = major;
        option.textContent = major;
        majorSelect.appendChild(option);
    });

    // Si la filière actuellement sélectionnée existe encore,
    // on la conserve, sinon on remet la valeur par défaut.
    if (majors.includes(currentValue)) {
        majorSelect.value = currentValue;
    } else {
        majorSelect.value = 'all';
    }
}

// Fonction principale de filtrage :
// elle applique les critères du nom et de la filière.
function filterStudents() {
    // Lecture de la recherche saisi dans le champ texte.
    const query = searchInput.value.trim().toLowerCase();

    // Filière sélectionnée dans la liste déroulante.
    const selectedMajor = majorSelect.value;

    // On applique le filtre sur la liste complète.
    filteredStudents = allStudents.filter((student) => {
        // Vérifie si le nom contient la recherche.
        const matchesName = student.nom.toLowerCase().includes(query);

        // Vérifie si la filière correspond ou si "Toutes les filières" est sélectionné.
        const matchesMajor = selectedMajor === 'all' || student.filiere === selectedMajor;

        // Un étudiant est conservé seulement s'il match les deux critères.
        return matchesName && matchesMajor;
    });

    // Quand le nombre de résultats change, on revient toujours à la page 1.
    currentPage = 1;
    updateLocalPaginationState();
    renderTable();
}

// Fonction qui affiche seulement les éléments de la page courante.
function renderTable() {
    // Nombre total de pages calculé selon le nombre de résultats filtrés.
    const totalPages = Math.max(1, Math.ceil(filteredStudents.length / itemsPerPage));

    // Si la page courante dépasse le dernier numéro possible, on la corrige.
    if (currentPage > totalPages) {
        currentPage = totalPages;
    }

    // Si la page courante est inférieure à 1, on la remet à 1.
    if (currentPage < 1) {
        currentPage = 1;
    }

    // Calcul de l'intervalle à afficher :
    // exemple : page 2, 20 éléments/page => de 20 à 39.
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;

    // On découpe le tableau filtré pour obtenir uniquement les étudiants de cette page.
    const studentsToDisplay = filteredStudents.slice(startIndex, endIndex);

    // On vide puis remplit le tbody de la table.
    tableBody.innerHTML = studentsToDisplay.length
        ? studentsToDisplay.map((student) => `
            <tr>
                <td>${student.nom}</td>
                <td>${student.age}</td>
                <td>${student.filiere}</td>
            </tr>
        `).join('')
        : '<tr><td colspan="3" class="empty-state">Aucun étudiant trouvé pour ces critères.</td></tr>';

    // Mise à jour du compteur de résultats avec le nombre total filtré.
    resultsCount.textContent = `Résultats trouvés : ${filteredStudents.length}`;

    // Mise à jour du texte de l'indicateur de page.
    pageIndicator.textContent = `Page ${currentPage} sur ${totalPages}`;

    // Désactivation des boutons selon la position dans la pagination.
    prevButton.disabled = currentPage === 1;
    nextButton.disabled = currentPage >= totalPages;

    // Synchro avec le sélecteur du nombre d'éléments par page.
    itemsPerPageSelect.value = String(itemsPerPage);

    // Sauvegarde des valeurs dans le localStorage.
    updateLocalPaginationState();
}

// Fonction qui permet de se déplacer vers une page précise.
function goToPage(targetPage) {
    const totalPages = Math.max(1, Math.ceil(filteredStudents.length / itemsPerPage));

    // On limite la page demandée entre 1 et la dernière page possible.
    currentPage = Math.min(Math.max(1, targetPage), totalPages);
    renderTable();
}

// Fonction qui charge les données JSON depuis le fichier students-v2.json.
function loadStudents() {
    fetch('students-v2.json')
        .then((response) => {
            // Vérifie que la réponse HTTP est correcte.
            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }
            return response.json();
        })
        .then((data) => {
            // On vérifie que les données reçues sont bien un tableau.
            allStudents = Array.isArray(data) ? data : [];

            // On remplit le filtre de filière avec les données chargées.
            populateMajorFilter(allStudents);

            // On applique immédiatement le filtre initial (aucun texte, toutes filières).
            filterStudents();
        })
        .catch((error) => {
            // Gestion des erreurs de chargement.
            console.error('Chargement des étudiants impossible:', error);
            tableBody.innerHTML = '<tr><td colspan="3" class="empty-state">Impossible de charger les données des étudiants.</td></tr>';
            resultsCount.textContent = 'Résultats trouvés : 0';
            pageIndicator.textContent = 'Page 0 sur 0';
            prevButton.disabled = true;
            nextButton.disabled = true;
        });
}

// Écouteur sur le champ de recherche :
// à chaque frappe, on recalcule les résultats.
searchInput.addEventListener('input', filterStudents);

// Écouteur sur le select de filière :
// si l'utilisateur change de filière, on refait le filtrage.
majorSelect.addEventListener('change', filterStudents);

// Bouton "Précédent" : on revient à la page précédente.
prevButton.addEventListener('click', () => {
    goToPage(currentPage - 1);
});

// Bouton "Suivant" : on avance à la page suivante.
nextButton.addEventListener('click', () => {
    goToPage(currentPage + 1);
});

// Sélecteur du nombre d'éléments par page.
itemsPerPageSelect.addEventListener('change', (event) => {
    // On convertit la valeur sélectionnée en nombre.
    itemsPerPage = Number(event.target.value) || DEFAULT_ITEMS_PER_PAGE;

    // Quand on modifie ce nombre, on repart de la première page.
    currentPage = 1;
    renderTable();
});

// On initialise le sélecteur à la bonne valeur enregistrée dans localStorage.
itemsPerPageSelect.value = String(itemsPerPage);

// On lance le chargement des étudiants au démarrage du script.
loadStudents();
