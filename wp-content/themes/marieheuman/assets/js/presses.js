let cards = document.querySelectorAll('.card-presse');

cards.forEach((card, index) => {

    let showImages = card.querySelector('.show-images');
    if (showImages === null) return;

    showImages.addEventListener('click', () => {
        const modal = document.getElementById('my_modal_' + index);

        if (modal && typeof modal.showModal === 'function') {
            modal.showModal();
            new Swiper('.swiperPresses-' + index, {
                slidesPerView: 1,
                spaceBetween: 40,
                centeredSlides: true,
                loop: true,
                pagination: {
                    el: ".swiper-pagination-presses-" + index,
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next-presses-" + index,
                    prevEl: ".swiper-button-prev-presses-" + index,
                },
                mousewheel: {
                },
                breakpoints: {
                    768: {
                        slidesPerView: "auto",
                        spaceBetween: 80,
                    },
                }
            });
        } else {
            console.error("L'élément dialog n'est pas supporté ou introuvable.");
        }
    });

})
