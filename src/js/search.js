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
  searchParameters: {
    hitsPerPage: 8,
  },
});

const docSearch = instantsearch({
  appId: "6V5VJO8ZG2",
  apiKey: "9bded46d3070b2089499c70b2389708b",
  indexName: "production_documents",
  searchParameters: {
    hitsPerPage: 8,
  },
});

const govSearch = instantsearch({
  appId: "6V5VJO8ZG2",
  apiKey: "9bded46d3070b2089499c70b2389708b",
  indexName: "production_government",
});

const allSearch = instantsearch({
  appId: "6V5VJO8ZG2",
  apiKey: "9bded46d3070b2089499c70b2389708b",
  indexName: "production_all",
  routing: true,
  searchFunction: function(helper) {
    const query = allSearch.helper.state.query;
    const page = allSearch.helper.state.page;
    govSearch.helper.setQuery(query);
    govSearch.helper.setPage(page);
    govSearch.helper.search();
    publicSearch.helper.setQuery(query);
    publicSearch.helper.setPage(page);
    publicSearch.helper.search();
    calSearch.helper.setQuery(query);
    calSearch.helper.setPage(page);
    calSearch.helper.search();
    docSearch.helper.setQuery(query);
    docSearch.helper.setPage(page);
    docSearch.helper.search();
    helper.search();
  },
});

allSearch.addWidget(
  instantsearch.widgets.searchBox({
    container: "#search-input",
    placeholder: "Search"
  })
);

allSearch.addWidget(
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

allSearch.addWidget(
  instantsearch.widgets.hits({
    container: "#all-hits",
    templates: {
      empty: "No results",
      item: `
        <h3 class="text-lg mb-2"><a href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>
        {{ #bio }}
          <p class="text-sm md:text-base my-0">
            {{{ _snippetResult.bio.value }}}
          </p>
        {{ /bio }}
        {{ #about }}
          <p class="text-sm md:text-base my-0">
            {{{ _snippetResult.about.value }}}
          </p>
        {{ /about }}
        {{ #leadIn }}
          <p class="text-sm md:text-base my-0">
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
  instantsearch.widgets.hits({
    container: "#gov-hits",
    templates: {
      empty: "No results",
      item: `
        <h3 class="text-lg mb-2"><a href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>
        {{ #bio }}
          <p class="text-sm md:text-base my-0">
            {{{ _snippetResult.bio.value }}}
          </p>
        {{ /bio }}
        {{ #about }}
          <p class="text-sm md:text-base my-0">
            {{{ _snippetResult.about.value }}}
          </p>
        {{ /about }}
        {{ #leadIn }}
          <p class="text-sm md:text-base my-0">
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

publicSearch.addWidget(
  instantsearch.widgets.hits({
    container: "#pub-hits",
    templates: {
      empty: "No results",
      item: `
        <h3 class="text-lg mb-2"><a href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>
        {{ #leadIn }}
          <p class="text-sm md:text-base mt-0 mb-2">
            {{{ _highlightResult.leadIn.value }}}
          </p>
        {{ /leadIn }}
        {{ #about }}
          <p class="text-sm md:text-base mt-0 mb-2">
            {{{ _snippetResult.about.value }}}
          </p>
        {{ /about }}
        {{ #body }}
          <p class="text-sm md:text-base mt-0 mb-2">
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
      <article class="text-xs md:text-sm">
        <h3 class="text-base my-2"><a href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>
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
      </article>
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
        <article class="text-xs md:text-sm">
          <h3 class="text-base my-2"><a href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>
          {{ #body }}
            <p class="mt-0 mb-2">
              {{{ _snippetResult.body.value }}}
            </p>
          {{ /body }}
        </article>
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
allSearch.start();

const searchNav = Array.from(document.querySelectorAll('a[data-holder]'));
const swapHits = Array.from(document.querySelectorAll('[data-hits]'));

searchNav.forEach(function(e) {
  switchHits(e);
});

function switchHits(e) {
  e.addEventListener("click", function(e) {
    e.preventDefault();
    searchNav.forEach(function(e) {
      e.classList.remove('active');
    });
    e.target.classList.add('active');
    let holderOn = e.target.dataset.holder;
    swapHits.forEach(function(h) {
      if (h.id == holderOn) {
        h.classList.remove('hidden');
      } else {
        h.classList.add('hidden');
      }  
    });
  })
}