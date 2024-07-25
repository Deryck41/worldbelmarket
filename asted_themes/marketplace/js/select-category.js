const selectCategory = document.querySelector(".search-select");
const catalogBox = document.querySelector(".catalog-box");
const forsection = catalogBox.dataset.id;

selectCategory.addEventListener("change", () => {
  fetch(
    "/category.php?" +
      new URLSearchParams({
        forsection: forsection,
        category: selectCategory.value,
        style: "catalog",
      })
  )
    .then((response) => response.text())
    .then((data) => {
      catalogBox.innerHTML = data;
    });
});

const observer = new MutationObserver((records) => {
  window.shop.BindAction();
  console.log(window.shop);
});

observer.observe(catalogBox, {
  childList: true,
  attributes: true,
});
