function init() {
  
  const menuToggle = document.getElementById("menu-toggle");
  const closeMenu = document.getElementById("close-menu");
  const searchMenuToggle = document.getElementById("search-menu-toggle");
  const selectNavs = document.getElementsByClassName('js-select-nav');

  menuToggle.addEventListener("click", toggleMenu);
  closeMenu.addEventListener("click", toggleMenu);
  if (searchMenuToggle) {
    searchMenuToggle.addEventListener("click", toggleSearch);
  }
  if (selectNavs) {
    Array.from(selectNavs).forEach(select => {
      select.addEventListener("change", selectNav);
    });
  }
}

function selectNav(e) {
  window.location.href = e.target.value;
}

function toggleMenu(e) {
  let ele = document.getElementsByTagName("body")[0];
  e.preventDefault();
  ele.classList.toggle("open");
}

function toggleSearch(e) {
  let ele = document.getElementById("global-search-bar");
  e.preventDefault();
  ele.classList.toggle("lg:flex");
}

//Prevent the function to run before the document is loaded
document.addEventListener("readystatechange", function () {
  if (document.readyState === "complete") {
    init();
  }
});
