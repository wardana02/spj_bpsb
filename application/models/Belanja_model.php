<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class Belanja_model extends CI_Model{

			private $table='asset_belanja';
			private $pk='id_ass_belanja';


		function __construct() {
		        parent::__construct();  // Call the Model constructor 
		    }

		function get_all_data(){
			$query = $this->db->query("SELECT * FROM $this->table WHERE deleted IS NULL");
				return $query->result();

		}

		function simpan(){	
				$data_insert = array(
						'id_ass_belanja' => $this->input->post('id_belanja'),
						'kode_ass_belanja' => $this->input->post('kode_belanja'),
						'judul_ass_belanja' => $this->input->post('judul_belanja')
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
		
		function simpan_edit($id,$kode_belanja,$judul_belanja){
			$data_update = array(
				'kode_ass_belanja'		=> $kode_belanja,
				'judul_ass_belanja'		 	=> $judul_belanja
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