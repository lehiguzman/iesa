@extends('home')

@section('contenido')
<!-- Project Card Example -->
        <div class="card-header">
          <h6 class="font-weight-bold text-primary text-center h2">{{ $valor }}</h6>
        </div>
            <div class="card shadow mb-4">            
            <div class="card-body">
              <div class="table-responsive">
                <div class="align-items-center">
                  @if(Session::has('message'))
                    {{ Session::get('message') }}
                  @endif
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  @if(Auth::user()->tipo == '1')
                    <div class="d-sm-flex justify-content-between mb-4">                  
                      <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Nuevo Registro</a>
                    </div>
                  @endif
                  <thead>                    
                    <tr>
                      <th>Cedula</th>
                      <th>Usuario</th>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Perfil</th>
                      @if(Auth::user()->tipo == '1')
                      <th></th>
                      @endif
                    </tr>
                  </thead>                 
                  <tbody>
                    @foreach($users as $user)
                    <tr>            
                      <td><a href="{{ route('users.edit' , $user->id) }}">{{ $user->tipo_cedula . '-' . $user->cedula }}</a></td>
                      <td>{{ $user->username }}</td>
                      <td>{{ $user->name . " " .$user->lastname }}</td>
                      <td>{{ $user->email }}</td>   
                      @if($user->tipo == 1)
                        <td>Administrador</td>
                      @elseif($user->tipo == 2)
                        <td>Profesor</td>
                      @elseif($user->tipo == 3)
                        <td>Estudiante</td>
                      @else
                        <td>No definido</td>
                      @endif
                      @if(Auth::user()->tipo == '1')
                      <td class="text-center">
                        {!! Form::open(['route' => ['users.destroy' , $user->id], 'method' => 'DELETE']) !!}
                          <button type="button" class="btn btn-danger" onclick="if(confirm('¿Seguro de borrar el usuario?')) { this.type = 'submit'; }"><i class="fas fa-trash-alt"></i></button>
                        {!! Form::close() !!}
                      </td>
                      @endif
                    </tr>
                    @endforeach                  
                   </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection