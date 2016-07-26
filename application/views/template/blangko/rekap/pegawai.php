<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <center>
  <br><br>
  <div align="center"><strong>
  Rekap Monitoring Anggaran Dana Belanja Perjalanan Biasa<br>
  (524111,524114,524119)<br>
  Balai Pengawasan dan Sertifikasi Jawa Tengah
  </strong></div>
  <br><hr><br><br>

  <i>Rekap Data berdasarkan Pegawai per tanggal <?php echo dateindo(date('Y-m-d'));?>
  <br>generate by : E-SPJ BPSB Jateng
  </i>
  <br><br>
    <table cellspacing="0" cellpadding="5" width="749" height="1178" border="1">
                <thead>
                    <tr>
                      <th class="sorting">#</th>
                      <th class="sorting">NIP</th>
                      <th class="sorting">Nama Pegawai</th>
                      <th class="sorting">Banyak Perjalanan</th>
                      <th class="sorting">Total Penggunaan</th>
                    </tr>

                  </thead>
                    <tbody>

                    <?php 
                      $i=0+1;
                      foreach($pegawai as $data){ 
                          $uanga  = 0;
                             $dana = $this->rekap->hitung_anggaran_pegawai($data->id_pegawai);
                             $jml = $this->rekap->count($data->id_pegawai); 
                             foreach ($dana as $value) {
                                  $uang = $value->uang_harian+$value->ongkos+$value->penginapan+$value->uang_saku;
                                  $uanga = $uanga+$uang;
                                }   
                    ?>

                  <tr>
                      <td><?php echo $i++ ?></td>
                      <td><?php echo $data->nip_pegawai; ?></td>
                      <td><?php echo $data->nama_pegawai; ?></td>
                      <td><?php echo $jml->jml." Kali"; ?></td>
                      <td><?php echo "Rp. ".rupiah($uanga).",-"; ?></td>
                    </tr>
    
      <?php } ?>

                  </tbody>
                  </table>
                  </center>

</body>
</html>