/******/ (() => { // webpackBootstrap
/*!********************************************************************!*\
  !*** ./platform/plugins/real-estate/resources/js/custom-fields.js ***!
  \********************************************************************/
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regenerator() { /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/babel/babel/blob/main/packages/babel-helpers/LICENSE */ var e, t, r = "function" == typeof Symbol ? Symbol : {}, n = r.iterator || "@@iterator", o = r.toStringTag || "@@toStringTag"; function i(r, n, o, i) { var c = n && n.prototype instanceof Generator ? n : Generator, u = Object.create(c.prototype); return _regeneratorDefine2(u, "_invoke", function (r, n, o) { var i, c, u, f = 0, p = o || [], y = !1, G = { p: 0, n: 0, v: e, a: d, f: d.bind(e, 4), d: function d(t, r) { return i = t, c = 0, u = e, G.n = r, a; } }; function d(r, n) { for (c = r, u = n, t = 0; !y && f && !o && t < p.length; t++) { var o, i = p[t], d = G.p, l = i[2]; r > 3 ? (o = l === n) && (u = i[(c = i[4]) ? 5 : (c = 3, 3)], i[4] = i[5] = e) : i[0] <= d && ((o = r < 2 && d < i[1]) ? (c = 0, G.v = n, G.n = i[1]) : d < l && (o = r < 3 || i[0] > n || n > l) && (i[4] = r, i[5] = n, G.n = l, c = 0)); } if (o || r > 1) return a; throw y = !0, n; } return function (o, p, l) { if (f > 1) throw TypeError("Generator is already running"); for (y && 1 === p && d(p, l), c = p, u = l; (t = c < 2 ? e : u) || !y;) { i || (c ? c < 3 ? (c > 1 && (G.n = -1), d(c, u)) : G.n = u : G.v = u); try { if (f = 2, i) { if (c || (o = "next"), t = i[o]) { if (!(t = t.call(i, u))) throw TypeError("iterator result is not an object"); if (!t.done) return t; u = t.value, c < 2 && (c = 0); } else 1 === c && (t = i["return"]) && t.call(i), c < 2 && (u = TypeError("The iterator does not provide a '" + o + "' method"), c = 1); i = e; } else if ((t = (y = G.n < 0) ? u : r.call(n, G)) !== a) break; } catch (t) { i = e, c = 1, u = t; } finally { f = 1; } } return { value: t, done: y }; }; }(r, o, i), !0), u; } var a = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} t = Object.getPrototypeOf; var c = [][n] ? t(t([][n]())) : (_regeneratorDefine2(t = {}, n, function () { return this; }), t), u = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(c); function f(e) { return Object.setPrototypeOf ? Object.setPrototypeOf(e, GeneratorFunctionPrototype) : (e.__proto__ = GeneratorFunctionPrototype, _regeneratorDefine2(e, o, "GeneratorFunction")), e.prototype = Object.create(u), e; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, _regeneratorDefine2(u, "constructor", GeneratorFunctionPrototype), _regeneratorDefine2(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = "GeneratorFunction", _regeneratorDefine2(GeneratorFunctionPrototype, o, "GeneratorFunction"), _regeneratorDefine2(u), _regeneratorDefine2(u, o, "Generator"), _regeneratorDefine2(u, n, function () { return this; }), _regeneratorDefine2(u, "toString", function () { return "[object Generator]"; }), (_regenerator = function _regenerator() { return { w: i, m: f }; })(); }
function _regeneratorDefine2(e, r, n, t) { var i = Object.defineProperty; try { i({}, "", {}); } catch (e) { i = 0; } _regeneratorDefine2 = function _regeneratorDefine(e, r, n, t) { function o(r, n) { _regeneratorDefine2(e, r, function (e) { return this._invoke(r, n, e); }); } r ? i ? i(e, r, { value: n, enumerable: !t, configurable: !t, writable: !t }) : e[r] = n : (o("next", 0), o("throw", 1), o("return", 2)); }, _regeneratorDefine2(e, r, n, t); }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
$(document).ready(function () {
  var CustomField = /*#__PURE__*/function () {
    function CustomField() {
      _classCallCheck(this, CustomField);
      _defineProperty(this, "$customFieldWrapper", $('.custom-fields-wrap'));
      _defineProperty(this, "$customFieldList", $('#custom-field-list'));
      _defineProperty(this, "options", window.customFields);
    }
    return _createClass(CustomField, [{
      key: "init",
      value: function init() {
        var _this = this;
        this.actions();
        var availableCustomFields = this.options.customFields;
        availableCustomFields.forEach(function (item) {
          var index = _this.$customFieldList.find('.row').length;
          var options = {
            id: item.id,
            name: item.name,
            value: item.value
          };
          if (item.custom_field_id && item.custom_field.type === 'dropdown') {
            _this.generateDropdownTemplate(_objectSpread(_objectSpread({}, options), {}, {
              custom_field_id: item.custom_field_id,
              selectOptions: item.custom_field.options
            }), index, true);
          } else {
            _this.generateTextTemplate(_objectSpread(_objectSpread({}, options), {}, {
              custom_field_id: item.custom_field_id
            }), index, !!item.custom_field_id);
          }
        });
      }
    }, {
      key: "actions",
      value: function actions() {
        var _this2 = this;
        this.$customFieldWrapper.on('click', '#add-new', /*#__PURE__*/_asyncToGenerator(/*#__PURE__*/_regenerator().m(function _callee() {
          var id, data, index;
          return _regenerator().w(function (_context) {
            while (1) switch (_context.n) {
              case 0:
                id = $('#custom-field-id').val();
                if (!(id === '')) {
                  _context.n = 1;
                  break;
                }
                _this2.generateTextTemplate({}, _this2.$customFieldList.find('.row').length);
                _context.n = 3;
                break;
              case 1:
                _context.n = 2;
                return _this2.addFromGlobal(id);
              case 2:
                data = _context.v.data;
                index = _this2.$customFieldList.find('.row').length;
                if (data.type === 'dropdown') {
                  _this2.generateDropdownTemplate({
                    custom_field_id: data.id,
                    name: data.name,
                    selectOptions: data.options
                  }, index, true);
                } else if (data.type === 'text') {
                  _this2.generateTextTemplate({
                    custom_field_id: data.id,
                    name: data.name
                  }, index, true);
                }
              case 3:
                $('#add-custom-field-modal').modal('toggle');
              case 4:
                return _context.a(2);
            }
          }, _callee);
        }))).on('click', '.remove-custom-field', function () {
          $(this).parent().parent().parent().remove();
        });
      }
    }, {
      key: "addFromGlobal",
      value: function () {
        var _addFromGlobal = _asyncToGenerator(/*#__PURE__*/_regenerator().m(function _callee2(id) {
          return _regenerator().w(function (_context2) {
            while (1) switch (_context2.n) {
              case 0:
                _context2.n = 1;
                return fetch("".concat(this.options.ajax, "?id=").concat(id));
              case 1:
                _context2.n = 2;
                return _context2.v.json();
              case 2:
                return _context2.a(2, _context2.v);
            }
          }, _callee2, this);
        }));
        function addFromGlobal(_x) {
          return _addFromGlobal.apply(this, arguments);
        }
        return addFromGlobal;
      }()
    }, {
      key: "generateTextTemplate",
      value: function generateTextTemplate(options, index) {
        var isGlobalField = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;
        var template = $('#custom-field-template').html().replace(/__id__/g, options.id || '').replace(/__custom_field_id__/g, options.custom_field_id || '').replace(/__name__/g, options.name || '').replace(/__value__/g, options.value || '').replace(/__index__/g, index).replace(/__custom_field_input_class__/g, isGlobalField ? 'form-control-disabled' : '');
        this.$customFieldList.append(template);
        if (options.custom_field_id) {
          this.$customFieldList.find("[data-index=\"".concat(index, "\"] .custom-field-name")).prop('readonly', true);
        }
      }
    }, {
      key: "generateDropdownTemplate",
      value: function generateDropdownTemplate(options, index) {
        var isGlobalField = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;
        var select = '';
        $.each(options.selectOptions, function (key, option) {
          select += "<option value=\"".concat(option.value, "\" ").concat(options.value === option.value ? 'selected' : '', ">").concat(option.label, "</option>");
        });
        var template = $('#custom-field-dropdown-template').html().replace(/__id__/g, options.id || '').replace(/__custom_field_id__/g, options.custom_field_id || '').replace(/__name__/g, options.name || '').replace(/__index__/g, index).replace(/__selectOptions__/g, select).replace(/__custom_field_input_class__/g, isGlobalField ? 'form-control-disabled' : '');
        this.$customFieldList.append(template);
        if (options.custom_field_id) {
          this.$customFieldList.find("[data-index=\"".concat(index, "\"] .custom-field-name")).prop('readonly', true);
        }
      }
    }]);
  }();
  new CustomField().init();
});
/******/ })()
;