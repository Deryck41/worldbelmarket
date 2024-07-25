import ModalDialog from '/asted/components/site.modalImageAll/modal.js';
document.addEventListener("DOMContentLoaded", function () {
	loadLibrary();
	chooseImgFromProd()

	document.querySelectorAll(".back-call").forEach(function (eachBtn) {
		eachBtn.onclick = function (event) {
			event.preventDefault();
			let currentModalDialog = new ModalDialog(eachBtn.parentNode);
			currentModalDialog.Call();

		};
	});
});
var tabLinks = document.querySelectorAll("#tab-container a");
var tabContents = document.querySelectorAll(".tab-content");

var dragSrcEl = null;

function showTab(id) {
	tabContents.forEach(function (tabContent) {
		tabContent.style.display = "none";
	});
	document.getElementById(id).style.display = "block";

}

tabLinks.forEach(function (tabLink) {
	tabLink.addEventListener("click", function (e) {
		e.preventDefault();
		tabLinks.forEach(function (link) {
			link.classList.remove("active");
		});
		e.target.classList.add("active");
		showTab(e.target.getAttribute("href").substring(1));
	});
});

showTab("tab2");
let gallery = document.getElementById('gallery');
let inpAll = document.querySelector('input[name="galery"]')
let inpMain = document.querySelector('input[name="image"]')
let prodImages = gallery.querySelectorAll('.gallery-item')
let btn = document.querySelector(".back-call");



function chooseImg() {
	let libImages = modal.querySelectorAll('.gallery-item');
	libImages.forEach(function (e) {
		if (btn.classList.contains('multiple')) {
			e.addEventListener('click', function () {
				e.classList.toggle('choosen');
			})
		} else {
			console.log('yes');
			e.addEventListener('click', function () {
				libImages.forEach(function (el) {
					el.classList.remove('choosen');
				});
				e.classList.add('choosen');
			})
		}

	})
}




function chooseImgFromProd() {
	let prodImages = gallery.querySelectorAll('.gallery-item')

	if (prodImages) {
		prodImages.forEach(function (img) {
			let dataSrc = img.getAttribute('data-src');
			let modalImg = modal.querySelector('[data-src="' + dataSrc + '"]');
			if (modalImg) {
				modalImg.classList.add('choosen');
			}

		});
	}
}

let dropzone = document.getElementById('drop-zone')
let uploadForm = document.getElementById('upload-form')
let fileInput = document.getElementById('file-input');

dropzone.addEventListener('dragover', function (event) {
	event.preventDefault()
})
dropzone.addEventListener('drop', function (event) {
	event.preventDefault()
	let files = event.dataTransfer.files
	let formData = new FormData()
	for (let i = 0; i < files.length; i++) {
		formData.append('files[]', files[i])
	}
	let xhr = new XMLHttpRequest()
	xhr.open('POST', '/asted/components/site.modalImageAll/upload.php', true)
	xhr.onload = function () {
		if (xhr.status === 200) {
			console.log('Файлы успешно загружены на сервер!')
			loadLibrary()

			document.getElementById('tab-link-2').click()
		} else {
			console.log('Произошла ошибка при загрузке файлов')
		}
	}
	xhr.send(formData)
})
function chooseUploadFile() {
	let uploadFiles = modal.querySelectorAll('.gallery-item');
	for (let index = 0; index < fileInput.files.length; index++) {
		uploadFiles[index].classList.add('choosen')
	}
}

//Функция очистки валв
function clearValue() {
	console.log('клирик');
	// Находим элемент с классом "form-control d-none"
	const inputElementclear = document.querySelector('.sqlgallery');

	// Очищаем значение атрибута "value"
	inputElementclear.innerHTML = '';
	inputElementclear.value = '';
}

