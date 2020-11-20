import BackendModule from "../components/BackendModule";
import InfiniteSelect from "../components/InfiniteSelect";

export default {
    mixins:[BackendModule],
    components: {
        InfiniteSelect,
    },
    data: () => ({
        model: {
            title: null ,
            description: null ,
            body: null ,
                        author: null,
                        
        },
    }),
}
