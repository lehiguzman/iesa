@extends('home')

@section('contenido')
<!-- Project Card Example -->

            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Calificaciones</h6>
            </div>
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