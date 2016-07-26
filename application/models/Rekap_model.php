

<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class Rekap_model extends CI_Model{



		function __construct() {
		        parent::__construct();  // Call the Model constructor 
				//loader::database();    // Connect to current database setting.
		    }

		function get_kode_anggaran(){
			$tahun = $this->session->userdata('tahun');
			$query = $this->db->query("SELECT id_komp_keg,anggaran_komp_keg, CONCAT(kode_ass_belanja,'.',kode_ass_kegiatan,'.',kode_komp_keg)as kode FROM komponen_kegiatan JOIN asset_belanja
			ON komponen_kegiatan.id_ass_belanja=asset_belanja.id_ass_belanja JOIN asset_kegiatan
			ON komponen_kegiatan.id_ass_kegiatan=asset_kegiatan.id_ass_kegiatan 
			WHERE tahun='$tahun' AND komponen_kegiatan.deleted IS NULL ORDER BY kode_ass_kegiatan ASC
			");
				return $query->result();

		}

		function count_komponen(){
			$query = $this->db->query("SELECT COUNT(*) as hasil FROM komponen_kegiatan where th_angg_komp='2015'");
				return $query->row();
		}

		function count_pegawai(){
			$query = $this->db->query("SELECT COUNT(*) as hasil FROM pegawai");
				return $query->row();
		}

		function get_kode_anggaran_limit($num){
			$tahun = $this->session->userdata('tahun');
			$query = $this->db->query("SELECT id_komp_keg,anggaran_komp_keg, CONCAT(kode_ass_belanja,'.',kode_ass_kegiatan,'.',kode_komp_keg)as kode FROM komponen_kegiatan JOIN asset_belanja
			ON komponen_kegiatan.id_ass_belanja=asset_belanja.id_ass_belanja JOIN asset_kegiatan
			ON komponen_kegiatan.id_ass_kegiatan=asset_kegiatan.id_ass_kegiatan 
			WHERE tahun='$tahun' AND komponen_kegiatan.deleted IS NULL ORDER BY kode_ass_kegiatan ASC
			LIMIT $num,10
			");
				return $query->result();

		}


		function hitung_anggaran_by_id($id){
			$tahun = $this->session->userdata('tahun');
			$query = $this->db->query("SELECT uang_harian,ongkos,penginapan,uang_saku,komponen_kegiatan.id_komp_keg FROM komponen_kegiatan 
				JOIN surat_tugas ON surat_tugas.id_komp_keg=komponen_kegiatan.id_komp_keg 
				LEFT JOIN relasi_2 ON relasi_2.id_surat=surat_tugas.id_surat 
				JOIN spj ON spj.id_relasi2=relasi_2.id_relasi2
				WHERE th_angg_komp='$tahun' AND komponen_kegiatan.id_komp_keg='$id'");
			return $query->result();
		}

		function hitung_anggaran_pegawai($id){
			$tahun = $this->session->userdata('tahun');
				$query = $this->db->query("SELECT nama_pegawai, ongkos, penginapan,uang_saku, uang_harian FROM pegawai
				JOIN relasi_2 ON pegawai.id_pegawai=relasi_2.id_pegawai 
				JOIN spj ON relasi_2.id_relasi2=spj.id_relasi2
				JOIN surat_tugas ON relasi_2.id_surat=surat_tugas.id_surat
				JOIN komponen_kegiatan ON komponen_kegiatan.id_komp_keg=surat_tugas.id_komp_keg
				WHERE th_angg_komp='$tahun' AND pegawai.id_pegawai='$id'");
			return $query->result();

			
		}

		function count($id){
			$tahun = $this->session->userdata('tahun');
				$query = $this->db->query("SELECT COUNT(nama_pegawai) as jml FROM pegawai
				JOIN relasi_2 ON pegawai.id_pegawai=relasi_2.id_pegawai 
				JOIN spj ON relasi_2.id_relasi2=spj.id_relasi2
				JOIN surat_tugas ON relasi_2.id_surat=surat_tugas.id_surat
				JOIN komponen_kegiatan ON komponen_kegiatan.id_komp_keg=surat_tugas.id_komp_keg
				WHERE th_angg_komp='$tahun' AND pegawai.id_pegawai='$id'");
			return $query->row();

			
		}

		

	
	}