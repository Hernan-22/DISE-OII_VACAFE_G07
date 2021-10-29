<?php 
    @session_start(); 
    $_SESSION['bloquear_pantalla']="si";

 ?>
<!DOCTYPE html>
<html lang="es">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Login | Administrador</title>

      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../dist/css/adminlte.min.css">
      <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">     
    </head>

<body class="hold-transition login-page">
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-success">
        <div class="card-header text-center">
          <a class="h1"><b>La Vaca</b> Café</a>
        </div>
        <div class="card-body">
         <div class="col-12 text-center">
            <img src="../dist/img/logo-n.png" alt="user-avatar" class="img-circle img-fluid">
            <br>
             <b><p class="login-box-msg"><?php print $_SESSION['empleado'] ? $_SESSION['empleado']:"" ?></p></b>
          </div>
          <br>
          <p class="login-box-msg">Pantalla Bloqueada</p>

           <form id="formulario_desbloqueo1" name="formulario_desbloqueo1" method="post">
            <input type="hidden" name="desbloquear" value="si_con_contrasena">  
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Contraseña" id="contra_desbloqueo" name="contra_desbloqueo"
              required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-key"></span>
                </div>
              </div>
            </div>
            <div class="row">              
              <!-- /.col -->
              <div class="col-6">
                <button type="submit" class="btn btn-success btn-block" style="margin-left: 50%;">Desbloquear</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

         
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="../Scripts/inicio_sesion.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="../plugins/jquery/jquery.min.js"></script>
  </body>
</html>


















<!--<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bloqueo | Administrador</title>

 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition lockscreen">

<div class="card-body">
  <div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
      <a href="../index2.html"><b>La Vaca</b> Café</a>
    </div>
 User name
    <div class="lockscreen-name">Kathy</div>

    
        <div class="lockscreen-item">
          lockscreen image 
          <div class="lockscreen-image">
            <img src="../dist/img/user-icon.png" alt="User Image">
          </div>
        

        
          <form class="lockscreen-credentials">
            <div class="input-group">
              <input type="password" class="form-control" placeholder="password">

              <div class="input-group-append">
                <button type="button" class="btn">
                  <i class="fas fa-arrow-right text-muted"></i>
                </button>
              </div>
            </div>
          </form>
        

        </div>
 
    <div class="help-block text-center">
      Ingrese su contraseña para desbloquear la pantalla
    </div>  
    <div class="lockscreen-footer text-center">
     <strong>UES &copy; 2021</strong>
                  Todos los Derechos Reservados
    </div>
  </div>
</div>

<script src="../plugins/jquery/jquery.min.js"></script>

<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>-->
