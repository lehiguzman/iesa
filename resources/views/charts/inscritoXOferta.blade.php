@extends('home')

@section('contenido')
	<div id="pop_div" style="width: 1000px; height: 500px;"></div>	 
		@donutchart('IMDB', 'pop_div')	
@endsection