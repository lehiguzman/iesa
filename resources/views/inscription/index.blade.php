@extends('home')

@section('contenido')
<!-- Project Card Example -->

            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Inscripción</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="align-items-center">
                  @if(Session::has('message'))
                    {{ Session::get('message') }}
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
                    </tr>
                    @endforeach                  
                   </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection