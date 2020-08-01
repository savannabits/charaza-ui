//Set Laravel validation errors to vee-validate
Vue.prototype.$setErrorsFromResponse = function(errorResponse) {
    // only allow this function to be run if the validator exists
    if(!this.hasOwnProperty('$validator')) {
        console.log("no validator found")
        return;
    }

    // clear errors
    this.$validator.errors.clear();

    // check if errors exist
    if(!errorResponse.hasOwnProperty('errors')) {
        console.log("response has no errors property")
        return;
    }

    let errorFields = Object.keys(errorResponse.errors);
    // insert laravel errors
    const vm = this;
    errorFields.map(field => {
        let errorString = errorResponse.errors[field].join(', ');
        console.log(errorString);
        vm.$validator.errors.add({field: field, msg: errorString});
    });
};
Vue.component('roles-component', () => import(/*webpackChunkName: 'js/roles-component'*/'./roles'));
Vue.component('users-component', () => import(/*webpackChunkName: 'js/users-component'*/'./users'));
