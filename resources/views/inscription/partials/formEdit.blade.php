<div class="form-group row">
<div class="form-group form-inline justify-content-center col-sm-12">         
        <H4>Estudiante : {{ Auth::user()->name . " " .Auth::user()->lastname }}</H4>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
</div>
<div class="form-group form-inline justify-content-center col-sm-12">         
    <select id="tipoPerIns" name="tipo" class="form-control">
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
<div id="selInsPeriodo" class="form-group form-inline justify-content-center col-sm-12">
    <select name="periodo_id" class="form-control">
             <option id="">Seleccione oferta académica</option>
        @foreach($ofertas as $oferta)
            @foreach($periodos as $periodo)            
                @if($oferta->id == $periodo->oferta_id)
                    <option value="{{ $periodo->id }}" @if($periodo->id == $inscription->periodo_id) selected @endif>{{ $periodo->titulo }}</option>
                @endif
            @endforeach
        @endforeach        
    </select>
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <textarea id="observacion" name="observacion" class="form-control-user form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }} col-sm-4 text-center" placeholder="Comentario">{{ $inscription->observacion }}</textarea>
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
  