<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Iesa - Loginq</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json">


  <!-- Font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/fondo.css') }}" rel="stylesheet">
  <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/dropify.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/fonts/*') }}">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #A1002C;">
      <div class="col-xs-12" style="height:35px;"></div>
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex p-4 mb-4 align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3"><img src="{{ asset('img/logo-portada.jpg')}}"></div>
      </a>
      <div class="col-xs-12" style="height:45px;"></div>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tablet"></i>
          <span>Menu Principal</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
       @if(Auth::user()->tipo == 1)
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Administración</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">            
            <a class="collapse-item" href="{{ url('/users') }}">Usuarios</a>            
            <a class="collapse-item" href="{{ url('/ofertas') }}">Oferta Académica</a>
            <a class="collapse-item" href="{{ url('/horarios') }}">Horarios</a>
            <a class="collapse-item" href="{{ url('/materias') }}">Contenidos</a>
            <a class="collapse-item" href="{{ url('/periodos') }}">Abrir Oferta</a>            
          </div>
        </div>
      </li>
      @endif
      @if(Auth::user()->tipo == 3 or Auth::user()->tipo == 1)
      <!-- Nav Item - Utilities Collapse Menu -->         
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-pencil-alt"></i>
          <span>Estudiantes</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">            
            <a class="collapse-item" href="{{ url('/users') }}">Datos personales</a>
            <a class="collapse-item" href="{{ url('/inscriptions') }}">Inscripción</a>            
          </div>
        </div>
      </li>
     @endif
      <!-- Divider 
      <hr class="sidebar-divider">

           Heading 
      <div class="sidebar-heading">
        Addons
      </div> -->
      @if(Auth::user()->tipo == 2 or Auth::user()->tipo == 1)
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Profesores</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">            
            <a class="collapse-item" href="{{ url('/users') }}">Datos personales</a>          
            <a class="collapse-item" href="{{ url('/notas') }}">Notas</a>          
          </div>
        </div>
      </li>      
      @endif
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseReports">
          <i class="fas fa-fw fa-table"></i>
          <span>Reportes</span>
        </a>
        <div id="collapseReports" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">            
           <a class="collapse-item" href="{{ url('/ofertasIndex') }}">Ofertas Académicas</a>
           <a class="collapse-item" href="{{ url('/notasIndex') }}">Notas</a>
          </div>
        </div>
      </li>      

      <!-- Nav Item - Charts -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCharts" aria-expanded="true" aria-controls="collapseCharts">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Estadisticas</span>
        </a>
        <div id="collapseCharts" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">            
            <a class="collapse-item" href="{{ url('/inscritos') }}">Estudiante inscritos <br> &nbsp;&nbsp;&nbsp;&nbsp; por mes</a>
            <a class="collapse-item" href="{{ url('/inscritoXOferta') }}">Estudiante inscritos <br> &nbsp;&nbsp;&nbsp;&nbsp; por Oferta</a>
          </div>
        </div>
      </li>      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">        
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
     
        <!-- Topbar -->
        <nav class="navbar navbar-expand d-flex navbar-light topbar mb-5 py-5 static-top shadow color-fondo">
          <div class="col-sm-1">
            <a href="http://www.aacsb.edu/" target="_blank">
              <img src="{{ asset('img/logos/aacsb.png') }}" style="height: 60px; width: 60px;">           
            </a>
          </div>
          <div>
            <a href="http://www.mbaworld.com/" target="_blank">
              <img src="{{ asset('img/logos/amba.png') }}" style="height: 90px; width: 90px;">
            </a>
          </div>
          <div class="p-5 col-lg-7 text-center">              
              <h2 class="m-2">Instituto de Estudios Superiores de Administración</h2>
              <h4>Bienvenidos al Sistema de Control y Gestión Académica</h4>
          </div>
          <div class="col-sm-1">
            <a href="http://www.efmd.org/" target="_blank">
              <img src="{{ asset('img/logos/equis.png') }}" style="height: 60px; width: 60px;">           
            </a>
          </div>
          <div>
            <a href="http://www.naspaa.org/" target="_blank">
              <img src="{{ asset('img/logos/naspaa.png') }}" style="height: 80px; width: 80px;">
            </a>                 
                            
          </div>                 

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">                       
            
            <div class="topbar-divider d-none d-sm-block"></div>
            
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline small text-dark">{{ Auth::user()->name . " " .Auth::user()->lastname }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('storage/avatar/'.Auth::user()->avatar) }}">                
              </a>  
              <div class="row my-0">
                {{ now()->format('d/m/Y g:i A') }}
              </div>            
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">                  
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
            </li>

          </ul>

        </nav>

        <!-- End of Topbar -->

        

              @yield('contenido')           

           
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright my-auto text-center">
            

            <span>Copyright &copy; Iesa 2019 - 
              <a href="https://twitter.com/IESA" target="_blank">@iesa</a> 
              <a href="https://twitter.com/cursosiesa" target="_blank">@cursosiesa</a> 
              <a href="https://twitter.com/maestriasiesa" target="_blank">@maestriasiesa</a> 
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
              <a href="http://www.iesa.edu.ve/contactanos" target="_blank">CONTACTANOS</a></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">        
        <div class="modal-body">Selecciona "Salir" para cerrar tu sesión.</div>
        <div class="modal-footer">
          <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Salir</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
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

  <!-- Page level plugins -->
  <script src="{{ asset('datatables/jquery.dataTables.min.js') }} "></script>
  <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/scripts.js') }}"></script>

  <script src="{{ asset('dist/js/dropify.js') }}"></script>

</body>

</html>

