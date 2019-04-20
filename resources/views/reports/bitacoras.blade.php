@extends('home')

@section('contenido')
        <div class="card-header">
          <h6 class="font-weight-bold text-primary text-center h2">Reporte de bitacora</h6>
        </div>


{!! Form::open(['url' => '/bitacorasReport', 'class' => 'user' , 'target' => '_blank']) !!}

<div class="form-group form-inline justify-content-center p-5 col-sm-12">         
    <select id="user_id" name="user_id" class="form-control col-sm-3">
        <option value="" selected disabled>Seleccione usuario</option>
        	@foreach($users as $user)                
                <option value="{{ $user->id }}">{{ $user->name }} {{ $user->lastname }}</option>                
        	@endforeach
    </select>    
</div>
<div class="form-group form-inline justify-content-center p-1 col-sm-12">
    <select id="desde" name="desde" class="form-control mr-5">
        <option value="" selected disabled>Desde</option>
            @foreach($bitacoraDesde as $desde)                
                <option value="{{ $desde->created_at }}">{{ $desde->created_at }}</option>                
            @endforeach
    </select>  
    <select id="hasta" name="hasta" class="form-control ml-5">
        <option value="" selected disabled>Hasta</option>
            @foreach($bitacoraHasta as $hasta)                
                <option value="{{ $hasta->created_at }}">{{ $hasta->created_at }}</option>                
            @endforeach
    </select>    
</div> 
<div class="form-group form-inline justify-content-center p-5 col-sm-12">
	<button type="submit" class="btn btn-primary btn-user" value="{{ __('Registrar') }}">
    	Generar
	</button>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="{{ url('/home') }}" class="btn btn-danger btn-user">                
     Cancelar
	</a>
</div>
{!! Form::close() !!}
@endsection