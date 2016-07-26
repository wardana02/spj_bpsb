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

  <i>Rekap Data berdasarkan Anggaran per tanggal <?php echo dateindo(date('Y-m-d'));?>
  <br>generate by : E-SPJ BPSB Jateng</i>
  <br><br>

      <table cellspacing="0" cellpadding="5" width="749" border="1">
                  <thead>
                    <tr>
                      <th bgcolor="blue" class="sorting">#</th>
                      <th class="sorting">Kode</th>
                      <th class="sorting">Besar Anggaran Kegiatan</th>
                      <th class="sorting">Total Penggunaan</th>
                    </tr>

                  </thead>

                  <tbody>
                    <?php 
                    $i = 0;
                    foreach ($kode as $kode) {
                      $i++;
                      $dana = $kode->anggaran_komp_keg/1000000;
                       $angka = $this->rekap->hitung_anggaran_by_id($kode->id_komp_keg);
                       $hasila = 0;
                       foreach ($angka as $angka) {
                          $hasil = $angka->uang_harian+$angka->ongkos+$angka->penginapan+$angka->uang_saku;
                          $hasila = $hasil+$hasila;
                       }
                          

                      $digunakan = $hasila/1000000;
                      if($hasila==0){$digunakan=0;}
                      $angg = rupiah($kode->anggaran_komp_keg);
                      $hasila = rupiah($hasila);
                          echo "
                          <tr>
                            <td>$i</td>
                            <th>$kode->kode</th>
                            <td>Rp. $angg ,-</td>
                            <td>Rp. $hasila ,-</td>
                          </tr>
                          ";
                      }?>
    
                  </tbody>
                  </table>
                  </center>
 </body>
</html>