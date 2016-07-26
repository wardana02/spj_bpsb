<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		
		//$this->load->view('index');

		$data['conten'] = 'backend/admin/Help/create_new';
		$this->load->view('backend/dashboard/index', $data);
	}


}