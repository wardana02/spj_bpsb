<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class Transportasi_model extends CI_Model{

			private $table='kendaraan';
			private $pk='id_kendaraan';


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
						'id_kendaraan' => $this->input->post('id_kendaraan'),
						'nama_kendaraan' => $this->input->post('nama_kendaraan'),
						'jenis_pembiayaan' => $this->input->post('jenis_pembiayaan'),
						'bahan_bakar' => $this->input->post('bahan_bakar')
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
		
		function simpan_edit($id,$nama_kendaraan,$jenis_pembiayaan,$bahan_bakar){
			$data_update = array(
				'nama_kendaraan'		=> $nama_kendaraan,
				'bahan_bakar'		 	=> $bahan_bakar,
				'jenis_pembiayaan' 		=> $jenis_pembiayaan
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