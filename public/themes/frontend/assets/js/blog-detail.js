const blogRelated = new Swiper('.blog-related-list', {
    direction: 'horizontal',
    slidesPerView: 3,
    spaceBetween: 43,
    speed: 1000,
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
      },
      480: {
        slidesPerView: 2,
        spaceBetween: 24,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 24,
        autoplay: false,
      },
      1200: {
        slidesPerView: 3,
        direction: 'vertical',
        spaceBetween: 30,
      }
    },
  });