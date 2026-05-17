<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>SisPETI</title>
    <meta name="description" content="Sistema de Gestion de Proyectos">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome/css/font-awesome.min.css">
    <!--script src="/assets/js/jquery-3.2.1.min.js"></script-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    
    <link rel="stylesheet" href="admin-panel/css/admin.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="admin-panel/plugins/tagsinput/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="admin-panel/plugins/summernote/summernote.css">
    <link rel="stylesheet" href="admin-panel/plugins/bootstrap-slider/slider.css">
    <link rel="stylesheet" href="admin-panel/plugins/bootstrap-multiselect/bootstrap-multiselect.css">
    <link rel="stylesheet" href="admin-panel/css/admin-skins.css">
    
    <!-- Librería Quill -->

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="/assets/js/plugins/sweetalert.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

  </head>
  <body class="app sidebar-mini rtl">
    @include('includes.header')
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <?php 
          $Nombre = explode(" ", auth()->user()->Nombre);
          $Apellido = explode(" ", auth()->user()->Apellido);
      ?>
      <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="https://ui-avatars.com/api/?background=3949A3&color=fff&name={{ $Nombre[0] }} {{ $Apellido[0] }}" alt="User Image">
        <div> 
          <p class="app-sidebar__user-name">{{ $Nombre[0] }} {{ $Apellido[0] }}</p>
        </div>
      </div>
      @include('includes.sidebar')
    </aside>
    <main class="app-content">
      <!-- page start-->
      @yield('content')
      <!-- page end-->
    </main>
  
    <?php session_start(); ?>
    @if(isset($_SESSION['ALERTA']))
      <script>
        swal("<?= $_SESSION['ALERTA'] == "success" ? "Good job!" : "Oops!" ?>", "<?= $_SESSION['MENSAJE'] ?>", {
          icon: "<?= $_SESSION['ALERTA'] ?>",
          buttons: {
            confirm: {
              className: "btn btn-<?= $_SESSION['ALERTA'] == "error" ? "danger" : $_SESSION['ALERTA'] ?>",
            },
          },
          timer: 3000,
        });
      </script>
    <?php
    unset($_SESSION['ALERTA']);
    unset($_SESSION['MENSAJE']);
    session_destroy();
    ?>
    @endif

    <!-- Essential javascripts for application to work-->
    <!--script src="/assets/js/jquery-3.2.1.min.js"></script-->
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="/assets/js/plugins/pace.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="/assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <!-- Page specific javascripts-->
    <script src="/assets/js/functions.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('scripts')
  </body>
</html>