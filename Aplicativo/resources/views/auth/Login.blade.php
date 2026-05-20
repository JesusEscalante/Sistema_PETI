<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="assets/js/plugins/sweetalert.min.js"></script>

    <title>SisPETI</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo text-center py-3 mb-0">
        <img class="img-fluid" width="120px" src="assets/img/logo.png" />
        <h2 class="mt-3" style="font-weight:400">Sistema de Planes Estratégicos de TI</h2>
      </div>
      <div class="login-box">
        <form class="login-form" action="{{ url('login') }}" method="POST">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Iniciar Sesión</h3>
          <div class="form-group">
            <label class="control-label">Usuario</label>
            <input class="form-control" name="TxtCorreo" type="email" placeholder="Usuario..." value="{{ old('TxtCorreo') }}" required autofocus>
          </div>
          <div class="form-group">
            <div class="d-flex justify-content-between">  
              <label class="control-label">Contraseña</label>
              <!--a href="/recuperar">Olvidaste tu contraseña?</a-->
            </div>
            <input class="form-control" name="TxtClave" type="password" required placeholder="Clave...">
          </div>
          
          <div class="form-group btn-container">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>Iniciar Sesión</button>
          </div>
        </form>
      </div>
    </section>

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
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/js/plugins/pace.min.js"></script>
  </body>
</html>