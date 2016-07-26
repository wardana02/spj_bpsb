<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Belanja extends MY_Controller {


 	public $data = array(
 		'b'=> 'active',
 		'b3'=> 'active',
 		);

	private $control='belanja';

	public function __construct(){
			parent::__construct();
			$this->load->model('Belanja_model','belanja',TRUE);
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$status = $this->session->userdata('status');
			if($status=="Pengguna"){
				redirect('dashboard');
			}

		}

	public function index()
	{
		$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b3']='active';
		
		$data['conten'] = 'backend/admin/Belanja/index';
		$data['data'] = $this->belanja->get_all_data();
		$this->load->view('backend/dashboard/index', $data);
	}

	public function add(){
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b3']='active';

			$data['conten'] = 'backend/admin/Belanja/add_belanja';
			$this->load->view('backend/dashboard/index',$data);
	}

	public function run_save(){ 

			$status = $this->belanja->simpan();
			if($status){
				$pesan = "Data Berhasil Disimpan";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Tersimpan, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
				redirect($this->control);
			
		}

	public function edit($id) {
			$data['nama_user'] = $this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b3']='active';

			$data['conten'] = 'backend/admin/Belanja/edit_belanja';
			$data['data']=$this->belanja->edit($id);
			$this->load->view('backend/dashboard/index',$data);
		}

		
	public function run_edit()   {
			$id 				= $this->input->post('id_belanja');
			$kode_belanja 	= $this->input->post('kode_belanja');
			$judul_belanja	= $this->input->post('judul_belanja');

			$status = $this->belanja->simpan_edit($id,$kode_belanja,$judul_belanja);
			if($status){
				$pesan = "Data Berhasil Diperbaharui";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Diperbaharui, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
			redirect($this->control);
    }

	public function run_delete($id){
		$status = $this->belanja->hapus($id);
		if($status){
				$pesan = "Data Berhasil Dihapus";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Dihapu, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
				redirect($this->control);

	}

}