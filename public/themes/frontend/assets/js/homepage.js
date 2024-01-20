// Show Modal
if (document.querySelector("#fhm-discount")) {
  const discountModal = document.querySelector("#fhm-discount");

  setTimeout(() => {
    discountModal.classList.add("active");
  }, 5000);

  document.addEventListener("click", (e) => {
    if (e.target === discountModal) {
      discountModal.classList.remove("active");
    }
  });
}
