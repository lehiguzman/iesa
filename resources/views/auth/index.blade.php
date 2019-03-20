@extends('home')

@section('contenido')
<!-- Project Card Example -->

            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Registro de Estudiantes</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="align-items-center">
                  @if(Session::has('message'))
                    {{ Session::get('message') }}
                  @endif
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  
                    <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Nuevo Registro</a>
                  </div>
                  <thead>                    
                    <tr>
                      <th>Usuario</th>
                      <th>Nombre</th>
                      <th>Correo</th>                      
                    </tr>
                  </thead>                 
                  <tbody>
                    @foreach($users as $user)
                    <tr>                      
                      <td>{{ $user->username }}</td>
                      <td>{{ $user->name . " " .$user->lastname }}</td>
                      <td>{{ $user->email }}</td>                      
                    </tr>
                    @endforeach                  
                   </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection