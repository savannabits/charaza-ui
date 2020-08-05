import BackendModule from "../components/BackendModule";
import InfiniteSelect from "../components/InfiniteSelect";

export default {
    mixins:[BackendModule],
    components: {
        InfiniteSelect,
    },
    data: () => ({
        model: {
            username: null ,
                        email: null ,
                        name: null ,
                        first_name: null ,
                        middle_name: null ,
                        last_name: null ,
                        email_verified_at: null ,
                        password: null ,
            password_confirmation: null
                                    
        },
    }),
}
