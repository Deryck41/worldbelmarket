import Storager from './storager.js'
import Validator from './validator.js'


export default class CartPage{
	#config;
	#data;

	constructor(config){
		this.#config = config;
		this.#data = {}
	}

	#GenerateList(configPage, parent, name){
		let paymentMethods = document.createElement('div');
		paymentMethods.classList.add('payment-methods');

		if (configPage['title']['has']){
			let paymentMethodsTitle = document.createElement('h3');
			paymentMethodsTitle.classList.add('title');
			this.#SetContent(paymentMethodsTitle, configPage['title'], 'text', 'content');

			paymentMethods.appendChild(paymentMethodsTitle);

		}

		let paymentMethodsContainer = document.createElement('div');
		paymentMethodsContainer.classList.add('payment-methods__container');

		Object.keys(configPage['methods']).forEach((methodID) => {
			let method = document.createElement('div');
			method.classList.add('payment-method');

			let input = document.createElement('input');
			input.setAttribute('type', 'radio');
			input.setAttribute('name', name);
			input.classList.add('payment-method__input');
			input.id = methodID;

			input.addEventListener('input', function(){
				document.querySelector('.warning-box__' + name).classList.remove('warning-box_active');
			});

			let description = document.createElement('label');
			description.classList.add('payment-method__label');
			description.setAttribute('for', input.id);

			let labelContainer = document.createElement('div');
			labelContainer.classList.add('label-container');


			if (configPage['transition']){
				method.classList.add('payment-method_smooth');
			}


			let descImg = document.createElement('img');
			descImg.classList.add('payment-method__label-image');
			descImg.setAttribute('src', configPage['methods'][methodID]['icon']);

			let descSpan = document.createElement('span');
			this.#SetContent(descSpan, configPage['methods'][methodID], 'text', 'content');

			description.append(descImg, descSpan);
			labelContainer.appendChild(description);

			if (configPage['methods'][methodID].ext !== undefined){
				let formContainer = document.createElement('div');
				formContainer.classList.add('label-fields');
				Object.keys(configPage['methods'][methodID]['ext']).forEach((formName) =>{
					let formInput = document.createElement('input');
					formInput.style.border = configPage['border'] !== undefined ? configPage['border'] : '';
					formInput.classList.add('input');
					formInput.setAttribute('name', formName);
					formInput.setAttribute('placeholder', configPage['methods'][methodID]['ext'][formName]);

					formInput.addEventListener('input', function(){
						document.querySelector('.warning-box__' + name).classList.remove('warning-box_active');
					})
					formContainer.appendChild(formInput);
				});
				labelContainer.appendChild(formContainer);
			}

			method.append(input, labelContainer);


			paymentMethodsContainer.appendChild(method);
		});
		let warningBox = document.createElement('div');
		this.#SetContent(warningBox, configPage, 'warning-text', 'warning-content');
		warningBox.classList.add('warning-box', 'warning-box__' + name);
		warningBox.style.color = this.#config['cart-page']['validation']['color'];
		warningBox.style.border = this.#config['cart-page']['validation']['border'];
		warningBox.style.fontSize = this.#config['cart-page']['validation']['font-size'];

		paymentMethods.append(paymentMethodsContainer, warningBox);

		if (configPage['horizontal-line']){
			parent.appendChild(document.createElement('hr'));
		}

