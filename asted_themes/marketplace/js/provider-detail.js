import { AddBebounceValidate, Send } from "./input.js";

const editUser = document.querySelector(".user-detail-edit");

const editUserInputs = {
  name: {
    element: editUser.querySelector('input[name="company"]'),
    filter: "company",
    warning: "Имя не должно содержать спец. символов и быть больше 30 символов",
  },
  INT: {
    element: editUser.querySelector('input[name="INT"]'),
    filter: "none",
    req: false
  },
  email: {
    element: editUser.querySelector('input[name="email"]'),
    filter: "email",
    warning:
      "Email должен быть типа example@example.com и иметь не больше 30 символов",
  },
  phone: {
    element: editUser.querySelector('input[name="phone"]'),
    filter: "phone",
    warning:
      "Телефон должен быть типа +xxxxxxxxxxxx и иметь не больше 30 символов",
      req: false
  },
  requisites: {
    element: editUser.querySelector('input[name="requisites"]'),
    filter: "none",
      req: false
  },
};

editUser
  .querySelector(".save-user-data-btn")
  .addEventListener("click", () => {
    Send(editUserInputs, "provider", "/edituserinfo.php");
  });

AddBebounceValidate(editUserInputs);
