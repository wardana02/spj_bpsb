<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class Rangka_model extends CI_Model{

			private $table='rangka_kegiatan';
			private $pk='id_rangka';


		function __construct() {
		        parent::__construct();  // Call the Model constructor 
				//loader::database();    // Connect to current database setting.
		    }

		function get_all_data(){
			$tahun = $this->session->userdata('tahun');
			$query = $this->db->query("SELECT id_rangka,concat(kode_perjalanan,' / ',judul_perjalanan) as perjalanan,judul_rangka,tahun_anggaran FROM rangka_kegiatan JOIN jenis_perjalanan ON rangka_kegiatan.id_perjalanan=jenis_perjalanan.id_perjalanan 
				WHERE rangka_kegiatan.deleted IS NULL AND tahun_anggaran='$tahun'");
				return $query->result();

		}

		function simpan(){
				$tahun = $this->session->userdata('tahun');
				$data_insert = array(
						'id_rangka' => $this->input->post('id_rangka'),
						'id_perjalanan' => $this->input->post('id_perjalanan'),
						'judul_rangka' => $this->input->post('judul_rangka'),
						'tahun_anggaran' => $tahun
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
		
		function simpan_edit($id,$id_rangka,$judul_rangka,$tahun_anggaran){
			$data_update = array(
				'id_rangka'		=> $id_rangka,
				'judul_rangka'	=> $judul_rangka,
				'tahun_anggaran' => $tahun_anggaran

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