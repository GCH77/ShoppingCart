<template>
   <div class="row">
		<div class="container-fluid pl-0">

			<div class="wrapper">
			<!-- Sidebar  -->
			<nav id="sidebar">
					<div class="sidebar-header">
						<h3>Gestion</h3>
						<strong>GS</strong>
					</div>

					<ul class="list-unstyled components">
						<li 
							id="home"
							:class="[this.$router.currentRoute.name === 'home' ? 'active' : '']"
						>
							<router-link :to="{name: 'home'}">
								<i class="fas fa-home"></i>
								Inicio
							</router-link>							
						</li>
						<template v-for="mod in showModules">
							<li :key="mod.id" 
								:id="mod.modulo"
								:class="[$router.currentRoute.name === mod.modulo ? 'active' : '']"
							>
								<router-link :to="{name: mod.modulo}">
									<i :class="mod.icon"></i>
									{{ mod.label }}
								</router-link>							
							</li>
						</template>
						<!-- <li 
							id="productos"
							:class="[this.$router.currentRoute.name === 'Productos' ? 'active' : '']"
						>
							<router-link :to="{name: 'Productos'}">
								<i class="fas fa-layer-group"></i>
								Productos
							</router-link>							
						</li>
						<li id="proveedores" :class="[this.$router.currentRoute.name === 'Proveedores' ? 'active' : '']">
							<router-link :to="{name: 'Proveedores'}">
								<i class="fas fa-dolly"></i>
								Proveedores
							</router-link>						
						</li>
						<li id="usuarios" :class="[this.$router.currentRoute.name === 'Usuarios' ? 'active' : '']">
							<router-link :to="{name: 'Usuarios'}">
								<i class="fas fa-users"></i>
								Usuarios
							</router-link>	
						</li>
						<li id="roles" :class="[this.$router.currentRoute.name === 'Roles' ? 'active' : '']">
							<router-link :to="{name: 'Roles'}">
								<i class="fas fa-key"></i>
								Roles
							</router-link>
						</li> -->
						<li>
							<a href="#">
								<i class="fas fa-question"></i>
								FAQ
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fas fa-paper-plane"></i>
								Contact
							</a>
						</li>
						<li v-if="window.width > 768">
							<button type="button" id="sidebarCollapse" class="btn" @click="collapse = !collapse">
								<i :class="iconClass"></i>
							</button>
						</li>
					</ul>
			</nav>

			<!-- Page Content  -->
				<div class="content">
					<keep-alive>
						<router-view></router-view>
					</keep-alive>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		name: 'side-menu-component',
		props: ['auth'],
		data(){
			return{
				window: {
					width: 0,
					height: 0
				},
				collapse: false,
				iconClass: 'fas fa-angle-left',
				i: 0,
				accessModules: '',
				modulos: '',
				showModules: []
			}
		},
		async created() {
			// console.log("Desde SideMenuComponent - auth");
			// console.log(this.auth.persona.rol.permisos_roles_mod_func);
			await this.getModules();
			this.configShowModules();
			// console.log(this.accessModules);
			window.addEventListener('resize', this.handleResize)
			this.handleResize();
			this.$router.push({name: "home"});
		},
		destroyed() {
			window.removeEventListener('resize', this.handleResize)
		},
		watch: {
			collapse(newVal, oldVal){
				console.log(oldVal+" - "+newVal+" -> "+this.collapse);
				if(newVal === true){
					this.i++;
					console.log("Entre newVal == true");
					this.iconClass = 'fas fa-angle-left';
					$('#sidebar').toggleClass('active');
					this.collapse = false;
				}
				if (this.isImpar(this.i)) {
					this.iconClass = 'fas fa-angle-right';
				}
				console.log("I = "+this.i);
				console.log(this.isImpar(this.i));
			}
		},
		methods: {
			handleResize() {
				this.window.width = window.innerWidth;
				this.window.height = window.innerHeight;
				if(this.window.width === 768){
					$('#sidebar').toggleClass('active');
				}
				if(this.window.width === 769){
					$('#sidebar').toggleClass('desactive');
				}
			},
			isImpar(n){
				return n % 2 === 0 ? false: true;
			},
			eliminarObjetosDuplicados(arr, prop) {
				let nuevoArray = [];
				let lookup  = {};
			
				for (let i in arr) {
						lookup[arr[i][prop]] = arr[i];
				}
			
				for (let i in lookup) {
						nuevoArray.push(lookup[i]);
				}
			
				return nuevoArray;
			},
			async getModules(){
				await axios.get('modulos').then((response) => {
					this.modulos = response.data;
				});
			},
			configShowModules(){
				//PENDIENTE - ROLES
				this.accessModules = this.eliminarObjetosDuplicados(this.auth.persona.rol.permisos_roles_mod_func, 'id_modulos');
				for (const element of this.accessModules) {
					for (const modulo of this.modulos) {
						if (element.id_modulos === modulo.id) {
							switch (modulo.modulo) {
								case 'Productos':
									this.showModules.push(
										{id: modulo.id, modulo: modulo.modulo, icon: 'fas fa-layer-group', label: 'Productos'}
									);
									break;
								case 'Proveedores':
									this.showModules.push(
										{id: modulo.id, modulo: modulo.modulo, icon: 'fas fa-dolly', label: 'Proveedores'}
									);
									break;
								case 'Usuarios':
									this.showModules.push(
										{id: modulo.id, modulo: modulo.modulo, icon: 'fas fa-users', label: 'Usuarios'}
									);
									break;
								case 'Roles':
									this.showModules.push(
										{id: modulo.id, modulo: modulo.modulo, icon: 'fas fa-key', label: 'Roles'}
									);
									break;
								default:
									console.log("Warning. This module doesn't exist in our system.");
									break;
							}
						}
					}
				}
			}
		}
	}
