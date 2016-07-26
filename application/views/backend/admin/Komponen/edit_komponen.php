      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Komponen Kegiatan Perjalanan BPSB
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

              <form class="form-horizontal" action="<?php echo base_url("Komponen/run_edit");?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">No Register</label>
        <div class="col-lg-10">
            <input type="text" name="id_komp_keg" class="form-control"  value="<?php echo $data->id_komp_keg ;?>" readonly="readonly">
        </div>
    </div>
          <div class="form-group">
              <label class="col-lg-2 control-label">Judul Komponen Kegiatan</label>
              <div class="col-lg-10">
                  <input type="text" name="judul_komp_keg" class="form-control"  value="<?php echo $data->judul_komp_keg ;?>" placeholder="Judul Rangka Kegiatan" required>
              </div>
          </div>

          <div class="form-group">
                      <label class="col-lg-2 control-label">Asset Belanja</label>
                      <div class="col-lg-10">
                        <select class="form-control" name="id_ass_belanja" id="id_perjalanan">
                            <?php
                              foreach($belanja as $prj){
                                    echo "<option value='".$prj->id_ass_belanja."'"; 
                                 if ($data->id_ass_belanja == $prj->id_ass_belanja){
                                echo "selected";
                                 } echo ">".$prj->kode_ass_belanja." / ".$prj->judul_ass_belanja."</option>";
                              }
                            ?>
                      </select>
                      </div>
          </div>

          <div class="form-group">
                      <label class="col-lg-2 control-label">Asset Kegiatan</label>
                      <div class="col-lg-10">
                        <select class="form-control" name="id_ass_kegiatan" id="id_perjalanan">
                            <?php
                              foreach($kegiatan as $prj){
                                    echo "<option value='".$prj->id_ass_kegiatan."'"; 
                                 if ($data->id_ass_kegiatan == $prj->id_ass_kegiatan){
                                echo "selected";
                                 } echo ">".$prj->kode_ass_kegiatan." / ".$prj->judul_ass_kegiatan."</option>";
                              }
                            ?>
                      </select>
                      </div>
          </div>

          

          <div class="form-group">
              <label class="col-lg-2 control-label">Kode Komponen Kegiatan</label>
              <div class="col-lg-10">
                  <input type="text" name="kode_komp_keg" class="form-control"  value="<?php echo $data->kode_komp_keg ;?>" placeholder="Judul Rangka Kegiatan" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Tahun Anggaran</label>
              <div class="col-lg-10">
                  <input type="text" name="th_angg_komp" class="form-control"  value="<?php echo $data->th_angg_komp ;?>" placeholder="Judul Rangka Kegiatan" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Anggaran Kegiatan</label>
              <div class="col-lg-10">
                  <input type="text" name="anggaran_komp_keg" class="form-control"  value="<?php echo $data->anggaran_komp_keg ;?>" placeholder="Judul Rangka Kegiatan" required>
              </div>
          </div>

          <div class="form-group well">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
              <a href="<?php echo site_url('Komponen');?>" class="btn btn-default">Kembali</a>
          </div>
</form>



    </div>
    </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->