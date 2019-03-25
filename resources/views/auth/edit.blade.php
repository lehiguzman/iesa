@extends('home')

@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-center mb-4 col-lg-10">
                        <h1 class="h3 mb-0 text-gray-800">Editar usuario</h1>           
                    </div>
                    <div class="card-body">

                     <div class="col-lg-10 mb-4 text-center">
            
                        {!! Form::model($user, ['route' => ['users.update', $user->id] , 'method' => 'PUT', 'class' => 'user', 'enctype' => 'multipart/form-data']) !!}

                        @include('auth.partials.formEdit')

                        {!! Form::close() !!}

                    </div> 
                    <br>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection