document.addEventListener('DOMContentLoaded', function () {

    // URL Ajax de WordPress (Standard)
    const ajaxUrl = calendly_vars.ajaxurl;

    // Fonction pour récupérer les créneaux
    async function fetchSlots() {


        /// 1. Définir la date de début : 1 minute dans le futur
        // const now = new Date();
        // // Ajoutez 60 secondes pour être sûr que l'heure de début est dans le futur
        // const futureStart = new Date(now.getTime() + 60000);

        // // 2. Définir la date de fin : 7 jours à partir de la date de début
        // // (Utilisez 'futureStart' comme base pour le calcul de l'heure de fin)
        // const end = new Date(futureStart.getTime() + 7 * 24 * 60 * 60 * 1000);

        // Durée de 7 jours en millisecondes
        const sevenDaysInMs = 7 * 24 * 60 * 60 * 1000;

        // 1. Calculer la date de début : 7 jours plus tard (+ 1 minute de sécurité)
        const now = new Date();

        // La date de début est (aujourd'hui + 7 jours) + 1 minute (pour être sûr d'être dans le futur)
        const futureStart = new Date(now.getTime() + sevenDaysInMs);

        // 2. Calculer la date de fin : 7 jours APRÈS la nouvelle date de début (donc 14 jours au total)
        const end = new Date(futureStart.getTime() + sevenDaysInMs);

        // Conversion au format ISO 8601 requis par l'API Calendly
        const start = futureStart.toISOString();
        const end_time = end.toISOString();

        console.log("Recherche à partir de:", start);
        console.log("Recherche à partir de:", end_time);

        try {
            // Appel à TON serveur WordPress (action = nom de la fonction PHP)
            const response = await fetch(`${ajaxUrl}?action=get_calendly_slots&start_time=${start}&end_time=${end_time}`);
            const result = await response.json();

            if (result.success) {
                const slots = result.data.collection; // Les données brutes de Calendly
                renderSlots(slots);
                console.log(slots);

            } else {
                console.error("Erreur PHP:", result);
            }
        } catch (error) {
            console.error("Erreur JS:", error);
        }
    }

    // Fonction pour afficher les boutons (Nettoie et remplit la grille)
    function renderSlots(allSlots) {
        // Regrouper tous les créneaux par jour
        const groupedSlots = groupSlotsByDay(allSlots);
        const availableDates = Object.keys(groupedSlots).sort(); // Trier les jours

        const otherDaysContainer = document.querySelector('.other-days');
        const timeSlotsGrid = document.querySelector('.time-slots-grid');
        const dateHeader = document.querySelector('.date-header span:first-child');

        // Vider les conteneurs existants
        otherDaysContainer.innerHTML = '';

        if (availableDates.length === 0) {
            otherDaysContainer.innerHTML = '<p>Aucun jour disponible pour cette période.</p>';
            return;
        }

        // --- A. Afficher la liste des jours (la partie 'other-days') ---

        // Définir le jour par défaut (le premier jour disponible)
        const firstDayKey = availableDates[0];

        availableDates.forEach((dateKey, index) => {
            const dateObj = new Date(dateKey);

            // Affichage lisible de la date (ex: Lundi 10 décembre 2025)
            const displayDate = dateObj.toLocaleDateString('fr-FR', {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });

            // Créer l'élément de la ligne de jour
            const row = document.createElement('div');
            row.className = 'day-row';
            row.setAttribute('data-date', dateKey);
            row.innerHTML = `
            <span>${displayDate}</span>
            <span class="radio-circle"></span>
        `;

            // Si c'est le premier jour, le marquer comme actif
            if (index === 0) {
                row.classList.add('active');
                dateHeader.textContent = displayDate; // Mettre à jour l'en-tête du calendrier
            }

            // Ajouter le gestionnaire de clic pour changer de jour
            row.addEventListener('click', () => {
                // Mettre à jour les classes actives
                document.querySelectorAll('.day-row').forEach(r => r.classList.remove('active'));
                row.classList.add('active');

                // Mettre à jour l'en-tête et la grille
                dateHeader.textContent = displayDate;
                displayTimeSlots(groupedSlots[dateKey]); // Afficher les créneaux de ce jour
            });

            otherDaysContainer.appendChild(row);
        });

        // --- B. Afficher les créneaux du premier jour par défaut ---
        displayTimeSlots(groupedSlots[firstDayKey]);
    }


    /**
     * Affiche les boutons d'heures pour un jour donné.
     * @param {Array} slotsForDay Les créneaux du jour sélectionné.
     */
    function displayTimeSlots(slotsForDay) {
        const grid = document.querySelector('.time-slots-grid');
        grid.innerHTML = ''; // Vider l'ancienne grille

        slotsForDay.forEach(slot => {
            const dateObj = new Date(slot.start_time);

            // Conversion de l'heure UTC à l'heure locale pour l'affichage (ex: 08:30Z -> 09:30 locale)
            const timeString = dateObj.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });

            const btn = document.createElement('button');
            btn.className = 'time-btn';
            btn.innerText = timeString;

            // ATTENTION : Pour finaliser l'étape 1, vous devez stocker le slot.start_time UTC
            // dans le bouton pour le récupérer lors de la soumission du formulaire !
            btn.setAttribute('data-start-time-utc', slot.start_time);

            btn.addEventListener('click', function () {
                // Logique de sélection (un seul bouton actif)
                document.querySelectorAll('.time-btn').forEach(b => b.classList.remove('selected'));
                this.classList.add('selected');

                // Mettre à jour le résumé (facultatif, mais utile)
                const fullDate = dateObj.toLocaleDateString('fr-FR', { weekday: 'long', day: 'numeric', month: 'long' });
                document.querySelector('.summary-text').innerHTML = `Sélectionné : ${fullDate} à ${timeString}`;
            });

            grid.appendChild(btn);
        });
    }
    // Gestion du bouton "Suivant" (Passage Étape 1 -> Étape 2)
    document.getElementById('go-to-step-2').addEventListener('click', function () {
        if (!document.querySelector('.time-btn.selected')) {
            alert("Veuillez sélectionner une heure avant de continuer.");
            return;
        }
        document.getElementById('step-1').classList.add('hidden');
        document.getElementById('step-2').classList.remove('hidden');
    });

    // Gestion du bouton "Retour"
    document.getElementById('back-to-step-1').addEventListener('click', function () {
        document.getElementById('step-2').classList.add('hidden');
        document.getElementById('step-1').classList.remove('hidden');
    });

    // Lancer la recherche au chargement de la page
    fetchSlots();
});

/**
 * Regroupe les créneaux par date au format AAAA-MM-JJ.
 * @param {Array} slots La liste des créneaux de l'API Calendly.
 * @returns {Object} Les créneaux regroupés.
 */
function groupSlotsByDay(slots) {
    const grouped = {};
    slots.forEach(slot => {
        // L'heure de début est au format UTC, nous la traitons comme une date
        const dateObj = new Date(slot.start_time);

        // Formater la date en AAAA-MM-JJ (pour le regroupement)
        // Note: Utilisez toISOString().slice(0, 10) pour garantir que c'est UTC et éviter un décalage
        const dateKey = dateObj.toISOString().slice(0, 10);

        if (!grouped[dateKey]) {
            grouped[dateKey] = [];
        }
        grouped[dateKey].push(slot);
    });
    return grouped;
}