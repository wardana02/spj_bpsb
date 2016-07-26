      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Tahun Anggaran Aplikasi Aktif : <?php echo $this->session->userdata('tahun');?>
            <small>Ubah Data Tahun Anggaran Sesuai Dengan Aslinya</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <br><br>

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Tahun Anggaran Aplikasi SPJ BPSB 2015</h3>
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
                <br/>
                <form class="form-horizontal" action="<?php echo base_url("tahun/run_save");?>" method="post" enctype="multipart/form-data">
                    <div class="col-sm-8">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Tahun</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="4" name="judul_tahun" class="form-control" value=''>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-success"><i class="glyphicon glyphicon-hdd"></i> Tambahkan Tahun</button>
                    </div>
                </form>

                <div class="box-header">
                  
                </div><!-- /.box-header -->

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="sorting">#</th>
                      <th class="sorting">Tahun</th>
                      <th class="sorting">Status</th>
                      <th class="sorting">Opsi</th>
                    </tr>

                  </thead>
                    <tbody>

                    <?php 
                      $i=0+1;
                      foreach($data as $data){   
                        if($data->status=='active'){
                    ?>

                  <tr>
                      <td><span class="label label-success"><?php echo $i++ ?></span></td>
                      <td><span class="label label-success"><?php echo $data->judul_tahun; ?></span></td>
                      <td><span class="label label-success"><?php echo $data->status; ?></span></td>
                      
                      <?php } else {?>
                      <td><?php echo $i++ ?></td>
                      <td><?php echo $data->judul_tahun; ?></td>
                      <td><?php echo $data->status; ?></td>
                      <?php } ?>
                      <td>
                        <div class='btn-group'>    
                            <a href=<?php echo site_url('tahun/edit/'.$data->id_tahun); ?> class='btn btn-primary'> Aktifkan</a>
                            <a id="simpleConfirm" href=<?php echo site_url('tahun/run_delete/'.$data->id_tahun); ?> class='btn btn-warning'
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
                                     