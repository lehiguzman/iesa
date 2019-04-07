<div id="gridAsig" class="table table-bordered table-stripe">
     <table id="tableAsig" class="table table-bordered table-stripe">
        <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Observación</th>
        <th></th>
        </tr>   
        @foreach($materias as $materia) 
            @if($materia->oferta_id == $oferta->id)    
                 <tr>            
                    <td>
                        {{ $materia->nombre}}
                    </td>
                    <td>
                        {{ $materia->descripcion}}
                    </td>
                    <td>
                        {{ $materia->observacion }}
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
