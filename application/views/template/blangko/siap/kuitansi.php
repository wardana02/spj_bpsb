<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>--</title>
  <link href=<?=base_url("assets/css/blangko.css");?> rel="stylesheet" type="text/css" />

</head>

<body>

<table width="749" height="1178">
  <tr>
    <td height="116" colspan="11"> <img src=<?=base_url('assets/img/kop_spd.PNG');?> width="749"/></td>
	
  </tr>
  <tr>
    <td width="26">&nbsp;</td>
    <td width="150">&nbsp;</td>
    <td width="7">&nbsp;</td>
    <td width="58">&nbsp;</td>
    <td width="68">&nbsp;</td>
    <td width="68">&nbsp;</td>
    <td width="68">&nbsp;</td>
    <td width="130">Tahun anggaran</td>
    <td width="7">:</td>
    <td width="120">&nbsp;</td>
    <td width="7">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Nomor bukti</td>
    <td>:</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Akun</td>
    <td>:</td>
    <td><?php echo $data->kode_perjalanan; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="48">&nbsp;</td>
    <td colspan="9"><div align="center"><strong><center>KWITANSI / BUKTI PEMBAYARAN<?php echo $tes; ?></center></strong></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Sudah terima dari</td>
    <td>:</td>
    <td colspan="7">Pejabat Pembuat Komitmen Dinas Pertanian Tanaman Pangan dan Hortikultura Provinsi Jawa Tengah 018.03.039092.DK</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Uang sejumlah</td>
    <td>:</td>
    <td>Rp.</td>
    <td colspan="2"><?php echo rupiah($data->uang_harian+$data->ongkos+$data->penginapan+$data->uang_saku).",-"?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Terbilang</td>
    <td>:</td>
    <td colspan="7"><?php echo ucwords(number_to_words($data->uang_harian+$data->ongkos+$data->penginapan+$data->uang_saku));; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Untuk pembayaran</td>
    <td>:</td>
    <td colspan="7">
    <?php echo 
      "Biaya perjalanan dinas dari ".$data->dari." ke ".$data->ke." pada tanggal ".dateindo($data->tgl_berangkat)." s/d "
      .dateindo($data->tgl_tiba)." dalam rangka ".$data->judul_rangka." pada ".$data->judul_komp_keg." sesuai surat tugas no. "
      .$this->session->userdata('st')." pada tanggal ".dateindo($data->tanggal_surat);
    ?>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td colspan="3">PEMBEBANAN ANGGARAN</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>a. Kode/Nama Alokasi</td>
    <td>&nbsp;</td>
    <td colspan="7">018.03.039092 (Ditjen Tanaman Pangan)</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>b. Program</td>
    <td>&nbsp;</td>
    <td colspan="7">018.03.06 Program Peningkatan Produksi Tanaman Pangan Melalui Produktivitas Dan Mutu Hasil Tanaman Pangan</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td>c. Kegiatan/Output Keg</td>
    <td>&nbsp;</td>
    <td colspan="7">
      <?php echo $data->kode_ass_belanja." Pengelolaan Sistem Penyediaan Benih Tanaman  
      Pangan / ".$data->judul_ass_belanja; ?>      
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>d. Belanja</td>
    <td>&nbsp;</td>
    <td colspan="2">Barang</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td>e. Akun</td>
    <td>&nbsp;</td>
    <td colspan="7">

    <?php echo $data->kode_ass_kegiatan.".".$data->kode_komp_keg.".".$data->kode_perjalanan." ".
      $data->judul_ass_kegiatan." / ".$data->judul_komp_keg." / ".$data->judul_perjalanan; ?>

    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>f. Tahun Anggaran</td>
    <td>&nbsp;</td>
    <td><?php echo $data->tahun_anggaran; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3"><center>Sukoharjo, <?php echo dateindo($data->tanggal_surat); ?></center></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3"><center>Yang menerima,</center></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3"><center><?php echo $data->nama_pegawai; ?></center></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="br_bottom">&nbsp;</td>
    <td class="br_bottom">&nbsp;</td>
    <td class="br_bottom">&nbsp;</td>
    <td class="br_bottom">&nbsp;</td>
    <td class="br_bottom">&nbsp;</td>
    <td class="br_bottom">&nbsp;</td>
    <td class="br_bottom">&nbsp;</td>
    <td class="br_bottom" colspan="3"><center>NIP : <?php echo $data->nip_pegawai; ?></center></td>
    <td class="br_bottom">&nbsp;</td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td colspan="4">Setuju dibebankan pada mata anggaran berkenan</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td colspan="4"><div align="center">An. Kuasa Pengguna Anggaran</div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">Lunas dibayar Tgl. :</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="4"><div align="center">Pejabat Pembuat Komitmen</div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3"><div align="center">Bendahara Pengeluaran Pembantu</div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="4"><div align="center"><u>Ir. NENI ERNAWATI S, MP</u></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3"><div align="center"><u>TRI SULISTYANINGSIH, SP</u></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="br_bottom">&nbsp;</td>
    <td class="br_bottom" colspan="4"><div align="center">NIP. 19620710 199002 2 001</div></td>
    <td class="br_bottom">&nbsp;</td>
    <td class="br_bottom">&nbsp;</td>
    <td class="br_bottom" colspan="3"><div align="center">NIP. 19670310 199903 2 005</div></td>
    <td class="br_bottom">&nbsp;</td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td colspan="4">Barang/pekerjaan tersebut telah diterima/ diselesaikan dengan lengkap dan baik</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td colspan="4"><div align="center">Pejabat yang bertanggung jawab :</div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td colspan="4"><div align="center">Kepala BPSB Jawa Tengah</div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="4"><div align="center"><u>Ir. NENI ERNAWATI S, MP</u></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="4"><div align="center">NIP. 19620710 199002 2 001</div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>




</body>
</html>
