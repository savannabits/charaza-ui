(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["js/roles-component~js/users-component"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/InfiniteSelect.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/InfiniteSelect.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-select */ "./node_modules/vue-select/dist/vue-select.js");
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(vue_select__WEBPACK_IMPORTED_MODULE_1__);


function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _iterableToArrayLimit(arr, i) { if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return; var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "InfiniteSelect",
  components: {
    "v-select": vue_select__WEBPACK_IMPORTED_MODULE_1___default.a
  },
  props: {
    "apiUrl": {
      required: true,
      type: String
    },
    "perPage": {
      required: false,
      "default": 15
    },
    "multiple": {
      type: Boolean,
      "default": false
    },
    "value": {
      "default": null
    },
    "label": {
      required: true,
      type: String
    }
  },
  data: function data() {
    return {
      observer: null,
      paginatedObject: {
        data: []
      },
      searchQuery: null
    };
  },
  mounted: function mounted() {
    this.paginatedObject.per_page = parseInt(this.perPage) || 15;
    this.selected = this.initValue;
    this.observer = new IntersectionObserver(this.infiniteScroll);
  },
  methods: {
    onOpen: function onOpen() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                if (!_this.hasNextPage) {
                  _context.next = 4;
                  break;
                }

                _context.next = 3;
                return _this.$nextTick();

              case 3:
                _this.observer.observe(_this.$refs.infiniteSelectLoad);

              case 4:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    onClose: function onClose() {
      this.observer.disconnect();
      this.searchQuery = null;
    },
    onSelect: function onSelect(value) {
      this.$emit('input', value);
    },
    fetchResults: function fetchResults(query, loading) {
      var _arguments = arguments,
          _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var more, vm, params;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                more = _arguments.length > 2 && _arguments[2] !== undefined ? _arguments[2] : false;
                vm = _this2;

                if (query) {
                  vm.searchQuery = query;
                }

                params = {};

                if (!(vm.paginatedObject.current_page && more)) {
                  _context2.next = 9;
                  break;
                }

                if (vm.paginatedObject.next_page_url) {
                  _context2.next = 7;
                  break;
                }

                return _context2.abrupt("return", false);

              case 7:
                params.page = vm.paginatedObject.current_page + 1;
                params.per_page = vm.paginatedObject.per_page;

              case 9:
                if (vm.searchQuery) {
                  params.search = vm.searchQuery;
                }

                return _context2.abrupt("return", new Promise(function (resolve, reject) {
                  var vm = _this2;
                  loading = true;
                  axios.get(vm.apiUrl, {
                    params: params
                  }).then(function (res) {
                    // process and store results.
                    var bak = vm.paginatedObject.data;
                    vm.paginatedObject = res.data.payload;

                    if (more) {
                      vm.paginatedObject.data = [].concat(_toConsumableArray(bak), _toConsumableArray(res.data.payload.data));
                    }

                    resolve(res);
                  })["catch"](function (err) {
                    // reset Object, report error.
                    reject(err);
                  })["finally"](function (res) {
                    loading = false;
                  });
                }));

              case 11:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    },
    infiniteScroll: function infiniteScroll(_ref) {
      var _this3 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {
        var _ref2, _ref2$, isIntersecting, target, ul, scrollTop;

        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                _ref2 = _slicedToArray(_ref, 1), _ref2$ = _ref2[0], isIntersecting = _ref2$.isIntersecting, target = _ref2$.target;

                if (!isIntersecting) {
                  _context3.next = 7;
                  break;
                }

                ul = target.offsetParent;
                scrollTop = target.offsetParent.scrollTop;
                _context3.next = 6;
                return _this3.fetchResults(null, true, true);

              case 6:
                ul.scrollTop = scrollTop;

              case 7:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3);
      }))();
    }
  },
  computed: {
    hasNextPage: function hasNextPage() {
      var vm = this;
      return vm.paginatedObject.current_page && vm.paginatedObject.next_page_url || !vm.paginatedObject.data.length && !vm.paginatedObject.current_page;
    }
  },
  watch: {}
});

