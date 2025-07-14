// header search bar

const headerSearchBar = document.querySelector(".header_search-bar input");
const searchBarSuggest = document.querySelector(".header_search-suggest");

headerSearchBar.addEventListener('click', () => {
    searchBarSuggest.toggleAttribute("data-expanded");
})