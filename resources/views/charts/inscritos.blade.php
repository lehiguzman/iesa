@extends('home')

@section('contenido')
	 <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4 col-lg-12 breadcrumb">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Estudiantes inscritos mensualmente por género</h1>           
          </div>
    
	<div id="pop_div" style="width: 1000px; height: 500px;"></div>	 
		@columnchart('Inscritos', 'pop_div')	
@endsection