<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akm extends CI_Controller {
var $API ="";	
	function __construct(){
		parent::__construct();
		$this->load->library('curl');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
	$tahun=$this->input->post('tahun');
	$semester=$this->input->post('semester');
	$prodi=$this->input->post('prodi');
	$this->API="http://api.unikarta.ac.id/api/akm?API-KEY=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6ImFsa3VqYSIsImlhdCI6MTU0MTk5MzkzNiwiZXhwIjoxNTQxOTk3NTM2fQ.eeVoobmrGio3Eu3vksKVgp_KGaHbVW2S7zhMsHeagVw&tahun=$tahun&semester=$semester&kode_program_studi=$prodi";
	$data['akm']= json_decode($this->curl->simple_get($this->API));
	$this->load->view('page_akm',$data);	
	}
	
	
	public function infort(){
	$tahun=$this->input->post('tahun');
	$semester=$this->input->post('semester');
	$prodi=$this->input->post('prodi');
		$this->API="http://api.unikarta.ac.id/api/akm?API-KEY=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6ImFsa3VqYSIsImlhdCI6MTU0MTk5MzkzNiwiZXhwIjoxNTQxOTk3NTM2fQ.eeVoobmrGio3Eu3vksKVgp_KGaHbVW2S7zhMsHeagVw&tahun=$tahun&semester=$semester&kode_program_studi=$prodi";
		$hsl= json_decode($this->curl->simple_get($this->API));
		$no_ins=$no_upd=0;
		foreach ($hsl as $data) {
			$hasil=array(
			'semester'=>$data->semester_pelaporan,
			'nim'=>$data->nim,
			'nama'=>$data->nama_mahasiswa,
			'ips'=>$data->ips,
			'ipk'=>$data->ipk,
			'sks_smt'=>$data->sks_semester,
			'sks_total'=>$data->sks_total,
			'kode_jurusan'=>$data->kode_program_studi,
			'status_kuliah'=>$data->status_mahasiswa
			);
			$this->db->insert('nilai_akm',$hasil);
			$no_upd++;
		}
		echo "<h1> <center> Data Berhasil Ditrenfer Kedatabase SIMAK Sebanyak : $no_upd </h1> ";
	}
}
