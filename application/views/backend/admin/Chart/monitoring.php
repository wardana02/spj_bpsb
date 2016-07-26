 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Monitoring Data Anggaran Perjalanan BPSB Berdasarkan Pegawai
            <small>Berdasarkan Tahun Anggaran 2015</small>
          </h1>
      
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Grafik Monitoring Pegawai BPSB Jawa Tengah</h3>
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
                     <a href=<?php echo site_url('rekap/by_pegawai/'.$x); ?> class='btn btn-dropbox'> <?php echo "$i";?></a>
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
                      <th class="sorting">Total Pemakaian</th>
                    </tr>
                  </thead>
                    <tbody>
                    <?php 
                      $i=0+1;
                      foreach($pegawailimit as $data){ 
                          $uanga  = 0;
                             $dana = $this->rekap->hitung_anggaran_pegawai($data->id_pegawai);
                             foreach ($dana as $value) {
                                  $uang = $value->uang_harian+$value->ongkos+$value->penginapan+$value->uang_saku;
                                  $uanga = $uanga+$uang;
                                }
                                $uangb = $uanga/1000000;   
                    ?>
                  <tr>
                      <th><?php echo $data->nama_pegawai; ?></th>
                      <td><?php echo $uangb ?></td>
                  </tr>
    
                    <?php } ?>
                  </tbody>
                  </table>

        <br><br>
                      <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Monitoring Anggaran Berdasarkan Pegawai Yang Masuk</h3>
                </div><!-- /.box-header -->

                <div class="box">
                <div class="box-header">
                  <p>
                    Tabel Monitoring anggaran ini, dikelompokan berdasarkan Anggaran yang ada per Komponen kegiatan.
                    Dibandingkan dengan jumlah pegawai event perjalanan yang menggunakan anggaran dana komponen kegiatan tersebut.

                  </p>

                  <a href=<?php echo site_url('cetak/download/1'); ?> target="_blank"
                  class="btn btn-dropbox">
                    <i class="glyphicon glyphicon-cloud-download"></i> <br>Download to PDF<br>
                  </a>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
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