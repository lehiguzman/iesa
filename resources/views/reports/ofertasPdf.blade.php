<!DOCTYPE html>

<html>

<head>	
	<title>Oferta académica</title>	
</head>

<body>
	<div>
		<img src="./img/logo-portada.jpg" style="margin: 15px;">
		<img src="./img/logo-iesa-2.jpg" style="margin-left: 250px;">
		<h2 align="center">Instituto de Estudios Superiores de Administración (IESA)</h2><br>
		<h2 align="center">{{ $nombre }}</h2><br>
		<div style="font-size: 18px;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $descripcion }}	
		</div>		
	</div><br>	 
	<div style="padding-left: 35px; font-size: 18px;">
		<b>Contenido</b>
	</div>	<br>
	@foreach($materias as $materia)
		<div style="padding-left: 45px; margin-bottom: 15px;">
			{{ $materia->id }}. {{ $materia->nombre }}
		</div>	 
	@endforeach

	<div style="margin-top: 310px; padding-left: 35px; font-size: 18px;">
		<b>Horario : </b>{{ $horario->lapso }}
	</div>
</body>

</html>