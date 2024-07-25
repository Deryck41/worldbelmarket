import config from "./cart-configs.js";
import Cart from "./cart.js";

document.querySelectorAll(config["cart-selector"]).forEach((item) => {
  window.cart = new Cart(
    item,
    config
  );
  cart.CreateCart();
  cart.UpdateCart();
});
