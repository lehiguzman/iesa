<div class="form-group row">
    <div class="form-group form-inline justify-content-center col-sm-12">         
        <H4>Oferta: {{ $oferta->nombre }}</H4>
        <input type="hidden" name="oferta_id" value="{{ $oferta->id }}">
    </div>
    <form class="user form-group form-inline justify-content-center col-sm-12">                         
            <input type="text" class="form-control-user form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }} col-sm-2 text-center" id="nombre" name="nombre" placeholder="Nombre de la Asignatura" required>
            @if ($errors->has('nombre'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
            @endif 
            &nbsp;&nbsp;
            <select id="user_id" name="user_id" class="form-control col-sm-2 text-center" required>
                <option value="">
                    Seleccione Profesor
                </option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} {{ $user->lastname }}</option>
                @endforeach
            </select>
            &nbsp;&nbsp;            
            <select id="aula_id" name="aula_id" class="form-control col-sm-1 text-center" >
                <option value="" disabled selected>Salón</option>
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}">{{ $aula->nombre }} </option>
                @endforeach
            </select>
            &nbsp;&nbsp;
            <textarea id="descripcion" name="descripcion" class="form-control-user form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }} col-sm-2 text-center" placeholder="Descripción de la asignatura"></textarea>
            @if ($errors->has('descripcion'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('descripcion') }}</strong>
                    </span>
            @endif            
            &nbsp;&nbsp;
            <textarea id="observacion" name="observacion" class="form-control-user form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }} col-sm-2 text-center" placeholder="Observación"></textarea>
            @if ($errors->has('observacion'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('observacion') }}</strong>
                    </span>
            @endif
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-primary btn-user" id="addAsig">
                Agregar
            </button>        
    </form> 
</div>
<div class="form-group row">     
    <div class="col p-4"><hr></div>
    <div class="col-auto p-4"><b>Contenidos</b></div>
    <div class="col p-4"><hr></div>  
    <div id="gridAsig" class="row col-sm-12">
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
        <table id="tableAsig" class="table table-bordered table-stripe ">
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
                                  <button type="button" class="btn btn-danger" onclick="if(confirm('¿Seguro de borrar el Contenido?')) { document.getElementById('formDelete').submit(); }"><i class="fas fa-trash-alt"></i></button>
                                {!! Form::close() !!}
                        </td>                       
                    </tr> 
                @endif   
            @endforeach                  
        </table>    
    </div>
<div class="form-group form-inline justify-content-center col-sm-12">
<a href="{{ route('materias.index') }}" class="btn btn-danger btn-user">                
     Salir
</a>
</div>
</div>