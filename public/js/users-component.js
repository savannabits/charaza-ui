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
/* harmony import */ var _components_InfiniteSelect__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components/InfiniteSelect */ "./resources/js/components/InfiniteSelect.vue");


/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_components_BackendModule__WEBPACK_IMPORTED_MODULE_0__["default"]],
  components: {
    InfiniteSelect: _components_InfiniteSelect__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: function data() {
    return {
      model: {
        name: null,
        first_name: null,
        last_name: null,
        middle_name: null,
        username: null,
        email: null,
        password: null,
        password_confirmation: null,
        email_verified_at: null
      }
    };
  }
});

/***/ })

}]);