import config from './cart-configs.js';
import Shop from './shop.js';


window.shop = new Shop(config);
window.shop.BindAction();