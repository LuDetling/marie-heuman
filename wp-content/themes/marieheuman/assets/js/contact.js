document.addEventListener('DOMContentLoaded', function () {

    // URL Ajax de WordPress (Standard)
    const ajaxUrl = calendly_vars.ajaxurl;
    const nonce = calendly_vars.nonce;
    let dateSelected = ""
    let typeCall = ""


    const invitee = {
        "event_type": "https://api.calendly.com/event_types/07357e4f-138c-4b3b-bc93-daa67883f28d",
        "start_time": dateSelected,
        "invitee": {
            "first_name": "",
            "last_name": "",
            "email": "",
            "timezone": "Europe/Paris"
        },
        "location": {
            "kind": typeCall,
            "location": "+33668372876"
        },
        "questions_and_answers": [

        ]
    }

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

        const calendarCards = document.querySelector('.calendar-cards');
        // Vider les conteneurs existants

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
            const row = document.createElement('details');
            row.className = 'collapse calendar-card';
            row.setAttribute('data-date', dateKey);
            row.setAttribute('name', 'my-accordion-day')
            // if (index === 0) { row.setAttribute('open', 'true') }
            row.innerHTML = `
            <summary class="collapse-title date-header">${displayDate}</summary>
            <div class="collapse-content">
                <div class="time-slots-grid">
                </div>
                <hr class="trait">
                <div class="meeting-type-selector">
                    <div class="type-option">
                        <input type="radio" name="meeting_type" value="google_conference" checked>
                        <label class="option-content" for="google_conference">
                            <span class="icon">📹</span>
                            <strong>Visioconférence</strong>
                            <small>Google Meet</small>
                        </label>
                    </div>

                    <div class="type-option">
                        <input type="radio" name="meeting_type" value="outbound_call">
                        <label class="option-content" for="outbound_call">
                            <span class="icon">📞</span>
                            <strong>Téléphone</strong>
                            <small>Appel téléphonique</small>
                        </label>
                    </div>
                </div>
            </div>
        `;
            row.querySelector("summary").addEventListener('click', () => {
                resetSelectedStep1()
            })


            // Ajouter le gestionnaire de clic pour changer de jour
            calendarCards.appendChild(row)
            afficherCreneauxDate(groupedSlots[dateKey], row)
            selectTypeCall(row)

        });
    }

    function afficherCreneauxDate(creneauxDate, row) {
        const grid = row.querySelector('.time-slots-grid')

        creneauxDate.forEach(creneauDate => {

            const dateObj = new Date(creneauDate.start_time);
            // Conversion de l'heure UTC à l'heure locale pour l'affichage (ex: 08:30Z -> 09:30 locale)
            const timeString = dateObj.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });
            const btn = document.createElement('button');
            btn.className = 'time-btn';
            btn.innerText = timeString;
            btn.setAttribute('data-start-time-utc', creneauDate.start_time);
            grid.appendChild(btn);

            btn.addEventListener('click', function () {
                // Logique de sélection (un seul bouton actif)
                document.querySelectorAll('.time-btn').forEach(b => b.classList.remove('selected'));
                this.classList.add('selected');
                dateSelected = creneauDate.start_time;
                document.querySelector('.error').textContent = ""

                // Mettre à jour le résumé (facultatif, mais utile)
                const fullDate = dateObj.toLocaleDateString('fr-FR', {
                    weekday: 'long', day: 'numeric', month: 'long', year: "numeric",
                });
                document.querySelector('.summary-text').textContent = `${fullDate} à ${timeString}`;
                if (typeCall === "google_conference") {
                    document.querySelector('.call').textContent = "en visioconférence"
                } else if (typeCall === "outbound_call") {
                    document.querySelector('.call').textContent = "en appel téléphonique"
                }
                if (typeCall && dateSelected) {
                    if (document.querySelector('.locked')) {
                        document.querySelector('.locked').classList.remove('locked')
                    }
                }
            });

        });
    }

    function selectTypeCall(row) {
        row.addEventListener('click', (e) => {
            // 2. Utilisez .closest() pour trouver l'élément parent le plus proche qui a la classe 'type-option'
            //    Cela permet de s'assurer que vous ciblez le bon bloc, peu importe si l'utilisateur
            //    a cliqué sur l'icône, le texte, ou la radio.
            const optionClicked = e.target.closest('.type-option');

            if (optionClicked) {
                // 3. Utilisez querySelector sur l'élément cliqué pour trouver l'input radio à l'intérieur
                const radioInput = optionClicked.querySelector('input[type="radio"]');

                if (row.querySelector('.type-option.active')) {
                    row.querySelector('.type-option.active').classList.remove('active')
                }
                optionClicked.classList.add('active')

                if (radioInput) {
                    // 4. Vous avez maintenant la valeur !
                    const selectedValue = radioInput.value;

                    // Si vous souhaitez également le sélectionner (cocher le radio), faites :
                    radioInput.checked = true;

                    typeCall = selectedValue
                    if (typeCall === "google_conference") {
                        document.querySelector('.call').textContent = "en visioconférence"
                    } else if (typeCall === "outbound_call") {
                        document.querySelector('.call').textContent = "en appel téléphonique"
                    }
                    document.querySelector('.error').textContent = ""

                    if (typeCall && dateSelected) {
                        if (document.querySelector('.locked')) {
                            document.querySelector('.locked').classList.remove('locked')
                        }
                    }
                    // Ajoutez ici votre logique pour mettre à jour 'dateSelected' ou autre
                }
            }
        });

    }

    function resetSelectedStep1() {
        dateSelected = "";
        typeCall = ""
        document.querySelector('.summary-text').textContent = "";
        document.querySelector('.call').textContent = ""
        document.querySelector('.error').textContent = ""
        document.querySelector('#go-to-step-2').classList.add('locked')

        if (document.querySelector('.time-btn.selected')) {
            document.querySelector('.time-btn.selected').classList.remove('selected')
        }
        if (document.querySelector('.type-option.active')) {
            document.querySelector('.type-option.active').classList.remove('active')
        }
    }

    // Gestion du bouton "Suivant" (Passage Étape 1 -> Étape 2)
    document.getElementById('go-to-step-2').addEventListener('click', function () {
        console.log(dateSelected);
        console.log(typeCall);

        if (!dateSelected || !typeCall) {
            document.querySelector('.error').textContent = "Vous devez choisir un horaire et le type de rendez-vous pour continuer."
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

    async function fetchForm() {
        try {
            const response = await fetch(`${ajaxUrl}?action=get_calendly_form`);
            const data = await response.json();

            if (data.success) {
                const form = data.data.resource.custom_questions; // Les données brutes de Calendly
                renderForm(form)

            } else {
                console.error("Erreur PHP:", result);
            }

        } catch (error) {

        }
    }

    // FORMULAIRE 
    const formElement = document.querySelector('#form-calendly');

    function renderForm(datas) {

        datas.forEach((data, index) => {
            const row = document.createElement('div');

            if (data.answer_choices.length > 0 && data.type === "multi_select") {
                const title = document.createElement('div');
                if (data.required) {
                    title.classList.add('required')
                }
                title.textContent = data.name;
                row.appendChild(title);

            } else {
                const title = document.createElement('label');
                title.setAttribute('for', data.name);
                if (data.required) {
                    title.classList.add('required')
                } title.textContent = data.name;
                row.appendChild(title);
            }

            if (data.answer_choices.length > 0 && data.type === "single_select") {
                const select = document.createElement('select');
                select.setAttribute('id', data.name);
                select.setAttribute('name', data.name);
                select.setAttribute('position', data.position)

                data.answer_choices.forEach(choice => {
                    const option = document.createElement('option');
                    option.value = choice;
                    option.textContent = choice;
                    select.appendChild(option);
                })

                row.appendChild(select);

            }
            else if (data.answer_choices.length > 0 && data.type === "multi_select") {
                const fieldset = document.createElement('fieldset');
                fieldset.setAttribute('id', data.name);
                fieldset.setAttribute('name', data.name);
                fieldset.setAttribute('position', data.position);

                data.answer_choices.forEach(choice => {
                    const div = document.createElement('div');

                    const input = document.createElement('input');
                    input.setAttribute('type', 'checkbox');
                    input.setAttribute('id', choice);
                    input.setAttribute('name', choice);
                    div.appendChild(input);

                    const label = document.createElement('label');
                    label.setAttribute('for', choice)
                    label.textContent = choice;
                    div.appendChild(label);

                    fieldset.appendChild(div);
                })

                row.appendChild(fieldset);

            }
            else if (data.type === "text") {
                row.classList.add('textarea-content')
                const textarea = document.createElement('textarea');
                textarea.setAttribute('id', data.name);
                textarea.setAttribute('name', data.name);
                textarea.setAttribute('position', data.position);
                row.appendChild(textarea);

            }
            else if (data.answer_choices.length === 0) {
                const input = document.createElement('input');
                input.setAttribute('id', data.name);
                input.setAttribute('position', data.position);
                input.setAttribute('name', data.name);
                row.appendChild(input);

            } else if (data.answer_choices.length === 1) {
                const input = document.createElement('input');
                input.setAttribute('type', 'checkbox');
                input.setAttribute('id', data.name);
                input.setAttribute('position', data.position);
                input.setAttribute('name', data.name);
                row.appendChild(input);

            }
            formElement.appendChild(row)
        })
    }

    formElement.addEventListener('submit', function (e) {
        e.preventDefault();
        const form = this;

        // Le tableau final dans le format souhaité
        const donneesFormulaireTableau = [];

        // On utilise FormData pour récupérer les valeurs textuelles et select
        const formData = new FormData(form);

        // 1. Traitement des champs simples (texte, email, phone, select, textarea)
        //    Ces champs apparaissent normalement une seule fois dans formData.
        for (const [name, value] of formData.entries()) {
            // Trouver l'élément original pour récupérer la position et le libellé
            const element = form.querySelector(`[name="${name}"]`);

            // Assurez-vous que l'élément a été trouvé et qu'il n'est pas une checkbox
            // On traite les checkboxes dans la section 2 pour éviter les doublons/erreurs.
            if (element && element.type !== 'checkbox') {
                const questionLabel = form.querySelector(`label[for="${element.id}"]`)
                    ? form.querySelector(`label[for="${element.id}"]`).textContent.trim()
                    : name; // Utilise le name si pas de label 'for' correspondant

                // Récupère la position de l'attribut 'position' (s'il existe)
                const positionValue = element.getAttribute('position') || '';

                donneesFormulaireTableau.push({
                    question: questionLabel,
                    answer: value,
                    position: parseInt(positionValue)
                });
            }
        }

        const fieldsets = form.querySelectorAll('fieldset');
        fieldsets.forEach(fieldset => {
            let dataFieldset = [];
            fieldset.querySelectorAll('input[type="checkbox"]:checked').forEach(checkbox => {
                dataFieldset.push(checkbox.name);
            })

            donneesFormulaireTableau.push({
                question: fieldset.name,
                answer: dataFieldset.join(', '),
                position: parseInt(fieldset.getAttribute('position'))
            })
        })

        // 4. Affichage du résultat final (Vous pouvez trier par 'position' ici si nécessaire)
        donneesFormulaireTableau.sort((a, b) => a.position - b.position);

        console.log("Tableau de données final :", donneesFormulaireTableau);
        parseDatas(donneesFormulaireTableau)
    })

    // Lancer la recherche au chargement de la page
    fetchForm();
    fetchSlots();


    async function parseDatas(donneesFormulaireTableau) {
        invitee.start_time = dateSelected;
        invitee.invitee.first_name = donneesFormulaireTableau.find(value => value.question === "Prénom").answer
        invitee.invitee.last_name = donneesFormulaireTableau.find(value => value.question === "Nom").answer
        invitee.invitee.email = donneesFormulaireTableau.find(value => value.question === "Email").answer

        if (typeCall === "google_conference") {
            invitee.location.kind = "google_conference"
            delete invitee.location.location
        } else if (typeCall === "outbound_call") {
            invitee.location.kind = "outbound_call"
            invitee.location.location = donneesFormulaireTableau.find(value => value.question === "Téléphone").answer
        }

        const datas = donneesFormulaireTableau.filter(value => Number.isFinite(value.position)).filter(value => value.answer !== "")
        invitee.questions_and_answers = datas

        const formData = new FormData();
        formData.append('action', 'post_calendly_invitee'); // L'action est obligatoire
        formData.append('nonce', nonce);
        formData.append('datas', JSON.stringify(invitee));

        try {
            // Appel à TON serveur WordPress (action = nom de la fonction PHP)
            const response = await fetch(ajaxUrl, {
                method: "POST",
                body: formData
            });
            const result = await response.json();

            console.log(result);


        } catch (error) {
            console.error("Erreur JS:", error);
        }
    }
});



function groupSlotsByDay(slots) {
    const grouped = [];
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