<div class="form-group row">
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }} col-sm-4 text-center" id="titulo" name="titulo" value="{{ $periodo->titulo }}" placeholder="Titulo de la oferta académica" required>
    @if ($errors->has('titulo'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('titulo') }}</strong>
            </span>
    @endif
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">         
    <select id="tipoOferta" name="tipo" class="form-control">
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
    <div class="form-group form-inline justify-content-center col-sm-12" id="divSelOfertas">             
            <select id="oferta_id" name="oferta_id" class="form-control">
                    <option value="" selected disabled>Seleccione oferta académica</option>
                @foreach($ofertas as $oferta)
                    <option value="{{ $oferta->id }}" @if($oferta->id == $periodo->oferta_id) selected @endif>{{ $oferta->nombre }}</option>
                @endforeach
        </select>        
        @if ($errors->has('oferta_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('oferta_id') }}</strong>
            </span>
        @endif      
    </div>
<div class="form-group form-inline justify-content-center col-sm-12">         
    <select id="tipoHorario" name="tipo" class="form-control">
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
    <div class="form-group form-inline justify-content-center col-sm-12" id="divSelHorarios">             
            <select id="horario_id" name="horario_id" class="form-control">
                    <option value="" selected disabled>Seleccione horario</option>
                @foreach($horarios as $horario)
                    <option value="{{ $horario->id }}" @if($horario->id == $periodo->horario_id) selected @endif>{{ $horario->lapso }}</option>
                @endforeach
            </select>        
        @if ($errors->has('horario_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('horario_id') }}</strong>
            </span>
        @endif      
    </div>
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }} col-sm-4 text-center" id="cantidad" name="cantidad" value="{{ $periodo->cantidad }}" placeholder="Cantidad de Estudiantes" required>
    @if ($errors->has('cantidad'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('cantidad') }}</strong>
            </span>
    @endif
</div> 
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <textarea id="descripcion" name="descripcion" class="form-control-user form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }} col-sm-4 text-center" placeholder="Descripción de la oferta académica">{{ $periodo->descripcion }}</textarea>
    @if ($errors->has('descripcion'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('descripcion') }}</strong>
            </span>
    @endif
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <textarea id="observacion" name="observacion" class="form-control-user form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }} col-sm-4 text-center" placeholder="Observación">{{ $periodo->observacion }}</textarea>
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