@extends('home')

@section('contenido')
<!-- Project Card Example -->
            <div class="card-header">
              <h6 class="font-weight-bold text-primary text-center h2">Notas</h6>
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
                  <thead>                    
                    <tr>
                      <th>Materia</th>                                                                               
                    </tr>
                  </thead>                 
                  <tbody>
                    @foreach($materias as $materia)
                    <tr> 
                      <td>
                        <a href="{{ route('notas.edit' , $materia->id) }}">{{ $materia->nombre }}</a></td>
                      </td>
                    </tr>
                    @endforeach                  
                   </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection