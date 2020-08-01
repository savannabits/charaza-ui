import BackendModule from "../components/BackendModule";
import InfiniteSelect from "../components/InfiniteSelect";

export default {
    mixins:[BackendModule],
    components: {
        InfiniteSelect,
    },
    data: () => ({
        model: {
            display_name:  null ,
            guard_name:  null ,
            enabled:  false ,
                        
        },
    }),
}
