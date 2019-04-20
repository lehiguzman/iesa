@extends('home')

@section('contenido')
<!-- Begin Page Content -->
        <div class="card-header">
              <h6 class="font-weight-bold text-primary text-center h2">Inscripción</h6>
        </div>
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4 col-lg-12 breadcrumb">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Registro de Inscripción</h1>           
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4 text-center">

		    {!! Form::open(['route' => 'inscriptions.store', 'class' => 'user']) !!}

            @include('inscription.partials.form')
      
        {!! Form::close() !!}

              </div>
        
          </div>

        </div>
@endsection