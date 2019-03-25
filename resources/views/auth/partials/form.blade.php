<div class="form-group row">
<div class="form-group form-inline justify-content-center col-sm-12">         
    <select id="tipo_cedula" name="tipo_cedula" class="form-control">
        <option value="V">V</option>
        <option value="E">E</option>
    </select>
    <input type="text" class="form-control-user form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }} col-sm-3 text-center" id="cedula" name="cedula" placeholder="Cédula" required>
    @if ($errors->has('cedula'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('cedula') }}</strong>
            </span>
    @endif
</div>  
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
    <input type="text" class="form-control-user form-control{{ $errors->has('tel_movil') ? ' is-invalid' : '' }} col-sm-4 text-center" id="tel_movil" name="tel_movil" placeholder="Telefono Móvil" required>
    @if ($errors->has('tel_movil'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tel_movil') }}</strong>
            </span>
    @endif
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('tel_local') ? ' is-invalid' : '' }} col-sm-4 text-center" id="tel_local" name="tel_local" placeholder="Telefono Local" required>
    @if ($errors->has('tel_local'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tel_local') }}</strong>
            </span>
    @endif
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <textarea id="direccion" name="direccion" class="form-control-user form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }} col-sm-4 text-center" placeholder="dirección de habitación">        
    </textarea>
    @if ($errors->has('direccion'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('direccion') }}</strong>
            </span>
    @endif
</div>  
@if(Auth::user()->tipo == 1)    
<div class="form-group form-inline justify-content-center col-sm-10">
    <select class="form-control col-sm-2"  id="tipo" name="tipo" required>
        <option value="" disabled selected>Perfil de Usuario</option>
        <option value="1">Administrador</option>
        <option value="2">Profesor</option>
        <option value="3">Estudiante</option>
    </select>
</div>
@endif
<div class="form-group form-inline justify-content-center col-sm-12">    
    <div class="col-sm-4">
        <input class="dropify" type="file" name="avatar" id="avatar" data-height="60">   
    </div>
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="{{ route('users.index') }}" class="btn btn-danger btn-user">                
     Cancelar
</a>
</div>
  