document.querySelector('.custom-file-input').addEventListener('change', function (e) {
let name = document.getElementById("customFileInput").files[0].name;
let nextSibling = e.target.nextElementSibling;
nextSibling.innerText = name;
console.log(name);
console.log(nextSibling);
})

window.addEventListener("load", () => {
for (let i of document.querySelectorAll(".gallery img")) {
i.onclick = () => i.classList.toggle("full");
}
});

function previewFile() {
var preview = document.createElement("IMG");
var file = document.querySelector('input[type=file]').files[0];
var reader = new FileReader();

reader.onloadend = function () {
preview.src = reader.result;
}

if (file) {
reader.readAsDataURL(file);
} else {
preview.src = "";
}
document.getElementById("gallery").appendChild(preview);
}


<?php
$dir = "../asted/uploads/NewUploads"; // Укажите путь к директории
$files = scandir($dir); // Получаем список файлов
foreach ($files as $file) {

    if ($file !== '.' && $file !== '..') { // Пропускаем папки . и ..
        $path = $dir . $file; // Получаем путь к файлу
        $extension = pathinfo($path, PATHINFO_EXTENSION); // Получаем расширение файла
        $type = mime_content_type($path); // Получаем MIME-тип файла
        echo "<a href='$path'>$file ($type, $extension)</a><br>"; // Отображаем имя, тип и путь файла с ссылкой на него

    }
}
?>


<?php
$target_Path = "../asted/uploads/NewUploads/";
$target_Path = $target_Path . basename($_FILES['userFile']['name']);
move_uploaded_file($_FILES['userFile']['tmp_name'], $target_Path);
?>


<!-- 
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
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
                document.body.classList.remove("modal-open");
            }
        };
    }
}); -->



<!-- console.log(i.dataset.src.split('/'));
            event.preventDefault();
            modal.style.display = "block";
            tag_img.src = i.src;
            img_preview_src.appendChild(tag_img);
            name = `Имя файла: ${i.title}`;
            name_to_delete = i.title;
            type = `Тип файла: ${i.alt}`;
            // size = `Размер файла: ${i.size}`;
            url = i.src;
            div_name.innerHTML = name;
            div_type.innerHTML = type;

            input_url.value = url; -->