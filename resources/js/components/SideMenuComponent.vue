<template>
   <div class="row">
		<div class="col-2">
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">				
				<router-link 
					class="nav-link active" 
					id="v-pills-home-tab" 
					data-toggle="pill" 
					role="tab" 
					aria-controls="v-pills-home"
					aria-selected="true"
					:to="{name: 'productos'}"
				>
					<i class="fab fa-buffer"></i>
					Productos
				</router-link>

				<router-link 
					class="nav-link"
					id="v-pills-profile-tab"
					data-toggle="pill" 
					role="tab" 
					aria-controls="v-pills-profile" 
					aria-selected="false"					
					:to="{name: 'proveedores'}"
				>
				Proveedores
				</router-link>

				<router-link 
					class="nav-link"
					id="v-pills-profile-tab"
					data-toggle="pill" 
					role="tab" 
					aria-controls="v-pills-profile" 
					aria-selected="false"					
					:to="{name: 'roles'}"
				>
					<i class="fas fa-users-cog"></i>
					Roles
				</router-link>
			</div>
		</div>
		<div class="col-10">
			<div class="tab-content" id="v-pills-tabContent">
				<keep-alive>
					<router-view></router-view>
				</keep-alive>
			</div>
		</div>
	</div>
</template>
