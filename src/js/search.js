import { publicDecrypt } from "crypto";

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
  instantsearch.widgets.clearAll({
    container: '#clear-refinements',
    templates: {
      link: "Remove Filters"
    }  })
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
  instantsearch.widgets.menu({
    container: "#section-filter",
    attributeName: "section",
    operator: 'or',
    limit: 10,
  })
);    

allSearch.addWidget(
  instantsearch.widgets.hits({
    container: "#all-hits",
    templates: {
      empty: "No results",
      item: `
      <div class="mb-4">
        <h3 class="text-lg my-0">
          <a class="hover:bg-green-300 hover:text-white" href="{{ url }}">{{{_highlightResult.title.value}}}</a>
        </h3>

        <p class="text-sm my-0">
          {{{ _snippetResult.leadIn.value }}}
        </p>

        {{{ #summary }}}
          <p class="text-sm my-0">
            {{{ _snippetResult.summary.value }}}
          </p>
        {{{ /summary }}}
        {{ ^summary }}
          <p class="text-sm my-0">
            {{{ _snippetResult.body.value }}}
          </p>
        {{{ /summary }}}

        <p class="text-sm my-0">
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

allSearch.start();

const searchNav = Array.from(document.querySelectorAll('a[data-holder]'));

