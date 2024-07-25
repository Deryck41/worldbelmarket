document.querySelector('.user-acc-button').addEventListener('click', ()=> {
    document.querySelector('.user-menu').classList.toggle('user-menu_visible');
});

document.querySelector('.logout-cabinet-button').addEventListener('click', () => {
    window.location.href = '/logout.php';
});