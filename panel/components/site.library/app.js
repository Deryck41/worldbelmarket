document.querySelector('.custom-file-input').addEventListener('change', function (e) { //добавляет имя файла в строку 
    let name = document.getElementById("customFileInput").files[0].name;
    let nextSibling = e.target.nextElementSibling;
    nextSibling.innerText = name;
    console.log(typeof (name));
    console.log(nextSibling);
})

window.addEventListener("load", () => {
    const img = document.querySelectorAll(".gallery img");
    const displayed = document.querySelector('.displayed').innerHTML = `Всего файлов: ${img.length}`; //отображение количества файлов на старнице
    const modal = document.getElementById("modal"); //получаем модальное окно
    const img_preview_src = document.querySelector('.img-preview'); // получаем div для вставки превью изображения
    const tag_img = document.createElement("img"); //создаём изображение
    tag_img.style.height = '600px'; //размеры для превью картинки
    tag_img.style.width = '600px';


    //Информация об файле
    const info_area = document.querySelector('.img-info'); //получаем место для отображения информации об файле
    let div_name = document.createElement("div");
    let div_type = document.createElement("div");
    let label_url = document.createElement("Label");
    let input_url = document.createElement("input");
    let copy_btn = document.createElement('button');
    let delete_btn = document.createElement('button');
    let br = document.createElement('br');
    let timer = document.createElement('div');
    timer.innerHTML = "Скопировано!";
    timer.setAttribute('class', 'loader');
    copy_btn.setAttribute('class', 'btn btn-outline-primary btn-sm');
    delete_btn.setAttribute('class', 'btn btn-outline-danger btn-sm');
    delete_btn.setAttribute('style', 'margin-left:20px;');
    copy_btn.innerText = 'Скопировать URL в буфер';
    delete_btn.innerText = 'Удалить файл';
    input_url.setAttribute('size', 50);
    input_url.setAttribute('class', 'img-url');
    input_url.readOnly = true;
    input_url.type = "text";
    input_url.name = "urlText";
    label_url.htmlFor = "urlText";
    label_url.innerHTML = `Ссылка на файл:   `;
    let name = '';
    let type = '';
    let url = '';
    let name_to_delete = '';

    for (let i of img) {
        i.onclick = () => {
            //  console.log(i.dataset.src.split('/')[3].split('.')[1]);
            event.preventDefault();
            modal.style.display = "block";
            tag_img.src = i.src;
            img_preview_src.appendChild(tag_img);
            name = `Имя файла: ${i.dataset.src.split('/')[3]}`;
            name_to_delete = i.dataset.src.split('/')[3];
            type = `Тип файла: ${i.dataset.src.split('/')[3].split('.')[1]}`;
            // size = `Размер файла: ${i.size}`;
            url = i.src;
            div_name.innerHTML = name;
            div_type.innerHTML = type;
            let img_url = window.location.hostname + i.dataset.src;
            input_url.value = img_url;
            // input_url.value = i.src;
            info_area.appendChild(div_name);
            info_area.appendChild(div_type);
            info_area.appendChild(label_url);
            info_area.appendChild(input_url);
            info_area.appendChild(br);
            info_area.appendChild(br);
            info_area.appendChild(copy_btn);
            info_area.appendChild(delete_btn);
            info_area.appendChild(timer);

            copy_btn.onclick = function () {
                input_url.select();
                document.execCommand("copy");

                let loader = document.getElementsByClassName('loader')[0];
                loader.style.display = 'block'; // показываем .loader
                setTimeout(function () {
                    loader.style.display = 'none'; // скрываем .loader
                }, 2000); // зарежка перед скрытием в миллисекундах
            }

            delete_btn.onclick = function () {
                let result = window.confirm("Удалить безвозвратно?");
                if (result == true) {
                    $.ajax({
                        url: '/asted/components/site.library/delete_file.php',
                        type: 'POST',
                        data: {
                            name_to_delete
                        },
                        success: function (data) {
                            alert(data);

                        }
                    });
                    CloseModal();

                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                        location.reload();
                    }
                }


            }
        };
    }


});

document.addEventListener("DOMContentLoaded", function () {
    // Получаем элементы модального окна и кнопку открытия
    let modal = document.getElementById("modal");

    if (modal) {
        // Получаем элемент закрытия
        let span = document.getElementById("closeModal");

        // Закрываем модальное окно при нажатии на крестик
        span.onclick = function () {
            modal.style.display = "none";
            document.body.classList.remove("modal-open");
        };

        // Закрываем модальное окно, когда пользователь кликает вне его
        document.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
                document.body.classList.remove("modal-open");
            }
        };
    }
});

function CloseModal() {
    // Получаем элементы модального окна и кнопку открытия
    const modal = document.getElementById("modal");
    modal.style.display = "none";
    document.body.classList.remove("modal-open");

}