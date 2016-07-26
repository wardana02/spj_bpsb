<?php  if (!defined('BASEPATH'))    exit('No direct script access allowed');

	class Spj_model extends CI_Model{

			private $table='spj';
			private $pk='id_spj';


		function __construct() {
		        parent::__construct();  // Call the Model constructor 
				//loader::database();    // Connect to current database setting.
		    }

		function get_all_data(){
			$id_user = $this->session->userdata('id_user');
			$tahun   = $this->session->userdata('tahun');
			if($id_user=='USR06132110'){
				$ctrl = "";
			}else{
				$ctrl = "AND surat_tugas.by_='$id_user'";
			}
			

			$query = $this->db->query("SELECT id_spj,by_,komponen_kegiatan.id_komp_keg,nama_pegawai, surat_tugas.nomor_surat, tanggal_surat, spj.no_surat,uang_saku,uang_harian,penginapan, ongkos, concat(nama_ttd,'/',nm_produsen) as tujuan
			,relasi_2.id_relasi2, surat_tugas.id_surat 
			FROM surat_tugas JOIN relasi_2 ON surat_tugas.id_surat=relasi_2.id_surat
			JOIN spj ON relasi_2.id_relasi2=spj.id_relasi2
			JOIN pegawai ON relasi_2.id_pegawai=pegawai.id_pegawai 
			JOIN komponen_kegiatan ON surat_tugas.id_komp_keg=komponen_kegiatan.id_komp_keg
			WHERE th_angg_komp='$tahun'  $ctrl");
				return $query->result();

		}

		function get_pegawai_data($id){
				$query = $this->db->query("SELECT pegawai.id_pegawai,jabatan,nama_pegawai,relasi_2.id_relasi2 FROM pegawai JOIN relasi_2 
				ON pegawai.id_pegawai=relasi_2.id_pegawai JOIN
				surat_tugas ON relasi_2.id_surat=surat_tugas.id_surat
				WHERE relasi_2.id_surat='$id'
				AND relasi_2.id_relasi2 NOT IN( 
				SELECT relasi_2.id_relasi2 from relasi_2 join spj on relasi_2.id_relasi2=spj.id_relasi2
				join surat_tugas ON relasi_2.id_surat=surat_tugas.id_surat
				WHERE relasi_2.id_surat='$id' )");
				return $query->result();

		}

		function get_id_relasi($id_pegawai,$id_surat){
			$query = $this->db->query("select id_relasi2,gaji_pokok from relasi_2 join pegawai on relasi_2.id_pegawai=pegawai.id_pegawai 
			JOIN surat_tugas ON surat_tugas.id_surat=relasi_2.id_surat 
			WHERE relasi_2.id_pegawai='$id_pegawai' AND relasi_2.id_surat='$id_surat'");

			return $query->row();

		}

		function simpan(){

			$ctrl = $this->session->userdata('ctrl');

			$id1 			= $this->input->post('id_pegawai');
			$id2 			= $this->input->post('id_surat');
			$tgl_berangkat 	= $this->input->post('tgl_berangkat');
			$tgl_tiba	 	= $this->input->post('tgl_tiba');
			$uang_saku	 	= $this->input->post('uang_saku');
			if($this->input->post('penginapan2')!=NULL){
				$penginapan2 	= $this->input->post('penginapan2');
			}else {$penginapan2=0;}
			if($this->input->post('ongkos')!=NULL){
				$ongkos 	= $this->input->post('ongkos');
			}else {$ongkos=0;}
			



			$hari = waktu($tgl_tiba,$tgl_berangkat);
			if($ctrl){
				$hari_min = $hari-2;
				$hari=2;
			}
				

			$hasil = $this->get_id_relasi($id1,$id2);
				$uang 		 = $hasil->gaji_pokok;
				$rel 		 = $hasil->id_relasi2;
				$uang_harian = $uang * $hari;
				$uang_saku 	 = $uang_saku * $hari_min;



				
				$data_insert = array(
						'id_spj' => $this->input->post('id_spj'),
						'id_kendaraan' => $this->input->post('id_kendaraan'),
						'no_surat' => $this->input->post('no_surat'),
						'id_relasi2' => $rel,
						'ongkos' => $ongkos,
						'penginapan' => $penginapan2,
						'uang_harian' => $uang_harian,
						'uang_saku' => $uang_saku,
						'jb_ttd' => $this->input->post('jb_ttd'),
						'nama_ttd' => $this->input->post('nm_ttd'),
						'nip_ttd' => $this->input->post('nip_ttd'),
						'nm_produsen' => $this->input->post('nm_produsen')
				);
				
				
				$simpan = $this->db->insert($this->table,$data_insert);
				if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		
		}

		

		function get_nama_spj($id){
			$q="select nama_pegawai from pegawai join relasi_2 
			ON pegawai.id_pegawai=relasi_2.id_pegawai
			WHERE id_relasi2='$id'";
			$query=$this->db->query($q);
				return $query->row();
		}

		function edit($id){
			
			$q="SELECT * FROM $this->table WHERE $this->pk='$id'";
				$query=$this->db->query($q);
				return $query->row();
		}
		
		function simpan_edit($id,$id_kendaraan,$no_surat,$ongkos,$penginapan2,$uang_saku,$jb_ttd,$nm_ttd,$nip_ttd,$nm_produsen){
			

			

			$data_update = array(
						'id_kendaraan' => $id_kendaraan,
						'no_surat' => $no_surat,
						'ongkos' => $ongkos,
						'penginapan' => $penginapan2,
						'uang_saku' => $uang_saku,
						'jb_ttd' => $jb_ttd,
						'nama_ttd' => $nm_ttd,
						'nip_ttd' => $nip_ttd,
						'nm_produsen' => $nm_produsen
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
			$query = $this->db->query("DELETE FROM $this->table WHERE $this->pk='$id'
										");
			if($this->db->affected_rows() > 0) {
		            return TRUE;
		        }
		        else{
		            return FALSE;
		        }
		}

	
	}