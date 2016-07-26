<?php

  $jm_hr        = waktu($data->tgl_tiba,$data->tgl_berangkat);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>--</title>
  <link href=<?=base_url("assets/mpdf_css/mpdfstyletables.css");?> rel="stylesheet" type="text/css" />

</head>
<body>

<table width="749" height="1156" style="border-collapse:collapse">
  <tr>
    <td class="br_top br_left br_right" colspan="15">
    	<img src=<?=base_url('assets/img/kop_spd.PNG');?> width="749"/>
    </td>
  </tr>
  
  <tr>
     <td class="br_left"><div align="right"></div></td>
     <td>&nbsp;</td>
     <td width="92">&nbsp;</td>
     <td width="63">&nbsp;</td>
     <td width="3">&nbsp;</td>
     <td width="3">&nbsp;</td>
     <td>&nbsp;</td>
     <td width="3">&nbsp;</td>
     <td width="3">&nbsp;</td>
     <td width="92">&nbsp;</td>
     <td width="59">&nbsp;</td>
    <td width="99"><div align="right">Lembar ke</div></td>
    <td width="5">:</td>
    <td class="br_right" colspan="2"></td>
  </tr>
  
  <tr>
     <td class="br_left"><div align="right"></div>       <div align="right"></div>       <div align="right"></div>       <div align="right"></div>       <div align="right"></div>       <div align="right"></div>       <div align="right"></div>       <div align="right"></div>       <div align="right"></div>       <div align="right"></div></td>
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
    <td><div align="right">Nomor</div></td>
    <td>:</td>
    <td class="br_right" colspan="2"><?php echo $this->session->userdata('spd'); ?></td>
    </tr>
  <tr>
    <td class="br_left br_right" height="10" colspan="15">&nbsp;</td>
  </tr>
  <tr>
    <td height="10" colspan="15" class="br_left br_right"><span class="bold_12"><center>SURAT PERJALANAN DINAS</center></span></td>
  </tr>
  <tr>
    <td class="br_left br_right" height="10" colspan="15"><div align="center"><span class="bold_12"><center>(SPD)</center></span></div></td>
  </tr>
  
  <tr>
    <td height="1" colspan="15"  class="br_left br_right">&nbsp;</td>
  </tr>
  
  <tr>
    <td class="br_left br_top" width="27"><span class="std_12">1. </span></td>
    <td colspan="5" class="std_12 br_top"><span class="std_12">Pejabat Pembuat Komitmen</span></td>
    <td width="9" class="std_12 br_top"><span class="std_12">:</span></td>
    <td colspan="8" class="ft_11 br_top br_right"><span class="std_12">Satker: Dinas Pertanian Tanaman Pangan Dan Hortikultura Provinsi<br />
    Jawa Tengah (018.03.039092.DK)</span></td>
  </tr>
  
  <tr>
    <td  width="27"  class="br_left br_top_btm"><span class="std_12">2. </span></td>
    <td colspan="5" class="std_12 br_top_btm"><span class="std_12">Nama/NIP Pegawai yang melaksanakan 
    perjalanan dinas</span></td>
    <td class="std_12 br_top_btm">&nbsp;</td>
    <td colspan="8" class="ft_11 br_top_btm  br_right"><span class="std_12"><?php echo $data->nama_pegawai; ?> <br />
    <?php echo $data->nip_pegawai; ?></span></td>
  </tr>
  
  <tr>
    <td class="br_left"><span class="std_12">3. </span></td>
    <td width="18" class="std_12"><span class="std_12">a.</span></td>
    <td colspan="4" class="std_12"><span class="std_12">Pangkat dan Golongan</span></td>
    <td class="std_12"><span class="std_12">:</span></td>
    <td colspan="8" class="ft_11 br_right"><span class="std_12"><?php echo $data->judul_golongan." / ".$data->tingkat_gol; ?></span></td>
  </tr>
  
  <tr>
<td class="br_left">&nbsp;</td>
    <td class="std_12"><span class="std_12">b.</span></td>
    <td colspan="4" class="std_12"><span class="std_12">Jabatan/Instansi</span></td>
    <td class="std_12"><span class="std_12">:</span></td>
    <td colspan="8" class="ft_11 br_right"><span class="std_12"><?php echo $data->jabatan; ?> BPSB Jawa Tengah</span></td>
  </tr>
  
  <tr>
    <td class="br_left">&nbsp;</td>
    <td class="std_12"><span class="std_12">c.</span></td>
    <td colspan="4" class="std_12"><span class="std_12">Tingkat Biaya Perjalanan Dinas</span></td>
    <td class="std_12"><span class="std_12">:</span></td>
    <td colspan="8" class="ft_11 br_right"><span class="std_12"> <?php echo $data->gol_perjalanan; ?></span></td>
  </tr>
  
  <tr>
