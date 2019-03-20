@extends('home')

@section('contenido')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Registro de usuario</h1>           
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4 text-center">

		<form class="user" method="POST" action="{{ route('students.store') }}">
                @csrf                
            <div class="form-group form-inline justify-content-center col-sm-12">
                <input type="text" class="form-control form-control-user col-sm-4 text-center" id="cedula" name="cedula" placeholder="Cedula" required>
            </div>                
            <div class="form-group form-inline justify-content-center col-sm-12">                  
                <input type="text" class="form-control form-control-user col-sm-4 text-center" id="nombre" name="nombre" placeholder="Nombre" required>
            </div>    
            <div class="form-group form-inline justify-content-center col-sm-12">                  
                <input type="text" class="form-control form-control-user col-sm-4 text-center" id="apellido" name="apellido" placeholder="Apellido" required>
            </div>                
            <div class="form-group form-inline justify-content-center col-sm-12">
                <input type="email" class="form-control form-control-user col-sm-4 text-center" id="correo" name="correo" placeholder="Correo electrónico" required>
            </div>           
           	<div class="form-group form-inline justify-content-center col-sm-12">
                <input type="text" class="form-control form-control-user col-sm-4 text-center" id="telefono" name="telefono" placeholder="Teléfono móvil" required>
            </div>                             
            <div class="form-group form-inline justify-content-center col-sm-12">
                <input type="text" class="form-control form-control-user col-sm-4 text-center" id="telefono_local" name="telefono_local" placeholder="Teléfono local" required>
            </div>                 
            <div class="form-group form-inline justify-content-center col-sm-12">                 
                <input type="text" class="form-control form-control-user col-sm-4 text-center" id="fecnac" name="fecnac" placeholder="Fecha nacimiento" required>
            </div>                   
            <button type="submit" class="btn btn-primary btn-user">
                Registrar
            </button>
            <button type="submit" class="btn btn-danger btn-user">
                Cancelar
            </button>
            <hr>                
            </form>

              </div>
        
          </div>

        </div>
@endsection