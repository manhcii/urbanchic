// Range slider
const filterRangeSlider = document.querySelector(
  "#fhm-list-product-products .products-filter-item .products-filter-item-range-slider"
);

const filterRangeSliderInputMin = document.querySelector(
  "#fhm-list-product-products .products-filter-item .products-filter-item-range-slider-input .min"
);
const filterRangeSliderInputMax = document.querySelector(
  "#fhm-list-product-products .products-filter-item .products-filter-item-range-slider-input .max"
);




//filter
const filterItems = document.querySelectorAll(
  "#fhm-list-product-products .products-filter-item"
);

const checkboxItems = document.querySelectorAll(
  "#fhm-list-product-products .products-filter-item-criteria li"
);

filterItems.forEach((filterItem) => {
  // Clear Filter
  if (filterItem.querySelector(".clear-button")) {
    filterItem.querySelector(".clear-button").addEventListener("click", () => {
      filterItem
        .querySelectorAll(".products-filter-item-criteria li .checkbox")
        .forEach((checkbox) => {
          checkbox.setAttribute("data-status", "uncheck");
        });
    });
  }
});

checkboxItems.forEach((checkboxItem) => {
  // Select box
  checkboxItem.addEventListener("click", () => {
    if (
      checkboxItem.querySelector(".checkbox").getAttribute("data-status") ==
      "uncheck"
    ) {
      checkboxItem
        .querySelector(".checkbox")
        .setAttribute("data-status", "check");
    } else {
      checkboxItem
        .querySelector(".checkbox")
        .setAttribute("data-status", "uncheck");
    }
  });
});

// Render color
const colorCheckboxs = document.querySelectorAll(
  "#fhm-list-product-products .products-filter-item .products-filter-item-criteria li .checkbox-color"
);

colorCheckboxs.forEach((colorCheckbox) => {
  colorCheckbox.style.backgroundColor = `#${colorCheckbox.getAttribute(
    "data-color"
  )}`;
});



