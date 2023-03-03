import Swiper, {Navigation, Pagination, Thumbs, EffectFade} from 'swiper'
import '../../scss/base/swiper.scss'
import 'swiper/css/effect-fade'
import 'swiper/css';

function initSliders() {
    if (document.querySelector('.printers-content__slider')) {
        const printersContentSlider = new Swiper('.printers-content__slider', {
            modules: [Navigation, EffectFade],
            observer: true,
            observeParents: true,
            slidesPerView: 1,
            spaceBetween: 0,
            autoHeight: true,
            speed: 800,
            effect: 'fade',
            simulateTouch: false,
        })

        const printersSlider = new Swiper('.printers__slider', {
            modules: [Navigation, Thumbs, Pagination],
            observer: true,
            observeParents: true,
            slidesPerView: 1,
            spaceBetween: 0,
            autoHeight: true,
            speed: 800,
            thumbs: {
                swiper: printersContentSlider,
            },

            navigation: {
                prevEl: '.printers__button--prev',
                nextEl: '.printers__button--next',
            },
            pagination: {
                el: '.printers__pagination',
                clickable: true,
            },
            on: {},
        })
    }

    const productSliders = document.querySelectorAll('.product__slider')
    if (productSliders) {
        productSliders.forEach((slider, index) => {
            new Swiper(slider, {
                modules: [Navigation, Thumbs, Pagination],
                observer: true,
                observeParents: true,
                slidesPerView: 1,
                spaceBetween: 0,
                autoHeight: true,
                speed: 800,

                navigation: {
                    prevEl: `.product__button--prev-${index + 1}`,
                    nextEl: `.product__button--next-${index + 1}`,
                },
                pagination: {
                    el: `.product__pagination--${index + 1}`,
                    clickable: true,
                },
                on: {},
            })
        })
    }

    if (document.querySelector('.thumbs__slider')) {
        const thumbsSlider = new Swiper('.thumbs__slider', {
            modules: [Navigation],
            observer: true,
            observeParents: true,
            slidesPerView: 4,
            spaceBetween: 10,
            autoHeight: true,
            speed: 800,
        })

        const printersSlider = new Swiper('.product-content__slider', {
            modules: [Navigation, Thumbs],
            observer: true,
            observeParents: true,
            slidesPerView: 1,
            spaceBetween: 0,
            autoHeight: true,
            speed: 800,
            thumbs: {
                swiper: thumbsSlider,
            },

            navigation: {
                prevEl: '.thumbs__button--prev',
                nextEl: '.thumbs__button--next',
            },
            on: {
                slideChange: function () {
                    let activeIndex = this.activeIndex + 1
                    let activeSlide = document.querySelector(`.thumbs__slider .swiper-slide:nth-child(${activeIndex})`)
                    let nextSlide = document.querySelector(
                        `.thumbs__slider .swiper-slide:nth-child(${activeIndex + 1})`
                    )
                    let prevSlide = document.querySelector(
                        `.thumbs__slider .swiper-slide:nth-child(${activeIndex - 1})`
                    )

                    if (nextSlide && !nextSlide.classList.contains('swiper-slide-visible')) {
                        this.thumbs.swiper.slideNext()
                    } else if (prevSlide && !prevSlide.classList.contains('swiper-slide-visible')) {
                        this.thumbs.swiper.slidePrev()
                    }
                },
            },
        })
    }

    if (document.querySelector('.testimonials__slider')) {
        new Swiper('.testimonials__slider', {
            modules: [Navigation, Pagination],
            observer: true,
            observeParents: true,
            slidesPerView: 3,
            spaceBetween: 70,
            autoHeight: true,
            speed: 800,
            navigation: {
                prevEl: '.testimonials__button--prev',
                nextEl: '.testimonials__button--next',
            },
            pagination: {
                el: '.testimonials__pagination',
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1.1,
                    spaceBetween: 20,
                },
                479: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                },
                767: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                991: {
                    spaceBetween: 40,
                },
                1100: {
                    spaceBetween: 70,
                },
            },
        })
    }
}

window.addEventListener('DOMContentLoaded', function (e) {
    initSliders()
})
