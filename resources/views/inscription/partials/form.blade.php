<div class="form-group row">
<div class="form-group form-inline justify-content-center col-sm-12">         
        <H4>Estudiante : {{ Auth::user()->name . " " .Auth::user()->lastname }}</H4>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
</div>
<div class="form-group form-inline justify-content-center col-sm-12">         
    <select id="tipoPerIns" name="tipo" class="form-control">
        <option value="" selected disabled>Seleccione tipo de oferta</option>
        <option value="1">Postgrado</option>
        <option value="2">Diplomado</option>
        <option value="3">PAG</option>
    </select>    
    @if ($errors->has('tipo'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tipo') }}</strong>
            </span>
    @endif
</div>  
<div id="selInsPeriodo" class="form-group form-inline justify-content-center col-sm-12">
        
</div>
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <textarea id="observacion" name="observacion" class="form-control-user form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }} col-sm-4 text-center" placeholder="Comentario"></textarea>
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
<a href="{{ route('inscriptions.index') }}" class="btn btn-danger btn-user">                
     Cancelar
</a>
</div>
  