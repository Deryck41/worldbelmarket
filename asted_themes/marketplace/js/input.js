Object.filter = (obj, predicate) =>
  Object.fromEntries(Object.entries(obj).
                     filter(([key, value]) =>
                     predicate(value)));


export const Validate = async (url, dataType, val, req) => {
  return fetch(url, {
    method: "POST",
    body: JSON.stringify({ type: dataType, value: val, isRequired: req }),
    headers: { "Content-Type": "text/json" },
  })
    .then((response) => response.json())
    .then((data) => data.status === true);
};

export const ValidateInput = (input, type, req, warn) => {
  Validate("/validate.php", type, input.value, req).then((valid) => {
    const parentWarnBlock = warn ? warn : input.parentNode;

    if (valid) {
      parentWarnBlock.querySelector(".warning_block").style.display = "none";

      input.classList.remove("wrong-input");
    } else {
      input.classList.add("wrong-input");
      parentWarnBlock.querySelector(".warning_block").style.display = "block";
    }
  });
};

export const RedirectWithPostData = (url, data) => {
  const form = document.createElement("form");
  form.setAttribute("action", url);
  form.setAttribute("method", "post");
  form.style.display = "none";
  Object.entries(data).forEach((input) => {
    const inputData = document.createElement("input");
    inputData.setAttribute("name", input[0]);
    inputData.setAttribute("value", input[1]);
    form.appendChild(inputData);
  });

  document.body.appendChild(form);
  form.submit();
};

const debounce = (callback, delay) => {
  let timer = null;
  return (...args) => {
    if (timer) {
      clearTimeout(timer);
    }
    timer = setTimeout(() => {
      callback(...args);
    }, delay);
  };
};

export const AddBebounceValidate = (block) => {
  Object.values(block).forEach((item) => {
    const warningBlock = document.createElement("span");
    warningBlock.style.color = "red";
    warningBlock.style.display = "none";
    warningBlock.classList.add("warning_block");
    warningBlock.innerText = item.warning;
    console.log(item);
    if (!item.warnElement) {
      item.element.parentNode.appendChild(warningBlock);
    } else {
      item.warnElement.appendChild(warningBlock);
    }
  });

  Object.values(block).forEach((item) => {
    item.element.addEventListener("input", () => {
      if (item.filter) {
        inputDebounce(item.element, item.filter, item.req, item.warnElement);
      }
    });
  });
};
export const SendRequest = (url, data) => {
  fetch(url, {
    method: "POST",
    body: JSON.stringify(data),
    headers: { "Content-Type": "text/json" },
  })
    .then((response) => response.json())
    .then((ans) => {
      if (ans.message) {
        alert(ans.message);
      }
      if (ans.redirect) {
        RedirectWithPostData(ans.redirect, {
          email: data["email"],
          password: data["password"],
          type: "user",
        });
      }
    });
};

export const SendForm = (url, data) => {
  fetch(url, {
    method: "POST",
    body: data,
  })
    .then((response) => response.json())
    .then((ans) => {
      if (ans.message) {
        alert(ans.message);
      }
      if (ans.redirect) {
        RedirectWithPostData(ans.redirect, {
          email: data["email"],
          password: data["password"],
          type: "user",
        });
      }
    });
};

export const Send = (inputs, type, page, formData) => {
  inputs = Object.filter(inputs, input => input.element !== null || input.vis !== true);

  if (
    !Object.values(inputs).every((item) =>
      item.req === false ? true : item.element.value
    )
  ) {
    alert("Введите все поля!");
    return;
  }
  

  if (
    Object.values(inputs).some((item) =>
      item.element.classList.contains("wrong-input")
    )
  ) {
    alert("Не все поля корректны!");
    return;
  }
  if (!formData) {
    const data = { type: type };
    Object.entries(inputs).forEach((item) => {
      if (item[1].checkbox) {
        data[item[0]] = item[1].element.checked;
      } else {
        data[item[0]] = item[1].element.value;
      }
    });
    SendRequest(page, data);
  } else {
    const data = new FormData();
    const anotherValues = { type: type };
    Object.entries(inputs).forEach((item) => {
      if (item[1].file) {
        for (let i = 0; i < item[1].element.files.length; i++){
            data.append(`photo-${i}`, item[1].element.files[i]);
        }
        
      } else {
        if (item[1].checkbox) {
          anotherValues[item[0]] = item[1].element.checked;
        } else {
          anotherValues[item[0]] = item[1].element.value;
        }
      }
    });
    data.append("another", JSON.stringify(anotherValues));
    SendForm(page, data);
  }
};

export const inputDebounce = debounce(ValidateInput, 700);