/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/InfiniteSelect.vue?vue&type=style&index=0&lang=scss&":
/*!************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/sass-loader/dist/cjs.js??ref--6-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/InfiniteSelect.vue?vue&type=style&index=0&lang=scss& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, ".v-select {\n  position: relative;\n  font-family: inherit;\n}\n.v-select,\n.v-select * {\n  box-sizing: border-box;\n}\n\n/* KeyFrames */\n@-webkit-keyframes vSelectSpinner {\n0% {\n    transform: rotate(0deg);\n}\n100% {\n    transform: rotate(360deg);\n}\n}\n@keyframes vSelectSpinner {\n0% {\n    transform: rotate(0deg);\n}\n100% {\n    transform: rotate(360deg);\n}\n}\n/* Dropdown Default Transition */\n.vs__fade-enter-active,\n.vs__fade-leave-active {\n  pointer-events: none;\n  transition: opacity 0.15s cubic-bezier(1, 0.5, 0.8, 1);\n}\n.vs__fade-enter,\n.vs__fade-leave-to {\n  opacity: 0;\n}\n\n/** Component States */\n/*\n * Disabled\n *\n * When the component is disabled, all interaction\n * should be prevented. Here we modify the bg color,\n * and change the cursor displayed on the interactive\n * components.\n */\n.vs--disabled .vs__dropdown-toggle,\n.vs--disabled .vs__clear,\n.vs--disabled .vs__search,\n.vs--disabled .vs__selected,\n.vs--disabled .vs__open-indicator {\n  cursor: not-allowed;\n  background-color: #f8f8f8;\n}\n\n/*\n *  RTL - Right to Left Support\n *\n *  Because we're using a flexbox layout, the `dir=\"rtl\"`\n *  HTML attribute does most of the work for us by\n *  rearranging the child elements visually.\n */\n.v-select[dir=rtl] .vs__actions {\n  padding: 0 3px 0 6px;\n}\n.v-select[dir=rtl] .vs__clear {\n  margin-left: 6px;\n  margin-right: 0;\n}\n.v-select[dir=rtl] .vs__deselect {\n  margin-left: 0;\n  margin-right: 2px;\n}\n.v-select[dir=rtl] .vs__dropdown-menu {\n  text-align: right;\n}\n\n/**\n    Dropdown Toggle\n\n    The dropdown toggle is the primary wrapper of the component. It\n    has two direct descendants: .vs__selected-options, and .vs__actions.\n\n    .vs__selected-options holds the .vs__selected's as well as the\n    main search input.\n\n    .vs__actions holds the clear button and dropdown toggle.\n */\n.vs__dropdown-toggle {\n  appearance: none;\n  display: flex;\n  padding: 0 0 4px 0;\n  background: none;\n  border: 1px solid rgba(60, 60, 60, 0.26);\n  border-radius: 4px;\n  white-space: normal;\n}\n.vs__selected-options {\n  display: flex;\n  flex-basis: 100%;\n  flex-grow: 1;\n  flex-wrap: wrap;\n  padding: 0 2px;\n  position: relative;\n}\n.vs__actions {\n  display: flex;\n  align-items: center;\n  padding: 4px 6px 0 3px;\n}\n\n/* Dropdown Toggle States */\n.vs--searchable .vs__dropdown-toggle {\n  cursor: text;\n}\n.vs--unsearchable .vs__dropdown-toggle {\n  cursor: pointer;\n}\n.vs--open .vs__dropdown-toggle {\n  border-bottom-color: transparent;\n  border-bottom-left-radius: 0;\n  border-bottom-right-radius: 0;\n}\n.vs__open-indicator {\n  fill: rgba(60, 60, 60, 0.5);\n  transform: scale(1);\n  transition: transform 150ms cubic-bezier(1, -0.115, 0.975, 0.855);\n  transition-timing-function: cubic-bezier(1, -0.115, 0.975, 0.855);\n}\n.vs--open .vs__open-indicator {\n  transform: rotate(180deg) scale(1);\n}\n.vs--loading .vs__open-indicator {\n  opacity: 0;\n}\n\n/* Clear Button */\n.vs__clear {\n  fill: rgba(60, 60, 60, 0.5);\n  padding: 0;\n  border: 0;\n  background-color: transparent;\n  cursor: pointer;\n  margin-right: 8px;\n}\n\n/* Dropdown Menu */\n.vs__dropdown-menu {\n  display: block;\n  box-sizing: border-box;\n  position: absolute;\n  top: calc(100% - 1px);\n  left: 0;\n  z-index: 1000;\n  padding: 5px 0;\n  margin: 0;\n  width: 100%;\n  max-height: 350px;\n  min-width: 160px;\n  overflow-y: auto;\n  box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.15);\n  border: 1px solid rgba(60, 60, 60, 0.26);\n  border-top-style: none;\n  border-radius: 0 0 4px 4px;\n  text-align: left;\n  list-style: none;\n  background: #fff;\n}\n.vs__no-options {\n  text-align: center;\n}\n\n/* List Items */\n.vs__dropdown-option {\n  line-height: 1.42857143;\n  /* Normalize line height */\n  display: block;\n  padding: 3px 20px;\n  clear: both;\n  color: #333;\n  /* Overrides most CSS frameworks */\n  white-space: nowrap;\n}\n.vs__dropdown-option:hover {\n  cursor: pointer;\n}\n.vs__dropdown-option--highlight {\n  background: #5897fb;\n  color: #fff;\n}\n.vs__dropdown-option--disabled {\n  background: inherit;\n  color: rgba(60, 60, 60, 0.5);\n}\n.vs__dropdown-option--disabled:hover {\n  cursor: inherit;\n}\n\n/* Selected Tags */\n.vs__selected {\n  display: flex;\n  align-items: center;\n  background-color: #f0f0f0;\n  border: 1px solid rgba(60, 60, 60, 0.26);\n  border-radius: 4px;\n  color: #333;\n  line-height: 1.4;\n  margin: 4px 2px 0px 2px;\n  padding: 0 0.25em;\n  z-index: 0;\n}\n.vs__deselect {\n  display: inline-flex;\n  appearance: none;\n  margin-left: 4px;\n  padding: 0;\n  border: 0;\n  cursor: pointer;\n  background: none;\n  fill: rgba(60, 60, 60, 0.5);\n  text-shadow: 0 1px 0 #fff;\n}\n\n/* States */\n.vs--single .vs__selected {\n  background-color: transparent;\n  border-color: transparent;\n}\n.vs--single.vs--open .vs__selected {\n  position: absolute;\n  opacity: 0.4;\n}\n.vs--single.vs--searching .vs__selected {\n  display: none;\n}\n\n/* Search Input */\n/**\n * Super weird bug... If this declaration is grouped\n * below, the cancel button will still appear in chrome.\n * If it's up here on it's own, it'll hide it.\n */\n.vs__search::-webkit-search-cancel-button {\n  display: none;\n}\n.vs__search::-webkit-search-decoration,\n.vs__search::-webkit-search-results-button,\n.vs__search::-webkit-search-results-decoration,\n.vs__search::-ms-clear {\n  display: none;\n}\n.vs__search,\n.vs__search:focus {\n  appearance: none;\n  line-height: 1.4;\n  font-size: 1em;\n  border: 1px solid transparent;\n  border-left: none;\n  outline: none;\n  margin: 4px 0 0 0;\n  padding: 0 7px;\n  background: none;\n  box-shadow: none;\n  width: 0;\n  max-width: 100%;\n  flex-grow: 1;\n  z-index: 1;\n}\n.vs__search::placeholder {\n  color: inherit;\n}\n\n/**\n    States\n */\n.vs--unsearchable .vs__search {\n  opacity: 1;\n}\n.vs--unsearchable:not(.vs--disabled) .vs__search:hover {\n  cursor: pointer;\n}\n.vs--single.vs--searching:not(.vs--open):not(.vs--loading) .vs__search {\n  opacity: 0.2;\n}\n\n/* Loading Spinner */\n.vs__spinner {\n  align-self: center;\n  opacity: 0;\n  font-size: 5px;\n  text-indent: -9999em;\n  overflow: hidden;\n  border-top: 0.9em solid rgba(100, 100, 100, 0.1);\n  border-right: 0.9em solid rgba(100, 100, 100, 0.1);\n  border-bottom: 0.9em solid rgba(100, 100, 100, 0.1);\n  border-left: 0.9em solid rgba(60, 60, 60, 0.45);\n  transform: translateZ(0);\n  animation: vSelectSpinner 1.1s infinite linear;\n  transition: opacity 0.1s;\n}\n.vs__spinner,\n.vs__spinner:after {\n  border-radius: 50%;\n  width: 5em;\n  height: 5em;\n}\n\n/* Loading Spinner States */\n.vs--loading .vs__spinner {\n  opacity: 1;\n}\n.loader {\n  text-align: center;\n  color: #bbbbbb;\n}\n.vs__dropdown-toggle {\n  border: none !important;\n}", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/InfiniteSelect.vue?vue&type=style&index=0&lang=scss&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/sass-loader/dist/cjs.js??ref--6-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/InfiniteSelect.vue?vue&type=style&index=0&lang=scss& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../node_modules/css-loader!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--6-2!../../../node_modules/sass-loader/dist/cjs.js??ref--6-3!../../../node_modules/vue-loader/lib??vue-loader-options!./InfiniteSelect.vue?vue&type=style&index=0&lang=scss& */ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/InfiniteSelect.vue?vue&type=style&index=0&lang=scss&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/InfiniteSelect.vue?vue&type=template&id=5a727f5b&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/InfiniteSelect.vue?vue&type=template&id=5a727f5b& ***!
  \*****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("v-select", {
    staticClass: "form-control p-0",
    staticStyle: { "padding-right": "20px!important" },
    attrs: {
      value: _vm.value,
      multiple: _vm.multiple,
      options: _vm.paginatedObject.data,
      filterable: false,
      "clear-on-select": true,
      label: _vm.label
    },
    on: {
      input: _vm.onSelect,
      open: _vm.onOpen,
      close: _vm.onClose,
      search: _vm.fetchResults
    },
    scopedSlots: _vm._u(
      [
        {
          key: "search",
          fn: function(ref) {
            var attributes = ref.attributes
            var events = ref.events
            return [
              _c(
                "input",
                _vm._g(
                  _vm._b(
                    {
                      staticClass: "vs__search my-1",
                      staticStyle: { "border-right": "none !important" }
                    },
                    "input",
                    attributes,
                    false
                  ),
                  events
                )
              )
            ]
          }
        },
        _vm.hasNextPage
          ? {
              key: "list-footer",
              fn: function() {
                return [
                  _c(
                    "li",
                    { ref: "infiniteSelectLoad", staticClass: "loader" },
                    [_vm._v("\n            Loading more options...\n        ")]
                  )
                ]
              },
              proxy: true
            }
          : null
      ],
      null,
      true
    )
  })
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/BackendModule.js":
/*!**************************************************!*\
  !*** ./resources/js/components/BackendModule.js ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _mixins_DateUtils__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../mixins/DateUtils */ "./resources/js/mixins/DateUtils.js");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }


