<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelulusan extends CI_Controller {
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
	$prodi=$this->input->post('kode_program_studi');
	$this->API="http://api.unikarta.ac.id/api/lulus?API-KEY=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6ImFsa3VqYSIsImlhdCI6MTU0MTk5MzkzNiwiZXhwIjoxNTQxOTk3NTM2fQ.eeVoobmrGio3Eu3vksKVgp_KGaHbVW2S7zhMsHeagVw&tahun=$tahun&semester=$semester&kode_program_studi=$prodi";
	$data['lulus']= json_decode($this->curl->simple_get($this->API));	
	$this->load->view('page_lulus',$data);	
	}
	public function infort()
	{
		$tahun=$this->input->post('tahun');
		$semester=$this->input->post('semester');
		$prodi=$this->input->post('kode_program_studi');
		$this->API="http://api.unikarta.ac.id/api/lulus?API-KEY=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6ImFsa3VqYSIsImlhdCI6MTU0MTk5MzkzNiwiZXhwIjoxNTQxOTk3NTM2fQ.eeVoobmrGio3Eu3vksKVgp_KGaHbVW2S7zhMsHeagVw&tahun=$tahun&semester=$semester&kode_program_studi=$prodi";
		$hsl= json_decode($this->curl->simple_get($this->API));
		
		$no_ins=$no_upd=0;
		foreach ($hsl as $data) {
			 $hasil=array(
						'nim'=>$data->nim,
						'kode_jurusan'=>$data->kode_program_studi,
						'nama'=>$data->nama,
						'id_jenis_keluar'=>$data->id_jenis_keluar,
						'tanggal_keluar'=>$data->tanggal_keluar,
						'semester'=>$data->semester,
						'sk_yudisium'=>$data->sk_yudisium,
						'tgl_sk_yudisium'=>$data->tanggal_sk_yudisium,
						'ipk'=>$data->ipk,
						'no_seri_ijasah'=>$data->no_seri_ijasah,
						'id_jns_akt_mhs'=>'2',
						'judul_skripsi'=>str_replace('"','',$data->judul_skripsi),
						'pembimbing_1'=>$data->pembimbing_1,
						'pembimbing_2'=>$data->pembimbing_2,
						'penguji_1'=>$data->penguji_1,
						'penguji_2'=>$data->penguji_2,
						'penguji_3'=>$data->penguji_3,
						'lokasi'=>$data->lokasi,
						'nomor_sk'=>$data->nomor_sk_penelitian,
						'tanggal_sk'=>$data->tanggal_sk,
						'keterangan'=>$data->semester,
                    );
					$this->db->insert('kelulusan',$hasil);
					$no_upd++;
		}
		echo "<h1> <center> Data Berhasil Ditrenfer Kedatabase Feeder Sebanyak : $no_upd </h1> ";
	}
}
