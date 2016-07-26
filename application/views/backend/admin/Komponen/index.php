      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Komponen Kegiatan
            <small>Data Komponen Kegiatan BPSB 2015 </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <br><br>

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Komponen Kegiatan Perjalanan BPSB Jawa Tengah</h3>
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
                    <a href=<?=base_url('Komponen/add');?> class="btn btn-success">
                        <i class="fa fa-edit"></i>
                    Tambah Komponen Kegiatan Perjalanan</a>
                  </h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="sorting">#</th>
                      <th class="sorting">Kode</th>
                      <th class="sorting">Komponen Kegiatan</th>
                      <th class="sorting">Ass Belanja</th>
                      <th class="sorting">Ass Kegiatan</th>
                      <th class="sorting">Tahun</th>
                      <th class="sorting">Anggaran</th>
                      <th class="sorting">Opsi</th>
                    </tr>

                  </thead>
                    <tbody>

                    <?php 
                      $i=0+1;
                      foreach($data as $data){     
                    ?>

                  <tr>
                      <td><?php echo $i++ ?></td>
                      <td><?php echo $data->kode; ?></td>
                      <td><?php echo $data->judul_komp_keg; ?></td>
                      <td><?php echo $data->judul_ass_belanja; ?></td>
                      <td><?php echo $data->judul_ass_kegiatan; ?></td>
                      <td><?php echo $data->th_angg_komp; ?></td>
                      <td><?php echo "Rp ".rupiah($data->anggaran_komp_keg).",-"; ?></td>
                      <td>
                        <div class='btn-group'>    
                            <a href=<?php echo site_url('Komponen/edit/'.$data->id_komp_keg); ?> class='btn btn-primary'> Edit</a>
                            <a id="simpleConfirm" href=<?php echo site_url('Komponen/run_delete/'.$data->id_komp_keg); ?> class='btn btn-warning'
                            onclick="return confirm("Yakin Hapus Pengguna = ")"> Delete</a>    
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
                                     