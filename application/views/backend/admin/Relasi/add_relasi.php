      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Relasi Komponen dengan Rangka Kegiatan Perjalanan BPSB
            <small>@ BPSB</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box col-sm-12">
            <div class="col-sm-10">
            <br>

              <form class="form-horizontal" action="<?php echo base_url("relasi/run_save");?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">No Register</label>
        <div class="col-lg-10">
            <input type="text" name="id_relasi" class="form-control" value='REL<?php echo date('His')?>' readonly="readonly">
        </div>
    </div>

       
          <div class="form-group">
                      <label class="col-lg-2 control-label">Judul Komponen Kegiatan</label>
                      <div class="col-lg-10">
                        <select class="form-control" name="id_komp_keg">
                            <?php
                              foreach($komponen as $data){
                                    echo "<option value='".$data->id_komp_keg."'"; 
                                    echo ">".$data->judul_komp_keg."</option>";
                              }
                            ?>
                      </select>
                      </div>
          </div>

          <div class="form-group">
                      <label class="col-lg-2 control-label">Judul Rangka Kegiatan</label>
                      <div class="col-lg-10">
                        <select class="form-control" name="id_rangka">
                            <?php
                              foreach($rangka as $data){
                                    echo "<option value='".$data->id_rangka."'"; 
                                    echo ">".$data->judul_rangka."</option>";
                              }
                            ?>
                      </select>
                      </div>
          </div>

     
               


          <div class="form-group well">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
              <a href="<?php echo site_url('relasi');?>" class="btn btn-default">Kembali</a>
          </div>
</form>



    </div>
    </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->