<?php 
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
  <title>Compras | Registros</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
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
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header bg-success">
                <h3 class="card-title">Registro de Ventas</h3>
                <div class="card-tools">
                  
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body col-4">
                <!-- TABLA EMPLEADOS -->
                <form method="POST" name="formulario_registro_ventas_t" id="formulario_registro_ventas_t">
                       
                            <div class="invoice p-3 mb-3">
                                <div class="row invoice-info">
                                    <div class="col-sm-2 invoice-col user-block">
                                        <img src="../dist/img/logo-n.png" alt="user image" class="img-circle img-bordered-sm">
                                    </div>
                                    
                                    <address class="text-center">
                                        <h4>
                                             <strong>FINCA LA VACA CAFÉ</strong>
                                        </h4>
                                        Calle la India,
                                        <br>
                                        Comunidad el Progreso,
                                        <br>
                                        poligono A, lote #4,
                                        <br>
                                        barrio San Juan,
                                        Cojutepeque, Cuscatlán.
                                    </address> 

                                    <div class="col-sm-2 invoice-col user-block">
                                        <img src="../dist/img/ues-a.png" alt="user-avatar" class="img-circle img-bordered-sm float-right">
                                    </div>
                                    <br>
                                    <p class="text-muted">NRC: </p><p class="text-muted col-4" id="nrc_v"> ...    </p> <p class="text-muted">NIT: </p> <p class="text-muted col-6" id="nit_v"> ...</p>
                                    
                                    <br>
                                    <p class="text-muted col-12 text-center" id="nit_v"> Giro: Compra y Venta de Ganado</p>
                                    
                                    <br>
                                    <p class="text-muted col-6 text-center" id="fecha_v">dd/mm/yyyy</p><p class="text-muted text-center col-6" id="hora_v">hh:mm:ss</p>                                            
                                    <br>
                                    <p class="text-muted col-12 text-center" id="cliente_v">...</p>                       
                                    <br>
                                    <p class="text-muted text-center col-12" id="ticket_v">000000</p>
                                            
                                    
                                    <!-- /.col -->
                                   
                                </div>
                                
                                <p class="text-muted col-12 text-center" id="ticket_v">-----------------------------------------------------------------------------------</p>
                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <div id="tb_Detalle_Derivados_Ver_t"></div> 
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <p class="text-muted col-12 text-center" id="ticket_v">-----------------------------------------------------------------------------------</p>
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <div class="table-responsive">
                                            <p class="text-muted text-center col-12" id="subt_v">Sumas: $</p>
                                            <p class="text-muted text-center col-12" id="total_v">Total Cancelado: $</p>  
                                        </div>
                                        <br>
                                        <br>
                                        <div class="table-responsive">
                                            <p class="text-muted col-12" id="vendedor_v">...</p>
                                             
                                        </div>
                                        <button class="btn bg-success" type="button" data-dismiss="modal">
                                                <i class="fas fa-print"></i>
                                                Imprimir
                                        </button>
                                        <div class="form-group float-sm-right">
                                            <button class="btn bg-success" type="button" data-dismiss="modal">
                                                <i class="fas fa-check"></i>
                                                Listo
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                    </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


      


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
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="../Scripts/registro_ventas.js"></script> 
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
