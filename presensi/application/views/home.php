<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Presensi - Sistem Monitoring Dosen Universitas Gunadarma</title>
	<link rel="icon" href="<?=base_url('assets/img/logo.png')?>">
	<link href="<?=base_url('assets/css/bootstrap.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/jquery.dataTables.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/jquery-ui.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/buttons.dataTables.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/fixedHeader.dataTables.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/responsive.dataTables.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/icons-1.4.1/font/bootstrap-icons.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css/autocomplete.css')?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap">
	
</head>

<body>
	<div class="container">
		<img src="<?=base_url('assets/img/logo.png')?>" style="max-width: 100px;"></img>
		<img src="<?=base_url('assets/img/logo-tex.png')?>" style="max-width: 200px;"></img>
		<!-- <a class="btn btn-primary float-right mx-1 my-1 text-light" href="<?=base_url('auth')?>">
			<i class="bi-key mx-1"></i>Login
		</a> --><hr>
		<div class="row mx-1">
			<h6 class="mx-1">Tanggal Hari Ini:</h6>
			<h6 class="mx-1" id="tanggal"></h6><h6>-</h6>
			<h6 class="mx-1" id="bulan"></h6><h6>-</h6>
			<h6 class="mx-1" id="tahun"></h6>
			<h6 class="mx-1" id="jam"></h6><h6>:</h6>
			<h6 class="mx-1" id="menit"></h6><h6>:</h6>
			<h6 class="mx-1" id="detik"></h6>
		</div>
		
		<h6 class="mx-1"> ( Periode Perkuliahan Minggu ke - 
	        <?php foreach ($periode as $row):?>
	        <?=$row->minggu?>
	        <?php endforeach;?> ) </h6>
	    <?=$this->session->flashdata('message')?>
	</div>
	<section style="position: relative;
		  background: url(<?=base_url('assets/img/dex.png')?>) center / cover no-repeat;
		  height: 50vh;">
    </section>
    <div class="container justify-content-md-center">
		<ul class="shadow-lg nav nav-tabs my-2" id="myTab" role="tablist" style="max-width: 1200px">
			<li class="nav-item">
				<a class="nav-link active" id="absen-tab" data-toggle="tab" href="#absensi" role="tab" aria-controls="absensi" aria-selected="true">Presensi</a>
				<a class="btn bg-warning text-light my-2" data-target="#tambahan" data-toggle="modal" hidden>
					<i class="bi-plus mx-1"></i>Tambahan
				</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="absensi" role="tabpanel" aria-labelledby="absen-tab">
				
				<div class="row justify-content-md-center">
					<div class="shadow-lg card col-xl-20 mb-5 responsive" style="max-width: 1100px">
				    	<div class="card-header py-3">
			                <h6 class="m-0 font-weight-bold">Daftar Presensi</h6>
			                	<?php foreach ($periode as $row):
						        	$periode = $row->minggu;
						        endforeach;
						        if($periode==NULL){
						        ?>
						        <div class="alert alert-warning fade show" role="alert">Waktu pengisian Presensi pada minggu ini sudah ditutup!</div>
							<?php }else{
								?>
								<a class="btn bg-success text-light my-2" data-target="#absen" data-toggle="modal">
									<i class="bi-plus mx-1"></i>Tambah
								</a>
								<a class="btn bg-primary text-light my-2" data-target="#bu" data-toggle="modal">
									<i class="bi-plus mx-1"></i>B.U.
								</a>
							<?php } ?>
							
			            </div>
						<div class="card-body">
		               		<table id="tbl_absen" class="table table-xl table-responsive table-bordered" style="white-space: nowrap;">
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
		</div>
	</div>
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
</body>
	<div class="modal fade" id="absen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: auto">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                    	Tambah Data ( Periode Minggu ke - <?=$periode?> )	
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                	
                    <!-- <form action="<?=base_url('main/tambah');?>" method="post"> -->

                        <div class="form-group">
						    <label>Hari</label>
						    <select class="form-control" name="hari_" id="hari_" required>
						    	<option value="">--Pilih--</option>
						    	<?php foreach(array('Senin','Selasa','Rabu','Kamis',"Jum'at",'Sabtu') as $hari):?>
						    	<option value="<?php echo $hari;?>"><?php echo $hari;?></option>
						    	<?php endforeach;?>
						    </select>
						</div>			

						<div class="form-group">
						    <label>Nama Dosen</label>
						    <div class="form-class">
                    		<input class="form-control" type="text" id="dosen_" name="dosen_" value="" required>
                    	</div>
						    
						</div>

						<div class="form-group">
						    <label>Kelas</label>
						    <select class="form-control" name="kelas_" id="kelas_" required>
						    	<option value="">--Pilih--</option>
						    </select>
						</div>

						<div class="form-group">
						    <label>Mata Kuliah</label>
						    <select class="form-control" name="mtkuliah_" id="mtkuliah_" required>
						    	<option value="">--Pilih--</option>
						    </select>
						</div>

						<div class="form-group card p-2">
						    <label>Minggu</label>
						    <table>
						    	<thead>
						    		<th></th>
						    		<th></th>
						    	</thead>
						    	<tbody>
						    		<td>
						    			<div class="form-check mr-5">
									    	<?php foreach (array(1,2,3,4,5,6,7) as $mg1):?>
											<input class="form-check-input" type="radio" name="minggu_" id="minggu_" value="<?=$mg1?>" required>
											<label class="form-check-label" for="minggu_">Minggu ke-<?=$mg1?></label><br>
											<?php endforeach;?>
										</div>
						    		</td>
						    		<td>
						    			<div class="form-check mx-5">
											<?php foreach (array(8,9,10,11,12,13,14) as $mg2):?>
											<input class="form-check-input" type="radio" name="minggu_" id="minggu_" value="<?=$mg2?>" required>
											<label class="form-check-label" for="minggu_">Minggu ke-<?=$mg2?></label><br>
											<?php endforeach;?>
										</div>
						    		</td>
						    	</tbody>
						    </table>
						</div>

						<div class="form-group">
						    <label>Media Perkuliahan</label>
						    <select class="form-control" name="media_" id="media_" required>
						    	<option value="">--Pilih--</option>
						    	<option value="GMEET">GMEET</option>
						    	<option value="ZOOM">ZOOM</option>
						    	<option value="V-CLASS">V-CLASS</option>
						    	<option value="Lainnya">Lainnya</option>
						    </select>
						</div>				

						<div class="form-group">
						    <label>Judul Materi</label><br>
						    <input class="form-control" type="text" name="materi_" id="materi_" value="" required maxlength="50">
						</div>

						<div class="form-group">
						    <label>Link Perkuliahan</label><br>
						    <input class="form-control" type="url" name="link_" id="link_" value="" required maxlength="100">
						</div>

						<div class="form-group">
						    <label>Keterangan</label><br>
						    <input class="form-control" type="text" name="keterangan_" id="keterangan_" value="" maxlength="50">
						</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="konfirmasi" data-target="#absen_" data-toggle="modal">Simpan Data</button>
                 <!-- </form> -->
                </div> 
            </div>
        </div>
    </div>
    <div class="modal fade" id="absen_" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: auto">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                    	Konfirmasi	
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                	
                    <form action="<?=base_url('main/tambah');?>" method="post">

                        <div class="form-group">
						    <label>Hari</label>
						    <input class="form-control" name="hari" id="hari" readonly>
						</div>			

						<div class="form-group">
						    <label>Nama Dosen</label>
                    		<input class="form-control" name="dosen" id="dosen" readonly>
                    	</div>

						<div class="form-group">
						    <label>Kelas</label>
						    <input class="form-control" name="kelas" id="kelas" readonly>
						</div>

						<div class="form-group">
						    <label>Mata Kuliah</label>
						    <input class="form-control" name="mtkuliah" id="mtkuliah" readonly>
						</div>

						<div class="form-group">
						    <label>Minggu</label>
						    <input class="form-control" name="minggu" id="minggu" readonly>
						</div>

						<div class="form-group">
						    <label>Media Perkuliahan</label>
						    <input class="form-control" name="media" id="media" readonly>
						</div>				

						<div class="form-group">
						    <label>Judul Materi</label><br>
						    <input class="form-control" name="materi" id="materi" readonly>
						</div>

						<div class="form-group">
						    <label>Link Perkuliahan</label><br>
						    <input class="form-control" name="link" id="link" readonly>
						</div>

						<div class="form-group">
						    <label>Keterangan</label><br>
						    <input class="form-control" name="keterangan" id="keterangan" readonly>
						</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cek" data-target="#absen" data-toggle="modal">Cek Ulang</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
    <div class="modal fade" id="bu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: auto">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                    	Tambah Data B.U. ( Periode Minggu ke - <?=$periode?> )	
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
						    <label>Hari</label>
						    <select class="form-control" name="bu_hari_" id="bu_hari_" required>
						    	<option value="">--Pilih--</option>
						    	<?php foreach(array('Senin','Selasa','Rabu','Kamis',"Jum'at",'Sabtu') as $hari):?>
						    	<option value="<?php echo $hari;?>"><?php echo $hari;?></option>
						    	<?php endforeach;?>
						    </select>
						</div>			

						<div class="form-group">
						    <label>Nama Dosen</label>
						    <div class="form-class">
                    		<input class="form-control" type="text" id="bu_dosen_" name="bu_dosen_" value="" required>
                    	</div>
						    
						</div>

						<div class="form-group">
						    <label>Kelas</label>
						    <select class="form-control" name="bu_kelas_" id="bu_kelas_" required>
						    	<option value="">--Pilih--</option>
						    </select>
						</div>

						<div class="form-group">
						    <label>Mata Kuliah</label>
						    <select class="form-control" name="bu_mtkuliah_" id="bu_mtkuliah_" required>
						    	<option value="">--Pilih--</option>
						    </select>
						</div>

						<div class="form-group">
						    <label>Nama Dosen B.U.</label>
                    		<input class="form-control" type="text" id="bu_dosenbu_" name="bu_dosenbu_" value="" required>
                    	</div>

						<div class="form-group card p-2">
						    <label>Minggu</label>
						    <table>
						    	<thead>
						    		<th></th>
						    		<th></th>
						    	</thead>
						    	<tbody>
						    		<td>
						    			<div class="form-check mr-5">
									    	<?php foreach (array(1,2,3,4,5,6,7) as $mg1):?>
											<input class="form-check-input" type="radio" name="bu_minggu_" id="bu_minggu_" value="<?=$mg1?>" required>
											<label class="form-check-label" for="bu_minggu_">Minggu ke-<?=$mg1?></label><br>
											<?php endforeach;?>
										</div>
						    		</td>
						    		<td>
						    			<div class="form-check mx-5">
											<?php foreach (array(8,9,10,11,12,13,14) as $mg2):?>
											<input class="form-check-input" type="radio" name="bu_minggu_" id="bu_minggu_" value="<?=$mg2?>" required>
											<label class="form-check-label" for="bu_minggu_">Minggu ke-<?=$mg2?></label><br>
											<?php endforeach;?>
										</div>
						    		</td>
						    	</tbody>
						    </table>
						</div>

						<div class="form-group">
						    <label>Media Perkuliahan</label>
						    <select class="form-control" name="bu_media_" id="bu_media_" required>
						    	<option value="">--Pilih--</option>
						    	<option value="GMEET">GMEET</option>
						    	<option value="ZOOM">ZOOM</option>
						    	<option value="V-CLASS">V-CLASS</option>
						    	<option value="Lainnya">Lainnya</option>
						    </select>
						</div>				

						<div class="form-group">
						    <label>Judul Materi</label><br>
						    <input class="form-control" type="text" name="bu_materi_" id="bu_materi_" value="" required maxlength="50">
						</div>

						<div class="form-group">
						    <label>Link Perkuliahan</label><br>
						    <input class="form-control" type="url" name="bu_link_" id="bu_link_" value="" required maxlength="100">
						</div>

						<div class="form-group">
						    <label>Keterangan</label><br>
						    <input class="form-control" type="text" name="bu_keterangan_" id="bu_keterangan_" value="" maxlength="50">
						</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="konfirmasi_bu" data-target="#bu_" data-toggle="modal">Simpan Data</button>
                    
                </div> 
            </div>
        </div>
    </div>
    <div class="modal fade" id="bu_" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: auto">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                    	Konfirmasi	
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                	
                    <form action="<?=base_url('main/tambah_bu');?>" method="post">

                        <div class="form-group">
						    <label>Hari</label>
						    <input class="form-control" name="bu_hari" id="bu_hari" readonly>
						</div>			

						<div class="form-group">
						    <label>Nama Dosen</label>
                    		<input class="form-control" name="bu_dosen" id="bu_dosen" readonly>
                    	</div>

						<div class="form-group">
						    <label>Kelas</label>
						    <input class="form-control" name="bu_kelas" id="bu_kelas" readonly>
						</div>

						<div class="form-group">
						    <label>Mata Kuliah</label>
						    <input class="form-control" name="bu_mtkuliah" id="bu_mtkuliah" readonly>
						</div>

						<div class="form-group">
						    <label>Nama Dosen B.U.</label>
                    		<input class="form-control" name="bu_dosenbu" id="bu_dosenbu" readonly>
                    	</div>

						<div class="form-group">
						    <label>Minggu</label>
						    <input class="form-control" name="bu_minggu" id="bu_minggu" readonly>
						</div>

						<div class="form-group">
						    <label>Media Perkuliahan</label>
						    <input class="form-control" name="bu_media" id="bu_media" readonly>
						</div>				

						<div class="form-group">
						    <label>Judul Materi</label><br>
						    <input class="form-control" name="bu_materi" id="bu_materi" readonly>
						</div>

						<div class="form-group">
						    <label>Link Perkuliahan</label><br>
						    <input class="form-control" name="bu_link" id="bu_link" readonly>
						</div>

						<div class="form-group">
						    <label>Keterangan</label><br>
						    <input class="form-control" name="bu_keterangan" id="bu_keterangan" readonly>
						</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cek_bu" data-target="#bu" data-toggle="modal">Cek Ulang</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Menu Tambahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                	<div class="form-group">
					    <label>Konfigurasi Tabel Monitoring Semua Region</label><br>
						<a href="<?=base_url('main/create_monkos');?>" class="btn bg-success my-1 text-light">
							<i class="bi-file-earmark-plus"></i> Buat
						</a>
						<a href="<?=base_url('main/delete_monkos');?>" class="btn bg-danger my-1 text-light">
							<i class="bi-file-earmark-minus"></i> Hapus
						</a>
					</div>
                	<div class="form-group">
					    <label>Konfigurasi Tabel Totalan Semua Region</label><br>
						<a href="<?=base_url('main/crt_tot');?>" class="btn bg-success my-1 text-light">
							<i class="bi-file-earmark-plus"></i> Buat
						</a>
						<a href="<?=base_url('main/delete_totalan');?>" class="btn bg-danger my-1 text-light">
							<i class="bi-file-earmark-minus"></i> Hapus
						</a>
						<!-- <a href="<?=base_url('main/alter');?>" class="btn bg-warning my-1 text-light">
							<i class="bi-file-earmark-minus"></i> 
						</a> -->
					</div>
					<div class="form-group">
					    <label>Konfigurasi Tabel Totalan Per Region</label><br>
						<a href="<?=base_url('main/generate_tot_reg');?>" class="btn bg-success my-1 text-light">
							<i class="bi-file-earmark-plus"></i> Buat
						</a>
						<a href="<?=base_url('main/delete_reg_totalan');?>" class="btn bg-danger my-1 text-light">
							<i class="bi-file-earmark-minus"></i> Hapus
						</a>
					</div>
					<a href="<?=base_url('main/delete_all');?>" class="btn bg-danger my-1 text-light">
							<i class="bi-file-earmark-minus"></i> Hapus Semua
						</a>
						<a href="<?=base_url('main/relate');?>" class="btn bg-danger my-1 text-light">
							<i class="bi-file-earmark-minus"></i> Relasi
						</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>

    <!--<script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery-1.8.2.min.js'></script>-->
	<script type="text/javascript" src="<?=base_url('assets/js/jquery-3.3.1.js')?>"></script>
	<!--<script type='text/javascript' src='<?=base_url();?>assets/js/jquery.autocomplete.js'></script>-->
	<script type="text/javascript" src="<?=base_url('assets/js/jquery-ui.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/jquery.dataTables.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/dataTables.buttons.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/jszip.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/buttons.colVis.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/buttons.flash.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/buttons.html5.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/buttons.print.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/dataTables.fixedHeader.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/dataTables.responsive.min.js')?>"></script>
	<!-- <script src="<?php echo base_url('assets/')?>js/sb-admin-2.min.js"></script> -->

	<script type="text/javascript">
		$(document).ready(function(){
			$('#hari_').change(function(){ 
                var hari=$(this).val();
                $("#dosen_").val("");
                $("div.form-group select.form-control[name=kelas_]").val("");
                $("div.form-group select.form-control[name=mtkuliah_]").val("");
                $.ajax({
                    url : "<?php echo site_url('main/get_dosen');?>",
                    method : "POST",
                    data : {hari: hari},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var i;
                        var dosen = [];
                        for(i=0; i<data.length; i++){
                            dosen.push(data[i].DOSEN);
                        }
                        $("#dosen_").autocomplete({
		                	source: dosen
			            });
			            $.ui.autocomplete.filter = function (array, term) {
					        var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
					        return $.grep(array, function (value) {
					            return matcher.test(value.label || value.value || value);
					        });
					    };
                        $( "#dosen_" ).autocomplete( "option", "appendTo", "#absen" );
                    }
                });
                return false;
            });
			$('#dosen_').change(function(){ 
                var dosen=$(this).val();
                var hari=$('#hari_').val();
                $("div.form-group select.form-control[name=mtkuliah_]").val("");
                $.ajax({
                    url : "<?php echo site_url('main/get_kelas');?>",
                    method : "POST",
                    data : {dosen: dosen, hari:hari},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '<option value="">--Pilih--</option>';
                        var i;
                        $('#kelas_').html(html);
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].KELAS+'>'+data[i].KELAS+'</option>';
                        }
                        $('#kelas_').html(html);
                    }
                });
                return false;
            });
            $('#kelas_').change(function(){ 
                var kelas=$(this).val();
                var dosen=$('#dosen_').val();
                var hari=$('#hari_').val();
                $.ajax({
                    url : "<?php echo site_url('main/get_mtkuliah');?>",
                    method : "POST",
                    data : {kelas: kelas,dosen:dosen,hari:hari},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '<option value="">--Pilih--</option>';
                        var i;
                        $('#mtkuliah_').html(html);
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].MTKULIAH+'">'+data[i].MTKULIAH+'</option>';
                        }
                        $('#mtkuliah_').html(html);
                    }
                });
                return false;
            });
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#bu_hari_').change(function(){ 
                var hari=$(this).val();
                $("#bu_dosen_").val("");
                $("div.form-group select.form-control[name=bu_kelas_]").val("");
                $("div.form-group select.form-control[name=bu_mtkuliah_]").val("");
                $("#bu_dosenbu_").val("");
                $.ajax({
                    url : "<?php echo site_url('main/get_dosen');?>",
                    method : "POST",
                    data : {hari: hari},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var i;
                        var dosen = [];
                        for(i=0; i<data.length; i++){
                            dosen.push(data[i].DOSEN);
                        }
                        $("#bu_dosen_").autocomplete({
		                	source: dosen
			            });
			            $.ui.autocomplete.filter = function (array, term) {
					        var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
					        return $.grep(array, function (value) {
					            return matcher.test(value.label || value.value || value);
					        });
					    };
                        $( "#bu_dosen_" ).autocomplete( "option", "appendTo", "#bu" );
                    }
                });
                return false;
            });
			$('#bu_dosen_').change(function(){ 
                var dosen=$(this).val();
                var hari=$('#bu_hari_').val();
                $("div.form-group select.form-control[name=bu_mtkuliah_]").val("");
                $("#bu_dosenbu_").val("");
                $.ajax({
                    url : "<?php echo site_url('main/get_kelas');?>",
                    method : "POST",
                    data : {dosen: dosen, hari:hari},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '<option value="">--Pilih--</option>';
                        var i;
                        $('#bu_kelas_').html(html);
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].KELAS+'>'+data[i].KELAS+'</option>';
                        }
                        $('#bu_kelas_').html(html);
                    }
                });
                return false;
            });
            $('#bu_kelas_').change(function(){ 
                var kelas=$(this).val();
                var dosen=$('#bu_dosen_').val();
                var hari=$('#bu_hari_').val();
                $("#bu_dosenbu_").val("");
                $.ajax({
                    url : "<?php echo site_url('main/get_mtkuliah');?>",
                    method : "POST",
                    data : {kelas: kelas,dosen:dosen,hari:hari},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '<option value="">--Pilih--</option>';
                        var i;
                        $('#bu_mtkuliah_').html(html);
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].MTKULIAH+'">'+data[i].MTKULIAH+'</option>';
                        }
                        $('#bu_mtkuliah_').html(html);
                    }
                });
                return false;
            });
            $('#bu_mtkuliah_').change(function(){
            	var mtkuliah=$(this).val();
            	var kelas=$('#bu_kelas_').val();
	            var dosen=$('#bu_dosen_').val();
	            var hari=$('#bu_hari_').val();
	            $("#bu_dosenbu_").val("");
            	$.ajax({
                    url : "<?php echo site_url('main/get_dosen_bu');?>",
                    method : "POST",
                    data : {kelas: kelas,dosen:dosen,hari:hari,mtkuliah:mtkuliah},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var i;
                        var dosenbu = [];
                        for(i=0; i<data.length; i++){
                            dosenbu.push(data[i].DOSEN);
                        }
                        $("#bu_dosenbu_").autocomplete({
		                	source: dosenbu
			            });
			            $.ui.autocomplete.filter = function (array, term) {
					        var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
					        return $.grep(array, function (value) {
					            return matcher.test(value.label || value.value || value);
					        });
					    };
                        $( "#bu_dosenbu_" ).autocomplete( "option", "appendTo", "#bu" );
                    }
                });
                return false;
            });
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#tbl_absen').DataTable({
		    	"order": [[0,"desc"]],
		    	"autoWidth": false
			});
		});
	</script>
	<script type="text/javascript">
		window.setTimeout("waktu()", 1000);
		function waktu() {
			var waktu = new Date();
			setTimeout("waktu()", 1000);
			document.getElementById("tanggal").innerHTML = waktu.getDate();
			document.getElementById("bulan").innerHTML = waktu.getMonth()+1;
			document.getElementById("tahun").innerHTML = waktu.getFullYear();
			document.getElementById("jam").innerHTML = waktu.getHours();
			document.getElementById("menit").innerHTML = waktu.getMinutes();
			document.getElementById("detik").innerHTML = waktu.getSeconds();
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#konfirmasi").on( "click", function() {
		        $('#absen').modal('hide');
		        var hari=$('#hari_').val();
		        var dosen=$('#dosen_').val();
		        var kelas=$('#kelas_').val();
		        var mtkuliah=$('#mtkuliah_').val();
		        var minggu_=document.querySelector(   
                'input[name="minggu_"]:checked');
                var minggu=minggu_.value;
		        var materi=$('#materi_').val();
		        var media=$('#media_').val();
		        var link=$('#link_').val();
		        var keterangan=$('#keterangan_').val();
		        document.getElementById("hari").value = hari;
		        document.getElementById("dosen").value = dosen;
		        document.getElementById("kelas").value = kelas;
		        document.getElementById("mtkuliah").value = mtkuliah;
		        document.getElementById("minggu").value = minggu;
		        document.getElementById("materi").value = materi;
		        document.getElementById("media").value = media;
		        document.getElementById("link").value = link;
		        document.getElementById("keterangan").value = keterangan;
		   	});
		   	$("#cek").on( "click", function() {
		        $('#absen_').modal('hide');
		    });
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#konfirmasi_bu").on( "click", function() {
		        $('#bu').modal('hide');
		        var hari_=$('#bu_hari_').val();
		        var dosen_=$('#bu_dosen_').val();
		        var kelas_=$('#bu_kelas_').val();
		        var mtkuliah_=$('#bu_mtkuliah_').val();
		        var dosenbu_=$('#bu_dosenbu_').val();
		        var minggu_x=document.querySelector(   
                'input[name="bu_minggu_"]:checked');
                var minggu_=minggu_x.value;
		        var materi_=$('#bu_materi_').val();
		        var media_=$('#bu_media_').val();
		        var link_=$('#bu_link_').val();
		        var keterangan_=$('#bu_keterangan_').val();
		        document.getElementById("bu_hari").value = hari_;
		        document.getElementById("bu_dosen").value = dosen_;
		        document.getElementById("bu_kelas").value = kelas_;
		        document.getElementById("bu_mtkuliah").value = mtkuliah_;
		        document.getElementById("bu_dosenbu").value = dosenbu_;
		        document.getElementById("bu_minggu").value = minggu_;
		        document.getElementById("bu_materi").value = materi_;
		        document.getElementById("bu_media").value = media_;
		        document.getElementById("bu_link").value = link_;
		        document.getElementById("bu_keterangan").value = keterangan_;
		   	});
		   	$("#cek_bu").on( "click", function() {
		        $('#bu_').modal('hide');
		    });
		});
	</script>
</body>
</html>