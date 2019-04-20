@extends('home')

@section('contenido')
    <div class="card-header">
        <h6 class="font-weight-bold text-primary text-center h2">Oferta académica</h6>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-center mb-4 col-lg-12 breadcrumb">
                        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Editar oferta académica</h1>           
                    </div>
                    <div class="card-body">

                     <div class="col-lg-12 mb-4 text-center">
            
                        {!! Form::model($periodo, ['route' => ['periodos.update', $periodo->id] , 'method' => 'PUT', 'class' => 'user']) !!}

                        @include('periodo.partials.formEdit')

                        {!! Form::close() !!}

                    </div> 
                    <br>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection