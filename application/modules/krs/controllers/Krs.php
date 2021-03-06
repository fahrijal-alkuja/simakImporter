<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Krs extends CI_Controller
{
	var $API = "";
	function __construct()
	{
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
	public function index()
	{
		$tahun = $this->input->post('tahun');
		$periode = $this->input->post('semester');
		$prodi = $this->input->post('prodi');
		$this->API = "http://api.unikarta.ac.id/api/krs?API-KEY=..keydisini&tahun=$tahun&periode=$periode&kode_program_studi=$prodi";
		$data['krs'] = json_decode($this->curl->simple_get($this->API));
		$this->load->view('page_krs', $data);
	}


	public function infort()
	{
		$tahun = $this->input->post('tahun');
		$periode = $this->input->post('semester');
		$prodi = $this->input->post('prodi');
		$this->API = "http://api.unikarta.ac.id/api/krs?API-KEY=..keydisini&tahun=$tahun&periode=$periode&kode_program_studi=$prodi";
		$hsl = json_decode($this->curl->simple_get($this->API));
		$no_ins = $no_upd = 0;
		foreach ($hsl as $data) {
			$hasil = array(
				'nim' => $data->nim,
				'nama' => $data->nama_mahasiswa,
				'kode_mk' => $data->kode_mata_kuliah,
				'nama_mk' => $data->nama_mata_kuliah,
				'nama_kelas' => $data->kelas,
				'semester' => $data->semester,
				'kode_jurusan' => $data->kode_program_studi,
			);
			$this->db->insert('krs', $hasil);
			$no_upd++;
		}
		echo "<h1> <center> Data Berhasil Ditrenfer Kedatabase SIMAK Sebanyak : $no_upd </h1> ";
	}
}
