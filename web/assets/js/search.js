(window.webpackJsonp=window.webpackJsonp||[]).push([[3],{1:function(e,t,s){e.exports=s("gOQl")},2:function(e,t){},3:function(e,t){},4:function(e,t){},5:function(e,t){},gOQl:function(e,t,s){"use strict";s.r(t);s("HEbw");var n=instantsearch({appId:"6V5VJO8ZG2",apiKey:"9bded46d3070b2089499c70b2389708b",indexName:"production_public"}),a=instantsearch({appId:"6V5VJO8ZG2",apiKey:"9bded46d3070b2089499c70b2389708b",indexName:"production_calendars"}),l=instantsearch({appId:"6V5VJO8ZG2",apiKey:"9bded46d3070b2089499c70b2389708b",indexName:"production_documents"}),i=instantsearch({appId:"6V5VJO8ZG2",apiKey:"9bded46d3070b2089499c70b2389708b",indexName:"production_government",routing:!0,searchFunction:function(e){var t=i.helper.state.query,s=i.helper.state.page;n.helper.setQuery(t),n.helper.setPage(s),n.helper.search(),a.helper.setQuery(t),a.helper.setPage(s),a.helper.search(),l.helper.setQuery(t),l.helper.setPage(s),l.helper.search(),e.search(),console.log(s)}});i.addWidget(instantsearch.widgets.searchBox({container:"#search-input",placeholder:"Search"})),i.addWidget(instantsearch.widgets.hits({container:"#gov-hits",templates:{empty:"No results",item:'\n        <h3 class="text-lg mb-2"><a href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>\n        {{ #bio }}\n          <p class="text-sm md:text-base my-0">\n            {{{ _snippetResult.bio.value }}}\n          </p>\n        {{ /bio }}\n        {{ #about }}\n          <p class="text-sm md:text-base my-0">\n            {{{ _snippetResult.about.value }}}\n          </p>\n        {{ /about }}\n        {{ #leadIn }}\n          <p class="text-sm md:text-base my-0">\n            {{{ _snippetResult.leadIn.value }}}\n          </p>\n        {{ /leadIn }}\n      '},cssClasses:{root:"block"}})),i.addWidget(instantsearch.widgets.pagination({container:"#bottom-pagination",padding:5,scrollTo:!1,cssClasses:{root:"p-0 inline-block",disabled:"w-0"}})),n.addWidget(instantsearch.widgets.hits({container:"#pub-hits",templates:{empty:"No results",item:'\n        <h3 class="text-lg mb-2"><a href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>\n        {{ #leadIn }}\n          <p class="text-sm md:text-base mt-0 mb-2">\n            {{{ _highlightResult.leadIn.value }}}\n          </p>\n        {{ /leadIn }}\n        {{ #about }}\n          <p class="text-sm md:text-base mt-0 mb-2">\n            {{{ _snippetResult.about.value }}}\n          </p>\n        {{ /about }}\n        {{ #body }}\n          <p class="text-sm md:text-base mt-0 mb-2">\n            {{{ _snippetResult.body.value }}}\n          </p>\n        {{ /body }}\n      '},cssClasses:{root:"block"}})),a.addWidget(instantsearch.widgets.hits({container:"#cal-hits",templates:{empty:"No results",item:'\n        <h3 class="text-lg mb-2"><a href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>\n        {{ #body }}\n          <p class="text-sm md:text-base mt-0 mb-2">\n            {{{ _snippetResult.body.value }}}\n          </p>\n        {{ /body }}\n      '},cssClasses:{root:"block"}})),l.addWidget(instantsearch.widgets.hits({container:"#doc-hits",templates:{empty:"No results",item:'\n        <h3 class="text-lg mb-2"><a href="{{ url }}">{{{_highlightResult.title.value}}}</a></h3>\n        {{ !leadIn }}\n          <p class="mt-0 mb-2">\n            {{{ _snippetResult.leadIn.value }}}\n          </p>\n        {{ /leadIn }}\n        {{ !documents }}\n          <p class="mt-0 mb-2">\n            {{{ _snippetResult.summary.value }}}\n          </p>\n        {{ /documents }}\n      '},cssClasses:{root:"block"}})),l.start(),a.start(),n.start(),i.start();var d=document.querySelectorAll("a[data-holder]"),o=document.querySelectorAll("[data-hits]");d.forEach(function(e){!function(e){e.addEventListener("click",function(e){e.preventDefault();var t=e.target.dataset.holder;o.forEach(function(e){e.id==t?e.classList.remove("hidden"):e.classList.add("hidden")})})}(e)})}},[[1,0,1]]]);