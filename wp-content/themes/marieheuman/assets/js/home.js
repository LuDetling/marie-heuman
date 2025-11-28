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