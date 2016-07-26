<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class Kegiatan_model extends CI_Model{

			private $table='asset_kegiatan';
			private $pk='id_ass_kegiatan';



		function __construct() {
		        parent::__construct();  // Call the Model constructor 
				//loader::database();    // Connect to current database setting.
		    }

		function get_all_data(){
			$tahun = $this->session->userdata('tahun');
			$query = $this->db->query("SELECT * FROM $this->table WHERE deleted IS NULL AND tahun='$tahun'");
				return $query->result();

		}

		function simpan(){
				$tahun = $this->session->userdata('tahun');
				$data_insert = array(
						'id_ass_kegiatan' => $this->input->post('id_kegiatan'),
						'kode_ass_kegiatan' => $this->input->post('kode_kegiatan'),
						'judul_ass_kegiatan' => $this->input->post('judul_kegiatan'),
						'tahun'		=> $tahun
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
		
		function simpan_edit($id,$kode_kegiatan,$judul_kegiatan){
			$data_update = array(
				'kode_ass_kegiatan'		=> $kode_kegiatan,
				'judul_ass_kegiatan'	=> $judul_kegiatan
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