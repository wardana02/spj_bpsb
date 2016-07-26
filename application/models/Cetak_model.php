<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class Cetak_model extends CI_Model{



		function __construct() {
		        parent::__construct();  // Call the Model constructor 
				//loader::database();    // Connect to current database setting.
		    }

		function get_specific_data($id){
			$query = $this->db->query("
				SELECT id_spj,surat_tugas.id_surat,nama_pegawai,gaji_pokok,gol_perjalanan,jabatan,nip_pegawai,judul_golongan,tingkat_gol,
					judul_ass_belanja,kode_ass_belanja,
					judul_ass_kegiatan,kode_ass_kegiatan,
					kode_perjalanan,judul_perjalanan,
					nama_kendaraan,bahan_bakar,
					judul_komp_keg,kode_komp_keg,
					judul_rangka,tahun_anggaran,
					nomor_surat,tanggal_surat,tgl_berangkat,tgl_tiba,dari,ke,
					no_surat,ongkos,penginapan,uang_harian,uang_saku,
					jb_ttd,nama_ttd,nip_ttd,nm_produsen
				FROM golongan JOIN pegawai ON golongan.id_golongan=pegawai.golongan
				JOIN relasi_2 ON relasi_2.id_pegawai=pegawai.id_pegawai
				JOIN surat_tugas ON relasi_2.id_surat=surat_tugas.id_surat
				JOIN komponen_kegiatan ON surat_tugas.id_komp_keg=komponen_kegiatan.id_komp_keg
				JOIN asset_belanja ON komponen_kegiatan.id_ass_belanja=asset_belanja.id_ass_belanja
				JOIN asset_kegiatan ON komponen_kegiatan.id_ass_kegiatan=asset_kegiatan.id_ass_kegiatan
				JOIN rangka_kegiatan ON surat_tugas.id_rangka=rangka_kegiatan.id_rangka
				JOIN jenis_perjalanan ON rangka_kegiatan.id_perjalanan=jenis_perjalanan.id_perjalanan
				JOIN spj ON spj.id_relasi2=relasi_2.id_relasi2
				JOIN kendaraan ON spj.id_kendaraan=kendaraan.id_kendaraan
				WHERE relasi_2.id_relasi2='$id'
				");
				return $query->row();

		}


		function get_spc_data(){
			$query = $this->db->query("
				SELECT nama_pegawai,dari,ke,judul_rangka,kode_perjalanan,DATEDIFF(tgl_tiba,tgl_berangkat)+1 as hari,tgl_berangkat,tgl_tiba,
				judul_komp_keg,CONCAT(kode_ass_belanja,'.',kode_ass_kegiatan,'.',kode_komp_keg) as kode_kegiatan,ongkos,penginapan,uang_harian,uang_saku
				FROM golongan JOIN pegawai ON golongan.id_golongan=pegawai.golongan
				JOIN relasi_2 ON relasi_2.id_pegawai=pegawai.id_pegawai
				JOIN surat_tugas ON relasi_2.id_surat=surat_tugas.id_surat
				JOIN komponen_kegiatan ON surat_tugas.id_komp_keg=komponen_kegiatan.id_komp_keg
				JOIN asset_belanja ON komponen_kegiatan.id_ass_belanja=asset_belanja.id_ass_belanja
				JOIN asset_kegiatan ON komponen_kegiatan.id_ass_kegiatan=asset_kegiatan.id_ass_kegiatan
				JOIN rangka_kegiatan ON surat_tugas.id_rangka=rangka_kegiatan.id_rangka
				JOIN jenis_perjalanan ON rangka_kegiatan.id_perjalanan=jenis_perjalanan.id_perjalanan
				JOIN spj ON spj.id_relasi2=relasi_2.id_relasi2
				JOIN kendaraan ON spj.id_kendaraan=kendaraan.id_kendaraan
				ORDER BY tanggal_surat ASC
				");
				return $query;

		}

		function get_complete_data(){
			$query = $this->db->query("
			SELECT nama_pegawai,jabatan,nip_pegawai,judul_golongan,tingkat_gol,
						judul_ass_belanja,kode_ass_belanja,
						judul_ass_kegiatan,kode_ass_kegiatan,kode_komp_keg,
						kode_perjalanan,judul_perjalanan,
						nama_kendaraan,bahan_bakar,
						judul_komp_keg,
						judul_rangka,tahun_anggaran,
						nomor_surat,tanggal_surat,tgl_berangkat,tgl_tiba,dari,ke,
						no_surat,ongkos,uang_harian,uang_saku,
						jb_ttd,nama_ttd,nip_ttd,nm_produsen
					FROM golongan JOIN pegawai ON golongan.id_golongan=pegawai.golongan
					JOIN relasi_2 ON relasi_2.id_pegawai=pegawai.id_pegawai
					JOIN surat_tugas ON relasi_2.id_surat=surat_tugas.id_surat
					JOIN komponen_kegiatan ON surat_tugas.id_komp_keg=komponen_kegiatan.id_komp_keg
					JOIN asset_belanja ON komponen_kegiatan.id_ass_belanja=asset_belanja.id_ass_belanja
					JOIN asset_kegiatan ON komponen_kegiatan.id_ass_kegiatan=asset_kegiatan.id_ass_kegiatan
					JOIN rangka_kegiatan ON surat_tugas.id_rangka=rangka_kegiatan.id_rangka
					JOIN jenis_perjalanan ON rangka_kegiatan.id_perjalanan=jenis_perjalanan.id_perjalanan
					JOIN spj ON spj.id_relasi2=relasi_2.id_relasi2
					JOIN kendaraan ON spj.id_kendaraan=kendaraan.id_kendaraan ORDER BY pegawai.nama_pegawai");
			return $query;
		}

		function get_complete_st(){
			$query = $this->db->query("
			SELECT nomor_surat,tanggal_surat,dari,ke,
			kode_ass_belanja,judul_ass_belanja,
			kode_ass_kegiatan,
			kode_komp_keg,
			judul_komp_keg,
			judul_ass_kegiatan,
			judul_rangka,
			kode_perjalanan,judul_perjalanan
			FROM komponen_kegiatan JOIN surat_tugas 
			ON komponen_kegiatan.id_komp_keg=surat_tugas.id_komp_keg JOIN rangka_kegiatan
			ON surat_tugas.id_rangka=rangka_kegiatan.id_rangka JOIN jenis_perjalanan 
			ON rangka_kegiatan.id_perjalanan=jenis_perjalanan.id_perjalanan JOIN asset_kegiatan
			ON komponen_kegiatan.id_ass_kegiatan=asset_kegiatan.id_ass_kegiatan JOIN asset_belanja
			ON asset_belanja.id_ass_belanja=komponen_kegiatan.id_ass_belanja ORDER BY tanggal_surat ASC
			");
			return $query;
		}

		function get_all_data($id){
			$query = $this->db->query("
				SELECT id_spj,surat_tugas.id_surat,relasi_2.id_relasi2,nama_pegawai,jabatan,nip_pegawai,judul_golongan,tingkat_gol,
					judul_ass_belanja,kode_ass_belanja,
					judul_ass_kegiatan,kode_ass_kegiatan,
					kode_perjalanan,judul_perjalanan,
					nama_kendaraan,bahan_bakar,
					judul_komp_keg,kode_komp_keg,
					judul_rangka,tahun_anggaran,
					nomor_surat,tanggal_surat,tgl_berangkat,tgl_tiba,dari,ke,
					no_surat,ongkos,uang_harian,
					jb_ttd,nama_ttd,nip_ttd,nm_produsen
				FROM golongan JOIN pegawai ON golongan.id_golongan=pegawai.golongan
				JOIN relasi_2 ON relasi_2.id_pegawai=pegawai.id_pegawai
				JOIN surat_tugas ON relasi_2.id_surat=surat_tugas.id_surat
				JOIN komponen_kegiatan ON surat_tugas.id_komp_keg=komponen_kegiatan.id_komp_keg
				JOIN asset_belanja ON komponen_kegiatan.id_ass_belanja=asset_belanja.id_ass_belanja
				JOIN asset_kegiatan ON komponen_kegiatan.id_ass_kegiatan=asset_kegiatan.id_ass_kegiatan
				JOIN rangka_kegiatan ON surat_tugas.id_rangka=rangka_kegiatan.id_rangka
				JOIN jenis_perjalanan ON rangka_kegiatan.id_perjalanan=jenis_perjalanan.id_perjalanan
				JOIN spj ON spj.id_relasi2=relasi_2.id_relasi2
				JOIN kendaraan ON spj.id_kendaraan=kendaraan.id_kendaraan
				WHERE surat_tugas.id_surat='$id'
				");
				return $query->result();

		}

		function get_st_data($id){
			$query = $this->db->query("SELECT surat_tugas.id_surat,by_,komponen_kegiatan.id_komp_keg,tanggal_surat,nomor_surat,no_surat,dari,ke,judul_komp_keg, judul_rangka FROM komponen_kegiatan JOIN surat_tugas 
			ON komponen_kegiatan.id_komp_keg=surat_tugas.id_komp_keg JOIN rangka_kegiatan
			ON surat_tugas.id_rangka=rangka_kegiatan.id_rangka JOIN relasi_2
			ON surat_tugas.id_surat=relasi_2.id_surat JOIN spj
			ON relasi_2.id_relasi2=spj.id_relasi2
			WHERE surat_tugas.id_surat='$id'");
				return $query->row();

		}

		function get_pegawai_st($id){
			$query = $this->db->query("SELECT nama_pegawai,jabatan FROM pegawai JOIN relasi_2
				ON pegawai.id_pegawai=relasi_2.id_pegawai JOIN surat_tugas
				ON surat_tugas.id_surat=relasi_2.id_surat
				WHERE surat_tugas.id_surat='$id'");
			return $query->result();
		}

	
	}