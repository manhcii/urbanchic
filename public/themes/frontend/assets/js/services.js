const servicesExperience = new Swiper('.experience-services-image .swiper', {
  loop: true,
  speed: 1000,
  slidesPerGroup: 1,
  slidesPerView: 1,
  spaceBetween: 10,
  pagination: {
    el: '.experience-services-image .swiper-pagination',
    clickable: true,
  },
});