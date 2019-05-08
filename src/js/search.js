import { publicDecrypt } from "crypto";

const calSearch = instantsearch({
  appId: "6V5VJO8ZG2",
  apiKey: "9bded46d3070b2089499c70b2389708b",
  indexName: "production_calendars",
  searchParameters: {
    highlightPreTag: '<b class="font-bold"><em>',
    highlightPostTag: '</em></b>',
  },
});

const docSearch = instantsearch({
  appId: "6V5VJO8ZG2",
  apiKey: "9bded46d3070b2089499c70b2389708b",
  indexName: "production_documents",
  searchParameters: {
    highlightPreTag: '<b class="font-bold"><em>',
    highlightPostTag: '</em></b>',
    hitsPerPage: 10,
  },
});

const govSearch = instantsearch({
  appId: "6V5VJO8ZG2",
  apiKey: "9bded46d3070b2089499c70b2389708b",
  indexName: "production_government",
  searchParameters: {
    highlightPreTag: '<b class="font-bold"><em>',
    highlightPostTag: '</em></b>',
  },
});

const allSearch = instantsearch({
  appId: "6V5VJO8ZG2",
  apiKey: "9bded46d3070b2089499c70b2389708b",
  indexName: "production_all",
  searchParameters: {
    highlightPreTag: '<b class="font-bold"><em>',
    highlightPostTag: '</em></b>',
  },
  routing: true,
  searchFunction: function(helper) {
    const query = allSearch.helper.state.query;
    const page = allSearch.helper.state.page;
    govSearch.helper.setQuery(query);
    govSearch.helper.setPage(page);
    govSearch.helper.search();
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

// boardsCommissions
// departments
// officials
// staff
// teams
// volunteers
allSearch.addWidget(
  instantsearch.widgets.hits({
    container: "#all-hits",
    templates: {
      empty: "No results",
      item: `
      <div>
        <h3 class="font-serif-body text-lg mb-2"><a class="hover:bg-fun-green hover:text-white" href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>

        <p class="text-sm md:text-base my-0">
          {{{ _snippetResult.leadIn.value }}}
        </p>

        {{{ #summary }}}
          <p class="text-sm md:text-base my-0">
            {{{ _snippetResult.summary.value }}}
          </p>
        {{{ /summary }}}
        {{ ^summary }}
          <p class="text-sm md:text-base my-0">
            {{{ _snippetResult.body.value }}}
          </p>
        {{{ /summary }}}

        <p class="text-sm md:text-base my-0">
          {{{ _snippetResult.bio.value }}}
        </p>
      </div>
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
        <h3 class="font-serif-body text-lg mb-2"><a class="block hover:bg-fun-green hover:text-white" href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>
        {{{ #bio }}}
          <p class="text-sm md:text-base my-0">
            {{{ _snippetResult.bio.value }}}
          </p>
        {{{ /bio }}}
        {{{ #about }}}
          <p class="text-sm md:text-base my-0">
            {{{ _snippetResult.about.value }}}
          </p>
        {{{ /about }}}
        {{{ #leadIn }}}
          <p class="text-sm md:text-base my-0">
            {{{ _snippetResult.leadIn.value }}}
          </p>
        {{{ /leadIn }}}
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
      <article class="text-sm mb-6">
        <h3 class="font-serif-body text-base my-0 leading-normal"><a class="block hover:bg-fun-green hover:text-white" href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>
        {{ ^leadIn }}
          <p class="my-0">
            {{{ _snippetResult.leadIn.value }}}
          </p>
        {{{ /summary }}}
        {{ ^documents }}
          <p class="my-0">
            {{{ _snippetResult.summary.value }}}
          </p>
        {{{ /documents }}}
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
          <h3 class="font-serif-body text-base my-2"><a class="block hover:bg-fun-green hover:text-white" href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>
          {{{ #body }}}
            <p class="mt-0 mb-2">
              {{{ _snippetResult.body.value }}}
            </p>
          {{{ /body }}}
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