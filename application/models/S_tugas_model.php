<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class S_Tugas_model extends CI_Model{

			private $table='surat_tugas';
			private $pk='id_surat';


		function __construct() {
		        parent::__construct();  // Call the Model constructor 
				//loader::database();    // Connect to current database setting.
		    }

		 //as data
		function get_all_data(){
			$tahun = $this->session->userdata('tahun');
			$id_user = $this->session->userdata('id_user');
			if($id_user=='USR06132110'){
				$ctrl = "";
			}else{
				$ctrl = "AND surat_tugas.by_='$id_user'";
			}

			$query = $this->db->query("SELECT id_surat,by_,komponen_kegiatan.id_komp_keg,tanggal_surat,nomor_surat,dari,ke,judul_komp_keg, judul_rangka,kode_perjalanan FROM komponen_kegiatan JOIN surat_tugas 
			ON komponen_kegiatan.id_komp_keg=surat_tugas.id_komp_keg JOIN rangka_kegiatan
			ON surat_tugas.id_rangka=rangka_kegiatan.id_rangka JOIN jenis_perjalanan 
			ON rangka_kegiatan.id_perjalanan=jenis_perjalanan.id_perjalanan WHERE th_angg_komp='$tahun' $ctrl ORDER BY id_surat DESC");
				return $query->result();

		}

		//as tugas
		function get_by_id($id){
			$query = $this->db->query("SELECT id_surat,by_,tanggal_surat,tgl_berangkat,tgl_tiba,DATEDIFF(tgl_tiba,tgl_berangkat)+1 as hari,nomor_surat,dari,ke,judul_komp_keg, judul_rangka,kode_perjalanan FROM komponen_kegiatan JOIN surat_tugas 
			ON komponen_kegiatan.id_komp_keg=surat_tugas.id_komp_keg JOIN rangka_kegiatan
			ON surat_tugas.id_rangka=rangka_kegiatan.id_rangka JOIN jenis_perjalanan 
			ON rangka_kegiatan.id_perjalanan=jenis_perjalanan.id_perjalanan
			WHERE surat_tugas.id_surat='$id'");
				return $query->row();

		}

		//for chain dropdown


    function getcountry2(){
        $id_komp_keg = $this->input->post('id_komp_keg');
        $query = $this->db->query("SELECT judul_rangka,rangka_kegiatan.id_rangka FROM rangka_kegiatan JOIN relasi 
        ON rangka_kegiatan.id_rangka=relasi.id_rangka
        WHERE relasi.id_komp_keg='$id_komp_keg'");
        
         return $query->result();
    }




		function simpan(){

			$tanggal = $this->input->post('tanggal');
			$tgl  = explode('-', $tanggal);
			$tgl_berangkat = date("Y-m-d",strtotime($tgl[0]));
			$tgl_tiba	   = date("Y-m-d",strtotime($tgl[1]));

			$h1 = new DateTime($tgl_berangkat);
			$h2 = new DateTime($tgl_tiba);
			$jml_hari	   = $h1->diff($h2); 
				
				$data_insert = array(
						'id_surat' => $this->input->post('id_surat'),
						'nomor_surat' => $this->input->post('no_surat'),
						'tanggal_surat' => $this->input->post('tgl_surat'),
						'id_komp_keg' => $this->input->post('id_komp_keg'),
						'id_rangka' => $this->input->post('id_rangka'),
						'tgl_berangkat' => $tgl_berangkat,
						'tgl_tiba' => $tgl_tiba,
						'dari' => $this->input->post('dari'),
						'ke' => $this->input->post('ke'),
						'by_' => $this->session->userdata('id_user')
				);
				
				
				$simpan = $this->db->insert($this->table,$data_insert);
				if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		
		}

		function edit($id){
			
			$q="SELECT * FROM $this->table WHERE $this->pk='$id'";
				$query=$this->db->query($q);
				return $query->row();
		}
		
		function simpan_edit($id,$nomor_surat,$tanggal_surat,$id_komp_keg,$id_rangka,$tgl_berangkat,$tgl_tiba,$dari,$ke){
			$data_update = array(
				'nomor_surat'		=> $nomor_surat,
				'tanggal_surat'	=> $tanggal_surat,
				'id_komp_keg' => $id_komp_keg,
				'id_rangka' => $id_rangka,
				'tgl_berangkat' => $tgl_berangkat,
				'tgl_tiba' => $tgl_tiba,
				'dari' => $dari,
				'ke' => $ke
			);
			$this->db->where($this->pk,$id);
			$this->db->update($this->table,$data_update);
			if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		}

		function hapus($id){
			$date = date('d/m/y h:i:s');
			$query = $this->db->query("DELETE FROM $this->table
										WHERE $this->pk='$id'
										");
			if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		}

		function help_del_spj($id){
			$query = $this->db->query("
				SELECT id_spj from spj JOIN relasi_2 ON spj.id_relasi2=relasi_2.id_relasi2
				JOIN surat_tugas ON relasi_2.id_surat=surat_tugas.id_surat
				WHERE surat_tugas.id_surat='$id'
				");

			return $query->result();
		}

		
	
	}