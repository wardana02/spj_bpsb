<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class Pegawai_model extends CI_Model{

			private $table='pegawai';


		function __construct() {
		        parent::__construct();  // Call the Model constructor 
				//loader::database();    // Connect to current database setting.
		    }

		function get_all_data(){
			$query = $this->db->query("SELECT * FROM pegawai JOIN golongan 
				ON pegawai.golongan=golongan.id_golongan WHERE pegawai.deleted IS NULL ORDER BY nama_pegawai ASC");
				return $query->result();

		}

		function get_limit_data($num){
			$query = $this->db->query("SELECT * FROM pegawai JOIN golongan 
				ON pegawai.golongan=golongan.id_golongan WHERE pegawai.deleted IS NULL ORDER BY nama_pegawai ASC LIMIT $num,10");
				return $query->result();

		}

		function simpan(){
				
				$data_insert = array(
							'id_pegawai' 	=> $this->input->post('id_pegawai'),
							'nip_pegawai' 	=> $this->input->post('nip_pegawai'),
							'nama_pegawai' 	=> $this->input->post('nama_pegawai'),
							'golongan' 		=> $this->input->post('golongan'),
							'jabatan' 		=> $this->input->post('jabatan'),
							'gaji_pokok'	=> $this->input->post('gaji_pokok'),
							'gol_perjalanan'=> $this->input->post('gol_perjalanan')
				);
				
				
				$simpan = $this->db->insert($this->table,$data_insert);
				if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		
		}

		function edit($id_pegawai){
			
			$q="SELECT * FROM $this->table WHERE id_pegawai='$id_pegawai'";
				$query=$this->db->query($q);
				return $query->row();
		}
		
		function simpan_edit($id_pegawai,$nip_pegawai,$nama_pegawai,$golongan,$jabatan,$gaji_pokok,$gol_perjalanan){
			$data_update = array(
				'jabatan'		 	=> $jabatan,
				'nip_pegawai'		=> $nip_pegawai,
				'nama_pegawai'		=> $nama_pegawai,
				'golongan' 			=> $golongan,
				'gaji_pokok'		=> $gaji_pokok,
				'gol_perjalanan'	=> $gol_perjalanan
			);
			$this->db->where('id_pegawai',$id_pegawai);
			$this->db->update($this->table,$data_update);
			if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		}

		function hapus($id_pegawai){
			$date = date('d/m/y h:i:s');
			$query = $this->db->query("UPDATE $this->table SET deleted='$date'
										WHERE id_pegawai='$id_pegawai'
										");
			if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		}

	}