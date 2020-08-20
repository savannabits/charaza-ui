import BackendModule from "../components/BackendModule";
import InfiniteSelect from "../components/InfiniteSelect";

export default {
    mixins:[BackendModule],
    components: {
        InfiniteSelect,
    },
    data: () => ({
        model: {
            display_name: null ,
            guard_name: null ,
            enabled: false ,
        },
    }),
    methods: {
        async fetchRoleWithPermissions(role) {
            console.log(role);
            return this.fetchModel(role.id,{'with-perms': true})
        },
        async togglePermission(assign, perm, roleId) {
            console.log(assign);
            const vm = this;
            return new Promise((resolve, reject) => {
                axios.post(`${vm.form.api_route}/${roleId}/toggle-permission`,{
                    permission_id: perm.id,
                    assigned: assign,
                }).then(res => {
                    //Success
                }).catch(err => {
                    // Revert back
                    perm.assigned = !perm.assigned;
                })
            })
        }
    }
}
