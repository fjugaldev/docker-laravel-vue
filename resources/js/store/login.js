
const state = {
    isLoggedIn: false,
    token: null,
    user: null,
    userType: null,
};

const getters = {
    isLoggedIn: state => {
        return state.isLoggedIn;
    }
};

const actions = {
    login({ commit }, data) {
        commit('login', data.data.token, data.data.user, data.data.user.user_type);
    },
    logout({ commit }) {
        commit('logout');
    },
};

const mutations = {
    login(state, token, user, userType) {
        state.userType = userType;
        state.token = token;
        state.user = user;
        state.isLoggedIn = true;
    },
    logout(state) {
        state.userType = null;
        state.token = null;
        state.user = null;
        state.isLoggedIn = false;
    },
};


export const login = {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
};