<?php 

  $jumlah       = $data->uang_harian+$data->ongkos+$data->penginapan+$data->uang_saku;
  $jm_hr        = waktu($data->tgl_tiba,$data->tgl_berangkat);
  $ctrl         = $data->kode_perjalanan;
  if($ctrl=='524119'){
    $hr_ms = $jm_hr-2;
    $jm_hr = 2;
  }
  $uang_harian  = rupiah($data->uang_harian);
  $saku         = rupiah($data->uang_saku/$hr_ms);
  $uang_saku    = rupiah($data->uang_saku);
  $ongkos       = rupiah($data->ongkos);
  $penginapan   = rupiah($data->penginapan);
  $kurang       = rupiah($jumlah-$dp);
  $jumlah      = rupiah($jumlah); 



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>--</title>
  <link href=<?=base_url("assets/css/blangko.css");?> rel="stylesheet" type="text/css" />
</head>

<body>

<table width="749" height="634" style="border-collapse:collapse">
  <tr>
    <td height="13" colspan="15"><span class="ft_8"><strong>DINAS PERTANIAN TANAMAN PANGAN DAN HORTIKULTURA</strong></span></td>
  </tr>
  <tr>
    <td height="14" class="br_bottom" colspan="15"><span class="ft_8"><strong>PROVINSI JAWA TENGAH</strong></span></td>
  </tr>
  <tr>
    <td height="21" colspan="15"><div align="center" class="ft_10"><strong><center>RINCIAN BIAYA PERJALANAN DINAS</center></strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="2" class="ft_10">Lampiran SPPD Nomor</td>
    <td width="8" class="ft_10">&nbsp;</td>
    <td width="27" class="ft_10">:</td>
    <td colspan="2" class="ft_10"><?php echo $this->session->userdata('spd');?></td>
    <td width="19">&nbsp;</td>
    <td width="7">&nbsp;</td>
    <td width="19">&nbsp;</td>
    <td width="52">&nbsp;</td>
    <td width="25">&nbsp;</td>
    <td width="17">&nbsp;</td>
    <td width="31">&nbsp;</td>
    <td width="11">&nbsp;</td>
    <td width="29">&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="2" class="ft_10">Tanggal</td>
    <td class="ft_10">&nbsp;</td>
    <td class="ft_10">:</td>
    <td colspan="2" class="ft_10">12 Februari 2015</td>
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
    <td width="32" height="14" class="br_top_btm br_right br_left"><span class="ft_10"><center>No.</center></span></td>
    <td colspan="4"  class="br_top_btm br_right"><div align="center"><span class="ft_10"><center>Perincian Biaya</center></span></div></td>
    <td colspan="3" class="br_top_btm br_right"><div align="center"><span class="ft_10"><center>Jumlah<c/enter></span></div></td>
    <td colspan="7" class="br_top_btm br_right"><div align="center"><span class="ft_10"><center>Keterangan</center></span></div></td>
  </tr>
  <tr>
    <td height="21" class="br_right br_left"><span class="ft_10"><center>1</center></span></td>
    <td colspan="4" class="br_right"><span class="ft_10"><?php echo "Uang Harian : $jm_hr X Rp.".rupiah($data->gaji_pokok).",-";?> </span></td>
    <td colspan="3" class="br_right"><span class="ft_10">Rp. <?php echo rupiah($data->uang_harian); ?>,-</span></td>
    <td colspan="7" class="br_right"><span class="ft_10"></span></td>
  </tr>
  <tr>
  <?php if($data->uang_saku>0){
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>2</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'> Uang Saku : $hr_ms X Rp. $saku </span></td>
          <td colspan='3' class='br_right'><span class='ft_10'>Rp. $uang_saku ,-</span></td>
          <td colspan='7' class='br_right'><span class='ft_10'></span></td>
      ";


    }else if($data->ongkos>0){
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>2</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'> Ongkos Perjalanan (Pulang-Pergi)</span></td>
          <td colspan='3' class='br_right'><span class='ft_10'>Rp. $ongkos ,-</span></td>
          <td colspan='7' class='br_right'><span class='ft_10'>bukti terlampir</span></td>
      ";
      $status = TRUE;


    }else if($data->penginapan>0){
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>2</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'> Biaya Sewa Penginapan</span></td>
          <td colspan='3' class='br_right'><span class='ft_10'>Rp. $penginapan ,-</span></td>
          <td colspan='7' class='br_right'><span class='ft_10'>bukti terlampir</span></td>
      ";
      $status = TRUE;


    }
    else
    {
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>2</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'></span></td>
          <td colspan='3' class='br_right'><span class='ft_10'></span></td>
          <td colspan='7' class='br_right'><span class='ft_10'></span></td>
      ";
    }


     ?>
  </tr>

    <tr>
  <?php if($data->ongkos>0 AND $status==FALSE){
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>3</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'> Ongkos Perjalanan (Pulang-Pergi)</span></td>
          <td colspan='3' class='br_right'><span class='ft_10'>Rp. $ongkos ,-</span></td>
          <td colspan='7' class='br_right'><span class='ft_10'>bukti terlampir</span></td>
      ";


    }elseif($data->penginapan>0 AND $status==true){
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>3</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'> Biaya Sewa Penginapan</span></td>
          <td colspan='3' class='br_right'><span class='ft_10'>Rp. $penginapan ,-</span></td>
          <td colspan='7' class='br_right'><span class='ft_10'>bukti terlampir</span></td>
      ";
      $status2 = TRUE;


    }else
    {
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>3</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'></span></td>
          <td colspan='3' class='br_right'><span class='ft_10'></span></td>
          <td colspan='7' class='br_right'><span class='ft_10'></span></td>
      ";
    }
     ?>
  </tr>

      <tr>
  <?php if($data->penginapan>0 AND $status2==FALSE){
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>4</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'> Biaya Sewa Penginapan</span></td>
          <td colspan='3' class='br_right'><span class='ft_10'>Rp. $penginapan ,-</span></td>
          <td colspan='7' class='br_right'><span class='ft_10'>bukti terlampir</span></td>
      ";
    }else
    {
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>4</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'></span></td>
          <td colspan='3' class='br_right'><span class='ft_10'></span></td>
          <td colspan='7' class='br_right'><span class='ft_10'></span></td>
      ";
    }
     ?>
  </tr>

  <tr class="br_top_btm br_left">
    <td height="21" class="br_right br_left">&nbsp;</td>
    <td width="154">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="110" class="ft_10 br_right">Jumlah Semua</td>
    <td colspan="3" class="br_right"><?php echo "Rp. $jumlah ,-" ?></td>
    <td colspan="7" class="br_right">&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="144">&nbsp;</td>
    <td colspan="7" class="ft_10">Sukoharjo, <?php echo dateindo($data->tanggal_surat) ?></td>
    <td class="ft_10">&nbsp;</td>
    <td class="ft_10">&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="4" class="ft_10">Telah dibayarkan uang sejumlah</td>
    <td class="ft_10">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="9" class="ft_10">Telah menerima jumlah uang sebesar :</td>
  </tr>
  <tr>
    <td height="21" class="ft_10">Rp</td>
    <td class="ft_10"><?php echo $jumlah; ?>,-</td>
    <td class="ft_10">&nbsp;</td>
    <td class="ft_10">&nbsp;</td>
    <td class="ft_10">&nbsp;</td>
    <td>&nbsp;</td>
    <td class="ft_10">Rp</td>
    <td class="ft_10">&nbsp;</td>
    <td colspan="4" class="ft_10"><?php echo $jumlah; ?>,-</td>
    <td class="ft_10">&nbsp;</td>
    <td class="ft_10">&nbsp;</td>
    <td class="ft_10">&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="5" class="ft_10"><?php echo ucwords(number_to_words($data->uang_harian+$data->ongkos+$data->penginapan+$data->uang_saku));; ?></td>
    <td>&nbsp;</td>
    <td colspan="9" class="ft_10"><?php echo ucwords(number_to_words($data->uang_harian+$data->ongkos+$data->penginapan+$data->uang_saku));; ?></td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td colspan="4"><div align="center" class="ft_10">Bendahara Pengeluaran Pembantu</div></td>
    <td>&nbsp;</td>
    <td colspan="8"><div align="center" class="ft_10">Yang menerima,</div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td colspan="4" class="ft_10"><div align="center"><u>TRI SULISTYANINGSIH, SP</u></div></td>
    <td>&nbsp;</td>
    <td colspan="8" class="ft_10"><div align="center"><u><?php echo $data->nama_pegawai; ?></u></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td colspan="4" class="ft_10"><div align="center">NIP. 19670310 199903 2 005</div></td>
    <td>&nbsp;</td>
    <td colspan="8" class="ft_10"><div align="center">NIP. <?php echo $data->nip_pegawai; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="15" class="br_top"><div align="center" class="ft_10"><strong><center>PERHITUNGAN SPPD RAMPUNG</center></strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="3" class="ft_10">Ditetapkan sejumlah</td>
    <td height="21" class="ft_10">Rp.</td>
    <td class="ft_10"><?php echo $jumlah; ?>,-</td>
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
    <td height="21" colspan="3" class="ft_10">Yang telah dibayar semula</td>
    <td height="21" class="ft_10">Rp.</td>
    <td class="ft_10"><?php if($dp==0){echo "-";}else {echo $dp;}; ?></td>
    <td>&nbsp;</td>
    <td colspan="9" class="ft_10"><div align="center">PEJABAT PEMBUAT KOMITMEN</div></td>
  </tr>
  <tr>
    <td height="21" colspan="3" class="ft_10">Sisa kurang/lebih</td>
    <td height="21" class="ft_10">Rp.</td>
    <td class="ft_10"><?php echo $kurang ; ?>,-</td>
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
    <td colspan="9" class="ft_10"><div align="center"><u>Ir. NENI ERNAWATI S, MP</u></div></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="9" class="ft_10"><div align="center">NIP. 19620710 199002 2 001</div></td>
  </tr>
