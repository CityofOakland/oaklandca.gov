var filterReveal = document.getElementById("filter-reveal");
var filters = document.getElementById("algolia-filters");
const openClasses = ["opacity-100", "h-auto", "z-40", "visible"];
const closedClasses = ["opacity-0", "h-0", "z-neg-10", "invisible"];

filterReveal.addEventListener("click", function(e) {
  e.preventDefault();

  if (filters.classList.contains("opacity-0")) {
    filters.classList.add(...openClasses);
    filters.classList.remove(...closedClasses);
    filterReveal.innerHTML = "Hide Filters";
  } else {
    filters.classList.add(...closedClasses);
    filters.classList.remove(...openClasses);
    filterReveal.innerHTML = "Show Filters";
  }
});
