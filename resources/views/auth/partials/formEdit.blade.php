<div class="form-group row">    
<div class="form-group form-inline justify-content-center col-sm-12">
    <select id="tipo_cedula" name="tipo_cedula" class="form-control">
        <option value="V" @if($user->tipo_cedula == 'V') selected @endif>V</option>
        <option value="E" @if($user->tipo_cedula == 'E') selected @endif>E</option>
    </select>  
    <input type="text" class="form-control-user form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }} col-sm-3 text-center" id="cedula" name="cedula" value="{{ $user->cedula }}"  placeholder="Cédula" required>
    @if ($errors->has('cedula'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('cedula') }}</strong>
            </span>
    @endif
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('name') ? ' is-invalid' : '' }} col-sm-4 text-center" id="name" name="name" value="{{ $user->name }}" placeholder="Nombre" required>
    @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
    @endif
</div>    
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }} col-sm-4 text-center" id="lastname" name="lastname" value="{{ $user->lastname }}" placeholder="Apellido" required>
    @if ($errors->has('lastname'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('lastname') }}</strong>
            </span>
    @endif
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">         
    <select id="sexo" name="sexo" class="form-control">
        <option value="M" @if($user->sexo == 'M') selected @endif>Hombre</option>
        <option value="F" @if($user->sexo == 'F') selected @endif>Mujer </option>
    </select>
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }} col-sm-4 text-center" id="username" name="username" value="{{ $user->username }}" placeholder="Usuario" required>
    @if ($errors->has('username'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
    @endif
</div>                
<div class="form-group form-inline justify-content-center col-sm-12">
    <input type="email" class="form-control-user form-control{{ $errors->has('email') ? ' is-invalid' : '' }} col-sm-4 text-center" id="email" name="email" value="{{ $user->email }}" placeholder="Correo electrónico" required>
    @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
    @endif
</div>
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('tel_movil') ? ' is-invalid' : '' }} col-sm-4 text-center" id="tel_movil" name="tel_movil" value="{{ $user->tel_movil }}" placeholder="Telefono Móvil">
    @if ($errors->has('tel_movil'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tel_movil') }}</strong>
            </span>
    @endif
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <input type="text" class="form-control-user form-control{{ $errors->has('tel_local') ? ' is-invalid' : '' }} col-sm-4 text-center" id="tel_local" name="tel_local" value="{{ $user->tel_local }}" placeholder="Telefono Local">
    @if ($errors->has('tel_local'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tel_local') }}</strong>
            </span>
    @endif
</div>  
<div class="form-group form-inline justify-content-center col-sm-12">                  
    <textarea id="direccion" name="direccion" class="form-control-user form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }} col-sm-4 text-center" placeholder="dirección de habitación">{{ $user->direccion }}</textarea>
    @if ($errors->has('tel_movil'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tel_movil') }}</strong>
            </span>
    @endif
</div>  
@if(Auth::user()->tipo == 1)       
<div class="form-group form-inline justify-content-center col-sm-10">
    <select class="form-control col-sm-2"  id="tipo" name="tipo" required>
            <option value="" @if($user->tipo == "") selected="selected" @endif disabled>
                Seleccione Perfil
            </option>
            <option value="1" @if($user->tipo == 1) selected="selected" @endif >
                Administrador
            </option>            
            <option value="2" @if($user->tipo == 2) selected="selected" @endif >
                Profesor
            </option>
            <option value="3" @if($user->tipo == 3) selected="selected" @endif >
                Estudiante
            </option>
    </select>
</div>
@else
    <input type="hidden" name="tipo" value="{{ $user->tipo }}">
@endif

<div class="form-group form-inline justify-content-center col-sm-12">    
    <div class="col-sm-4">
        <input class="dropify" type="file" name="avatar" id="avatar" data-height="60" data-default-file="{{ asset('storage/avatar/'.$user->avatar) }}">   
    </div>
</div>
<div class="form-group form-inline justify-content-center col-sm-12">
    <input type="password" class="form-control-user form-control{{ $errors->has('password') ? ' is-invalid' : '' }} col-sm-4 text-center" id="password" name="password" placeholder="Password">
    @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert" >    
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>
<div class="form-group form-inline justify-content-center col-sm-12">
    <input type="password" class="form-control form-control-user col-sm-4 text-center" id="password-confirm" name="password_confirmation" placeholder="Confirmación de contraseña">
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
  