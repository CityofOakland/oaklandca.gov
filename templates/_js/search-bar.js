var searchInput = document.getElementById("search-input");
var searchContainer = document.getElementById("search-bar-container");

function sploop() {
  searchContainer.scrollIntoView();
}

searchInput.addEventListener("focus", sploop);
