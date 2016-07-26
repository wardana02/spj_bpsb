<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class Perjalanan_model extends CI_Model{

			private $table='jenis_perjalanan';
			private $pk='id_perjalanan';


		function __construct() {
		        parent::__construct();  // Call the Model constructor 
				//loader::database();    // Connect to current database setting.
		    }

		function get_all_data(){
			$query = $this->db->query("SELECT * FROM $this->table WHERE deleted IS NULL");
				return $query->result();

		}

		function simpan(){
				
				$data_insert = array(
						'id_perjalanan' => $this->input->post('id_perjalanan'),
						'kode_perjalanan' => $this->input->post('kode_perjalanan'),
						'judul_perjalanan' => $this->input->post('judul_perjalanan')
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
		
		function simpan_edit($id,$kode_perjalanan,$judul_perjalanan){
			$data_update = array(
				'kode_perjalanan'		=> $nama_kendaraan,
				'judul_perjalanan'		 	=> $bahan_bakar
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