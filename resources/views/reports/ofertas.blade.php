@extends('home')

@section('contenido')

 		<div class="card-header">
          <h6 class="font-weight-bold text-primary text-center h2">Reporte de Ofertas Académicas</h6>
        </div>

{!! Form::open(['url' => '/ofertasReport', 'class' => 'user', 'target' => '_blank']) !!}

<div class="form-group form-inline justify-content-center p-5  col-sm-12">         
    <select id="periodo" name="periodo" class="form-control">
        <option value="" selected disabled>Seleccione oferta</option>
        	@foreach($periodos as $periodo)
        		<option value="{{ $periodo->id }}">{{ $periodo->titulo }}</option>
        	@endforeach
    </select>    
</div> 
<div class="form-group form-inline justify-content-center p-5  col-sm-12">
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