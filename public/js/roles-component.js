(window.webpackJsonp=window.webpackJsonp||[]).push([[7],{84:function(n,e,t){"use strict";t.r(e);var r=t(95),o=t.n(r),i=t(99),a=t(98);function s(n,e,t,r,o,i,a){try{var s=n[i](a),c=s.value}catch(n){return void t(n)}s.done?e(c):Promise.resolve(c).then(r,o)}function c(n){return function(){var e=this,t=arguments;return new Promise((function(r,o){var i=n.apply(e,t);function a(n){s(i,r,o,a,c,"next",n)}function c(n){s(i,r,o,a,c,"throw",n)}a(void 0)}))}}e.default={mixins:[i.a],components:{InfiniteSelect:a.a},data:function(){return{model:{display_name:null,guard_name:null,enabled:!1}}},methods:{fetchRoleWithPermissions:function(n){var e=this;return c(o.a.mark((function t(){return o.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return console.log(n),t.abrupt("return",e.fetchModel(n.id,{"with-perms":!0}));case 2:case"end":return t.stop()}}),t)})))()},togglePermission:function(n,e,t){var r=this;return c(o.a.mark((function i(){var a;return o.a.wrap((function(o){for(;;)switch(o.prev=o.next){case 0:return console.log(n),a=r,o.abrupt("return",new Promise((function(r,o){axios.post("".concat(a.form.api_route,"/").concat(t,"/toggle-permission"),{permission_id:e.id,assigned:n}).then((function(n){})).catch((function(n){e.assigned=!e.assigned}))})));case 3:case"end":return o.stop()}}),i)})))()}}}},94:function(n,e,t){var r=t(97);"string"==typeof r&&(r=[[n.i,r,""]]);var o={hmr:!0,transform:void 0,insertInto:void 0};t(52)(r,o);r.locals&&(n.exports=r.locals)},96:function(n,e,t){"use strict";var r=t(94);t.n(r).a},97:function(n,e,t){(n.exports=t(51)(!1)).push([n.i,".v-select {\n  position: relative;\n  font-family: inherit;\n}\n.v-select,\n.v-select * {\n  box-sizing: border-box;\n}\n\n/* KeyFrames */\n@-webkit-keyframes vSelectSpinner {\n0% {\n    transform: rotate(0deg);\n}\n100% {\n    transform: rotate(360deg);\n}\n}\n@keyframes vSelectSpinner {\n0% {\n    transform: rotate(0deg);\n}\n100% {\n    transform: rotate(360deg);\n}\n}\n/* Dropdown Default Transition */\n.vs__fade-enter-active,\n.vs__fade-leave-active {\n  pointer-events: none;\n  transition: opacity 0.15s cubic-bezier(1, 0.5, 0.8, 1);\n}\n.vs__fade-enter,\n.vs__fade-leave-to {\n  opacity: 0;\n}\n\n/** Component States */\n/*\n * Disabled\n *\n * When the component is disabled, all interaction\n * should be prevented. Here we modify the bg color,\n * and change the cursor displayed on the interactive\n * components.\n */\n.vs--disabled .vs__dropdown-toggle,\n.vs--disabled .vs__clear,\n.vs--disabled .vs__search,\n.vs--disabled .vs__selected,\n.vs--disabled .vs__open-indicator {\n  cursor: not-allowed;\n  background-color: #f8f8f8;\n}\n\n/*\n *  RTL - Right to Left Support\n *\n *  Because we're using a flexbox layout, the `dir=\"rtl\"`\n *  HTML attribute does most of the work for us by\n *  rearranging the child elements visually.\n */\n.v-select[dir=rtl] .vs__actions {\n  padding: 0 3px 0 6px;\n}\n.v-select[dir=rtl] .vs__clear {\n  margin-left: 6px;\n  margin-right: 0;\n}\n.v-select[dir=rtl] .vs__deselect {\n  margin-left: 0;\n  margin-right: 2px;\n}\n.v-select[dir=rtl] .vs__dropdown-menu {\n  text-align: right;\n}\n\n/**\n    Dropdown Toggle\n\n    The dropdown toggle is the primary wrapper of the component. It\n    has two direct descendants: .vs__selected-options, and .vs__actions.\n\n    .vs__selected-options holds the .vs__selected's as well as the\n    main search input.\n\n    .vs__actions holds the clear button and dropdown toggle.\n */\n.vs__dropdown-toggle {\n  appearance: none;\n  display: flex;\n  padding: 0 0 4px 0;\n  background: none;\n  border: 1px solid rgba(60, 60, 60, 0.26);\n  border-radius: 4px;\n  white-space: normal;\n}\n.vs__selected-options {\n  display: flex;\n  flex-basis: 100%;\n  flex-grow: 1;\n  flex-wrap: wrap;\n  padding: 0 2px;\n  position: relative;\n}\n.vs__actions {\n  display: flex;\n  align-items: center;\n  padding: 4px 6px 0 3px;\n}\n\n/* Dropdown Toggle States */\n.vs--searchable .vs__dropdown-toggle {\n  cursor: text;\n}\n.vs--unsearchable .vs__dropdown-toggle {\n  cursor: pointer;\n}\n.vs--open .vs__dropdown-toggle {\n  border-bottom-color: transparent;\n  border-bottom-left-radius: 0;\n  border-bottom-right-radius: 0;\n}\n.vs__open-indicator {\n  fill: rgba(60, 60, 60, 0.5);\n  transform: scale(1);\n  transition: transform 150ms cubic-bezier(1, -0.115, 0.975, 0.855);\n  transition-timing-function: cubic-bezier(1, -0.115, 0.975, 0.855);\n}\n.vs--open .vs__open-indicator {\n  transform: rotate(180deg) scale(1);\n}\n.vs--loading .vs__open-indicator {\n  opacity: 0;\n}\n\n/* Clear Button */\n.vs__clear {\n  fill: rgba(60, 60, 60, 0.5);\n  padding: 0;\n  border: 0;\n  background-color: transparent;\n  cursor: pointer;\n  margin-right: 8px;\n}\n\n/* Dropdown Menu */\n.vs__dropdown-menu {\n  display: block;\n  box-sizing: border-box;\n  position: absolute;\n  top: calc(100% - 1px);\n  left: 0;\n  z-index: 1000;\n  padding: 5px 0;\n  margin: 0;\n  width: 100%;\n  max-height: 350px;\n  min-width: 160px;\n  overflow-y: auto;\n  box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.15);\n  border: 1px solid rgba(60, 60, 60, 0.26);\n  border-top-style: none;\n  border-radius: 0 0 4px 4px;\n  text-align: left;\n  list-style: none;\n  background: #fff;\n}\n.vs__no-options {\n  text-align: center;\n}\n\n/* List Items */\n.vs__dropdown-option {\n  line-height: 1.42857143;\n  /* Normalize line height */\n  display: block;\n  padding: 3px 20px;\n  clear: both;\n  color: #333;\n  /* Overrides most CSS frameworks */\n  white-space: nowrap;\n}\n.vs__dropdown-option:hover {\n  cursor: pointer;\n}\n.vs__dropdown-option--highlight {\n  background: #5897fb;\n  color: #fff;\n}\n.vs__dropdown-option--disabled {\n  background: inherit;\n  color: rgba(60, 60, 60, 0.5);\n}\n.vs__dropdown-option--disabled:hover {\n  cursor: inherit;\n}\n\n/* Selected Tags */\n.vs__selected {\n  display: flex;\n  align-items: center;\n  background-color: #f0f0f0;\n  border: 1px solid rgba(60, 60, 60, 0.26);\n  border-radius: 4px;\n  color: #333;\n  line-height: 1.4;\n  margin: 4px 2px 0px 2px;\n  padding: 0 0.25em;\n  z-index: 0;\n}\n.vs__deselect {\n  display: inline-flex;\n  appearance: none;\n  margin-left: 4px;\n  padding: 0;\n  border: 0;\n  cursor: pointer;\n  background: none;\n  fill: rgba(60, 60, 60, 0.5);\n  text-shadow: 0 1px 0 #fff;\n}\n\n/* States */\n.vs--single .vs__selected {\n  background-color: transparent;\n  border-color: transparent;\n}\n.vs--single.vs--open .vs__selected {\n  position: absolute;\n  opacity: 0.4;\n}\n.vs--single.vs--searching .vs__selected {\n  display: none;\n}\n\n/* Search Input */\n/**\n * Super weird bug... If this declaration is grouped\n * below, the cancel button will still appear in chrome.\n * If it's up here on it's own, it'll hide it.\n */\n.vs__search::-webkit-search-cancel-button {\n  display: none;\n}\n.vs__search::-webkit-search-decoration,\n.vs__search::-webkit-search-results-button,\n.vs__search::-webkit-search-results-decoration,\n.vs__search::-ms-clear {\n  display: none;\n}\n.vs__search,\n.vs__search:focus {\n  appearance: none;\n  line-height: 1.4;\n  font-size: 1em;\n  border: 1px solid transparent;\n  border-left: none;\n  outline: none;\n  margin: 4px 0 0 0;\n  padding: 0 7px;\n  background: none;\n  box-shadow: none;\n  width: 0;\n  max-width: 100%;\n  flex-grow: 1;\n  z-index: 1;\n}\n.vs__search::placeholder {\n  color: inherit;\n}\n\n/**\n    States\n */\n.vs--unsearchable .vs__search {\n  opacity: 1;\n}\n.vs--unsearchable:not(.vs--disabled) .vs__search:hover {\n  cursor: pointer;\n}\n.vs--single.vs--searching:not(.vs--open):not(.vs--loading) .vs__search {\n  opacity: 0.2;\n}\n\n/* Loading Spinner */\n.vs__spinner {\n  align-self: center;\n  opacity: 0;\n  font-size: 5px;\n  text-indent: -9999em;\n  overflow: hidden;\n  border-top: 0.9em solid rgba(100, 100, 100, 0.1);\n  border-right: 0.9em solid rgba(100, 100, 100, 0.1);\n  border-bottom: 0.9em solid rgba(100, 100, 100, 0.1);\n  border-left: 0.9em solid rgba(60, 60, 60, 0.45);\n  transform: translateZ(0);\n  animation: vSelectSpinner 1.1s infinite linear;\n  transition: opacity 0.1s;\n}\n.vs__spinner,\n.vs__spinner:after {\n  border-radius: 50%;\n  width: 5em;\n  height: 5em;\n}\n\n/* Loading Spinner States */\n.vs--loading .vs__spinner {\n  opacity: 1;\n}\n.loader {\n  text-align: center;\n  color: #bbbbbb;\n}\n.vs__dropdown-toggle {\n  border: none !important;\n}",""])},98:function(n,e,t){"use strict";var r=t(95),o=t.n(r),i=t(101);function a(n,e){return function(n){if(Array.isArray(n))return n}(n)||function(n,e){if("undefined"==typeof Symbol||!(Symbol.iterator in Object(n)))return;var t=[],r=!0,o=!1,i=void 0;try{for(var a,s=n[Symbol.iterator]();!(r=(a=s.next()).done)&&(t.push(a.value),!e||t.length!==e);r=!0);}catch(n){o=!0,i=n}finally{try{r||null==s.return||s.return()}finally{if(o)throw i}}return t}(n,e)||c(n,e)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function s(n){return function(n){if(Array.isArray(n))return l(n)}(n)||function(n){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(n))return Array.from(n)}(n)||c(n)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function c(n,e){if(n){if("string"==typeof n)return l(n,e);var t=Object.prototype.toString.call(n).slice(8,-1);return"Object"===t&&n.constructor&&(t=n.constructor.name),"Map"===t||"Set"===t?Array.from(n):"Arguments"===t||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t)?l(n,e):void 0}}function l(n,e){(null==e||e>n.length)&&(e=n.length);for(var t=0,r=new Array(e);t<e;t++)r[t]=n[t];return r}function d(n,e,t,r,o,i,a){try{var s=n[i](a),c=s.value}catch(n){return void t(n)}s.done?e(c):Promise.resolve(c).then(r,o)}function u(n){return function(){var e=this,t=arguments;return new Promise((function(r,o){var i=n.apply(e,t);function a(n){d(i,r,o,a,s,"next",n)}function s(n){d(i,r,o,a,s,"throw",n)}a(void 0)}))}}var p={name:"InfiniteSelect",components:{"v-select":t.n(i).a},props:{apiUrl:{required:!0,type:String},perPage:{required:!1,default:15},multiple:{type:Boolean,default:!1},value:{default:null},label:{required:!0,type:String}},data:function(){return{observer:null,paginatedObject:{data:[]},searchQuery:null}},mounted:function(){this.paginatedObject.per_page=parseInt(this.perPage)||15,this.selected=this.initValue,this.observer=new IntersectionObserver(this.infiniteScroll)},methods:{onOpen:function(){var n=this;return u(o.a.mark((function e(){return o.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(!n.hasNextPage){e.next=4;break}return e.next=3,n.$nextTick();case 3:n.observer.observe(n.$refs.infiniteSelectLoad);case 4:case"end":return e.stop()}}),e)})))()},onClose:function(){this.observer.disconnect(),this.searchQuery=null},onSelect:function(n){this.$emit("input",n)},fetchResults:function(n,e){var t=arguments,r=this;return u(o.a.mark((function i(){var a,c,l;return o.a.wrap((function(o){for(;;)switch(o.prev=o.next){case 0:if(a=t.length>2&&void 0!==t[2]&&t[2],c=r,n&&(c.searchQuery=n),l={},!c.paginatedObject.current_page||!a){o.next=9;break}if(c.paginatedObject.next_page_url){o.next=7;break}return o.abrupt("return",!1);case 7:l.page=c.paginatedObject.current_page+1,l.per_page=c.paginatedObject.per_page;case 9:return c.searchQuery&&(l.search=c.searchQuery),o.abrupt("return",new Promise((function(n,t){var o=r;e=!0,axios.get(o.apiUrl,{params:l}).then((function(e){var t=o.paginatedObject.data;o.paginatedObject=e.data.payload,a&&(o.paginatedObject.data=[].concat(s(t),s(e.data.payload.data))),n(e)})).catch((function(n){t(n)})).finally((function(n){e=!1}))})));case 11:case"end":return o.stop()}}),i)})))()},infiniteScroll:function(n){var e=this;return u(o.a.mark((function t(){var r,i,s,c,l,d;return o.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:if(r=a(n,1),i=r[0],s=i.isIntersecting,c=i.target,!s){t.next=7;break}return l=c.offsetParent,d=c.offsetParent.scrollTop,t.next=6,e.fetchResults(null,!0,!0);case 6:l.scrollTop=d;case 7:case"end":return t.stop()}}),t)})))()}},computed:{hasNextPage:function(){return this.paginatedObject.current_page&&this.paginatedObject.next_page_url||!this.paginatedObject.data.length&&!this.paginatedObject.current_page}},watch:{}},f=(t(96),t(100)),h=Object(f.a)(p,(function(){var n=this,e=n.$createElement,t=n._self._c||e;return t("v-select",{staticClass:"form-control p-0",staticStyle:{"padding-right":"20px!important"},attrs:{value:n.value,multiple:n.multiple,options:n.paginatedObject.data,filterable:!1,"clear-on-select":!0,label:n.label},on:{input:n.onSelect,open:n.onOpen,close:n.onClose,search:n.fetchResults},scopedSlots:n._u([{key:"search",fn:function(e){var r=e.attributes,o=e.events;return[t("input",n._g(n._b({staticClass:"vs__search my-1",staticStyle:{"border-right":"none !important"}},"input",r,!1),o))]}},n.hasNextPage?{key:"list-footer",fn:function(){return[t("li",{ref:"infiniteSelectLoad",staticClass:"loader"},[n._v("\n            Loading more options...\n        ")])]},proxy:!0}:null],null,!0)})}),[],!1,null,null,null);e.a=h.exports},99:function(n,e,t){"use strict";var r=t(95),o=t.n(r);function i(n,e,t,r,o,i,a){try{var s=n[i](a),c=s.value}catch(n){return void t(n)}s.done?e(c):Promise.resolve(c).then(r,o)}function a(n){return function(){var e=this,t=arguments;return new Promise((function(r,o){var a=n.apply(e,t);function s(n){i(a,r,o,s,c,"next",n)}function c(n){i(a,r,o,s,c,"throw",n)}s(void 0)}))}}function s(n,e){var t=Object.keys(n);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(n);e&&(r=r.filter((function(e){return Object.getOwnPropertyDescriptor(n,e).enumerable}))),t.push.apply(t,r)}return t}function c(n){for(var e=1;e<arguments.length;e++){var t=null!=arguments[e]?arguments[e]:{};e%2?s(Object(t),!0).forEach((function(e){l(n,e,t[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(n,Object.getOwnPropertyDescriptors(t)):s(Object(t)).forEach((function(e){Object.defineProperty(n,e,Object.getOwnPropertyDescriptor(t,e))}))}return n}function l(n,e,t){return e in n?Object.defineProperty(n,e,{value:t,enumerable:!0,configurable:!0,writable:!0}):n[e]=t,n}e.a={mixins:[{data:function(){return{dateConfig:{format:"YYYY-MM-DD"},dateTimeConfig:{format:"YYYY-MM-DD HH:mm:ss"},timeConfig:{format:"HH:mm:ss"}}}}],data:function(){return{form:{},model:{}}},props:{tableId:{required:!0,type:String,default:"dt"},appUrl:{required:!0,type:String},apiRoute:{required:!0,type:String},formDialogRef:{required:!0,type:String,default:"formDialog"},detailsDialogRef:{required:!0,type:String,default:"detailsDialog"},deleteDialogRef:{required:!0,type:String,default:"deleteDialog"}},mounted:function(){this.form=this.model,this.form.api_route=this.apiRoute,axios.defaults.baseURL=this.appUrl},methods:{validateState:function(n){return this.fields[n]&&(this.fields[n].dirty||this.fields[n].validated)?!this.errors.has(n):null},resetForm:function(){var n=this;this.form=c(c({},this.model),{},{api_route:this.apiRoute}),this.$nextTick((function(){n.$validator.reset()}))},showFormDialog:function(n){var e=this;n?e.fetchModel(n.id).then((function(n){e.$refs[e.formDialogRef].show()})).catch((function(n){var t,r;e.$snotify.error((null===(t=n.response)||void 0===t||null===(r=t.data)||void 0===r?void 0:r.message)||n.message||n)})):(e.resetForm(),e.$nextTick((function(){e.$refs[e.formDialogRef].show()})))},onFormSubmit:function(n){var e=this,t="post",r=e.form.api_route;e.form.id&&(t="put",r="".concat(e.form.api_route,"/").concat(e.form.id)),e.submitForm(n,r,t).then((function(n){e.$refs[e.formDialogRef].hide()})).finally((function(n){}))},deleteItem:function(n){var e=this,t="".concat(e.form.api_route,"/").concat(e.form.id);e.submitForm(n,t,"delete").then((function(n){e.$refs[e.deleteDialogRef].hide()}))},submitForm:function(n,e){var t=arguments,r=this;return a(o.a.mark((function n(){var i,a;return o.a.wrap((function(n){for(;;)switch(n.prev=n.next){case 0:return i=t.length>2&&void 0!==t[2]?t[2]:"post",a=r,n.abrupt("return",new Promise((function(n,t){a.$validator.validateAll().then((function(r){r?(a.showLoader(),axios.request({method:i,url:e,data:a.form}).then((function(e){a.$snotify.success(e.data.message),a.issueGlobalDtUpdateEvent(a.tableId),n(e.data)})).catch((function(n){var e,r,o;a.$setErrorsFromResponse(null===(e=n.response)||void 0===e?void 0:e.data),a.$snotify.error((null===(r=n.response)||void 0===r||null===(o=r.data)||void 0===o?void 0:o.message)||n.message||n),t(n)})).finally((function(n){a.hideLoader()}))):t("The form contains invalid fields")}))})));case 3:case"end":return n.stop()}}),n)})))()},showDetailsDialog:function(n){var e=this;e.fetchModel(n.id).then((function(n){e.$refs[e.detailsDialogRef].show()})).catch((function(n){e.$snotify.error(n.message||n)}))},showDeleteDialog:function(n){var e=this;e.fetchModel(n.id).then((function(n){e.$refs[e.deleteDialogRef].show()})).catch((function(n){e.$snotify.error(n.message||n)}))},fetchModel:function(n){var e=arguments,t=this;return a(o.a.mark((function r(){var i,a;return o.a.wrap((function(r){for(;;)switch(r.prev=r.next){case 0:return i=e.length>1&&void 0!==e[1]?e[1]:null,a=t,r.abrupt("return",new Promise((function(e,t){a.showLoader(),axios.get("".concat(a.form.api_route,"/").concat(n),{params:i||{}}).then((function(n){a.form=c({},n.data.payload),e(n.data)})).catch((function(n){t(n)})).finally((function(n){a.hideLoader()}))})));case 3:case"end":return r.stop()}}),r)})))()},issueGlobalDtUpdateEvent:function(n){this.$root.$emit("refresh-dt",{tableId:n})},showLoader:function(){$("#preloader-active").show()},hideLoader:function(){$("#preloader-active").fadeOut("slow")}}}}}]);