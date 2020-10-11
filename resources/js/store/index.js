import Vue from "vue";
import Vuex from "vuex";
import actions from "./actions";
import mutations from "./mutations";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    snackbar: {
      visible: false,
      text: null,
      timeout: 5000,
      multiline: false
    }
  },
  getters: {
  },
  mutations,
  actions,
  modules: {}
});
