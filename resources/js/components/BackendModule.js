export default {
    data() {
        return {
            form: {},
            model: {},
        }
    },
    props: {
        "tableId": {
            required: true,
            type: String,
            default: 'dt'
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
            default: "formDialog"
        },
        "detailsDialogRef": {
            required: true,
            type: String,
            default: "detailsDialog"
        }
    },
    mounted() {
        const vm = this;
        vm.form = vm.model;
        vm.form.api_route = vm.apiRoute
        axios.defaults.baseURL = this.appUrl;
    },
    methods: {
        // Reset form
        resetForm() {
            this.form = {
                ...this.model,
                api_route: this.apiRoute
            };
        },
        /**
         * Show create or edit form
         * @param e
         */
        showFormDialog(e) {
            let vm = this;
            if (!e) {
                vm.resetForm();
                vm.$nextTick(function() {
                    vm.$refs[vm.formDialogRef].show();
                })
            } else {
                vm.fetchModel(e.id).then(res => {
                    vm.$refs[vm.formDialogRef].show();
                }).catch(err => {
                    vm.$snotify.error(err.response?.data?.message || err.message || err);
                })
            }
        },
        /**
         * Either create or update the model using the same form
         * @param e
         * @returns {Promise<unknown>}
         */
        onFormSubmit(e) {
            let vm = this;
            let method = "post";
            let url = vm.form.api_route;
            if (vm.form.id) {
                method = "put";
                url = `${vm.form.api_route}/${vm.form.id}`
            }
            vm.submitForm(e,url,method).then(res => {
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
        async submitForm(e, url,method='post') {
            let vm = this;
            return new Promise((resolve, reject) => {
                axios.request({
                    method: method,
                    url: url,
                    data: vm.form,
                }).then(res => {
                    vm.$snotify.success(res.data.message);
                    vm.issueGlobalDtUpdateEvent(vm.tableId);
                    resolve(res.data);
                }).catch(err => {
                    vm.$snotify.error(err.response?.data?.message || err.message || err)
                    reject(err);
                })
            })
        },
        showDetailsDialog(e) {
            let vm = this;
            vm.fetchModel(e.id).then(res => {
                vm.$refs[vm.detailsDialogRef].show();
            }).catch(err => {
                vm.$snotify.error(err.message || err);
            })
        },
        async fetchModel(id) {
            const vm = this;
            return new Promise((resolve, reject) => {
                axios.get(`${vm.form.api_route}/${id}`).then(res => {
                    vm.form = {...res.data.payload}
                    resolve(res.data);
                }).catch(err => {
                    reject(err);
                })
            })
        },
        issueGlobalDtUpdateEvent(tableId) {
            this.$root.$emit("refresh-dt", {
                tableId: tableId
            })
        }

    }
}
