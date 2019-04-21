<!DOCTYPE html>

<html>

<head>

	<title>Calificaciones</title>
	<style type="text/css">
		th {
			border-style: solid;
			line-height: 35px;
			background-color: #EEEEEE; 				 		
		}
		td {
			border: solid 1px;
		}
	</style>
</head>

<body>
	<div>
		<img src="./img/logo-portada.jpg" style="margin: 15px;">
		<img src="./img/logo-iesa-2.jpg" style="margin-left: 250px;">
		<h2 align="center">Instituto de Estudios Superiores de Administración (IESA)</h2><br><br>
		<h4 align="Left" style="margin-left: 50px;">Estudiante: {{ $user->name }} {{ $user->lastname }}</h4><br>		
	</div>	 

			<table width="90%" align="center">
				<tr>
					<th width="50%" align="center">Oferta académica</th>
					<th width="35%" align="center">Materia</th>
					<th width="15%" align="center">Nota</th>
				</tr>
				@foreach($notas as $nota)
				<tr>	
					@foreach($periodos as $periodo)						
						@if($nota->periodo_id == $periodo->id)
							<td align="center">{{ $periodo->titulo }}</td>	
						@endif
					@endforeach				
					@foreach($materias as $materia)						
						@if($nota->materia_id == $materia->id)
							<td align="center">{{ $materia->nombre }}</td>	
						@endif
					@endforeach
							<td align="center">{{ $nota->nota }}</td>	
				</tr>						 
				@endforeach
			</table>   
	 <br>

</body>

</html>