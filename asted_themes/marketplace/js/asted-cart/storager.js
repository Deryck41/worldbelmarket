export default class Storager{
	static cart;

	static InitStorage(){
		this.cart = {};

		if (localStorage['cart'] === undefined){
			localStorage['cart'] = JSON.stringify(this.cart);
		}
	}

	static #CheckIfLocalstorageIsNotEmpty(){
        console.log(2);
		return localStorage['cart'] !== undefined && Object.keys(JSON.parse(localStorage['cart'])).length > 0
	}

	static ReadCart(){
        console.log(1);
		if (this.#CheckIfLocalstorageIsNotEmpty()){
			this.cart = JSON.parse(localStorage.cart);
			return true;
		}
		else{
			return false;
		}
	}

	static WriteCart(){
		localStorage.cart = JSON.stringify(this.cart);
	}

	static DeleteElement(idx){
		delete this.cart[idx];
	}

	static SetCount(idx, count){
		this.cart[idx]['count'] = count;
	}
	static IsCartEmpty(){
		return !this.#CheckIfLocalstorageIsNotEmpty();
	}
}