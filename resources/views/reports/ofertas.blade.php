@extends('home')

@section('contenido')

{!! Form::open(['url' => '/ofertasReport', 'class' => 'user']) !!}

<div class="form-group form-inline justify-content-center col-sm-12">         
    <select id="periodo" name="periodo" class="form-control">
        <option value="" selected disabled>Seleccione oferta</option>
        	@foreach($periodos as $periodo)
        		<option value="{{ $periodo->id }}">{{ $periodo->titulo }}</option>
        	@endforeach
    </select>    
</div> 
<div class="form-group form-inline justify-content-center col-sm-12">
	<button type="submit" class="btn btn-primary btn-user" value="{{ __('Registrar') }}">
    	Generar
	</button>
</div>
{!! Form::close() !!}
@endsection