@extends('home')

@section('contenido')
	<div id="pop_div" style="width: 1000px; height: 500px;"></div>	 
		@columnchart('Finances', 'pop_div')	
@endsection