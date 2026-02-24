const swiperAvis = new Swiper('.swiperAvis', {
    slidesPerView: 1,
    spaceBetween: 80,
    loop: true,
    pagination: {
        el: ".swiper-pagination-avis",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next-avis",
        prevEl: ".swiper-button-prev-avis",
    },
});
const swiperSingleBlog = new Swiper('.swiperSingleBlog', {
    slidesPerView: 1,
    spaceBetween: 80,
    loop: true,
    pagination: {
        el: ".swiper-pagination-single-blog",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next-single-blog",
        prevEl: ".swiper-button-prev-single-blog",
    },
});

const swiperHomeBlog = new Swiper('.swiperHomeBlog', {
    slidesPerView: 1,
    spaceBetween: 40,
    loop: true,
    pagination: {
        el: ".swiper-pagination-home-blog",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next-home-blog",
        prevEl: ".swiper-button-prev-home-blog",
    },
    breakpoints: {
        768: {
            slidesPerView: 2,
            spaceBetween: 80,
        },
    }
});

const universSwiper = new Swiper('.universSwiper', {
    slidesPerView: 1,
    spaceBetween: 80,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
        },
    }
});


const contactSwiper = new Swiper('.contactSwiper', {
    slidesPerView: 1,
    spaceBetween: 80,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
        },
    }
});

const projectSwiper = new Swiper('.swiperProjectPage', {
    slidesPerView: 'auto', // Par défaut sur mobile
    spaceBetween: 40,
    grabCursor: true, // Petit bonus pour l'UX
    mousewheel: true,
    pagination: {
        el: ".swiper-pagination-swiperProjectPage",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next-swiperProjectPage",
        prevEl: ".swiper-button-prev-swiperProjectPage",
    },
    breakpoints: {
        768: {
            slidesPerView: 'auto', // L'image prend sa largeur définie en CSS
            spaceBetween: 0,
        },
    }
});

const commonOptions = {
    slidesPerView: 1,
    spaceBetween: 40,
    loop: true,
    observer: true,
    observeParents: true,
    controller: {
        by: 'container' // C'est cette ligne qui sauve ton navigateur !
    }
};
const allContentAvantApres = document.querySelectorAll('.content-avant-apres');
const allSwipers = [];

allContentAvantApres.forEach((content, index) => {
    if (index === 0) {
        const swiper = new Swiper('.swiperProjectAvantApres-' + index, {
            ...commonOptions,
            pagination: {
                el: ".swiper-pagination-avant-apres",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next-avant-apres",
                prevEl: ".swiper-button-prev-avant-apres",
            },
            watchOverflow: true
        })
        allSwipers.push(swiper);
    } else {
        const swiper = new Swiper('.swiperProjectAvantApres-' + index, commonOptions);
        allSwipers.push(swiper);
    }
})

allSwipers.forEach((currentSwiper) => {
    currentSwiper.on('slideChange', () => {
        const newIndex = currentSwiper.realIndex;
        allSwipers.forEach((s) => {
            // On évite la boucle infinie en vérifiant l'index
            if (s.realIndex !== newIndex) {
                s.slideToLoop(newIndex);
            }
        });
    });
});

const swiperProjetsRecents = new Swiper('.swiperProjetsRecents', {
    slidesPerView: 1,
    spaceBetween: 40,
    loop: true,
    pagination: {
        el: ".swiper-pagination-projet-recents",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next-projet-recents",
        prevEl: ".swiper-button-prev-projet-recents",
    },
    breakpoints: {
        768: {
            slidesPerView: 2,
        },
        1700: {
            slidesPerView: 3,
        },
    }    // mousewheel: {
    // },
});


const swiperCollaboration = new Swiper('.swiperCollaboration', {
    slidesPerView: 1,
    spaceBetween: 40,
    loop: true,
    pagination: {
        el: ".swiper-pagination-collaboration",
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
        },
    }
});
