import Bienvenida from './components/Bienvenida';
import ViewProductos from './components/Productos/ViewProductos';
import ViewProveedores from './components/Proveedores/ViewProveedores';
import ViewRoles from './components/Roles/ViewRoles';
import ViewUsuarios from './components/Usuarios/ViewUsuarios';
import ViewWelcome from './components/cliente/ViewWelcome';
import ViewDetails from './components/cliente/ViewDetails';

const routes = [
   { path: '/inicio', name: 'home', component: Bienvenida },
   { path: '/productos', name: 'productos', component: ViewProductos },
   { path: '/proveedores', name: 'proveedores', component: ViewProveedores },
   { path: '/roles', name: 'roles', component: ViewRoles },
   { path: '/usuarios', name: 'usuarios', component: ViewUsuarios },
   { path: '/', name: 'listaproductos', components: { cliente: ViewWelcome }},
   { path: '/details', name: 'detallesproductos', components: { cliente: ViewDetails }, props: { cliente: true} }
]
export default routes;