<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Upload extends CI_Controller {

	private $control='upload';

	public function __construct(){
			parent::__construct();
			$this->load->model('Upload_model','md_upload',TRUE);
			//$status = $this->session->userdata('status');

		}

	public function index()
	{
		$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['a']='active';$data['a1']='active';


		$data['conten'] = 'backend/admin/Upload/upload';
		//$data['data'] = $this->tahun->get_data();
		$this->load->view('backend/dashboard/index', $data);
	}

    
    public function proses_upload($id_spj){
        $judul = $this->input->post('nama_file');

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
            //$data['nama_user'] = 'Aji Pratama Wisnu';
           $data['conten'] = 'backend/admin/Upload/upload';
    		$this->load->view('backend/dashboard/index',$data);	
        }
        else {
            $upload_data = $this->upload->data();
            $upload_data['judul'] = $judul;
            $data = array('upload_data' => $upload_data);
            //echo "EKSTENSI=> $fileExtension";
            //echo "PATH=> $pathinfo";
            $this->md_upload->simpan($nmfile,$YmdHis_papername,$fileExtension,$id_spj);
           	//$this->index();
        }
    }
	

}