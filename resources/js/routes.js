import Bienvenida from './components/Bienvenida';
import ViewProductos from './components/Productos/ViewProductos';
import ViewProveedores from './components/Proveedores/ViewProveedores';
import ViewRoles from './components/Roles/ViewRoles';
import ViewUsuarios from './components/Usuarios/ViewUsuarios';
import ViewWelcome from './components/cliente/ViewWelcome';
import ViewDetails from './components/cliente/ViewDetails';
import ViewCheckout from './components/cliente/ViewCheckout';

const routes = [
   { 
      path: '/inicio', 
      name: 'home', 
      component: Bienvenida 
   },
   { 
      path: '/productos', 
      name: 'Productos', 
      component: ViewProductos 
   },
   { 
      path: '/proveedores', 
      name: 'Proveedores', 
      component: ViewProveedores 
   },
   { 
      path: '/roles', 
      name: 'Roles', 
      component: ViewRoles 
   },
   { 
      path: '/usuarios', 
      name: 'Usuarios', 
      component: ViewUsuarios 
   },
   { 
      path: '/', 
      name: 'listaproductos', 
      components: { 
         cliente: ViewWelcome 
      }
   },
   { 
      path: 'details', 
      name: 'detallesproductos', 
      components: { 
         cliente: ViewDetails 
      }, 
      props: { 
         cliente: true
      } 
   },
   { 
      path: 'checkout', 
      name: 'checkout', 
      components: { 
         cliente: ViewCheckout 
      }, 
      props: { 
         cliente: true
      } 
   }
]
export default routes;