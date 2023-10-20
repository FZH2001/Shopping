import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
import { Autoplay, Navigation, Pagination } from "swiper";
import Swiper from "swiper";
Swiper.use([Autoplay, Navigation, Pagination]);
// import Swiper, { Pagination } from 'swiper';
// import Swiper styles
import '../../public/css/swiper-bundle.css';

// configure Swiper to use modules
// Swiper.use([Pagination]);


// var swiper = new Swiper('.swiper-container', {
//     direction: 'vertical',
//     loop: true,
//     autoplay: true,
//     grabCursor: true,
//     // If we need pagination
//     pagination: {
//         el: '.swiper-pagination',
//         clickable: true,
//     },
// });
import 'swiper/swiper-bundle.min.js';