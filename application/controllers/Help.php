<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Help extends CI_Controller {

	private $control='help';

	public function __construct(){
			parent::__construct();

		}

	public function index()
	{
		if($this->session->userdata('login')==TRUE){
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');	
		}
		

		$data['e']='active';$data['e1']='active';
		$data['conten'] = 'backend/admin/Help/create_new';
		$this->load->view('backend/dashboard/index', $data);
	}

	public function lupa_password()
	{
		if($this->session->userdata('login')==TRUE){
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');	
		}
		
		$data['e']='active';$data['e2']='active';
		$data['conten'] = 'backend/admin/Help/lupa_pass';
		$this->load->view('backend/dashboard/index', $data);
	}

	public function cetak_spj()
	{
		if($this->session->userdata('login')==TRUE){
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');	
		}
		
		$data['e']='active';$data['e3']='active';
		$data['conten'] = 'backend/admin/Help/cetak_spj';
		$this->load->view('backend/dashboard/index', $data);
	}

	public function lokasi()
	{
		if($this->session->userdata('login')==TRUE){
			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');	
		}
		
		$data['e']='active';$data['e4']='active';
		$data['conten'] = 'backend/admin/Help/lokasi';
		$this->load->view('backend/dashboard/index', $data);
	}

	

}