		parent.appendChild(paymentMethods);
	}

	#SetContent(element, config, textArg, HTMLArg){ 
		if (config[HTMLArg] !== undefined){
			element.innerHTML = config[HTMLArg];
		}
		else if (config[textArg] !== undefined){
			element.innerText = config[textArg];
		}
	}

	#UpdateTotalCost(totalCost, value){
		totalCost.innerText = value.toFixed(2);

		if (this.#config['currency']['on']){
			totalCost.innerText += ' ' + this.#config['currency']['text'];
		}
	}

	GeneratePage(){
		const configPage = this.#config['cart-page'];
		const container = document.querySelector(this.#config['cart-page']['container']);
		container.classList.add('cart-page');

		if (configPage['payment']['has']){
			let paymentColumn = document.createElement('div');
			paymentColumn.classList.add('payment');
			container.style.flexDirection = configPage['payment']['column'] == "first" ? "row" : "row-reverse";

			if (configPage['payment']['title']['has']){
				let paymentTitle = document.createElement('h1');
				paymentTitle.classList.add('payment__title');
				this.#SetContent(paymentTitle, configPage['payment']['title'], 'text', 'content');

				paymentColumn.appendChild(paymentTitle);
			}

			if (configPage['payment']['payment-methods']['has']){
				this.#GenerateList(configPage['payment']['payment-methods'], paymentColumn, 'payment');
			}
			if (configPage['payment']['delivery-methods']['has']){
				this.#GenerateList(configPage['payment']['delivery-methods'], paymentColumn, 'delivery');
			}

			if (configPage['payment']['user-data']['has']){
				let userDataBlock = document.createElement('div');
				userDataBlock.classList.add('user-data');

				if (configPage['payment']['user-data']['transition']){
					userDataBlock.classList.add('user-data_smooth');
				}

				if (configPage['payment']['user-data']['title']['has']){
					let userDataTitle = document.createElement('h3');
					userDataTitle.classList.add('title');
					this.#SetContent(userDataTitle, configPage['payment']['user-data']['title'], 'text', 'content');
					userDataBlock.appendChild(userDataTitle);
				}
				let form = document.createElement('div');
				form.classList.add('user-data__form');

				Object.keys(configPage['payment']['user-data']['fields']).forEach((inputName) => {
					let userDataInput = document.createElement('input');
					userDataInput.classList.add('input');
					userDataInput.setAttribute('name', inputName);
					userDataInput.setAttribute('placeholder', configPage['payment']['user-data']['fields'][inputName]);
					userDataInput.style.border = configPage['payment']['user-data']['border'] !== undefined ? configPage['payment']['user-data']['border'] : '';
					userDataInput.addEventListener('input', function(){
						document.querySelector('.warning-box__data').classList.remove('warning-box_active');
					});
					form.appendChild(userDataInput);
				});

				let warningBox = document.createElement('div');
				this.#SetContent(warningBox, configPage['payment']['user-data'], 'warning-text', 'warning-content');
				warningBox.classList.add('warning-box', 'warning-box__data');
				warningBox.style.color = this.#config['cart-page']['validation']['color'];
				warningBox.style.border = this.#config['cart-page']['validation']['border'];
				warningBox.style.fontSize = this.#config['cart-page']['validation']['font-size'];

				form.appendChild(warningBox);

				if (configPage['payment']['user-data']['offert']['has']){
					let offertCheckbox = document.createElement('div');
					offertCheckbox.classList.add('user-data__offert');

					let checkbox = document.createElement('input');
					checkbox.classList.add('user-data__offert-checkbox');
					checkbox.setAttribute('type', 'checkbox');
					checkbox.addEventListener('input', function(){
						document.querySelector('.war ning-box__offert').classList.remove('warning-box_active');
					});

					let checkboxText = document.createElement('span');
					checkboxText.classList.add('user-data__offert-text');
					this.#SetContent(checkboxText, configPage['payment']['user-data']['offert'], 'text', 'content');

					offertCheckbox.append(checkbox, checkboxText);
					

					let warningBox = document.createElement('div');
					this.#SetContent(warningBox, configPage['payment']['user-data']['offert'], 'warning-text', 'warning-content');
					warningBox.classList.add('warning-box', 'warning-box__offert');
					warningBox.style.color = this.#config['cart-page']['validation']['color'];
					warningBox.style.border = this.#config['cart-page']['validation']['border'];
					warningBox.style.fontSize = this.#config['cart-page']['validation']['font-size'];
					form.append(offertCheckbox, warningBox);
				}

				userDataBlock.appendChild(form);
				paymentColumn.appendChild(userDataBlock);
			}
			
			container.appendChild(paymentColumn);
		}

		let products = document.createElement('div');
		products.classList.add('product-body');
		let totalBlock = document.createElement('div');
		let total = document.createElement('span');

		Storager.InitStorage();

		if (Storager.ReadCart()){

			if (configPage['upper-row']['has']){
				let upperRow = document.createElement('div');
				upperRow.classList.add('upper-row');
				let spanProduct = document.createElement('span');
				spanProduct.classList.add('upper-row__product-span');
				spanProduct.innerText = 'Товар';

				upperRow.appendChild(spanProduct)

				if (this.#config['multiple-items']){
					let spanCount = document.createElement('span');
					spanCount.classList.add('upper-row__count-span');
					spanCount.innerText = 'Кол-во';

					let spanCostPerOne = document.createElement('span');
					spanCostPerOne.classList.add('upper-row__cost-span');
					spanCostPerOne.innerText = 'Стоимость';

					upperRow.append(spanCount, spanCostPerOne);
				}

				let spanTotalCost = document.createElement('span');
				spanTotalCost.classList.add('upper-row__total-span');
				spanTotalCost.innerText = 'Всего';

				upperRow.appendChild(spanTotalCost);
				products.appendChild(upperRow);

			}
			Object.keys(Storager.cart).forEach((key) => {
				let productItem = document.createElement('div');
				productItem.classList.add('product-item');
				productItem.setAttribute('data-item-id', key);

				let productImg = document.createElement('img');
				productImg.classList.add('product-item__image');
				productImg.setAttribute('src', Storager.cart[key]['image-src']);

				let productTitle = document.createElement('span');
				productTitle.classList.add('product-item__title');
				productTitle.innerText = Storager.cart[key]['title'];

				
				productItem.append(productImg, productTitle);

				let totalCost = document.createElement('span');

				if (this.#config['multiple-items']){
					let inputCounter = document.createElement('div');
					inputCounter.classList.add('input-counter');

					let buttonPlus = document.createElement('button');
					buttonPlus.classList.add('input-counter__button', 'input-counter__button-plus');
					buttonPlus.innerText = '+';
					let buttonMinus = document.createElement('button');
					buttonMinus.classList.add('input-counter__button', 'input-counter__button-minus');
					buttonMinus.innerText = '-';
					let inputField = document.createElement('input');
					inputField.classList.add('input-counter__field');

					inputField.addEventListener('input', () =>{
						if (this.#config['float-count']){
							inputField.value = inputField.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');
						}
						else{
							inputField.value = inputField.value.replace(/[^0-9]/g, '').replace(/^0[^.]/, '0');
						}
						if (inputField.value != ''){
							totalCost.innerText = (Storager.cart[key]['price'] * parseFloat(inputField.value)).toFixed(2);	
						}
						else{
							totalCost.innerText = Storager.cart[key]['price'];
						}
						if (this.#config['currency']['on']){
							totalCost.innerText += ' ' + this.#config['currency']['text'];
						}


					});

					inputField.addEventListener('change', () => {
					    Storager.ReadCart();
						Storager.SetCount(productItem.getAttribute('data-item-id'), parseFloat(inputField.value));
						Storager.WriteCart();
						window.cart.UpdateCart();
						this.#UpdateTotalPrice(products, total);
					});

					buttonPlus.addEventListener('click', () => {
						if (inputField.value != ''){
							inputField.value = parseFloat(inputField.value) + 1;
							Storager.ReadCart();
							Storager.SetCount(productItem.getAttribute('data-item-id'), parseFloat(inputField.value));
							Storager.WriteCart();
							window.cart.UpdateCart();
							this.#UpdateTotalPrice(products, total);
						}
						if (parseFloat(inputField.value) > 1){
							buttonMinus.classList.remove('input-counter__button_disabled');
						}
						this.#UpdateTotalCost(totalCost, Storager.cart[key]['count'] * Storager.cart[key]['price']);
					});

					buttonMinus.addEventListener('click', () => {
						if (inputField.value != '' && parseFloat(inputField.value) > 1){
							inputField.value = parseFloat(inputField.value) - 1;
							Storager.ReadCart();
							Storager.SetCount(productItem.getAttribute('data-item-id'), parseFloat(inputField.value));
							Storager.WriteCart();
							window.cart.UpdateCart();
							this.#UpdateTotalPrice(products, total);
						}
						if (parseFloat(inputField.value) === 1){
							buttonMinus.classList.add('input-counter__button_disabled');
						}
						this.#UpdateTotalCost(totalCost, Storager.cart[key]['count'] * Storager.cart[key]['price']);
					});


					if (this.#config['shop']['add-multiple-items']){
						inputField.value = Storager.cart[key]['count'];
					}
					else{
						inputField.value = '1';
					}

					inputCounter.append(buttonMinus, inputField, buttonPlus);

					let costPerOne = document.createElement('span');
					costPerOne.classList.add('product-item__cost');
					costPerOne.innerText = Storager.cart[key]['price'];

					if (this.#config['currency']['on']){
						costPerOne.innerText += ' ' + this.#config['currency']['text'];
					}
					productItem.append(inputCounter, costPerOne);

					if (parseFloat(Storager.cart[key]['count']) <= 1){
						buttonMinus.classList.add('input-counter__button_disabled');
					}
				}


				
				totalCost.classList.add('product-item__total');
				this.#UpdateTotalCost(totalCost, Storager.cart[key]['count'] * Storager.cart[key]['price']);

				let buttonDelete = document.createElement('button');
				buttonDelete.classList.add('product-item__delete-button', 'button');
				buttonDelete.innerText = '×';

				buttonDelete.addEventListener('click', function(){
					productItem.classList.add('product-item_fade');

					setTimeout(function(){
						products.removeChild(productItem);
						console.log(Storager.ReadCart());
						Storager.DeleteElement(productItem.getAttribute('data-item-id'));
						Storager.WriteCart();
						window.cart.UpdateCart();
						this.#UpdateTotalPrice(products, total);
						this.#UpdatePageEmpty(products, totalBlock);
					}.bind(this), 1500);
				}.bind(this));

				productItem.append(totalCost, buttonDelete);
				products.appendChild(productItem);
			});
				if (configPage['total-block']['has']){
				totalBlock.classList.add('total-block');

				if (configPage['total-block']['title']['has']){
					let totalTitle = document.createElement('span');
					totalTitle.classList.add('total-block__title', 'title');

					this.#SetContent(totalTitle, configPage['total-block']['title'], 'text', 'content');

					totalBlock.appendChild(totalTitle);
				}

				let bottomTotalRow = document.createElement('div');
				bottomTotalRow.classList.add('total-block__bottom-row');

				let spanTotal = document.createElement('span');
				spanTotal.classList.add('total-block__span-total');
				this.#SetContent(spanTotal, configPage['total-block'], 'text', 'content');

				
				total.innerText = '0';
				total.classList.add('total-block__total');

				
				this.#UpdateTotalPrice(products, total);

				let buttonSubmit = document.createElement('button');
				this.#SetContent(buttonSubmit, configPage['total-block'],'button-text', 'button-content');
				buttonSubmit.classList.add('total-block__submit', 'button');

				
				buttonSubmit.addEventListener('click', () => {this.#Submit()});

				bottomTotalRow.append(spanTotal, total);
				


				totalBlock.append(bottomTotalRow, buttonSubmit);
				products.appendChild(totalBlock);
			}
		}
		this.#UpdatePageEmpty(products, totalBlock);
		
		
		container.appendChild(products);
		
	}

	#UpdateTotalPrice(products, total){
		var totalPrice = 0;
		Storager.InitStorage();
		Storager.ReadCart();
		window.items = products.getElementsByClassName('product-item');

		for (let i = 0; i < items.length; i++){

			totalPrice += parseFloat((JSON.parse(localStorage.cart)[items[i].getAttribute('data-item-id')]['count']) * parseFloat(JSON.parse(localStorage.cart)[items[i].getAttribute('data-item-id')]['price']));
		}

		total.innerText = totalPrice.toFixed(2).toString();
		total.innerText +=  this.#config['currency']['on'] ? ' ' + this.#config['currency']['text'] : '';
	}

	#UpdatePageEmpty(products, totalBlock){
		if (Storager.IsCartEmpty()){
			try{
			products.removeChild(totalBlock);
			products.removeChild(document.querySelector('.upper-row'));
			}
			catch(e){

			}
			let messageCartEmpty = document.createElement('span');
			messageCartEmpty.classList.add('title');
			this.#SetContent(messageCartEmpty, this.#config['cart-page'], 'empty-cart-text', 'empty-cart-content');
			messageCartEmpty.style.textAlign = 'center';
			messageCartEmpty.style.width = '100%';
			products.appendChild(messageCartEmpty);
		}
	}

	#Submit(){
		this.#GetSelectedInputs();

		if (this.#CheckFiedsAreCorrectAndNotEmpty() && this.#CheckValid()){
			this.#data['products'] = {};
			Storager.InitStorage();
			if (Storager.ReadCart()){
				Object.keys(Storager.cart).forEach((itemID) => {
					this.#data['products'][itemID] = Storager.cart[itemID]['count'];
				});

				this.#FetchRequest(this.#config['cart-page']['page']).then((data) => {console.log(data)});

			}
		}
	}

	async #FetchRequest(page){
		fetch(page, {
			method: "POST",
			headers: {
				'Content-Type': 'application/json;charset=utf-8'
			},
			body: JSON.stringify(this.#data)
		}).then((response) => response.json())
		.then((ans) => {
		  if (ans.message) {
			alert(ans.message);
		  }
		  if (ans.redirect) {
			document.location.href = ans.redirect;
		  }
		}).catch((error)=>alert('Что-то пошло не так, попробуйте позже'))
	}

	#CheckValid(string, type){
		let result = true;
		switch (type){
			case "email":
				result = Validator.IsValidEmail(string);
				break;
			case "phone":
				result = Validator.IsValidPhone(string);
				break;
			default:
				break;
		}
		return result;
	}

	#CheckPayment(config, type){
		if (config['has']){
			this.#data[type] = {};
			this.#data[type]['method'] = null;

			Object.keys(config['methods']).forEach((inputId) =>{
				if (document.getElementById(inputId).checked){
					this.#data[type]['method'] = config['methods'][inputId].text;
					console.log(config);
					console.log("type: ",type);

					if (config['methods'][inputId].hasOwnProperty('ext')){
						Object.keys(config['methods'][inputId]['ext']).forEach((name) => {
							if (document.getElementById(inputId).parentNode.querySelector('[name="'+ name +'"]').value.trim() != ''){
								this.#data[type][name] = document.getElementById(inputId).parentNode.querySelector('[name="'+ name +'"]').value;
								if (name in this.#config['cart-page']['validation']['data']){
									if(!this.#CheckValid(this.#data[type][name], this.#config['cart-page']['validation']['data'][name])){
										this.#data[type][name] = null;
										document.getElementById(inputId).parentNode.querySelector('[name="'+ name +'"]').value = '';
									}
								}
							}
							else{
								this.#data[type][name] = null;
							}
						});
					}
				}

			});
		}
	}

	#GetSelectedInputs(){
		this.#data = {};


		this.#CheckPayment(this.#config['cart-page']['payment']['payment-methods'], 'payment-method');
		this.#CheckPayment(this.#config['cart-page']['payment']['delivery-methods'], 'delivery-method');

		if (this.#config['cart-page']['payment']['user-data']['has']){
			this.#data['user-data'] = {};
			this.#data['user-data']['fields'] = {};

			Object.keys(this.#config['cart-page']['payment']['user-data']['fields']).forEach((field) => {
				if (document.querySelector('.user-data__form').querySelector('[name="'+ field +'"]').value.trim() != ''){
					this.#data['user-data']['fields'][field] = document.querySelector('.user-data__form').querySelector('[name="'+ field +'"]').value;
					if(!this.#CheckValid(this.#data['user-data']['fields'][field], this.#config['cart-page']['validation']['data'][field])){
						this.#data['user-data']['fields'][field] = null;
						document.querySelector('.user-data__form').querySelector('[name="'+ field +'"]').value = '';
					}

				}
				else{
					this.#data['user-data']['fields'][field] = null;
				}
			});

			if (this.#config['cart-page']['payment']['user-data']['offert']['has']){
				this.#data['user-data']['offert'] = document.querySelector('.user-data__offert-checkbox').checked;
			}
		}
	}

	#CheckFieldsIterable(config, dataConfig, warningBox){
		let result = true;
		if (config['has']){
			Object.keys(dataConfig).forEach((key) => {
				if (dataConfig[key] == null){
					document.querySelector(warningBox).classList.add('warning-box_active');
					result = false;
					return false;
				}
			});
		}

		return result;
	}

	#CheckFiedsAreCorrectAndNotEmpty(){
        console.log(this.#data);
		console.log(this.#config);
		if 
			(
			!(this.#CheckFieldsIterable(this.#config['cart-page']['payment']['payment-methods'], this.#data['payment-method'], '.warning-box__payment') &&
			this.#CheckFieldsIterable(this.#config['cart-page']['payment']['delivery-methods'], this.#data['delivery-method'], '.warning-box__delivery')/* &&
			this.#CheckFieldsIterable(this.#config['cart-page']['payment']['user-data'], this.#data['user-data']['fields'], '.warning-box__data')*/)
			){
				return false
			}

		if (this.#config['cart-page']['payment']['user-data']['offert']['has']){
			if (!document.querySelector('.user-data__offert-checkbox').checked){
				document.querySelector('.warning-box__offert').classList.add('warning-box_active');
				return false;
			}
		}

		return true;
		
	}
}