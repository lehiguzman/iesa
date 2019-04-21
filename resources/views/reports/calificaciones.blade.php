@extends('home')

@section('contenido')
        <div class="card-header">
          <h6 class="font-weight-bold text-primary text-center h2">Calificaciones</h6>
        </div>


{!! Form::open(['url' => '/calificacionesReport', 'class' => 'user' , 'target' => '_blank']) !!}

<div class="form-group form-inline justify-content-center p-5 col-sm-12">         
    <select id="periodo_id" name="periodo_id" class="form-control col-sm-3">
        <option value="" selected disabled>Seleccione Oferta Académica</option>
            <option value="T">Todas</option>                
        	@foreach($inscriptions as $inscription) 
                @foreach($periodos as $periodo)
                    @if($inscription->periodo_id == $periodo->id)
                        <option value="{{ $periodo->id }}">{{ $periodo->titulo }}</option>                
                    @endif
                @endforeach
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