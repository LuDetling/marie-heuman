function afficherContenu(numero) {
    // Masquer tous les contenus
    const contenus = document.querySelectorAll('.item-service');
    contenus.forEach(c => c.classList.remove('visible'));

    // Retirer la classe actif de tous les boutons
    const boutons = document.querySelectorAll('.btn');
    boutons.forEach(b => b.classList.remove('actif'));

    // Afficher le contenu sélectionné
    document.getElementById('contenu' + numero).classList.add('visible');

    // Activer le bouton cliqué
    boutons[numero - 1].classList.add('actif');
}

let serviceButtons = document.querySelectorAll('.service-button')

serviceButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        serviceButtons.forEach((btn, btnIndex) => {
            if (btnIndex === index) {
                btn.classList.add('active-border-marron-button');
            } else {
                btn.classList.remove('active-border-marron-button');
            }
        });

        document.getElementById('content-service-' + (index + 1)).classList.add('active-service');
        document.querySelectorAll('.item-service').forEach((service, svcIndex) => {
            if (svcIndex !== index) {
                service.classList.remove('active-service');
            }
        });

    })
});


function toggleApproche() {
    const cards = document.querySelectorAll('.card-approche')
    cards.forEach(card => {

        const showBtn = card.querySelector('.show-approche')
        const hideBtn = card.querySelector('.hide-approche')
        const listHide = card.querySelector('.list-hide-approche')
        showBtn.addEventListener('click', () => {
            showBtn.classList.toggle('hidden')
            listHide.classList.toggle('visible')
            hideBtn.classList.toggle('hidden')
        })

    })
}

toggleApproche();

document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.home-header');
    const images = document.querySelectorAll('.images-header img');
    
    if (!header || images.length === 0) return;

    let imageIndex = 0;
    let lastMouseX = 0;
    let lastMouseY = 0;
    const threshold = 150; // Distance en pixels à parcourir avant d'afficher la prochaine image

    header.addEventListener('mousemove', (e) => {
        // Calcul de la distance parcourue par la souris
        const distance = Math.hypot(e.clientX - lastMouseX, e.clientY - lastMouseY);

        if (distance > threshold) {
            // Sélection de l'image actuelle
            const img = images[imageIndex];

            // Positionnement par rapport à la section header
            const rect = header.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            // Génération d'une rotation aléatoire entre -10 et 10 degrés
            // const randomRotation = (Math.random() - 0.5) * 20;

            // Appliquer les styles et la classe active
            img.style.left = `${x}px`;
            img.style.top = `${y}px`;
            // img.style.setProperty('--rotation', `${randomRotation}deg`);
            img.classList.add('is-active');

            // Faire disparaître l'image après un court instant (ex: 1 seconde)
            setTimeout(() => {
                img.classList.remove('is-active');
            }, 1000);

            // Mettre à jour les variables pour la prochaine image
            lastMouseX = e.clientX;
            lastMouseY = e.clientY;

            // Passer à l'image suivante (et boucler si on arrive à la fin)
            imageIndex = (imageIndex + 1) % images.length;
        }
    });
});