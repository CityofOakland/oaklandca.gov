/*!
 * @project        oaklandca.gov
 * @author         Christopher Kennedy, onebrightlight <chris@onebrightlight.com>
 * @build          Thu, Apr 25, 2019 3:58 PM GMT+1
 * @release        d3021ff1058c51fed77f7443c13ad91750491da8 [oak-staging]
 * @copyright      Copyright (c) 2019,Christopher Kennedy, onebrightlight <chris@onebrightlight.com>
 *
 !*/

(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/app"],{

/***/ "./src/css/app.css":
/*!*************************!*\
  !*** ./src/css/app.css ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./src/js/app.js":
/*!***********************!*\
  !*** ./src/js/app.js ***!
  \***********************/
/*! no static exports found */
/***/ (function(module, exports) {

if(window.location.pathname=='/'){window.onscroll=function changeClass(){var navBar=document.getElementById('nav-bar');var scrollPosY=window.pageYOffset|document.body.scrollTop;if(scrollPosY>1){navBar.classList.add('md:bg-shark');navBar.classList.remove('md:bg-transparent');}else if(scrollPosY<=100){navBar.classList.add('md:bg-transparent');navBar.classList.remove('md:bg-shark');}};}function init(){var menuToggle=document.getElementById("menu-toggle");var closeMenu=document.getElementById("close-menu");var searchMenuToggle=document.getElementById("search-menu-toggle");menuToggle.addEventListener("click",toggleMenu);closeMenu.addEventListener("click",toggleMenu);if(searchMenuToggle){searchMenuToggle.addEventListener("click",toggleSearch);}}function toggleMenu(e){var ele=document.getElementsByTagName("body")[0];e.preventDefault();ele.classList.toggle("open");}function toggleSearch(e){var ele=document.getElementById("global-search-bar");e.preventDefault();ele.classList.toggle("lg:flex");}//Prevent the function to run before the document is loaded
document.addEventListener("readystatechange",function(){if(document.readyState==="complete"){init();}});

/***/ }),

/***/ 0:
/*!***********************************************!*\
  !*** multi ./src/js/app.js ./src/css/app.css ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/ckennedy/Sites/oaklandca.gov/src/js/app.js */"./src/js/app.js");
module.exports = __webpack_require__(/*! /Users/ckennedy/Sites/oaklandca.gov/src/css/app.css */"./src/css/app.css");


/***/ })

},[[0,"/js/manifest","/js/vendor"]]]);