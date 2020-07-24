import BackendModule from "../components/BackendModule";

export default {
    mixins:[BackendModule],
    data: () => ({
        model: {
            name: null,
            email: null,
            password: null,
        },
    })
}
