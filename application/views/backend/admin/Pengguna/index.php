      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Pengguna Aplikasi SPJ BPSB
            <small>Pengguna Aplikasi Yang Diizinkan</small>
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
                  <h3 class="box-title">Data Pengguna Aplikasi SPJ BPSB 2015</h3>
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
                    <a href=<?=base_url('Pengguna/add');?> class="btn btn-success">
                        <i class="fa fa-edit"></i>
                    Tambah Data Pengguna E-SPJ</a>
                  </h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="sorting">#</th>
                      <th class="sorting">Username</th>
                      <th class="sorting">Nama User</th>
                      <th class="sorting">Status</th>
                      <th class="sorting">Wilayah</th>
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
                      <td><span class="label label-success"><?php echo $data->username; ?></span></td>
                      <td><?php echo $data->nama_user; ?></td>
                      <td><?php echo $data->status; ?></td>
                      <td><?php echo $data->wilayah; ?></td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>Aksi
                          </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href=<?php echo site_url('pengguna/edit/'.$data->id_user); ?>>Edit Pengguna</a></li>
                        <li><a href=<?php echo site_url('pengguna/ubah/'.$data->id_user); ?>>Ubah Password</a></li>
                        <li class="divider"></li>
                        <li>
                          <a id="simpleConfirm" href=<?php if($data->status=='Super') {
                                echo site_url('pengguna'); 
                            }
                            else {
                               echo site_url('pengguna/run_delete/'.$data->id_user); 
                            } ?>>Hapus Pengguna</a>
                        </li>
                        
                        
                      </ul>
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
                                     