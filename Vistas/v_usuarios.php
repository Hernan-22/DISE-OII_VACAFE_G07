<!DOCTYPE html>
<html lang="es">
    <head>        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Usuarios | Registro</title>
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
            <?php
                require_once ('../Menus/loader.php');
            ?>


            <!-- CCONTENIDO DE LA PÁGINA -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        </div>
                    </div>
                  
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="card">
                        <div class="card-header bg-success">
                            <h3 class="card-title ">Usuarios</h3>
                            <div class="card-tools">
                                <a class="btn btn-success " href="#md_registrar_usuario" data-toggle="modal">
                                    <i class="fas fa-plus-circle"></i>
                                    Nuevo
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-10"></div>
                    </div>

                        <!-- TABLA EMPLEADOS -->
                        <div class="card-body p-0" id="datos_tabla"> 
                        </div>
                    </div>                   
                </section>  

                <!-- MODAL EDITAR --> 
                <div class="modal fade" id="md_edit_usuario">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form method="POST" name="formulario_registro" id="formulario_registro">
                                <div class="modal-header bg-success">
                                    <h4 class="modal-title">Usuarios | Editar</h4>
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
                                    <input type="hidden" id="almacenar_datos" name="almacenar_datos" value="si_actualizar_usuario">
                                    <input type="hidden" id="llave_usuario" name="llave_usuario" value="si_registro">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span>
                                                    *
                                                </span>
                                                <label>Empleado</label>
                                                <div class="input-group mb-3">
                                                     <span class="input-group-text">
                                                            <i class="fas fa-user"></i>
                                                        </span>
                                                    <select class="form-control" id="empleado_usuario" name="empleado_usuario">
                                                    </select>
                                                </div>
                                                 <span>
                                                       *
                                                    </span>
                                                    <label for="correo_usuario">Correo</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-envelope"></i>
                                                            </span>
                                                        </div>
                                                        <input type="email" class="form-control" placeholder="juan@gmail.com" autocomplete="off"  required
                                                        id="correo_usuario" name="correo_usuario" >
                                                    </div>    
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span>
                                                       *
                                                    </span>
                                                    <label for="nombre_usuario">Nombre Usuario</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-user-tie"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="juan" autocomplete="off"
                                                        id="nombre_usuario" name="nombre_usuario" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-user-tie"></i>
                                                            </span>
                                                        </div>
                                                         <input id="imagen_bovino" name="imagen_bovino" data-buttonText="Seleccionar" type="file" class="fileinput-button" data-buttonname="btn-success">
                                                    </div>                         
                                                </div>
                                            </div>
                                        </div>
                                    <div>
                                        <button id="limpiar" name="limpiar" type="reset" class="btn bg-success ">
                                            <i class="fas fa-trash"></i> Limpiar</button>

                                        <button type="submit" class="btn bg-success"><i class="fa fa-save"></i> Guardar</button>
                                        <span>
                                           * Campo Requerido
                                        </span>
                                    </div>
                                </div>    
                            </form>
                        </div>
                    </div>
                </div> 

                <!-- MODAL EDIT PASSWORD -->
                <div class="modal fade" id="md_edit_password">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form method="POST" name="formulario_mod_pass" id="formulario_mod_pass">
                                <div class="modal-header bg-success">
                                    <h4 class="modal-title">Usuarios | Contraseña</h4>
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
                                    <input type="hidden" id="mod_contrasena" name="mod_contrasena" value="si_mod_contrasena">
                                    <input type="hidden" id="id_usuario" name="id_usuario" value="si_registro">
                                        <div class="row">
                                            <div class="col-md-6">                                                
                                                <span>
                                                    *
                                                </span>
                                                <label for="contrasena_usuario">Contraseña</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-key"></i>
                                                            </span>
                                                        </div>
                                                        <input type="password" class="form-control" autocomplete="off"
                                                        id="contrasena_usuario" name="contrasena_usuario" required minlength="5">
                                                    </div>
                                            </div>
                                            <div class="col-md-6">         
                                                <span>
                                                    *
                                                </span>
                                                <label for="recontrasena_usuario">Repita su Contraseña</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-key"></i>
                                                            </span>
                                                        </div>
                                                        <input type="password" class="form-control" autocomplete="off"
                                                        id="recontrasena_usuario" name="recontrasena_usuario" required minlength="5">
                                                    </div>                                             
                                                
                                            </div>                                           
                                        </div>
                                    <div>
                                        <button id="limpiar" name="limpiar" type="reset" class="btn bg-success ">
                                            <i class="fas fa-trash"></i> Limpiar</button>

                                        <button type="submit" class="btn bg-success"><i class="fa fa-save"></i> Guardar</button>
                                        <span>
                                           * Campo Requerido
                                        </span>
                                    </div>
                                </div>    
                            </form>
                        </div>
                    </div>
                </div>  

                <!-- MODAL GUARDAR -->
                <div class="modal fade" id="md_registrar_usuario">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form method="POST" name="formulario_registro" id="formulario_registro">
                                <div class="modal-header bg-success">
                                    <h4 class="modal-title">Usuarios | Nuevo</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">                               
                                    <input type="hidden" id="almacenar_datos" name="almacenar_datos" value="datonuevo">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span>
                                                    *
                                                </span>
                                                <label>Empleado</label>
                                                <div class="input-group mb-3">
                                                     <span class="input-group-text">
                                                            <i class="fas fa-user"></i>
                                                        </span>
                                                    <select class="form-control" id="empleado_usuario" name="empleado_usuario">
                                                    </select>
                                                </div>
                                                <span>
                                                    *
                                                </span>
                                                <label for="nombre_usuario">Nombre Usuario</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-user-tie"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="juan" autocomplete="off"
                                                    id="nombre_usuario" name="nombre_usuario" required>
                                                </div>
                                                <span>
                                                       *
                                                </span>
                                                <label for="correo_usuario">Correo</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                         <span class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" placeholder="juan@gmail.com" autocomplete="off"  required
                                                    id="correo_usuario" name="correo_usuario" >
                                                </div>    
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span>
                                                        *
                                                    </span>
                                                    <label for="contrasena_usuario">Contraseña</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-key"></i>
                                                            </span>
                                                        </div>
                                                        <input type="password" class="form-control" autocomplete="off"
                                                        id="contrasena_usuario" name="contrasena_usuario" required minlength="5">
                                                    </div>
                                                    <span>
                                                        *
                                                    </span>
                                                    <label for="recontrasena_usuario">Repita su Contraseña</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-key"></i>
                                                            </span>
                                                        </div>
                                                        <input type="password" class="form-control" autocomplete="off"
                                                        id="recontrasena_usuario" name="recontrasena_usuario" required minlength="5">
                                                    </div>
                                                    <label for="contrasena_usuario">Seleccione uina Fotografía</label>

                                                    <div class="input-group mb-3">                       
                                                        <input id="imagen_expediente" name="imagen_expediente" data-buttonText="Seleccionar" type="file" class="filestyle" data-buttonname="btn-info">
                                                        <div class="table table-striped files" id="previews">
                  <div id="template" class="row mt-2">
                    <div class="col-auto">
                        <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                    </div>
                    <div class="col d-flex align-items-center">
                        <p class="mb-0">
                          <span class="lead" data-dz-name></span>
                          (<span data-dz-size></span>)
                        </p>
                        <strong class="error text-danger" data-dz-errormessage></strong>
                    </div>
                   
                    <div class="col-auto d-flex align-items-center">
                      <div class="btn-group">
                        <button class="btn btn-primary start">
                          <i class="fas fa-upload"></i>
                          <span>Start</span>
                        </button>
                        <button data-dz-remove class="btn btn-warning cancel">
                          <i class="fas fa-times-circle"></i>
                          <span>Cancel</span>
                        </button>
                        <button data-dz-remove class="btn btn-danger delete">
                          <i class="fas fa-trash"></i>
                          <span>Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                                                    </div>                         
                                                </div>
                                            </div>
                                        </div>
                                    <div>
                                        <button id="limpiar" name="limpiar" type="reset" class="btn bg-success ">
                                            <i class="fas fa-trash"></i> Limpiar</button>

                                        <button type="submit" class="btn bg-success"><i class="fa fa-save"></i> Guardar
                                        </button>
                                        <span>
                                           <small>* Campo Requerido</small> 
                                        </span>
                                    </div>
                                 </div>    
                            </form>
                        </div>
                    </div>
                </div>
            </div>             
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
        <!-- jquery-validation -->
        <script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="../plugins/jquery-validation/additional-methods.min.js"></script>

        <script src="../plugins/bootstrap-filestyle/js/bootstrap-filestyle.js"></script>
        <script src="../plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
        <!-- Toastr -->
        <script src="../plugins/toastr/toastr.min.js"></script>

       
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js"></script>  
        <script src="../Scripts/usuarios.js"></script> 
    </body>
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
     /* var previewNode = document.querySelector("#template")
      previewNode.id = ""
      var previewTemplate = previewNode.parentNode.innerHTML
      previewNode.parentNode.removeChild(previewNode)*/

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
</html>
