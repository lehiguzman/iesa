<div class="form-group row">
    <div class="form-group form-inline justify-content-center col-sm-12">         
        <H4><b>Contenido : </b> {{ $materia->nombre }}</H4>        
    </div>
    <input type="hidden" name="materia_id" value="{{ $materia->id }}">
    <input type="hidden" name="periodo_id" value="{{ $periodo->id }}">
    <input type="hidden" name="prof_id" value="{{ Auth::user()->id }}">
</div>  
<div class="form-group row">
    <div class="form-group form-inline justify-content-center col-sm-12">  
        <table class="table table-bordered" width="100%" cellspacing="0">                  
                  <thead>                    
                    <tr>
                      <th width="20%">Estudiante</th>   
                      <th width="50%">Calificación</th>                                                                               
                    </tr>
                  </thead>                 
                  <tbody>
                    @foreach($inscriptions as $inscription)
                    <tr> 
                      <td>
                        @foreach($users as $user)
                            @if($user->id == $inscription->user_id)
                                {{ $user->name }} {{ $user->lastname }}
                            @endif
                        @endforeach
                      </td>
                      <td>
                        <input type="text" class="form-control-user form-control{{ $errors->has('nota') ? ' is-invalid' : '' }} col-sm-4 text-center" name="nota[]" placeholder="Ingrese Calificación" }}"
                          @foreach($notas as $nota)
                            @if($nota->user_id == $inscription->user_id)
                              value="{{ $nota->nota }}"
                            @endif 
                          @endforeach
                        >
                      </td>
                      <input type="hidden" name="user_id[]" value="{{ $inscription->user_id }}">                                            
                    </tr>
                    @endforeach                  
                   </tbody>
            </table>                   
        
    </div>
</div>    
<div class="form-group form-inline justify-content-center col-sm-12">
    <button type="submit" class="btn btn-primary btn-user" value="{{ __('Registrar') }}">
        Registrar
    </button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ route('notas.index') }}" class="btn btn-danger btn-user">                
         Salir
    </a>
</div>
