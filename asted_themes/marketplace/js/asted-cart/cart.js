import Storager from './storager.js';



export default class Cart{
	#DOMCart;
	#config;
	#cartInfo;
	constructor(DOMCart, config){
		this.#DOMCart = DOMCart;
		this.#config = config;
		this.#cartInfo = null;
	}

	CreateCart(){
		const cartLink = document.createElement('a');
		cartLink.setAttribute('href', this.#config['cart-page-href']);
		cartLink.classList.add('asted-cart__link');
		
		const imageCart = document.createElement('img');
		imageCart.setAttribute('src', this.#config['cart-src']);
		imageCart.classList.add('asted-cart__image');

		this.#cartInfo = document.createElement('span');
		this.#cartInfo.innerText = "0";
		this.#cartInfo.classList.add('asted-cart__cart-info', 'asted-cart__cart-info_' + this.#config['cart-info']['type']);
		this.#cartInfo.style.width = this.#cartInfo.style.height = this.#config['cart-info']['size'];
		this.#cartInfo.style.fontSize = this.#config['cart-info']['font-size'];
		this.#cartInfo.style.fontFamily = this.#config['cart-info']['font-family'];

		cartLink.append(imageCart, this.#cartInfo);
		this.#DOMCart.appendChild(cartLink);
	}

	UpdateCart(){
		Storager.InitStorage();

		if (Storager.ReadCart()){
			if (this.#config['shop']['add-multiple-items']){
				let countOfItems = 0;
				Object.keys(Storager.cart).forEach((key) => {
					countOfItems += Storager.cart[key]['count'];
				});

				this.#cartInfo.innerText = countOfItems.toString();
			}
			else{
				this.#cartInfo.innerText = Object.keys(Storager.cart).length.toString();
			}
		}
	}
}