
<style>
.form_label input,
.field_multiselect {
  position: relative;
  width: 100%;
  display: block;
  min-height: 46px;
  border: 1px solid #cdd6f3;
  box-sizing: border-box;
  border-radius: 8px;
  padding: 12px 40px 10px 16px;
  font-size: 14px;
  color: #a8acc9;

  outline-color: #cdd6f3;

  &::placeholder {
    color: #a8acc9;
  }
  &:hover {
    box-shadow: 0 0 2px rgba(0, 0, 0, 0.16);
  }
  &:focus {
    box-shadow: 0 0 2px rgba(0, 0, 0, 0.16);
  }
}

.field_multiselect_help {
  position: absolute;
  max-width: 100%;
  background-color: #fff;
  top: -48px;
  left: 0;
  opacity: 0;
}

.form_label input.error {
  border-color: $red;
}
.error_text {
  color: $red;
}

.field_multiselect {
  padding-right: 60px;
  &:after {
    content: "";
    position: absolute;
    right: 14px;
    top: 15px;
    width: 6px;
    height: 16px;
    background: url("data:image/svg+xml,%3Csvg width='6' height='16' viewBox='0 0 6 16' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M3 0L6 5H0L3 0Z' fill='%23A8ACC9'/%3E%3Cpath d='M3 16L6 11H0L3 16Z' fill='%23A8ACC9'/%3E%3C/svg%3E")
      50% 50% no-repeat;
  }
}

.multiselect_block {
  position: relative;
  width: 100%;
}
.field_select {
  position: absolute;
  top: calc(100% - 2px);
  left: 0;
  width: 100%;

  border: 2px solid #cdd6f3;
  border-bottom-right-radius: 2px;
  border-bottom-left-radius: 2px;
  box-sizing: border-box;
  outline-color: #cdd6f3;
  z-index: 6;
}

.field_select[multiple] {
  overflow-y: auto;
}

.field_select option {
  display: block;
  padding: 8px 16px;
  width: calc(370px - 32px);
  cursor: pointer;
  &:checked {
    background-color: #eceff3;
  }
  &:hover {
    background-color: #d5e8fb;
  }
}

.field_multiselect button {
  position: relative;
  padding: 7px 34px 7px 8px;
  background: #ebe4fb;
  border-radius: 4px;
  margin-right: 9px;
  margin-bottom: 10px;

  &:hover,
  &:focus {
    background-color: #dbd1ee;
  }
  &:after {
    content: "";
    position: absolute;
    top: 7px;
    right: 10px;
    width: 16px;
    height: 16px;
    background: url("data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M19.4958 6.49499C19.7691 6.22162 19.7691 5.7784 19.4958 5.50504C19.2224 5.23167 18.7792 5.23167 18.5058 5.50504L12.5008 11.5101L6.49576 5.50504C6.22239 5.23167 5.77917 5.23167 5.50581 5.50504C5.23244 5.7784 5.23244 6.22162 5.50581 6.49499L11.5108 12.5L5.50581 18.505C5.23244 18.7784 5.23244 19.2216 5.50581 19.495C5.77917 19.7684 6.22239 19.7684 6.49576 19.495L12.5008 13.49L18.5058 19.495C18.7792 19.7684 19.2224 19.7684 19.4958 19.495C19.7691 19.2216 19.7691 18.7784 19.4958 18.505L13.4907 12.5L19.4958 6.49499Z' fill='%234F5588'/%3E%3C/svg%3E")
      50% 50% no-repeat;
    background-size: contain;
  }
}
.multiselect_block {
  position: relative;
  width: 100%;
}
.field_select {
  position: absolute;
  top: calc(100% - 2px);
  left: 0;
  width: 100%;

  border: 2px solid #cdd6f3;
  border-bottom-right-radius: 2px;
  border-bottom-left-radius: 2px;
  box-sizing: border-box;
  outline-color: #cdd6f3;
  z-index: 6;
}

.field_select[multiple] {
  overflow-y: auto;
}

