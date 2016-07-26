<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pegawai extends MY_Controller {


	public function __construct(){
			parent::__construct();
			$this->load->model('Pegawai_model','pegawai',TRUE);
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
			$data['b']='active';$data['b2']='active';

		$data['conten'] = "backend/admin/Pegawai/index";
		$data['data'] = $this->pegawai->get_all_data();
		$this->load->view('backend/dashboard/index', $data);
	}

	public function add(){
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b2']='active';


			$data['golongan'] 	= $this->golongan->get_all_data();
			$data['conten'] 	= 'backend/admin/Pegawai/add_pegawai';
			$this->load->view('backend/dashboard/index',$data);
	}

	public function run_save(){ 

			$status = $this->pegawai->simpan();
			if($status){
				$pesan = "Data Berhasil Disimpan";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Tersimpan, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}				
			redirect('pegawai');
			
		}

	public function edit($id_pegawai) {
				$data['nama_user'] = $this->session->userdata('nama_user');
				$data['status']=$this->session->userdata('status');
				$data['b']='active';$data['b2']='active';


			$data['golongan'] 	= $this->golongan->get_all_data();
			$data['conten'] = 'backend/admin/Pegawai/edit_pegawai';
			$data['data']=$this->pegawai->edit($id_pegawai);
			$this->load->view('backend/dashboard/index',$data);
		}

		
	public function run_edit()   {
			$id_pegawai 	= $this->input->post('id_pegawai');
			$nip_pegawai 	= $this->input->post('nip_pegawai');
			$nama_pegawai 	= $this->input->post('nama_pegawai');
			$golongan 		= $this->input->post('golongan');
			$jabatan 		= $this->input->post('jabatan');
			$gaji_pokok		= $this->input->post('gaji_pokok');
			$gol_perjalanan	= $this->input->post('gol_perjalanan');

			$status = $this->pegawai->simpan_edit($id_pegawai,$nip_pegawai,$nama_pegawai,$golongan,$jabatan,$gaji_pokok,$gol_perjalanan);
			if($status){
				$pesan = "Data Berhasil Disimpan";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Tersimpan, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
			redirect('pegawai');
    }

	public function run_delete($id_pegawai){
		$status = $this->pegawai->hapus($id_pegawai);
		if($status){
				$pesan = "Data Berhasil Dihapus";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Terhapus, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
				redirect('pegawai');



	}

}