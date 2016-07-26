      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Surat Perjalanan Dinas Created by <?php echo $nama_user ;?>
            <small>Surat Perjalanan Dinas BPSB Tahun 2015 </small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <br><br>

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data SPJ Telah Dibuat</h3>
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

            

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="sorting">#</th>
                      <th class="sorting">No.Surat Tugas</th>
                      <th class="sorting">No. SPD</th>
                      <th class="sorting">Nama Pegawai</th>
                      <th class="sorting">Kode</th>
                      <th class="sorting">Budget</th>
                      <th class="sorting">Menemui / Inst</th>
                      <th class="sorting">Opsi</th>
                    </tr>

                  </thead>
                    <tbody>

                    <?php 
                    
                      $i=0+1;
                      foreach($data as $data){
                        $budget = $data->uang_harian+$data->ongkos+$data->penginapan+$data->uang_saku;
                        
                        $tgl    = explode('-', $data->tanggal_surat);
                        $kd_bln = romawi($tgl[1]);
                        $kd = $this->pengguna->edit($data->by_);
                        $no_st  = tost($data->tanggal_surat,$kd_bln,$data->nomor_surat,$kd->wilayah);
                        $no_spd = tospd($data->tanggal_surat,$kd_bln,$data->no_surat,$kd->wilayah);

                        //MENDAPATKAN kode kegiatan
                        $kode = $this->komponen->get_kode($data->id_komp_keg);  
                        

                    ?>

                  <tr>
                      <td><?php echo $i++ ?></td>
                      <td><?php echo $no_st; ?></td>
                      <td><?php echo $no_spd; ?></td>
                      <td><?php echo $data->nama_pegawai; ?></td>
                      <td><?php echo $kode->kode; ?></td>
                      <td><?php echo "Rp ".rupiah($budget).",-"; ?></td>
                      <td><?php echo $data->tujuan; ?></td>
                      <td>
                      <div class="btn-group">
            
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>Aksi
                      </button>

                      <ul class="dropdown-menu" role="menu">
                        <li><a href=<?php echo site_url('spj/edit/'.$data->id_spj."/".$data->id_surat."/".$data->id_relasi2); ?>>Edit</a></li>
                        <li><a id="simpleConfirm" href=<?php echo site_url('spj/run_delete/'.$data->id_spj); ?>>Hapus</a></li>
                        </ul>
                    </div>
                    </td>
                      
                    </tr>
    
      <?php } ?>

                  </tbody>
                </div><!-- ucwords(number_to_words("87,5"));
/.box-body -->
              </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


    </div><!-- ./wrapper -->
