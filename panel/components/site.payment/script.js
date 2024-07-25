const debounce = (callback, wait) => {
    let timeoutId = null;
    return (...args) => {
      window.clearTimeout(timeoutId);
      timeoutId = window.setTimeout(() => {
        callback(...args);
      }, wait);
    };
  };
  
  const Search = () => {
    const searchParams = {filter: filter.value}
    if (searchInput.value.length > 0){
        searchParams.search = searchInput.value;
    }
    fetch("/panel/components/site.payment/payment_core.php?" + new URLSearchParams(searchParams))
      .then((response) => response.text())
      .then((data) => {
        document.querySelector(".products").innerHTML = data;
      });
  }

  const searchInput = document.querySelector(".search-input");
  const filter = document.querySelector('.filter-select');
  
  const debouncedSearch = debounce(Search, 500);
  
  filter.addEventListener('change', Search);
  searchInput.addEventListener("input", debouncedSearch);
  
  