<div class="form-group row">
<div class="form-group form-inline justify-content-center col-sm-12">         
    <select id="tipo" name="tipo" class="form-control">
        <option value="" selected disabled>Seleccione tipo de horario</option>
        <option value="1">Diurno</option>
        <option value="2">Nocturno</option>
        <option value="3">Fin de Semana</option>
    </select>    
    @if ($errors->has('tipo'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tipo') }}</strong>
            </span>
    @endif
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('lapso') ? ' is-invalid' : '' }} col-sm-4 text-center" id="lapso" name="lapso" placeholder="Lapso del horario" required>
    @if ($errors->has('lapso'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('lapso') }}</strong>
            </span>
    @endif
</div>    
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <textarea id="descripcion" name="descripcion" class="form-control-user form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }} col-sm-4 text-center" placeholder="Descripción del horario"></textarea>
    @if ($errors->has('descripcion'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('descripcion') }}</strong>
            </span>
    @endif
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <textarea id="observacion" name="observacion" class="form-control-user form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }} col-sm-4 text-center" placeholder="Observación"></textarea>
    @if ($errors->has('observacion'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('observacion') }}</strong>
            </span>
    @endif
</div> 
<div class="form-group form-inline justify-content-center col-sm-12">
<button type="submit" class="btn btn-primary btn-user" value="{{ __('Registrar') }}">
    Registrar
</button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="{{ route('horarios.index') }}" class="btn btn-danger btn-user">                
     Cancelar
</a>
</div>
  