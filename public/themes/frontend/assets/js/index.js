const listFoodHomePage = new Swiper('.list-food .swiper', {
    direction: 'horizontal',
    slidesPerView: 3,
    spaceBetween: 24,
    speed: 1000,
    breakpoints: {
        200: {
          slidesPerView: 1,
          spaceBetween: 16,
        },
        480: {
          slidesPerView: 2,
          spaceBetween: 16,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        1200: {
          slidesPerView: 3,
          spaceBetween: 24,
        },
      },
    navigation: {
      nextEl: '.list-food .swiper-button-next',
      prevEl: '.list-food .swiper-button-prev',
    }
}) || false;




const bestsellerTabs = document.querySelectorAll('.best-seller-tabs-content .tab-pane')

if(bestsellerTabs) {
  Array.from(bestsellerTabs).forEach((tab, index) => {
    const ele = '.best-seller-tabs-content .tab-pane:nth-child(' + (index + 1) + ')'
    const bestsellerSwiper = new Swiper(ele + ' .swiper', {
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
        nextEl: ele + ' .swiper-button-next',
        prevEl: ele + ' .swiper-button-prev',
      }
    })
  })
}





//Swiper Testimonials home page
const testimonials = new Swiper('.testimonials-list .swiper', {
  direction: 'horizontal',
  slidesPerView: 3,
  spaceBetween: 43,
  autoplay: {
    disableOnInteraction: true,
    playSpeed: 3000,
  },
  speed: 1000,
  breakpoints: {
      200: {
        slidesPerView: 1,
        spaceBetween: 16,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 36,
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 43,
      },
    }
}) || false;


//Event click watch Video and close video 
const popupHomeVideo = document.querySelector('.popup-video-slide')

if(popupHomeVideo) {

  //Pause video when close popup
  popupHomeVideo.addEventListener('hidden.bs.modal', () => {
    const video = document.querySelector('.popup-video-slide video')
    video.pause()
  })

//Play video when open poup
  popupHomeVideo.addEventListener('show.bs.modal', () => {
    const video = document.querySelector('.popup-video-slide video')
    video.play()
  })
}
