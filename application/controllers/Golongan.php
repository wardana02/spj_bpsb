<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Golongan extends MY_Controller {


	public function __construct(){
			parent::__construct();
			$this->load->model('Golongan_model','golongan',TRUE);
			$status = $this->session->userdata('status');
			if($status=="Pengguna"){
				redirect('dashboard');
			}
		}

	public function index()
	{
		$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b1']='active';
		$data['conten'] = "backend/admin/Golongan/index";
		$data['data'] = $this->golongan->get_all_data();
		$this->load->view('backend/dashboard/index', $data);
	}

	public function add(){
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b1']='active';

			$data['conten'] = 'backend/admin/Golongan/add_golongan';
			$this->load->view('backend/dashboard/index',$data);
	}

	public function run_save(){ 

			$status = $this->golongan->simpan();
			if($status){
				$pesan = "Data Berhasil Disimpan";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Tersimpan, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
				redirect('golongan');
			
		}

	public function edit($id_golongan) {
			$data['nama_user'] = $this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b1']='active';

			$data['conten'] = 'backend/admin/Golongan/edit_golongan';
			$data['data']=$this->golongan->edit($id_golongan);
			$this->load->view('backend/dashboard/index',$data);
		}

		
	public function run_edit()   {
			$id_golongan 	= $this->input->post('id_golongan');
			$tingkat_gol 	= $this->input->post('tingkat_gol');
			$judul_golongan	= $this->input->post('judul_golongan');

			$status = $this->golongan->simpan_edit($id_golongan,$tingkat_gol,$judul_golongan);
			if($status){
				$pesan = "Data Berhasil Disimpan";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Tersimpan, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
			redirect('golongan');
    }

	public function run_delete($id_golongan){
		$status = $this->golongan->hapus($id_golongan);
		if($status){
				$pesan = "Data Berhasil Disimpan";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Tersimpan, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
				redirect('golongan');

	}

}