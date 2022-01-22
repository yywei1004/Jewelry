// Initialize Swiper
// 1920px 4欄位 <=992px 3欄位 <=768px 2欄位 <=576px 1欄位
const productSwiper = new Swiper("#product-swiper", {
  centeredSlides: true,
  grabCursor: true,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  // Default parameters
  slidesPerView: 1,
  spaceBetween: 10,
  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 577px
    577: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    // when window width is >= 769px
    769: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    // when window width is >= 993px
    993: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
  },

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
