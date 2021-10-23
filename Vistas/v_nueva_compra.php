<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Compra | Nueva</title>
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
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <?php
                require_once ('../Menus/menusidebar.php');
            ?>
            <!-- CONTENIDO DE LA PAGINA -->
            <div class="content-wrapper">               
                <section class="content-header">
                    <div class="container-fluid">                        
                    </div>
                </section>


                <!-- FROMULARIO VENTA -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-success">
                                        <h3 class="card-title">Compras</h3>
                                    </div>
                                    <form action="enhanced-results.html">
                                        <div class="row">
                                            <div class="col-md-10
                                                offset-md-1">
                                                <div class="row">
                                                    <div class="col-6">
		                                                <div class="form-group">
		                                                    <label>Proveedor</label>
		                                                    <div class="input-group
		                                                    mb-3">
		                                                        <select class="form-control">
		                                                            <option selected="selected">Todos</option>
		                                                            <option>Salinera Turcios</option>
		                                                            <option>Agroservicio El Frutal</option>
		                                                            <option>Agua El Manantial</option>
		                                                            <option>Finca Cuscatlán</option>
		                                                        </select>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                            <div class="col-3">
		                                            	<div class="form-group">
		                                                    <label>Tipo Documento</label>
		                                                    <select class="form-control">
		                                                        <option selected="selected">Factura</option>
		                                                        <option>Ticket</option>
		                                                        <option>Crédito Fiscal</option>
		                                                    </select>
		                                                </div>		                                                
		                                            </div>
		                                            <div class="col-3">
		                                            	<div class="form-group">
		                                                    <label>No. Documento</label>
		                                                    <input type="text" onkeypress="return controltag(event)" class="form-control" id="descrip_compra" placeholder="1234567">
		                                                </div>
		                                              
		                                            </div>
		                                            
		                                            <div class="col-12">
		                                                <div class="form-group">
										                    <label for="">Descripción</label>
										                    <input type="text" class="form-control" id="descrip_compra" placeholder="Nueva Compra">
										                 </div>
								                	</div>
									                <div class="col-6">
		                                                <div class="form-group">
										                    <label for="">Sitio de Compra</label>
										                    <input type="text" class="form-control" id="sitio_compra" placeholder="San Vicente">
										                </div>
									                </div>
									                <div class="col-3">
		                                                <div class="form-group">
		                                                    <label>Fecha Compra</label>
		                                                    <div class="input-group mb-3">
		                                                        <input type="datetime-local" class="form-control
		                                                        disabled" placeholder="Juan...">
		                                                    </div>
		                                                </div>
		                                            </div>
		                                            <div class="col-3">
		                                                  <div class="form-group">
		                                                    <label>Fecha Sistema</label>
		                                                    <div class="input-group mb-3">
		                                                        <input type="text" class="form-control" value="<?php echo date('d/m/Y G:i:s');?>" disabled>
		                                                    </div>
		                                                </div>
		                                            </div>
                                                </div>
                                                
                                                <div class="form-group
                                                    text-center">
                                                    <a class="btn                                                        
                                                        bg-success" data-toggle="modal" data-target="#modalAgregar">
                                                        <i class="fas
                                                        fa-shopping-cart"></i>
                                                        Agregar
                                                        Producto
                                                    </a>
                                                    <a class="btn                                                        
                                                        bg-success">
                                                        <i class="fa
                                                            fa-trash"></i>
                                                        Limpiar
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- DETALLTE DE LA VENTA (TABLA) -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="col-12 table-responsive">
                                         <div class="col-12 table-responsive">
                                            <div id="tablaDetalle"></div>
                                            <div class="col-2 float-sm-right">
                                                <label>Total</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="00.00"
                                                    disabled
                                                >
                                            </div>
                                            <div class="col-2 float-sm-right">
                                                <label>Iva</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="00.00"
                                                    disabled
                                                >
                                            </div>
                                            <div class="col-2 float-sm-right">
                                                <label>SubTotal</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="00.00"
                                                    disabled
                                                >
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="form-group float-sm-right">
                                            <a class="btn
                                                bg-success" href="../Vistas/r_factura_venta.html">
                                                <i class="fas
                                                fa-check"></i>
                                                Comprar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>               
            </div>

             <!--MODAL DE CLIENTE-->
            <div class="modal fade" id="modal-xlCliente">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 class="modal-title">Clientes</h4>
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
                            <div class="card">
                                <div class="card-header">
                                    <form action="enhanced-results.html">
                                        <div class="row">
                                            <div class="col-md-10
                                                offset-md-1">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Buscar</label>
                                                            <div class="input-group
                                                                mb-3">
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    placeholder="Dui-Nombre"
                                                                >
                                                                <div class="input-group-append">
                                                                     <a class="btn bg-success" >
                                                                        <i class="fas fa-search"></i>                                                       
                                                                     </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- TABLA DE SELECCION -->
                                <div class="card-body p-0">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Dui</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th style="width: 40px">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>12345678-9</th>
                                                <td>Juan</td>
                                                <td>Hernádez</td>
                                                <td>
                                                    <div class="form-group text-center">
                                                        <a class="">
                                                            <button type="button" class="btn btn-outline-primary">
                                                                <i class="fa fa-check"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer float-right">
                            <a class="btn bg-success" data-dismiss="modal">
                                <i class="fa fa-check"></i>Listo
                            </a>
                        </div>
                    </div>
                </div>
            </div>   

            <!--MODAL DE BUSQUEDA PARA PRODUCTO-->
            <div class="modal fade" id="modalAgregar"> 
                <form  method="POST" name="buscaProducto" id="buscaProducto">               
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h4 class="modal-title">Añadir Producto</h4>
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
                                <div class="card">
                                   
                                    <div class="card-header">
                                       
                                            <div class="row">
                                                <div class="col-md-10
                                                    offset-md-1">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Buscar</label>
                                                                <div class="input-group
                                                                    mb-3">
                                                                    <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        placeholder="Leche-Bovino"
                                                                        disabled
                                                                    >
                                                                    <div class="input-group-append">
                                                                        <button type="submit" class="btn btn-default">
                                                                            <i class="fa fa-search"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>Seleccionar</label>
                                                                <div class="input-group
                                                                    mb-3">
                                                                    <select class="form-control" name="t_producto" id="t_producto">
                                                                        <option value="" selected="selected">Seleccione</option>
                                                                        <option value="lechederivados">Leche o Derivados</option>
                                                                        <option value="bovinos">Bovinos</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>                                  
                                    </div>
                                    <!-- TABLA QUE MUESTRA LOS PRODUCTOS -->
                                    <div class="card-body p-0" id="tb_seleccion">                                        
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="modal-footer float-right">
                                <a class="btn bg-success" data-dismiss="modal">
                                    <i class="fa fa-check"></i>Listo
                                </a>
                            </div>
                        </div>
                    </div>
                </form>   
            </div>
           
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">                    
                </div>
                <strong>UES &copy; 2021</strong>
                Todos los Derechos Reservados
            </footer>
           
            <aside class="control-sidebar control-sidebar-dark">
            </aside>           
        </div>
       
        <!-- jQuery -->
        <script src="../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Select2 -->
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
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.min.js"></script>
        
        <script src="../dist/js/demo.js"></script> 

        <script src="../Scripts/detcompra.js"></script>
        <script src="../Scripts/agregarproducto.js"></script>


        <!-- PARA PERMITIR SOLO NUMEROS -->
        <script type="text/javascript"> function controltag(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true;
        else if (tecla==0||tecla==9)  return true;
       // patron =/[0-9\s]/;// -> solo letras
        patron =/[0-9\s]/;// -> solo numeros
        te = String.fromCharCode(tecla);
        return patron.test(te);
        }
        </script>
       
      

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
            document.addEventListener('DOMContentLoaded', function () {
              window.stepper = new Stepper(document.querySelector('.bs-stepper'))
            })
          
            // DropzoneJS Demo Code Start
            Dropzone.autoDiscover = false
          
            // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
            var previewNode = document.querySelector("#template")
            previewNode.id = ""
            var previewTemplate = previewNode.parentNode.innerHTML
            previewNode.parentNode.removeChild(previewNode)
          
            var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
              url: "/target-url", // Set the url
              thumbnailWidth: 80,
              thumbnailHeight: 80,
              parallelUploads: 20,
              previewTemplate: previewTemplate,
              autoQueue: false, // Make sure the files aren't queued until manually added
              previewsContainer: "#previews", // Define the container to display the previews
              clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
            })
          
            myDropzone.on("addedfile", function(file) {
              // Hookup the start button
              file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
            })
          
            // Update the total progress bar
            myDropzone.on("totaluploadprogress", function(progress) {
              document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
            })
          
            myDropzone.on("sending", function(file) {
              // Show the total progress bar when upload starts
              document.querySelector("#total-progress").style.opacity = "1"
              // And disable the start button
              file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
            })
          
            // Hide the total progress bar when nothing's uploading anymore
            myDropzone.on("queuecomplete", function(progress) {
              document.querySelector("#total-progress").style.opacity = "0"
            })
          
            // Setup the buttons for all transfers
            // The "add files" button doesn't need to be setup because the config
            // `clickable` has already been specified.
            document.querySelector("#actions .start").onclick = function() {
              myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
            }
            document.querySelector("#actions .cancel").onclick = function() {
              myDropzone.removeAllFiles(true)
            }
            // DropzoneJS Demo Code End
        </script>
    </body>
</html>
