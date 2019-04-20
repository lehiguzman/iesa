<div class="form-group row">
<div class="form-group form-inline justify-content-center col-sm-12">         
    <select id="tipo" name="tipo" class="form-control">
        <option value="" selected disabled>Seleccione tipo de oferta</option>
        <option value="1" @if($oferta->tipo == 1) selected @endif>Postgrado</option>
        <option value="2" @if($oferta->tipo == 2) selected @endif>Diplomado</option>
        <option value="3" @if($oferta->tipo == 3) selected @endif>PAG</option>
    </select>    
    @if ($errors->has('tipo'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tipo') }}</strong>
            </span>
    @endif
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }} col-sm-4 text-center" id="nombre" name="nombre" value="{{ $oferta->nombre }}" placeholder="Nombre de la oferta académica" required>
    @if ($errors->has('nombre'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
    @endif
</div>    
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <textarea id="descripcion" name="descripcion" class="form-control-user form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }} col-sm-4 text-center" placeholder="Descripción de la oferta académica">
        {{ $oferta->descripcion }}
    </textarea>
    @if ($errors->has('descripcion'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('descripcion') }}</strong>
            </span>
    @endif
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <textarea id="observacion" name="observacion" class="form-control-user form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }} col-sm-4 text-center" placeholder="Observación">{{ $oferta->observacion }}</textarea>
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
<a href="{{ route('ofertas.index') }}" class="btn btn-danger btn-user">                
     Cancelar
</a>
</div>