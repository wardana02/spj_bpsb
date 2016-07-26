 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Monitoring Data Anggaran Perjalanan BPSB Berdasarkan Komponen
            <small>Berdasarkan Tahun Anggaran 2015</small>
          </h1>
      
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Grafik Monitoring Anggaran BPSB Jawa Tengah</h3>
            </div>
            <div class="box-body">
              Grafik Ditampilkan Per Sepuluh (10) Kolom, Untuk Data Selanjutnya Silahkan Pilih Pada Tombol Dibawah
              <br><br>
              <?php
                
                $a = ($count->hasil/10);
                $b = ceil($a);
                
                for ($i=1; $i <= $b; $i++) { 
                  if($i==1){$x=1;}
                    else{
                      $x = ($i-1)*10;
                    }
              ?>
                     <a href=<?php echo site_url('rekap/by_anggaran/'.$x); ?> class='btn btn-dropbox'> <?php echo "$i";?></a>
              <?php      
                  
                }
              ?>
                
              <br><br>
            </div>

           

 <div id="adah_chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        </div>


 <table id="datatable" class="table table-bordered table-striped" hidden>
                  <thead>
                    <tr> 
                      <th class="sorting">#</th>
                      <th class="sorting">Dana Dianggarkan</th>
                      <th class="sorting">Total Terpakai</th>
                    </tr>
                  </thead>
                    <tbody>
                    <?php foreach ($kodelimit as $data) {
                      $dana = $data->anggaran_komp_keg/1000000;
                       $angka = $this->rekap->hitung_anggaran_by_id($data->id_komp_keg);
                       $hasila = 0;
                       foreach ($angka as $angka) {
                          $hasil = $angka->uang_harian+$angka->ongkos+$angka->penginapan+$angka->uang_saku;
                          $hasila = $hasil+$hasila;
                       }
                      $digunakan = $hasila/1000000;
                      if($hasila==0){$digunakan=0;}
                          echo "
                          <tr>
                            <th>$data->kode</th>
                            <td>$dana</td>
                            <td> $digunakan</td>
                          </tr>
                          ";
                      }?>
                  </tbody>
                  </table>


        <br><br>
                      <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Monitoring Anggaran Berdasarkan Komponen Kegiatan</h3>
                </div><!-- /.box-header -->

                <div class="box">
                <div class="box-header">
                  <p>
                    Tabel Monitoring anggaran ini, dikelompokan berdasarkan Anggaran yang ada per Komponen kegiatan.
                    Dibandingkan dengan jumlah pegawai event perjalanan yang menggunakan anggaran dana komponen kegiatan tersebut.

                  </p>

                  <a href=<?php echo site_url('cetak/download/2'); ?> target="_blank"
                  class="btn btn-dropbox">
                    <i class="glyphicon glyphicon-cloud-download"></i> <br>Download to PDF<br>
                  </a>


                </div><!-- /.box-header -->

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="sorting">#</th>
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
                  <br>
                  <i class="pull-left">Sumber : Database E-SPJ Berdasarkan Data Tersimpan</i>
                <i class="pull-right">Satuan : Orang</i> 
                <br>
                <br> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
      </div>




        </section><!-- /.content -->
</div><!-- /.content-wrapper -->