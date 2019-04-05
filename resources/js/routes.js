import ViewProductos from './components/ViewProductos';
import ViewProveedores from './components/ViewProveedores';

const routes = [
   { path: '/', name: 'productos', component: ViewProductos },
   { path: '/proveedores', name: 'proveedores', component: ViewProveedores }
]
export default routes;