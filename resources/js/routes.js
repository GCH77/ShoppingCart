import Bienvenida from './components/Bienvenida';
import ViewProductos from './components/Productos/ViewProductos';
import ViewProveedores from './components/Proveedores/ViewProveedores';
import ViewRoles from './components/Roles/ViewRoles';
import ViewUsuarios from './components/Usuarios/ViewUsuarios';

const routes = [
   { path: '/', name: 'home', component: Bienvenida },
   { path: '/productos', name: 'productos', component: ViewProductos },
   { path: '/proveedores', name: 'proveedores', component: ViewProveedores },
   { path: '/roles', name: 'roles', component: ViewRoles },
   { path: '/usuarios', name: 'usuarios', component: ViewUsuarios }
]
export default routes;