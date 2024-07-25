document.querySelectorAll(".password-input").forEach((item) => {
  item.querySelector(".switch-password").addEventListener("click", () => {
    item
      .querySelector("input")
      .setAttribute(
        "type",
        item.querySelector("input").getAttribute("type") === "password"
          ? "text"
          : "password"
      );
  });
});
