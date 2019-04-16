@extends('home')

@section('contenido')

{!! Form::open(['url' => '/notasReport', 'class' => 'user']) !!}

<div class="form-group form-inline justify-content-center col-sm-12">         
    <select id="oferta" name="oferta" class="form-control">
        <option value="" selected disabled>Seleccione oferta</option>
        	@foreach($ofertas as $oferta)
        		<option value="{{ $oferta->id }}">{{ $oferta->nombre }}</option>
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