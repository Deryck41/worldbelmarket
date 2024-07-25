import { AddBebounceValidate, Send } from "./input.js";
const signUpUser = document.querySelector(".user-sign-up");
const signUpProvider = document.querySelector(".provider-sign-up");
const signInUser = document.querySelector(".user-sign-in");
const signInProvider = document.querySelector('.provider-sign-in');

const forgotPassword = document.querySelector('.forgot-password-block');

// req - required

const forgotPasswordInputs = {
    email: {
        element: forgotPassword.querySelector('input[name="email"]'),
        filter: "email",
        warning:"Email должен быть типа example@example.com и иметь не больше 30 символов" 
    }
};

const signUpUserInputs = {
    name: {
      element: signUpUser.querySelector('input[name="firstName"]'),
      filter: "name",
      warning:"Имя не должно содержать спец. символов и быть больше 30 символов"
    },
    surName: {
      element: signUpUser.querySelector('input[name="surName"]'),
      filter: "name",
      warning:"Фамилия не должна содержать спец. символов и быть больше 30 символов"
    },
    email: {
      element: signUpUser.querySelector('input[name="email"]'),
      filter: "email",
      warning:"Email должен быть типа example@example.com и иметь не больше 30 символов"
    },
    password: {
      element: signUpUser.querySelector('input[name="password"]'),
      filter: "password",
      warning:"Пароль должен состоять из минимум 8 символов и максимум из 30 символов"
    },
  };

  const signInUserInputs = {
    email: {
      element: signInUser.querySelector('input[name="email"]'),
      filter: "email",
      warning:"Email должен быть типа example@example.com и иметь не больше 30 символов"
    },
    password: {
      element: signInUser.querySelector('input[name="password"]'),
      filter: "password",
      warning:"Пароль должен состоять из минимум 8 символов и максимум из 30 символов"
    },
};

const signInProviderInputs = {
    email: {
      element: signInProvider.querySelector('input[name="email"]'),
      filter: "email",
      warning:"Email должен быть типа example@example.com и иметь не больше 30 символов"
    },
    password: {
      element: signInProvider.querySelector('input[name="password"]'),
      filter: "password",
      warning:"Пароль должен состоять из минимум 8 символов и максимум из 30 символов"
    },
};

const signUpProviderInputs = {
  company: {
    element: signUpProvider.querySelector('input[name="company"]'),
    filter: "company",
    warning:"Название не должно содержать спец. символов и быть больше 30 символов"
  },
  INT: {
    element: signUpProvider.querySelector('input[name="INT"]'),
    req: false,
  },
  email: {
    element: signUpProvider.querySelector('input[name="email"]'),
    filter: "email",
    warning:"Email должен быть типа example@example.com и иметь не больше 30 символов"
  },
  password: {
    element: signUpProvider.querySelector('input[name="password"]'),
    filter: "password",
    warning:"Пароль должен состоять из минимум 8 символов и максимум из 30 символов"
  },
};


signUpUser.querySelector(".modal-button").addEventListener("click", () => {
    Send(signUpUserInputs, "user", "/signup.php");
  });

signInUser.querySelector(".modal-button").addEventListener("click", () => {
    Send(signInUserInputs, "user", "/signin.php");
  });
  signUpProvider.querySelector(".modal-button").addEventListener("click", () => {
    Send(signUpProviderInputs, "provider", "/signup.php");
  });

  signInProvider.querySelector(".modal-button").addEventListener("click", () => {
    Send(signInProviderInputs, "provider", "/signin.php");
  });

  forgotPassword.querySelector('.modal-button').addEventListener('click', () =>{
    Send(forgotPasswordInputs, "none", "/forgot.php");
  })

  

document
  .querySelectorAll(".toggle-password-visibility")
  .forEach((visibilityToggler) => {
    visibilityToggler.addEventListener("change", () => {
      visibilityToggler.parentNode.parentNode
        .querySelector('input[name="password"]')
        .setAttribute("type", visibilityToggler.checked ? "text" : "password");
    });
  });

  AddBebounceValidate(signUpUserInputs);
  AddBebounceValidate(signInUserInputs);
  AddBebounceValidate(signUpProviderInputs);
  AddBebounceValidate(signInProviderInputs);
  AddBebounceValidate(forgotPasswordInputs);


  document.querySelector('.close_modal').addEventListener('click', () => {
    document.querySelector('.modal-wrapper').classList.toggle('open-modal');
    document.body.style = "overflow-y: scroll";
  });