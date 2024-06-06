@if (!session('admin'))
    <script>
        alert('Anda Harus Login');
        location = '{{ url('home/login') }}';
    </script>
@endif
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Badminton - Admin</title>
    <link href="{{ asset('assets/admin/css/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('assets/admin/css/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet"
        href="{{ asset('assets/admin/assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <link href="{{ asset('assets/admin/css/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
    <script src="{{ asset('assets/admin/assets/ckeditor/ckeditor.js') }}"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('foto/icon1000.png') }}">
    <style>
        .card {
            background-color: #ADB7B8;

        }

        label {
            color: white !important;
        }
    </style>
</head>

<body id="page-top">

    <div id="wrapper">
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#ced4da;">
            <a class="sidebar-brand d-flex align-items-center justify-content-center text-white"
                href="{{ url('admin') }}">
                <div class="sidebar-brand-text mx-3 text-dark">Badminton</sup></div>
            </a>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ url('admin') }}">
                    <i class="fas fa-fw fa-home text-dark"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ url('admin/lapangan') }}">
                    <i class="fas fa-fw fa-list text-dark"></i>
                    <span>Lapangan</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ url('admin/booking') }}">
                    <i class="fas fa-fw fa-book text-dark"></i>
                    <span>Booking</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ url('admin/laporan') }}">
                    <i class="fas fa-fw fa-pen text-dark"></i>
                    <span>Laporan</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ url('admin/logout') }}"
                    onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?');">
                    <i class="fas fa-fw fa-power-off text-dark"></i>
                    <span>Logout</span></a>
            </li>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid mt-5">
                    <div id="page-inner">
                        @if (Session::has('alert'))
                            <div class="alert alert-primary">
                                {{ Session::get('alert') }}
                            </div>
                        @endif
                        @yield('page-content')
                    </div>
                </div>
            </div>
            <script src="{{ asset('assets/admin/assets/js/jquery-1.10.2.js') }}"></script>
            <script src="{{ asset('assets/admin/assets/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('assets/admin/assets/js/jquery.metisMenu.js') }}"></script>
            <script src="{{ asset('assets/admin/assets/js/morris/raphael-2.1.0.min.js') }}"></script>
            <script src="{{ asset('assets/admin/assets/js/morris/morris.js') }}"></script>
            <script src="{{ asset('assets/admin/css/js/sb-admin-2.min.js') }}"></script>
            <script src="{{ asset('assets/admin/assets/js/jquery.min.js') }}"></script>
            <script src="{{ asset('assets/admin/assets/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('assets/admin/assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/admin/assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js') }}">
            </script>
            <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#table').DataTable();
                });
                $(document).ready(function() {
                    $('#laporan').DataTable({
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'excelHtml5',
                                title: 'Laporan Bookingf 7 Hari Terakhir',
                                text: 'Download Laporan Excel',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                title: 'Laporan Booking 7 Hari Terakhir',
                                text: 'Download Laporan PDF',
                                orientation: 'landscape',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7]
                                },
                                customize: function(doc) {
                                    doc.content[1].table.widths =
                                        Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                                    doc.defaultStyle.alignment = 'center';
                                    doc.styles.tableHeader.alignment = 'center';
                                }

                            },
                            'colvis'
                        ],
                        "language": {
                            "search": "Cari",
                            "sLengthMenu": "Tampil _MENU_ Data",
                            "info": "Menampikan _START_ sampai _END_ dari _TOTAL_ data",
                            "infoEmpty": "Menampikan 0 sampai 0 dari 0 data",
                            "zeroRecords": "Data tidak ditemukan",
                            "paginate": {
                                "first": "Pertama",
                                "last": "Terakhir",
                                "next": "Selanjutnya",
                                "previous": "Sebelumnya"
                            },
                        },
                    });
                });
            </script>
</body>

</html>
