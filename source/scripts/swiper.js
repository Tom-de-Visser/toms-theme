import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";
import "swiper/swiper-bundle.css";

const swiper = new Swiper(".swiper-reviews", {
	modules: [Navigation, Pagination],
	slidesPerView: 2,
	spaceBetween: 20,
	loop: true,
	autoplay: {
		delay: 5000,
	},
	pagination: {
		el: ".review-pagination",
	},
	navigation: {
		nextEl: ".swiper-button-next-review",
		prevEl: ".swiper-button-prev-review",
	},
});
