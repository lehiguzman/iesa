<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Iesa - Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body  style="background-color: #DAD2D0;">

  <div class="container">
    <div class="col-lg-12 p-3 mb-2 form-inline" style="background-color: #760105;">
        <img class="col-sm-2" src="{{ asset('img/logo-iesa-portada.jpg')}}">
        <div class="col-md-10 text-center text-white">
        <span><h2>Instituto de Estudios Superiores de Administración</h2></span>
        </div>
    </div>
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">          
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center p-4 mb-4" style="background-color: #760105;">
                 <h1 class="h4 text-white">Bienvenidos al Sistema de Control y Gestión Académica</h1>
              </div>
              <form class="user" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row form-inline justify-content-center">
                  <div class="mb-3 col-md-4">
                    <select id="tipo_cedula" name="tipo_cedula" class="form-control">
                      <option value="V">V</option>
                      <option value="E">E</option>
                    </select>
                    <input type="text" class="form-control form-control-user" id="cedula" name="cedula" value="{{ old('cedula') }}" placeholder="Cedula" required autofocus>
                     @if ($errors->has('cedula'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cedula') }}</strong>
                        </span>
                    @endif                     
                  </div>
                </div>
                <div class="form-group row justify-content-center">
                  <div class="mb-3 col-md-4">
                    <input type="text" class="form-control form-control-user " id="name" name="name" value="{{ old('name') }}" placeholder="Nombre" required autofocus>
                     @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif                     
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control form-control-user" id="lastname" name="lastname" value="{{ old('lastname') }}" placeholder="Apellido" required>
                    @if ($errors->has('lastname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                    @endif   
                  </div>
                </div>
                <div class="form-group row justify-content-center">
                  <div class="mb-3 col-md-4">
                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Usuario" value="{{ old('username') }}" required>                   
                      @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                      @endif
                  </div>      
                  <div class="col-md-4">
                  <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required>   
                  @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                  @endif                              
                  </div>
                </div>
                <div class="form-group row justify-content-center">
                  <div class="col-md-4 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Contraseña" required>
                  </div>                    
                  <div class="col-md-4">
                    <input type="password" class="form-control form-control-user"  id="password-confirm" name="password_confirmation" placeholder="Comprobar contraseña" required>                            
                  </div>
                </div>                                
                <div class="form-group form-inline justify-content-center">
                  <div class="col-md-4">
                      <button type="submit" class="btn btn-primary btn-user btn-lg justify-content-center">
                        Registrar
                      </button>    
                  </div>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="{{ url('login') }}"class="btn btn-danger btn-user btn-lg justify-content-center"> Cancelar </a>
                                                     
                    </div>                   
                    <div class="form-group form-inline text-center p-5">                      
                        Nota: El sistema automatiza todas las funciones de control de estudio de la institución para ofrecer un servicio eficiente a la comunidad IESA.                      
                    </div>
                <hr>                
              </form>             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}" ></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('js/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
