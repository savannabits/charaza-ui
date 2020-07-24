import BackendModule from "../components/BackendModule";

export default {
    mixins:[BackendModule],
    data: () => ({
        model: {
            display_name: null,
            description: null,
            enabled: true,
        },
    }),
}
