<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Relasi extends MY_Controller {

	private $control='relasi';

	public function __construct(){
			parent::__construct();
			$this->load->model('Rangka_model','rangka',TRUE);
			$this->load->model('Relasi_model','relasi',TRUE);
			$this->load->model('Komponen_model','komponen',TRUE);
			$status = $this->session->userdata('status');
			if($status=="Pengguna"){
				redirect('dashboard');
			}
		}

	public function index()
	{
		$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b9']='active';

		$data['conten'] = 'backend/admin/Relasi/index';
		$data['data'] = $this->relasi->get_all_data();
		$this->load->view('backend/dashboard/index', $data);
	}

	public function add(){
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b9']='active';
					$data['rangka'] = $this->rangka->get_all_data();
					$data['komponen'] = $this->komponen->get_all_data();

			$data['conten'] = 'backend/admin/Relasi/add_relasi';
			$this->load->view('backend/dashboard/index',$data);
	}

	public function run_save(){ 

			$id_rangka 		= $this->input->post('id_rangka');
			$id_komp_keg 	= $this->input->post('id_komp_keg');
			if($this->relasi->if_exist($id_rangka,$id_komp_keg)==TRUE){
				$this->relasi->simpan();
				$pesan = "Data Berhasil Disimpan";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Tersebut sudah ada dalam Relasi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
			
			
				redirect($this->control);
			
		}

	public function edit($id) {
			$data['nama_user'] = $this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b9']='active';

			$data['conten'] = 'backend/admin/Relasi/edit_relasi';
			$data['data']=$this->relasi->edit($id);
					$data['rangka'] = $this->rangka->get_all_data();
					$data['komponen'] = $this->komponen->get_all_data();
			
			$this->load->view('backend/dashboard/index',$data);
		}

		
	public function run_edit()   {
			$id 			= $this->input->post('id_relasi');
			$id_komp_keg 	= $this->input->post('id_komp_keg');
			$id_rangka		= $this->input->post('id_rangka');

			$data['edit'] = $this->relasi->simpan_edit($id,$id_komp_keg,$id_rangka);
			redirect($this->control);
    }

	public function run_delete($id){
		$status = $this->relasi->hapus($id);
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