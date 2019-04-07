@extends('home')

@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-center mb-4 col-lg-10">
                        <h1 class="h3 mb-0 text-gray-800">Actualizar asignaciones de la oferta</h1>           
                    </div>
                    <div class="card-body">

                     <div class="col-lg-10 mb-4 text-center">            

                    {!! Form::model($materia, ['route' => ['notas.update', $materia->id] , 'method' => 'PUT', 'class' => 'user']) !!}

                        @include('nota.partials.formEdit')

                    {!! Form::close() !!}      
                       
                    </div> 
                    <br>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection