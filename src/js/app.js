import 'alpinejs'
import 'picturefill'

function init() {
  const selectNavs = document.getElementsByClassName('js-select-nav');
    if (selectNavs) {
    Array.from(selectNavs).forEach(select => {
      select.addEventListener("change", selectNav);
    });
  }
  function selectNav(e) {
    window.location.href = e.target.value;
  }
}

//Prevent the function to run before the document is loaded
document.addEventListener("readystatechange", function () {
  if (document.readyState === "complete") {
    init();
  }
});
