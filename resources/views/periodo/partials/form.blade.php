<div class="form-group row">
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }} col-sm-4 text-center" id="titulo" name="titulo" placeholder="Titulo de la oferta académica" required>
    @if ($errors->has('titulo'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('titulo') }}</strong>
            </span>
    @endif
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">         
    <select id="tipoOferta" class="form-control" required>
        <option value="" selected disabled>Seleccione tipo de oferta</option>
        <option value="1">Postgrado</option>
        <option value="2">Diplomado</option>
        <option value="3">PAG</option>
    </select>    
</div>  
<div id="divSelOfertas">    
</div>    
<div class="form-group form-inline justify-content-center col-sm-12">         
    <select id="tipoHorario" class="form-control" required>
        <option value="" selected disabled>Seleccione tipo de horario</option>
        <option value="1">Diurno</option>
        <option value="2">Nocturno</option>
        <option value="3">Fin de Semana</option>
    </select>    
</div>
<div id="divSelHorarios">    
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }} col-sm-4 text-center" id="cantidad" name="cantidad" placeholder="Cantidad de Estudiantes" required>
    @if ($errors->has('cantidad'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('cantidad') }}</strong>
            </span>
    @endif
</div> 
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <textarea id="descripcion" name="descripcion" class="form-control-user form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }} col-sm-4 text-center" placeholder="Descripción de la oferta académica"></textarea>
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
<a href="{{ route('periodos.index') }}" class="btn btn-danger btn-user">                
     Cancelar
</a>
</div>
  