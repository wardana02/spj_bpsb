      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Relasi Komponen dengan Rangka Kegiatan Perjalanan BPSB
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

              <form class="form-horizontal" action="<?php echo base_url("relasi/run_edit");?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">No Register</label>
        <div class="col-lg-10">
            <input type="text" name="id_relasi" class="form-control" value="<?php echo $data->id_relasi ;?>" readonly="readonly">
        </div>
    </div>
         

          <div class="form-group">
                      <label class="col-lg-2 control-label">Judul Komponen Kegiatan</label>
                      <div class="col-lg-10">
                        <select class="form-control" name="id_komp_keg">
                            <?php
                              foreach($komponen as $prj){
                                  echo "<option value='".$prj->id_komp_keg."'"; 
                                 if ($data->id_komp_keg == $prj->id_komp_keg){
                                echo "selected";
                                 } echo ">".$prj->judul_komp_keg."</option>";
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
                              foreach($rangka as $prj){
                                    echo "<option value='".$prj->id_rangka."'"; 
                                 if ($data->id_rangka == $prj->id_rangka){
                                echo "selected";
                                 } echo ">".$prj->judul_rangka." / ".$prj->tahun_anggaran."</option>";
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