/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./platform/themes/resido/assets/js/utils.js"
/*!***************************************************!*\
  !*** ./platform/themes/resido/assets/js/utils.js ***!
  \***************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   clearCookies: () => (/* binding */ clearCookies),
/* harmony export */   getCookie: () => (/* binding */ getCookie),
/* harmony export */   handleError: () => (/* binding */ handleError),
/* harmony export */   handleValidationError: () => (/* binding */ handleValidationError),
/* harmony export */   setCookie: () => (/* binding */ setCookie),
/* harmony export */   showError: () => (/* binding */ showError),
/* harmony export */   showSuccess: () => (/* binding */ showSuccess)
/* harmony export */ });
var handleError = function handleError(data) {
  if (typeof data.errors !== 'undefined' && data.errors.length) {
    handleValidationError(data.errors);
  } else if (typeof data.responseJSON !== 'undefined') {
    if (typeof data.responseJSON.errors !== 'undefined') {
      if (data.status === 422) {
        handleValidationError(data.responseJSON.errors);
      }
    } else if (typeof data.responseJSON.message !== 'undefined') {
      showError(data.responseJSON.message);
    } else {
      $.each(data.responseJSON, function (index, el) {
        $.each(el, function (key, item) {
          showError(item);
        });
      });
    }
  } else {
    showError(data.statusText);
  }
};
var handleValidationError = function handleValidationError(errors) {
  var message = '';
  $.each(errors, function (index, item) {
    if (message !== '') {
      message += '<br />';
    }
    message += item;
  });
  showError(message);
};
var showError = function showError(message) {
  window.showAlert('alert-danger', message);
};
var showSuccess = function showSuccess(message) {
  window.showAlert('alert-success', message);
};
window.showAlert = function (messageType, message) {
  if (messageType && message !== '') {
    var alertId = Math.floor(Math.random() * 1000);
    var html = "<div class=\"alert ".concat(messageType, " alert-dismissible\" id=\"").concat(alertId, "\">\n                            <span class=\"close far fa-times\" data-dismiss=\"alert\" aria-label=\"close\"></span>\n                            <i class=\"far fa-") + (messageType === 'alert-success' ? 'check' : 'times') + " message-icon\"></i>\n                            ".concat(message, "\n                        </div>");
    $('#alert-container').append(html).ready(function () {
      window.setTimeout(function () {
        $("#alert-container #".concat(alertId)).remove();
      }, 6000);
    });
  }
};
var setCookie = function setCookie(name, value, expiresDate) {
  var date = new Date();
  var siteUrl = window.siteUrl;
  if (!siteUrl.includes(window.location.protocol)) {
    siteUrl = window.location.protocol + siteUrl;
  }
  var url = new URL(siteUrl);
  date.setTime(date.getTime() + expiresDate * 24 * 60 * 60 * 1000);
  var expires = 'expires=' + date.toUTCString();
  document.cookie = name + '=' + value + '; ' + expires + '; path=/' + '; domain=' + url.hostname;
};
var getCookie = function getCookie(name) {
  var cookieName = name + '=';
  var cookies = document.cookie.split(';');
  for (var i = 0; i < cookies.length; i++) {
    var c = cookies[i];
    while (c.charAt(0) === ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(cookieName) === 0) {
      return c.substring(cookieName.length, c.length);
    }
  }
  return '';
};
var clearCookies = function clearCookies(name) {
  var siteUrl = window.siteUrl;
  if (!siteUrl.includes(window.location.protocol)) {
    siteUrl = window.location.protocol + siteUrl;
  }
  var url = new URL(siteUrl);
  document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/' + '; domain=' + url.hostname;
};


