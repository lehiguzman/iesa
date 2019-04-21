@extends('home')

@section('contenido')
<!-- Project Card Example -->
            <div class="card-header">
              <h6 class="font-weight-bold text-primary text-center h2">Contenidos</h6>
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">                  
                  <thead>                    
                    <tr>
                      <th>Oferta</th>
                      <th>Tipo de Oferta</th>
                      <th>Descripción</th>
                      <th>Observación</th>                                           
                    </tr>
                  </thead>                 
                  <tbody>
                    @foreach($ofertas as $oferta)
                    <tr>            
                      <td><a href="{{ route('materias.edit' , $oferta->id) }}">{{ $oferta->nombre }}</a></td>                      
                      @if($oferta->tipo == 1)
                        <td>Postgrado</td>
                      @elseif($oferta->tipo == 2)
                        <td>Diplomado</td>
                      @elseif($oferta->tipo == 3)
                        <td>PAG</td>
                      @else
                        <td>No definido</td>
                      @endif
                      <td>{{ $oferta->descripcion }}</td>
                      <td>{{ $oferta->observacion }}</td>                       
                    </tr>
                    @endforeach                  
                   </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection