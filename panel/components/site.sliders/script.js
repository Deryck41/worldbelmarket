const newSlideButton = document.querySelector(".new-prop-button");
const delSlideButton = document.querySelector(".del-prop-button");
const slidesContainer = document.querySelector(".props-container");
const buttonNext = document.querySelector(".button-next");
let props = 1;

newSlideButton.addEventListener("click", () => {
  const html = `
    <div class="slider-type">
            <span>Данные ${props}</span>
            <div class="props">
                <select class="select-prop-type">
                <option value="text">Текст</option>
                <option value="image">Изображение</option>
                <option value="link">Ссылка</option>
                </select>
                
            </div>
        </div>
    `;
  slidesContainer.insertAdjacentHTML("beforeend", html);
  props += 1;
});

delSlideButton.addEventListener("click", () => {
  if (props > 1) {
    const lastProp = [
      ...slidesContainer.querySelectorAll(".slider-type"),
    ].pop();
    lastProp.remove();
    props--;
  }
});

let slides = 1;

const AddNewSlide = (propTypes, selector) => {
  let html = `
        <div class="slider-slide">
            <span>Слайд ${slides}</span>
            `;

  for (let prop of propTypes) {
    switch (prop) {
      case "text":
        html += `<div class="input-group" data-type="text"><span>Текст: </span><input type="text" class="slide-value"/></div>`;
        break;
      case "image":
        html +=
          '<div class="input-group" data-type="image"><span>Изображение: </span><input type="file" class="slide-value"/></div>';
        break;
      case "link":
        html +=
          '<div class="input-group" data-type="link"><span>Ссылка: </span><input type="text" class="slide-value"/><span>Текст ссылки: </span><input type="text" class="slide-text"/></div>';
        break;
    }
  }

  html += `
        </div>

    `;

  document.querySelector(selector).insertAdjacentHTML("beforeend", html);
  slides += 1;
};

const Done = () => {
  const form = new FormData();

  const data = { slides: [] };

  const slidesElements = document.querySelectorAll(".slider-slide");

  slidesElements.forEach((element) => {
    const slideData = {};
    const props = element.querySelectorAll(".input-group");

    let counter = 1;
    props.forEach((prop) => {
      switch (prop.dataset.type) {
        case "text":
          slideData[`${counter}`] = {
            type: "text",
            value: prop.querySelector(".slide-value").value,
          };
          break;
        case "link":
          slideData[`${counter}`] = {
            type: "link",
            value: prop.querySelector(".slide-value").value,
            text: prop.querySelector(".slide-text").value,
          };
          break;
        case "image":
          const uniqueID = Math.random().toString(16).slice(2);
          form.append(uniqueID, prop.querySelector(".slide-value").files[0]);
          slideData[`${counter}`] = {
            type: "image",
            value: uniqueID,
          };
          break;
      }
      counter += 1;
    });
    data.slides.push(slideData);
  });
  form.append("data", JSON.stringify(data));
  form.append("name", document.querySelector(".new-slider-name").value);
  console.log(form);
  fetch("/panel/components/site.sliders/new.php", {
    method: "POST",
    body: form,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "ok") {
        history.go();
      }
    });
};

buttonNext.addEventListener("click", () => {
  const propsValues = document.querySelectorAll(".select-prop-type");
  const propTypes = [];

  propsValues.forEach((prop) => {
    propTypes.push(prop.value);
  });

  document.querySelector(".slider-props").innerHTML = "";

  let html = `
    <div class="slider-slides">
    </div>
    <button class="new-slide-button"><i class="fa-solid fa-plus"></i></button>
    <button class="del-slide-button"><i class="fa-solid fa-minus"></i></button>
    <button class="button-done">Готово</button>
    `;

  document.querySelector(".new-slider").insertAdjacentHTML("beforeend", html);
  AddNewSlide(propTypes, ".slider-slides");

  document.querySelector(".new-slide-button").addEventListener("click", () => {
    AddNewSlide(propTypes, ".slider-slides");
  });

  document.querySelector(".del-slide-button").addEventListener("click", () => {
    [
      ...document
        .querySelector(".slider-slides")
        .querySelectorAll(".slider-slide"),
    ]
      .pop()
      .remove();
    slides--;
  });

  buttonNext.parentNode.removeChild(buttonNext);
  document.querySelector(".button-done").addEventListener("click", Done);
});

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".swiper").forEach((swiper) => {
    let next = swiper.querySelector(".swiper-button-next");
    let prev = swiper.querySelector(".swiper-button-prev");
    console.log(swiper.classList[1]);
    new Swiper(`.${swiper.classList[1]}`, {
      loop: true,
      navigation: {
        nextEl: next,
        prevEl: prev,
      },
    });
  });
});

