import { AddBebounceValidate, Send } from "./input.js";

const editUser = document.querySelector(".user-detail-edit");

const editUserInputs = {
  name: {
    element: editUser.querySelector('input[name="firstName"]'),
    filter: "name",
    warning: "Имя не должно содержать спец. символов и быть больше 30 символов",
  },
  surName: {
    element: editUser.querySelector('input[name="surName"]'),
    filter: "name",
    warning:
      "Фамилия не должна содержать спец. символов и быть больше 30 символов",
  },
  lastName: {
    element: editUser.querySelector('input[name="lastName"]'),
    filter: "name",
    warning:
      "Отчество не должно содержать спец. символов и быть больше 30 символов",
    req: false,
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
    req: false,
  },
  legal: {
    element: editUser.querySelector("#legal"),
    checkbox: true,
  },
  uRequisites: {
    element: editUser.querySelector(".uRequisites"),
    filter: "none",
    vis: true,
    req: false
  },
  uINT: {
    element: editUser.querySelector(".uINT"),
    filter: "none",
    vis: true,
    req: false
  },
  
};

editUser.querySelector(".save-user-data-btn").addEventListener("click", () => {
  Send(editUserInputs, "user", "/edituserinfo.php");
});

AddBebounceValidate(editUserInputs);

document.addEventListener('DOMContentLoaded', ()=>{
  const legal = document.querySelector("#legal");
  legal.checked = legal.dataset.value === "1" ? true : false;
});

