      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kerangka Agenda Perjalanan BPSB
            <small>Data Rangka Perjalanan BPSB Tahun </small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <br><br>

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Rangka Kegiatan Perjalanan BPSB Jawa Tengah</h3>
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
                    <a href=<?=base_url('Rangka/add');?> class="btn btn-success">
                        <i class="fa fa-edit"></i>
                    Tambah Rangka Perjalanan</a>
                  </h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="sorting">#</th>
                      <th class="sorting">Register</th>
                      <th class="sorting">Judul Rangka Kegiatan</th>
                      <th class="sorting">Jenis Perjalanan</th>
                      <th class="sorting">Tahun Anggaran</th>
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
                      <td><span class="label label-success"><?php echo $data->id_rangka; ?></span></td>
                      <td><?php echo $data->judul_rangka; ?></td>
                      <td><?php echo $data->perjalanan; ?></td>
                      <td><?php echo $data->tahun_anggaran; ?></td>
                      <td>
                        <div class='btn-group'>    
                            <a href=<?php echo site_url('Rangka/edit/'.$data->id_rangka); ?> class='btn btn-primary'> Edit</a>
                            <a id="simpleConfirm" href=<?php echo site_url('Rangka/run_delete/'.$data->id_rangka); ?> class='btn btn-warning'
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
                                     