import Storager from './storager.js';

export default class Shop{
	#config;
	constructor(config){
		Storager.InitStorage();
		this.#config = config;
	}

	BindAction(){
		document.querySelectorAll('[' + this.#config['shop']['item-attribute'] + ']').forEach((item) => {
			item.querySelector(this.#config['shop']['add-to-cart-selector']).addEventListener(this.#config['shop']['action-type'], (event) => this.#AddItemToCart(item));
		});
	}

	#AddItemToCart(item){
		if (!Storager.ReadCart() || Storager.cart[item.getAttribute(this.#config['shop']['item-attribute'])] === undefined){

			Storager.cart[item.getAttribute(this.#config['shop']['item-attribute'])] = {
				"title": item.querySelector(this.#config['shop']['title-item-selector']).innerText,
				"image-src": item.querySelector(this.#config['shop']['image-item-selector']).getAttribute('src'),
				"price": parseFloat(item.querySelector(this.#config['shop']['price-item-selector']).innerText),
				"count": 1
			};
			Storager.WriteCart();
			window.cart.UpdateCart();
		}
		else{
			if (Storager.cart[item.getAttribute(this.#config['shop']['item-attribute'])]['count'] > 0 && this.#config['multiple-items'] && this.#config['shop']['add-multiple-items']){
				Storager.cart[item.getAttribute(this.#config['shop']['item-attribute'])]['count']++;

				Storager.WriteCart();
				window.cart.UpdateCart();
			}
			else if (Storager.cart[item.getAttribute(this.#config['shop']['item-attribute'])]['count'] > 0 && (!this.#config['multiple-items'] || !this.#config['shop']['add-multiple-items'])){
				console.log('cannot write');
			}
		}
	}
}