/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./wp-content/themes/noair/resources/js/app.js":
/*!*****************************************************!*\
  !*** ./wp-content/themes/noair/resources/js/app.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _parts_BurgerMenu__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./parts/BurgerMenu */ "./wp-content/themes/noair/resources/js/parts/BurgerMenu.js");
/* harmony import */ var _parts_JsEnabled__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./parts/JsEnabled */ "./wp-content/themes/noair/resources/js/parts/JsEnabled.js");
/* harmony import */ var _parts_Tab__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./parts/Tab */ "./wp-content/themes/noair/resources/js/parts/Tab.js");
/* harmony import */ var _parts_Animations__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./parts/Animations */ "./wp-content/themes/noair/resources/js/parts/Animations.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }






var DW_Controller = /*#__PURE__*/function () {
  function DW_Controller() {// A ce stade-ci, le DOM n'est pas encore prêt car on est dans le <head>
    // Permet d'instancier les classes utilitaires par exemple

    _classCallCheck(this, DW_Controller);
  }

  _createClass(DW_Controller, [{
    key: "run",
    value: function run() {
      // Désormais, le DOM est prêt, on peut commencer à manipuler
      // Permet d'instancier les classes de composants d'interface par exemple
      //this.resizeCanvas()
      //this.addEventListeners()
      this.jsEnabled = new _parts_JsEnabled__WEBPACK_IMPORTED_MODULE_1__["default"]();
      this.animations = new _parts_Animations__WEBPACK_IMPORTED_MODULE_3__["default"]();
      this.burgerMenu = new _parts_BurgerMenu__WEBPACK_IMPORTED_MODULE_0__["default"]();
      this.tab = new _parts_Tab__WEBPACK_IMPORTED_MODULE_2__["default"]();
    }
  }]);

  return DW_Controller;
}();

window.dw = new DW_Controller();
window.addEventListener('load', function () {
  window.dw.run();
});

/***/ }),

/***/ "./wp-content/themes/noair/resources/js/parts/Animations.js":
/*!******************************************************************!*\
  !*** ./wp-content/themes/noair/resources/js/parts/Animations.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Animations)
/* harmony export */ });
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

var Animations = /*#__PURE__*/function () {
  function Animations() {
    _classCallCheck(this, Animations);

    this.hidden = document.querySelectorAll('.hidden');
    this.obServeImg();
  }

  _createClass(Animations, [{
    key: "obServeImg",
    value: function obServeImg() {
      var observer = new IntersectionObserver(this.animateImg);

      var _iterator = _createForOfIteratorHelper(this.hidden),
          _step;

      try {
        for (_iterator.s(); !(_step = _iterator.n()).done;) {
          var hidden = _step.value;
          observer.observe(hidden);
        }
      } catch (err) {
        _iterator.e(err);
      } finally {
        _iterator.f();
      }
    }
  }, {
    key: "animateImg",
    value: function animateImg(entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('show');
        } else {
          entry.target.classList.remove('show');
        }
      });
    }
  }]);

  return Animations;
}();



/***/ }),

/***/ "./wp-content/themes/noair/resources/js/parts/BurgerMenu.js":
/*!******************************************************************!*\
  !*** ./wp-content/themes/noair/resources/js/parts/BurgerMenu.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ BurgerMenu)
/* harmony export */ });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

var BurgerMenu = /*#__PURE__*/function () {
  function BurgerMenu() {
    var _this = this;

    _classCallCheck(this, BurgerMenu);

    this.menu = document.querySelector('.menu-js');
    this.burger = document.querySelector('.burger-js');
    this.burger.addEventListener('click', function (e) {
      _this.toggleMenu();
    });
  }

  _createClass(BurgerMenu, [{
    key: "toggleMenu",
    value: function toggleMenu() {
      if (!this.menu.classList.contains('active__menu')) {
        this.menu.classList.add('active__menu');
        this.element.classList.add('burger-active');
      } else {
        this.menu.classList.remove('active__menu');
        this.element.classList.remove('burger-active');
      }
    }
  }], [{
    key: "selector",
    get: function get() {
      return '.burger-js';
    }
  }]);

  return BurgerMenu;
}();



/***/ }),

/***/ "./wp-content/themes/noair/resources/js/parts/JsEnabled.js":
/*!*****************************************************************!*\
  !*** ./wp-content/themes/noair/resources/js/parts/JsEnabled.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ JsEnabled)
/* harmony export */ });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

var JsEnabled = /*#__PURE__*/function () {
  function JsEnabled() {
    _classCallCheck(this, JsEnabled);

    this.burger = document.querySelector('.burger-js');
    this.menu = document.querySelector('.menu-js');
    this.menu.classList.remove('menu-nojs');
    this.menu.style.display = '';
    this.burger.classList.add('burger');
    this.menu.classList.add('menu__wrapper');
  }

  _createClass(JsEnabled, null, [{
    key: "selector",
    get: function get() {
      return '.header';
    }
  }]);

  return JsEnabled;
}();



/***/ }),

/***/ "./wp-content/themes/noair/resources/js/parts/Tab.js":
/*!***********************************************************!*\
  !*** ./wp-content/themes/noair/resources/js/parts/Tab.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Tab)
/* harmony export */ });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

var Tab = /*#__PURE__*/function () {
  function Tab() {
    _classCallCheck(this, Tab);

    this.tabLink = document.querySelectorAll('.tab__link');
    this.tabContent = document.querySelectorAll('.tab__content');
    this.tabBar = document.querySelector('.tab');
    this.tabContainer = document.querySelector('.single-product__tab');
    this.openTab();
  }

  _createClass(Tab, [{
    key: "openTab",
    value: function openTab() {
      var _this = this;

      this.tabLink.forEach(function (tab) {
        tab.addEventListener('click', function (e) {
          _this.tabNumber = tab.dataset.forTab;
          _this.tabToActivate = _this.tabContainer.querySelector(".tab__content[data-tab=\"".concat(_this.tabNumber, "\"]"));

          _this.tabBar.querySelectorAll('.tab__link').forEach(function (link) {
            link.classList.remove('tab__link--active');
          });

          _this.tabContainer.querySelectorAll('.tab__content').forEach(function (content) {
            content.classList.remove('tab__content--active');
          });

          tab.classList.add('tab__link--active');

          _this.tabToActivate.classList.add('tab__content--active');
        });
      });
    }
  }]);

  return Tab;
}();



/***/ }),

/***/ "./wp-content/themes/noair/resources/sass/theme.scss":
/*!***********************************************************!*\
  !*** ./wp-content/themes/noair/resources/sass/theme.scss ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/wp-content/themes/noair/public/js/app": 0,
/******/ 			"wp-content/themes/noair/public/css/theme": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["wp-content/themes/noair/public/css/theme"], () => (__webpack_require__("./wp-content/themes/noair/resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["wp-content/themes/noair/public/css/theme"], () => (__webpack_require__("./wp-content/themes/noair/resources/sass/theme.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;