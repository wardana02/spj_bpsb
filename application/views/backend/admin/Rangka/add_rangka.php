      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Rangka Kegiatan Perjalanan BPSB
            <small>Masukan Rangka Perjalanan BPSB</small>
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

              <form class="form-horizontal" action="<?php echo base_url("Rangka/run_save");?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">No Register</label>
        <div class="col-lg-10">
            <input type="text" name="id_rangka" class="form-control" value='DRK<?php echo date('His')?>' readonly="readonly">
        </div>
    </div>
          <div class="form-group">
              <label class="col-lg-2 control-label">Judul Rangka Kegiatan</label>
              <div class="col-lg-10">
                  <input type="text" name="judul_rangka" class="form-control" placeholder="Judul Rangka Kegiatan" required>
              </div>
          </div>

       
          <div class="form-group">
                      <label class="col-lg-2 control-label">Jenis Perjalanan</label>
                      <div class="col-lg-10">
                        <select class="form-control" name="id_perjalanan" id="id_perjalanan">
                            <?php
                              foreach($perjalanan as $prj){
                                    echo "<option value='".$prj->id_perjalanan."'"; 
                                    echo ">".$prj->kode_perjalanan." / ".$prj->judul_perjalanan."</option>";
                              }
                            ?>
                      </select>
                      </div>
          </div>

               


          <div class="form-group well">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
              <a href="<?php echo site_url('Rangka');?>" class="btn btn-default">Kembali</a>
          </div>
</form>



    </div>
    </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->