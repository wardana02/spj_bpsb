<?php 

  /*
  *
  * Penggunaan Helper dapat dilakukan pada view
  */

    //memecah tanggal surat berdasarkan "-""
    $tgl    = explode('-', $data->tanggal_surat);
                        //konversi romawi dengan helper berupa nilai bulan
                        $kd_bln = romawi($tgl[1]);

    //ambil wilayah pembuat surat
    $kd = $this->pengguna->edit($data->by_);

    //helper untuk generate kode surat tugas dan kode SPD
    $no_st  = tost($data->tanggal_surat,$kd_bln,$data->nomor_surat,$kd->wilayah);
    $no_spd = tospd($data->tanggal_surat,$kd_bln,$data->no_surat,$kd->wilayah);

    // didaftarkan nomor surat tugas dan SPD pada session
    $this->session->set_userdata('st', $no_st);
    $this->session->set_userdata('spd', $no_spd);

     //menghitung pegawai kurang SPJ
     $kurang = count($this->spj->get_pegawai_data($data->id_surat))
  
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cetak SPJ by <?php echo $nama_user ;?>
            <small>Surat Perjalanan Dinas BPSB Tahun 2015 </small>
          </h1>
          <br>
          <div class="callout callout-info">
                    <h2>Info!!</h2>
                    <p>Tentang : <?php echo $data->judul_rangka." pada ".$data->judul_komp_keg; ?></p>
                    <p>Nomor Surat Tugas : <?php echo $no_st; ?></p>
                    <p>Jumlah Orang : <?php echo count($option)." (".hitung(count($option)).") Orang"; ?></p>
                    <p>Nomor SPD         : <?php echo $no_spd; ?></p>
                    <p>Tanggal         : <?php echo dateindo($data->tanggal_surat); ?></p>
          </div>
          

        </section>

        <!-- Main content -->
        <section class="content">
          <br><br>

               <div class="col-sm-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-header">
                        Terjadi Kesalahan Data?
                    </h3>
                    <p>Apabila terjadi kesalahan dalam data SPJ, Maka anda diizinjan untuk mengedit lewat tombol
                    dibawah ini, dengan memilih SPJ Dari pegawai yang dipilih.</p>
                    <p>Ingat, Hati-hati dalam mengisi, karena anda akan sia-sia apabila mengulang pekerjaan dua kali :)</p>

                      <div class="btn-group">
                      <button type="button" class="btn btn-large btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>Edit SPJ, Pilih Pegawai
                      </button>

                      <ul class="dropdown-menu" role="menu">
                      <?php 
                        foreach ($option as $val) {
                      ?>
                          <li><a href=<?php echo site_url('spj/edit/'.$val->id_spj."/".$val->id_relasi2); ?> target="_blank"><?php echo $val->nama_pegawai; ?></a></li> 
                      <?php
                        }
                      ?>
                        
                      </ul>                
                  </div>

                  <div class='btn-group'>   

                            <a href=<?php echo site_url('spj/add/'.$val->id_surat); ?> class='btn btn-success' 
                              <?php if ($kurang==0) echo "disabled"; ?>
                            > <i class="fa fa-files-o"></i> Tambah SPJ Baru</a>
                  </div>

                  </div>
                </div>
              </div>


                             <div class="col-sm-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-header">
                        Lampiran Bukti Scan Pada SPJ
                    </h3>
                    <p> Bukti Scan Tiket Transportasi yang telah anda upload akan kami simpan, dan anda bisa mengunduhnya
                    kapan saja sebagai bukti yang sah pada SPJ ini.</p>
                    <p>Ingat, Pergunakan data ini dengan baik :)</p>


                    <?php 
                    if ($data_foto!=NULL) {
                    foreach ($data_foto as $key) { ?>

                    <div class="col-sm-4" id="gallery">
                      <a href=<?=base_url('assets/img/uploads/'.$key->nama_file);?> title="Bukti Scan Tiket Transportasi.">
                        <img src=<?=base_url('assets/img/uploads/'.$key->nama_file);?> height='120' width='260' alt="Bukti Scan Tiket Transportasi" />
                      </a>
                    </div>

                    <?php }
                    }else {
                      echo "<h4>Tidak Ada Lampiran Scan Pada SPJ ini</h4>";
                      } ?>

                  </div>
                </div>
              </div>


            <div class="col-sm-4">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Cetak Surat Tugas</h3>
                  <br><br>
                  <div class='btn-group'>    
                            <a href=<?php echo site_url('cetak/download/st/'.$data->id_surat); ?> target="_blank" class='btn btn-success'> <i class="fa fa-anchor"></i> Cetak</a>
                        </div>
                </div><!-- /.box-header -->

                <div class="box-body">
                   <p>Data Surat Tugas Bersifat Tunggal, Sistem Akan melakukan proses Generate otomatis 
                   sesuai dengan data surat tugas yang anda pilih,.</p>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div>


              <div class="col-sm-4">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Cetak SPD Depan</h3>
                  <br><br>
                  <div class="btn-group">
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>Pilih Pegawai
                      </button>

                      <ul class="dropdown-menu" role="menu">
                      <?php 
                        foreach ($option as $value) {
                      ?>
                          <li><a href=<?php echo site_url('cetak/download/spd_dpn/'.$value->id_relasi2); ?> target="_blank"><?php echo $value->nama_pegawai; ?></a></li> 
                      <?php
                        }
                      ?>
                        
                      </ul>                
                  </div>
                  
                </div><!-- /.box-header -->

                <div class="box-body">
                   <p>Cetak SPD Akan muncul setelah anda mengisi data SPJ, Pastikan Anda Mencetak SPD DEPAN dengan SPD belakang dalam
                  lembar yang sama.
                  </p>
                  <p>
                    Apabila Tombol Cetak tidak muncul, silahkan lengkapi dulu pembuat SPJ dengan jumlah orang dalam surat tugas.
                  </p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div>


              <div class="col-sm-4">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Cetak SPD Belakang</h3>
                  <br><br>
                  <div class="btn-group">
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>Pilih Pegawai
                      </button>

                      <ul class="dropdown-menu" role="menu">
                      <?php 
                        foreach ($option as $value) {
                      ?>
                          <li><a href=<?php echo site_url('cetak/download/spd_blk/'.$value->id_relasi2); ?> target="_blank"><?php echo $value->nama_pegawai; ?></a></li> 
                      <?php
                        }
                      ?>
                        
                      </ul>
                </div>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <p>Cetak SPD Akan muncul setelah anda mengisi data SPJ, Pastikan Anda Mencetak SPD DEPAN dengan SPD belakang dalam
                  lembar yang sama.
                  </p>
                  <p>
                    Apabila Tombol Cetak tidak muncul, silahkan lengkapi dulu pembuat SPJ dengan jumlah orang dalam surat tugas.
                  </p>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div>


              <div class="col-sm-4">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Cetak Kuitansi</h3>
                  <br><br>
                  <div class="btn-group">
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>Pilih Pegawai
                      </button>

                      <ul class="dropdown-menu" role="menu">
                      <?php 
                        foreach ($option as $value) {
                      ?>
                          <li><a href=<?php echo site_url('cetak/download/kuitansi/'.$value->id_relasi2); ?> target="_blank"><?php echo $value->nama_pegawai; ?></a></li> 
                      <?php
                        }
                      ?>
                        
                      </ul>
                </div>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <p>Cetak Kuitansi Akan muncul setelah anda mengisi data SPJ, Data Kuitansi ini bersifat individu
                  sesuai dengan jumlah orang yang bertugas dalam satu SURAT TUGAS.
                  </p>
                  <p>
                    Apabila Tombol Cetak tidak muncul, silahkan lengkapi dulu pembuat SPJ dengan jumlah orang dalam surat tugas.
                  </p>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div>

              <div class="col-sm-4">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Cetak Rincian Biaya></h3>
                  <br><br>
                  <div class="btn-group">
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>Pilih Pegawai
                      </button>

                      <ul class="dropdown-menu" role="menu">
                      <?php 
                        foreach ($option as $value) {
                      ?>
                          <li><a href=<?php echo site_url('cetak/download/rincian/'.$value->id_relasi2); ?> target="_blank"><?php echo $value->nama_pegawai; ?></a></li> 
                      <?php
                        }
                      ?>
                        
                      </ul>
                </div>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <p>Cetak Rincihan Biaya Akan muncul setelah anda mengisi data SPJ, Data Rincihan Biaya ini bersifat individu
                  sesuai dengan jumlah orang yang bertugas dalam satu SURAT TUGAS.
                  </p>
                  <p>
                    Apabila Tombol Cetak tidak muncul, silahkan lengkapi dulu pembuat SPJ dengan jumlah orang dalam surat tugas.
                  </p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div>

              <div class="col-sm-4">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Download Lampiran Laporan</h3>
                  <br><br>
                  <div class='btn-group'>    
                            <a href=<?php echo site_url('cetak/download/lp') ?> target="_blank" class='btn btn-success'> <i class="fa fa-anchor"></i> Lampiran Laporan</a>
                        </div>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <p>Data Laporan Bersifat Tunggal per Surat Tugas.</p>
                  <p>
                   Sistem hanya menyediakan form laporan perjalanan kosong. Silahkan download kemudian isi sesuai hasil perjalanan.
                  </p>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


    </div><!-- ./wrapper -->
                                     