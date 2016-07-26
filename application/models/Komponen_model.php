<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class Komponen_model extends CI_Model{

			private $table='komponen_kegiatan';
			private $pk='id_komp_keg';


		function __construct() {
		        parent::__construct();  // Call the Model constructor 
				//loader::database();    // Connect to current database setting.
		    }

		function get_all_data(){
			$tahun = $this->session->userdata('tahun');
			$query = $this->db->query("SELECT * FROM $this->table WHERE deleted IS NULL AND th_angg_komp='$tahun'");
				return $query->result();

		}

		function get_view_data(){
			$tahun = $this->session->userdata('tahun');
			$query = $this->db->query("SELECT id_komp_keg, komponen_kegiatan.id_ass_belanja, komponen_kegiatan.id_ass_kegiatan, CONCAT( kode_ass_belanja,  '.', kode_ass_kegiatan,  '.', kode_komp_keg ) AS kode, judul_ass_belanja, judul_ass_kegiatan, judul_komp_keg, th_angg_komp, anggaran_komp_keg
				FROM asset_belanja
				JOIN komponen_kegiatan ON asset_belanja.id_ass_belanja = komponen_kegiatan.id_ass_belanja
				JOIN asset_kegiatan ON asset_kegiatan.id_ass_kegiatan = komponen_kegiatan.id_ass_kegiatan
				WHERE komponen_kegiatan.deleted IS NULL AND th_angg_komp='$tahun'");
				return $query->result();

		}

		//get kode from SPD & ST
		function get_kode($id){
	    	$query = $this->db->query("SELECT id_komp_keg, CONCAT( kode_ass_belanja,  '.', kode_ass_kegiatan,  '.', kode_komp_keg ) AS kode
					FROM asset_belanja
					JOIN komponen_kegiatan ON asset_belanja.id_ass_belanja = komponen_kegiatan.id_ass_belanja
					JOIN asset_kegiatan ON asset_kegiatan.id_ass_kegiatan = komponen_kegiatan.id_ass_kegiatan
					WHERE komponen_kegiatan.deleted IS NULL AND komponen_kegiatan.id_komp_keg='$id'");

			return $query->row(); 
    	}

		function simpan(){
				$tahun = $this->session->userdata('tahun');
				$data_insert = array(
						'id_komp_keg' => $this->input->post('id_komp_keg'),
						'judul_komp_keg' => $this->input->post('judul_komp_keg'),
						'kode_komp_keg' => $this->input->post('kode_komp_keg'),
						'anggaran_komp_keg' => $this->input->post('anggaran_komp_keg'),
						'th_angg_komp' => $tahun,
						'id_ass_kegiatan' => $this->input->post('id_ass_kegiatan'),
						'id_ass_belanja' => $this->input->post('id_ass_belanja')
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
		
		function simpan_edit($id,$judul_komp_keg,$kode_komp_keg,$anggaran_komp_keg,$th_angg_komp,$id_ass_keg,$id_ass_belanja){
			$data_update = array(
				'judul_komp_keg'	=> $judul_komp_keg,
				'kode_komp_keg' 	=> $kode_komp_keg,
				'anggaran_komp_keg' => $anggaran_komp_keg,
				'id_ass_kegiatan'	=> $id_ass_keg,
				'id_ass_belanja' 	=> $id_ass_belanja

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