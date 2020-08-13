(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["js/roles-component"],{

/***/ "./resources/js/backend/roles.js":
/*!***************************************!*\
  !*** ./resources/js/backend/roles.js ***!
  \***************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components_BackendModule__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components/BackendModule */ "./resources/js/components/BackendModule.js");
/* harmony import */ var _components_InfiniteSelect__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../components/InfiniteSelect */ "./resources/js/components/InfiniteSelect.vue");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }



/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_components_BackendModule__WEBPACK_IMPORTED_MODULE_1__["default"]],
  components: {
    InfiniteSelect: _components_InfiniteSelect__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  data: function data() {
    return {
      model: {
        display_name: null,
        guard_name: null,
        enabled: false
      }
    };
  },
  methods: {
    fetchRoleWithPermissions: function fetchRoleWithPermissions(role) {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                console.log(role);
                return _context.abrupt("return", _this.fetchModel(role.id, {
                  'with-perms': true
                }));

              case 2:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    togglePermission: function togglePermission(assign, perm, roleId) {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var vm;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                console.log(assign);
                vm = _this2;
                return _context2.abrupt("return", new Promise(function (resolve, reject) {
                  axios.post("".concat(vm.form.api_route, "/").concat(roleId, "/toggle-permission"), {
                    permission_id: perm.id,
                    assigned: assign
                  }).then(function (res) {//Success
                  })["catch"](function (err) {
                    // Revert back
                    perm.assigned = !perm.assigned;
                  });
                }));

              case 3:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    }
  }
});

/***/ })

}]);