<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class Golongan_model extends CI_Model{

			private $table='golongan';


		function __construct() {
		        parent::__construct();  // Call the Model constructor 
				//loader::database();    // Connect to current database setting.
		    }

		function get_all_data(){
			$query = $this->db->query("SELECT * FROM $this->table WHERE deleted IS NULL ORDER BY tingkat_gol ASC");
				return $query->result();

		}
		
		function simpan(){			
				$data_insert = array(
						'id_golongan' => $this->input->post('id_golongan'),
						'tingkat_gol' => $this->input->post('tingkat_gol'),
						'judul_golongan' => $this->input->post('judul_golongan')
				);
				$simpan = $this->db->insert($this->table,$data_insert);
				if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		
		}

		function edit($id_golongan){	
			$q="SELECT * FROM $this->table WHERE id_golongan='$id_golongan'";
				$query=$this->db->query($q);
				return $query->row();
		}
		
		function simpan_edit($id_golongan,$tingkat_gol,$judul_golongan){
			$data_update = array(
				'id_golongan'		 	=> $id_golongan,
				'tingkat_gol'		 	=> $tingkat_gol,
				'judul_golongan' 		=> $judul_golongan
			);
			$this->db->where('id_golongan',$id_golongan);
			$this->db->update($this->table,$data_update);
			if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		}

		function hapus($id_golongan){
			$date = date('d/m/y h:i:s');
			$query = $this->db->query("UPDATE $this->table SET deleted='$date'
										WHERE id_golongan='$id_golongan'
										");
			if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		}

	}