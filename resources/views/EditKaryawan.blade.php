<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-header">Menu</li>
                        <li class="nav-item">
                            <a href="{{ route('admin') }}" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Dashboard
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-karyawan') }}" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Data Karyawan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-unit') }}" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    Data Unit
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-jabatan') }}" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    Data Jabatan
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Karyawan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->

                    <form action="{{ route('update-karyawan') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $karyawan->id }}" name="id" />
                        <div class="card card-default" data-select2-id="29">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data Karyawan</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body" data-select2-id="47">

                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" id="nama"
                                                placeholder="Masukkan Nama" name="nama"
                                                value="{{ $karyawan->nama }}">
                                            @error('nama')
                                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" id="username"
                                                placeholder="Masukkan Username" name="username"
                                                value="{{ $karyawan->username }}">
                                            @error('username')
                                                <span class="text-danger">{{ $errors->first('username') }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Password" name="password">
                                            @error('password')
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <select class="select2" id="selectJabatan" style="width: 100%"
                                                name="jabatans[]">

                                            </select>
                                            @error('jabatans')
                                                <span class="text-danger">{{ $errors->first('jabatans') }}</span>
                                            @enderror
                                            {{-- <input class="js-example-basic-single select2 form-control"
                                            style="width: 100%; height: auto;" name="state"> --}}

                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Bergabung</label>
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" name="joined_at">
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @error('joined_at')
                                                <span class="text-danger">{{ $errors->first('joined_at') }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row" data-select2-id="46">
                                    <div class="col-12 col-sm-6" data-select2-id="53">
                                        <div class="form-group">
                                            <label>Unit</label>
                                            <select type="password" class="select2" id="selectUnit"
                                                style="width: 100%" name="unit">

                                            </select>
                                            @error('unit')
                                                <span class="text-danger">{{ $errors->first('unit') }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    {{-- <div class="col-12 col-sm-6" data-select2-id="45">
                                    <div class="form-group" data-select2-id="44">
                                        <label>Total Login</label>
                                        <div class="select2-purple" data-select2-id="43">
                                            <select class="select2 select2-hidden-accessible" multiple=""
                                                data-placeholder="Select a State"
                                                data-dropdown-css-class="select2-purple" style="width: 100%;"
                                                data-select2-id="15" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="34">Alabama</option>
                                                <option data-select2-id="35">Alaska</option>
                                                <option data-select2-id="36">California</option>
                                                <option data-select2-id="37">Delaware</option>
                                                <option data-select2-id="38">Tennessee</option>
                                                <option data-select2-id="39">Texas</option>
                                                <option data-select2-id="40">Washington</option>
                                            </select><span
                                                class="select2 select2-container select2-container--default select2-container--below select2-container--focus"
                                                dir="ltr" data-select2-id="16" style="width: 100%;"><span
                                                    class="selection"><span
                                                        class="select2-selection select2-selection--multiple"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="-1" aria-disabled="false">
                                                        <ul class="select2-selection__rendered">
                                                            <li class="select2-search select2-search--inline"><input
                                                                    class="select2-search__field" type="search"
                                                                    tabindex="0" autocomplete="off"
                                                                    autocorrect="off" autocapitalize="none"
                                                                    spellcheck="false" role="searchbox"
                                                                    aria-autocomplete="list"
                                                                    placeholder="Select a State"
                                                                    style="width: 332.6px;"></li>
                                                        </ul>
                                                    </span></span><span class="dropdown-wrapper"
                                                    aria-hidden="true"></span></span>
                                        </div>
                                    </div> --}}

                                    {{-- </div> --}}


                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <script>
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L',
            defaultDate: "{{ $karyawan->joined_at }}"
        });
        var jabatans = JSON.parse(@json($jabatans));
        var units = JSON.parse(@json($units));
        // console.log(json);
        $(document).ready(function() {
            // $('.select2').select2();
            $('#selectJabatan').select2({
                tags: true,
                multiple: true,
                maximumSelectionLength: 2,
                data: jabatans,
            });
            $('#selectUnit').select2({
                tags: true,
                multiple: true,
                maximumSelectionLength: 1,
                data: units
            });


        });

        var buttonSubmit = document.getElementById("submit")

        // buttonSubmit.addEventListener('click', function() {
        //     var selectedJabatans = $('#selectJabatan').select2('data');
        //     var selectedUnit = $('#selectUnit').select2('data');

        //     selectedJabatans = selectedJabatans.map(function(selected) {
        //         return selected.id;
        //     })

        //     selectedUnit = selectedUnit.map(function(selected) {
        //         return selected.id;
        //     })

        //     var nama = document.getElementById("nama").value 
        //     var username = document.getElementById("username").value
        //     var password = document.getElementById("password").value



        // })
    </script>

    {{-- <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()



            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

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
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
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

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
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
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
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
    </script> --}}

</body>

</html>
