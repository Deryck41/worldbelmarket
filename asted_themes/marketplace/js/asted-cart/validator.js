export default class Validator{

	static IsValidEmail(email){
		let re = /\S+@\S+\.\S+/;
		return re.test(email);
	}
	static IsValidPhone(phone){
		let re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
		return re.test(phone);
	}
}