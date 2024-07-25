
var editor = CodeMirror.fromTextArea(document.getElementById("newcontent"), {
    // mode: "css", // Укажите соответствующий режим
    lineNumbers: true,
    theme: "default", // Укажите тему, если нужно
    autoCloseBrackets: true // Включить автозакрытие скобок
});

const select = document.getElementById('theme');
const urlParams = new URLSearchParams(window.location.search);
select.addEventListener('change', function () {
    urlParams.set('theme', select.value);
    let newURL = `${window.location.pathname}?${urlParams.toString()}`;
    window.location.href = newURL;
})
const multiItems = document.querySelectorAll('.list-file-item_multi');
multiItems.forEach(item => {
    const anchor = item.querySelector('a');
    anchor.addEventListener('click', () => {
        const sublist = item.querySelector('.list-file_multi');
        if (sublist) {
            sublist.classList.toggle('d-none');
        }
    });
});