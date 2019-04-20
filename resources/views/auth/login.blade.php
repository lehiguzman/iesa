<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon"/>

  <title>Iesa - Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body style="background-color: #DAD2D0;">

  <div class="container">
     <div class="col-lg-12 p-3 mb-2 form-inline" style="background-color: #4C0305;">
        <img class="col-sm-2" src="{{ asset('img/logo-iesa-portada.jpg')}}">
        <div class="col-md-10 text-center text-white">
        <span><h2>Instituto de Estudios Superiores de Administración</h2></span>
        </div>
     </div>
    <!-- Outer Row -->
    <div class="row justify-content-center">
      

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">              
              <div class="col-lg-12" >
                <div class="p-5">
                  <div class="text-center p-4 mb-4" style="background-color: #4C0305;">
                    <h1 class="h4 text-white">Bienvenidos al Sistema de Control y Gestión Académica</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group col-md-12 form-inline justify-content-center">                       
                        <input id="login" type="text" class="form-control form-control-user col-md-6" aria-describedby="emailHelp" name="login" value="{{ old('login') }}" placeholder="Ingrese su usuario" required autofocus>
                         @if ($errors->has('login'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('login') }}</strong>
                            </span>
                        @endif
                    </div>                                         
                    <div class="form-group col-md-12 form-inline justify-content-center">
                        <input id="password" type="password" class="form-control form-control-user col-md-6" name="password" placeholder="Contraseña" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>                    
                    <div class="form-group form-inline justify-content-center">
                      <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-user btn-lg justify-content-center">
                          Acceder
                        </button>    
                      </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                         
                        <button type="button" class="btn btn-danger btn-user btn-lg justify-content-center">
                          Cancelar
                        </button>                                   
                    </div>                   
                    <div class="form-group form-inline text-center p-3">                      
                        Nota: El sistema automatiza todas las funciones de control de estudio de la institución para ofrecer un servicio eficiente a la comunidad IESA.                      
                    </div>
                  </form>
                  <hr>                                 
                  <div class="text-center">
                    <a class="small" href="{{ route('register') }}">Crear una cuenta</a>
                  </div>
                </div>
              </div>
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

