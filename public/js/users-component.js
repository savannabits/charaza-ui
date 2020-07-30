(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["js/users-component"],{

/***/ "./resources/js/backend/users.js":
/*!***************************************!*\
  !*** ./resources/js/backend/users.js ***!
  \***************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_BackendModule__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../components/BackendModule */ "./resources/js/components/BackendModule.js");

/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_components_BackendModule__WEBPACK_IMPORTED_MODULE_0__["default"]],
  data: function data() {
    return {
      model: {
        name: null,
        email: null,
        password: null
      }
    };
  }
});

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