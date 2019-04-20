<!DOCTYPE html>

<html>

<head>

	<title>Bitacora</title>
	
</head>

<body>
	<div>
		<img src="./img/logo-portada.jpg" style="margin: 15px;">
		<img src="./img/logo-iesa-2.jpg" style="margin-left: 250px;">
		<h2 align="center">Instituto de Estudios Superiores de Administración (IESA)</h2><br>
		<h2 align="center">Bitacora de usuario : {{ $user->name }} {{ $user->lastname }}</h2>		
	</div>	 	  		
			<table border="2" width="90%" align="center">
				<tr>
					<th width="50%" align="center">Accion</th>
					<th width="25%" align="center">Dia</th>
					<th width="25%" align="center">Hora</th>
				</tr>
				@foreach($bitacoras as $bitacora)
				<tr>
					<td align="center">{{ $bitacora->accion }}</td>	
					<td align="center">{{ date('Y-m-d', strtotime($bitacora->created_at)) }}</td>	
					<td align="center">{{ date('h:i a', strtotime($bitacora->created_at)) }}</td>	
				</tr>						
				@endforeach
			</table>
</body>

</html>