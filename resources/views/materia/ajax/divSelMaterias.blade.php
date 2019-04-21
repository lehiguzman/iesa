<div id="gridAsig" class="table table-bordered table-stripe">
        <div class="align-items-center btn-success mb-4 text-center col-sm-12">
        @if(Session::has('message'))
            {{ Session::get('message') }}
        @endif
        </div>
        <div class="align-items-center btn-danger mb-4 text-center col-sm-12">
            @if(Session::has('error'))
                {{ Session::get('error') }}
            @endif
        </div>
     <table id="tableAsig" class="table table-bordered table-stripe">
        <tr>
        <th>Nombre</th>
        <th>Profesor</th>
        <th>Salón</th>
        <th></th>
        </tr>   
        @foreach($materias as $materia) 
            @if($materia->oferta_id == $oferta->id)    
                 <tr>            
                    <td>
                        {{ $materia->nombre}}
                    </td>                    
                    <td>
                        @foreach($users as $user)
                            @if($materia->prof_id == $user->id)
                                {{ $user->name }} {{ $user->lastname}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($aulas as $aula)
                            @if($materia->aula_id == $aula->id)
                                {{ $aula->nombre }}
                            @endif
                        @endforeach
                    </td> 
                    <td class="text-center">                    
                      {!! Form::open(['route' => ['materias.destroy' , $materia->id], 'method' => 'DELETE', 'id' => 'formDelete']) !!}
                              <button type="button" class="btn btn-danger" onclick="if(confirm('¿Seguro de borrar Contenido?')) 
                                { document.getElementById('formDelete').submit(); }"><i class="fas fa-trash-alt"></i></button>
                      {!! Form::close() !!}
                    </td>     
                    <input type="hidden" name="oferta_id" value="{{ $oferta->id }}">        
                </tr> 
            @endif   
        @endforeach                       
    </table>        
</div> 