<td class="br_left br_top_btm"><span class="std_12">4.</span></td>
    <td colspan="5" class="std_12 br_top_btm"><span class="std_12">Maksud perjalanan dinas</span></td>
    <td class="std_12 br_top_btm">&nbsp;</td>
    <td colspan="8" class="ft_11 br_top_btm  br_right"><span class="std_12"><?php echo $data->judul_rangka." pada ".$data->judul_komp_keg; ?></span></td>
  </tr>
  
  <tr>
    <td class="br_left br_top_btm"><span class="std_12">5.</span></td>
    <td colspan="5" class="std_12 br_top_btm"><span class="std_12">Alat angkutan yang dipergunakan</span></td>
    <td class="std_12 br_top_btm">&nbsp;</td>
    <td colspan="8" class="ft_11 br_top_btm br_right br_right"><span class="std_12"><?php echo $data->nama_kendaraan; ?></span></td>
  </tr>
  
  <tr>
    <td class="br_left"><span class="std_12">6.</span></td>
    <td class="std_12"><span class="std_12">a.</span></td>
    <td colspan="4" class="std_12"><span class="std_12">Tempat berangkat</span></td>
    <td class="std_12"><span class="std_12">:</span></td>
    <td colspan="8" class="ft_11 br_right"><span class="std_12"><?php echo $data->dari; ?></span></td>
  </tr>
  
  <tr>
    <td class="br_left br_bottom">&nbsp;</td>
    <td class="std_12 br_bottom"><span class="std_12">b.</span></td>
    <td colspan="4" class="std_12 br_bottom"><span class="std_12">Tempat tujuan</span></td>
    <td class="std_12 br_bottom"><span class="std_12">:</span></td>
    <td colspan="8" class="ft_11 br_bottom  br_right"><span class="std_12"><?php echo $data->ke; ?></span></td>
  </tr>
  
  <tr>
    <td class="br_left"><span class="std_12">7.</span></td>
    <td class="std_12"><span class="std_12">a.</span></td>
    <td colspan="4" class="std_12"><span class="std_12">Lamanya perjalanan dinas</span></td>
    <td class="std_12"><span class="std_12">:</span></td>
    <td colspan="4" class="ft_11"><div align="left"><?php echo $jm_hr." (".hitung($jm_hr); ?>) hari</div></td>
    <td class="ft_11">&nbsp;</td>
    <td class="ft_11">&nbsp;</td>
    <td class="ft_11">&nbsp;</td>
    <td class="ft_11 br_right">&nbsp;</td>
  </tr>
  
  <tr>
    <td class="br_left">&nbsp;</td>
    <td class="std_12"><span class="std_12">b.</span></td>
    <td colspan="4" class="std_12"><span class="std_12">Tanggal berangkat</span></td>
    <td class="std_12"><span class="std_12">:</span></td>
    <td colspan="4" class="ft_11"><span class="std_12"><?php echo dateindo($data->tgl_berangkat); ?></span></td>
    <td class="ft_11">&nbsp;</td>
    <td class="ft_11">&nbsp;</td>
    <td class="ft_11">&nbsp;</td>
    <td class="ft_11 br_right">&nbsp;</td>
  </tr>
  
  <tr>
    <td class="br_left br_bottom">&nbsp;</td>
    <td class="br_bottom">c.</td>
    <td colspan="4" class="br_bottom">Tanggal harus kembali</td>
    <td class="br_bottom">:</td>
    <td colspan="4" class="br_bottom"><?php echo dateindo($data->tgl_tiba); ?></td>
    <td colspan="2" class="ft_11 br_bottom">&nbsp;</td>
    <td class="ft_11 br_bottom">&nbsp;</td>
    <td class="ft_11 br_bottom br_right">&nbsp;</td>
  </tr>
  
  <tr>
  	<td class="br_left br_bottom"><span class="std_12">8. </span></td>
    <td class="br_bottom br_right" height="23" colspan="2"><div align="center"><span class="std_12"><center>Pengikut</center></span></div></td>
    <td colspan="7" class="ft_11 br_bottom br_right"><div align="center"><span class="std_12"><center>Nama</center></span></div>      <div align="center"></div></td>
    <td colspan="3" class="ft_11 br_bottom br_right"><center>Pangkat/Golongan</center></td>
    <td colspan="2" class="ft_11 br_bottom br_right"><div align="center"><span class="std_12"><center>NIP</center></span></div></td>
  </tr>
  
  <tr>
    <td class="br_left">&nbsp;</td>
    <td colspan="2" class="ft_11 br_right"><span class="std_12">1.</span></td>
    <td colspan="7" class="ft_11 br_right">&nbsp;</td>
    <td colspan="3" class="ft_11 br_right">&nbsp;</td>
    <td colspan="2" class="ft_11 br_right">&nbsp;</td>
  </tr>
  
  <tr>
    <td class="br_left">&nbsp;</td>
    <td colspan="2" class="ft_11 br_right"><span class="std_12">2.</span></td>
    <td colspan="7" class="ft_11 br_right">&nbsp;</td>
    <td colspan="3" class="ft_11 br_right">&nbsp;</td>
    <td colspan="2" class="ft_11 br_right">&nbsp;</td>
  </tr>
  
  <tr>
    <td class="br_left br_bottom">&nbsp;</td>
    <td colspan="2" class="br_bottom br_right">3.</td>
    <td colspan="7" class="ft_11 br_bottom br_right">&nbsp;</td>
    <td colspan="3" class="ft_11 br_bottom br_right">&nbsp;</td>
    <td colspan="2" class="ft_11 br_bottom br_right">&nbsp;</td>
  </tr>
  
  <tr>
    <td class="br_left"><span class="std_12">9. </span></td>
    <td colspan="14" class="br_right"><span class="std_12">Pembebanan Anggaran</span></td>
  </tr>
  
  <tr>
    <td class="br_left">&nbsp;</td>
    <td><span class="std_12">a.</span></td>
    <td colspan="4"><span class="std_12"> Kode/Nama Alokasi</span></td>
    <td><span class="std_12">:</span></td>
    <td colspan="8" class="br_right"><span class="std_12">018.03.039092.DK (Ditjen. Tanaman Pangan)</span></td>
  </tr>
  <tr>
    <td class="br_left">&nbsp;</td>
    <td><span class="std_12">b.</span></td>
    <td colspan="4"><span class="std_12">Program</span></td>
    <td><span class="std_12">:</span></td>
    <td colspan="8" class="br_right"><span class="std_12">018.03.06 Program Peningkatan Produksi Tanaman Pangan Melalui  
    Produktivitas Dan Mutu Hasil Tanaman Pangan</span></td>
  </tr>
  <tr>
    <td class="br_left">&nbsp;</td>
    <td><span class="std_12">c.</span></td>
    <td colspan="4"><span class="std_12">Kegiatan/Output Keg.</span></td>
    <td><span class="std_12">:</span></td>
    <td colspan="8" class="br_right"><span class="std_12">
      <?php echo $data->kode_ass_belanja." Pengelolaan Sistem Penyediaan Benih Tanaman  
      Pangan / ".$data->judul_ass_belanja; ?></span></td>
  </tr>
  <tr>
    <td class="br_left">&nbsp;</td>
    <td><span class="std_12">d.</span></td>
    <td colspan="4"><span class="std_12">Belanja</span></td>
    <td><span class="std_12">:</span></td>
    <td colspan="8" class="br_right"><span class="std_12">Barang</span></td>
  </tr>
  <tr>
    <td class="br_left">&nbsp;</td>
    <td><span class="std_12">e.</span></td>
    <td colspan="4"><span class="std_12">Akun</span></td>
    <td><span class="std_12">:</span></td>
    <td colspan="8" class="br_right"><span class="std_12">
      <?php echo $data->kode_ass_kegiatan.".".$data->kode_komp_keg.".".$data->kode_perjalanan." ".
      $data->judul_ass_kegiatan." / ".$data->judul_komp_keg." / ".$data->judul_perjalanan; ?>
      </span></td>
  </tr>
  <tr>
    <td class="br_left br_bottom">&nbsp;</td>
    <td class="br_bottom">f.</td>
    <td colspan="4" class="br_bottom">Tahun Anggaran</td>
    <td class="br_bottom">:</td>
    <td colspan="8" class="br_bottom br_right"><?php echo $data->tahun_anggaran; ?></td>
  </tr>
  <tr>
    <td height="39" class="br_left br_bottom"><span class="std_12">10.</span></td>
    <td colspan="5" class="br_bottom">Keterangan lain-lain</td>
    <td class="br_bottom">:</td>
    <td colspan="8" class="br_bottom br_right">Nomor SPT : <?php echo $this->session->userdata('st');?> <br />
    Tanggal <?php echo dateindo($data->tanggal_surat)?></td>
  </tr>
 
  <tr>
    <td colspan="9">&nbsp;</td>
    <td colspan="2" class="std_12"><span class="std_12">Dikeluarkan di</span></td>
    <td class="std_12">&nbsp;</td>
    <td class="std_12"><span class="std_12">:</span></td>
    <td width="224" class="std_12"><span class="std_12">Sukoharjo</span></td>
    <td width="6" class="std_12">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
    <td colspan="2" class="std_12"><span class="std_12">Pada tanggal</span></td>
    <td class="std_12">&nbsp;</td>
    <td class="std_12"><span class="std_12">:</span></td>
    <td class="std_12"><span class="std_12"><?php echo dateindo($data->tanggal_surat)?></span></td>
    <td class="std_12">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
    <td colspan="6" class="std_12">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
    <td colspan="6" class="std_12"><center><span class="std_12">PEJABAT PEMBUAT KOMITMEN</span><center></td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
    <td height="28" colspan="6" class="std_12"><div align="center"></div>      <div align="center"></div>      <div align="center"></div>      <div align="center"></div>      <div align="center"></div>
      <div align="center"></div>
      <div align="center"></div>
      <div align="center"></div>
    <div align="center"></div>      <div align="center"></div></td>
  </tr>

    <tr>
    <td colspan="9">&nbsp;</td>
    <td colspan="6" class="std_12"><center><span class="std_12"></span><center></td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
    <td colspan="6" class="std_12"><center><span class="std_12"><u>Ir. NENI ERNAWATI S, MP</u></span><center></td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
    <td colspan="6" class="std_12"><center><span class="std_12">NIP. 19620710 199002 2 001</span><center></td>
  </tr>
</table>



</body>
</html>
