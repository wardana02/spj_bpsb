      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Surat Tugas <br> Dibuat oleh <?php echo $nama_user ; ?>
            <small>Surat Tugas BPSB 2015 </small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <br><br>

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Surat Tugas</h3>
                </div><!-- /.box-header -->

                 <?php 
                  $pesan_sks = $this->session->flashdata('pesan_sks');
                  $pesan_ggl = $this->session->flashdata('pesan_ggl');
                ?>
                <?php if (! empty($pesan_sks)) : ?>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Berhasil!</h4>
                    <?php echo $pesan_sks ;?>
                  </div>
                <?php endif ?>

                <?php if (! empty($pesan_ggl)) : ?>
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Peringatan!</h4>
                    <?php echo $pesan_ggl ;?>
                  </div>
                <?php endif ?>

                <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> 
                    <a href=<?=base_url('s_tugas/add');?> class="btn btn-success">
                        <i class="fa fa-edit"></i>
                    Tambah Surat Tugas Baru</a>
                  </h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="sorting">#</th>
                      <th class="sorting">Nomor Surat</th>
                      <th class="sorting">Tanggal Surat</th>
                      <th class="sorting">Jumlah Orang</th>
                      <th class="sorting">Status SPJ</th>
                      <th class="sorting">Kode</th>
                      <th class="sorting">Akun</th>
                      <th class="sorting">Perihal</th>
                      <th class="sorting">Opsi</th>
                      <th class="sorting">Print</th>
                    </tr>

                  </thead>
                    <tbody>


                    <?php 
                      $i=0+1;

                      foreach($data as $data){

                        //membuat kode surat tugas
                        $tgl    = explode('-', $data->tanggal_surat);
                        //menggunakan helper
                        $kd_bln   = romawi($tgl[1]);


                         $kd = $this->pengguna->edit($data->by_);
                         $no_surat = tost($data->tanggal_surat,$kd_bln,$data->nomor_surat,$kd->wilayah);

                        //gabungkan rangka&komo kegiatan
                        $perihal  = $data->judul_rangka." pada ".$data->judul_komp_keg;

                        //menghitung jumlah pegawai tugas
                          $jml_org = $this->relasi_2->get_pegawai_data($data->id_surat);
                          foreach ($jml_org as $key) {
                            //echo  $data->id_surat;
                          }
                        //menghitung pegawai kurang SPJ
                          $kurang = count($this->spj->get_pegawai_data($data->id_surat));

                          //mendapatkan kode kegiatan
                          $kode = $this->komponen->get_kode($data->id_komp_keg);
                           

                    ?>

                  <tr>
                      <td><?php echo $i++ ?></td>
                      <td><?php echo $no_surat; ?></td>
                      <td><?php echo dateindo($data->tanggal_surat); ?></td>
                      <td><?php echo $key->jml; ?></td>
                      <td>
                        <?php 
                        if($kurang>0)
                          echo "<span class='label label-warning'>Kurang ".$kurang." Orang</span>";
                        else {
                          echo "<span class='label label-success'>Lengkap</span>";
                        } 

                        ?>
                      </td>
                      <td><?php echo $data->kode_perjalanan; ?></td>
                      <td><?php echo $kode->kode; ?></td>
                      <td><?php echo $perihal; ?></td>
                      <td>
                        <div class="btn-group">
            
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>Aksi
                      </button>

                      <ul class="dropdown-menu" role="menu">
                        <li><a href=<?php echo site_url('s_tugas/edit/'.$data->id_surat); ?>>Edit</a></li>
                        <li><a id="simpleConfirm" href=<?php echo site_url('s_tugas/delete/'.$data->id_surat); ?>>Hapus Data</a></li>
                        <li><a href=<?php echo site_url('s_tugas/add_pegawai/'.$data->id_surat); ?>>Tambah Penugasan</a></li>
                        <li class="divider"></li>
                        <li><a href=<?php echo site_url('spj/add/'.$data->id_surat); ?> 
                        >Buat SPJ</a></li>
                      </ul>
                    </div>
                      </td>

                      <td>
                        <div class='btn-group'>    
                            
                            <a href=<?php echo site_url('cetak/index/'.$data->id_surat); ?> target="_blank" class='btn btn-primary'
                                <?php if($kurang==$key->jml) echo "disabled"; ?>
                            > <i class="fa fa-anchor"></i> Cetak</a>
                            
                        </div>
                           
                      </td>

                    </tr>
    
      <?php } ?>

                  </tbody>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


    </div><!-- ./wrapper -->
                                     