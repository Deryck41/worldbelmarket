export default class ModalDialog{
	#sender;
	#node;

	constructor (sender){
		this.#sender = sender;
		this.#node = document.querySelector('#modal');
		this.chooseHandler = this.#ChooseFile.bind(this);
		this.disposeHandler = this.Dispose.bind(this);
		this.#node.querySelector('#closeModal').addEventListener('click', this.disposeHandler);
	}

	#ChooseFile() {
    console.log(this.#sender);
    this.#node.querySelectorAll('.choosen').forEach(img => {
        this.#sender.querySelector('.gallery').appendChild(img.cloneNode(true));
    });

    this.Dispose();
}


	Dispose(){
		this.#node.querySelector('#addImages').removeEventListener('click', this.chooseHandler);
		this.#node.querySelector('#closeModal').removeEventListener('click', this.disposeHandler);
		this.#Hide();
		this.#sender = null;
		this.#node = null;
	}

	#Show(){
		this.#node.style.display = 'block';
	}

	#Hide(){
		this.#node.style.display = 'none';
	}

	Call(){
		this.#node.querySelector('#addImages').addEventListener('click', this.chooseHandler);
		this.#Show();
	}
}