/*!
 * @project        oaklandca.gov
 * @author         Christopher Kennedy, onebrightlight <chris@onebrightlight.com>
 * @build          Mon, Apr 29, 2019 9:54 PM GMT+1
 * @release        5a8d9c6a54bf0821807264960a5be9aa3e8a8fa8 [oak-staging]
 * @copyright      Copyright (c) 2019,Christopher Kennedy, onebrightlight <chris@onebrightlight.com>
 *
 !*/

(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/algoliafilter"],{

/***/ "./src/js/algoliafilter.js":
/*!*********************************!*\
  !*** ./src/js/algoliafilter.js ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var es6_promise__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! es6-promise */ "./node_modules/es6-promise/dist/es6-promise.js");
/* harmony import */ var es6_promise__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(es6_promise__WEBPACK_IMPORTED_MODULE_0__);
const instantsearch=__webpack_require__(/*! instantsearch.js */ "./node_modules/instantsearch.js/es/index.js");const filterReveal=document.getElementById("filter-reveal");const filters=document.getElementById("algolia-filters");const openClasses=["opacity-100","h-auto","z-40","visible"];const closedClasses=["opacity-0","h-0","z-neg-10","invisible"];if(filterReveal!=null){filterReveal.addEventListener("click",function(e){e.preventDefault();if(filters.classList.contains("opacity-0")){filters.classList.add(...openClasses);filters.classList.remove(...closedClasses);filterReveal.innerHTML="Hide Filters";}else{filters.classList.add(...closedClasses);filters.classList.remove(...openClasses);filterReveal.innerHTML="Show Filters";}},false);}if(window.section&&window.entryTitle){var filtered="".concat(window.section,":'").concat(window.entryTitle,"'");}const ts=Math.round(new Date().getTime()/1000);instantsearch({appId:"6V5VJO8ZG2",apiKey:"9bded46d3070b2089499c70b2389708b",indexName:window.algoliaIndex,routing:true,searchParameters:{snippetEllipsisText:"…",filters:filtered||undefined}});search.addWidget(instantsearch.widgets.searchBox({container:"#search-input",placeholder:window.searchInputText||"Search"}));search.start();

/***/ }),

/***/ 1:
/*!***************************************!*\
  !*** multi ./src/js/algoliafilter.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/ckennedy/Sites/oaklandca.gov/src/js/algoliafilter.js */"./src/js/algoliafilter.js");


/***/ })

},[[1,"/js/manifest","/js/vendor"]]]);