<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


 public $data = array('pesan'=> '');

	public function __construct()
    {
		parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('Login_model', 'login', TRUE);
        $this->load->model('Tahun_model', 'tahun', TRUE);
	}

	public function index()
    {
		// status user login = BENAR, pindah ke halaman absen
        if ($this->session->userdata('login') == TRUE)
        {
			redirect('dashboard');
		}
        // status login salah, tampilkan form login
        else
        {
            // validasi sukses
            if($this->login->validasi())
            {
                // cek di database sukses
                if($this->login->cek_user())
                {
                    redirect('dashboard');
                }
                // cek database gagal
                else
                {
                    $this->data['pesan'] = 'Username atau Password salah Om.';
                    $this->load->view('backend/admin/login/index.php', $this->data);
                }
            }
            // validasi gagal
            else
            {
                $this->load->view('backend/admin/login/index.php');
            }
		}
	}

	public function logout()
	{
        $this->login->logout();
		redirect('login');
	}
}