//Функция обновления после драг эд дропа
function updateHiddenInput() {
	console.log('tesic');
	// Находим все элементы с классом "gallery-item"
	const galleryItems = document.querySelectorAll('#gallery .gallery-item');

	// Создаем пустой массив для хранения значений data-src
	const dataSrcValues = [];

	// Проходимся по каждому элементу и извлекаем значение атрибута data-src
	galleryItems.forEach(item => {
		const dataSrc = item.getAttribute('data-src');
		dataSrcValues.push(dataSrc);
	});

	// Находим элемент с классом "form-control d-none"
	const inputElement = document.querySelector('.sqlgallery');

	// Устанавливаем значение атрибута "value" в собранный массив значений data-src
	inputElement.value = dataSrcValues.join(';');
	console.log(inputElement.value);
}
//Для загрузки файла
uploadForm.addEventListener('submit', function (event) {
    event.preventDefault();
    const formData = new FormData();
    for (let i = 0; i < fileInput.files.length; i++) {
        formData.append('files[]', fileInput.files[i]);
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/asted/components/site.modalImageAll/upload.php', true)
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log('Файлы успешно загружены на сервер!')
            loadLibrary()
            document.getElementById('tab-link-2').click()
        } else {
            console.log('Произошла ошибка при загрузке файлов')
        }
    };
    xhr.send(formData);
});//Для загрузки файла -- END
function loadLibrary() {
	const xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (this.readyState === 4 && this.status === 200) {
			modal.querySelector(".gallery").innerHTML = this.responseText;
			chooseImg()
			chooseImgFromProd()
			chooseUploadFile()
		}
	};
	xmlhttp.open("GET", "/asted/components/site.modalImageAll/upload.php", true);
	xmlhttp.send();

}
let input_search = document.getElementById('searchImg');
var typingTimer;
var doneTypingInterval = 1000;
input_search.addEventListener('input', function () {
	clearTimeout(typingTimer);
	typingTimer = setTimeout(search, doneTypingInterval);
});
function search() {
	let valInput_search = input_search.value;
	let allImage = modal.querySelectorAll('.gallery-item');
	allImage.forEach(function (img) {
		img.classList.add('d-none');
	})
	let searchImage = modal.querySelectorAll('.gallery-item img[title*="' + valInput_search + '"]');
	searchImage.forEach(function (img) {
		img.parentNode.classList.remove('d-none');
	})
	if (valInput_search.length == 0) {
		allImage.forEach(function (img) {
			img.classList.remove('d-none');
		})
	}
}
let clearSearch = document.getElementById('clearSearch')
clearSearch.addEventListener('click', function () {
	input_search.value = '';
	search()
});

function RefreshInputsValue(area){
	let imageInput = area.querySelector('.sqlimage');
	let galleryInput = area.querySelector('.sqlgallery');

	imageInput.value = area.querySelector('.glav img').getAttribute('src');
	galleryInput.value = '';

	area.querySelectorAll('.gallery-item img').forEach((img) => {
		galleryInput.value = galleryInput.value + ';' + img.getAttribute('src');
	});

	console.log(666);
}

// Drag and drop section

function dragStart(e) {
	dragSrcEl = this;
	e.dataTransfer.effectAllowed = 'move';
	e.dataTransfer.setData('text/html', this.innerHTML);
};

function dragEnter(e) {
	this.classList.add('over');
}

function dragLeave(e) {
	e.stopPropagation();
	this.classList.remove('over');
}

function dragOver(e) {
	e.preventDefault();
	e.dataTransfer.dropEffect = 'move';
	return false;
}

function dragDrop(e) {
	if (dragSrcEl != this) {
		dragSrcEl.innerHTML = this.innerHTML;
		this.innerHTML = e.dataTransfer.getData('text/html');
		RefreshInputsValue(dragSrcEl.parentNode.parentNode);
	}
	return false;
}

function dragEnd(e) {
	console.log(2);
	this.style.opacity = '1';
}

function addEventsDragAndDrop(el) {
	console.log(1);
	el.addEventListener('dragstart', dragStart, false);
	el.addEventListener('dragenter', dragEnter, false);
	el.addEventListener('dragover', dragOver, false);
	el.addEventListener('dragleave', dragLeave, false);
	el.addEventListener('drop', dragDrop, false);
	el.addEventListener('dragend', dragEnd, false);
}

// Choose main


// Dom mutations event listener

var onAppend = function(elem, f) {
	var observer = new MutationObserver(function(mutations) {
		mutations.forEach(function(m) {
			if (m.addedNodes.length) {
				f(m.addedNodes)
			}
		})
	})
	observer.observe(elem, {childList: true})
}


document.querySelectorAll('.input-area').forEach((area)=> {
	onAppend(area.querySelector('.gallery'), function(added){
		document.querySelectorAll('.gallery').forEach((gallery) => {
			if (gallery.querySelectorAll('.gallery-item').length == 1){
				gallery.querySelector('.gallery-item').classList.add('glav');
			}
		});

		area.querySelectorAll('.gallery-item').forEach((item) => {
			addEventsDragAndDrop(item);
		});

		RefreshInputsValue(area);
	});
});
