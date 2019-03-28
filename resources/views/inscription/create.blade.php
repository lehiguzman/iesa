@extends('home')

@section('contenido')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4 col-lg-10">
            <h1 class="h3 mb-0 text-gray-800">Registro de Inscripción</h1>           
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-10 mb-4 text-center">

		    {!! Form::open(['route' => 'inscriptions.store', 'class' => 'user']) !!}

            @include('inscription.partials.form')
      
        {!! Form::close() !!}

              </div>
        
          </div>

        </div>
@endsection