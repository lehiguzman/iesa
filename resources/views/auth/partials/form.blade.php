<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('name') ? ' is-invalid' : '' }} col-sm-4 text-center" id="name" name="name" placeholder="Nombre" required>
    @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
    @endif
</div>    
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }} col-sm-4 text-center" id="lastname" name="lastname" placeholder="Apellido" required>
    @if ($errors->has('lastname'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('lastname') }}</strong>
            </span>
    @endif
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }} col-sm-4 text-center" id="username" name="username" placeholder="Usuario" required>
    @if ($errors->has('username'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
    @endif
</div>                
<div class="form-group form-inline justify-content-center col-sm-12">
    <input type="email" class="form-control-user form-control{{ $errors->has('email') ? ' is-invalid' : '' }} col-sm-4 text-center" id="email" name="email" placeholder="Correo electrónico" required>
    @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
    @endif
</div>     
<div class="form-group form-inline justify-content-center col-sm-12">
    <input type="password" class="form-control-user form-control{{ $errors->has('password') ? ' is-invalid' : '' }} col-sm-4 text-center" id="password" name="password" placeholder="Password" required>
    @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert" >    
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>
<div class="form-group form-inline justify-content-center col-sm-12">
    <input type="password" class="form-control form-control-user col-sm-4 text-center" id="password-confirm" name="password_confirmation" placeholder="Comprobar contraseña" required>
</div> 
<div class="form-group form-inline justify-content-center col-sm-12">
<button type="submit" class="btn btn-primary btn-user" value="{{ __('Registrar') }}">
    Registrar
</button>
<a href="{{ route('users.index') }}" class="btn btn-danger btn-user">                
     Cancelar
</a>
</div>
  