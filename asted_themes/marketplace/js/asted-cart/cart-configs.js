let config = {
	"currency": {
		"on": true,
		"text": "BYN"
	},
	"multiple-items": true,
	"float-count": false,
	"cart-selector": ".asted-cart",									// selector of cart element ex. "#cart"
	"cart-src": "/asted_themes/marketplace/img/cart.svg",									// cart icon filepath
	"cart-page-href": "/cart",										// cart page href
	"cart-info" : {													// upper text that containg count of elements in cart
		"size": "17px",												// width and height
		"font-size": "11px",										// font size of 
		"type": "rounded",											// usual / rounded
		"font-family": "unset"										// font family
	},
	"shop": {														// shop configs
		"add-multiple-items": true,
		"item-attribute": "data-item-id",							// item data attribute
		"image-item-selector": ".img-fluid",					// item image selector
		"title-item-selector": ".product-title",				// name of item selector
		"price-item-selector": ".asted-price",					// element that store price
		"add-to-cart-selector": ".btn-add",			// element selector during the action on which the item is added to the cart
		"action-type": "click",										/* type of action on the element add-to-cart-selector in which the item is added to 
																		the cart */
	},
	"cart-page" : {
		"method": "POST",
		"page": "/pay.php",
		"container": ".wrapper",
		"payment": {
			"has": true,
			"column": "first",										// first / second
			"title": {
				"has": true,
				"content": "Оформление заказа",
			},
			"payment-methods": {
				"transition": false,
				"has": true,
				"horizontal-line": false,
				"warning-text": "Выберите способ оплаты",
				"title" : {
					"has": true,
					"text": "Оплата"
				},
				"methods": {
					"method-1": {
						"icon": "/asted_themes/marketplace/img/belassist.png",
						"text": "Assist (карты, электронные кошельки)"
					},
					"method-2": {
						"icon": "/asted_themes/marketplace/img/upon_receipt.svg",
						"text": "Наложенный платеж"
					},
					// "method-3": {
					// 	"icon": "/asted_themes/marketplace/img/courier.svg",
					// 	"text": "Оплата курьеру по г. Могилёв (Наличными)"
					// },

					// "method-4": {
					// 	"icon": "/asted_themes/marketplace/img/pickup.svg",
					// 	"text": "Оплата при самовывозе по г. Могилёв",
					// },
					// "method-5": {
					// 	"icon": "/asted_themes/marketplace/img/installment_card.svg",
					// 	"text": "Карты рассрочки"
					// },
					"method-6": {
						"icon": "/asted_themes/marketplace/img/erip.png",
						"text": "«РАСЧЕТ» (ЕРИП)"
					}
				}
			},
			"delivery-methods": {
				"transition": true,
				"has": true,
				"horizontal-line": true,
				"warning-text": "Выберите способ доставки и/или введите все поля",
				"border": "2px dashed var(--input-color)",
				"title" : {
					"has": true,
					"text": "Доставка"
				},
				"methods": {
					"del-1": {
						"icon": "/asted_themes/marketplace/img/delivery.svg",
						"text": "Самовывоз из склада продавца"
					},
					// "del-2": {
					// 	"icon": "/asted_themes/marketplace/img/delivery.svg",
					// 	"text": "Почтой (для отправки СЕМЯН)",
					// 	"ext": {
					// 		"npunkt": "Населённый пункт",
					// 		"adres": "Адрес доставки",
					// 		"pindex": "Почтовый индекс"
					// 	}
					// },
					// "del-3": {
					// 	"icon": "/asted_themes/marketplace/img/delivery.svg",
					// 	"text": "Почтой (для товаров, кроме СЕМЯН)",
					// 	"ext": {
					// 		"npunkt": "Населённый пункт",
					// 		"adres": "Адрес доставки",
					// 		"pindex": "Почтовый индекс"
					// 	}
					// },
					"del-4": {
						"icon": "/asted_themes/marketplace/img/delivery.svg",
						"text": "Курьером",
						"ext": {
							"adres": "Адрес доставки",
                            "courierComment": "Коментарий курьеру"
						}
					},
					// "del-5": {
					// 	"icon": "/asted_themes/marketplace/img/delivery.svg",
					// 	"text": "Курьером по г.Минску",
					// 	"ext": {
					// 		"adres": "Адрес доставки"
					// 	}
					// },
					// "del-6": {
					// 	"icon": "/asted_themes/marketplace/img/delivery.svg",
					// 	"text": "Отправка посылки \"Европочтой\"",
					// 	"ext": {
					// 		"npunkt": "Населённый пункт",
					// 		"adres": "Адрес доставки",
					// 		"pindex": "Почтовый индекс"
					// 	}
					// }

				}
			},
			"user-data":{
				"has": false,
				"transition": true,
				"warning-text": "Заполните все поля",
				"title":
				{
					"has": true,
					"text": "Мои данные",
				},
				"border": "2px dashed var(--input-color)",
				"fields":{
					"phone-number": "Номер телефона",
					"surname": "Фамилия",
					"name": "Имя",
					"last-name": "Отчество",
					"email": "Email"
				},
				"offert": {
					"warning-text": "Примите соглашение",
					"has": false,
					"content": "Я согласен с <a href=\"#\">Пользовательскими соглашениями</a> и бла-бла-бла"
				}
			}
		},

		"upper-row":{
			"has": true
		},

		"total-block":{
			"has": true,

			"title":{
				"has": true,
				"text": "Ваш заказ"
			},
			
			"text": "Сумма заказа",
			"button-text": "Оформить заказ"
		},
		"empty-cart-text": "Ваша корзина пуста",
		"validation": {
			"data": {
				"phone-number": "phone",
				"email": "email",
				"npunkt": "email"
			},
			"color": "red",
			"border": "1px dashed red",
			"font-size": "18px"
		}
	}
}


export default config;