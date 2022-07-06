<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('model_');
		$this->load->library('session');
		date_default_timezone_set('Asia/Jakarta');
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', '500M');
	}
	
	function index(){
		$time = date('Y-m-d H:i:s');
		$data = [
			'absen'	=> $this->model_->get_absen()->result(),
			'periode' => $this->model_->get_periode_now($time)->result(),
		];
		$this->load->view('home', $data);
	}
	
	function get_dosen(){
		$hari = $this->input->post('hari',TRUE);
		$data = $this->model_->get_dosen($hari)->result();
		echo json_encode($data);
	}
	function get_dosen_bu(){
		$dosen = $this->input->post('dosen',TRUE);
		$hari = $this->input->post('hari',TRUE);
		$kelas = $this->input->post('kelas',TRUE);
		$mtkuliah = $this->input->post('mtkuliah',TRUE);
		$ruang = $this->model_->get_ruang_bu($dosen,$hari,$kelas,$mtkuliah)->result();
		foreach ($ruang as $row) {
			$ruang = $row->RUANG;
		}
		$region = substr($ruang, 0, 3);
		if(substr($region, 0, 1)=='J'){
			$temp = substr($region, 0, 2);
			$region = $temp;
		}elseif(substr($region, 0, 1)=='F'){
			$temp = substr($region, 0, 2);
			$region = $temp;
		}else{
			$temp = substr($region,0,1);
			$region = $temp;
		}
		$data = $this->model_->get_dosen_bu($region,$dosen)->result();
		echo json_encode($data);
	}
	function get_kelas(){
		$dosen = $this->input->post('dosen',TRUE);
		$hari = $this->input->post('hari',TRUE);
		$data = $this->model_->get_kelas($dosen,$hari)->result();
		echo json_encode($data);
	}
	function get_mtkuliah(){
		$dosen = $this->input->post('dosen',TRUE);
		$hari = $this->input->post('hari',TRUE);
		$kelas = $this->input->post('kelas',TRUE);
		$data = $this->model_->get_mtkuliah($dosen,$hari,$kelas)->result();
		echo json_encode($data);
	}
	function tambah(){
		$dosen = $this->input->post('dosen',TRUE);
		$kelas = $this->input->post('kelas',TRUE);
		$mtkuliah = $this->input->post('mtkuliah',TRUE);
		$hari = $this->input->post('hari',TRUE);
		$minggu = $this->input->post('minggu',TRUE);
		$media = $this->input->post('media',TRUE);
		$materi = $this->input->post('materi',TRUE);
		$link = $this->input->post('link',TRUE);
		$keterangan = $this->input->post('keterangan',TRUE);
		$time = date('Y-m-d H:i:s');
		$periode = $this->model_->get_periode_now($time)->result();
		foreach ($periode as $row) {
			$periode = $row->minggu;
		}
		if($minggu>$periode){
			$this->session->set_flashdata('message','<div class="alert alert-danger fade show" role="alert">Anda mengisi Minggu Perkuliahan melebihi Periode Perkuliahan saat ini!</div>');
			redirect('main');
		}
		$no = $this->model_->get_no($dosen,$kelas,$mtkuliah,$hari)->result();
		foreach ($no as $row) {
			$no = $row->NO_DATA;
		}
		
		$ruang = $this->model_->get_ruang($no)->result();
		foreach ($ruang as $row) {
			$ruang = $row->RUANG;
		}
		$region = substr($ruang, 0, 3);
		if(substr($region, 0, 1)=='J'){
			$temp = substr($region, 0, 2);
			$region = $temp;
		}elseif(substr($region, 0, 1)=='F'){
			$temp = substr($region, 0, 2);
			$region = $temp;
		}else{
			$temp = substr($region,0,1);
			$region = $temp;
		}
		$waktu = $this->model_->get_waktu($no)->result();
		foreach ($waktu as $row) {
			$waktu = $row->WAKTU;
		}
		$totalan = $this->model_->hitung_totalan($dosen,$periode)->result();
		foreach ($totalan as $row) {
			$totalan = $row->HADIR;
		}
		$totalan_reg = $this->model_->hitung_totalan_reg($dosen,$periode,$region)->result();
		foreach ($totalan_reg as $row) {
			$totalan_reg = $row->HADIR;
		}
		$totalan_bu = $this->model_->hitung_totalan_bu($dosen,$periode)->result();
		foreach ($totalan_bu as $row) {
			$totalan_bu = $row->BU;
		}
		$totalan_reg_bu = $this->model_->hitung_totalan_reg_bu($dosen,$periode,$region)->result();
		foreach ($totalan_reg_bu as $row) {
			$totalan_reg_bu = $row->BU;
		}
		$data = [
			'MINGGU' => $minggu,
			'NO_DATA' => $no,
			'LINK' => $link,
			'MEDIA' => $media,
			'MATERI' => $materi,
			'KETERANGAN' => $keterangan,
			'WAKTU_INPUT' => date('Y-m-d H:i:s')
		];
		$cek_absen=$this->model_->cek_absen($no,$minggu)->result();
		if($cek_absen){
		}else{
		}
		$this->db->insert('absen',$data);
		if($media=='GMEET'):
			$this->model_->add_gmeet($no,$periode,$keterangan,$dosen,$totalan,$totalan_reg,$totalan_bu,$totalan_reg_bu,$region);
		endif;
		if($media=='ZOOM'):
			$this->model_->add_zoom($no,$periode,$keterangan,$dosen,$totalan,$totalan_reg,$totalan_bu,$totalan_reg_bu,$region);
		endif;
		if($media=='V-CLASS'):
			$this->model_->add_vc($no,$periode,$keterangan,$dosen,$totalan,$totalan_reg,$totalan_bu,$totalan_reg_bu,$region);
		endif;
		if($media=='Lainnya'):
			$this->model_->add_lain($no,$periode,$keterangan,$dosen,$totalan,$totalan_reg,$totalan_bu,$totalan_reg_bu,$region);
		endif;
		$this->session->set_flashdata('message','<div class="alert alert-success fade show" role="alert">Data presensi berhasil dimasukan! Silahkan cek di tabel Presensi!</div>');
		redirect('main');
	}
	function tambah_bu(){
		$dosen = $this->input->post('bu_dosen',TRUE);
		$kelas = $this->input->post('bu_kelas',TRUE);
		$mtkuliah = $this->input->post('bu_mtkuliah',TRUE);
		$dosenbu = $this->input->post('bu_dosenbu',TRUE);
		$hari = $this->input->post('bu_hari',TRUE);
		$minggu = $this->input->post('bu_minggu',TRUE);
		$media = $this->input->post('bu_media',TRUE);
		$materi = $this->input->post('bu_materi',TRUE);
		$link = $this->input->post('bu_link',TRUE);
		$keterangan = $this->input->post('bu_keterangan',TRUE);
		$time = date('Y-m-d H:i:s');
		$periode = $this->model_->get_periode_now($time)->result();
		foreach ($periode as $row) {
			$periode = $row->minggu;
		}
		if($minggu>$periode){
			$this->session->set_flashdata('message','<div class="alert alert-danger fade show" role="alert">Anda mengisi Minggu Perkuliahan melebihi Periode Perkuliahan saat ini!</div>');
			redirect('main');
		}
		$no = $this->model_->get_no($dosen,$kelas,$mtkuliah,$hari)->result();
		foreach ($no as $row) {
			$no = $row->NO_DATA;
		}
		
		$ruang = $this->model_->get_ruang($no)->result();
		foreach ($ruang as $row) {
			$ruang = $row->RUANG;
		}
		$region = substr($ruang, 0, 3);
		if(substr($region, 0, 1)=='J'){
			$temp = substr($region, 0, 2);
			$region = $temp;
		}elseif(substr($region, 0, 1)=='F'){
			$temp = substr($region, 0, 2);
			$region = $temp;
		}else{
			$temp = substr($region,0,1);
			$region = $temp;
		}
		$waktu = $this->model_->get_waktu($no)->result();
		foreach ($waktu as $row) {
			$waktu = $row->WAKTU;
		}
		$totalan = $this->model_->hitung_totalan($dosenbu,$periode)->result();
		foreach ($totalan as $row) {
			$totalan = $row->HADIR;
		}
		$totalan_reg = $this->model_->hitung_totalan_reg($dosenbu,$periode,$region)->result();
		foreach ($totalan_reg as $row) {
			$totalan_reg = $row->HADIR;
		}
		$totalan_bu = $this->model_->hitung_totalan_bu($dosenbu,$periode)->result();
		foreach ($totalan_bu as $row) {
			$totalan_bu = $row->BU;
		}
		$totalan_reg_bu = $this->model_->hitung_totalan_reg_bu($dosenbu,$periode,$region)->result();
		foreach ($totalan_reg_bu as $row) {
			$totalan_reg_bu = $row->BU;
		}
		$data = [
			'MINGGU' => $minggu,
			'NO_DATA' => $no,
			'LINK' => $link,
			'MEDIA' => $media,
			'MATERI' => $materi,
			'KETERANGAN' => $keterangan,
			'WAKTU_INPUT' => date('Y-m-d H:i:s')
		];
		$cek_absen=$this->model_->cek_absen($no,$minggu)->result();
		if($cek_absen){
			// redirect('main');
		}else{
			
		}
		$this->db->insert('absen',$data);
		if($media=='GMEET'):
			$this->model_->add_gmeet_bu($no,$periode,$keterangan,$dosenbu,$totalan,$totalan_reg,$totalan_bu,$totalan_reg_bu,$region);
		endif;
		if($media=='ZOOM'):
			$this->model_->add_zoom_bu($no,$periode,$keterangan,$dosenbu,$totalan,$totalan_reg,$totalan_bu,$totalan_reg_bu,$region);
		endif;
		if($media=='V-CLASS'):
			$this->model_->add_vc_bu($no,$periode,$keterangan,$dosenbu,$totalan,$totalan_reg,$totalan_bu,$totalan_reg_bu,$region);
		endif;
		if($media=='Lainnya'):
			$this->model_->add_lain_bu($no,$periode,$keterangan,$dosenbu,$totalan,$totalan_reg,$totalan_bu,$totalan_reg_bu,$region);
		endif;
		$this->session->set_flashdata('message','<div class="alert alert-success fade show" role="alert">Data presensi berhasil dimasukan! Silahkan cek di tabel Presensi!</div>');
		redirect('main');
	}
	function generate_tot(){
		$tot_dosen = $this->model_->tot_dosen()->result();
		foreach ($tot_dosen as $row) {
			$tot_sks=0;
			$hitung_sks=0;
			$sks=0;
			$tot_dosen = $row->DOSEN;
			$tot_reg = '';
			$tot_mtkul = $this->model_->tot_mtkul($tot_dosen)->result();
			foreach ($tot_mtkul as $row) {
				$tot_mtkul = $row->MTKULIAH;
				$tot_no=$this->model_->tot_no($tot_dosen,$tot_mtkul)->result();
				foreach ($tot_no as $row) {
					$tot_no = $row->NO_DATA;
				}
				$tot_cek_ajar=$this->model_->tot_cek_ajar($tot_dosen,$tot_mtkul)->result();
				foreach ($tot_cek_ajar as $row) {
					$tot_cek_ajar = $row->DOSEN;
				}
				$tot_cek_sks=$this->model_->tot_cek_sks($tot_no)->result();
				foreach ($tot_cek_sks as $row) {
					$tot_cek_sks = $row->SKS;
				}
				$hitung_sks=$tot_cek_ajar*$tot_cek_sks;		
				$tot_sks=$tot_sks+$hitung_sks;
			}
			$sks=$tot_sks;
			
			foreach (array(1,2,3,4,5,6,7,8,9,10,11,12,13,14) as $mg):
				// $this->model_->crt_totalan($mg);
						
				$data=[
					'DOSEN'=>$tot_dosen,
					'SKS'=>$sks,
					// 'MINGGU'=>$mg,
					'CATT'=>'0',
							'BU'=>'0',
							'TR'=>'0',
							'LIBUR'=>'0',
							'an'=>'0',
							'_an'=>'0',
							'MTA'=>'0',
							'KETERANGAN'=>''
				];
				$this->db->insert('totalan_m'.$mg,$data);
			endforeach;
		}
		redirect('main');
	}
	function generate_tot_reg(){
		$tot_reg_ruang = $this->model_->tot_reg_ruang()->result();
		$region = '';
		foreach ($tot_reg_ruang as $row) {
			$tot_reg_ruang = $row->RUANG;
			$tot_reg_region = substr($tot_reg_ruang, 0, 3);
			if(substr($tot_reg_region, 0, 1)=='J'){
				$temp = substr($tot_reg_region, 0, 2);
				$tot_reg_region = $temp;
			}elseif(substr($tot_reg_region, 0, 1)=='F'){
				$temp = substr($tot_reg_region, 0, 2);
				$tot_reg_region = $temp;
			}else{
				$temp = substr($tot_reg_region, 0, 1);
				$tot_reg_region = $temp;
			}
			if($region==$tot_reg_region){
				
			}else{
				$tot_reg_dosen = $this->model_->tot_reg_dosen($tot_reg_region)->result();
				foreach ($tot_reg_dosen as $row) {
					$tot_sks=0;
					$hitung_sks=0;
					$sks=0;
					$tot_reg_dosen = $row->DOSEN;
					$tot_reg_mtkul = $this->model_->tot_reg_mtkul($tot_reg_dosen,$tot_reg_region)->result();
					foreach ($tot_reg_mtkul as $row) {
						$tot_reg_mtkul = $row->MTKULIAH;
						$tot_reg_no=$this->model_->tot_reg_no($tot_reg_dosen,$tot_reg_mtkul,$tot_reg_region)->result();
						foreach ($tot_reg_no as $row) {
							$tot_reg_no = $row->NO_DATA;
						}
						$tot_reg_cek_ajar=$this->model_->tot_reg_cek_ajar($tot_reg_dosen,$tot_reg_mtkul,$tot_reg_region)->result();
						foreach ($tot_reg_cek_ajar as $row) {
							$tot_reg_cek_ajar = $row->DOSEN;
						}
						$tot_reg_cek_sks=$this->model_->tot_reg_cek_sks($tot_reg_no)->result();
						foreach ($tot_reg_cek_sks as $row) {
							$tot_reg_cek_sks = $row->SKS;
						}
						$hitung_sks=$tot_reg_cek_ajar*$tot_reg_cek_sks;		
						$tot_sks=$tot_sks+$hitung_sks;
					}
					$sks=$tot_sks;
					$region = $tot_reg_region;
					foreach (array(1,2,3,4,5,6,7,8,9,10,11,12,13,14) as $mg):
						// $this->model_->crt_totalan_reg($mg);
						
						$data=[
							'DOSEN'=>$tot_reg_dosen,
							'SKS'=>$sks,
							'REGION'=>$tot_reg_region,
							// 'MINGGU'=>$mg,
							'CATT'=>'0',
							'BU'=>'0',
							'TR'=>'0',
							'LIBUR'=>'0',
							'an'=>'0',
							'_an'=>'0',
							'MTA'=>'0',
							'KETERANGAN'=>''
						];
						$this->db->insert('totalan_reg_m'.$mg,$data);
					endforeach;
				}
			}
		}
		redirect('main');
	}
	function create_monkos(){
		// $this->model_->crt_monkos();
		// redirect('main');
		// redirect('main/generate_tot');
		redirect('main/generate_tot_reg');
	}
	function crt_tot(){
		foreach (array(1,2,3,4,5,6,7,8,9,10,11,12,13,14) as $mg):
			$this->model_->crt_tot($mg);
		endforeach;
		redirect('main');
	}
	function delete_monkos(){
		$this->model_->del_monkos();
		redirect('main');
	}
	function delete_totalan(){
		$this->model_->del_totalan();
		redirect('main');	
	}
	function delete_reg_totalan(){
		$this->model_->del_reg_totalan();
		redirect('main');	
	}
	function delete_all(){
		$this->model_->del_all();
		redirect('main');	
	}
	function relate(){
		$this->model_->relate();
		redirect('main');
	}
	function alter(){
		$this->model_->alter();
		redirect('main');
	}
}