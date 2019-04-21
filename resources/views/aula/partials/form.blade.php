<div class="form-group row">
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }} col-sm-4 text-center" id="nombre" name="nombre" placeholder="Nombre de Aula" required>
    @if ($errors->has('nombre'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
    @endif
</div>      
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('capacidad') ? ' is-invalid' : '' }} col-sm-4 text-center" id="capacidad" name="capacidad" placeholder="Capacidad">
    @if ($errors->has('capacidad'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('capacidad') }}</strong>
            </span>
    @endif
</div> 
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <textarea id="descripcion" name="descripcion" class="form-control-user form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }} col-sm-4 text-center" placeholder="Descripción"></textarea>
    @if ($errors->has('descripcion'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('descripcion') }}</strong>
            </span>
    @endif
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">
<button type="submit" class="btn btn-primary btn-user" value="{{ __('Registrar') }}">
    Registrar
</button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="{{ route('aulas.index') }}" class="btn btn-danger btn-user">                
     Cancelar
</a>
</div>
  