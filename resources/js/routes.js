import ViewProductos from './components/ViewProductos';
import ViewProveedores from './components/ViewProveedores';
import ViewRoles from './components/ViewRoles';
// import ViewProductList from './components/ViewProductList';

const routes = [
   { path: '/', name: 'productos', component: ViewProductos },
   { path: '/proveedores', name: 'proveedores', component: ViewProveedores },
   { path: '/roles', name: 'roles', component: ViewRoles },
   // { path: '/', name: 'product-list', component: ViewProductList }
]
export default routes;