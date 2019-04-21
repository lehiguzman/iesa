@extends('home')

@section('contenido')
<!-- Project Card Example -->
            <div class="card-header">
              <h6 class="font-weight-bold text-primary text-center h2">Inscripción</h6>
            </div>
            <div class="card shadow mb-4">            
            <div class="card-body">
              <div class="table-responsive">
                <div class="align-items-center btn-success mb-4 text-center h-3">
                  @if(Session::has('message'))
                    {{ Session::get('message') }}
                  @endif
                </div>
                <div class="align-items-center btn-danger mb-4 text-center">
                  @if(Session::has('error'))
                     {{ Session::get('error') }}
                  @endif
                </div>
                <div class="d-sm-flex justify-content-between mb-4">                  
                  <a href="{{ route('inscriptions.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Nuevo Registro</a>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">                  
                  <thead>                    
                    <tr>
                      <th>Oferta</th>                      
                      <th>Observación</th>      
                      @if(Auth::user()->tipo == '1')                      
                      <th></th>                     
                      @endif                
                    </tr>
                  </thead>                 
                  <tbody>
                    @foreach($inscriptions as $inscription)
                    <tr>   
                      @foreach($periodos as $periodo)    
                        @if($inscription->periodo_id == $periodo->id) 
                      <td><a href="{{ route('inscriptions.edit' , $inscription->id) }}">{{ $periodo->titulo }}</a></td>
                        @endif
                      @endforeach
                      <td>{{ $inscription->observacion }}</td> 
                  @if(Auth::user()->tipo == '1')
                      <td class="text-center">
                        {!! Form::open(['route' => ['inscriptions.destroy' , $inscription->id], 'method' => 'DELETE']) !!}
                          <button type="button" class="btn btn-danger" onclick="if(confirm('¿Seguro de borrar la Inscripción?')) { this.type = 'submit'; }"><i class="fas fa-trash-alt"></i></button>
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