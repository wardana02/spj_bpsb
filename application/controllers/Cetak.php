<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');

	class Cetak extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->library('pdf');
			$this->load->library('terbilang');
			$this->load->helper('waktu');
			$this->load->helper('download');

			$this->load->model('S_tugas_model','tugas',TRUE);
			$this->load->model('Cetak_model','cetak_md',TRUE);
			$this->load->model('Relasi_model','relasi',TRUE);
			$this->load->model('Rekap_model','rekap',TRUE);
			$this->load->model('Pengguna_model','pengguna',TRUE);
			$this->load->model('Komponen_model','komponen',TRUE);
			$this->load->model('Pegawai_model','pegawai',TRUE);
			$this->load->model('Spj_model','spj',TRUE);
			$this->load->model('Upload_model','md_upload',TRUE);
		}


		function index($id){

			$data['nama_user']=$this->session->userdata('nama_user');
			$data['status']=$this->session->userdata('status');

			$data['conten'] = "backend/admin/Cetak/index";
			$data['data_foto'] 	= $this->md_upload->get_data_foto($id); 
			$data['data'] 	= $this->cetak_md->get_st_data($id);
			$data['option'] = $this->cetak_md->get_all_data($id);

				$this->load->view('backend/dashboard/index', $data);


		}

		function tespre(){
				//$data['pegawai'] = $this->pegawai->get_all_data();

				$data['kode'] = $this->rekap->get_kode_anggaran();
			$this->load->view('template/blangko/rekap/anggaran',$data);
		}



		function download($id,$kode){


			if($id=='spd_dpn'){
				$data['data'] = $this->cetak_md->get_specific_data($kode);
				$html = $this->load->view('template/blangko/siap/spd_depan',$data,TRUE);	
				//file for user download
				$pdfFilePath = "spd_depan.pdf";
			} else if ($id=='spd_blk') {
				$data['data'] = $this->cetak_md->get_specific_data($kode);
				$html = $this->load->view('template/blangko/siap/spd_blk',$data,TRUE);	
				//file for user download
				$pdfFilePath = "spd_blk.pdf";
			} else if ($id=='kuitansi') {
				$data['data'] = $this->cetak_md->get_specific_data($kode);
				
					//$data['terbilang'] = $this->terbilang->_($data['data']['uang_harian']);
				
				
				$html = $this->load->view('template/blangko/siap/kuitansi',$data,TRUE);	
				//file for user download
				$pdfFilePath = "kuitansi.pdf";
			} //Jika memilih rincihan biaya
			else if ($id=='rincian') {
				$data['data'] = $this->cetak_md->get_specific_data($kode);
				$html = $this->load->view('template/blangko/siap/rincian',$data,TRUE);	
				//file for user download
				$pdfFilePath = "rincian.pdf";
			} //Jika memilih Laporan
			else if ($id=='lp') {

					$isi = file_get_contents(base_url().'assets/blangko/laporan_perjalanan.xlsx');
					$tgl = date('Y-m-d');
					$nama = "laporan_perjalanan_$tgl.xlsx";
					force_download($nama,$isi);

			}//jika memilih Surat Tugas
			else if ($id=='st') {
				$data['tugas'] = $this->tugas->get_by_id($kode);
				$data['pegawai'] = $this->cetak_md->get_pegawai_st($kode);
				$html = $this->load->view('template/blangko/siap/surat_tugas',$data,TRUE);	
				//file for user download
				$pdfFilePath = "surat_tugas.pdf";
			}
			//Jika Memilih By Pegawai  
			else if ($id=='1') {
				$data['pegawai'] = $this->pegawai->get_all_data();
				$html = $this->load->view('template/blangko/rekap/pegawai',$data,TRUE);	
				//file for user download
				$pdfFilePath = "Rekap_Pegawai.pdf";
			}
			//Jika Memilih By Anggaran Dana
			else if ($id=='2') {
				$data['kode'] = $this->rekap->get_kode_anggaran();
				$html = $this->load->view('template/blangko/rekap/anggaran',$data,TRUE);	
				//file for user download
				$pdfFilePath = "surat_tugas.pdf";
			}  

			if($id=='st' OR $id=='lp'){
				//load mPDF Libs
				$this->load->library("pdf");
				$param = 'L';
				$pdf = $this->pdf->load($param);
			}
			else {
				$this->load->library("pdf");
				$param = 'P';
				$pdf = $this->pdf->load($param);
			}
			

			$date = date('d-m-Y h:I:s');
			//$pdf->SetFooter('Cetak Data Buku by @aaji || Page{PAGENO} of {nb} || Printed at'.$date);
			$stylesheet = file_get_contents(base_url().'assets/mpdf_css/mpdfstyletables.css');

			$pdf->WriteHTML($stylesheet,1);

			//generate pdf file form the given HTML

			$pdf->WriteHTML($html,2);
//			$pdf->debug = TRUE;

			//Output
			$pdf->Output($pdfFilePath,"I");
			//I=>WITH PREVIEW BROWSER
			//D=>DIRECT DOWNLOAD
		}

		

}
