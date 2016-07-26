<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class Pengguna_model extends CI_Model{

			private $table='user';


		function __construct() {
		        parent::__construct();  // Call the Model constructor 
				//loader::database();    // Connect to current database setting.
		    }

		function get_all_data(){
			$query = $this->db->query("SELECT * FROM user WHERE deleted IS NULL");
				return $query->result();

		}

		function simpan(){
				
				$data_insert = array(
						'id_user' => $this->input->post('id_user'),
						'username' => $this->input->post('username'),
						'password' => md5($this->input->post('password')),
						'nama_user' => $this->input->post('nama_user'),
						'status' => $this->input->post('status'),
						'wilayah' => $this->input->post('wilayah'),
						'registerd' => date('Y/m/d')
				);
				
				
				$simpan = $this->db->insert($this->table,$data_insert);
				if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		
		}

		function edit($id_user){
			
			$q="SELECT * FROM $this->table WHERE id_user='$id_user'";
				$query=$this->db->query($q);
				return $query->row();
		}
		
		function simpan_edit($id_user,$username,$wilayah,$status,$nama_user){
			$data_update = array(
				'username'		 	=> $username,
				'nama_user'		 	=> $nama_user,
				'status' 			=> $status,
				'wilayah' 			=> $wilayah
			);
			$this->db->where('id_user',$id_user);
			$this->db->update($this->table,$data_update);
			if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		}

		function simpan_pass($id_user,$password){
			$data_update = array(
				'password' 			=> md5($password)
			);
			$this->db->where('id_user',$id_user);
			$this->db->update($this->table,$data_update);
			if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		}

		function hapus($id_user){
			$date = date('d/m/y h:i:s');
			$query = $this->db->query("UPDATE user SET deleted='$date'
										WHERE id_user='$id_user'
										");
			if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		}

	}