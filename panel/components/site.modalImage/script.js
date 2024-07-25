document.addEventListener("DOMContentLoaded", function () {
    loadLibrary()
    chooseMain();
    chooseImgFromProd()  
    customxx()
    let modal = document.getElementById("modal");
    let btn = document.querySelectorAll(".back-call");

    if (modal) {
        btn.forEach(function (eachBtn) {
            eachBtn.onclick = function (event) {
                event.preventDefault();
                modal.style.display = "block";
                chooseImgFromProd()
            };
        });

        // Получаем элемент закрытия
        let span = document.getElementById("closeModal");
        // Открываем модальное окно при нажатии на кнопку

        // Закрываем модальное окно при нажатии на крестик
        span.onclick = function () {
            modal.style.display = "none";
        };

        // Закрываем модальное окно, когда пользователь кликает вне его
        document.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    }
});
var tabLinks = document.querySelectorAll("#tab-container a");
var tabContents = document.querySelectorAll(".tab-content");

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
let btnModal = document.getElementById('addImages')
btnModal.addEventListener('click', function () {
    let divToCopy = modal.querySelectorAll('.choosen');
    gallery.innerHTML = '';
    let allSrc = '';
    divToCopy.forEach(img => {
        allSrc += img.dataset.src + ';';
        gallery.appendChild(img.cloneNode(true));
    });
    modal.style.display = "none";
    gallery.querySelectorAll('.choosen').forEach(img => {
        img.classList.remove('choosen');
    });
    if (!btn.classList.contains('galery')) {
        gallery.querySelector('.gallery-item').classList.add('glav');
    }
    inpAll.value = allSrc.slice(0, -1);
    inpMain.value = gallery.querySelector('.gallery-item').dataset.src;

    chooseMain();
    //перетягивание
    customxx();

});
function customxx() {
    const galleryItems = document.querySelectorAll('.gallery-item');
    const galleryInput = document.querySelector('input[name="galery"]');

    galleryItems.forEach(item => {
        item.draggable = true;
        item.addEventListener('dragstart', dragStart);
        item.addEventListener('dragover', dragOver);
        item.addEventListener('dragend', dragEnd);
        item.addEventListener('drop', drop);
    });

    let draggedItem = null;

    function dragStart(event) {
        draggedItem = this;
        event.dataTransfer.effectAllowed = 'move';
        event.dataTransfer.setData('text/html', this.innerHTML);
    }

    function dragOver(event) {
        if (event.preventDefault) {
            event.preventDefault();
        }

        event.dataTransfer.dropEffect = 'move';

        return false;
    }

    function dragEnd(event) {
        draggedItem = null;
    }

    function insertAfter(newNode, referenceNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    }

    function insertBefore(newNode, referenceNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode);
    }

    function drop(event) {
        if (draggedItem === this) {
            return;
        }
        if (draggedItem.nextSibling === this) {
            insertAfter(draggedItem, this);
        } else {
            insertBefore(draggedItem, this);
        }
        clearValue();
        updateHiddenInput();// Обновить скрытое поле ввода после перетаскивания
    }
}
function chooseMain() {
    if (!btn.classList.contains('galery')) {
        let prodImages = gallery.querySelectorAll('.gallery-item')
        prodImages.forEach(img => {
            img.addEventListener('click', function () {
                prodImages.forEach(img => img.classList.remove('glav'))
                this.classList.add('glav')
                inpMain.value = this.dataset.src;
            })
        })
    }
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
    xhr.open('POST', '/asted/components/site.modalImage/upload.php', true)
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

uploadForm.addEventListener('submit', function (event) {
    event.preventDefault();
    const formData = new FormData();
    for (let i = 0; i < fileInput.files.length; i++) {
        formData.append('files[]', fileInput.files[i]);
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/asted/components/site.modalImage/upload.php', true)
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
});


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
    xmlhttp.open("GET", "/asted/components/site.modalImage/upload.php", true);
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
})