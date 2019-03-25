@extends('home')

@section('contenido')
<!-- Project Card Example -->

            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Horarios</h6>
            </div>
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
                      <a href="{{ route('horarios.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Nuevo Registro</a>
                    </div>
                  @endif
                  <thead>                    
                    <tr>
                      <th>Lapso</th>
                      <th>Tipo de horario</th>
                      <th>Descripción</th>
                      <th>Observación</th>                      
                      @if(Auth::user()->tipo == '1')
                      <th></th>
                      @endif
                    </tr>
                  </thead>                 
                  <tbody>
                    @foreach($horarios as $horario)
                    <tr>            
                      <td><a href="{{ route('horarios.edit' , $horario->id) }}">{{ $horario->lapso }}</a></td>                      
                      @if($horario->tipo == 1)
                        <td>Diurno</td>
                      @elseif($horario->tipo == 2)
                        <td>Nocturno</td>
                      @elseif($horario->tipo == 3)
                        <td>Fin de Semana</td>
                      @else
                        <td>No definido</td>
                      @endif
                      <td>{{ $horario->descripcion }}</td>
                      <td>{{ $horario->observacion }}</td>   
                      
                      @if(Auth::user()->tipo == '1')
                      <td class="text-center">
                        {!! Form::open(['route' => ['horarios.destroy' , $horario->id], 'method' => 'DELETE', 'id' => 'formDelete']) !!}
                          <button type="button" class="btn btn-danger" onclick="if(confirm('¿Seguro de borrar el Horario?')) { document.getElementById('formDelete').submit(); }"><i class="fas fa-trash-alt"></i></button>
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