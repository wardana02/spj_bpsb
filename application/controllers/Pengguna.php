<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pengguna extends MY_Controller {


	public function __construct(){
			parent::__construct();
			$this->load->model('Pengguna_model','pengguna',TRUE);
			$status = $this->session->userdata('status');
			if(($status=="Pengguna") OR ($status=="Administrator")){
				redirect('dashboard');
			}
			
		}

	public function index()
	{
		$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['a']='active';$data['a2']='active';
		$data['conten'] = "backend/admin/Pengguna/index";
		$data['data'] = $this->pengguna->get_all_data();
		$this->load->view('backend/dashboard/index', $data);
	}

	public function add(){
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['a']='active';$data['a2']='active';

			$data['conten'] = 'backend/admin/Pengguna/add_pengguna';
			$this->load->view('backend/dashboard/index',$data);
	}

	public function run_save(){ 

			$status = $this->pengguna->simpan();
			if($status){
				$pesan = "Data Berhasil Disimpan";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Tersimpan, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
				redirect('pengguna');
			
		}

	public function edit($id_user) {
			$data['nama_user'] = $this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['a']='active';$data['a2']='active';

			$data['conten'] = 'backend/admin/Pengguna/edit_pengguna';
			$data['data']=$this->pengguna->edit($id_user);
			$this->load->view('backend/dashboard/index',$data);
		}

	public function ubah($id_user) {
			$data['nama_user'] = $this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['a']='active';$data['a2']='active';

			$data['conten'] = 'backend/admin/Pengguna/password';
			$data['data']=$this->pengguna->edit($id_user);
			$this->load->view('backend/dashboard/index',$data);
		}

		
	public function run_edit()   {
			$id_user 	= $this->input->post('id_user');
			$username 	= $this->input->post('username');
			$wilayah 	= $this->input->post('wilayah');
			$status 	= $this->input->post('status');
			$nama_user 	= $this->input->post('nama_user');

			$status = $this->pengguna->simpan_edit($id_user,$username,$wilayah,$status,$nama_user);
			
			if($status){
				$pesan = "Data Berhasil Disimpan";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Tersimpan, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}redirect('pengguna');
    }

    public function save_pass()   {
			$id_user 	= $this->input->post('id_user');
			$password 	= $this->input->post('password');

			$status = $this->pengguna->simpan_pass($id_user,$password);
			
			if($status){
				$pesan = "Password Berhasil Diperbaharui";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Password Gagal Diperbaharui, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}redirect('pengguna');
    }

	public function run_delete($id_user){
		$status = $this->pengguna->hapus($id_user);
		if($status){
				$pesan = "Data Berhasil Disimpan";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Tersimpan, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
				redirect('pengguna');

	}

}