<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('model_');
		$this->load->library('session');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', '500M');
	}

	function index(){
		$this->load->view('login');
	}

	function login(){
		$this->form_validation->set_rules('username','username','required|trim',[
			'required'=>'Username dibutuhkan!'
		]);
		$this->form_validation->set_rules('password','password','required|trim',[
			'required'=>'Password dibutuhkan!'
		]);
		$sess=$this->session->userdata('logged');
		if($sess==true){
			redirect('admin');
		}else{
			if($this->form_validation->run()==false){
				$this->load->view('login');
				// redirect('auth');
			}else{
				$this->_login();
			}
		}
	}

	private function _login(){
		$username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);
		$enc = md5($password);
		$akun = $this->model_->get_akun($username,$enc)->result();
		if($akun){
			$data = [
				'logged' => true
			];
			$this->session->set_userdata($data);
			redirect('admin');
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger fade show" role="alert">Username atau Password anda salah!</div>');
			// redirect('auth');
			$this->load->view('login');
		}
	}

	function logout(){
		$data=[
			'logged'
		];
		$this->session->unset_userdata($data);
		$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">Anda berhasil Logout!</div>');
		redirect('auth');
	}
}