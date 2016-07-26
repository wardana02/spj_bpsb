<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class Tahun_model extends CI_Model{

			private $table='tahun';


		function __construct() {
		        parent::__construct();  // Call the Model constructor 
				//loader::database();    // Connect to current database setting.
		    }

		function get_data(){
			$query = $this->db->query("SELECT * FROM $this->table WHERE deleted IS NULL ORDER BY judul_tahun ASC");
				return $query->result();

		}

		function get_status(){
			$query = $this->db->query("SELECT id_tahun FROM $this->table WHERE status='active' AND deleted IS NULL");
				return $query->row();

		}

		function get_tahun_active(){
			$query = $this->db->query("SELECT * FROM $this->table WHERE status='active' AND deleted IS NULL");
				return $query->row();
		}

		function if_exist($judul_tahun){
			$query = $this->db->query("SELECT id_tahun FROM $this->table WHERE judul_tahun='$judul_tahun' AND deleted IS NULL");
			if ($query->num_rows() == 1){
					return FALSE;
				}else {
					return TRUE;
				}
		}

		function simpan(){
				
				$data_insert = array(
							'judul_tahun'=> $this->input->post('judul_tahun')
				);
				$simpan = $this->db->insert($this->table,$data_insert);
				if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		
		}

		
		function simpan_edit($id_tahun){
			$data_update = array('status'	=> 'active');
			$this->db->where('id_tahun',$id_tahun);
			$this->db->update($this->table,$data_update);
			$dt = $this->tahun->get_tahun_active();
			if($this->db->affected_rows() > 0) {
					$this->session->set_userdata('tahun', $dt->judul_tahun);
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		}


		function simpan_edit2($id_tahun){
			$data_update = array('status'	=> NULL);
			$this->db->where('id_tahun',$id_tahun);
			$this->db->update($this->table,$data_update);
			if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		}

		function hapus($id_tahun){
			$date = date('d/m/y h:i:s');
			$query = $this->db->query("UPDATE $this->table SET deleted='$date'
										WHERE id_tahun='$id_tahun'
										");
			if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		}

	}