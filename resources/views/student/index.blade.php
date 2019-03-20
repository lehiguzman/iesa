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
                  
                    <a href="{{ url('/students/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Nuevo Registro</a>
                  </div>
                  <thead>                    
                    <tr>
                      <th>Cedula</th>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Telefono</th>
                      <th>Telefono local</th>
                      <th>Fecha Nacimiento</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>Cedula</th>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Telefono</th>
                      <th>Telefono local</th>
                      <th>Fecha Nacimiento</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($students as $student)
                    <tr>
                      <td>{{ $student->cedula }}</td>
                      <td>{{ $student->nombre }}</td>
                      <td>{{ $student->correo }}</td>
                      <td>{{ $student->telefono }}</td>
                      <td>{{ $student->telefono_local }}</td>
                      <td>{{ $student->fecnac }}</td>
                    </tr>
                    @endforeach                  
                   </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection