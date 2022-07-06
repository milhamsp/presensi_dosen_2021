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
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin')?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Presensi</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
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
                    <h1 class="h3 mb-2 text-gray-800">Monitoring</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark" style="color: #763996 !important;">Data Monitoring</h6>
                        </div>
                        <div class="card-body">
                            <ul class="shadow-lg nav nav-tabs my-2" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="mon_mg_1-tab" data-toggle="tab" href="#mon_mg_1" role="tab" aria-controls="mon_mg_1" aria-selected="true">Minggu ke-1</a>
                                </li>
                            <?php foreach (array(2,3,4,5,6,7,8,9,10,11,12,13,14) as $mg):?>
                                <li class="nav-item">
                                    <a class="nav-link" id="mon_mg_<?=$mg?>-tab" data-toggle="tab" href="#mon_mg_<?=$mg?>" role="tab" aria-controls="mon_mg_<?=$mg?>" aria-selected="false">Minggu ke-<?=$mg?></a>
                                </li>
                            <?php endforeach;?>
                            </ul>
                            <div class="tab-content text-dark" id="myTabContent">
                                <div class="tab-pane fade show active" id="mon_mg_1" role="tabpanel" aria-labelledby="mon_mg_1-tab">
                                    <div class="shadow-lg card col-xl-20 my-2 responsive">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold">Data Monitoring Minggu ke-1</h6>
                                            <label>Data per-Region</label>
                                            <select style="max-width: 150px" class="form-control" name="region_1" id="region_1">
                                                <option value="">--Semua--</option>
                                                <?php foreach(array('A','B','C','D','E','F5','G','J1','J3','J4','J5','J6') as $region):?>
                                                <option value="<?php echo $region;?>"><?php echo $region;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                            <div class="card-body">
                                                <table id="tbl_monkos_1" class="table table-xl table-responsive table-bordered text-dark" style="white-space: nowrap;">
                                                    <thead>
                                                        <tr class="table-active" style="font-size: 16px;vertical-align: middle;">
                                                            <th scope="col" class="text-center">No</th>
                                                            <th scope="col" class="text-center">HR</th>
                                                            <th scope="col" class="text-center">Dosen</th>
                                                            <th scope="col" class="text-center">Gelar</th>
                                                            <th scope="col" class="text-center">Mata Kuliah</th>
                                                            <th scope="col" class="text-center">Ruang</th>
                                                            <th scope="col" class="text-center">Kelas</th>
                                                            <th scope="col" class="text-center">Waktu</th>
                                                            <th scope="col" class="text-center">G-Meet</th>
                                                            <th scope="col" class="text-center">Zoom</th>
                                                            <th scope="col" class="text-center">Lainnya</th>
                                                            <th scope="col" class="text-center">V-Class</th>
                                                            <th scope="col" class="text-center">Keterangan</th>
                                                            <th scope="col" class="text-center">Region</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($monkos_1 as $row):?>
                                                        <tr style="font-size: 14px;vertical-align: middle;">
                                                            <td class="table-active"><?=$row->NO_MON?></td>
                                                            <td class="table-active"><?=$row->HR?></td>
                                                            <td class="table-active"><?=$row->DOSEN?></td>
                                                            <td class="table-active"><?=$row->GELAR?></td>
                                                            <td class="table-active"><?=$row->MTKULIAH?></td>
                                                            <td class="table-active"><?=$row->RUANG?></td>
                                                            <td class="table-active"><?=$row->KELAS?></td>
                                                            <td class="table-active"><?=$row->WAKTU?></td>
                                                            <td class="table-active"><?=$row->GMEET?></td>
                                                            <td class="table-active"><?=$row->ZOOM?></td>
                                                            <td class="table-active"><?=$row->LAIN?></td>
                                                            <td class="table-active"><?=$row->VCLASS?></td>
                                                            <td class="table-active"><?=$row->KETERANGAN?></td>
                                                            <td class="table-active"><?=$row->REGION?></td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                    </tbody>
                                                </table>
                                            </div>                
                                    </div>
                                    <div class="shadow-lg card col-xl-20 mb-5 my-2 responsive">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold">Data Ketidakhadiran Minggu ke-1</h6>
                                        </div>
                                            <div class="card-body">
                                                <table id="tbl_tdkhadir_1" class="table table-xl table-responsive table-bordered text-dark" style="white-space: nowrap;">
                                                    <thead>
                                                        <tr class="table-active" style="font-size: 16px;vertical-align: middle;">
                                                            <th scope="col" class="text-center">No</th>
                                                            <th scope="col" class="text-center">HR</th>
                                                            <th scope="col" class="text-center">Dosen</th>
                                                            <th scope="col" class="text-center">Gelar</th>
                                                            <th scope="col" class="text-center">Mata Kuliah</th>
                                                            <th scope="col" class="text-center">Ruang</th>
                                                            <th scope="col" class="text-center">Kelas</th>
                                                            <th scope="col" class="text-center">Waktu</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($tdkhadir_1 as $row):?>
                                                        <tr style="font-size: 14px;vertical-align: middle;">
                                                            <td class="table-active"><?=$row->NO_DATA?></td>
                                                            <td class="table-active"><?=$row->HR?></td>
                                                            <td class="table-active"><?=$row->DOSEN?></td>
                                                            <td class="table-active"><?=$row->GELAR?></td>
                                                            <td class="table-active"><?=$row->MTKULIAH?></td>
                                                            <td class="table-active"><?=$row->RUANG?></td>
                                                            <td class="table-active"><?=$row->KELAS?></td>
                                                            <td class="table-active"><?=$row->WAKTU?></td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                    </tbody>
                                                </table>
                                            </div>                
                                    </div>
                                </div>
                                <?php foreach (array(2,3,4,5,6,7,8,9,10,11,12,13,14) as $mg):?>
                                <div class="tab-pane fade" id="mon_mg_<?=$mg?>" role="tabpanel" aria-labelledby="mon_mg_<?=$mg?>-tab">
                                    <div class="shadow-lg card col-xl-20 my-2 responsive">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold">Data Monitoring Minggu ke-<?=$mg?></h6>
                                            <label>Data per-Region</label>
                                            <select style="max-width: 150px" class="form-control" name="region_<?=$mg?>" id="region_<?=$mg?>">
                                                <option value="">--Semua--</option>
                                                <?php foreach(array('A','B','C','D','E','F5','G','J1','J3','J4','J5','J6') as $region):?>
                                                <option value="<?php echo $region;?>"><?php echo $region;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                            <div class="card-body">
                                                <table id="tbl_monkos_<?=$mg?>" class="table table-xl table-responsive table-bordered text-dark" style="white-space: nowrap;">
                                                    <thead>
                                                        <tr class="table-active" style="font-size: 16px;vertical-align: middle;">
                                                            <th scope="col" class="text-center">No</th>
                                                            <th scope="col" class="text-center">HR</th>
                                                            <th scope="col" class="text-center">Dosen</th>
                                                            <th scope="col" class="text-center">Gelar</th>
                                                            <th scope="col" class="text-center">Mata Kuliah</th>
                                                            <th scope="col" class="text-center">Ruang</th>
                                                            <th scope="col" class="text-center">Kelas</th>
                                                            <th scope="col" class="text-center">Waktu</th>
                                                            <th scope="col" class="text-center">G-Meet</th>
                                                            <th scope="col" class="text-center">Zoom</th>
                                                            <th scope="col" class="text-center">Lainnya</th>
                                                            <th scope="col" class="text-center">V-Class</th>
                                                            <th scope="col" class="text-center">Keterangan</th>
                                                            <th scope="col" class="text-center">Region</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach (${'monkos_'.$mg} as $row):?>
                                                        <tr style="font-size: 14px;vertical-align: middle;">
                                                            <td class="table-active"><?=$row->NO_MON?></td>
                                                            <td class="table-active"><?=$row->HR?></td>
                                                            <td class="table-active"><?=$row->DOSEN?></td>
                                                            <td class="table-active"><?=$row->GELAR?></td>
                                                            <td class="table-active"><?=$row->MTKULIAH?></td>
                                                            <td class="table-active"><?=$row->RUANG?></td>
                                                            <td class="table-active"><?=$row->KELAS?></td>
                                                            <td class="table-active"><?=$row->WAKTU?></td>
                                                            <td class="table-active"><?=$row->GMEET?></td>
                                                            <td class="table-active"><?=$row->ZOOM?></td>
                                                            <td class="table-active"><?=$row->LAIN?></td>
                                                            <td class="table-active"><?=$row->VCLASS?></td>
                                                            <td class="table-active"><?=$row->KETERANGAN?></td>
                                                            <td class="table-active"><?=$row->REGION?></td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                    </tbody>
                                                </table>
                                            </div>                
                                    </div>
                                    <div class="shadow-lg card col-xl-20 mb-5 my-2 responsive">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold">Data Ketidakhadiran Minggu ke-<?=$mg?></h6>
                                        </div>
                                            <div class="card-body">
                                                <table id="tbl_tdkhadir_<?=$mg?>" class="table table-xl table-responsive table-bordered text-dark" style="white-space: nowrap;">
                                                    <thead>
                                                        <tr class="table-active" style="font-size: 16px;vertical-align: middle;">
                                                            <th scope="col" class="text-center">No</th>
                                                            <th scope="col" class="text-center">HR</th>
                                                            <th scope="col" class="text-center">Dosen</th>
                                                            <th scope="col" class="text-center">Gelar</th>
                                                            <th scope="col" class="text-center">Mata Kuliah</th>
                                                            <th scope="col" class="text-center">Ruang</th>
                                                            <th scope="col" class="text-center">Kelas</th>
                                                            <th scope="col" class="text-center">Waktu</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach (${'tdkhadir_'.$mg} as $row):?>
                                                        <tr style="font-size: 14px;vertical-align: middle;">
                                                            <td class="table-active"><?=$row->NO_DATA?></td>
                                                            <td class="table-active"><?=$row->HR?></td>
                                                            <td class="table-active"><?=$row->DOSEN?></td>
                                                            <td class="table-active"><?=$row->GELAR?></td>
                                                            <td class="table-active"><?=$row->MTKULIAH?></td>
                                                            <td class="table-active"><?=$row->RUANG?></td>
                                                            <td class="table-active"><?=$row->KELAS?></td>
                                                            <td class="table-active"><?=$row->WAKTU?></td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                    </tbody>
                                                </table>
                                            </div>                
                                    </div>
                                </div>
                                
                                <?php endforeach;?> 
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
            var mg;
            for(mg=1;mg<=14;mg++){
                $('#tbl_monkos_'+mg).DataTable({
                    "order": [[0,"desc"]],
                    "autoWidth": false,
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'excelHtml5',
                        title: 'Monitoring Minggu ke-'+mg,
                        text: '<i class="fas fa-fw fa-file-excel mx-1"></i>Export'
                    }],
                    "columnDefs": [{
                        "targets": [ 0 ],
                        "visible": false,
                        "searchable": true
                    },
                    {
                        "targets": [ 13 ],
                        "visible": false,
                        "searchable": true
                    }],
                    initComplete: function () {
                        var btns = $('.dt-button');
                        btns.addClass('btn btn-primary');
                        btns.removeClass('dt-button');
                    }
                });
                $('#tbl_tdkhadir_'+mg).DataTable({
                    "autoWidth": false,
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'excelHtml5',
                        title: 'Ketidakhadiran Minggu ke-'+mg,
                        text: '<i class="fas fa-fw fa-file-excel mx-1"></i>Export'
                    }],
                    initComplete: function () {
                        var btns = $('.dt-button');
                        btns.addClass('btn btn-primary');
                        btns.removeClass('dt-button');
                    }
                });
            }
            var table1 = $('#tbl_monkos_1').DataTable();
            $('#region_1').on('change', function(){
                table1.column(13).search(this.value).draw();
            });
            var table2 = $('#tbl_monkos_2').DataTable();
            $('#region_2').on('change', function(){
                table2.column(13).search(this.value).draw();
            });
            var table3 = $('#tbl_monkos_3').DataTable();
            $('#region_3').on('change', function(){
                table3.column(13).search(this.value).draw();
            });
            var table4 = $('#tbl_monkos_4').DataTable();
            $('#region_4').on('change', function(){
                table4.column(13).search(this.value).draw();
            });
            var table5 = $('#tbl_monkos_5').DataTable();
            $('#region_5').on('change', function(){
                table5.column(13).search(this.value).draw();
            });
            var table6 = $('#tbl_monkos_6').DataTable();
            $('#region_6').on('change', function(){
                table6.column(13).search(this.value).draw();
            });
            var table7 = $('#tbl_monkos_7').DataTable();
            $('#region_7').on('change', function(){
                table7.column(13).search(this.value).draw();
            });
            var table8 = $('#tbl_monkos_8').DataTable();
            $('#region_8').on('change', function(){
                table8.column(13).search(this.value).draw();
            });
            var table9 = $('#tbl_monkos_9').DataTable();
            $('#region_9').on('change', function(){
                table9.column(13).search(this.value).draw();
            });
            var table10 = $('#tbl_monkos_10').DataTable();
            $('#region_10').on('change', function(){
                table10.column(13).search(this.value).draw();
            });
            var table11 = $('#tbl_monkos_11').DataTable();
            $('#region_11').on('change', function(){
                table11.column(13).search(this.value).draw();
            });
            var table12 = $('#tbl_monkos_12').DataTable();
            $('#region_12').on('change', function(){
                table12.column(13).search(this.value).draw();
            });
            var table13 = $('#tbl_monkos_13').DataTable();
            $('#region_13').on('change', function(){
                table13.column(13).search(this.value).draw();
            });
            var table14 = $('#tbl_monkos_14').DataTable();
            $('#region_14').on('change', function(){
                table14.column(13).search(this.value).draw();
            });
        });
    </script>

</body>

</html>