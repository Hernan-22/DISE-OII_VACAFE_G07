<?php 
    date_default_timezone_set('America/El_Salvador');
    @session_start();
    if (isset($_SESSION['logueado']) && $_SESSION['logueado']=="si") {

        $_SESSION['compra'] = null;
        if ($_SESSION['bloquear_pantalla']=="no") {
            // code...
            
        }else{
             
            header("Location: ../Vistas/v_bloquear_pantalla.php");
             
        }
    }else{
          header("Location: ../Vistas/index.php");
    } 
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>usuarios | Perfil</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- CONTENIDO DE LA PAGINA -->
            <?php
                require_once ('../Menus/menusidebar.php');
            ?>
            <?php
                require_once ('../Menus/loader.php');               
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Perfil</h1>
                            </div>
                            
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="callout callout-info" id="nombre_perfil_mayus">
                                    <h5>
                                        <img src="<?php print $_SESSION['foto'] ?>" alt="user-avatar" class="img-circle img-fluid"> <strong id="nombre_perf" >....</strong> <strong id="apellido_perf">....</strong>
                                    </h5>

                                </div>
                                <nav class="navbar navbar-expand navbar-white navbar-light">

                                        <ul class="navbar-nav ml-auto ">                  
                        
                                            <li class="nav-item dropdown">
                                                   
                                                <a class="nav-link brand-link" data-toggle="dropdown" href="javascript:void(0)" >
                                                    <div class="user-block">
                                                        <i class="fas fa-cogs"></i> 
                                                    </div>                                                 
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                                    <a href="../Vistas/v_usuarios.php" class="dropdown-item">
                                                        <i class="fas fa-user mr-2"></i> Editar datos de Usuario                            
                                                    </a>

                                                    <div class="dropdown-divider"></div>
                                                    
                                                    <a href="../Vistas/v_empleados.php" class="dropdown-item">
                                                        <i class="fas fa-user mr-2"></i> Editar datos de Empleado                               
                                                    </a>                            
                                                </div>
                                            </li>
                                        </ul>                                
                                    </nav>
                                

                                <!-- Main content -->
                                <div class="invoice p-3 mb-3">
                                    <!-- title row -->
                                    <div class="row">
                                        <div class="col-4">
                                            <h4>
                                                <i class="fas fa-user"></i>
                                                Detalles de Usuario
                                            </h4>                                            
                                        </div>
                                        <div class="col-6">
                                            <h4>
                                                <i class="fas fa-user"></i>
                                                Detalles de Empleado
                                            </h4>                                            
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">     
                                            <address>                                                
                                                <br>
                                                <i class="fas fa-lg fa-bookmark" style="color: #117a8b;"></i>
                                                <b>Nombre:</b> <strong id="nombre_per_user">....</strong>
                                                <br>
                                                <i class="fas fa-lg fa-envelope" style="color: #117a8b;"></i>
                                                <b>Correo:</b> <strong id="correo_per">finca@gmail.com</strong>
                                                <br>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">         
                                            <address>                                               
                                                <br>
                                                <span class="fa-li"><i class="fas fa-lg fa-id-card" style="color: #117a8b;"></i></span>
                                                <b>DUI:</b> <strong id="dui_per">00000000-0</strong>
                                                <br>
                                                <span class="fa-li"><i class="fas fa-lg fa-signature" style="color: #117a8b;"></i></span>
                                                <b>Nombre:</b> <strong id="nombre_per">.....</strong>
                                                <br>
                                                <span class="fa-li"><i class="fas fa-lg fa-signature" style="color: #117a8b;"></i></span>
                                                <b>Apellido:</b> <strong id="apellido_per">.....</strong>
                                                <br>
                                                <span class="fa-li"><i class="fas fa-lg fa-child" style="color: #117a8b;"></i></span>
                                                <b>Edad:</b> <strong id="edad_per">....</strong>
                                                <br>                                               
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <br>
                                            <span class="fa-li"><i class="fas fa-lg fa-bookmark" style="color: #117a8b;"></i></span>
                                            <b>Cargo:</b> <strong id="cargo_per">.....</strong>
                                            <br>
                                            <span class="fa-li"><i class="fas fa-lg fa-phone" style="color: #117a8b;"></i></span>
                                            <b>Telefono:</b> <strong id="telefono_per">.....</strong>
                                            <br>
                                            <span class="fa-li"><i class="fas fa-lg fa-building" style="color: #117a8b;"></i></span>
                                            <b>Dirección:</b> <strong id="direc_per">.....</strong>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                   
                                </div>
                                <!-- /.invoice -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
             <footer class="main-footer">
                <div class="float-right d-none d-sm-block">                    
                </div>
                <strong>UES &copy; 2021</strong>
                Todos los Derechos Reservados
            </footer>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here --></aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        <!-- jQuery -->
        <script src="../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js"></script>
        <script src="../Scripts/perfil.js"></script>
        
    </body>
</html>
