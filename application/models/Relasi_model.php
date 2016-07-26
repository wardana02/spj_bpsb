<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class Relasi_model extends CI_Model{

			private $table='relasi';
			private $pk='id_relasi';


		function __construct() {
		        parent::__construct();  // Call the Model constructor 
				//loader::database();    // Connect to current database setting.
		    }

		function get_all_data(){
			$tahun = $this->session->userdata('tahun');
			$query = $this->db->query("SELECT id_relasi,judul_komp_keg,judul_rangka FROM rangka_kegiatan 
				JOIN relasi ON rangka_kegiatan.id_rangka=relasi.id_rangka 
				JOIN komponen_kegiatan ON relasi.id_komp_keg=komponen_kegiatan.id_komp_keg 
				WHERE relasi.deleted IS NULL AND tahun_anggaran='$tahun' AND th_angg_komp='$tahun'");
				return $query->result();

		}

		function if_exist($id_rangka,$id_komp_keg){
			$q="SELECT * FROM $this->table WHERE id_rangka='$id_rangka' AND id_komp_keg='$id_komp_keg' AND deleted IS NULL LIMIT 1";
				$query=$this->db->query($q);
				if ($query->num_rows() == 1){
					return FALSE;
				}else {
					return TRUE;
				}
		}

		function simpan(){
				
				$data_insert = array(
						'id_rangka' => $this->input->post('id_rangka'),
						'id_komp_keg' => $this->input->post('id_komp_keg'),
						'id_relasi' => $this->input->post('id_relasi')
				);
				
				
				$simpan = $this->db->insert($this->table,$data_insert);
				return $simpan;
		
		}

		function edit($id){
			
			$q="SELECT * FROM $this->table WHERE $this->pk='$id'";
				$query=$this->db->query($q);
				return $query->row();
		}
		
		function simpan_edit($id,$id_komp_keg,$id_rangka){
			$data_update = array(
				'id_komp_keg'	=> $id_komp_keg,
				'id_rangka' => $id_rangka

			);
			$this->db->where($this->pk,$id);
			$this->db->update($this->table,$data_update);
		}

		function hapus($id){
			$date = date('d/m/y h:i:s');
			$query = $this->db->query("UPDATE $this->table SET deleted='$date'
										WHERE $this->pk='$id'
										");
			if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		}
	
	}