</script>
<style scoped>
	.btn{
		color: #fff;
		border-color: white;
		width: 170px;
		margin-left: 15px;
		margin-top: 10px;
	}

	.btn:hover{
		background-color: #484a4d;
	}

	a,
	a:hover,
	a:focus {
		color: inherit;
		text-decoration: none;
		transition: all 0.3s;
	}
	/* ---------------------------------------------------
		SIDEBAR STYLE
	----------------------------------------------------- */

	.wrapper {
		display: flex;
		align-items: stretch;
	}

	#sidebar {
		min-width: 200px;
		max-width: 200px;
		background: #215a94;
		color: #fff;
		transition: all 0.3s;
		padding-left: 0px;
		padding-right: 0px;
	}

	#sidebar.active {
		min-width: 80px;
		max-width: 80px;
		text-align: center;
	}

	#sidebar.active .btn{
		color: #fff;
		border-color: white;
		width: 50px;
		margin-left: 0px;
		margin-top: 10px;
	}

	#sidebar.active .sidebar-header h3,
	#sidebar.active .CTAs {
		display: none;
	}

	#sidebar.active .sidebar-header strong {
		display: block;
	}

	#sidebar ul li a {
		text-align: left;
	}

	#sidebar.active ul li a {
		padding: 20px 10px;
		text-align: center;
		font-size: 0.85em;
	}

	#sidebar.active ul li a i {
		margin-right: 0;
		display: block;
		font-size: 1.8em;
		margin-bottom: 5px;
	}

	#sidebar.active ul ul a {
		padding: 10px !important;
	}

	#sidebar.active .dropdown-toggle::after {
		top: auto;
		bottom: 10px;
		right: 50%;
		-webkit-transform: translateX(50%);
		-ms-transform: translateX(50%);
		transform: translateX(50%);
	}

	#sidebar .sidebar-header {
		padding: 20px;
		background: #215a94;
	}

	#sidebar .sidebar-header strong {
		display: none;
		font-size: 1.8em;
	}

	#sidebar ul.components {
		padding: 20px 0;
		border-bottom: 1px solid #ffffff;
	}

	#sidebar ul li a {
		padding: 10px;
		font-size: 1.1em;
		display: block;
	}

	#sidebar ul li a:hover {
		color: #fff;
		background: #484a4d;
	}

	#sidebar ul li a i {
		margin-right: 10px;
	}

	#sidebar ul li.active>a,
	a[aria-expanded="true"] {
		color: #484a4d;
		background: #fff;
	}

	a[data-toggle="collapse"] {
		position: relative;
	}

	.dropdown-toggle::after {
		display: block;
		position: absolute;
		top: 50%;
		right: 20px;
		transform: translateY(-50%);
	}

	ul ul a {
		font-size: 0.9em !important;
		padding-left: 30px !important;
		background: #6d7fcc;
	}

	ul.CTAs {
		padding: 20px;
	}

	ul.CTAs a {
		text-align: center;
		font-size: 0.9em !important;
		display: block;
		border-radius: 5px;
		margin-bottom: 5px;
	}

	a.article,
	a.article:hover {
		background: #6d7fcc !important;
		color: #fff !important;
	}

	/* ---------------------------------------------------
		CONTENT STYLE
	----------------------------------------------------- */

	.content {
		width: 100%;
		padding: 20px;
		padding-top: 15px;
		padding-right: 15px;
		min-height: 92vh;
		transition: all 0.3s;
	}

	#sidebar.active .content{
		width: 1600px;
	}

	/* ---------------------------------------------------
		MEDIAQUERIES
	----------------------------------------------------- */

	@media (max-width: 768px) {
		#sidebar {
			min-width: 80px;
			max-width: 80px;
			background: #215a94;
			color: #fff;
			transition: all 0.3s;
		}

		#sidebar .sidebar-header h3,
		#sidebar .CTAs {
			display: none;
		}

		#sidebar .sidebar-header strong {
		display: block;
		}

		#sidebar ul li a {
			text-align: left;
		}

		#sidebar ul li a {
			padding: 20px 10px;
			text-align: center;
			font-size: 0.85em;
		}

		#sidebar ul li a i {
			margin-right: 0;
			display: block;
			font-size: 1.8em;
			margin-bottom: 5px;
		}

		#sidebar ul ul a {
			padding: 10px !important;
		}

		#sidebar .dropdown-toggle::after {
			top: auto;
			bottom: 10px;
			right: 50%;
			-webkit-transform: translateX(50%);
			-ms-transform: translateX(50%);
			transform: translateX(50%);
		}

		#sidebar .sidebar-header {
			padding: 20px;
			background: #215a94;
		}

		#sidebar ul.components {
			padding: 20px 0;
			border-bottom: 1px solid #ffffff;
		}

		#sidebar ul li a:hover {
			color: #215a94;
			background: #fff;
		}

		#sidebar ul li a i {
			margin-right: 10px;
		}

		#sidebar ul li.active>a,
		a[aria-expanded="true"] {
			color: #215a94;
			background: #fff;
		}

		a[data-toggle="collapse"] {
			position: relative;
		}

		.dropdown-toggle::after {
			display: block;
			position: absolute;
			top: 50%;
			right: 20px;
			transform: translateY(-50%);
		}

		ul ul a {
			font-size: 0.9em !important;
			padding-left: 30px !important;
			background: #6d7fcc;
		}

		ul.CTAs {
			padding: 20px;
		}

		ul.CTAs a {
			text-align: center;
			font-size: 0.9em !important;
			display: block;
			border-radius: 5px;
			margin-bottom: 5px;
		}

		a.article,
		a.article:hover {
			background: #6d7fcc !important;
			color: #fff !important;
		}
	}
</style>
