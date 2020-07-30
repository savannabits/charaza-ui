import BackendModule from "../components/BackendModule";
import InfiniteSelect from "../components/InfiniteSelect";

export default {
    mixins:[BackendModule],
    components: {
        InfiniteSelect,
    },
    data: () => ({
        model: {
            name:  null ,
            description:  null ,
            active:  false ,
                        
        },
    }),
}
