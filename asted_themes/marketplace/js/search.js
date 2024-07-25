function Debounce(callback, delay = 500){
	let timer=null;
	return  (...args) =>{
		if(timer){
			clearTimeout(timer); 
		}
		timer=setTimeout(()=>{
			callback(args)
		},delay)
	}
}

const searchResultsContainer = document.querySelector('.searchWrapper');
searchResultsContainer.style.width = "0";
const style = "search-catalog";
const field = document.querySelector('.form-control.input-search-box');
const buttonSearch = document.querySelector('.btn.btn-secondary.wd-search-btn');
let searchActive = false;

buttonSearch.addEventListener('click', ()=>{
    if (searchActive){
        searchActive = false;
        searchResultsContainer.style.width = "0";
        buttonSearch.innerHTML = `<i class="fa fa-search" aria-hidden="true"></i>`;
        searchResultsContainer.innerHTML = ``;
    }
});

const AddSearchResult = (data) => {
    searchActive = true;
    searchResultsContainer.style.width = "100%";
    searchResultsContainer.innerHTML = data;
    if (data === ""){
        searchResultsContainer.innerHTML = `<h3>По вашему запросу ничего не найдено</h3>`;
    }
    buttonSearch.innerHTML = `<svg style="width: 14px; fill: #a5a5a5;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>`;

    // searchResultsContainer.querySelectorAll('img').forEach((img) => {
    //     // if (img.getAttribute('src') === ""){
    //     //     img.setAttribute('src', "/asted/uploads/20241605014123-360-F-470299797-UD0eoVMMSUbHCcNJCdv2t8B2g1GVqYgs.jpg");
    //     // }
    // });
    shop.BindAction();
}

const Search = () => {
	searchResultsContainer.innerHTML = '';
		fetch(`/search.php?value=${field.value}&style=${style}`)
		.then(response => response.text()).then((res)=>AddSearchResult(res));
};

const DebouncedSearch = Debounce(Search);

field.addEventListener('input', () => {
    DebouncedSearch();
});