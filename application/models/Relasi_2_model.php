<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class Relasi_2_model extends CI_Model{

			private $table='relasi_2';
			private $pk='id_relasi2';


		function __construct() {
		        parent::__construct();  // Call the Model constructor 
				//loader::database();    // Connect to current database setting.
		    }

		function get_all_data(){
			$query = $this->db->query("SELECT * FROM relasi_2");
				return $query->result();

		}

		//untuk menghitung jumlah pegawai tugas per Surat tugas untuk view
		function get_pegawai_data($id_surat){
			$query = $this->db->query("SELECT count(nama_pegawai)as jml FROM pegawai JOIN relasi_2 
				ON pegawai.id_pegawai=relasi_2.id_pegawai
				JOIN surat_tugas 
				ON relasi_2.id_surat=surat_tugas.id_surat
				WHERE relasi_2.id_surat='$id_surat'");
				return $query->result();
		}

		//untuk mendapatkan id relasi untuk proses save SPJ
		function get_id_relasi($id_pegawai,$id_surat){
			$query = $this->db->query("select id_relasi2 from relasi_2 join pegawai on relasi_2.id_pegawai=pegawai.id_pegawai 
			JOIN surat_tugas ON surat_tugas.id_surat=relasi_2.id_surat 
			WHERE relasi_2.id_pegawai='$id_pegawai' AND relasi_2.id_surat='$id_surat'");

			return $query->result();

		}

		function get_per_surat($id){
			$query = $this->db->query("SELECT id_relasi2,nama_pegawai,jabatan FROM pegawai JOIN relasi_2
				ON pegawai.id_pegawai=relasi_2.id_pegawai JOIN surat_tugas
				ON relasi_2.id_surat=surat_tugas.id_surat WHERE surat_tugas.id_surat='$id'");

			return $query->result();
		}



		function simpan(){
				
				$data_insert = array(
						'id_pegawai' => $this->input->post('id_pegawai'),
						'id_surat' => $this->input->post('id_surat')
				);
				
				
				$simpan = $this->db->insert($this->table,$data_insert);
				return $simpan;
		
		}

		function hapus($id){
			$query = $this->db->query("DELETE FROM $this->table WHERE $this->pk='$id'
										");
		}

		function get_not_pegawai($id){

			$query = $this->db->query("SELECT * from pegawai WHERE id_pegawai NOT IN (SELECT pegawai.id_pegawai FROM pegawai JOIN relasi_2 ON
			pegawai.id_pegawai=relasi_2.id_pegawai JOIN surat_tugas ON
			surat_tugas.id_surat=relasi_2.id_surat WHERE surat_tugas.id_surat='$id')");

			return $query->result();
		}
			
		

	
	}