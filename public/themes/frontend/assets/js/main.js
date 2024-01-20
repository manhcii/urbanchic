//*Swiper js*//

//*Main Js*//

const buttonsCollapseMenu = document.querySelectorAll('.close-sub-nav')
Array.from(buttonsCollapseMenu).forEach((button) => {
    button.addEventListener('click', () => {
        button.parentElement.querySelector(".nav-link").classList.toggle('nav-link-bold')
    }
)})


//Xử lý các ô input
const inputs = document.querySelectorAll('form input[type="text"], form input[type="email"]');
  Array.from(inputs).forEach((input) => {
    const placeHolderCurrent = input.getAttribute('placeholder') || "";
    input.addEventListener('focus', function(){
      const clearInput = this.nextElementSibling;

      this.setAttribute('placeholder', '');
      clearInput.classList.remove('d-none')

      //Xử lý sự kiện khi thay đổi input hiển thị nút X
      this.addEventListener('input', function(){
        if ( this.value == '' ) {
          clearInput.querySelector('svg path').style.fill = "#c8c8c8"
        } else {
          clearInput.querySelector('svg path').style.fill = "#000"
        }
      });

      //Xử lý sự kiện khi clear input 
      clearInput.addEventListener('click', ()=> {
        clearInput.previousElementSibling.value = '';
        clearInput.querySelector('svg path').style.fill = "#c8c8c8";
        input.focus()
      });

      //Xử lý sự kiện khi click ra ngoài ô input khác
      window.addEventListener('click', (e) => {
        if ( e.target.closest('.contact-form-line') == input.closest('.contact-form-line')) {
            return false;
          } else {
            clearInput.classList.add('d-none')
          }
      })
    });

    //Hiển thị lại place holder
    input.addEventListener('focusout', function(e) {
    this.setAttribute('placeholder', placeHolderCurrent);
    })
});

const textareaInputs = document.querySelectorAll('form textarea');
Array.from(textareaInputs).forEach((textarea) => {
  const placeHolderCurrent = textarea.getAttribute('placeholder') || "";
  textarea.addEventListener('focus', function(){
    this.setAttribute('placeholder', '');
  })

  //Hiển thị lại place holder
  textarea.addEventListener('focusout', function(e) {
    this.setAttribute('placeholder', placeHolderCurrent);
  })
})


//Check Star Rating
const stars = document.querySelectorAll('.star-rating')
if(stars) {
  Array.from(stars).forEach((star) => {
    const point = Number(star.getAttribute('data-rating'))
    const number = Math.ceil( 5 - point + 0.5)
    const selector = '.star-rating-item:nth-child(' + number + ')'

    const item = star.querySelector(selector)
      item.classList.add('point')

      if (point % 1 !== 0) {
        item.classList.add('point-half')
      }

  })
}



//Event collapse - Show Questions
const itemCollpase = document.querySelectorAll('.item-collapse')
if(itemCollpase) {
  Array.from(itemCollpase).forEach(item => {
    const button = item.querySelector('button')
    const des = item.querySelector('.item-collapse-body')

    //If has class active
    if(item.classList.contains('active')){
      des.style.maxHeight = des.scrollHeight + 48 + 'px'
    }
    
    button.addEventListener('click', () => {
      //Clear active all item
      Array.from(itemCollpase).forEach((itemCheck) => {
        if(itemCheck !== item) {
          itemCheck.classList.remove('active')
          const des = itemCheck.querySelector('.item-collapse-body')
          des.style.maxHeight = null
        }
      })

      item.classList.toggle('active')

      if( des.style.maxHeight){
        des.style.maxHeight = null
      } else {
        des.style.maxHeight = des.scrollHeight + 48 + 'px'
      }
    })
  })
}

//Swiper Popup Login
 
const imagePopupLogin = new Swiper('.login .swiper', {
  direction: 'horizontal',
  slidesPerView: 1,
  spaceBetween: 20,
  speed: 1000,
  navigation: {
    nextEl: '.login .button-custom-next',
    prevEl: '.login .button-custom-prev',
  },
  pagination: {
    el: '.login .swiper-pagination',
  },
}) || false;

//Swiper News all page
const news = new Swiper('.news .swiper', {
  direction: 'horizontal',
  slidesPerView: 3,
  spaceBetween: 24,
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
        spaceBetween: 24,
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 24,
      },
    },
    navigation: {
      nextEl: '.news .swiper-button-next',
      prevEl: '.news .swiper-button-prev',
    }
}) || false;


//Event click watch Video and close video 
const popupVideo = document.querySelector('.popup-watch-video')

if(popupVideo) {
  const iframePopupVideo = popupVideo.querySelector('.popup-video-iframe iframe')
  const buttonPlayVideo = document.querySelectorAll('.button-play-video')

  Array.from(buttonPlayVideo).forEach((button) => {
    button.addEventListener('click', () => {
      const src = 'https://www.youtube.com/embed/' + button.getAttribute('data-video')
      iframePopupVideo.setAttribute('src', src)
      console.log(src)
    })
  })

  popupVideo.addEventListener('hidden.bs.modal', () => {
    iframePopupVideo.setAttribute('src', '')
  })
}