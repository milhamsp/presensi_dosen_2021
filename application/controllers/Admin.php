<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('model_');
		$this->load->library('session');
		date_default_timezone_set('Asia/Jakarta');
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', '5000M');
	}

	function index(){
		redirect('admin/absen');
	}

	function absen(){
		$session = $this->session->userdata('logged');
		if($session){
			$data = [
				'absen'	=> $this->model_->get_absen()->result(),
			];
			$this->load->view('absen', $data);
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-warning fade show" role="alert">Sesi anda telah berakhir, silahkan Login ulang!</div>');
			redirect('auth');
		}
	}

	function monitoring(){
		$session = $this->session->userdata('logged');
		$time = date('Y-m-d H:i:s');
		if($session){
			$data = [
				'monkos_1' => $this->model_->get_monkos_m1()->result(),
				'monkos_2' => $this->model_->get_monkos_m2()->result(),
				'monkos_3' => $this->model_->get_monkos_m3()->result(),
				'monkos_4' => $this->model_->get_monkos_m4()->result(),
				'monkos_5' => $this->model_->get_monkos_m5()->result(),
				'monkos_6' => $this->model_->get_monkos_m6()->result(),
				'monkos_7' => $this->model_->get_monkos_m7()->result(),
				'monkos_8' => $this->model_->get_monkos_m8()->result(),
				'monkos_9' => $this->model_->get_monkos_m9()->result(),
				'monkos_10' => $this->model_->get_monkos_m10()->result(),
				'monkos_11' => $this->model_->get_monkos_m11()->result(),
				'monkos_12' => $this->model_->get_monkos_m12()->result(),
				'monkos_13' => $this->model_->get_monkos_m13()->result(),
				'monkos_14' => $this->model_->get_monkos_m14()->result(),
				'tdkhadir_1' => $this->model_->get_tdkhadir_m1()->result(),
				'tdkhadir_2' => $this->model_->get_tdkhadir_m2()->result(),
				'tdkhadir_3' => $this->model_->get_tdkhadir_m3()->result(),
				'tdkhadir_4' => $this->model_->get_tdkhadir_m4()->result(),
				'tdkhadir_5' => $this->model_->get_tdkhadir_m5()->result(),
				'tdkhadir_6' => $this->model_->get_tdkhadir_m6()->result(),
				'tdkhadir_7' => $this->model_->get_tdkhadir_m7()->result(),
				'tdkhadir_8' => $this->model_->get_tdkhadir_m8()->result(),
				'tdkhadir_9' => $this->model_->get_tdkhadir_m9()->result(),
				'tdkhadir_10' => $this->model_->get_tdkhadir_m10()->result(),
				'tdkhadir_11' => $this->model_->get_tdkhadir_m11()->result(),
				'tdkhadir_12' => $this->model_->get_tdkhadir_m12()->result(),
				'tdkhadir_13' => $this->model_->get_tdkhadir_m13()->result(),
				'tdkhadir_14' => $this->model_->get_tdkhadir_m14()->result(),
			];
			$this->load->view('monitoring', $data);
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-warning fade show" role="alert">Sesi anda telah berakhir, silahkan Login ulang!</div>');
			redirect('auth');
		}
	}

	function totalan(){
		$session = $this->session->userdata('logged');
		if($session){
			$data = [
				'tot_1' => $this->model_->get_tot_m1()->result(),
				'tot_2' => $this->model_->get_tot_m2()->result(),
				'tot_3' => $this->model_->get_tot_m3()->result(),
				'tot_4' => $this->model_->get_tot_m4()->result(),
				'tot_5' => $this->model_->get_tot_m5()->result(),
				'tot_6' => $this->model_->get_tot_m6()->result(),
				'tot_7' => $this->model_->get_tot_m7()->result(),
				'tot_8' => $this->model_->get_tot_m8()->result(),
				'tot_9' => $this->model_->get_tot_m9()->result(),
				'tot_10' => $this->model_->get_tot_m10()->result(),
				'tot_11' => $this->model_->get_tot_m11()->result(),
				'tot_12' => $this->model_->get_tot_m12()->result(),
				'tot_13' => $this->model_->get_tot_m13()->result(),
				'tot_14' => $this->model_->get_tot_m14()->result(),
			];
			$this->load->view('totalan', $data);
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-warning fade show" role="alert">Sesi anda telah berakhir, silahkan Login ulang!</div>');
			redirect('auth');
		}
	}

	function totalan_reg(){
		$session = $this->session->userdata('logged');
		if($session){
			$data = [
				'totr_1' => $this->model_->get_tot_reg_m1()->result(),
				'totr_2' => $this->model_->get_tot_reg_m2()->result(),
				'totr_3' => $this->model_->get_tot_reg_m3()->result(),
				'totr_4' => $this->model_->get_tot_reg_m4()->result(),
				'totr_5' => $this->model_->get_tot_reg_m5()->result(),
				'totr_6' => $this->model_->get_tot_reg_m6()->result(),
				'totr_7' => $this->model_->get_tot_reg_m7()->result(),
				'totr_8' => $this->model_->get_tot_reg_m8()->result(),
				'totr_9' => $this->model_->get_tot_reg_m9()->result(),
				'totr_10' => $this->model_->get_tot_reg_m10()->result(),
				'totr_11' => $this->model_->get_tot_reg_m11()->result(),
				'totr_12' => $this->model_->get_tot_reg_m12()->result(),
				'totr_13' => $this->model_->get_tot_reg_m13()->result(),
				'totr_14' => $this->model_->get_tot_reg_m14()->result()
			];
			$this->load->view('totalan_reg', $data);
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-warning fade show" role="alert">Sesi anda telah berakhir, silahkan Login ulang!</div>');
			redirect('auth');
		}
	}

	function konfigurasi(){
		$session = $this->session->userdata('logged');
		if($session){
			$data = [
				'periode1' => $this->model_->get_periode1()->result(),
				'periode2' => $this->model_->get_periode2()->result(),
				'periode3' => $this->model_->get_periode3()->result(),
				'periode4' => $this->model_->get_periode4()->result(),
				'periode5' => $this->model_->get_periode5()->result(),
				'periode6' => $this->model_->get_periode6()->result(),
				'periode7' => $this->model_->get_periode7()->result(),
				'periode8' => $this->model_->get_periode8()->result(),
				'periode9' => $this->model_->get_periode9()->result(),
				'periode10' => $this->model_->get_periode10()->result(),
				'periode11' => $this->model_->get_periode11()->result(),
				'periode12' => $this->model_->get_periode12()->result(),
				'periode13' => $this->model_->get_periode13()->result(),
				'periode14' => $this->model_->get_periode14()->result(),
			];
			$this->load->view('konfigurasi', $data);
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-warning fade show" role="alert">Sesi anda telah berakhir, silahkan Login ulang!</div>');
			redirect('auth');
		}
	}

	function set_periode(){
		foreach (array(1,2,3,4,5,6,7,8,9,10,11,12,13,14) as $mg):
			${'mulai'.$mg} = $this->input->post('mulai'.$mg,TRUE);
			${'akhir'.$mg} = $this->input->post('akhir'.$mg,TRUE);
			$this->model_->edit_periode(${'mulai'.$mg},${'akhir'.$mg},$mg);
		endforeach;
		$this->session->set_flashdata('message','<div class="alert alert-success fade show" role="alert">Data periode perkuliahan sudah diperbarui!</div>');
		redirect('admin/konfigurasi');
	}

}