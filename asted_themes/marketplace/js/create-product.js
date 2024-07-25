import { AddBebounceValidate, Send } from "./input.js";

const MDCSlider = mdc.slider.MDCSlider;


const slider = new MDCSlider(document.querySelector('.mdc-slider'));
const weightInput = document.querySelector(".weight-value");
new Promise(() => {
    const thumbUpCallback = () => {
        weightInput.value = slider.getValue() / 10;
    };
  
    slider.listen('MDCSlider:input', thumbUpCallback);
  });

  weightInput.addEventListener('input', () => {
    if (!isNaN(weightInput.value)){
        slider.setValue(Number(weightInput.value)); 
    }
    
  });


const fileInput = document.querySelector('.upload-image-input');
const emptyString = "Загрузите изображение";
const previewMain = document.querySelector('.preview-image');
const previews = document.querySelectorAll('.additional-imgs img');

const acceptedImages = ["image/png", "image/jpg", "image/jpeg"];



fileInput.addEventListener('change', (event) => {
    const files = fileInput.files;
    let allValid = true;

    // Проверка основного изображения
    if (!acceptedImages.includes(files[0].type)) {
        allValid = false;
        previewMain.style.display = "none";
    } else {
        previewMain.style.display = "block";
        previewMain.src = URL.createObjectURL(files[0]);
    }

    // Проверка дополнительных изображений
    previews.forEach((preview, index) => {
        if (files[index + 1] && acceptedImages.includes(files[index + 1].type)) {
            preview.style.display = "block";
            preview.src = URL.createObjectURL(files[index + 1]);
        } else {
            if (files[index + 1]) {
                allValid = false;
            }
            preview.style.display = "none";
            preview.src = ""; // Очистка предыдущего изображения, если новое не загружено
        }
    });

    // Обнуление значения input и скрытие изображений при недопустимом формате
    if (!allValid) {
        fileInput.value = null;
        previewMain.style.display = "none";
        previews.forEach(preview => {
            preview.style.display = "none";
            preview.src = "";
        });
    }

    // Обновление текста кнопки загрузки
    document.querySelector('.upload-image-button').innerText = 
        fileInput.value ? fileInput.value.split(/(\\|\/)/g).pop() : emptyString;
});



const productForm = document.querySelector(".new-product-form");

const productFormInputs = {
  title: {
    element: productForm.querySelector('input.product-title'),
    filter: "product-name",
    warning: "Название не должно содержать спец. символов и быть больше 30 символов",
    warnElement: productForm.querySelector('.title-warnParent')
  },
  price: {
    element: productForm.querySelector('input.product-price'),
    filter: "price",
    warning:
      "Цена должна быть целым или дробным числом с точностью до сотых",
    warnElement: productForm.querySelector('.price-warnParent')
  },
  description: {
    element: productForm.querySelector('textarea.description-product'),
    filter: "product-description",
    warning:
      "Описание товара не должно быть меньше 3 и больше 5000 символов",
  },
  photo: {
    element: productForm.querySelector('input.upload-image-input'),
    file: true,
    req: false
  },
  store: {
    element: productForm.querySelector('.select-category-new-product')
  },
  weight: {
    element: weightInput
  }
};

productForm
  .querySelector(".new-product-button")
  .addEventListener("click", () => {
    Send(productFormInputs, "none", "/test.php", true);
  });


AddBebounceValidate(productFormInputs);
