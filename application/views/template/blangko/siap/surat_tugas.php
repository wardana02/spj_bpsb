<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>-</title>
  <link href=<?=base_url("assets/mpdf_css/mpdfstyletables.css");?> rel="stylesheet" type="text/css" />
</head>

<body class="ft_splh">
<table width="579">
  <tr>
    <td width="571"> 
	<img src=<?=base_url('assets/img/kop_st.PNG');?> width="566"/>
	</td>
	
  </tr>
  <tr>
    <td><div align="center"><center>Nomor : <?php   
    echo $this->session->userdata('st'); ?></center></div></td>
  </tr>
    
    
  <tr>
    <td height="82"><div class="S"><justify>Kepala Dinas Pertanian Tanaman Pangan dan Hortikultura Provinsi Jawa Tengah, selaku Pengguna
      Anggaran Satuan kerja, berdasarkan Keputusan Menteri Keuangan Republik Indonesia Nomor:
      190/PMK.05/2012,tgl 29-11-2012,Permentan No.19/Permentan.ot/140/3/2013, tgl. Maret 2013
    dan Perdirjen Perbendaharaan No. Per 22/PB/2013 tgl. 30-05-2013 dengan ini : </justify></div></td>
  </tr>
    
    <tr>
    <td height="36"><div align="center"><strong><center>MENUGASKAN :  </center></strong></div></td>
    </tr>
    
    <tr>
    <td><div align="center"><strong></strong></div></td>
    </tr>
</table>

<table width="569">
<?php
  $i=0+1; 
  foreach ($pegawai as $value) {
    if($i==1){
      echo "  <tr> <td width='82'>Kepada : </td>";
    }
    else {
       echo "  <tr> <td width='82'></td>";
    }
?>
    <td width="26"><?php echo $i++.". "; ?> </td>
    <td width="439"><?php echo $value->nama_pegawai." / ".$value->jabatan." BPSB Jawa Tengah"; ?></td>
  </tr>

<?php 
  }
?>
  <tr> 
    <td width='82'></td>
    <td width="26"></td>
    <td width="439"></td>
  </tr>

  
  <tr>
    <td height="21">Untuk :</td>
    <td>1. </td>
    <td rowspan="2" class="fomtsplh">
    <?php 
      echo "Melaksanakan perjalanan dinas dari ".$tugas->dari." ke ".$tugas->ke
      ." pada tanggal ".dateindo($tugas->tgl_berangkat)." s/d ".dateindo($tugas->tgl_tiba)
      ." dalam rangka ".$tugas->judul_rangka." pada ".$tugas->judul_komp_keg.". ";
    ?>
    </td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="21">&nbsp;</td>
    <td>2. </td>
    <td>Melaporkan hasilnya kepada pemberi tugas</td>
  </tr>
</table>

<table width="569">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="168"><div align="right">Dikeluarkan di : </div></td>
    <td width="296">Sukoharjo</td>
  </tr>
  
  <tr>
    <td width="83">&nbsp;</td>
    <td><div align="right">Pada tanggal : </div></td>
    <td><?php echo dateindo($tugas->tanggal_surat); ?></td>
  </tr>
</table>

<table width="570">
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="59">&nbsp;</td>
    <td width="59">&nbsp;</td>
    <td width="430"><center>An. KEPALA DINAS PERTANIAN TANAMAN PANGAN</center></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><center>DAN HORTIKULTURA PROVINSI JAWA TENGAH</center></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><center>Kepala BPSB, <center></td>
  </tr>
  <tr>
    <td height="61">&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><center><u>Ir. NENI ERNAWATI S, MP</u></center></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><center><center>NIP. 19620710 199002 2 001<center></td>
  </tr>
</table>




    
 
</body>
</html>
