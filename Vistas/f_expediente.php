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
        require_once('../Menus/menusidebar.php');
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">
                    <div class="card card-success">
                        <form method="POST" name="addExpediente" id="addExpediente">
                            <input type="hidden" name="almacenar_datos" value="datonuevo">
                            <div class="card-header">
                                <h1 class=" text-center">Registro de Bovino</h1>
                            </div>
                            <div class="row">
                                <div class="col-md-3 ">
                                    <div class="image view view-first">
                                        <img class="thumb-image" style="width: 100%; display: block;" src="../img/vaca.png" alt="image">
                                    </div>
                                    <span class="btn btn-success col fileinput-button">
                                        <i class="nav-icon far fa-image"></i>
                                        <span>Cambiar Imagen</span>
                                    </span>
                                    <div id="respuesta"></div>
                                    <br>
                                    <div class="image view view-first">
                                        <img class="thumb-image" style="width: 100%; display: block;" src="../img/carta1.jpg" alt="image">
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
                                                <span class="preview">
                                                    <img src="data:," alt="" data-dz-thumbnail>
                                                </span>
                                            </div>
                                            <div class="col d-flex align-items-center">
                                                <p class="mb-0">
                                                    <span class="lead" data-dz-name></span>
                                                    (
                                                    <span data-dz-size></span>
                                                    )
                                                </p>
                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                            </div>
                                            <div class="col-4 d-flex align-items-center">
                                                <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
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
                                                                <span class="input-group-text">
                                                                    <i class="fas fa-square"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="La Vaca Pinta" name="nombre_b" id="nombre_b">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tipo de Bovino</label>
                                                            <div class="input-group
                                                                     mb-3">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa fa-square"></i>
                                                                </span>
                                                                <select class="form-control" name="t_bovino" id="t_bovino">
                                                                    <option>Seleccione</option>
                                                                    <option value="novia">Novia</option>
                                                                    <option value="ternero">ternera</option>
                                                                    <option value="vaca_lechera">Vaca Lechera</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <label>Descripción</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa fa-comments"></i>
                                                                </span>
                                                            </div>
                                                            <textarea name="descripcion_b" id="descripcion_b" class="form-control" placeholder="vaca colorada vermeja" required="required" rows="" cols=""></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fecha_ul_parto">Ultimo Parto</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas
                                                                    fa-calendar"></i>
                                                                    </span>
                                                                    <input type="date" required id="fecha_ul_parto" name="fecha_ul_parto" class="form-control" placeholder="Seleccione la fecha" aria-label="" aria-describedby="basic-addon1">
                                                                </div>

                                                             
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                    <!-- /.col inicio-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="form-group clearfix">
                                                                <label for="estado_Cliente">Estado</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="form-group clearfix">
                                                                        <div class="icheck-primary d-inline">
                                                                            <input type="radio" value="activo" id="radio_activo" name="estado_b" checked>
                                                                            <label for="radio_activo">
                                                                                Activo
                                                                            </label>
                                                                        </div>
                                                                        <div class="icheck-primary d-inline">
                                                                            <input type="radio" value="inactivo" id="radio_inactivo" name="estado_b">
                                                                            <label for="radio_inactivo">
                                                                                Inactivo
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group clearfix">
                                                                <br>
                                                                <label>Sexo</label>
                                                                <br>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" value="masculino" id="radioPrimary1" name="sexo_b" checked>
                                                                    <label for="radioPrimary1"> Masculino</label>
                                                                    <div class="icheck-primary d-inline">
                                                                        <input type="radio" value="femenino" id="radioPrimary2" name="sexo_b">
                                                                        <label for="radioPrimary2"> Femenino</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <label>Cantidad de Partos</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-book"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="number" class="form-control" placeholder="7" required="required" name="cantidad_parto" id="cantidad_parto">
                                                            </div>

                                                            <?php
                                                            $usuario = 'root';
                                                            $password = '';
                                                            $db = new PDO('mysql:host=localhost;dbname=db_finca', $usuario, $password);
                                                            ?>
                                                            <div class="form-group">
                                                                <label>Raza</label>
                                                                <div class="input-group
                                                            mb-3">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa fa-expand-arrows-alt"></i>
                                                                    </span>
                                                                    <select class="form-control" name="cmb_raza" id="cmb_raza">
                                                                        <option value="0">Seleccione</option>
                                                                        <?php
                                                                        $query = $db->prepare("SELECT int_idraza ,nva_nom_raza FROM tb_raza");
                                                                        $query->execute();
                                                                        $data = $query->fetchAll();

                                                                        foreach ($data as $valores) :
                                                                            echo '<option value="' . $valores["int_idraza"] . '">' . $valores["nva_nom_raza"] . '</option>';
                                                                        endforeach;
                                                                        ?>
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
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa fa-square"></i>
                                                                    </span>
                                                                    <select class="form-control" name="     propietario" id="id_propietario     ">
                                                                        <option value="">Seleccione</option>
                                                                        <?php $query = $db->prepare("SELECT * FROM tb_propietario");
                                                                        $query->execute();
                                                                        $data = $query->fetchAll();

                                                                        foreach ($data as $valores) :
                                                                            echo '<option value="' . $valores["int_id_propietario"] . '">' . $valores["nva_nombres_propietario"] . ' ' . $valores["nva_apellidos_propietario"] . '</option>';
                                                                        endforeach;
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-3 float-right">
                                                    <div class="card card-success ">
                                                        <button type="submit" class="btn btn-success fa fa-save  float-right">
                                                            Guardar
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
                    </form>



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
            <script src="../Scripts/expediente.js"></script>

            <script>
                $(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    $('.swalDefaultSuccess').click(function() {
                        Toast.fire({
                            icon: 'success',
                            title: 'Datos Registrados Correctamente.'
                        })
                    });
                    $('.swalDefaultInfo').click(function() {
                        Toast.fire({
                            icon: 'info',
                            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.swalDefaultError').click(function() {
                        Toast.fire({
                            icon: 'error',
                            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.swalDefaultWarning').click(function() {
                        Toast.fire({
                            icon: 'warning',
                            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.swalDefaultQuestion').click(function() {
                        Toast.fire({
                            icon: 'question',
                            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });

                    $('.toastrDefaultSuccess').click(function() {
                        toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
                    });
                    $('.toastrDefaultInfo').click(function() {
                        toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
                    });
                    $('.toastrDefaultError').click(function() {
                        toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
                    });
                    $('.toastrDefaultWarning').click(function() {
                        toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
                    });

                    $('.toastsDefaultDefault').click(function() {
                        $(document).Toasts('create', {
                            title: 'Toast Title',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultTopLeft').click(function() {
                        $(document).Toasts('create', {
                            title: 'Toast Title',
                            position: 'topLeft',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultBottomRight').click(function() {
                        $(document).Toasts('create', {
                            title: 'Toast Title',
                            position: 'bottomRight',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultBottomLeft').click(function() {
                        $(document).Toasts('create', {
                            title: 'Toast Title',
                            position: 'bottomLeft',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultAutohide').click(function() {
                        $(document).Toasts('create', {
                            title: 'Toast Title',
                            autohide: true,
                            delay: 750,
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultNotFixed').click(function() {
                        $(document).Toasts('create', {
                            title: 'Toast Title',
                            fixed: false,
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultFull').click(function() {
                        $(document).Toasts('create', {
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                            title: 'Toast Title',
                            subtitle: 'Subtitle',
                            icon: 'fas fa-envelope fa-lg',
                        })
                    });
                    $('.toastsDefaultFullImage').click(function() {
                        $(document).Toasts('create', {
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                            title: 'Toast Title',
                            subtitle: 'Subtitle',
                            image: '../../dist/img/user3-128x128.jpg',
                            imageAlt: 'User Picture',
                        })
                    });
                    $('.toastsDefaultSuccess').click(function() {
                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'Toast Title',
                            subtitle: 'Subtitle',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultInfo').click(function() {
                        $(document).Toasts('create', {
                            class: 'bg-info',
                            title: 'Toast Title',
                            subtitle: 'Subtitle',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultWarning').click(function() {
                        $(document).Toasts('create', {
                            class: 'bg-warning',
                            title: 'Toast Title',
                            subtitle: 'Subtitle',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultDanger').click(function() {
                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'Toast Title',
                            subtitle: 'Subtitle',
                            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                    $('.toastsDefaultMaroon').click(function() {
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