/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_mixins_DateUtils__WEBPACK_IMPORTED_MODULE_1__["default"]],
  data: function data() {
    return {
      form: {},
      model: {}
    };
  },
  props: {
    "tableId": {
      required: true,
      type: String,
      "default": 'dt'
    },
    "appUrl": {
      required: true,
      type: String
    },
    "apiRoute": {
      required: true,
      type: String
    },
    "formDialogRef": {
      required: true,
      type: String,
      "default": "formDialog"
    },
    "detailsDialogRef": {
      required: true,
      type: String,
      "default": "detailsDialog"
    }
  },
  mounted: function mounted() {
    var vm = this;
    vm.form = vm.model;
    vm.form.api_route = vm.apiRoute;
    axios.defaults.baseURL = this.appUrl;
  },
  methods: {
    validateState: function validateState(ref) {
      if (this.fields[ref] && (this.fields[ref].dirty || this.fields[ref].validated)) {
        return !this.errors.has(ref);
      }

      return null;
    },
    // Reset form
    resetForm: function resetForm() {
      var _this = this;

      this.form = _objectSpread(_objectSpread({}, this.model), {}, {
        api_route: this.apiRoute
      });
      this.$nextTick(function () {
        _this.$validator.reset();
      });
    },

    /**
     * Show create or edit form
     * @param e
     */
    showFormDialog: function showFormDialog(e) {
      var vm = this;

      if (!e) {
        vm.resetForm();
        vm.$nextTick(function () {
          vm.$refs[vm.formDialogRef].show();
        });
      } else {
        vm.fetchModel(e.id).then(function (res) {
          vm.$refs[vm.formDialogRef].show();
        })["catch"](function (err) {
          var _err$response, _err$response$data;

          vm.$snotify.error(((_err$response = err.response) === null || _err$response === void 0 ? void 0 : (_err$response$data = _err$response.data) === null || _err$response$data === void 0 ? void 0 : _err$response$data.message) || err.message || err);
        });
      }
    },

    /**
     * Either create or update the model using the same form
     * @param e
     * @returns {Promise<unknown>}
     */
    onFormSubmit: function onFormSubmit(e) {
      var vm = this;
      var method = "post";
      var url = vm.form.api_route;

      if (vm.form.id) {
        method = "put";
        url = "".concat(vm.form.api_route, "/").concat(vm.form.id);
      }

      vm.submitForm(e, url, method).then(function (res) {
        vm.$refs[vm.formDialogRef].hide();
      });
    },

    /**
     *
     * @param e
     * @param url
     * @param method | post, put or delete
     * @returns {Promise<unknown>}
     */
    submitForm: function submitForm(e, url) {
      var _arguments = arguments,
          _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var method, vm;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                method = _arguments.length > 2 && _arguments[2] !== undefined ? _arguments[2] : 'post';
                vm = _this2;
                return _context.abrupt("return", new Promise(function (resolve, reject) {
                  vm.$validator.validateAll().then(function (valid) {
                    if (!valid) {
                      reject("The form contains invalid fields");
                      return;
                    }

                    axios.request({
                      method: method,
                      url: url,
                      data: vm.form
                    }).then(function (res) {
                      vm.$snotify.success(res.data.message);
                      vm.issueGlobalDtUpdateEvent(vm.tableId);
                      resolve(res.data);
                    })["catch"](function (err) {
                      var _err$response2, _err$response3, _err$response3$data;

                      vm.$setErrorsFromResponse((_err$response2 = err.response) === null || _err$response2 === void 0 ? void 0 : _err$response2.data);
                      vm.$snotify.error(((_err$response3 = err.response) === null || _err$response3 === void 0 ? void 0 : (_err$response3$data = _err$response3.data) === null || _err$response3$data === void 0 ? void 0 : _err$response3$data.message) || err.message || err);
                      reject(err);
                    });
                  });
                }));

              case 3:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    showDetailsDialog: function showDetailsDialog(e) {
      var vm = this;
      vm.fetchModel(e.id).then(function (res) {
        vm.$refs[vm.detailsDialogRef].show();
      })["catch"](function (err) {
        vm.$snotify.error(err.message || err);
      });
    },
    fetchModel: function fetchModel(id) {
      var _this3 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var vm;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                vm = _this3;
                return _context2.abrupt("return", new Promise(function (resolve, reject) {
                  axios.get("".concat(vm.form.api_route, "/").concat(id)).then(function (res) {
                    vm.form = _objectSpread({}, res.data.payload);
                    resolve(res.data);
                  })["catch"](function (err) {
                    reject(err);
                  });
                }));

              case 2:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    },
    issueGlobalDtUpdateEvent: function issueGlobalDtUpdateEvent(tableId) {
      this.$root.$emit("refresh-dt", {
        tableId: tableId
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/components/InfiniteSelect.vue":
/*!****************************************************!*\
  !*** ./resources/js/components/InfiniteSelect.vue ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _InfiniteSelect_vue_vue_type_template_id_5a727f5b___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./InfiniteSelect.vue?vue&type=template&id=5a727f5b& */ "./resources/js/components/InfiniteSelect.vue?vue&type=template&id=5a727f5b&");
/* harmony import */ var _InfiniteSelect_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./InfiniteSelect.vue?vue&type=script&lang=js& */ "./resources/js/components/InfiniteSelect.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _InfiniteSelect_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./InfiniteSelect.vue?vue&type=style&index=0&lang=scss& */ "./resources/js/components/InfiniteSelect.vue?vue&type=style&index=0&lang=scss&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _InfiniteSelect_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _InfiniteSelect_vue_vue_type_template_id_5a727f5b___WEBPACK_IMPORTED_MODULE_0__["render"],
  _InfiniteSelect_vue_vue_type_template_id_5a727f5b___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/InfiniteSelect.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/InfiniteSelect.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/InfiniteSelect.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteSelect_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./InfiniteSelect.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/InfiniteSelect.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteSelect_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/InfiniteSelect.vue?vue&type=style&index=0&lang=scss&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/InfiniteSelect.vue?vue&type=style&index=0&lang=scss& ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteSelect_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader!../../../node_modules/css-loader!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--6-2!../../../node_modules/sass-loader/dist/cjs.js??ref--6-3!../../../node_modules/vue-loader/lib??vue-loader-options!./InfiniteSelect.vue?vue&type=style&index=0&lang=scss& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/InfiniteSelect.vue?vue&type=style&index=0&lang=scss&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteSelect_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteSelect_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteSelect_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteSelect_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteSelect_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/InfiniteSelect.vue?vue&type=template&id=5a727f5b&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/InfiniteSelect.vue?vue&type=template&id=5a727f5b& ***!
  \***********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteSelect_vue_vue_type_template_id_5a727f5b___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./InfiniteSelect.vue?vue&type=template&id=5a727f5b& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/InfiniteSelect.vue?vue&type=template&id=5a727f5b&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteSelect_vue_vue_type_template_id_5a727f5b___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteSelect_vue_vue_type_template_id_5a727f5b___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/mixins/DateUtils.js":
/*!******************************************!*\
  !*** ./resources/js/mixins/DateUtils.js ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      dateConfig: {
        format: 'YYYY-MM-DD'
      },
      dateTimeConfig: {
        format: 'YYYY-MM-DD HH:mm:ss'
      },
      timeConfig: {
        format: 'HH:mm:ss'
      }
    };
  }
});

/***/ })

}]);