/***/ }

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
/******/ 		// Check if module exists (development only)
/******/ 		if (__webpack_modules__[moduleId] === undefined) {
/******/ 			var e = new Error("Cannot find module '" + moduleId + "'");
/******/ 			e.code = 'MODULE_NOT_FOUND';
/******/ 			throw e;
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
/************************************************************************/
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
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!****************************************************!*\
  !*** ./platform/themes/resido/assets/js/review.js ***!
  \****************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./utils */ "./platform/themes/resido/assets/js/utils.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regenerator() { /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/babel/babel/blob/main/packages/babel-helpers/LICENSE */ var e, t, r = "function" == typeof Symbol ? Symbol : {}, n = r.iterator || "@@iterator", o = r.toStringTag || "@@toStringTag"; function i(r, n, o, i) { var c = n && n.prototype instanceof Generator ? n : Generator, u = Object.create(c.prototype); return _regeneratorDefine2(u, "_invoke", function (r, n, o) { var i, c, u, f = 0, p = o || [], y = !1, G = { p: 0, n: 0, v: e, a: d, f: d.bind(e, 4), d: function d(t, r) { return i = t, c = 0, u = e, G.n = r, a; } }; function d(r, n) { for (c = r, u = n, t = 0; !y && f && !o && t < p.length; t++) { var o, i = p[t], d = G.p, l = i[2]; r > 3 ? (o = l === n) && (u = i[(c = i[4]) ? 5 : (c = 3, 3)], i[4] = i[5] = e) : i[0] <= d && ((o = r < 2 && d < i[1]) ? (c = 0, G.v = n, G.n = i[1]) : d < l && (o = r < 3 || i[0] > n || n > l) && (i[4] = r, i[5] = n, G.n = l, c = 0)); } if (o || r > 1) return a; throw y = !0, n; } return function (o, p, l) { if (f > 1) throw TypeError("Generator is already running"); for (y && 1 === p && d(p, l), c = p, u = l; (t = c < 2 ? e : u) || !y;) { i || (c ? c < 3 ? (c > 1 && (G.n = -1), d(c, u)) : G.n = u : G.v = u); try { if (f = 2, i) { if (c || (o = "next"), t = i[o]) { if (!(t = t.call(i, u))) throw TypeError("iterator result is not an object"); if (!t.done) return t; u = t.value, c < 2 && (c = 0); } else 1 === c && (t = i["return"]) && t.call(i), c < 2 && (u = TypeError("The iterator does not provide a '" + o + "' method"), c = 1); i = e; } else if ((t = (y = G.n < 0) ? u : r.call(n, G)) !== a) break; } catch (t) { i = e, c = 1, u = t; } finally { f = 1; } } return { value: t, done: y }; }; }(r, o, i), !0), u; } var a = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} t = Object.getPrototypeOf; var c = [][n] ? t(t([][n]())) : (_regeneratorDefine2(t = {}, n, function () { return this; }), t), u = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(c); function f(e) { return Object.setPrototypeOf ? Object.setPrototypeOf(e, GeneratorFunctionPrototype) : (e.__proto__ = GeneratorFunctionPrototype, _regeneratorDefine2(e, o, "GeneratorFunction")), e.prototype = Object.create(u), e; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, _regeneratorDefine2(u, "constructor", GeneratorFunctionPrototype), _regeneratorDefine2(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = "GeneratorFunction", _regeneratorDefine2(GeneratorFunctionPrototype, o, "GeneratorFunction"), _regeneratorDefine2(u), _regeneratorDefine2(u, o, "Generator"), _regeneratorDefine2(u, n, function () { return this; }), _regeneratorDefine2(u, "toString", function () { return "[object Generator]"; }), (_regenerator = function _regenerator() { return { w: i, m: f }; })(); }
function _regeneratorDefine2(e, r, n, t) { var i = Object.defineProperty; try { i({}, "", {}); } catch (e) { i = 0; } _regeneratorDefine2 = function _regeneratorDefine(e, r, n, t) { function o(r, n) { _regeneratorDefine2(e, r, function (e) { return this._invoke(r, n, e); }); } r ? i ? i(e, r, { value: n, enumerable: !t, configurable: !t, writable: !t }) : e[r] = n : (o("next", 0), o("throw", 1), o("return", 2)); }, _regeneratorDefine2(e, r, n, t); }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }

var Review = /*#__PURE__*/function () {
  function Review() {
    var _this = this;
    _classCallCheck(this, Review);
    _defineProperty(this, "currentPage", 1);
    this.refresh();
    $(document).on('submit', '.review-form', function (e) {
      e.preventDefault();
      _this.submit($(e.currentTarget));
    }).on('click', '#pagination-review ul li a', function (e) {
      e.preventDefault();
      var url = new URL(e.target.href);
      _this.currentPage = url.searchParams.get('page') || 1;
      _this.refresh();
      var $reviewList = $(document).find('.reviews-list');
      $('html, body').animate({
        scrollTop: $reviewList.offset().top - 220
      }, 0);
    });
  }
  return _createClass(Review, [{
    key: "refresh",
    value: function () {
      var _refresh = _asyncToGenerator(/*#__PURE__*/_regenerator().m(function _callee() {
        var $reviewList, url;
        return _regenerator().w(function (_context) {
          while (1) switch (_context.n) {
            case 0:
              $reviewList = $(document).find('.reviews-list');
              $reviewList.addClass('animate-pulse');
              url = "".concat($reviewList.data('url'), "&page=").concat(this.currentPage);
              $.get(url, function (response) {
                $reviewList.html(response.data);
                $reviewList.removeClass('animate-pulse');
              });
            case 1:
              return _context.a(2);
          }
        }, _callee, this);
      }));
      function refresh() {
        return _refresh.apply(this, arguments);
      }
      return refresh;
    }()
  }, {
    key: "submit",
    value: function submit(element) {
      var _this2 = this;
      var data = element.serializeArray();
      $.ajax({
        method: 'post',
        url: element.prop('action'),
        data: data,
        beforeSend: function beforeSend() {
          element.find('button').prop('disabled', true).addClass('button-loading');
        },
        success: function success(response) {
          $(document).find('.reviews-count').html(response.data.count);
          element.find('textarea').prop('disabled', true);
          element.find('button').prop('disabled', true);
          _this2.currentPage = 1;
          _this2.refresh();
          (0,_utils__WEBPACK_IMPORTED_MODULE_0__.showSuccess)(response.data.message);
        },
        error: function error(response) {
          (0,_utils__WEBPACK_IMPORTED_MODULE_0__.handleError)(response);
          element.find('button').prop('disabled', false);
        },
        complete: function complete() {
          if (typeof refreshRecaptcha !== 'undefined') {
            refreshRecaptcha();
          }
          element.find('button').removeClass('button-loading');
          element.find('textarea').val('').trigger('change');
          $('#select-star').barrating('set', 5);
        }
      });
    }
  }]);
}();
$(document).ready(function () {
  new Review();
});
})();

/******/ })()
;