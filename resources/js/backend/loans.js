import BackendModule from "../components/BackendModule";
import InfiniteSelect from "../components/InfiniteSelect";

export default {
    mixins:[BackendModule],
    components: {
        InfiniteSelect,
    },
    data: () => ({
        model: {
            borrowed_at:  null ,
            amount:  null ,
                                    borrower: null,
            lender: null,
            product: null,
                        
        },
    }),
}
