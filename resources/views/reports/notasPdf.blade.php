<!DOCTYPE html>

<html>

<head>

	<title>Notas</title>

</head>

<body>
	<div>
		<img src="./img/logo-portada.jpg" style="margin: 15px;">
		<img src="./img/logo-iesa-2.jpg" style="margin-left: 250px;">
		<h2 align="center">Instituto de Estudios Superiores de Administración (IESA)</h2><br>
		<h2 align="center">{{ $nombre }}</h2>
	</div>	 

	@foreach($materias as $materia)
	  
		<span style="margin-bottom: 12px;"><h4>Materia: {{ $materia->nombre }}</h4></span>

			<table border="2" width="90%" align="center">
				<tr>
					<th width="70%" align="center"></th>
					<th width="20%" align="center">Nota</th>
				</tr>
				
					@if($nota->materia_id == $materia->id)
						<tr>
							@foreach($users as $user)
								@if($user->id == $nota->user_id)
									<td align="center">{{ $user->name }} {{ $user->lastname }}</td>	
								@endif
							@endforeach
									<td align="center">{{ $nota->nota }}</td>	
						</tr>	
					 @endif
				
			</table>   
	 <br>
	@endforeach

</body>

</html>