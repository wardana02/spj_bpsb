<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Tahun extends MY_Controller {

	private $control='tahun';

	public function __construct(){
			parent::__construct();
			$this->load->model('Tahun_model','tahun',TRUE);
			$status = $this->session->userdata('status');
			if($status!="Super"){
				redirect('dashboard');
			}

		}

	public function index()
	{
		$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['a']='active';$data['a1']='active';


		$data['conten'] = 'backend/admin/Tahun/index';
		$data['data'] = $this->tahun->get_data();
		$this->load->view('backend/dashboard/index', $data);
	}


	public function run_save(){ 

		$judul_tahun= $this->input->post('judul_tahun');

			if($this->tahun->if_exist($judul_tahun)==TRUE){
				$status = $this->tahun->simpan();
				$pesan = "Data Berhasil Disimpan";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Tersebut sudah ada dalam Referensi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}

				redirect($this->control);
			
		}


		
	public function edit($id_baru)   {
			$id = $this->tahun->get_status();
			$this->tahun->simpan_edit2($id->id_tahun);
			$status = $this->tahun->simpan_edit($id_baru);
			if($status){
				$pesan = "Status Tahun Berhasil Dirubah";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Dirubah, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
			redirect($this->control);
    }

	public function run_delete($id){
		$status = $this->tahun->hapus($id);
		if($status){
				$pesan = "Data Berhasil Dihapus";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Dihapus, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
				redirect($this->control);

	}

}