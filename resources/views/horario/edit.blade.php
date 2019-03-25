@extends('home')

@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-center mb-4 col-lg-10">
                        <h1 class="h3 mb-0 text-gray-800">Editar horario</h1>           
                    </div>
                    <div class="card-body">

                     <div class="col-lg-10 mb-4 text-center">
            
                        {!! Form::model($horario, ['route' => ['horarios.update', $horario->id] , 'method' => 'PUT', 'class' => 'user']) !!}

                        @include('horario.partials.formEdit')

                        {!! Form::close() !!}

                    </div> 
                    <br>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection