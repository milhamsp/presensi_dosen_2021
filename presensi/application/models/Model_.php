<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ extends CI_Model{
	
	function get_periode_now($time){
		$this->db->select('minggu');
		$query = $this->db->get_where('periode', array('mulai <=' => $time, 'akhir >' => $time));
		return $query;
	}
	function get_dosen($hari){
		$this->db->select('DISTINCT(DOSEN)');
		$this->db->order_by('DOSEN','asc');
		$query = $this->db->get_where('datadosen', array('HARI' => $hari));
		return $query;
	}
	function get_dosen_bu($region,$dosen){
		$query = 'select distinct(DOSEN) from datadosen where DOSEN != "'.$dosen.'" and RUANG like "'.$region.'%"';
		$run_q = $this->db->query($query);
		return $run_q;
		// $this->db->select('DISTINCT(DOSEN)');
		// $this->db->order_by('DOSEN','asc');
		// $this->db->from('datadosen');
		// $query = $this->db->get();
		// return $query;
	}
	function get_kelas($dosen,$hari){
		$this->db->select('DISTINCT(KELAS)');
		$this->db->order_by('KELAS');
		$query = $this->db->get_where('datadosen', array('DOSEN' => $dosen, 'HARI' => $hari));
		return $query;
	}
	function get_mtkuliah($dosen,$hari,$kelas){
		$this->db->select('DISTINCT(MTKULIAH)');
		$this->db->order_by('MTKULIAH');
		$query = $this->db->get_where('datadosen', array('DOSEN' => $dosen, 'HARI' => $hari, 'KELAS' => $kelas));
		return $query;
	}
	function get_ruang($no){
		$this->db->select('RUANG');
		$query = $this->db->get_where('datadosen',array('NO_DATA' => $no));
		return $query;
	}
	function get_ruang_bu($dosen,$hari,$kelas,$mtkuliah){
		$this->db->select('RUANG');
		$query = $this->db->get_where('datadosen',array('DOSEN' => $dosen, 'HARI' => $hari, 'KELAS' => $kelas, 'MTKULIAH' => $mtkuliah));
		return $query;
	}
	function get_waktu($no){
		$this->db->select('WAKTU');
		$query = $this->db->get_where('datadosen',array('NO_DATA' => $no));
		return $query;
	}
	function get_no($dosen,$kelas,$mtkuliah,$hari){
		$this->db->select('NO_DATA');
		$query = $this->db->get_where('datadosen',array('DOSEN' => $dosen,'KELAS' => $kelas,'MTKULIAH' => $mtkuliah,'HARI' => $hari));
		return $query;
	}

	function get_absen(){
		$this->db->select('*');
		$this->db->from('datadosen');
		$this->db->join('absen','datadosen.NO_DATA = absen.NO_DATA','inner');
		$query = $this->db->get();
		return $query;
	}

	function get_akun($username,$enc){
		$query = $this->db->get_where('akun',array('username' => $username, 'password' => $enc));
		return $query;
	}

	function get_periode1(){
		$this->db->select('*');
		$query = $this->db->get_where('periode', array('minggu' => 1));
		return $query;
	}
	function get_periode2(){
		$this->db->select('*');
		$query = $this->db->get_where('periode', array('minggu' => 2));
		return $query;
	}
	function get_periode3(){
		$this->db->select('*');
		$query = $this->db->get_where('periode', array('minggu' => 3));
		return $query;
	}
	function get_periode4(){
		$this->db->select('*');
		$query = $this->db->get_where('periode', array('minggu' => 4));
		return $query;
	}
	function get_periode5(){
		$this->db->select('*');
		$query = $this->db->get_where('periode', array('minggu' => 5));
		return $query;
	}
	function get_periode6(){
		$this->db->select('*');
		$query = $this->db->get_where('periode', array('minggu' => 6));
		return $query;
	}
	function get_periode7(){
		$this->db->select('*');
		$query = $this->db->get_where('periode', array('minggu' => 7));
		return $query;
	}
	function get_periode8(){
		$this->db->select('*');
		$query = $this->db->get_where('periode', array('minggu' => 8));
		return $query;
	}
	function get_periode9(){
		$this->db->select('*');
		$query = $this->db->get_where('periode', array('minggu' => 9));
		return $query;
	}
	function get_periode10(){
		$this->db->select('*');
		$query = $this->db->get_where('periode', array('minggu' => 10));
		return $query;
	}
	function get_periode11(){
		$this->db->select('*');
		$query = $this->db->get_where('periode', array('minggu' => 11));
		return $query;
	}
	function get_periode12(){
		$this->db->select('*');
		$query = $this->db->get_where('periode', array('minggu' => 12));
		return $query;
	}
	function get_periode13(){
		$this->db->select('*');
		$query = $this->db->get_where('periode', array('minggu' => 13));
		return $query;
	}
	function get_periode14(){
		$this->db->select('*');
		$query = $this->db->get_where('periode', array('minggu' => 14));
		return $query;
	}
	
	function get_tot_m1(){
		$this->db->select('*');
		$this->db->from('totalan_m1');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_m2(){
		$this->db->select('*');
		$this->db->from('totalan_m2');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_m3(){
		$this->db->select('*');
		$this->db->from('totalan_m3');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_m4(){
		$this->db->select('*');
		$this->db->from('totalan_m4');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_m5(){
		$this->db->select('*');
		$this->db->from('totalan_m5');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_m6(){
		$this->db->select('*');
		$this->db->from('totalan_m6');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_m7(){
		$this->db->select('*');
		$this->db->from('totalan_m7');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_m8(){
		$this->db->select('*');
		$this->db->from('totalan_m8');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_m9(){
		$this->db->select('*');
		$this->db->from('totalan_m9');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_m10(){
		$this->db->select('*');
		$this->db->from('totalan_m10');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_m11(){
		$this->db->select('*');
		$this->db->from('totalan_m11');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_m12(){
		$this->db->select('*');
		$this->db->from('totalan_m12');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_m13(){
		$this->db->select('*');
		$this->db->from('totalan_m13');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_m14(){
		$this->db->select('*');
		$this->db->from('totalan_m14');
		$query = $this->db->get();
		return $query;
	}

	function get_tot_reg_m1(){
		$this->db->select('*');
		$this->db->from('totalan_reg_m1');
		$this->db->order_by('REGION');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_reg_m2(){
		$this->db->select('*');
		$this->db->from('totalan_reg_m2');
		$this->db->order_by('REGION');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_reg_m3(){
		$this->db->select('*');
		$this->db->from('totalan_reg_m3');
		$this->db->order_by('REGION');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_reg_m4(){
		$this->db->select('*');
		$this->db->from('totalan_reg_m4');
		$this->db->order_by('REGION');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_reg_m5(){
		$this->db->select('*');
		$this->db->from('totalan_reg_m5');
		$this->db->order_by('REGION');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_reg_m6(){
		$this->db->select('*');
		$this->db->from('totalan_reg_m6');
		$this->db->order_by('REGION');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_reg_m7(){
		$this->db->select('*');
		$this->db->from('totalan_reg_m7');
		$this->db->order_by('REGION');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_reg_m8(){
		$this->db->select('*');
		$this->db->from('totalan_reg_m8');
		$this->db->order_by('REGION');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_reg_m9(){
		$this->db->select('*');
		$this->db->from('totalan_reg_m9');
		$this->db->order_by('REGION');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_reg_m10(){
		$this->db->select('*');
		$this->db->from('totalan_reg_m10');
		$this->db->order_by('REGION');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_reg_m11(){
		$this->db->select('*');
		$this->db->from('totalan_reg_m11');
		$this->db->order_by('REGION');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_reg_m12(){
		$this->db->select('*');
		$this->db->from('totalan_reg_m12');
		$this->db->order_by('REGION');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_reg_m13(){
		$this->db->select('*');
		$this->db->from('totalan_reg_m13');
		$this->db->order_by('REGION');
		$query = $this->db->get();
		return $query;
	}
	function get_tot_reg_m14(){
		$this->db->select('*');
		$this->db->from('totalan_reg_m14');
		$this->db->order_by('REGION');
		$query = $this->db->get();
		return $query;
	}

	function get_monkos_m1(){
		$this->db->select('*');
		$this->db->from('datadosen');
		$this->db->join('monkos_m1','datadosen.NO_DATA = monkos_m1.NO_DATA','inner');
		$query = $this->db->get();
		return $query;
	}
	function get_monkos_m2(){
		$this->db->select('*');
		$this->db->from('datadosen');
		$this->db->join('monkos_m2','datadosen.NO_DATA = monkos_m2.NO_DATA','inner');
		$query = $this->db->get();
		return $query;
	}
	function get_monkos_m3(){
		$this->db->select('*');
		$this->db->from('datadosen');
		$this->db->join('monkos_m3','datadosen.NO_DATA = monkos_m3.NO_DATA','inner');
		$query = $this->db->get();
		return $query;
	}
	function get_monkos_m4(){
		$this->db->select('*');
		$this->db->from('datadosen');
		$this->db->join('monkos_m4','datadosen.NO_DATA = monkos_m4.NO_DATA','inner');
		$query = $this->db->get();
		return $query;
	}
	function get_monkos_m5(){
		$this->db->select('*');
		$this->db->from('datadosen');
		$this->db->join('monkos_m5','datadosen.NO_DATA = monkos_m5.NO_DATA','inner');
		$query = $this->db->get();
		return $query;
	}
	function get_monkos_m6(){
		$this->db->select('*');
		$this->db->from('datadosen');
		$this->db->join('monkos_m6','datadosen.NO_DATA = monkos_m6.NO_DATA','inner');
		$query = $this->db->get();
		return $query;
	}
	function get_monkos_m7(){
		$this->db->select('*');
		$this->db->from('datadosen');
		$this->db->join('monkos_m7','datadosen.NO_DATA = monkos_m7.NO_DATA','inner');
		$query = $this->db->get();
		return $query;
	}
	function get_monkos_m8(){
		$this->db->select('*');
		$this->db->from('datadosen');
		$this->db->join('monkos_m8','datadosen.NO_DATA = monkos_m8.NO_DATA','inner');
		$query = $this->db->get();
		return $query;
	}
	function get_monkos_m9(){
		$this->db->select('*');
		$this->db->from('datadosen');
		$this->db->join('monkos_m9','datadosen.NO_DATA = monkos_m9.NO_DATA','inner');
		$query = $this->db->get();
		return $query;
	}
	function get_monkos_m10(){
		$this->db->select('*');
		$this->db->from('datadosen');
		$this->db->join('monkos_m10','datadosen.NO_DATA = monkos_m10.NO_DATA','inner');
		$query = $this->db->get();
		return $query;
	}
	function get_monkos_m11(){
		$this->db->select('*');
		$this->db->from('datadosen');
		$this->db->join('monkos_m11','datadosen.NO_DATA = monkos_m11.NO_DATA','inner');
		$query = $this->db->get();
		return $query;
	}
	function get_monkos_m12(){
		$this->db->select('*');
		$this->db->from('datadosen');
		$this->db->join('monkos_m12','datadosen.NO_DATA = monkos_m12.NO_DATA','inner');
		$query = $this->db->get();
		return $query;
	}
	function get_monkos_m13(){
		$this->db->select('*');
		$this->db->from('datadosen');
		$this->db->join('monkos_m13','datadosen.NO_DATA = monkos_m13.NO_DATA','inner');
		$query = $this->db->get();
		return $query;
	}
	function get_monkos_m14(){
		$this->db->select('*');
		$this->db->from('datadosen');
		$this->db->join('monkos_m14','datadosen.NO_DATA = monkos_m14.NO_DATA','inner');
		$query = $this->db->get();
		return $query;
	}

	function get_tdkhadir_m1(){
		$query = 'select * FROM datadosen WHERE NO_DATA NOT IN (SELECT monkos_m1.NO_DATA FROM datadosen INNER JOIN monkos_m1 ON datadosen.NO_DATA = monkos_m1.NO_DATA)';
		$run_q = $this->db->query($query);
		return $run_q;	
	}
	function get_tdkhadir_m2(){
		$query = 'select * FROM datadosen WHERE NO_DATA NOT IN (SELECT monkos_m2.NO_DATA FROM datadosen INNER JOIN monkos_m2 ON datadosen.NO_DATA = monkos_m2.NO_DATA)';
		$run_q = $this->db->query($query);
		return $run_q;	
	}
	function get_tdkhadir_m3(){
		$query = 'select * FROM datadosen WHERE NO_DATA NOT IN (SELECT monkos_m3.NO_DATA FROM datadosen INNER JOIN monkos_m3 ON datadosen.NO_DATA = monkos_m3.NO_DATA)';
		$run_q = $this->db->query($query);
		return $run_q;	
	}
	function get_tdkhadir_m4(){
		$query = 'select * FROM datadosen WHERE NO_DATA NOT IN (SELECT monkos_m4.NO_DATA FROM datadosen INNER JOIN monkos_m4 ON datadosen.NO_DATA = monkos_m4.NO_DATA)';
		$run_q = $this->db->query($query);
		return $run_q;	
	}
	function get_tdkhadir_m5(){
		$query = 'select * FROM datadosen WHERE NO_DATA NOT IN (SELECT monkos_m5.NO_DATA FROM datadosen INNER JOIN monkos_m5 ON datadosen.NO_DATA = monkos_m5.NO_DATA)';
		$run_q = $this->db->query($query);
		return $run_q;	
	}
	function get_tdkhadir_m6(){
		$query = 'select * FROM datadosen WHERE NO_DATA NOT IN (SELECT monkos_m6.NO_DATA FROM datadosen INNER JOIN monkos_m6 ON datadosen.NO_DATA = monkos_m6.NO_DATA)';
		$run_q = $this->db->query($query);
		return $run_q;	
	}
	function get_tdkhadir_m7(){
		$query = 'select * FROM datadosen WHERE NO_DATA NOT IN (SELECT monkos_m7.NO_DATA FROM datadosen INNER JOIN monkos_m7 ON datadosen.NO_DATA = monkos_m7.NO_DATA)';
		$run_q = $this->db->query($query);
		return $run_q;	
	}
	function get_tdkhadir_m8(){
		$query = 'select * FROM datadosen WHERE NO_DATA NOT IN (SELECT monkos_m8.NO_DATA FROM datadosen INNER JOIN monkos_m8 ON datadosen.NO_DATA = monkos_m8.NO_DATA)';
		$run_q = $this->db->query($query);
		return $run_q;	
	}
	function get_tdkhadir_m9(){
		$query = 'select * FROM datadosen WHERE NO_DATA NOT IN (SELECT monkos_m9.NO_DATA FROM datadosen INNER JOIN monkos_m9 ON datadosen.NO_DATA = monkos_m9.NO_DATA)';
		$run_q = $this->db->query($query);
		return $run_q;	
	}
	function get_tdkhadir_m10(){
		$query = 'select * FROM datadosen WHERE NO_DATA NOT IN (SELECT monkos_m10.NO_DATA FROM datadosen INNER JOIN monkos_m10 ON datadosen.NO_DATA = monkos_m10.NO_DATA)';
		$run_q = $this->db->query($query);
		return $run_q;	
	}
	function get_tdkhadir_m11(){
		$query = 'select * FROM datadosen WHERE NO_DATA NOT IN (SELECT monkos_m11.NO_DATA FROM datadosen INNER JOIN monkos_m11 ON datadosen.NO_DATA = monkos_m11.NO_DATA)';
		$run_q = $this->db->query($query);
		return $run_q;	
	}
	function get_tdkhadir_m12(){
		$query = 'select * FROM datadosen WHERE NO_DATA NOT IN (SELECT monkos_m12.NO_DATA FROM datadosen INNER JOIN monkos_m12 ON datadosen.NO_DATA = monkos_m12.NO_DATA)';
		$run_q = $this->db->query($query);
		return $run_q;	
	}
	function get_tdkhadir_m13(){
		$query = 'select * FROM datadosen WHERE NO_DATA NOT IN (SELECT monkos_m13.NO_DATA FROM datadosen INNER JOIN monkos_m13 ON datadosen.NO_DATA = monkos_m13.NO_DATA)';
		$run_q = $this->db->query($query);
		return $run_q;	
	}
	function get_tdkhadir_m14(){
		$query = 'select * FROM datadosen WHERE NO_DATA NOT IN (SELECT monkos_m14.NO_DATA FROM datadosen INNER JOIN monkos_m14 ON datadosen.NO_DATA = monkos_m14.NO_DATA)';
		$run_q = $this->db->query($query);
		return $run_q;	
	}

	function cek_absen($no,$minggu){
		$this->db->select('NO_ABSEN');
		$query = $this->db->get_where('absen',array('NO_DATA' => $no,'MINGGU' => $minggu));
		return $query;
	}
	function cek_ajar($dosen,$mtkuliah){
		$query = 'select COUNT(*)DOSEN FROM datadosen WHERE DOSEN = "'.$dosen.'" and MTKULIAH = "'.$mtkuliah.'"';
		$run_q = $this->db->query($query);
		return $run_q;
	}
	function cek_sks($no){
		$query = "select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1 AS SKS FROM datadosen WHERE NO_DATA = '".$no."'";
		$run_q = $this->db->query($query);
		return $run_q;
	}


	function tot_dosen(){
		$this->db->select('DISTINCT(DOSEN)');
		$this->db->order_by('DOSEN');
		$query = $this->db->get('datadosen');
		return $query;	
	}
	function tot_cek_ajar($tot_dosen,$tot_mtkul){
		$query = 'select COUNT(*)DOSEN FROM datadosen WHERE DOSEN = "'.$tot_dosen.'" and MTKULIAH = "'.$tot_mtkul.'"';
		$run_q = $this->db->query($query);
		return $run_q;
	}
	function tot_cek_sks($tot_no){
		$query = "select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1 AS SKS FROM datadosen WHERE NO_DATA = '".$tot_no."'";
		$run_q = $this->db->query($query);
		return $run_q;
	}
	function tot_no($tot_dosen,$tot_mtkul){
		$this->db->select('NO_DATA');
		$query = $this->db->get_where('datadosen',array('DOSEN' => $tot_dosen,'MTKULIAH' => $tot_mtkul));
		return $query;
	}
	function tot_mtkul($tot_dosen){
		$this->db->select('DISTINCT(MTKULIAH)');
		$this->db->order_by('MTKULIAH');
		$query = $this->db->get_where('datadosen', array('DOSEN' => $tot_dosen));
		return $query;
	}
	function tot_ruang($tot_dosen){
		$this->db->select('DISTINCT(RUANG)');
		$this->db->order_by('RUANG');
		$query = $this->db->get_where('datadosen', array('DOSEN' => $tot_dosen));
		return $query;
	}

	function tot_reg_ruang(){
		$query = 'select DISTINCT(RUANG) from datadosen order by RUANG';
		$run_q = $this->db->query($query);
		return $run_q;
	}
	function tot_reg_dosen($tot_reg_region){
		$query = 'select DISTINCT(DOSEN) from datadosen where RUANG like "'.$tot_reg_region.'%"';
		$run_q = $this->db->query($query);
		return $run_q;
	}
	function tot_reg_mtkul($tot_reg_dosen,$tot_reg_region){
		$query = 'select DISTINCT(MTKULIAH) from datadosen where DOSEN = "'.$tot_reg_dosen.'" and RUANG like "'.$tot_reg_region.'%"';
		$run_q = $this->db->query($query);
		return $run_q;	
	}
	function tot_reg_no($tot_reg_dosen,$tot_reg_mtkul,$tot_reg_region){
		$query = 'select NO_DATA from datadosen where DOSEN = "'.$tot_reg_dosen.'" and MTKULIAH = "'.$tot_reg_mtkul.'" and RUANG like "'.$tot_reg_region.'%"';
		$run_q = $this->db->query($query);
		return $run_q;	
	}
	function tot_reg_cek_ajar($tot_reg_dosen,$tot_reg_mtkul,$tot_reg_region){
		$query = 'select COUNT(*)DOSEN FROM datadosen WHERE DOSEN = "'.$tot_reg_dosen.'" and MTKULIAH = "'.$tot_reg_mtkul.'" and RUANG like "'.$tot_reg_region.'%"';
		$run_q = $this->db->query($query);
		return $run_q;
	}
	function tot_reg_cek_sks($tot_reg_no){
		$query = "select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1 AS SKS FROM datadosen WHERE NO_DATA = '".$tot_reg_no."'";
		$run_q = $this->db->query($query);
		return $run_q;
	}


	function hitung_totalan($dosen,$minggu){
		$this->db->select('HADIR');
		$query = $this->db->get_where('totalan_m'.$minggu,array('DOSEN' => $dosen));
		return $query;
		// $query = 'select HADIR+BU as HADIR from totalan_m'.$minggu.' where DOSEN = "'.$dosen.'"';
		// $run_q = $this->db->query($query);
		// return $run_q;
	}
	function hitung_totalan_reg($dosen,$minggu,$region){
		$query = 'select HADIR from totalan_reg_m'.$minggu.' where DOSEN = "'.$dosen.'" and REGION like "'.$region.'%"';
		$run_q = $this->db->query($query);
		return $run_q;
	}


	function hitung_totalan_bu($dosen,$minggu){
		$this->db->select('BU');
		$query = $this->db->get_where('totalan_m'.$minggu,array('DOSEN' => $dosen));
		return $query;
	}
	function hitung_totalan_reg_bu($dosen,$minggu,$region){
		$query = 'select BU from totalan_reg_m'.$minggu.' where DOSEN = "'.$dosen.'" and REGION like "'.$region.'%"';
		$run_q = $this->db->query($query);
		return $run_q;
	}


	function add_gmeet($no,$minggu,$keterangan,$dosen,$totalan,$totalan_reg,$totalan_bu,$totalan_reg_bu,$region){
			$this->db->insert('monkos_m'.$minggu,['NO_DATA'=>$no,'KETERANGAN'=>$keterangan,'REGION'=>$region,'GMEET'=>1]);
		$this->db->like('DOSEN',$dosen);
        $this->db->from('totalan_m'.$minggu);
        $query1 = $this->db->count_all_results();
		if($query1==0){
				
		}else{
				$query4 = "update totalan_m".$minggu." set HADIR = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan." FROM `datadosen` WHERE NO_DATA =".$no."), TOTAL = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan."+".$totalan_bu." FROM `datadosen` WHERE NO_DATA =".$no.") WHERE DOSEN = '".$dosen."'";
				$run_q = $this->db->query($query4);
				$query = "update totalan_reg_m".$minggu." set HADIR = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_reg." FROM `datadosen` WHERE NO_DATA =".$no."), TOTAL = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_reg."+".$totalan_reg_bu." FROM `datadosen` WHERE NO_DATA =".$no.") WHERE DOSEN = '".$dosen."' AND REGION LIKE '".$region."%'";
				$run_q = $this->db->query($query);
		}
	}
	function add_zoom($no,$minggu,$keterangan,$dosen,$totalan,$totalan_reg,$totalan_bu,$totalan_reg_bu,$region){
			$this->db->insert('monkos_m'.$minggu,['NO_DATA'=>$no,'KETERANGAN'=>$keterangan,'REGION'=>$region,'ZOOM'=>1]);
		$this->db->like('DOSEN',$dosen);
        $this->db->from('totalan_m'.$minggu);
        $query1 = $this->db->count_all_results();
		if($query1==0){
				
		}else{
				$query4 = "update totalan_m".$minggu." set HADIR = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan." FROM `datadosen` WHERE NO_DATA =".$no."), TOTAL = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan."+".$totalan_bu." FROM `datadosen` WHERE NO_DATA =".$no.") WHERE DOSEN = '".$dosen."'";
				$run_q = $this->db->query($query4);
				$query = "update totalan_reg_m".$minggu." set HADIR = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_reg." FROM `datadosen` WHERE NO_DATA =".$no."), TOTAL = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_reg."+".$totalan_reg_bu." FROM `datadosen` WHERE NO_DATA =".$no.") WHERE DOSEN = '".$dosen."' AND REGION LIKE '".$region."%'";
				$run_q = $this->db->query($query);
		}
	}
	function add_vc($no,$minggu,$keterangan,$dosen,$totalan,$totalan_reg,$totalan_bu,$totalan_reg_bu,$region){
			$this->db->insert('monkos_m'.$minggu,['NO_DATA'=>$no,'KETERANGAN'=>$keterangan,'REGION'=>$region,'VCLASS'=>1]);
		$this->db->like('DOSEN',$dosen);
        $this->db->from('totalan_m'.$minggu);
        $query1 = $this->db->count_all_results();
		if($query1==0){
				
		}else{
				$query4 = "update totalan_m".$minggu." set HADIR = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan." FROM `datadosen` WHERE NO_DATA =".$no."), TOTAL = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan."+".$totalan_bu." FROM `datadosen` WHERE NO_DATA =".$no.") WHERE DOSEN = '".$dosen."'";
				$run_q = $this->db->query($query4);
				$query = "update totalan_reg_m".$minggu." set HADIR = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_reg." FROM `datadosen` WHERE NO_DATA =".$no."), TOTAL = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_reg."+".$totalan_reg_bu." FROM `datadosen` WHERE NO_DATA =".$no.") WHERE DOSEN = '".$dosen."' AND REGION LIKE '".$region."%'";
				$run_q = $this->db->query($query);
		}
	}
	function add_lain($no,$minggu,$keterangan,$dosen,$totalan,$totalan_reg,$totalan_bu,$totalan_reg_bu,$region){
			$this->db->insert('monkos_m'.$minggu,['NO_DATA'=>$no,'KETERANGAN'=>$keterangan,'REGION'=>$region,'LAIN'=>1]);
		$this->db->like('DOSEN',$dosen);
        $this->db->from('totalan_m'.$minggu);
        $query1 = $this->db->count_all_results();
		if($query1==0){
				
		}else{
				$query4 = "update totalan_m".$minggu." set HADIR = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan." FROM `datadosen` WHERE NO_DATA =".$no."), TOTAL = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan."+".$totalan_bu." FROM `datadosen` WHERE NO_DATA =".$no.") WHERE DOSEN = '".$dosen."'";
				$run_q = $this->db->query($query4);
				$query = "update totalan_reg_m".$minggu." set HADIR = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_reg." FROM `datadosen` WHERE NO_DATA =".$no."), TOTAL = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_reg."+".$totalan_reg_bu." FROM `datadosen` WHERE NO_DATA =".$no.") WHERE DOSEN = '".$dosen."' AND REGION LIKE '".$region."%'";
				$run_q = $this->db->query($query);
		}
	}

	function add_gmeet_bu($no,$minggu,$keterangan,$dosen,$totalan,$totalan_reg,$totalan_bu,$totalan_reg_bu,$region){
			$this->db->insert('monkos_m'.$minggu,['NO_DATA'=>$no,'KETERANGAN'=>$keterangan,'REGION'=>$region,'GMEET'=>1]);
		$this->db->like('DOSEN',$dosen);
        $this->db->from('totalan_m'.$minggu);
        $query1 = $this->db->count_all_results();
		if($query1==0){
			
		}else{
				$query4 = "update totalan_m".$minggu." set BU = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_bu." FROM `datadosen` WHERE NO_DATA =".$no."), TOTAL = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan."+".$totalan_bu." FROM `datadosen` WHERE NO_DATA =".$no.") WHERE DOSEN = '".$dosen."'";
				$run_q = $this->db->query($query4);
				$query = "update totalan_reg_m".$minggu." set BU = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_reg_bu." FROM `datadosen` WHERE NO_DATA =".$no."), TOTAL = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_reg."+".$totalan_reg_bu." FROM `datadosen` WHERE NO_DATA =".$no.") WHERE DOSEN = '".$dosen."' AND REGION LIKE '".$region."%'";
				$run_q = $this->db->query($query);
		}
	}
	function add_zoom_bu($no,$minggu,$keterangan,$dosen,$totalan,$totalan_reg,$totalan_bu,$totalan_reg_bu,$region){
			$this->db->insert('monkos_m'.$minggu,['NO_DATA'=>$no,'KETERANGAN'=>$keterangan,'REGION'=>$region,'ZOOM'=>1]);
		$this->db->like('DOSEN',$dosen);
        $this->db->from('totalan_m'.$minggu);
        $query1 = $this->db->count_all_results();
		if($query1==0){
			
		}else{
				$query4 = "update totalan_m".$minggu." set BU = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_bu." FROM `datadosen` WHERE NO_DATA =".$no."), TOTAL = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan."+".$totalan_bu." FROM `datadosen` WHERE NO_DATA =".$no.") WHERE DOSEN = '".$dosen."'";
				$run_q = $this->db->query($query4);
				$query = "update totalan_reg_m".$minggu." set BU = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_reg_bu." FROM `datadosen` WHERE NO_DATA =".$no."), TOTAL = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_reg."+".$totalan_reg_bu." FROM `datadosen` WHERE NO_DATA =".$no.") WHERE DOSEN = '".$dosen."' AND REGION LIKE '".$region."%'";
				$run_q = $this->db->query($query);
		}
	}
	function add_vc_bu($no,$minggu,$keterangan,$dosen,$totalan,$totalan_reg,$totalan_bu,$totalan_reg_bu,$region){
			$this->db->insert('monkos_m'.$minggu,['NO_DATA'=>$no,'KETERANGAN'=>$keterangan,'REGION'=>$region,'VCLASS'=>1]);
		$this->db->like('DOSEN',$dosen);
        $this->db->from('totalan_m'.$minggu);
        $query1 = $this->db->count_all_results();
		if($query1==0){
			
		}else{
				$query4 = "update totalan_m".$minggu." set BU = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_bu." FROM `datadosen` WHERE NO_DATA =".$no."), TOTAL = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan."+".$totalan_bu." FROM `datadosen` WHERE NO_DATA =".$no.") WHERE DOSEN = '".$dosen."'";
				$run_q = $this->db->query($query4);
				$query = "update totalan_reg_m".$minggu." set BU = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_reg_bu." FROM `datadosen` WHERE NO_DATA =".$no."), TOTAL = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_reg."+".$totalan_reg_bu." FROM `datadosen` WHERE NO_DATA =".$no.") WHERE DOSEN = '".$dosen."' AND REGION LIKE '".$region."%'";
				$run_q = $this->db->query($query);
		}
	}
	function add_lain_bu($no,$minggu,$keterangan,$dosen,$totalan,$totalan_reg,$totalan_bu,$totalan_reg_bu,$region){
			$this->db->insert('monkos_m'.$minggu,['NO_DATA'=>$no,'KETERANGAN'=>$keterangan,'REGION'=>$region,'LAIN'=>1]);
		$this->db->like('DOSEN',$dosen);
        $this->db->from('totalan_m'.$minggu);
        $query1 = $this->db->count_all_results();
		if($query1==0){
			
		}else{
				$query4 = "update totalan_m".$minggu." set BU = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_bu." FROM `datadosen` WHERE NO_DATA =".$no."), TOTAL = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan."+".$totalan_bu." FROM `datadosen` WHERE NO_DATA =".$no.") WHERE DOSEN = '".$dosen."'";
				$run_q = $this->db->query($query4);
				$query = "update totalan_reg_m".$minggu." set BU = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_reg_bu." FROM `datadosen` WHERE NO_DATA =".$no."), TOTAL = (select LENGTH(WAKTU)-LENGTH(REPLACE(WAKTU,'/',''))+1+".$totalan_reg."+".$totalan_reg_bu." FROM `datadosen` WHERE NO_DATA =".$no.") WHERE DOSEN = '".$dosen."' AND REGION LIKE '".$region."%'";
				$run_q = $this->db->query($query);
		}
	}

	function alter(){
		foreach (array(1,2,3,4,5,6,7,8,9,10,11,12,13,14) as $mg):
			$query = "alter table totalan_m".$mg." modify column BU int(3)";
			$this->db->query($query);
			$query = "alter table totalan_reg_m".$mg." modify column BU int(3)";
			$this->db->query($query);
		endforeach;
	}
	function edit_periode($mulai,$akhir,$mg){
		$query = "update periode set mulai = '".$mulai."', akhir = '".$akhir."' WHERE minggu = '".$mg."'";
		$run_q = $this->db->query($query);
	}
	function crt_monkos(){
		$query = "create TABLE IF NOT EXISTS monkos (
			  NO_MON int(6) NOT NULL PRIMARY KEY,
			  GMEET int(3) DEFAULT 0,
			  ZOOM int(3) DEFAULT 0,
			  VCLASS int(3) DEFAULT 0,
			  LAIN int(3) DEFAULT 0,
			  KETERANGAN varchar(100) DEFAULT NULL,
			  NO_DATA int(6) DEFAULT NULL,
			  REGION varchar(3) NOT NULL
			  MINGGU int(2) NOT NULL
			)";
			
			$this->db->query($query);
			$query = "create TABLE IF NOT EXISTS totalan_reg (
			  NO_TOT_REG int(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			  DOSEN varchar(40) NOT NULL,
			  SKS int(3) NOT NULL DEFAULT 0,
			  HADIR int(3) NOT NULL DEFAULT 0,
			  CATT varchar(10) NOT NULL,
			  BU varchar(10) NOT NULL,
			  TR varchar(10) NOT NULL,
			  LIBUR varchar(10) NOT NULL,
			  an varchar(10) NOT NULL,
			  _an varchar(10) NOT NULL,
			  MTA varchar(10) NOT NULL,
			  TOTAL int(3) NOT NULL DEFAULT 0,
			  KETERANGAN varchar(50) NOT NULL,
			  REGION varchar(2) NOT NULL,
			  MINGGU int(2) NOT NULL
			)";
			$this->db->query($query);
			$query = "create TABLE IF NOT EXISTS totalan (
			  NO_TOT int(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			  DOSEN varchar(40) NOT NULL,
			  SKS int(3) NOT NULL DEFAULT 0,
			  HADIR int(3) NOT NULL DEFAULT 0,
			  CATT varchar(10) NOT NULL,
			  BU varchar(10) NOT NULL,
			  TR varchar(10) NOT NULL,
			  LIBUR varchar(10) NOT NULL,
			  an varchar(10) NOT NULL,
			  _an varchar(10) NOT NULL,
			  MTA varchar(10) NOT NULL,
			  TOTAL int(3) NOT NULL DEFAULT 0,
			  KETERANGAN varchar(50) NOT NULL,
			  MINGGU int(2) NOT NULL
			)";
			$this->db->query($query);
		foreach (array(1,2,3,4,5,6,7,8,9,10,11,12,13,14) as $mg):
			// $query = "alter table monkos_m".$mg." modify column KETERANGAN varchar(50)";
		endforeach;
	}
	function crt_tot($mg){
		
		// foreach (array(1,2,3,4,5,6,7,8,9,10,11,12,13,14) as $mg):
		
			$query = "drop table totalan_reg_m".$mg."";
			$this->db->query($query);
			$query = "drop table totalan_m".$mg."";
			$this->db->query($query);
		$query = "create TABLE IF NOT EXISTS totalan_m".$mg." (
		  NO_TOT int(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  DOSEN varchar(40) NOT NULL,
		  SKS int(3) NOT NULL DEFAULT 0,
		  HADIR int(3) NOT NULL DEFAULT 0,
		  CATT int(3) NOT NULL DEFAULT 0,
		  BU int(3) NOT NULL DEFAULT 0,
		  TR int(3) NOT NULL DEFAULT 0,
		  LIBUR int(3) NOT NULL DEFAULT 0,
		  an int(3) NOT NULL DEFAULT 0,
		  _an int(3) NOT NULL DEFAULT 0,
		  MTA int(3) NOT NULL DEFAULT 0,
		  TOTAL int(3) NOT NULL DEFAULT 0,
		  KETERANGAN varchar(50) NOT NULL
		)";
		$this->db->query($query);

		$query = "create TABLE IF NOT EXISTS totalan_reg_m".$mg." (
		  NO_TOT int(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  DOSEN varchar(40) NOT NULL,
		  SKS int(3) NOT NULL DEFAULT 0,
		  HADIR int(3) NOT NULL DEFAULT 0,
		  CATT int(3) NOT NULL DEFAULT 0,
		  BU int(3) NOT NULL DEFAULT 0,
		  TR int(3) NOT NULL DEFAULT 0,
		  LIBUR int(3) NOT NULL DEFAULT 0,
		  an int(3) NOT NULL DEFAULT 0,
		  _an int(3) NOT NULL DEFAULT 0,
		  MTA int(3) NOT NULL DEFAULT 0,
		  TOTAL int(3) NOT NULL DEFAULT 0,
		  KETERANGAN varchar(50) NOT NULL,
		  REGION varchar(2) NOT NULL
		)";
		$this->db->query($query);
	// endforeach;
	}
	function crt_totalan_reg($mg){
		
		// foreach (array(1,2,3,4,5,6,7,8,9,10,11,12,13,14) as $mg):
				
		
	// endforeach;
	}
	function del_monkos(){
		foreach (array(1,2,3,4,5,6,7,8,9,10,11,12,13,14) as $mg):
			/*$query = "drop table monkos_".$mg;*/
			$query = "truncate monkos_m".$mg."";
			$this->db->query($query);
		endforeach;
		$query = "truncate absen";
		$this->db->query($query);
	}
	function del_totalan(){
		foreach (array(1,2,3,4,5,6,7,8,9,10,11,12,13,14) as $mg):
			/*$query = "drop table monkos_".$mg;*/
			$query = "update totalan_m".$mg." set HADIR = 0, TOTAL = 0";
			$this->db->query($query);
			$query = "update totalan_reg_m".$mg." set HADIR = 0, TOTAL = 0";
			$this->db->query($query);
		endforeach;
		$query = "truncate absen";
		$this->db->query($query);
	}
	function del_reg_totalan(){
		foreach (array(1,2,3,4,5,6,7,8,9,10,11,12,13,14) as $mg):
			// $query = "drop table totalan_reg_m".$mg;
			$query = "update totalan_reg_m".$mg." set HADIR = 0, TOTAL = 0";
			$this->db->query($query);
		endforeach;
		$query = "truncate absen";
		$this->db->query($query);
	}
	function del_all(){
		foreach (array(1,2,3,4,5,6,7,8,9,10,11,12,13,14) as $mg):
			$query = "truncate monkos_m".$mg."";
			$this->db->query($query);
			$query = "delete from totalan_m".$mg."";
			$this->db->query($query);
			$query = "delete from totalan_reg_m".$mg."";
			$this->db->query($query);
			// $query = "update totalan_m".$mg." set HADIR = 0, TOTAL = 0";
			// $this->db->query($query);
			// $query = "update totalan_reg_m".$mg." set HADIR = 0, TOTAL = 0";
			// $this->db->query($query);
		endforeach;
		$query = "truncate absen";
		$this->db->query($query);
	}
	function relate(){
		foreach (array(1,2,3,4,5,6,7,8,9,10,11,12,13,14) as $mg):
			// $query = "alter table totalan_reg_m".$mg." add foreign key (DOSEN) references totalan_m".$mg." (DOSEN) on delete cascade";
			$query = "alter table totalan_reg_m".$mg." drop foreign key totalan_reg_m".$mg."_ibfk_1";
			$this->db->query($query);
		endforeach;
	}
}