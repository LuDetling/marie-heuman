let avantApresButtons = document.querySelectorAll('.avant-apres-button')

avantApresButtons.forEach((button, index) => {
    button.addEventListener('click', () => {

        avantApresButtons.forEach((btn, btnIndex) => {
            if (btnIndex === index) {
                btn.classList.add('active-filter');
            } else {
                btn.classList.remove('active-filter');
            }
        });
        document.getElementById('content-avant-apres-' + (index)).classList.add('active-avant-apres');
        document.querySelectorAll('.content-avant-apres').forEach((service, svcIndex) => {
            if (svcIndex !== index) {
                service.classList.remove('active-avant-apres');
            }
        });

    })
});

// let avantApresButtonsImg = document.querySelectorAll('.avant-apres-button-img')

// avantApresButtonsImg.forEach((button) => {
//     button.addEventListener('click', (e) => {
//         // 1. Récupération de l'index cible écrit dans le data-index du bouton
//         const targetIndex = button.dataset.index;

//         // 2. Retrait de la classe active sur TOUS les contenus
//         document.querySelectorAll('.content-avant-apres').forEach((content) => {
//             content.classList.remove('active-avant-apres');
//         });

//         // 3. Ajout de la classe active sur le bloc ciblé par le data-index
//         const targetContent = document.getElementById('content-avant-apres-' + targetIndex);
//         if (targetContent) {
//             targetContent.classList.add('active-avant-apres');
//         }

//         // 4. (Optionnel) Mise à jour du filtre actif dans le menu sous l'image
//         document.querySelectorAll('.avant-apres-button').forEach((btn) => {
//             btn.classList.remove('active-filter');
//         });
//         const targetFilter = document.querySelector(`.avant-apres-button[data-index="${targetIndex}"]`);
//         if (targetFilter) {
//             targetFilter.classList.add('active-filter');
//         }
//     });
// });


