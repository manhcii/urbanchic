//Product details Js
const productDetailImage = new Swiper('.detail-info-images .swiper', {
  direction: 'horizontal',
  centeredSlides: true,
  loop: true,
  slidesPerGroup: 1,
  slidesPerView: 3,
  lazyPreloaderClass: 'swiper-lazy-preloader',
  spaceBetween: 0,
  speed: 1500,
  navigation: {
      nextEl: '.detail-info-images .swiper-button-next',
      prevEl: '.detail-info-images .swiper-button-prev',
    },
});

//Click like Review Product Details
const buttonLike = document.querySelectorAll('.button-like')
if(buttonLike) {
  Array.from(buttonLike).forEach((button) => {
    button.addEventListener('click', () => {
      button.classList.toggle('active')
    })
  })
}

//Swiper Recomment Product Detail
const recommentProductDetail = new Swiper('.recomment-product .swiper', {
  direction: 'horizontal',
  slidesPerView: 4,
  spaceBetween: 24,
  speed: 1000,
  grid: {
    rows: 1,
  },
  breakpoints: {
      200: {
        slidesPerView: 1,
        spaceBetween: 16,
        grid: {
          rows: 2,
          fill: 'row'
        },
      },
      392: {
        slidesPerView: 2,
        spaceBetween: 16,
        grid: {
          rows: 2,
          fill: 'row'
        },
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 24,
      },
    },
  navigation: {
    nextEl: '.recomment-product .swiper-button-next',
    prevEl: '.recomment-product .swiper-button-prev',
  }
}) || false;