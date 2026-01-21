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
    slidesPerView: 1,
    spaceBetween: 40,
    loop: true,
    pagination: {
        el: ".swiper-pagination-projet",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    mousewheel: {
    },
    breakpoints: {
        768: {
            slidesPerView: 'auto',
            spaceBetween: 80,
        },
    }
});

for (let i = 0; i < 3; i++) {
    new Swiper('.swiperProjectAvantApres-' + i, {
        slidesPerView: 1,
        spaceBetween: 40,
        loop: true,
        pagination: {
            el: ".swiper-pagination-" + i,
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next-" + i,
            prevEl: ".swiper-button-prev-" + i,
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
}

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
