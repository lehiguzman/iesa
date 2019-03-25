    <div class="form-group form-inline justify-content-center col-sm-12" id="divSelOfertas">             
        	<select id="oferta_id" name="oferta_id" class="form-control">
        			<option value="" selected disabled>Seleccione oferta académica</option>
        		@foreach($ofertas as $oferta)
        			<option value="{{ $oferta->id }}">{{ $oferta->nombre }}</option>
        		@endforeach
        	</select>        
        @if ($errors->has('oferta_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('oferta_id') }}</strong>
            </span>
        @endif      
    </div>