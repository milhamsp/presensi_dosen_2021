<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Sistem Monitoring Dosen Universitas Gunadarma</title>
    <link rel="icon" href="<?=base_url('assets/img/logo.png')?>">
    <link href="<?=base_url('assets/css/buttons.dataTables.min.css')?>" rel="stylesheet" type="text/css">

    <!-- Custom fonts for this template -->
    <link href="<?=base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?=base_url('assets/')?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion toggled" style="background-color: #763996 !important;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center bg-light" href="<?= base_url('admin'); ?>">
                <div class="sidebar-brand-icon">
                    <img src="<?=base_url('assets/img/logo.png')?>" style="max-width: 50px;"></img>
                </div>
                <div class="sidebar-brand-text mx-3">
                    <img src="<?=base_url('assets/img/logo-tex.png')?>" style="max-width: 100px;"></img>
                </div>
            </a>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?=base_url('admin')?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Presensi</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/monitoring')?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Monitoring</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/totalan')?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Totalan</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/totalan_reg')?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Totalan (Region)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/konfigurasi')?>">
                    <i class="fas fa-fw fa-tools"></i>
                    <span>Konfigurasi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand  navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" style="color: #763996 !important;">
                            <i class="fa fa-bars"></i>
                        </button>
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-dark small">Admin</span>
                                <i class="fas fa-fw fa-user-tie" style="color: #763996 !important;"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2" style="color: #763996 !important;"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Presensi</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark" style="color: #763996 !important;">Data Presensi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                        
                                <table id="tbl_absen" class="table table-xl table-responsive table-bordered text-dark" style="white-space: nowrap;">
                                <thead>
                                    <tr class="table-active" style="font-size: 16px;vertical-align: middle;">
                                        <th scope="col" class="text-center">Tanggal Input</th>
                                        <th scope="col" class="text-center">Minggu</th>
                                        <th scope="col" class="text-center">Dosen</th>
                                        <th scope="col" class="text-center">Mata Kuliah</th>
                                        <th scope="col" class="text-center">Kelas</th>
                                        <th scope="col" class="text-center">Hari</th>
                                        <th scope="col" class="text-center">Ruang</th>
                                        <th scope="col" class="text-center">Waktu</th>
                                        <th scope="col" class="text-center">Media</th>
                                        <th scope="col" class="text-center">Materi</th>
                                        <th scope="col" class="text-center">Link</th>
                                        <th scope="col" class="text-center">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($absen as $row):?>
                                    <tr style="font-size: 14px;vertical-align: middle;">
                                        <td class="table-active"><?=$row->WAKTU_INPUT?></td>
                                        <td class="table-active"><strong>M<?=$row->MINGGU?></strong></td>
                                        <td class="table-active"><?=$row->DOSEN?></td>
                                        <td class="table-active"><?=$row->MTKULIAH?></td>
                                        <td class="table-active"><?=$row->KELAS?></td>
                                        <td class="table-active"><?=$row->HARI?></td>
                                        <td class="table-active"><?=$row->RUANG?></td>
                                        <td class="table-active"><?=$row->WAKTU?></td>
                                        <td class="table-active"><?=$row->MEDIA?></td>
                                        <td class="table-active"><?=$row->MATERI?></td>
                                        <td class="table-active"><a href="<?=$row->LINK?>"><?=$row->LINK?></a></td>
                                        <td class="table-active"><?=$row->KETERANGAN?></td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white my-5">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <a data-toggle="modal" data-target="#mod-about">M Ilham S</a> <?=date('Y');?></span><br><br>
                        <span>
                        <img src="<?=base_url('assets/img/logo.png')?>" style="max-width: 80px;">
                        </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin ingin mengakhiri sesi?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?=base_url('auth/logout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=base_url('assets/')?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=base_url('assets/')?>js/demo/datatables-demo.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/dataTables.buttons.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/jszip.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/buttons.colVis.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/buttons.flash.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/buttons.html5.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/buttons.print.min.js')?>"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#tbl_absen').DataTable({
                "order": [[0,"desc"]],
                "autoWidth": false,
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: 'Presensi Dosen',
                    text: '<i class="fas fa-fw fa-file-excel mx-1"></i>Export'
                }],
                initComplete: function () {
                    var btns = $('.dt-button');
                    btns.addClass('btn btn-primary');
                    btns.removeClass('dt-button');
                }
            });
        });
    </script>

</body>

</html>