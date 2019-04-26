/*!
 * @project        oaklandca.gov
 * @author         Christopher Kennedy, onebrightlight <chris@onebrightlight.com>
 * @build          Thu, Apr 25, 2019 3:58 PM GMT+1
 * @release        d3021ff1058c51fed77f7443c13ad91750491da8 [oak-staging]
 * @copyright      Copyright (c) 2019,Christopher Kennedy, onebrightlight <chris@onebrightlight.com>
 *
 !*/

(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/algoliafilter"],{

/***/ "./src/js/algoliafilter.js":
/*!*********************************!*\
  !*** ./src/js/algoliafilter.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var filterReveal=document.getElementById("filter-reveal");var filters=document.getElementById("algolia-filters");var openClasses=["opacity-100","h-auto","z-40","visible"];var closedClasses=["opacity-0","h-0","z-neg-10","invisible"];if(filterReveal!=null){filterReveal.addEventListener("click",function(e){e.preventDefault();if(filters.classList.contains("opacity-0")){var _filters$classList,_filters$classList2;(_filters$classList=filters.classList).add.apply(_filters$classList,openClasses);(_filters$classList2=filters.classList).remove.apply(_filters$classList2,closedClasses);filterReveal.innerHTML="Hide Filters";}else{var _filters$classList3,_filters$classList4;(_filters$classList3=filters.classList).add.apply(_filters$classList3,closedClasses);(_filters$classList4=filters.classList).remove.apply(_filters$classList4,openClasses);filterReveal.innerHTML="Show Filters";}},false);}var ts=Math.round(new Date().getTime()/1000);var search=instantsearch({appId:"6V5VJO8ZG2",apiKey:"9bded46d3070b2089499c70b2389708b",indexName:window.algoliaIndex,routing:true,searchParameters:{snippetEllipsisText:"…"// {% block filters %}
//   {% if section is defined and slug is defined %}
//       {% set facetItem = craft.entries.section(section).slug(slug).one().title %}
//     filters: "{{ section }}:'{{ facetItem | replace({'%"%': '\\"', "%'%": "\'"}) }}'",
//   {% endif %}
// {% endblock %}
}});var defaultTemplate="<article class=\"py-8 sm:py-12 border-celeste border-b-2\">\n  {{#displayDate}}\n  <div class=\"text-base text-camouflage-green mb-4\">\n    Publish Date: <b>{{ displayDate }}</b>\n  </div>\n  {{/displayDate}}\n  <h3 class=\"text-xl md:text-2xl my-0 {{#leadIn}} mt-0 mb-3 md:mb-6 {{/leadIn}}\">\n    <a href=\"/{{ url }}\">\n      {{{ _highlightResult.title.value }}}\n    </a>\n  </h3>\n  {{#leadIn}}\n    <p class=\"text-base text-shark md:text-lg my-2 md:my-4\">\n      {{{ _highlightResult.leadIn.value }}}\n    </p>\n  {{/leadIn}}\n</article>";facetFilters.forEach(function(facet){search.addWidget(instantsearch.widgets.menuSelect({container:facet.container,attributeName:facet.attribute,operator:'or',limit:10,templates:{header:facet.header}}));});if(typeof moment!=='undefined'){var ONE_DAY_IN_MS=3600*24*1000;var TODAY=moment().format('L');var datePicker=instantsearch.connectors.connectRange(function(options,isFirstRendering){if(!isFirstRendering)return;var refine=options.refine;new Calendar({element:$('#calendar'),same_day_range:true,presets:false,callback:function callback(){var start=new Date(this.start_date).getTime();var end=new Date(this.end_date).getTime();var actualEnd=start===end?end+ONE_DAY_IN_MS-1:end;refine([start,actualEnd]);}});});var dateRangeWidget=datePicker({attributeName:'date'});search.addWidget(dateRangeWidget);}search.addWidget({render:function render(data){console.log(data);}});search.addWidget(instantsearch.widgets.searchBox({container:"#search-input",placeholder:window.searchInputText||"Search"}));search.addWidget(instantsearch.widgets.hits({container:"#hits",cssClasses:{root:window.hitsRootClass||"block"},templates:{empty:"No results",item:window.indexTemplate||defaultTemplate}}));search.addWidget(instantsearch.widgets.pagination({container:"#bottom-pagination",padding:5,// default is to scroll to 'body', here we disable this behavior
scrollTo:false,cssClasses:{root:"p-0 inline-block",disabled:"w-0"}}));search.start();

/***/ }),

/***/ 1:
/*!***************************************!*\
  !*** multi ./src/js/algoliafilter.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/ckennedy/Sites/oaklandca.gov/src/js/algoliafilter.js */"./src/js/algoliafilter.js");


/***/ })

},[[1,"/js/manifest"]]]);