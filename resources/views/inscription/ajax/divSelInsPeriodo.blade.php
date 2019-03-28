<div id="selInsPeriodo" class="form-group form-inline justify-content-center col-sm-12">
    <select name="periodo_id" class="form-control">
             <option id="">Seleccione oferta académica</option>
        @foreach($ofertas as $oferta)
            @foreach($periodos as $periodo)            
                @if($oferta->id == $periodo->oferta_id)
                    <option value="{{ $periodo->id }}">{{ $periodo->titulo }}</option>
                @endif
            @endforeach
        @endforeach        
    </select>
</div> 
