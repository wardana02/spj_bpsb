<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');

Class Pdf{

	function pdf(){

			$CI =& get_instance();
			log_message('Debug','mPDF class is Loaded!!');
	}


		


		function load($param){

			include_once APPPATH.'/third_party/mpdf60/mpdf.php';
			return new mPDF('utf-8', array(216, 330),11,'', 8, 5, 0, 5, 0, 0,$param);
		
		}

}