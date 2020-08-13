import BackendModule from "../components/BackendModule";
import InfiniteSelect from "../components/InfiniteSelect";

export default {
    mixins:[BackendModule],
    components: {
        InfiniteSelect,
    },
    data: () => ({
        model: {
            name: null ,
            first_name: null ,
            last_name: null ,
            middle_name: null ,
            username: null ,
            email: null ,
            password: null ,
            password_confirmation: null,
                        email_verified_at: null ,
            
        },
    }),
}
