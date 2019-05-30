function init() {
  var menuToggle = document.getElementById("menu-toggle");
  var closeMenu = document.getElementById("close-menu");
  var searchMenuToggle = document.getElementById("search-menu-toggle");
  menuToggle.addEventListener("click", toggleMenu);
  closeMenu.addEventListener("click", toggleMenu);
  if (searchMenuToggle) {
    searchMenuToggle.addEventListener("click", toggleSearch);
  }
}

function toggleMenu(e) {
  var ele = document.getElementsByTagName("body")[0];
  e.preventDefault();
  ele.classList.toggle("open");
}

function toggleSearch(e) {
  var ele = document.getElementById("global-search-bar");
  e.preventDefault();
  ele.classList.toggle("lg:flex");
}

//Prevent the function to run before the document is loaded
document.addEventListener("readystatechange", function() {
  if (document.readyState === "complete") {
    init();
  }
});
