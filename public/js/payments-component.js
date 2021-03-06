(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["js/payments-component"],{

/***/ "./resources/js/backend/payments.js":
/*!******************************************!*\
  !*** ./resources/js/backend/payments.js ***!
  \******************************************/
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
        paid_amount: null,
        note: null,
        borrower: null,
        loan: null
      }
    };
  }
});

/***/ })

}]);