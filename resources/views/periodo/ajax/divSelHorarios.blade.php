    <div class="form-group form-inline justify-content-center col-sm-12" id="divSelHorarios">             
            <select id="horario_id" name="horario_id" class="form-control">
                    <option value="" selected disabled>Seleccione horario</option>
                @foreach($horarios as $horario)
                    <option value="{{ $horario->id }}">{{ $horario->lapso }}</option>
                @endforeach
            </select>        
        @if ($errors->has('horario_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('horario_id') }}</strong>
            </span>
        @endif      
    </div>