.field_select option {
  display: block;
  padding: 8px 16px;
  width: calc(370px - 32px);
  cursor: pointer;
  &:checked {
    background-color: #eceff3;
  }
  &:hover {
    background-color: #d5e8fb;
  }
}

.field_multiselect button {
  position: relative;
  padding: 7px 34px 7px 8px;
  background: #ebe4fb;
  border-radius: 4px;
  margin-right: 9px;
  margin-bottom: 10px;

  &:hover,
  &:focus {
    background-color: #dbd1ee;
  }
  &:after {
    content: "";
    position: absolute;
    top: 7px;
    right: 10px;
    width: 16px;
    height: 16px;
    background: url("data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M19.4958 6.49499C19.7691 6.22162 19.7691 5.7784 19.4958 5.50504C19.2224 5.23167 18.7792 5.23167 18.5058 5.50504L12.5008 11.5101L6.49576 5.50504C6.22239 5.23167 5.77917 5.23167 5.50581 5.50504C5.23244 5.7784 5.23244 6.22162 5.50581 6.49499L11.5108 12.5L5.50581 18.505C5.23244 18.7784 5.23244 19.2216 5.50581 19.495C5.77917 19.7684 6.22239 19.7684 6.49576 19.495L12.5008 13.49L18.5058 19.495C18.7792 19.7684 19.2224 19.7684 19.4958 19.495C19.7691 19.2216 19.7691 18.7784 19.4958 18.505L13.4907 12.5L19.4958 6.49499Z' fill='%234F5588'/%3E%3C/svg%3E")
      50% 50% no-repeat;
    background-size: contain;
  }
}

.multiselect_label {
  position: absolute;
  top: 1px;
  left: 2px;
  width: 100%;
  height: 44px;
  cursor: pointer;
  //background-color: #f00;  /// for test
  z-index: 3;
}

.field_select {
  display: none; ////
}

input.multiselect_checkbox {
  position: absolute;
  right: 0;
  top: 0;
  width: 40px;
  height: 40px;
  border: none;
  opacity: 0;
}

.multiselect_checkbox:checked ~ .field_select {
  display: block;
}

.multiselect_checkbox:checked ~ .multiselect_label {
  width: 40px;
  left: initial;
  right: 4px;
  background: #ffffff
    url("data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M19.4958 6.49499C19.7691 6.22162 19.7691 5.7784 19.4958 5.50504C19.2224 5.23167 18.7792 5.23167 18.5058 5.50504L12.5008 11.5101L6.49576 5.50504C6.22239 5.23167 5.77917 5.23167 5.50581 5.50504C5.23244 5.7784 5.23244 6.22162 5.50581 6.49499L11.5108 12.5L5.50581 18.505C5.23244 18.7784 5.23244 19.2216 5.50581 19.495C5.77917 19.7684 6.22239 19.7684 6.49576 19.495L12.5008 13.49L18.5058 19.495C18.7792 19.7684 19.2224 19.7684 19.4958 19.495C19.7691 19.2216 19.7691 18.7784 19.4958 18.505L13.4907 12.5L19.4958 6.49499Z' fill='%234F5588'/%3E%3C/svg%3E")
    50% 50% no-repeat;
}

.multiselect_checkbox:checked ~ .field_multiselect_help {
  opacity: 1;
}
@media (max-width: 400px) {
  .field_multiselect_help {
    display: none; //// We don't need it on mobile
  }
}
</style>
									
						<script>

 let multiselect_block = document.querySelectorAll(".multiselect_block");
    multiselect_block.forEach(parent => {
        let label = parent.querySelector(".field_multiselect");
        let select = parent.querySelector(".field_select");
        let text = label.innerHTML;
        select.addEventListener("change", function(element) {
            let selectedOptions = this.selectedOptions;
            label.innerHTML = "";
            for (let option of selectedOptions) {
                let button = document.createElement("button");
                button.type = "button";
                button.className = "btn_multiselect";
                button.textContent = option.innerText;
                button.onclick = _ => {
                    option.selected = false;
                    button.remove();
                    if (!select.selectedOptions.length) label.innerHTML = text
                };
                label.append(button);
            }
        })
    })
</script>					