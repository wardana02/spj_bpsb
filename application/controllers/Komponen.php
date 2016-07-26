<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Komponen extends MY_Controller {

	private $control='komponen';

	public function __construct(){
			parent::__construct();
			$this->load->model('Komponen_model','komponen',TRUE);
			$this->load->model('Belanja_model','belanja',TRUE);
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
			$data['b']='active';$data['b8']='active';

		$data['conten'] = 'backend/admin/Komponen/index';
		$data['data'] = $this->komponen->get_view_data();
		$this->load->view('backend/dashboard/index', $data);
	}

	public function add(){
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['b']='active';$data['b8']='active';
					$data['belanja'] = $this->belanja->get_all_data();
					$data['kegiatan'] = $this->kegiatan->get_all_data();

			$data['conten'] = 'backend/admin/Komponen/add_komponen';
			$this->load->view('backend/dashboard/index',$data);
	}

	public function run_save(){ 

			$status = $this->komponen->simpan();
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
			$data['b']='active';$data['b8']='active';

			$data['conten'] = 'backend/admin/Komponen/edit_komponen';
			$data['data']=$this->komponen->edit($id);
				$data['belanja'] = $this->belanja->get_all_data();
				$data['kegiatan'] = $this->kegiatan->get_all_data();
			
			$this->load->view('backend/dashboard/index',$data);
		}

		
	public function run_edit()   {
			$id 				= $this->input->post('id_komp_keg');
			$id_komp_keg		= $this->input->post('id_komp_keg');
			$judul_komp_keg		= $this->input->post('judul_komp_keg') ;
			$kode_komp_keg		= $this->input->post('kode_komp_keg');
			$anggaran_komp_keg	= $this->input->post('anggaran_komp_keg');
			$th_angg_komp		= $this->input->post('th_angg_komp');
			$id_ass_keg			= $this->input->post('id_ass_kegiatan');
			$id_ass_belanja		= $this->input->post('id_ass_belanja');

			
			$status = $this->komponen->simpan_edit($id,$judul_komp_keg,$kode_komp_keg,$anggaran_komp_keg,$th_angg_komp,$id_ass_keg,$id_ass_belanja);
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
		$status = $this->komponen->hapus($id);
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