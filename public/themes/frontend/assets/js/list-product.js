// Range slider
const filterRangeSlider = document.querySelector(
  ".page-product-list .products-filter-item .products-filter-range"
);

const filterRangeSliderInputMin = document.querySelector(
  ".page-product-list .products-filter-item .products-filter-range-input .min"
);
const filterRangeSliderInputMax = document.querySelector(
  ".page-product-list .products-filter-item .products-filter-range-input .max"
);

rangeSlider(filterRangeSlider, {
  // min value
  min: 0,
  // max value
  max: 100,
  // step size
  step: 1,
  // set input value
  value: [0, 100],
  onInput: function (valueSet) {
    filterRangeSliderInputMin.value = valueSet[0];
    filterRangeSliderInputMax.value = valueSet[1];
  },
});

// Change range slider input value
const changeValue = () => {
  rangeSlider(filterRangeSlider).value([
    filterRangeSliderInputMin.value,
    filterRangeSliderInputMax.value,
  ]);
};

// Set default value input
filterRangeSliderInputMin.value = 0;
filterRangeSliderInputMax.value = 100;

// Render color
const colorCheckboxs = document.querySelectorAll(
  ".page-product-list .products-filter-item .products-filter-criteria li .checkbox-color"
);

colorCheckboxs.forEach((colorCheckbox) => {
  colorCheckbox.style.backgroundColor = `#${colorCheckbox.getAttribute(
    "data-color"
  )}`;
});


//Filter item & clear check input filter
const filterItems = document.querySelectorAll(
  ".page-product-list .products-filter-item"
);

const checkboxItems = document.querySelectorAll(
  ".page-product-list .products-filter-criteria li"
);

filterItems.forEach((filterItem) => {
  // Clear Filter
  if (filterItem.querySelector(".clear-button")) {
    filterItem.querySelector(".clear-button").addEventListener("click", () => {
      filterItem
        .querySelectorAll(".products-filter-criteria li .checkbox")
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


//Event collapse - Show filter item
const buttonCollpaseFilter = document.querySelectorAll('.products-filter-item .toggle-collapse')
if(buttonCollpaseFilter) {
  Array.from(buttonCollpaseFilter).forEach(button => {
    const item = button.closest('.products-filter-item')
    const des = item.querySelector('.products-filter-item-body')

    if (item.classList.contains('active')) {
      des.style.maxHeight = des.scrollHeight + 'px'
    }
    
    button.addEventListener('click', () => {
      if (item.classList.contains('active')) {
        item.classList.remove('active')
        des.style.maxHeight = null
      } else {
        item.classList.add('active')
        des.style.maxHeight = des.scrollHeight + 'px'
      }
    })
  })
}

// Event swap mode Product list
const modeBtn = Array.prototype.slice.call(
  document.querySelectorAll('input[name="mode"]')
);

const productsList = document.querySelector(".products-list");

if(modeBtn){
  modeBtn.forEach((radio) => {
    radio.addEventListener("click", (e) => {
      if (e.target.value == "mode-row") {
        productsList.classList.add("products-row");
  
      } else {
        productsList.classList.remove("products-row");
      }
    });
  });
}


// Toggle mobile filter
const openFilterButton = document.querySelector(
  ".page-product-list .products-filter-button"
);

const closeFilterButton = document.querySelector(
  ".page-product-list .products-filter-close"
);

const backdropCollapse = document.querySelector('.back-drop-collapse')
const productsSidebar = document.querySelector('.page-product-list .products-sidebar')
if(backdropCollapse){
  backdropCollapse.addEventListener('wheel', (e) => {
    // Ngăn chặn sự kiện scroll khi chuột đang ở trên phần tử này
    e.preventDefault();
});
}

if(openFilterButton){
  openFilterButton.addEventListener("click", () => {
    productsSidebar.classList.add("active");
    backdropCollapse.classList.remove("active");
  });
}

if(closeFilterButton){
  closeFilterButton.addEventListener("click", () => {
    productsSidebar.classList.remove("active");
    backdropCollapse.classList.add("active");
  });
}


// Show more content
const showMoreProductSummary = document.querySelector('.products-summary .view-more');
if (showMoreProductSummary) {
  showMoreProductSummary.addEventListener('click', () => {
    const content = document.querySelector('.products-summary-content')
    const height = content.scrollHeight

    if(content.style.maxHeight == '') {
      showMoreProductSummary.querySelector('span').textContent = 'Collapse'
      content.style.maxHeight = height + 'px'
      content.classList.add('collapse-content')
    } else {
      showMoreProductSummary.querySelector('span').textContent = 'Show More'
      content.style.maxHeight = null
      content.classList.remove('collapse-content')
    }
  });
}

