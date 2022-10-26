<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expediente | Registro</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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

    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php
            require_once ('../Menus/menusidebar.php');
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">
                    <div class="card card-success">
                        <div class="card-header">
                          <h1 class=" text-center">Modificación de Bovino</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-3 ">
                                <div class="image view view-first">
                                    <img class="thumb-image" style="width: 100%; display: block;" src="../img/vaca.png"
                                        alt="image" />
                                </div>
                                <span class="btn btn-success col fileinput-button">
                                    <i class="nav-icon far fa-image"></i>
                                    <span>Cambiar Imagen</span>
                                </span>
                                <div id="respuesta"></div>
                                <br>
                                <div class="image view view-first">
                                    <img class="thumb-image" style="width: 100%; display: block;" src="../img/carta1.jpg"
                                        alt="image" />
                                </div>
                                <br>
                                <span class="btn btn-success col fileinput-button">
                                    <i class="nav-icon far fa-image"></i>
                                    <span>Carta de venta</span>
                                </span>
                                <div id="respuestaC"></div>
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
                                        <div class="col-4 d-flex align-items-center">
                                            <div class="progress progress-striped active w-100" role="progressbar"
                                                aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                <div class="progress-bar progress-bar-success" style="width:0%;"
                                                    data-dz-uploadprogress></div>
                                            </div>
                                        </div>
                                        <div class="col-auto d-flex align-items-center">
                                            <div class="btn-group">
                                                <button class="btn btn-primary start">
                                                    <i class="fas fa-upload"></i>
                                                    <span>Start</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-md-8 col-xs-12 col-sm-12">
                               
                                <div class="container-fluid">
                                    <!-- SELECT2 EXAMPLE -->
                                    <br>
                                    <div class="card  ">
                                        <div class="card-header">
                                            <h3 class="card-title">Datos del Bovino</h3>
                                        </div>
                                    
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nombre</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-square"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="La Vaca Pinta">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Categoría</label>
                                                        <div class="input-group
                                                                 mb-3">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa fa-square"></i></span>
                                                            <select class="form-control">
                                                                <option>Seleccione</option>
                                                                <option>Novia</option>
                                                                <option>ternera</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <label>Descripción</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa fa-comments"></i></span>
                                                        </div>
                                                        <textarea name="textarea" class="form-control"
                                                            placeholder="vaca colorada vermeja" required="required" rows=""
                                                            cols=""></textarea>
    
                                                    </div>
    
                                                    <div class="form-group">
                                                        <label>Ultimo Parto</label>
                                                        <div class="input-group
                                                    mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fas
                                                                fa-calendar"></i>
                                                                </span>
                                                            </div>
                                                            <input type="date" class="form-control
                                                        disabled">
                                                        </div>
                                                    </div>
    
                                                    <!-- /.col fin-->
                                                </div>
    
                                                <!-- /.col inicio-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group clearfix">
                                                            <label>Estado</label>
                                                            <br>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" value="radio4" id="radioPrimary4"
                                                                    name="r4" checked>
                                                                <label for="radioPrimary4"> Activo</label>
                                                            </div>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" value="radio5" id="radioPrimary5"
                                                                    name="r4">
                                                                <label for="radioPrimary5"> Inactivo
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <br>
                                                            <label>Sexo</label>
                                                            <br>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="radio" value="radio1" id="radioPrimary1"
                                                                    name="r1" checked>
                                                                <label for="radioPrimary1"> Masculino </label>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" value="radio2" id="radioPrimary2"
                                                                        name="r1">
                                                                    <label for="radioPrimary2"> Femenino </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <label>Cantidad de Partos</label>
    
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-book"></i></span>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="7"
                                                                required="required">
                                                        </div>
                                                        <div class="form-group">
    
                                                            <label>Raza</label>
                                                            <div class="input-group
                                                            mb-3">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa fa-expand-arrows-alt"></i></span>
                                                                <select class="form-control">
                                                                    <option>Seleccione</option>
                                                                    <option>Holstein</option>
                                                                    <option>Jersey</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <div class="card-header">
                                                <h3 class="card-title">Datos del Propietario</h3>
                                            </div>
                                            <div class="card-body">
    
                                                <div class="row">
                                                    <div class="col-md-12">
    
                                                        <div class="form-group">
                                                            <label>Propietario</label>
                                                            <div class="input-group
                                                        mb-3">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa fa-square"></i></span>
                                                                <select class="form-control">
                                                                    <option>Seleccione</option>
                                                                    <option>Juan Orellana</option>
    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
    
                                            </div>
                                            <div class="card-header">
                                                <h3 class="card-title">Datos de Preñez</h3>
                                            </div>
                                            <div class="card-body">
    
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
    
                                                            <label>Fecha de Celo</label>
                                                            <div class="input-group
                                                                    mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas
                                                                                fa-calendar"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="date" class="form-control
                                                                        disabled   ">
                                                            </div>
    
                                                            <!-- /.form-group -->
    
                                                            <label>Fecha de Monta</label>
                                                            <div class="input-group
                                                                    mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas
                                                                                fa-calendar"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="date" class="form-control
                                                                        disabled">
                                                            </div>
    
                                                            <!-- /.form-group -->
                                                            <!-- /.form-group -->
    
                                                        </div>
                                                        <!-- /.col aqui agregar mas campos si es necesatio-->
                                                    </div>
    
                                                    <!-- /.col inicio-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <label>Fecha de Parto</label>
                                                            <div class="input-group
                                        mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas
                                                    fa-calendar"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="date" class="form-control
                                            disabled">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
    
                                            </div>
                                           
                                           
                                        
                                                    <div class="col-3 float-right">                           
                                                      <div class="card card-success ">                                                    
                                                       
                                                          <button type="button" class="btn btn-success fa fa-save swalDefaultWarning float-right">
                                                            Modicar
                                                          </button>
                                                         
                                                        
                                                        <!-- /.card -->
                                                      </div>
                                          
                                                    </div>
                                                    <!-- /.col -->
                                                  
                                                  <!-- ./row -->
                                                                                   
                                              
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                        </div>
                    </div>
                  
                </div>
            </div>
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

            <script src="../plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- SweetAlert2 -->
            <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
            <!-- Toastr -->
            <script src="../plugins/toastr/toastr.min.js"></script>
            <!-- AdminLTE App -->
            <script src="../dist/js/adminlte.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="../dist/js/demo.js"></script>
            <!-- Page specific script -->
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
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                            },
                            startDate: moment().subtract(29, 'days'),
                            endDate: moment()
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

                    $('.my-colorpicker2').on('colorpickerChange', function (event) {
                        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                    })

                    $("input[data-bootstrap-switch]").each(function () {
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

                myDropzone.on("addedfile", function (file) {
                    // Hookup the start button
                    file.previewElement.querySelector(".start").onclick = function () { myDropzone.enqueueFile(file) }
                })

                // Update the total progress bar
                myDropzone.on("totaluploadprogress", function (progress) {
                    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
                })

                myDropzone.on("sending", function (file) {
                    // Show the total progress bar when upload starts
                    document.querySelector("#total-progress").style.opacity = "1"
                    // And disable the start button
                    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
                })

                // Hide the total progress bar when nothing's uploading anymore
                myDropzone.on("queuecomplete", function (progress) {
                    document.querySelector("#total-progress").style.opacity = "0"
                })

                // Setup the buttons for all transfers
                // The "add files" button doesn't need to be setup because the config
                // `clickable` has already been specified.
                document.querySelector("#actions .start").onclick = function () {
                    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
                }
                document.querySelector("#actions .cancel").onclick = function () {
                    myDropzone.removeAllFiles(true)
                }
  // DropzoneJS Demo Code End
            </script>

            <script>
                $(function () {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    $('.swalDefaultSuccess').click(function () {
                        Toast.fire({
                            icon: 'success',
                            title: 'Datos Modificados Correctamente.'
                        })
                    });
                    $('.swalDefaultInfo').click(function () {
                        Toast.fire({
                            icon: 'info',
                            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.swalDefaultError').click(function () {
                        Toast.fire({
                            icon: 'error',
                            title: 'Error al modificar datos.'
                        })
                    });
                    $('.swalDefaultWarning').click(function () {
                        Toast.fire({
                            icon: 'warning',
                            title: 'Campos vacios.'
                        })
                    });
                    $('.swalDefaultQuestion').click(function () {
                        Toast.fire({
                            icon: 'question',
                            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });

                    $('.toastrDefaultSuccess').click(function () {
                        toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
                    });
                    $('.toastrDefaultInfo').click(function () {
                        toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
                    });
                    $('.toastrDefaultError').click(function () {
                        toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
                    });
                    $('.toastrDefaultWarning').click(function () {
                        toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
                    });

                    $('.toastsDefaultDefault').click(function () {
                        $(document).Toasts('create', {
                            title: 'Toast Title',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultTopLeft').click(function () {
                        $(document).Toasts('create', {
                            title: 'Toast Title',
                            position: 'topLeft',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultBottomRight').click(function () {
                        $(document).Toasts('create', {
                            title: 'Toast Title',
                            position: 'bottomRight',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultBottomLeft').click(function () {
                        $(document).Toasts('create', {
                            title: 'Toast Title',
                            position: 'bottomLeft',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultAutohide').click(function () {
                        $(document).Toasts('create', {
                            title: 'Toast Title',
                            autohide: true,
                            delay: 750,
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultNotFixed').click(function () {
                        $(document).Toasts('create', {
                            title: 'Toast Title',
                            fixed: false,
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultFull').click(function () {
                        $(document).Toasts('create', {
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                            title: 'Toast Title',
                            subtitle: 'Subtitle',
                            icon: 'fas fa-envelope fa-lg',
                        })
                    });
                    $('.toastsDefaultFullImage').click(function () {
                        $(document).Toasts('create', {
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                            title: 'Toast Title',
                            subtitle: 'Subtitle',
                            image: '../../dist/img/user3-128x128.jpg',
                            imageAlt: 'User Picture',
                        })
                    });
                    $('.toastsDefaultSuccess').click(function () {
                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'Toast Title',
                            subtitle: 'Subtitle',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultInfo').click(function () {
                        $(document).Toasts('create', {
                            class: 'bg-info',
                            title: 'Toast Title',
                            subtitle: 'Subtitle',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultWarning').click(function () {
                        $(document).Toasts('create', {
                            class: 'bg-warning',
                            title: 'Toast Title',
                            subtitle: 'Subtitle',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultDanger').click(function () {
                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'Toast Title',
                            subtitle: 'Subtitle',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultMaroon').click(function () {
                        $(document).Toasts('create', {
                            class: 'bg-maroon',
                            title: 'Toast Title',
                            subtitle: 'Subtitle',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                });
            </script>
</body>

</html>