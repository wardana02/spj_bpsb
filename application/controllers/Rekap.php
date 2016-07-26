<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Rekap extends MY_Controller {


	public function __construct(){
			parent::__construct();

			$this->load->model('Rekap_model','rekap',TRUE);
			$this->load->model('Pegawai_model','pegawai',TRUE);
			$this->load->model('Cetak_model','cetak',TRUE);
			$this->load->library('Export');
			$this->load->library('Ajax_pagination');
			$status = $this->session->userdata('status');
			if($status=="Pengguna"){
				redirect('dashboard');
			}
		}

		
	public function index()
	{
		

			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['c']='active';$data['c1']='active';


		$data['conten'] = "backend/admin/Chart/index";
		$this->load->view('backend/dashboard/index', $data);

	}


	public function by_pegawai($bts){
		if ($bts==NULL) {$bts=1;}
		$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['c']='active';$data['c4']='active';


				$data['count'] = $this->rekap->count_pegawai();
				$data['pegawai'] = $this->pegawai->get_all_data();
				$data['pegawailimit'] = $this->pegawai->get_limit_data($bts);
				$data['conten'] = "backend/admin/Chart/monitoring";
				$this->load->view('backend/dashboard/index', $data);
	}

	public function by_anggaran($bts)	{
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');
			$data['c']='active';$data['c4']='active';

			$data['count'] = $this->rekap->count_komponen();
			$data['kode'] = $this->rekap->get_kode_anggaran();
			if ($bts==NULL) {$bts=1;}
			$data['kodelimit'] = $this->rekap->get_kode_anggaran_limit($bts);

		$data['conten'] = "backend/admin/Chart/anggaran";
		$this->load->view('backend/dashboard/index', $data);
	}

	// download rekap excel
	public function download_excel($nomor)
	{
		$status = $this->session->userdata('status');

        $true = "A";
        if($status=='Super' OR $status=='Administrator'){
        	if($nomor=='1'){
        		  //query untuk ambil data
				$sql = $this->cetak->get_spc_data();
				$nama_file = 'REKAP DATA_SPJ_PERJALANAN_BPSB _TANGGAL_' .date('d/m/Y');
        	}elseif ($nomor=='2') {
        		//query untuk ambil data
				$sql = $this->cetak->get_complete_data();
				$nama_file = 'REKAP DATA_MASTER SPJ _TANGGAL_' .date('d/m/Y');
        	}elseif ($nomor=='3') {
        		//query untuk ambil data
				$sql = $this->cetak->get_complete_st();
				$nama_file = 'REKAP DATA_SURAT TUGAS_BPSB _TANGGAL_' .date('d/m/Y');
        	}
			//CALL TO EXPORT FILE
			$this->export->to_excel($sql,$nama_file); 

        }
        // parameter tidak lengkap
        else
        {
            $this->session->set_flashdata('pesan', 'Proses pembuatan data rekap (Excel) gagal. Parameter tidak lengkap.');
            	if($status=='Super' OR $status=='Administrator'){
            		redirect('rekap');
            	}else {
            		redirect('dashboard');
            	}
            
        }
	}


	function ajaxPaginationData()
    {
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //total rows count
        $totalRec = $this->rekap->count_komponen();
        
        //pagination configuration
        $config['first_link']  = 'First';
        $config['div']         = 'postList'; //parent div tag id
        $config['base_url']    = base_url().'posts/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        /*
        //get the posts data
        $data['posts'] = $this->post->getRows(array('start'=>$offset,'limit'=>$this->perPage));
        
        //load the view
        $this->load->view('backend/admin/chart/ajax-pagination-data', $data, false);
    	*/
    
}



}	