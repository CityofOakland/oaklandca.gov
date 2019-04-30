import "es6-promise";
const instantsearch = require('instantsearch.js');

const filterReveal = document.getElementById("filter-reveal");
const filters = document.getElementById("algolia-filters");
const openClasses = ["opacity-100", "h-auto", "z-40", "visible"];
const closedClasses = ["opacity-0", "h-0", "z-neg-10", "invisible"];

if (filterReveal != null) {
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
  }, false);  
}

if (window.section && window.entryTitle) {
  var filtered= `${window.section}:'${window.entryTitle}'`;
}

const ts = Math.round((new Date()).getTime() / 1000);
const search = instantsearch({
  appId: "6V5VJO8ZG2",
  apiKey: "9bded46d3070b2089499c70b2389708b",
  indexName: window.algoliaIndex,
  routing: true,
  searchParameters: {
    snippetEllipsisText: "…",
    filters: filtered || undefined,
  },
});

search.addWidget(
  instantsearch.widgets.searchBox({
    container: "#search-input",
    placeholder: window.searchInputText || "Search"
  })
);

search.start();
