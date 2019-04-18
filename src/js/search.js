import { publicDecrypt } from "crypto";

const publicSearch = instantsearch({
  appId: "6V5VJO8ZG2",
  apiKey: "9bded46d3070b2089499c70b2389708b",
  indexName: "production_public",
});

const calSearch = instantsearch({
  appId: "6V5VJO8ZG2",
  apiKey: "9bded46d3070b2089499c70b2389708b",
  indexName: "production_calendars",
});

const docSearch = instantsearch({
  appId: "6V5VJO8ZG2",
  apiKey: "9bded46d3070b2089499c70b2389708b",
  indexName: "production_documents",
});

const govSearch = instantsearch({
  appId: "6V5VJO8ZG2",
  apiKey: "9bded46d3070b2089499c70b2389708b",
  indexName: "production_government",
  routing: true,
  searchFunction: function(helper) {
    const query = govSearch.helper.state.query;
    publicSearch.helper.setQuery(query);
    publicSearch.helper.search();
    calSearch.helper.setQuery(query);
    calSearch.helper.search();
    docSearch.helper.setQuery(query);
    docSearch.helper.search();
    helper.search();
  },
});

govSearch.addWidget(
  instantsearch.widgets.searchBox({
    container: "#search-input",
    placeholder: "Search"
  })
);

govSearch.addWidget(
  instantsearch.widgets.hits({
    container: "#gov-hits",
    templates: {
      empty: "No results",
      item: `
        <h3 class="text-lg mb-2"><a href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>
        {{ #bio }}
          <p class="my-0">
            {{{ _snippetResult.bio.value }}}
          </p>
        {{ /bio }}
        {{ #about }}
          <p class="my-0">
            {{{ _snippetResult.about.value }}}
          </p>
        {{ /about }}
        {{ #leadIn }}
          <p class="my-0">
            {{{ _snippetResult.leadIn.value }}}
          </p>
        {{ /leadIn }}
      `
    },
    cssClasses: {
      root: "block"
    },
  })
);

govSearch.addWidget(
  instantsearch.widgets.pagination({
    container: "#bottom-pagination",
    padding: 5,
    // default is to scroll to 'body', here we disable this behavior
    scrollTo: false,
    cssClasses: {
      root: "p-0 inline-block",
      disabled: "w-0"
    }
  })
);

publicSearch.addWidget(
  instantsearch.widgets.hits({
    container: "#pub-hits",
    templates: {
      empty: "No results",
      item: `
        <h3 class="text-lg mb-2"><a href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>
        {{ #leadIn }}
          <p class="mt-0 mb-2">
            {{{ _highlightResult.leadIn.value }}}
          </p>
        {{ /leadIn }}
        {{ #about }}
          <p class="mt-0 mb-2">
            {{{ _snippetResult.about.value }}}
          </p>
        {{ /about }}
        {{ #body }}
          <p class="mt-0 mb-2">
            {{{ _snippetResult.body.value }}}
          </p>
        {{ /body }}
      `
    },
    cssClasses: {
      root: "block"
    },
  })
);

calSearch.addWidget(
  instantsearch.widgets.hits({
    container: "#cal-hits",
    templates: {
      empty: "No results",
      item: `
        <h3 class="text-lg mb-2"><a href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>
        {{ #body }}
          <p class="mt-0 mb-2">
            {{{ _snippetResult.body.value }}}
          </p>
        {{ /body }}
      `
    },
    cssClasses: {
      root: "block"
    },
  })
);

docSearch.addWidget(
  instantsearch.widgets.hits({
    container: "#doc-hits",
    templates: {
      empty: "No results",
      item: `
        <h3 class="text-lg mb-2"><a href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>
        {{ !leadIn }}
          <p class="mt-0 mb-2">
            {{{ _snippetResult.leadIn.value }}}
          </p>
        {{ /leadIn }}
        {{ !documents }}
          <p class="mt-0 mb-2">
            {{{ _snippetResult.summary.value }}}
          </p>
        {{ /documents }}
      `
    },
    cssClasses: {
      root: "block"
    },
  })
);

docSearch.start();
calSearch.start();
publicSearch.start();
govSearch.start();

const searchNav = document.querySelectorAll('a[data-holder]');
const swapHits = document.querySelectorAll('[data-hits]');

searchNav.forEach(function(e) {
  switchHits(e);
});

function switchHits(e) {
  e.addEventListener("click", function(e) {
    e.preventDefault();
    let holderOn = e.target.dataset.holder;
    swapHits.forEach(function(h) {
      if (h.id == holderOn) {
        h.classList.remove('hidden');
      } else {
        h.classList.add('hidden');
      }  
    })
  })
}