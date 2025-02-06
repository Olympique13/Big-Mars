import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const carouselEl = document.querySelectorAll( '.slider-event' );
if ( carouselEl.length > 0 ) {
    const carousel = new Swiper( '.slider-event', {
        modules: [ Navigation ],
        slidesPerView: 1.2,
        // grabCursor: true,
        loop: true,
        // centeredSlides: true,
        // initialSlide: 0,
        spaceBetween: 24,
        speed: 600,
        autoplay: {
            delay: 7000,
        },
        navigation: {
            nextEl: '.carousel-next',
            prevEl: '.carousel-prev',
        },
        breakpoints : {
            768 : {
                slidesPerView: 2,
            },
            1024 : {
                slidesPerView: 3,
            }
        },
        pagination : {
            el : '.swiper-pagination'
        }
    } );
}