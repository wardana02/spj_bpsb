<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Transportasi extends MY_Controller {


	private $control='transportasi';
	private $mod='transportasi';

	public function __construct(){
			parent::__construct();
			$this->load->model('Transportasi_model','transportasi',TRUE);
		}

	public function index()
	{
		$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b7']='active';


		$data['conten'] = 'backend/admin/Transportasi/index';
		$data['data'] = $this->transportasi->get_all_data();
		$this->load->view('backend/dashboard/index', $data);
	}

	public function add(){
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b7']='active';

			$data['conten'] = 'backend/admin/Transportasi/add_kendaraan';
			$this->load->view('backend/dashboard/index',$data);
	}

	public function run_save(){ 

			$status = $this->transportasi->simpan();
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
			$data['b']='active';$data['b7']='active';

			$data['conten'] = 'backend/admin/Transportasi/edit_kendaraan';
			$data['data']=$this->transportasi->edit($id);
			$this->load->view('backend/dashboard/index',$data);
		}

		
	public function run_edit()   {
			$id 				= $this->input->post('id_kendaraan');
			$nama_kendaraan 	= $this->input->post('nama_kendaraan');
			$jenis_pembiayaan	= $this->input->post('jenis_pembiayaan');
			$bahan_bakar		= $this->input->post('bahan_bakar');

			$status = $this->transportasi->simpan_edit($id,$nama_kendaraan,$jenis_pembiayaan,$bahan_bakar);
			
			if($status){
				$pesan = "Data Berhasil Diperbaharui";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Diperbaharui, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}redirect($this->control);
    }

	public function run_delete($id){
		$status = $this->transportasi->hapus($id);
		if($status){
				$pesan = "Data Berhasil Dihapus";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Terhapus, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
				redirect($this->control);

	}

}