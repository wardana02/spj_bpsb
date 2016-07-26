<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Spj extends MY_Controller {

	private $control='spj';

	public function __construct(){
			parent::__construct();
			$this->load->model('Transportasi_model','kendaraan',TRUE);
			$this->load->model('Perjalanan_model','perjalanan',TRUE);
			$this->load->model('Pegawai_model','pegawai',TRUE);
			$this->load->model('S_tugas_model','tugas',TRUE);
			$this->load->model('Spj_model','spj',TRUE);
			$this->load->model('Pengguna_model','pengguna',TRUE);
			$this->load->model('Komponen_model','komponen',TRUE);
			$this->load->model('Upload_model','md_upload',TRUE);

		}

	public function index()
	{
		
		$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['d']='active';$data['d2']='active';


		$data['conten'] = 'backend/admin/Spj/index';
		$data['data'] = $this->spj->get_all_data();
		$this->load->view('backend/dashboard/index', $data);
	}

	public function add($id){
			$data['nama_user'] = $this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['d']='active';$data['d2']='active';

			$data['conten'] = 'backend/admin/Spj/add';
			$data['pegawai']	= $this->spj->get_pegawai_data($id);
			$data['kendaraan'] 	= $this->kendaraan->get_all_data();
			$data['tugas']		= $this->tugas->get_by_id($id);
			
			$this->load->view('backend/dashboard/index',$data);

	}


	public function run_save($id){ 

			$upload_ctrl 	= $this->input->post('id_kendaraan');

			if ($upload_ctrl == 'TRS215624') {
				// perlu upload gambar
				echo "STACK HERE IN CALL UPLOAD FUNCTION";
				$this->proses_upload($id);
			}
			
			$this->spj->simpan();
			$data['notifikasi'] = 'Data berhasil disimpan';
			$data['judul']='Insert Data Berhasil';
				redirect("cetak/index/".$id);
			
		}

	public function edit($id,$srt,$kode) {
			$data['nama_user'] = $this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['d']='active';$data['d2']='active';

			$data['conten'] = 'backend/admin/Spj/edit';


			$data['datafoto']	=	$this->md_upload->get_data_foto_spc($id);
			$data['pegawai']	=	$this->spj->get_nama_spj($kode);
			$data['value']		=	$this->spj->edit($id);
			$data['kendaraan'] 	=	$this->kendaraan->get_all_data();
			$data['tugas']		=	$this->tugas->get_by_id($srt);
			
			$this->load->view('backend/dashboard/index',$data);
		}

		
	public function run_edit()   {
			//ambil status 119 dari session
			$ctrl = $this->session->userdata('ctrl');

			$id 				= $this->input->post('id_spj');
			$id_st 				= $this->input->post('id_surat');
			$id_kendaraan 		= $this->input->post('id_kendaraan');
			$no_surat 			= $this->input->post('no_surat');
			$uang_saku 			= $this->input->post('uang_saku');
			$jb_ttd 			= $this->input->post('jb_ttd');
			$nm_ttd 			= $this->input->post('nm_ttd');
			$nip_ttd 			= $this->input->post('nip_ttd');
			$nm_produsen		= $this->input->post('nm_produsen');
			$tgl_tiba			= $this->input->post('tgl_tiba');
			$tgl_berangkat		= $this->input->post('tgl_berangkat');
			$upload_ctrl	 	= $this->input->post('id_kendaraan');


			$dt = $this->md_upload->check_exist($id);

			if ($upload_ctrl == 'TRS215624') {
				// perlu upload gambar
				echo "STACK HERE IN CALL UPLOAD FUNCTION";
				if ($dt->id == NULL ) {
				//lakukan insert ke tb uploads
				$this->proses_upload($id_st);
				} else{
					//lakukan hapus data lama, ganti data baru / reupload
					$this->md_upload->hapus($id);
					$this->proses_upload($id_st);

				}
			}

			

			if($this->input->post('penginapan2')!=NULL){
				$penginapan2 	= $this->input->post('penginapan2');
			}else {$penginapan2=0;}
			if($this->input->post('ongkos')!=NULL){
				$ongkos 	= $this->input->post('ongkos');
			}else {$ongkos=0;}


			$hari = waktu($tgl_tiba,$tgl_berangkat);
			if($ctrl){
				$hari_min = $hari-2;
				$hari=2;
			}
			$uang_saku 	 = $uang_saku * $hari_min;

			
			$data['edit'] = $this->spj->simpan_edit($id,$id_kendaraan,$no_surat,$ongkos,$penginapan2,$uang_saku,$jb_ttd,$nm_ttd,$nip_ttd,$nm_produsen);
			redirect($this->control);
    }

	public function run_delete($id){
		$this->spj->hapus($id);
		$this->md_upload->hapus($id);
		$data['notifikasi']='Hapus Data Berhasil';
				redirect($this->control);

	}

	public function proses_upload($id_st){
       		$id_spj = $this->input->post('id_spj');
       		//$id_st = $this->input->post('id_surat');

        	$path_info	=	pathinfo($_FILES['userfile']['name']);
        	$fileExtension	=	$path_info['extension'];
        	$YmdHis_papername	=	date('YmdHis');
        	//$nmfile = "file_".time()
        	$nmfile = "file_".$YmdHis_papername;

		        $config['upload_path'] = './assets/img/uploads/';
		        $config['allowed_types'] = 'gif|jpg|png';
		         $config['max_size'] = '2048'; //maksimum besar file 2M
       			 $config['max_width']  = '1288'; //lebar maksimum 1288 px
       			 $config['max_height']  = '768'; //tinggi maksimu 768 px
		        $config['file_name'] = $nmfile;
       
       			 $this->load->library('upload', $config);
       
        if (!$this->upload->do_upload()){
            $data['error'] = $this->upload->display_errors();
           $data['conten'] = 'backend/admin/Upload/upload';
    		$this->load->view('backend/dashboard/index',$data);	
        }
        else {
            $upload_data = $this->upload->data();
            $upload_data['judul'] = $judul;
            $data = array('upload_data' => $upload_data);
            $this->md_upload->simpan($nmfile,$YmdHis_papername,$fileExtension,$id_spj,$id_st);
           	//$this->index();
        }
    }

}