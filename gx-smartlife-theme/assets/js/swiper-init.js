/**
 * Swiper Carousel Initialization for GX Smart Life Theme
 */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // Check if Swiper is available
    if (typeof Swiper === 'undefined') {
        console.warn('Swiper library not loaded');
        return;
    }

    // Initialize hero carousel on front page
    const heroCarousel = document.querySelector('.hero-carousel .swiper');

    if (heroCarousel) {
        const heroSwiper = new Swiper(heroCarousel, {
            // Basic settings
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            speed: 3000,
            effect: 'slide',

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // Pagination dots
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: false,
            },

            // Responsive breakpoints
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                600: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                1024: {
                    slidesPerView: 1,
                    spaceBetween: 0
                }
            },

            // Accessibility
            a11y: {
                prevSlideMessage: '前のスライド',
                nextSlideMessage: '次のスライド',
                firstSlideMessage: '最初のスライド',
                lastSlideMessage: '最後のスライド',
                paginationBulletMessage: 'スライド {{index}} へ移動'
            },

            // Keyboard control
            keyboard: {
                enabled: true,
                onlyInViewport: true,
            },

            // Mousewheel control (optional)
            mousewheel: false,

            // Touch settings
            touchRatio: 1,
            touchAngle: 45,
            grabCursor: true,

            // Performance
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
            preloadImages: false,
            lazy: {
                loadPrevNext: true,
                loadPrevNextAmount: 1
            },

            // Events
            on: {
                init: function() {
                    console.log('Hero carousel initialized');
                },
                slideChange: function() {
                    // Add custom animation class
                    const activeSlide = this.slides[this.activeIndex];
                    if (activeSlide) {
                        activeSlide.classList.add('swiper-slide-active-custom');
                    }
                },
                autoplayStart: function() {
                    console.log('Autoplay started');
                },
                autoplayStop: function() {
                    console.log('Autoplay stopped');
                }
            }
        });

        // Pause autoplay when tab is not visible
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                heroSwiper.autoplay.stop();
            } else {
                heroSwiper.autoplay.start();
            }
        });

        // Add pause/play button functionality (optional)
        const pauseButton = document.querySelector('.swiper-pause-button');
        if (pauseButton) {
            let isPaused = false;
            pauseButton.addEventListener('click', function() {
                if (isPaused) {
                    heroSwiper.autoplay.start();
                    this.innerHTML = '<i class="fas fa-pause"></i>';
                } else {
                    heroSwiper.autoplay.stop();
                    this.innerHTML = '<i class="fas fa-play"></i>';
                }
                isPaused = !isPaused;
            });
        }
    }

    // Initialize gallery carousel if present
    const galleryCarousel = document.querySelector('.gallery-carousel .swiper');

    if (galleryCarousel) {
        const gallerySwiper = new Swiper(galleryCarousel, {
            loop: false,
            slidesPerView: 1,
            spaceBetween: 20,

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                type: 'bullets',
            },

            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30
                }
            },

            keyboard: {
                enabled: true,
            },

            a11y: {
                prevSlideMessage: '前の画像',
                nextSlideMessage: '次の画像',
            }
        });
    }

    // Initialize testimonials carousel if present
    const testimonialsCarousel = document.querySelector('.testimonials-carousel .swiper');

    if (testimonialsCarousel) {
        const testimonialsSwiper = new Swiper(testimonialsCarousel, {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            speed: 1000,
            slidesPerView: 1,
            spaceBetween: 30,

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40
                }
            }
        });
    }

    // Initialize partners carousel if present
    const partnersCarousel = document.querySelector('.partners-carousel .swiper');

    if (partnersCarousel) {
        const partnersSwiper = new Swiper(partnersCarousel, {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            speed: 1000,
            slidesPerView: 2,
            spaceBetween: 20,

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            breakpoints: {
                480: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 30
                },
                1024: {
                    slidesPerView: 6,
                    spaceBetween: 30
                }
            }
        });
    }

});
