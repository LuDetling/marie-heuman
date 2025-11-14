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

function carouselBlogAccueil() {
    // let contentIndicator = document.querySelectorAll('.content-indicator a');
    // let maxSlide = contentIndicator.length
    // let nextSlide = 2;
    // let prevSlide = 0;

    // contentIndicator.forEach((button, index) => {
    //     button.addEventListener('click', () => {
    //         contentIndicator.forEach((btn, btnindex) => {
    //             if (btnindex === index) {
    //                 btn.classList.add('active-card-indicator')
    //             } else {
    //                 btn.classList.remove('active-card-indicator')
    //             }
    //         })
    //     })
    // })

    // let btnNext = document.querySelector('.content-blog-accueil .btn-next')
    // let btnPrev = document.querySelector('.content-blog-accueil .btn-prev')

    // if (window.innerWidth < 1024) {
    //     btnNext.href = "#card-blog2"
    //     nextSlide = 2;
    // } else if (window.innerWidth > 1024 && window.innerWidth < 1537) {
    //     btnNext.href = "#card-blog3"
    //     nextSlide = 3;
    // } else {
    //     btnNext.href = "#card-blog4"
    //     nextSlide = 4;
    // }

    // btnNext.addEventListener('click', () => {
    //     if (nextSlide + 1 > maxSlide + 1) return
    //     btnNext.href = "#card-blog" + nextSlide++
    //     btnPrev.href = "#card-blog" + prevSlide++
    //     console.log(nextSlide)
    //     console.log(prevSlide)
    // })

    // btnPrev.addEventListener('click', () => {
    //     if (prevSlide - 1 < 0) return
    //     btnNext.href = "#card-blog" + nextSlide--
    //     btnPrev.href = "#card-blog" + prevSlide--
    //     console.log(nextSlide)
    //     console.log(prevSlide)
    // })

    // const updateSlide = () => {

    // }

    document.addEventListener('DOMContentLoaded', function () {
        const carousel = document.querySelector('.projets-grid.carousel');
        const cards = document.querySelectorAll('.carousel-item');
        const indicators = document.querySelectorAll('.indicator');
        const btnPrev = document.querySelector('.btn-prev');
        const btnNext = document.querySelector('.btn-next');

        if (!carousel || cards.length === 0) return;

        let currentIndex = 0;
        const totalCards = cards.length;

        // Fonction pour mettre à jour le carousel
        function updateCarousel(index) {
            // Retirer les classes actives
            cards.forEach(card => card.classList.remove('active-card'));
            indicators.forEach(indicator => indicator.classList.remove('active-card-indicator'));

            // Ajouter les classes actives
            cards[index].classList.add('active-card');
            indicators[index].classList.add('active-card-indicator');

            // Mettre à jour les URLs des boutons
            btnPrev.href = `#card-blog${index === 0 ? totalCards : index}`;
            btnNext.href = `#card-blog${index === totalCards - 1 ? 1 : index + 2}`;

            // Scroller vers la carte active
            cards[index].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });

            currentIndex = index;
        }

        // Gestion du bouton précédent
        btnPrev.addEventListener('click', function (e) {
            e.preventDefault();
            const newIndex = currentIndex === 0 ? totalCards - 1 : currentIndex - 1;
            updateCarousel(newIndex);
        });

        // Gestion du bouton suivant
        btnNext.addEventListener('click', function (e) {
            e.preventDefault();
            const newIndex = currentIndex === totalCards - 1 ? 0 : currentIndex + 1;
            updateCarousel(newIndex);
        });

        // Gestion des indicateurs
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', function (e) {
                e.preventDefault();
                updateCarousel(index);
            });
        });

        // Navigation au clavier
        document.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowLeft') {
                e.preventDefault();
                btnPrev.click();
            } else if (e.key === 'ArrowRight') {
                e.preventDefault();
                btnNext.click();
            }
        });

        // Auto-play optionnel (décommenter pour activer)
        // setInterval(() => {
        //     btnNext.click();
        // }, 5000);

        // Initialiser le carousel
        updateCarousel(0);
    });
}

carouselBlogAccueil()