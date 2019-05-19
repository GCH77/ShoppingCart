import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
   state: {
      shopCar: []
   },
   getters: {
      shopCar: state => {
         return state.shopCar;
      }
   },
   mutations: {
      setshopCar(state, payload){
         state.shopCar.push(payload);
      },
      cleanShopCar(state){
         state.shopCar = [];
      }
   },
   actions: {
      setshopCar({commit}, payload){
         commit('setshopCar', payload);
      },
      cleanShopCar({commit}){
         commit('cleanShopCar');
      }
   }
});