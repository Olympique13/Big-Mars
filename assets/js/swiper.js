import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const carouselEl = document.querySelectorAll('.carousel');
if (carouselEl.length > 0) {
    const carousel = new Swiper('.carousel', {
        modules : [Navigation],
        slidesPerView: 'auto',
        grabCursor: true,
        loop: true,
        centeredSlides: true,
        initialSlide: 1,
        spaceBetween: 24,
        autoplay: {
            delay: 7000,
        },
        navigation: {
            nextEl: '.carousel-next',
            prevEl: '.carousel-prev',
        },
    });
}