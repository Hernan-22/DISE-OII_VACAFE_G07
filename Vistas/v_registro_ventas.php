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
              <div class="card-body">
                <!-- TABLA EMPLEADOS -->
                <div class="card-body p-0" id="tabla_registro_ventas"> 
                </div>
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


        <!-- MODAL DE LA VENTA REALIZADA FACTURA, CRÉDITO FISCAL-->
        <div class="modal fade" id="md_ver_venta">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form method="POST" name="formulario_registro_ventas" id="formulario_registro_ventas">
                        <div class="modal-header bg-success">
                            <h4 class="modal-title">Venta</h4>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="invoice p-3 mb-3">
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        <img src="../dist/img/logo-n.png" alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col text-center">
                                        <address>
                                            <h4>
                                                <strong>FINCA LA VACA CAFÉ</strong>
                                            </h4>
                                            CALLE LA INDIA
                                            <br>
                                            COMUNIDAD EL PROGRESO
                                            <br>
                                            POLIGONO A, LOTE 4
                                            <br>
                                            BARRIO SAN JUAN,
                                            COJUTEPEQUE.
                                            </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <img src="../dist/img/ues-a.png" alt="user-avatar" class="img img-fluid float-right">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row invoice-info">
                                    <div class="col-sm-6 invoice-col">
                                        Proveedor
                                        <address>
                                                <strong id="proveedor">...</strong>                   
                                        </address>
                                    </div>
                                        <!-- /.col -->
                                    <div class="col-sm-3 invoice-col">
                                        Tipo de Documento
                                        <address>
                                                <strong id="tipo_doc">...</strong>                      
                                         </address>
                                    </div>
                                        <!-- /.col -->
                                    <div class="col-sm-3 invoice-col">
                                        No.Documento
                                        <address>
                                            <strong id="num_doc">#</strong>                            
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">                
                                        Descripción
                                        <address>
                                            <strong id="descrip">...</strong> 
                                        </address>
                                    </div>
                                    <div class="col-sm-3">                
                                        Fecha de Compra
                                        <address>
                                            <strong id="fecha_compra">dd/mm/yyyy</strong> 
                                        </address>
                                    </div>
                                    <div class="col-sm-3">                
                                        Fecha de Sistema
                                        <address>
                                            <strong id="fecha_sistema">dd/mm/yyyy</strong> 
                                        </address>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <div id="tb_Detalle_Derivados_Ver"></div> 
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <div class="col-12 table-responsive">
                                            <div id="tablaDetalleDerivados"></div>        
                                        </div>
                                        <div class="col-2 float-sm-right">
                                            <label>Total</label>
                                            <input id="total_compra" name="Total_compra" type="text" class="form-control" placeholder="$00.00" contenteditable="false" readonly="true">
                                        </div>
                                        <div class="col-2 float-sm-right">
                                            <label>Iva</label>
                                            <input id="iva_compra" name="Iva_compra" type="text" class="form-control" placeholder="$00.00" contenteditable="false" readonly="true">
                                        </div>
                                        <div class="col-2 float-sm-right">
                                            <label>SubTotal</label>
                                            <input id="subtotal_compra" name="Subtotal_compra"  type="text" class="form-control" placeholder="$00.00" contenteditable="false" readonly="true">
                                        </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                        <div class="form-group float-sm-right">
                                            <button class="btn bg-success" type="button" data-dismiss="modal">
                                                <i class="fas fa-check"></i>
                                                Listo
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>


        <!-- MODAL DE LA VENTA REALIZADA TICKET-->
        <div class="modal fade" id="md_ver_venta_ticket">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" name="formulario_registro_ventas_t" id="formulario_registro_ventas_t">
                        <div class="modal-header bg-success">
                            <h4 class="modal-title">Venta</h4>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="invoice p-3 mb-3">
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        <img src="../dist/img/logo-n.png" alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col text-center">
                                        <address>
                                            <h4>
                                                <strong>finca la vaca café</strong>
                                            </h4>
                                            Calle la india
                                            <br>
                                            comunidad el progreso
                                            <br>
                                            poligono a, lote 4
                                            <br>
                                            barrio san juan,
                                            cojutepeque.
                                        </address>
                                    </div>
                                    <div class="row">
                                                
                                            <br>
                                            NRC: <p class="login-box-msg" id="nrc_v">...        </p>
                                            NIT: <p class="login-box-msg" id="nit_v">...</p>
                                            <br>
                                            Giro: <p class="login-box-msg" id="nit_v">Compra y venta de Ganado</p>
                                            <br>
                                            Fecha: <p class="login-box-msg" id="fecha_v">dd/mm/yyyy     </p>Hora: <p class="login-box-msg" id="hora_v">hh:mm:ss</p>
                                            <br>
                                            Ticket: #<p class="login-box-msg" id="ticket_v">000000</p>
                                        
                                    </div>    
                                    
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <img src="../dist/img/ues-a.png" alt="user-avatar" class="img img-fluid float-right">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="dropdown-divider"></div>                                
                                <!-- /.row -->
                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <div id="tb_Detalle_Derivados_Ver_t"></div> 
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <div class="col-12 table-responsive">
                                            <div id="tablaDetalleDerivados"></div>        
                                        </div>
                                        <div class="col-2 float-sm-right">
                                            <label>Total</label>
                                            <input id="total_compra" name="Total_compra" type="text" class="form-control" placeholder="$00.00" contenteditable="false" readonly="true">
                                        </div>
                                        <div class="col-2 float-sm-right">
                                            <label>Iva</label>
                                            <input id="iva_compra" name="Iva_compra" type="text" class="form-control" placeholder="$00.00" contenteditable="false" readonly="true">
                                        </div>
                                        <div class="col-2 float-sm-right">
                                            <label>SubTotal</label>
                                            <input id="subtotal_compra" name="Subtotal_compra"  type="text" class="form-control" placeholder="$00.00" contenteditable="false" readonly="true">
                                        </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                        <div class="form-group float-sm-right">
                                            <button class="btn bg-success" type="button" data-dismiss="modal">
                                                <i class="fas fa-check"></i>
                                                Listo
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>



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
