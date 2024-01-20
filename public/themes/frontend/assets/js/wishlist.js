// Handle Select
const handleSelect = (action) => {
  const wishlistCheckmarks = document.querySelectorAll(
    '.wishlist .checkbox input[type="checkbox"]'
  );
  wishlistCheckmarks.forEach((item) => {
    if (action == "select") {
      item.setAttribute("checked", "true");
    } else {
      item.removeAttribute("checked");
    }
  });
};

// Slider
const wishlistRelateSlider = new Swiper(
  ".relate-products .relate-products-slider .swiper",
  {
    direction: "horizontal",
    slidesPerView: 1,
    spaceBetween: 15,
    speed: 1000,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    breakpoints: {
      480: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      767: {
        slidesPerView: 3,
        spaceBetween: 32,
      },
      991: {
        slidesPerView: 4,
        spaceBetween: 32,
      },
    },
  }
);
