const state = {
    user: null,
    userStatus: null //loading state
};

const actions = {
    fetchAuthUser({ commit, state }) {
        axios
            .get("/api/auth-user")
            .then(res => {
                commit("setAuthUser", res.data);
            })
            .catch(err => {
                console.log("Unable to fetch authenticated user.");
            });
    }
};

const getters = {
    authUser: state => {
        return state.user;
    }
};

const mutations = {
    setAuthUser(state, user) {
        state.user = user;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
