<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Perjalanan extends MY_Controller {

	private $control='perjalanan';

	public function __construct(){
			parent::__construct();
			$this->load->model('Perjalanan_model','perjalanan',TRUE);

			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$status = $this->session->userdata('status');
			if($status=="Pengguna"){
				redirect('dashboard');
			}

		}

	public function index()
	{
		$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b5']='active';


		$data['conten'] = 'backend/admin/Perjalanan/index';
		$data['data'] = $this->perjalanan->get_all_data();
		$this->load->view('backend/dashboard/index', $data);
	}

	public function add(){
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b5']='active';

			$data['conten'] = 'backend/admin/Perjalanan/add_perjalanan';
			$this->load->view('backend/dashboard/index',$data);
	}

	public function run_save(){ 

			$status = $this->perjalanan->simpan();
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
			$data['b']='active';$data['b5']='active';

			$data['conten'] = 'backend/admin/Perjalanan/edit_perjalanan';
			$data['data']=$this->perjalanan->edit($id);
			$this->load->view('backend/dashboard/index',$data);
		}

		
	public function run_edit()   {
			$id 				= $this->input->post('id_perjalanan');
			$kode_perjalanan 	= $this->input->post('kode_perjalanan');
			$judul_perjalanan	= $this->input->post('judul_perjalanan');

			$status = $this->perjalanan->simpan_edit($id,$kode_perjalanan,$judul_perjalanan);
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
		$status = $this->perjalanan->hapus($id);
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