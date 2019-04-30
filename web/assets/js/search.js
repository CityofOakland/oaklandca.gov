/*!
 * @project        oaklandca.gov
 * @author         Christopher Kennedy, onebrightlight <chris@onebrightlight.com>
 * @build          Mon, Apr 29, 2019 9:54 PM GMT+1
 * @release        5a8d9c6a54bf0821807264960a5be9aa3e8a8fa8 [oak-staging]
 * @copyright      Copyright (c) 2019,Christopher Kennedy, onebrightlight <chris@onebrightlight.com>
 *
 !*/

(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/search"],{

/***/ "./src/js/search.js":
/*!**************************!*\
  !*** ./src/js/search.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var crypto__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! crypto */ "./node_modules/crypto-browserify/index.js");
/* harmony import */ var crypto__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(crypto__WEBPACK_IMPORTED_MODULE_0__);
const publicSearch=instantsearch({appId:"6V5VJO8ZG2",apiKey:"9bded46d3070b2089499c70b2389708b",indexName:"production_public"});const calSearch=instantsearch({appId:"6V5VJO8ZG2",apiKey:"9bded46d3070b2089499c70b2389708b",indexName:"production_calendars"});const docSearch=instantsearch({appId:"6V5VJO8ZG2",apiKey:"9bded46d3070b2089499c70b2389708b",indexName:"production_documents"});const govSearch=instantsearch({appId:"6V5VJO8ZG2",apiKey:"9bded46d3070b2089499c70b2389708b",indexName:"production_government",routing:true,searchFunction:function searchFunction(helper){const query=govSearch.helper.state.query;const page=govSearch.helper.state.page;publicSearch.helper.setQuery(query);publicSearch.helper.setPage(page);publicSearch.helper.search();calSearch.helper.setQuery(query);calSearch.helper.setPage(page);calSearch.helper.search();docSearch.helper.setQuery(query);docSearch.helper.setPage(page);docSearch.helper.search();helper.search();}});govSearch.addWidget(instantsearch.widgets.searchBox({container:"#search-input",placeholder:"Search"}));govSearch.addWidget(instantsearch.widgets.hits({container:"#gov-hits",templates:{empty:"No results",item:"\n        <h3 class=\"text-lg mb-2\"><a href=\"{{ url }}\">{{{_highlightResult.title.value}}}</a></h3>\n        {{ #bio }}\n          <p class=\"text-sm md:text-base my-0\">\n            {{{ _snippetResult.bio.value }}}\n          </p>\n        {{ /bio }}\n        {{ #about }}\n          <p class=\"text-sm md:text-base my-0\">\n            {{{ _snippetResult.about.value }}}\n          </p>\n        {{ /about }}\n        {{ #leadIn }}\n          <p class=\"text-sm md:text-base my-0\">\n            {{{ _snippetResult.leadIn.value }}}\n          </p>\n        {{ /leadIn }}\n      "},cssClasses:{root:"block"}}));govSearch.addWidget(instantsearch.widgets.pagination({container:"#bottom-pagination",padding:5,// default is to scroll to 'body', here we disable this behavior
scrollTo:false,cssClasses:{root:"p-0 inline-block",disabled:"w-0"}}));publicSearch.addWidget(instantsearch.widgets.hits({container:"#pub-hits",templates:{empty:"No results",item:"\n        <h3 class=\"text-lg mb-2\"><a href=\"{{ url }}\">{{{_highlightResult.title.value}}}</a></h3>\n        {{ #leadIn }}\n          <p class=\"text-sm md:text-base mt-0 mb-2\">\n            {{{ _highlightResult.leadIn.value }}}\n          </p>\n        {{ /leadIn }}\n        {{ #about }}\n          <p class=\"text-sm md:text-base mt-0 mb-2\">\n            {{{ _snippetResult.about.value }}}\n          </p>\n        {{ /about }}\n        {{ #body }}\n          <p class=\"text-sm md:text-base mt-0 mb-2\">\n            {{{ _snippetResult.body.value }}}\n          </p>\n        {{ /body }}\n      "},cssClasses:{root:"block"}}));calSearch.addWidget(instantsearch.widgets.hits({container:"#cal-hits",templates:{empty:"No results",item:"\n        <h3 class=\"text-lg mb-2\"><a href=\"{{ url }}\">{{{_highlightResult.title.value}}}</a></h3>\n        {{ #body }}\n          <p class=\"text-sm md:text-base mt-0 mb-2\">\n            {{{ _snippetResult.body.value }}}\n          </p>\n        {{ /body }}\n      "},cssClasses:{root:"block"}}));docSearch.addWidget(instantsearch.widgets.hits({container:"#doc-hits",templates:{empty:"No results",item:"\n        <h3 class=\"text-lg mb-2\"><a href=\"{{ url }}\">{{{_highlightResult.title.value}}}</a></h3>\n        {{ !leadIn }}\n          <p class=\"mt-0 mb-2\">\n            {{{ _snippetResult.leadIn.value }}}\n          </p>\n        {{ /leadIn }}\n        {{ !documents }}\n          <p class=\"mt-0 mb-2\">\n            {{{ _snippetResult.summary.value }}}\n          </p>\n        {{ /documents }}\n      "},cssClasses:{root:"block"}}));docSearch.start();calSearch.start();publicSearch.start();govSearch.start();const searchNav=Array.from(document.querySelectorAll('a[data-holder]'));const swapHits=Array.from(document.querySelectorAll('[data-hits]'));searchNav.forEach(function(e){switchHits(e);});function switchHits(e){e.addEventListener("click",function(e){e.preventDefault();let holderOn=e.target.dataset.holder;swapHits.forEach(function(h){if(h.id==holderOn){h.classList.remove('hidden');}else{h.classList.add('hidden');}});});}

/***/ }),

/***/ 2:
/*!********************************!*\
  !*** multi ./src/js/search.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/ckennedy/Sites/oaklandca.gov/src/js/search.js */"./src/js/search.js");


/***/ }),

/***/ 3:
/*!**********************!*\
  !*** util (ignored) ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports) {

/* (ignored) */

/***/ }),

/***/ 4:
/*!**********************!*\
  !*** util (ignored) ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports) {

/* (ignored) */

/***/ }),

/***/ 5:
/*!************************!*\
  !*** buffer (ignored) ***!
  \************************/
/*! no static exports found */
/***/ (function(module, exports) {

/* (ignored) */

/***/ }),

/***/ 6:
/*!************************!*\
  !*** crypto (ignored) ***!
  \************************/
/*! no static exports found */
/***/ (function(module, exports) {

/* (ignored) */

/***/ })

},[[2,"/js/manifest","/js/vendor"]]]);