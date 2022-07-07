<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
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
	$this->API="http://api.unikarta.ac.id/api/kelas?API-KEY=..keydisini&tahun=$tahun&semester=$semester&kode_program_studi=$prodi";
	$data['kelas']= json_decode($this->curl->simple_get($this->API));
	$this->load->view('page_kelas',$data);	
	}
	
	
	public function infort(){
	$tahun=$this->input->post('tahun');
	$semester=$this->input->post('semester');
	$prodi=$this->input->post('prodi');
		$this->API="http://api.unikarta.ac.id/api/kelas?API-KEY=..keydisini&tahun=$tahun&semester=$semester&kode_program_studi=$prodi";
		$hsl= json_decode($this->curl->simple_get($this->API));
		$no_ins=$no_upd=0;
		foreach ($hsl as $data) {
			$hasil=array(
			'semester'=>$data->semester,
			'kode_mk'=>$data->kode_mata_kuliah,
			'nama_mk'=>$data->nama_mata_kuliah,
			'nama_kelas'=>$data->kelas,
			'kode_jurusan'=>$data->kode_program_studi,
			'kampus_merdeka'=>'0',
			'mode_kuliah'=>'M',
			'lingkup'=>'1',
			);
			$this->db->insert('kelas_kuliah',$hasil);
			$no_upd++;
		}
		echo "<h1> <center> Data Berhasil Ditrenfer Kedatabase SIMAK Sebanyak : $no_upd </h1> ";
	}
}
