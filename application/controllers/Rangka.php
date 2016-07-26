<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Rangka extends MY_Controller {

	private $control='rangka';



	public function __construct(){
			parent::__construct();
			$this->load->model('Rangka_model','rangka',TRUE);
			$this->load->model('Perjalanan_model','perjalanan',TRUE);
			$status = $this->session->userdata('status');
			if($status=="Pengguna"){
				redirect('dashboard');
			}
		}

	public function index()
	{
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');	
			$data['b']='active';$data['b6']='active';

		$data['conten'] = 'backend/admin/Rangka/index';
		$data['data'] = $this->rangka->get_all_data();
		$this->load->view('backend/dashboard/index', $data);
	}

	public function add(){
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b6']='active';

					$data['perjalanan'] = $this->perjalanan->get_all_data();

			$data['conten'] = 'backend/admin/Rangka/add_rangka';
			$this->load->view('backend/dashboard/index',$data);
	}

	public function run_save(){ 

			$status = $this->rangka->simpan();
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
			$data['b']='active';$data['b6']='active';


			$data['conten'] = 'backend/admin/Rangka/edit_rangka';
			$data['data']=$this->rangka->edit($id);
			$data['perjalanan'] = $this->perjalanan->get_all_data();
			
			$this->load->view('backend/dashboard/index',$data);
		}

		
	public function run_edit()   {
			$id 				= $this->input->post('id_rangka');
			$id_rangka 			= $this->input->post('id_rangka');
			$judul_rangka		= $this->input->post('judul_rangka');
			$tahun_anggaran		= $this->input->post('tahun_anggaran');

			$status = $this->rangka->simpan_edit($id,$id_rangka,$judul_rangka,$tahun_anggaran);
			
			if($status){
				$pesan = "Data Berhasil Disimpan";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Tersimpan, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}redirect($this->control);
    }

	public function run_delete($id){
		$status = $this->rangka->hapus($id);
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