</table>


--<br><br>


<table width="749" height="634" style="border-collapse:collapse">
  <tr>
    <td height="13" colspan="15"><span class="ft_8"><strong>DINAS PERTANIAN TANAMAN PANGAN DAN HORTIKULTURA</strong></span></td>
  </tr>
  <tr>
    <td height="14" class="br_bottom" colspan="15"><span class="ft_8"><strong>PROVINSI JAWA TENGAH</strong></span></td>
  </tr>
  <tr>
    <td height="21" colspan="15"><div align="center" class="ft_10"><strong><center>RINCIAN BIAYA PERJALANAN DINAS</center></strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="2" class="ft_10">Lampiran SPPD Nomor</td>
    <td width="8" class="ft_10">&nbsp;</td>
    <td width="27" class="ft_10">:</td>
    <td colspan="2" class="ft_10"><?php echo $this->session->userdata('spd');?></td>
    <td width="19">&nbsp;</td>
    <td width="7">&nbsp;</td>
    <td width="19">&nbsp;</td>
    <td width="52">&nbsp;</td>
    <td width="25">&nbsp;</td>
    <td width="17">&nbsp;</td>
    <td width="31">&nbsp;</td>
    <td width="11">&nbsp;</td>
    <td width="29">&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="2" class="ft_10">Tanggal</td>
    <td class="ft_10">&nbsp;</td>
    <td class="ft_10">:</td>
    <td colspan="2" class="ft_10">12 Februari 2015</td>
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
    <td width="32" height="14" class="br_top_btm br_right br_left"><span class="ft_10"><center>No.</center></span></td>
    <td colspan="4"  class="br_top_btm br_right"><div align="center"><span class="ft_10"><center>Perincian Biaya</center></span></div></td>
    <td colspan="3" class="br_top_btm br_right"><div align="center"><span class="ft_10"><center>Jumlah<c/enter></span></div></td>
    <td colspan="7" class="br_top_btm br_right"><div align="center"><span class="ft_10"><center>Keterangan</center></span></div></td>
  </tr>
  <tr>
    <td height="21" class="br_right br_left"><span class="ft_10"><center>1</center></span></td>
    <td colspan="4" class="br_right"><span class="ft_10"><?php echo "Uang Harian : $jm_hr X Rp.".rupiah($data->gaji_pokok).",-";?> </span></td>
    <td colspan="3" class="br_right"><span class="ft_10">Rp. <?php echo rupiah($data->uang_harian); ?>,-</span></td>
    <td colspan="7" class="br_right"><span class="ft_10"></span></td>
  </tr>
  <tr>
  <?php if($data->uang_saku>0){
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>2</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'> Uang Saku : $hr_ms X Rp. $saku </span></td>
          <td colspan='3' class='br_right'><span class='ft_10'>Rp. $uang_saku ,-</span></td>
          <td colspan='7' class='br_right'><span class='ft_10'></span></td>
      ";


    }else if($data->ongkos>0){
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>2</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'> Ongkos Perjalanan (Pulang-Pergi)</span></td>
          <td colspan='3' class='br_right'><span class='ft_10'>Rp. $ongkos ,-</span></td>
          <td colspan='7' class='br_right'><span class='ft_10'>bukti terlampir</span></td>
      ";
      $status = TRUE;


    }else if($data->penginapan>0){
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>2</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'> Biaya Sewa Penginapan</span></td>
          <td colspan='3' class='br_right'><span class='ft_10'>Rp. $penginapan ,-</span></td>
          <td colspan='7' class='br_right'><span class='ft_10'>bukti terlampir</span></td>
      ";
      $status = TRUE;


    }
    else
    {
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>2</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'></span></td>
          <td colspan='3' class='br_right'><span class='ft_10'></span></td>
          <td colspan='7' class='br_right'><span class='ft_10'></span></td>
      ";
    }


     ?>
  </tr>

    <tr>
  <?php if($data->ongkos>0 AND $status==FALSE){
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>3</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'> Ongkos Perjalanan (Pulang-Pergi)</span></td>
          <td colspan='3' class='br_right'><span class='ft_10'>Rp. $ongkos ,-</span></td>
          <td colspan='7' class='br_right'><span class='ft_10'>bukti terlampir</span></td>
      ";


    }elseif($data->penginapan>0 AND $status==FALSE){
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>3</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'> Biaya Sewa Penginapan</span></td>
          <td colspan='3' class='br_right'><span class='ft_10'>Rp. $penginapan ,-</span></td>
          <td colspan='7' class='br_right'><span class='ft_10'>bukti terlampir</span></td>
      ";
      $status2 = TRUE;


    }else
    {
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>3</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'></span></td>
          <td colspan='3' class='br_right'><span class='ft_10'></span></td>
          <td colspan='7' class='br_right'><span class='ft_10'></span></td>
      ";
    }
     ?>
  </tr>

      <tr>
  <?php if($data->penginapan>0 AND $status2==FALSE){
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>3</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'> Biaya Sewa Penginapan</span></td>
          <td colspan='3' class='br_right'><span class='ft_10'>Rp. $penginapan ,-</span></td>
          <td colspan='7' class='br_right'><span class='ft_10'>bukti terlampir</span></td>
      ";
    }else
    {
      echo "
          <td height='21' class='br_right br_left'><span class='ft_10'><center>4</center></span></td>
          <td colspan='4' class='br_right'><span class='ft_10'></span></td>
          <td colspan='3' class='br_right'><span class='ft_10'></span></td>
          <td colspan='7' class='br_right'><span class='ft_10'></span></td>
      ";
    }
     ?>
  </tr>

  <tr class="br_top_btm br_left">
    <td height="21" class="br_right br_left">&nbsp;</td>
    <td width="154">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="110" class="ft_10 br_right">Jumlah Semua</td>
    <td colspan="3" class="br_right"><?php echo "Rp. $jumlah ,-" ?></td>
    <td colspan="7" class="br_right">&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="144">&nbsp;</td>
    <td colspan="7" class="ft_10">Sukoharjo, <?php echo dateindo($data->tanggal_surat) ?></td>
    <td class="ft_10">&nbsp;</td>
    <td class="ft_10">&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="4" class="ft_10">Telah dibayarkan uang sejumlah</td>
    <td class="ft_10">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="9" class="ft_10">Telah menerima jumlah uang sebesar :</td>
  </tr>
  <tr>
    <td height="21" class="ft_10">Rp</td>
    <td class="ft_10"><?php echo $jumlah; ?>,-</td>
    <td class="ft_10">&nbsp;</td>
    <td class="ft_10">&nbsp;</td>
    <td class="ft_10">&nbsp;</td>
    <td>&nbsp;</td>
    <td class="ft_10">Rp</td>
    <td class="ft_10">&nbsp;</td>
    <td colspan="4" class="ft_10"><?php echo $jumlah; ?>,-</td>
    <td class="ft_10">&nbsp;</td>
    <td class="ft_10">&nbsp;</td>
    <td class="ft_10">&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="5" class="ft_10"><?php echo ucwords(number_to_words($data->uang_harian+$data->ongkos+$data->penginapan+$data->uang_saku));; ?></td>
    <td>&nbsp;</td>
    <td colspan="9" class="ft_10"><?php echo ucwords(number_to_words($data->uang_harian+$data->ongkos+$data->penginapan+$data->uang_saku));; ?></td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td colspan="4"><div align="center" class="ft_10">Bendahara Pengeluaran Pembantu</div></td>
    <td>&nbsp;</td>
    <td colspan="8"><div align="center" class="ft_10">Yang menerima,</div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td colspan="4" class="ft_10"><div align="center"><u>TRI SULISTYANINGSIH, SP</u></div></td>
    <td>&nbsp;</td>
    <td colspan="8" class="ft_10"><div align="center"><u><?php echo $data->nama_pegawai; ?></u></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td colspan="4" class="ft_10"><div align="center">NIP. 19670310 199903 2 005</div></td>
    <td>&nbsp;</td>
    <td colspan="8" class="ft_10"><div align="center">NIP. <?php echo $data->nip_pegawai; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="15" class="br_top"><div align="center" class="ft_10"><strong><center>PERHITUNGAN SPPD RAMPUNG</center></strong></div></td>
  </tr>
  <tr>
    <td height="21" colspan="3" class="ft_10">Ditetapkan sejumlah</td>
    <td height="21" class="ft_10">Rp.</td>
    <td class="ft_10"><?php echo $jumlah; ?>,-</td>
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
    <td height="21" colspan="3" class="ft_10">Yang telah dibayar semula</td>
    <td height="21" class="ft_10">Rp.</td>
    <td class="ft_10"><?php if($dp==0){echo "-";}else {echo $dp;}; ?></td>
    <td>&nbsp;</td>
    <td colspan="9" class="ft_10"><div align="center">PEJABAT PEMBUAT KOMITMEN</div></td>
  </tr>
  <tr>
    <td height="21" colspan="3" class="ft_10">Sisa kurang/lebih</td>
    <td height="21" class="ft_10">Rp.</td>
    <td class="ft_10"><?php echo $kurang ; ?>,-</td>
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
    <td colspan="9" class="ft_10"><div align="center"><u>Ir. NENI ERNAWATI S, MP</u></div></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="9" class="ft_10"><div align="center">NIP. 19620710 199002 2 001</div></td>
  </tr>
</table>

        
</body>
</html>
