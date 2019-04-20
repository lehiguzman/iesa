@extends('home')

@section('contenido')
<!-- Begin Page Content -->
        <div class="card-header">
          <h2 class="font-weight-bold text-primary text-center">Usuarios</h2>
        </div>
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4 col-lg-12 breadcrumb">
            <h1 class="h3 mt-3 text-gray-800 font-weight-bold">Registro de usuario</h1>           
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4 text-center">

		          {!! Form::open(['route' => 'users.store', 'class' => 'user', 'enctype' => 'multipart/form-data']) !!}

                @include('auth.partials.form')
      
              {!! Form::close() !!}

            </div>
        
          </div>

        </div>
@endsection