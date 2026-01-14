const swiper = new Swiper('.swiperAvis', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

const swiperHomeBlog = new Swiper('.swiperHomeBlog', {
    slidesPerView: 2,
    spaceBetween: 110,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

const universSwiper = new Swiper('.universSwiper', {
    slidesPerView: 1,
    spaceBetween: 100,
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
    spaceBetween: 100,
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
    slidesPerView: 'auto',
    spaceBetween: 30,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    mousewheel: {
    },
});

for (let i = 0; i < 3; i++) {
    new Swiper('.swiperProjectAvantApres-' + i, {
        slidesPerView: 'auto',
        spaceBetween: 30,
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
    });
}
