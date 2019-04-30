/*!
 * @project        oaklandca.gov
 * @author         Christopher Kennedy, onebrightlight <chris@onebrightlight.com>
 * @build          Mon, Apr 29, 2019 9:54 PM GMT+1
 * @release        5a8d9c6a54bf0821807264960a5be9aa3e8a8fa8 [oak-staging]
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

if(window.location.pathname=='/'){window.onscroll=function changeClass(){const navBar=document.getElementById('nav-bar');const scrollPosY=window.pageYOffset|document.body.scrollTop;if(scrollPosY>1){navBar.classList.add('md:bg-shark');navBar.classList.remove('md:bg-transparent');}else if(scrollPosY<=100){navBar.classList.add('md:bg-transparent');navBar.classList.remove('md:bg-shark');}};}function init(){const menuToggle=document.getElementById("menu-toggle");const closeMenu=document.getElementById("close-menu");const searchMenuToggle=document.getElementById("search-menu-toggle");menuToggle.addEventListener("click",toggleMenu);closeMenu.addEventListener("click",toggleMenu);if(searchMenuToggle){searchMenuToggle.addEventListener("click",toggleSearch);}}function toggleMenu(e){let ele=document.getElementsByTagName("body")[0];e.preventDefault();ele.classList.toggle("open");}function toggleSearch(e){let ele=document.getElementById("global-search-bar");e.preventDefault();ele.classList.toggle("lg:flex");}//Prevent the function to run before the document is loaded
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

},[[0,"/js/manifest"]]]);