document.querySelectorAll(".del-slider-button").forEach((delButton) => {
  delButton.addEventListener("click", () => {
    if (confirm('Вы уверены, что хотите удалить этот слайдер?')){
    fetch("/panel/components/site.sliders/del.php", {
      method: "POST",
      body: JSON.stringify({ id: delButton.dataset.slider }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status === "ok") {
          history.go();
        }
      });
    }
  });
});

document.querySelectorAll(".edit-slide-prop-value").forEach((button) => {
  button.addEventListener("click", () => {
    const pointer = JSON.parse(button.parentNode.dataset.pointer);
    const valueContainer = button.parentNode.querySelector(".value");
    switch (pointer.type) {
      case "text":
        ChangeText(valueContainer, pointer, button);
        break;
      case "link":
        ChangeLink(valueContainer, pointer, button);
        break;
      case "image":
        ChangeImage(valueContainer, pointer, button);
        break;
    }
  });
});

const ChangeText = (valueContainer, pointer, button) => {
  const propContainer = valueContainer.parentNode;

  const value = valueContainer.textContent;
  valueContainer.setAttribute("contenteditable", "");
  valueContainer.focus();
  ChangeForEdit(propContainer, button);

  propContainer
    .querySelector(".deny-edit-button")
    .addEventListener("click", () => {
      propContainer.querySelector(".apply-edit-button").remove();
      propContainer.querySelector(".deny-edit-button").remove();
      button.style.display = "block";
      valueContainer.removeAttribute("contenteditable");
      valueContainer.textContent = value;
    });

  propContainer
    .querySelector(".apply-edit-button")
    .addEventListener("click", () => {
      const result = valueContainer.textContent;
      fetch("/panel/components/site.sliders/edit.php", {
        method: "POST",
        body: JSON.stringify({ pointer: pointer, data: result }),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.status === "ok") {
            history.go();
          }
        });
    });
};

const ChangeLink = (valueContainer, pointer, button) => {
  const propContainer = valueContainer.parentNode;
  const value = valueContainer.textContent;
  const textContainer = button.parentNode.querySelector(".text");
  const text = textContainer.textContent;

  valueContainer.setAttribute("contenteditable", "");
  textContainer.setAttribute("contenteditable", "");
  valueContainer.focus();

  ChangeForEdit(propContainer, button);

  propContainer
    .querySelector(".deny-edit-button")
    .addEventListener("click", () => {
      propContainer.querySelector(".apply-edit-button").remove();
      propContainer.querySelector(".deny-edit-button").remove();
      button.style.display = "block";
      valueContainer.removeAttribute("contenteditable");
      textContainer.removeAttribute("contenteditable");
      valueContainer.textContent = value;
      textContainer.textContent = text;
    });
  console.log(text);
  propContainer
    .querySelector(".apply-edit-button")
    .addEventListener("click", () => {
      const result = valueContainer.textContent;
      const resultText = textContainer.textContent;
      fetch("/panel/components/site.sliders/edit.php", {
        method: "POST",
        body: JSON.stringify({
          pointer: pointer,
          data: { value: result, text: resultText },
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.status === "ok") {
            history.go();
          }
        });
    });
};

const ChangeImage = (valueContainer, pointer, button) => {
  const propContainer = valueContainer.parentNode;

  const value = valueContainer.textContent;
  valueContainer.querySelector("img").style.display = "none";
  propContainer.insertAdjacentHTML(
    "beforeend",
    `<input type="file" class="input-image-slide">`
  );
  ChangeForEdit(propContainer, button);

  propContainer
    .querySelector(".deny-edit-button")
    .addEventListener("click", () => {
      propContainer.querySelector(".apply-edit-button").remove();
      propContainer.querySelector(".deny-edit-button").remove();
      propContainer.querySelector("input").remove();
      valueContainer.querySelector("img").style.display = "block";
      button.style.display = "block";
    });

  propContainer
    .querySelector(".apply-edit-button")
    .addEventListener("click", () => {
      const form = new FormData();
      form.append("pointer", JSON.stringify(pointer));
      form.append("image", propContainer.querySelector("input").files[0]);

      fetch("/panel/components/site.sliders/edit.php", {
        method: "POST",
        body: form,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.status === "ok") {
            history.go();
          }
        });
    });
};

