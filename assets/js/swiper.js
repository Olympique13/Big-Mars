import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const carouselEl = document.querySelectorAll( '.carousel' );
if ( carouselEl.length > 0 ) {
    const carousel = new Swiper( '.carousel', {
        modules: [ Navigation ],
        slidesPerView: 'auto',
        grabCursor: true,
        loop: false,
        centeredSlides: true,
        initialSlide: 0,
        spaceBetween: 24,
        autoplay: {
            delay: 7000,
        },
        navigation: {
            nextEl: '.carousel-next',
            prevEl: '.carousel-prev',
        },
    } );
}