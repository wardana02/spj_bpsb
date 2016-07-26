<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Kegiatan extends MY_Controller {

	private $control='kegiatan';

	public function __construct(){
			parent::__construct();
			$this->load->model('Kegiatan_model','kegiatan',TRUE);
			$status = $this->session->userdata('status');
			if($status=="Pengguna"){
				redirect('dashboard');
			}

		}

	public function index()
	{
		$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b4']='active';


		$data['conten'] = 'backend/admin/Kegiatan/index';
		$data['data'] = $this->kegiatan->get_all_data();
		$this->load->view('backend/dashboard/index', $data);
	}

	public function add(){
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b4']='active';

			$data['conten'] = 'backend/admin/Kegiatan/add_kegiatan';
			$this->load->view('backend/dashboard/index',$data);
	}

	public function run_save(){ 

			$status = $this->kegiatan->simpan();
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
			$data['b']='active';$data['b4']='active';


			$data['conten'] = 'backend/admin/Kegiatan/edit_kegiatan';
			$data['data']=$this->kegiatan->edit($id);
			$this->load->view('backend/dashboard/index',$data);
		}

		
	public function run_edit()   {
			$id 				= $this->input->post('id_kegiatan');
			$kode_kegiatan 	= $this->input->post('kode_kegiatan');
			$judul_kegiatan	= $this->input->post('judul_kegiatan');
			$status = $this->kegiatan->simpan_edit($id,$kode_kegiatan,$judul_kegiatan);
			if($status){
				$pesan = "Data Berhasil Disimpan";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Tersimpan, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
			redirect($this->control);
    }

	public function run_delete($id){
		$status = $this->kegiatan->hapus($id);
		if($status){
				$pesan = "Data Berhasil Disimpan";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Tersimpan, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
				redirect($this->control);

	}

}