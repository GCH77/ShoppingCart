<!DOCTYPE html>
<html>
<head>
	<title>{{ @$request->title }}{{-- this title --}}</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>Nice-Commerce</h2>
				<img src="{{ public_path('images/fondoSideLogin.jpg') }}" alt="Logo" height="150px">
			</div>
			<div class="col-md-6">
				<h5>{{ @$request->nombre}}nombre</h5>
				<h5>{{ @$request->apellidos}}apellidos</h5>
				<h5>{{ @$request->num_documento}}documento</h5>
				<h5>{{ @$request->direccion}}direccion</h5>
				<h5>{{ @$request->telefono}}telefono</h5>
				<h5>{{ @$request->correo}}correo</h5>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="bordered" border="1px" style="table-layout: fixed; width:100%; text-align:center">
				<thead>
					<tr>
						<th style="width:5%;">#</th>
						<th>Codigo</th>
						<th>Productos</th>
						<th>Cantidad</th>
						<th>Precio unitario</th>
						<th>Precio total</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($request as $item)
					<tr>
						<td>{{ $loop->index+1 }}</td>
						<td>Mark{{-- {{ $item->cod_barras }} --}}</td>
						<td>Otto{{-- {{ $item->nombre }} --}}</td>
						<td>Otto{{-- {{ $item->quantity }} --}}</td>
						<td>Otto{{-- {{ $item->precioUnitario }} --}}</td>
						<td>Otto{{-- {{ $item->precioTotal }} --}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>