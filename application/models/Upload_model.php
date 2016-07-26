<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class Upload_model extends CI_Model{

			private $table='uploads';


		function __construct() {
		        parent::__construct();  // Call the Model constructor 
				//loader::database();    // Connect to current database setting.
		    }


		 function get_data_foto($id){
		 		$query = $this->db->query("SELECT * FROM $this->table WHERE id_st='$id'");
				return $query->result();
		 }

		 function get_data_foto_spc($id){
		 		$query = $this->db->query("SELECT * FROM $this->table WHERE id_spj='$id'");
				return $query->row();
		 }

		 function check_exist($id){
		 		$query = $this->db->query("SELECT id FROM $this->table WHERE id_spj='$id'");
				return $query->row();
		 }



	
		function simpan($nmfile,$YmdHis_papername,$fileExtension,$id_spj,$id_st){
				$nama = $nmfile.".".$fileExtension;
				$data_insert = array(
							'id'=> date('YmdHis'),
							'id_st'=> $id_st,
							'id_spj'=> $id_spj,
							'tanggal'=> date('Y-m-d H:i:s'),
							'nama_file'=> $nama

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

		function hapus($id){
			$date = date('d/m/y h:i:s');
			$query = $this->db->query("DELETE FROM uploads WHERE id_spj='$id'");
			if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		}

	}