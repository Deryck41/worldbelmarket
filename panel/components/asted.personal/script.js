const debounce = (callback, wait) => {
  let timeoutId = null;
  return (...args) => {
    window.clearTimeout(timeoutId);
    timeoutId = window.setTimeout(() => {
      callback(...args);
    }, wait);
  };
};

const UpdateLinks = () => {

    document.querySelectorAll('.trashclick').forEach(button => {
        button.addEventListener('click', function() {
            let confirmation = confirm("Вы уверены, что хотите удалить?");
            if (confirmation) {
                let menu_id = button.dataset.trashclick;
                fetch('/panel/components/asted.personal/del.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        'menu_id': menu_id
                    })
                })
                .then(response => response.text())
                .then(() => {
                    location.assign("/panel/personal/2022/");
                })
                .catch(error => console.error('Ошибка:', error));
            }
        });
    });


}


const Search = () => {
    const searchParams = {filter: filter.value}
    if (searchInput.value.length > 0){
        searchParams.search = searchInput.value;
    }
    fetch("/panel/components/asted.personal/personal_search.php?" + new URLSearchParams(searchParams))
      .then((response) => response.text())
      .then((data) => {
        document.querySelector(".personal_box").innerHTML = data;
        UpdateLinks();
      });
  }

  const searchInput = document.querySelector(".search-input-profile");
  const filter = document.querySelector('.personal-filter');
  
  const debouncedSearch = debounce(Search, 500);
  
  filter.addEventListener('change', Search);
  searchInput.addEventListener("input", debouncedSearch);