const ChangeForEdit = (propContainer, button) => {
  button.style.display = "none";
  const buttons = `<button class="apply-edit-button"><i class="fa-solid fa-check"></i></button>
  <button class="deny-edit-button"><i class="fa-solid fa-xmark"></i></button>`;
  propContainer.insertAdjacentHTML("beforeend", buttons);
};

document.querySelectorAll(".new-slider-slide-button").forEach((buttonAdd) => {
  buttonAdd.addEventListener("click", () => {
    const propTypes = [];
    const slider = buttonAdd.parentNode.parentNode.parentNode;
    const props = slider
      .querySelector(".swiper-slide")
      .querySelectorAll(".slide_value");

    for (let prop of props) {
      propTypes.push(JSON.parse(prop.dataset.pointer)["type"]);
    }

    console.log(propTypes);
    slides = [...slider.querySelectorAll(".swiper-slide")].length + 1;
    slider
      .querySelector(".swiper-wrapper")
      .insertAdjacentHTML(
        "beforeend",
        '<div class="swiper-slide new-slider-slide"></div>'
      );
    AddNewSlide(propTypes, ".new-slider-slide");
    slider
      .querySelector(".new-slider-slide")
      .insertAdjacentHTML(
        "beforeend",
        '<button class="add-new-slide-ready-button">Готово</button>'
      );
    const swiper = new Swiper(slider.querySelector(".swiper"));
    swiper.slideTo(swiper.slides.length);

    slider
      .querySelector(".add-new-slide-ready-button")
      .addEventListener("click", () => {
        const form = new FormData();
        const slideData = {};
        const props = slider.querySelectorAll(".input-group");
        let counter = 1;

        props.forEach((prop) => {
          switch (prop.dataset.type) {
            case "text":
              slideData[`${counter}`] = {
                type: "text",
                value: prop.querySelector(".slide-value").value,
              };
              break;
            case "link":
              slideData[`${counter}`] = {
                type: "link",
                value: prop.querySelector(".slide-value").value,
                text: prop.querySelector(".slide-text").value,
              };
              break;
            case "image":
              const uniqueID = Math.random().toString(16).slice(2);
              form.append(
                uniqueID,
                prop.querySelector(".slide-value").files[0]
              );
              slideData[`${counter}`] = {
                type: "image",
                value: uniqueID,
              };
              break;
          }
          counter += 1;
        });

        form.append("data", JSON.stringify(slideData));
        form.append("id", slider.dataset.id);

        console.log(form);

        fetch("/panel/components/site.sliders/new_slide.php", {
          method: "POST",
          body: form,
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.status === "ok") {
              history.go();
            }
          });
      });
  });
});

document.querySelectorAll(".del-slider-slide-button").forEach((buttonDel) => {
  buttonDel.addEventListener("click", () => {
    if (confirm("Вы уверены, что хотите удалить слайд?")) {
      fetch("/panel/components/site.sliders/del_slide.php", {
        method: "POST",
        body: JSON.stringify({
          id: buttonDel.parentNode.parentNode.parentNode.parentNode.parentNode
            .parentNode.dataset.id,
          index: buttonDel.dataset.slide,
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.status === "ok") {
            history.go();
          }
        });
    }
  });
});

document.querySelectorAll(".slider-timer-input").forEach((input) => {
  input.addEventListener("change", () => {
    fetch("/panel/components/site.sliders/edit_timer.php", {
      method: "POST",
      body: JSON.stringify({ id: input.dataset.id, value: input.value }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status === "ok") {
          history.go();
        }
      });
  });
});
