
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import router from './router';
import store from './store';


window.Vue = require('vue');
window.toastr = require('toastr');

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "3500",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
// Vue.use(toastr);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('layout-component', require('./components/LayoutComponent.vue').default);
Vue.component('side-menu-component', require('./components/SideMenuComponent.vue').default);
Vue.component('view-bienvenida', require('./components/Bienvenida.vue').default);
Vue.component('view-productos', require('./components/Productos/ViewProductos.vue').default);
Vue.component('view-proveedores', require('./components/Proveedores/ViewProveedores.vue').default);
Vue.component('view-roles', require('./components/Roles/ViewRoles.vue').default);
Vue.component('view-usuarios', require('./components/Usuarios/ViewUsuarios.vue').default);
Vue.component('table-component', require('./components/TableComponent.vue').default);
Vue.component('form-new-product', require('./components/Productos/FormNewProduct.vue').default);
Vue.component('form-new-rol', require('./components/Roles/FormNewRol.vue').default);
Vue.component('form-new-proveedor', require('./components/Proveedores/FormNewProveedor.vue').default);
Vue.component('form-new-usuario', require('./components/Usuarios/FormNewUsuario.vue').default);
Vue.component('view-welcome', require('./components/cliente/ViewWelcome.vue').default);
Vue.component('product-list-component', require('./components/cliente/ProductListComponent.vue').default);
Vue.component('view-details', require('./components/cliente/ViewDetails.vue').default);
Vue.component('product-details-component', require('./components/cliente/ProductDetailsComponent.vue').default);
Vue.component('view-checkout', require('./components/cliente/ViewCheckout.vue').default);
Vue.component('checkout-component', require('./components/cliente/CheckoutComponent.vue').default);
Vue.component('dialog-component', require('./components/DialogComponent.vue').default);
Vue.component('badge-component', require('./components/BadgeComponent.vue').default);
Vue.component('brand-component', require('./components/BrandComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    store
});
