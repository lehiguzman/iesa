@extends('home')

@section('contenido')
<!-- Project Card Example -->
            <div class="card-header">
              <h6 class="font-weight-bold text-primary text-center h2">Oferta Académica</h6>
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
                  @if(Auth::user()->tipo == '1')
                    <div class="d-sm-flex justify-content-between mb-4">                  
                      <a href="{{ route('ofertas.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Nuevo Registro</a>
                    </div>
                  @endif
                  <thead>                    
                    <tr>
                      <th>Oferta</th>
                      <th>Tipo de Oferta</th>
                      <th>Descripción</th>
                      <th>Observación</th>                      
                      @if(Auth::user()->tipo == '1')
                      <th></th>
                      @endif
                    </tr>
                  </thead>                 
                  <tbody>
                    @foreach($ofertas as $oferta)
                    <tr>            
                      <td><a href="{{ route('ofertas.edit' , $oferta->id) }}">{{ $oferta->nombre }}</a></td>                      
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
                      
                      @if(Auth::user()->tipo == '1')
                      <td class="text-center">
                        {!! Form::open(['route' => ['ofertas.destroy' , $oferta->id], 'method' => 'DELETE']) !!}
                          <button type="button" class="btn btn-danger" onclick="if(confirm('¿Seguro de borrar la Oferta Académica?')) { this.type = 'submit'; }"><i class="fas fa-trash-alt"></i></button>
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