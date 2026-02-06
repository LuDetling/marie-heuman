const swiper = new Swiper('.swiperAvis', {
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

for (let i = 0; i < 3; i++) {
    console.log(document.querySelectorAll('.swiperProjectAvantApres-' + i + ' .swiper-slide').length);
    if (document.querySelectorAll('.swiperProjectAvantApres-' + i + ' .swiper-slide').length > 1) {
        document.querySelector('.swiperProjectAvantApres  .swiper-navigation').classList.remove('hidden');
        new Swiper('.swiperProjectAvantApres-' + i, {
            slidesPerView: 1,
            spaceBetween: 40,
            loop: true,
            pagination: {
                el: ".swiper-pagination-avant-apres",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next-avant-apres",
                prevEl: ".swiper-button-prev-avant-apres",
            },
            mousewheel: {
            },

        });
    }
}
// for (let i = 0; i < 3; i++) {
//     console.log(document.querySelectorAll('.swiperProjectAvantApres-' + i + ' .swiper-slide').length);
//     if (document.querySelectorAll('.swiperProjectAvantApres-' + i + ' .swiper-slide').length > 1) {

//         new Swiper('.swiperProjectAvantApres-' + i, {
//             slidesPerView: 1,
//             spaceBetween: 40,
//             loop: true,
//             pagination: {
//                 el: ".swiper-pagination-avant-apres-" + i,
//                 clickable: true,
//             },
//             navigation: {
//                 nextEl: ".swiper-button-next-avant-apres-" + i,
//                 prevEl: ".swiper-button-prev-avant-apres-" + i,
//             },
//             mousewheel: {
//             },

//         });
//     }
// }

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
            spaceBetween: 80,
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
