if (window.location.pathname == '/') {
  window.onscroll = function changeClass(){
    const navBar = document.getElementById('nav-bar');
    const scrollPosY = window.pageYOffset | document.body.scrollTop;
    if(scrollPosY > 1) {
      navBar.classList.add('md:bg-shark');
      navBar.classList.remove('md:bg-transparent');
    } else if(scrollPosY <= 100) {
      navBar.classList.add('md:bg-transparent');
      navBar.classList.remove('md:bg-shark');
    }
  }
}
function init() {
  const menuToggle = document.getElementById("menu-toggle");
  const closeMenu = document.getElementById("close-menu");
  const searchMenuToggle = document.getElementById("search-menu-toggle");
  menuToggle.addEventListener("click", toggleMenu);
  closeMenu.addEventListener("click", toggleMenu);
  if (searchMenuToggle) {
    searchMenuToggle.addEventListener("click", toggleSearch);
  }
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
