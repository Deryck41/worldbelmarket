const products = document.querySelectorAll(".product-item");

const BindButtons = (selector, type, product) => {
  const button = product.querySelector(selector);
  if (button) {
    button.addEventListener("click", () => {
      Send({ type: type, id: product.dataset.id });
    });
  }
};

products.forEach((product) => {
  BindButtons(".accept-button", "accept", product);
  BindButtons(".reject-button", "reject", product);
  BindButtons(".delete-button", "delete", product);
  BindButtons(".restore-button", "accept", product);
  BindButtons(".clear-button", "clear", product);

  const buttonExtra = product.querySelector(".button-extra");
  buttonExtra.addEventListener("click", () => {
    Send({
      type: "edit_extra",
      id: product.dataset.id,
      value: buttonExtra.previousElementSibling.previousElementSibling.value,
    });
  });
});

const Send = (data) => {
  fetch("/asted/components/site.moderation/moderation_core.php", {
    method: "POST",
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((ans) => {
      if (ans.message) {
        alert(ans.message);
      }
      if (ans.redirect) {
        document.location.href = ans.redirect;
      }
    });
};

const filter = document.querySelector(".moderation-select");
filter.addEventListener("change", () => {
  fetch(
    "/asted/components/site.moderation/moderation_filter.php?" +
      new URLSearchParams({ filter: filter.value })
  )
    .then((response) => response.text())
    .then((data) => {
      document.querySelector(".products").innerHTML = data;
    });
});
