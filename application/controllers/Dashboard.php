<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends MY_Controller {


		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
		}
		

		public function index(){
		// status user login = BENAR, pindah ke halaman absen
	        if ($this->session->userdata('login') == TRUE)
	        {
				$data['nama_user']=$this->session->userdata('nama_user');
				$data['status']=$this->session->userdata('status');
				$data['wilayah']=$this->session->userdata('wilayah');
				$data['conten'] = "backend/admin/Dashboard/index";
				$this->load->view('backend/dashboard/index', $data);
			}
	        // status login salah, tampilkan form login
	        else
	        {
				redirect('login');
			}
				
		}



}