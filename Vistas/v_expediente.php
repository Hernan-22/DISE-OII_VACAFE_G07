<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Expediente | Registro</title>
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
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <!-- FROMULARIO COMPRA -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="card header">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h1 class=" text-center">Expediente</h1>
                                        </div>
                                    </div>
                                    <form action="enhanced-results.html">
                                        <div class="row">
                                            <div class="col-md-10 offset-md-1 ">
                                                <div class="row">
                                                    <div class="col-9">
                                                        <div class="form-group ">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="...">
                                                                <div class="input-group-append">
                                                                    <button type="submit" class="btn btn-default float-right">
                                                                        <i class="fa fa fa-search "></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <a class="btn
                                                        
                                                        bg-success" href="../Vistas/f_expediente.php" type="submit">
                                                            <i class="fas
                                                        fa-plus-square"></i>
                                                            Añadir Expediente
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <h3 class="">Registro</h3>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 200px">Nombre</th>
                                                    <th style="width: 10px">Categoria</th>
                                                    <th style="width: 10px">Estado</th>
                                                    <th style="width: 10px">Raza</th>
                                                    <th style="width: 10px">Fecha de monta</th>
                                                    <th style="width: 10px">Fecha de parto</th>
                                                    <th style="width: 50px">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>
                                                        <div class="table table-striped files" id="previews">
                                                            <div id="template" class="row mt-2">
                                                                <div class="col-auto">
                                                                    <span class="preview">
                                                                        <img src="data:," alt="" data-dz-thumbnail>
                                                                    </span>
                                                                </div>
                                                                <div class="col d-flex align-items-center">
                                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                                </div>
                                                                <div class="col-auto d-flex align-items-center">
                                                                    <div class="btn-group start"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table table-striped files" id="previews">
                                                            <div id="template" class="row mt-2">
                                                                <div class="col-auto">
                                                                    <span class="preview">
                                                                        <img src="data:," alt="" data-dz-thumbnail>
                                                                    </span>
                                                                </div>
                                                                <div class="col d-flex align-items-center">
                                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                                </div>
                                                                <div class="col-auto d-flex align-items-center">
                                                                    <div class="btn-group start"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table table-striped files" id="previews">
                                                            <div id="template" class="row mt-2">
                                                                <div class="col-auto">
                                                                    <span class="preview">
                                                                        <img src="data:," alt="" data-dz-thumbnail>
                                                                    </span>
                                                                </div>
                                                                <div class="col d-flex align-items-center">
                                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                                </div>
                                                                <div class="col-auto d-flex align-items-center">
                                                                    <div class="btn-group start"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <div class="form-group
                                                                text-center">
                                                            <a class="">
                                                                <button
                                                                    type="button"
                                                                    class="btn
                                                                        btn-outline-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-xl"
                                                                >
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </a>
                                                            <a class="btn
                                                            btn-outline-primary" href="../Vistas/expedienteMod.html" type="submit">
                                                                <i class="fa fa fa-edit"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2.</td>
                                                    <td>
                                                        <div class="table table-striped files" id="previews">
                                                            <div id="template" class="row mt-2">
                                                                <div class="col-auto">
                                                                    <span class="preview">
                                                                        <img src="data:," alt="" data-dz-thumbnail>
                                                                    </span>
                                                                </div>
                                                                <div class="col d-flex align-items-center">
                                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                                </div>
                                                                <div class="col-auto d-flex align-items-center">
                                                                    <div class="btn-group start"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table table-striped files" id="previews">
                                                            <div id="template" class="row mt-2">
                                                                <div class="col-auto">
                                                                    <span class="preview">
                                                                        <img src="data:," alt="" data-dz-thumbnail>
                                                                    </span>
                                                                </div>
                                                                <div class="col d-flex align-items-center">
                                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                                </div>
                                                                <div class="col-auto d-flex align-items-center">
                                                                    <div class="btn-group start"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table table-striped files" id="previews2">
                                                            <div id="template2" class="row mt-2">
                                                                <div class="col-auto">
                                                                    <span class="preview">
                                                                        <img src="data:," alt="" data-dz-thumbnail>
                                                                    </span>
                                                                </div>
                                                                <div class="col d-flex align-items-center">
                                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                                </div>
                                                                <div class="col-auto d-flex align-items-center">
                                                                    <div class="btn-group start"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <div class="form-group
                                                                text-center">
                                                            <a class="">
                                                                <button
                                                                    type="button"
                                                                    class="btn
                                                                                btn-outline-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-xl"
                                                                >
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </a>
                                                            <a class="btn
                                                                    btn-outline-primary" href="../Vistas/expedienteMod.html" type="submit">
                                                                <i class="fa fa fa-edit"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3.</td>
                                                    <td>
                                                        <td>
                                                            <div class="table table-striped files" id="previews">
                                                                <div id="template" class="row mt-2">
                                                                    <div class="col-auto">
                                                                        <span class="preview">
                                                                            <img src="data:," alt="" data-dz-thumbnail>
                                                                        </span>
                                                                    </div>
                                                                    <div class="col d-flex align-items-center">
                                                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                                                    </div>
                                                                    <div class="col-auto d-flex align-items-center">
                                                                        <div class="btn-group start"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="table table-striped files" id="previews">
                                                                <div id="template" class="row mt-2">
                                                                    <div class="col-auto">
                                                                        <span class="preview">
                                                                            <img src="data:," alt="" data-dz-thumbnail>
                                                                        </span>
                                                                    </div>
                                                                    <div class="col d-flex align-items-center">
                                                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                                                    </div>
                                                                    <div class="col-auto d-flex align-items-center">
                                                                        <div class="btn-group start"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <div class="table table-striped files" id="previews3">
                                                            <div id="template3" class="row mt-2">
                                                                <div class="col-auto">
                                                                    <span class="preview">
                                                                        <img src="data:," alt="" data-dz-thumbnail>
                                                                    </span>
                                                                </div>
                                                                <div class="col d-flex align-items-center">
                                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                                </div>
                                                                <div class="col-auto d-flex align-items-center">
                                                                    <div class="btn-group start"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <div class="form-group
                                                            text-center">
                                                            <a class="">
                                                                <button
                                                                    type="button"
                                                                    class="btn
                                                                            btn-outline-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-xl"
                                                                >
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </a>
                                                            <a class="btn
                                                                btn-outline-primary" href="../Vistas/expediente.html" type="submit">
                                                                <i class="fa fa fa-edit"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4.</td>
                                                    <td>
                                                        <div class="table table-striped files" id="previews">
                                                            <div id="template" class="row mt-2">
                                                                <div class="col-auto">
                                                                    <span class="preview">
                                                                        <img src="data:," alt="" data-dz-thumbnail>
                                                                    </span>
                                                                </div>
                                                                <div class="col d-flex align-items-center">
                                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                                </div>
                                                                <div class="col-auto d-flex align-items-center">
                                                                    <div class="btn-group start"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table table-striped files" id="previews">
                                                            <div id="template" class="row mt-2">
                                                                <div class="col-auto">
                                                                    <span class="preview">
                                                                        <img src="data:," alt="" data-dz-thumbnail>
                                                                    </span>
                                                                </div>
                                                                <div class="col d-flex align-items-center">
                                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                                </div>
                                                                <div class="col-auto d-flex align-items-center">
                                                                    <div class="btn-group start"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table table-striped files" id="previews4">
                                                            <div id="template4" class="row mt-2">
                                                                <div class="col-auto">
                                                                    <span class="preview">
                                                                        <img src="data:," alt="" data-dz-thumbnail>
                                                                    </span>
                                                                </div>
                                                                <div class="col d-flex align-items-center">
                                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                                </div>
                                                                <div class="col-auto d-flex align-items-center">
                                                                    <div class="btn-group start"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <div class="form-group
                                                                text-center">
                                                            <a class="">
                                                                <button
                                                                    type="button"
                                                                    class="btn
                                                                                btn-outline-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-xl"
                                                                >
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </a>
                                                            <a class="btn
                                                                    btn-outline-primary" href="../Vistas/expedienteMod.html" type="submit">
                                                                <i class="fa fa fa-edit"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--modal-->
            <div
                class="modal fade"
                id="modal-xl"
                tabindex="-1"
                role="dialog"
                aria-labelledby="EjemploModal"
                aria-hidden="true"
            >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="card card-success">
                            <div class="card-header">
                                <h1 class=" text-center"> Datos de baja del Bovino</h1>
                                <button class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="categoria">Bovino</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-square"></i>
                                            </span>
                                        </div>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="La Vaca Pinta"
                                            disabled
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Fecha de Baja</label>
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
                                <div class="form-group">
                                    <label>Motivo</label>
                                    <select name="categori" class="form-control">
                                        <option value="1">Muerto en la finca</option>
                                        <option value="2">Eutanasia por enfermedad</option>
                                        <option value="2">Vendido</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  text-center">
                                <a class="btn
                            bg-success" data-toggle="modal" data-target="#modal-CONF">
                                    <i class="fa fa-check"></i>
                                    Aplicar
                                </a>
                            </div>
                            <div class="form-group
                    text-center"></div>
                        </form>
                    </div>
                </div>
            </div>
            <!--modal EMERGENTE-->
            <div
                class="modal fade col-2"
                id="modal-CONF"
                tabindex="-1"
                role="dialog"
                aria-labelledby="EjemploModal"
                aria-hidden="true"
                style="margin-left: 40%;"
            >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="card card-success  ">
                            <div class="card-header">
                                <h3 class="card-title">Confirmación</h3>
                            </div>
                            <div class="modal-body">
                                <p class=" text-center">Esta seguro de realizar esta Acción</p>
                                <div class="form-group  text-center">
                                    <a class="btn
                                        bg-success data-dismiss" data-toggle="modal" data-target="#modal-xl">
                                        si
                                    </a>
                                    <a class="btn
                                    bg-success" data-toggle="modal" data-target="">
                                        no
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- DETALLTE DEL REGISTRO (TABLA) -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b>
            3.1.0
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
</body>
</html>
<!--<table class="table table-striped" id="example1">
    <thead class="thead-dark">
        <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombre</th>
            <th scope="col">Estadio</th>
            <th scope="col">Puntos</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
       /*
                       // include_once ("../dao/DaoEquipo.php");
                        $daoE=new DaoEquipo();
                        $fila=$daoE->listaEquipo();
                        foreach($fila as $key=>$value){
                        
                    ?>
        <tr>
            <th scope="row" id="id"><  echo $value->getId(); ?></th>
            <td><  echo $value->getNombre(); ?></td>
            <td>< echo $value->getEstadio(); ?></td>
            <td>< echo $value->getPuntos(); ?></td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button href="#"  data-target="#editEquipoModal" class="edit btn btn-success btnEditar " data-toggle="modal" data-nombre='<?php echo $value->getNombre();?>' data-estadio='<?php echo $value->getEstadio();?>'  data-id='<?php echo $value->getId();?>' data-toggle="tooltip"  ><span class="fa fa-edit"></span></button>

                    <a href="#deleteEquipoModal" class="delete btn btn-danger btnBorrar" data-toggle="modal" data-id="<?php echo $value->getId();?>"><span class="fa fa-trash"></span></a>
                </div>
            </td>
        </tr>
        < }  ?>
    </tbody>
</table>
<script src=assets/js/jquery-3.4.1.min.js></script>
<script src=assets/js/bootstrap.min.js></script>
<script src="../scripts/plugins/miniplugin.js"></script>
<script src="../scripts/marcas/marca.js"></script>
<Paginacion
<script src="../resources/tablas/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../resources/tablas/datatables.net-bs/js/dataTables.bootstrap.min.js" type="text/javascript"></script>-->
