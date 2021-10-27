<!DOCTYPE html>
<html lang="es">
    <head>        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Producto | Registro</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
        <!-- BS Stepper -->
        <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
        <!-- dropzonejs -->
        <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">

        <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <?php
                require_once ('../Menus/menusidebar.php');
            ?>

            <!-- CCONTENIDO DE LA PÁGINA -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header bg-success">
                            <h3 class="card-title ">Producto</h3>
                            <div class="card-tools" id="registrar_producto">
                                <a class="btn btn-success " href="javascript:void(0)" id="btn_nuevo_producto" data-toggle="modal">
                                    <i class="fas fa-plus-circle"></i>
                                    Nuevo
                                </a>
                            </div>
                        </div>

                        <div class="col-xs-12">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-10">
                            <div id="resultados"></div>
                        </div>
                        <div class="col-xs-1"></div>
                    </div>

                        <!-- TABLA PRODUCTOS -->
                        <div class="card-body p-0" id="tablaPro"> 
                        </div>
                        
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- MODAL GUARDAR s-->
            <div class="modal fade" id="mod_add_producto">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <form method="POST" name="addProducto" id="addProducto">
                            <div class="modal-header bg-success">
                                <h4 class="modal-title">Productos | Nuevo</h4>
                                <button
                                    type="button"
                                    class="close"
                                    data-dismiss="modal"
                                    aria-label="Close"
                                    >
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">                               
                                <input type="hidden" id="almacenar_datos" name="almacenar_datos" value="datonuevo">
                                <div class="row">
                                        <div class="col-md-6">
                                            <label for="nombre_Producto">Nombre</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                </div>                                            
                                                <input type="text" class="form-control" placeholder="Leche..."
                                                    id="nombre_Producto" name="nombre_Producto" required="required">
                                            </div>
                                            <label for="descrip_Producto">Descripción Producto</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-comments"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control"  placeholder="Queso Especial..."
                                                id="descrip_Producto" name="descrip_Producto" required="required"
                                                >
                                            </div>
                                            <label for="fechav_Producto">Fecha Vencimiento</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-calendar"></i>
                                                    </span>
                                                </div>
                                                <input
                                                    type="date"
                                                    class="form-control"
                                                    id="fechav_Producto" name="fechav_Producto" required="required"
                                                >
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="precio_Producto">Precio</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-dollar-sign"></i>
                                                        </span>
                                                    </div>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        placeholder="0.00"
                                                        id="precio_Producto" name="precio_Producto" required="required"
                                                    >
                                                </div>
                                                <label for="existencia_Producto">Existencia</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-book"></i>
                                                        </span>
                                                    </div>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        placeholder="7"
                                                        id="existencia_Producto" name="existencia_Producto"
                                                        required="required"
                                                    >
                                                </div>
                                                   
                                                <label for="categoria_Producto">Categoría</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-folder"></i>
                                                    </span>
                                                    <select class="form-control"
                                                      name="categoria_Producto" id="categoria_Producto">
                                                        <option value="">Seleccione</option>
                                                    </select>
                                                </div>                                                                   
                                                <label for="estado_Producto">Estado</label>  
                                                <div class="input-group mb-3">         
                                                    <div class="form-group clearfix">
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" value="activo" id="radio_activo" name="estado_Producto" checked disabled>
                                                            <label for="radio_activo">
                                                                Activo
                                                            </label>
                                                        </div>
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" value="inactivo" id="radio_inactivo" name="estado_Producto" disabled>
                                                            <label for="radio_inactivo">
                                                                Inactivo
                                                            </label>
                                                        </div>                                              
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div>
                                    <button id="limpiar" name="limpiar" type="reset" class="btn bg-success ">
                                        <i class="fas fa-trash"></i> Limpiar</button>

                                        <button type="submit" class="btn bg-success"><i class="fa fa-save"></i> Guardar</button>
                                </div>
                            </div>    
                        </form>
                    </div>
                </div>
            </div>


            <!-- MODAL EDITAR -->
            <div class="modal fade" id="modalProductoEdit">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                         <form method="POST" name="editProducto" id="editProducto">
                                <div class="modal-header bg-success">
                                    <h4 class="modal-title">Producto | Editar</h4>
                                    <button
                                        type="button"
                                        class="close"
                                        data-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                        <input type="hidden" name="editar_datos" value="datoeditar">
                                        <input type="hidden" name="id_producto_edit" id="id_producto_edit">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nombre_Producto_edit">Nombre</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Leche..."
                                            id="nombre_Producto_edit" name="nombre_Producto_edit" required="required">
                                        </div>
                                        <label for="descrip_Producto_edit">Descripción Producto</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-comments"></i>
                                                </span>
                                            </div>
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Queso Especial..."
                                                id="descrip_Producto_edit" name="descrip_Producto_edit" required="required"
                                            >
                                        </div>
                                        <label for="fechav_Producto_edit">Fecha Vencimiento</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </span>
                                            </div>
                                            <input
                                                type="datetime-local"
                                                class="form-control"
                                                id="fechav_Producto_edit" name="fechav_Producto_edit" required="required"
                                            >
                                        </div>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="precio_Producto_edit">Precio</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </span>
                                                </div>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    placeholder="0.00"
                                                    id="precio_Producto_edit" name="precio_Producto_edit" required="required"
                                                >
                                            </div>
                                            <label for="existencia_Producto_edit">Existencia</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-book"></i>
                                                        </span>
                                                    </div>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        placeholder="7"
                                                        id="existencia_Producto_edit" name="existencia_Producto_edit"
                                                        required="required"
                                                    >
                                                </div>
                                                    <label for="categoria_Producto_edit">Categoría</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-folder"></i>
                                                    </span>
                                                    <select class="form-control"
                                                      name="categoria_Producto_edit" id="categoria_Producto_edit">
                                                        <option value="">Seleccione</option>
                                           
                                                    </select>
                                                </div> 

                                                <label for="estado_Producto">Estado</label>  
                                                    <div class="form-group clearfix">
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" value="activo" id="radio_activo_edit" name="estado_producto_edit" checked>
                                                            <label for="radio_activo_edit">
                                                                Activo
                                                            </label>
                                                        </div>
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" value="inactivo" id="radio_inactivo_edit" name="estado_producto_edit" >
                                                            <label for="radio_inactivo_edit">
                                                                Inactivo
                                                            </label>
                                                        </div>                                              
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer float-right">
                                            <button type="submit" class="btn bg-success" >
                                                <i class="fa fa-check"></i>Listo
                                            </button>
                                        </div>
                                        <div>
                                   
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>


          <!-- MODAL ADVERTENCIA -->          
            <div class="modal fade" id="modalBajaProducto"> 
                <div class="modal-dialog">
                    <div class="modal-content "> 
                        <form method="POST" name="confirmaBaja" id="confirmaBaja">
                            <input type="hidden" name="baja_datos" value="datobaja">
                            <div class="modal-header bg-success " >
                                <h4 class="modal-title ">ADVERTENCIA!</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">Este Producto no se puede eliminar por que está relacionado con información valiosa&hellip;</p>
                                 <p class="text-center">¿Está seguro de realizar esta acción?</p> 
                                 <input type="hidden" name="id_baja" id="id_baja">    
                                
                            </div> 
                            <div class="form-group  text-center">
                                    <button type="submit" class="btn bg-success">
                                        Si
                                    </button>
                                    <a class="btn bg-success" data-toggle="modal" data-target="" data-dismiss="modal">
                                                No
                                    </a>                                    
                                </div>    
                        </form>                         
                        </div>
                    </div>
                 </div>
            </div>

                <!-- /.content -->
            </div>

            
            <footer class="main-footer">
              <div class="float-right d-none d-sm-block">
              </div>
              <strong>UES &copy; 2021</strong>
              Todos los Derechos Reservados
            </footer>
            <aside class="control-sidebar control-sidebar-dark"></aside>
        </div>
       
        <!-- jQuery -->
        <script src="../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->        
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="../plugins/select2/js/select2.full.min.js"></script>
        <!-- Bootstrap4 Duallistbox -->
        <script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
        <!-- InputMask -->
        <script src="../plugins/moment/moment.min.js"></script>

        <script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
        <!-- date-range-picker -->
        <script src="../plugins/daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap color picker -->
        <script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Bootstrap Switch -->
        <script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
        <!-- BS-Stepper -->
        <script src="../plugins/bs-stepper/js/bs-stepper.min.js"></script>
        <!-- dropzonejs -->
        <script src="../plugins/dropzone/min/dropzone.min.js"></script>
        <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Toastr -->
        <script src="../plugins/toastr/toastr.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js"></script>  
        <script src="../Scripts/funciones_productos.js"></script>      
            
        <script>
                $(function () {
                    //Initialize Select2 Elements
                    $('.select2').select2()

                    //Initialize Select2 Elements
                    $('.select2bs4').select2({
                    theme: 'bootstrap4'
                    })

                    //Datemask dd/mm/yyyy
                    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
                    //Datemask2 mm/dd/yyyy
                    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
                    //Money Euro
                    $('[data-mask]').inputmask()

                    //Date picker
                    $('#reservationdate').datetimepicker({
                        format: 'L'
                    });

                    //Date and time picker
                    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

                    //Date range picker
                    $('#reservation').daterangepicker()
                    //Date range picker with time picker
                    $('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'MM/DD/YYYY hh:mm A'
                    }
                    })
                    //Date range as a button
                    $('#daterange-btn').daterangepicker(
                    {
                        ranges   : {
                        'Today'       : [moment(), moment()],
                        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                        },
                        startDate: moment().subtract(29, 'days'),
                        endDate  : moment()
                    },
                    function (start, end) {
                        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                    }
                    )

                    //Timepicker
                    $('#timepicker').datetimepicker({
                    format: 'LT'
                    })

                    //Bootstrap Duallistbox
                    $('.duallistbox').bootstrapDualListbox()

                    //Colorpicker
                    $('.my-colorpicker1').colorpicker()
                    //color picker with addon
                    $('.my-colorpicker2').colorpicker()

                    $('.my-colorpicker2').on('colorpickerChange', function(event) {
                    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                    })

                    $("input[data-bootstrap-switch]").each(function(){
                    $(this).bootstrapSwitch('state', $(this).prop('checked'));
                    })

                })
                // BS-Stepper Init
               

        </script>

  
    </body>
</html>