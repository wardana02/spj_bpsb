<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class S_Tugas extends MY_Controller {

	private $control='s_tugas';

	public function __construct(){
			parent::__construct();
			$this->load->model('Rangka_model','rangka',TRUE);
			$this->load->model('Komponen_model','komponen',TRUE);
			$this->load->model('Pegawai_model','pegawai',TRUE);
			$this->load->model('S_Tugas_model','tugas',TRUE);
			$this->load->model('Spj_model','spj',TRUE);
			$this->load->model('Pengguna_model','pengguna',TRUE);
			$this->load->model('Relasi_2_model','relasi_2',TRUE);
		}

	public function index()
	{
		$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['d']='active';$data['d1']='active';

		$data['conten'] = 'backend/admin/S_Tugas/index';
		$data['data'] = $this->tugas->get_all_data();
		$this->load->view('backend/dashboard/index', $data);
	}

	public function add(){
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['d']='active';$data['d1']='active';

					$data['komponen'] = $this->komponen->get_all_data();
					$data['pegawai'] = $this->pegawai->get_all_data();
					$data['rangka'] = $this->rangka->get_all_data();

			$data['conten'] = 'backend/admin/S_Tugas/add';
			$this->load->view('backend/dashboard/index',$data);
	}

	    function select_rangka(){
            
            $data['rangka'] = $this->tugas->getcountry2();
        		$this->load->view('backend/admin/S_Tugas/select_rangka',$data);
            
 
    }

    public function add_pegawai($id){

    		$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
					$data['pegawai'] = $this->relasi_2->get_not_pegawai($id);
					$data['tugas'] = $this->tugas->get_by_id($id);
					$data['peg_tugas'] = $this->relasi_2->get_per_surat($id);

	

			$data['conten'] = 'backend/admin/S_Tugas/dd_pegawai';
			$this->load->view('backend/dashboard/index',$data);
    }

	public function run_save($id){ 

			$this->tugas->simpan();
			$data['notifikasi'] = 'Data berhasil disimpan';
			$data['judul']='Insert Data Berhasil';
				redirect("s_tugas/add_pegawai/$id");
			
		}

		public function add_relasi2($id){ 

			$this->relasi_2->simpan();
			$data['notifikasi'] = 'Data berhasil disimpan';
			$data['judul']='Insert Data Berhasil';
				redirect("s_tugas/add_pegawai/".$id);
			
		}

		public function dell_relasi2($id,$srt){ 

			$this->relasi_2->hapus($id);
				redirect("s_tugas/add_pegawai/".$srt);
			
		}

	public function edit($id) {
			$data['nama_user'] = $this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['d']='active';$data['d1']='active';


			$data['conten'] = 'backend/admin/S_Tugas/edit';
			
					$data['komponen'] = $this->komponen->get_all_data();
					$data['pegawai'] = $this->pegawai->get_all_data();
					$data['rangka'] = $this->rangka->get_all_data();

			$data['data']=$this->tugas->edit($id);
			
			$this->load->view('backend/dashboard/index',$data);
		}

		
	public function run_edit()   {
		$tanggal = $this->input->post('tanggal');
			$tgl  = explode('-', $tanggal);
			$tgl_berangkat = date("Y-m-d",strtotime($tgl[0]));
			$tgl_tiba	   = date("Y-m-d",strtotime($tgl[1]));


			$id 				= $this->input->post('id_surat');
			$nomor_surat		= $this->input->post('no_surat');
			$tanggal_surat 		= $this->input->post('tgl_surat');
			$id_komp_keg 		= $this->input->post('id_komp_keg');
			$id_rangka 			= $this->input->post('id_rangka');
			$tgl_berangkat 		= $tgl_berangkat;
			$tgl_tiba 			= $tgl_tiba;
			$dari 				= $this->input->post('dari');
			$ke 				= $this->input->post('ke');

			$data['edit'] = $this->tugas->simpan_edit($id,$nomor_surat,$tanggal_surat,$id_komp_keg,$id_rangka,$tgl_berangkat,$tgl_tiba,$dari,$ke);
			redirect($this->control);
    }

	public function run_delete($id){
		$this->rangka->hapus($id);
		$data['notifikasi']='Hapus Data Berhasil';
				redirect($this->control);

	}



    function select_province(){
            if('IS_AJAX') {
            $data['option_province'] = $this->MChain->getprovince();
        $this->load->view('chain/selectprovince',$data);
            }
 
    }
    function select_city(){
            if('IS_AJAX') {
            $data['option_city'] = $this->MChain->getcity();
        $this->load->view('chain/selectcity',$data);
            }
 
    }
 
        function submit(){
            echo "Country ID = ".$this->input->post("country_id");
            echo "";
            echo "Province ID = ".$this->input->post("province_id");
            echo "";
            echo "City ID = ".$this->input->post("city_id");
        }

      function delete($id){
      	$status = $this->tugas->hapus($id);
      		$hasil = $this->tugas->help_del_spj($id);
      		foreach ($hasil as $id) {
      			$status2 = $this->spj->hapus($id->id_spj);
      		}
      	
		if($status){
				$pesan = "Data Berhasil Dihapus";
				$this->session->set_flashdata('pesan_sks',$pesan);
					
			}else {
				$pesan = "Maaf, Data Gagal Terhapus, Sesuatu Hal Terjadi";
				$this->session->set_flashdata('pesan_ggl',$pesan);
			}
				redirect('s_tugas');
      }



}