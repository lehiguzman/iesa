@extends('home')

@section('contenido')
<!-- Begin Page Content -->
        <div class="card-header">
          <h6 class="font-weight-bold text-primary text-center h2">Oferta Académica</h6>
        </div>
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4 col-lg-12">
            <h1 class="h3 mb-0 text-gray-800">Registro de oferta académica</h1>           
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4 text-center">

		{!! Form::open(['route' => 'ofertas.store', 'class' => 'user']) !!}

            @include('oferta.partials.form')
      
        {!! Form::close() !!}

              </div>
        
          </div>

        </div>
@endsection