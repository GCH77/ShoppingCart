<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura de Venta</title>
	
	<style type="text/css">
		* {
			font-family: Verdana, Arial, sans-serif;
		}
		table{
			font-size: x-small;
		}
		tfoot tr td{
			font-weight: bold;
			font-size: x-small;
		}
		pre{
			font-weight: bold;
		}
		.gray {
			background-color: lightgray
		}
		.information {
			background-color: #60A7A6;
			color: #FFF;
		}
		.information table {
			padding: 10px;
		}
	</style>
	
</head>
<body>
	
	<table width="100%">
		<tr>
			<td valign="top"><img src="{{ public_path('images/fondoSideLogin.jpg') }}" alt="Logo" width="185"></td>
			<td align="right"><img src="{{ public_path('images/codigoBarras.png') }}" alt="CodigoBarras" width="150"></td>
		</tr>
		
	</table>
	<table width="100%">
		<tr>
			<td><strong>Shopping Cart - Nice-Commerce</strong></td>
		</tr>	
	</table>
{{-- <span>{{$request}}</span> --}}
	<table>
			<tr><td>{{$request[0]->nombre}}</td></tr>
			<tr><td>{{$request[0]->apellidos}}</td></tr>
			<tr><td>{{$request[0]->num_documento}}</td></tr>
			<tr><td>{{$request[0]->direccion}}</td></tr>
			<tr><td>{{$request[0]->correo}}</td></tr>
	</table>
	<br>
{{-- <span>{{$data}}</span> --}}
	<table width="100%">
		<thead style="background-color: lightgray;">
			<tr>
				<th>#</th>
				<th>Descripcion</th>
				<th>Cantidad</th>
				<th>Precio Unitario $</th>
				<th>Total $</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="row">1</th>
				<td>{{$data[0]->nombre}} - {{$data[0]->marca->marca}}</td>
				<td align="right">1</td>
				<td align="right">{{$data[0]->almacenes[0]->precio_venta}}</td>
				<td align="right">{{$data[0]->almacenes[0]->precio_venta}}</td>
			</tr>
			<tr>
				<th scope="row">1</th>
				<td>{{$data[1]->nombre}} - {{$data[1]->marca->marca}}</td>
				<td align="right">1</td>
				<td align="right">{{$data[1]->almacenes[0]->precio_venta}}</td>
				<td align="right">{{$data[1]->almacenes[0]->precio_venta}}</td>
			</tr>
			<tr>
				<th scope="row">1</th>
				<td>{{$data[2]->nombre}} - {{$data[2]->marca->marca}}</td>
				<td align="right">1</td>
				<td align="right">{{$data[2]->almacenes[0]->precio_venta}}</td>
				<td align="right">{{$data[2]->almacenes[0]->precio_venta}}</td>
			</tr>
			
		</tbody>
		
		<tfoot>
			<tr>
				<td colspan="3"></td>
				<td align="right">Subtotal $</td>
				<td align="right">2.218.054</td>
			</tr>
			<tr>
				<td colspan="3"></td>
				<td align="right">Iva $</td>
				<td align="right">421.430,26</td>
			</tr>
			<tr>
				<td colspan="3"></td>
				<td align="right">Total $</td>
				<td align="right" class="gray">$ 2.639.484,26</td>
			</tr>
		</tfoot>
	</table>
	
	<div class="information" style="position: absolute; bottom: 0;">
		<table width="100%">
			<tr>
				<td align="left" style="width: 50%;">
					&copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
				</td>
				<td align="right" style="width: 50%;">
					Nice-Commerce
				</td>
			</tr>
		</table>
	</div>
</body>
</html>
