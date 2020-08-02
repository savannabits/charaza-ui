(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["js/dt-component"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DtComponent.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/DtComponent.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

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
  name: "DtComponent",
  props: {
    "tableId": {
      required: true,
      type: String
    },
    "tableClasses": {
      required: false,
      "default": ""
    },
    "processing": {
      type: Boolean,
      required: false,
      "default": true
    },
    "serverSide": {
      type: Boolean,
      required: false,
      "default": true
    },
    "columns": {
      required: true,
      type: Array
    },
    "columnDefs": {
      required: false,
      type: Array,
      "default": function _default() {
        return [];
      }
    },
    "actionButtons": {
      required: false,
      type: Array,
      "default": function _default() {
        return [];
      }
    },
    "ajaxUrl": {
      required: true,
      type: String
    }
  },
  data: function data() {
    return {
      item_id: null,
      table: null
    };
  },
  mounted: function mounted() {
    var vm = this;
    var columns = [].concat(_toConsumableArray(vm.columns), [{
      data: "Actions",
      searchable: false,
      className: 'text-right',
      render: function render(data, type, row) {
        return vm.makeActionColumn(row);
      }
    }]);
    $(document).ready(function () {
      vm.table = $("#".concat(vm.tableId)).DataTable({
        processing: true,
        serverSide: true,
        stateSave: true,
        ajax: vm.ajaxUrl,
        columns: columns,
        columnDefs: vm.columnDefs
      });
      vm.table.on('click', '.action-button', function (e) {
        var ev = $(this);

        if (ev.data('tag') === 'button') {
          vm.$emit("".concat(ev.data('action')), {
            id: ev.data('id')
          });
          vm.$root.$emit("".concat(ev.data('action')), {
            id: ev.data('id')
          });
        }
      });
    });
    vm.$root.$on("refresh-dt", function (e) {
      if (e.tableId === vm.tableId) {
        //Refresh Table here
        if (vm.table) {
          vm.table.ajax.reload(null, false);
        }
      }
    });
  },
  methods: {
    emitActionEvent: function emitActionEvent(e) {
      console.log("We are emitting an event now");
    },
    makeActionColumn: function makeActionColumn(payload) {
      var vm = this;
      var actions = "";
      vm.actionButtons.forEach(function (actionButton, key) {
        actions = "\n                ".concat(actions, "\n                <").concat(actionButton.tag, " class=\"action-button ").concat(actionButton.classes, "\"\n                    href=\"").concat(actionButton.href, "\"\n                    @click=\"emitActionEvent\"\n                    data-action=\"").concat(actionButton.event, "\"\n                    data-url=\"").concat(actionButton.url, "\"\n                    data-id=\"").concat(payload.id, "\"\n                    data-tag=\"").concat(actionButton.tag, "\"\n                ><i v-if=\"").concat(actionButton.icon, "\" class=\"").concat(actionButton.icon, "\"></i> ").concat(actionButton.title, "\n                </").concat(actionButton.tag, ">\n                ");
      });
      return actions;
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DtComponent.vue?vue&type=template&id=1bb5429c&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/DtComponent.vue?vue&type=template&id=1bb5429c& ***!
  \**************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "table-responsive" }, [
    _c(
      "table",
      {
        staticClass: "table table-hover",
        class: _vm.tableClasses,
        staticStyle: { width: "100%" },
        attrs: { id: _vm.tableId }
      },
      [
        _c("thead", [
          _c(
            "tr",
            [
              _vm._l(_vm.columns, function(column) {
                return _c("th", { key: column.data }, [
                  _vm._v(_vm._s(column.title || column.data))
                ])
              }),
              _vm._v(" "),
              _c("th", [_vm._v("Actions")])
            ],
            2
          )
        ])
      ]
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/components/DtComponent.vue":
/*!*************************************************!*\
  !*** ./resources/js/components/DtComponent.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _DtComponent_vue_vue_type_template_id_1bb5429c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./DtComponent.vue?vue&type=template&id=1bb5429c& */ "./resources/js/components/DtComponent.vue?vue&type=template&id=1bb5429c&");
/* harmony import */ var _DtComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DtComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/DtComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _DtComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _DtComponent_vue_vue_type_template_id_1bb5429c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _DtComponent_vue_vue_type_template_id_1bb5429c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/DtComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/DtComponent.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/DtComponent.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DtComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./DtComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DtComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DtComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/DtComponent.vue?vue&type=template&id=1bb5429c&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/DtComponent.vue?vue&type=template&id=1bb5429c& ***!
  \********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DtComponent_vue_vue_type_template_id_1bb5429c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./DtComponent.vue?vue&type=template&id=1bb5429c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DtComponent.vue?vue&type=template&id=1bb5429c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DtComponent_vue_vue_type_template_id_1bb5429c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DtComponent_vue_vue_type_template_id_1bb5429c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);