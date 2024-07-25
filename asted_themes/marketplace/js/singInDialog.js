const signUpUser = document.querySelector(".user-sign-up");

const Validate = async(url, dataType, val) => {
   return fetch(url, {
    method: "POST",
    body: JSON.stringify({ type: dataType, value: val }),
    headers: { "Content-Type": "text/json" },
  }).then((response) => response.json()).then((data) => data.status === true);
};

const ValidateInput  = (input, type) => {
    Validate('/validate.php', type, input.value).then((valid) => {
        if (valid){
            input.parentNode.querySelector('.warning_block').style.display = 'none';
            
            input.classList.remove('wrong-input');
        }
        else{
            input.classList.add('wrong-input');
            input.parentNode.querySelector('.warning_block').style.display = 'block';
        }
    })
}

const debounce = (func, timeoutMs) => {
  return (...args) => {
    let previousCall = this.lastCall;

    this.lastCall = Date.now();

    if (previousCall && this.lastCall - previousCall <= timeoutMs) {
      clearTimeout(this.lastCallTimer);
    }

    this.lastCallTimer = setTimeout(() => func(...args), timeoutMs);
  }
}


const signUpUserInputs = {
  name: signUpUser.querySelector('input[name="firstName"]'),
  surName: signUpUser.querySelector('input[name="surName"]'),
  email: signUpUser.querySelector('input[name="email"]'),
  password: signUpUser.querySelector('input[name="password"]'),
};


const emailDebounce = debounce(ValidateInput, 300);

signUpUserInputs.email.addEventListener('input', (event) => {
    emailDebounce(event.target, 'email');
});

signUpUser.querySelector(".modal-button").addEventListener("click", () => {
  if (
    !signUpUserInputs.name.value ||
    !signUpUserInputs.surName.value ||
    !signUpUserInputs.email.value ||
    !signUpUserInputs.password.value
  ) {
    alert("Введите все поля!");
    return;
  }
  if (signUpUserInputs.email.classList.contains('wrong-input')){
      alert("Введите правильный email!");
      return;
  }
  fetch()
});

Object.values(signUpUserInputs).forEach((item) => {
    const warningBlock = document.createElement('span');
    warningBlock.style.color = 'red';
    warningBlock.style.display = 'none';
    warningBlock.classList.add('warning_block');
    warningBlock.innerText = item.dataset.warning;
    item.parentNode.appendChild(warningBlock);

});
