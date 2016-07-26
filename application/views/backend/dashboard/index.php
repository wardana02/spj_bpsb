<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


  $this->load->view('template/back_end/Header');
  $this->load->view('template/back_end/Sidebar');
  $this->load->view($conten);
  $this->load->view('template/back_end/Footer');
