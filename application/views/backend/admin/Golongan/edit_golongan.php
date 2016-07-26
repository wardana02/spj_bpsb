      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Data Golongan PNS
            <small> Aplikasi SPJ BPSB Jawa Tengah</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box col-sm-12">
            <div class="col-sm-10">
            <br>

               <form class="form-horizontal" action="<?php echo base_url("Golongan/run_edit");?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">No Register</label>
        <div class="col-lg-10">
            <input type="text" name="id_golongan" class="form-control" value='<?php echo $data->id_golongan ?>' readonly="readonly">
        </div>
    </div>
          <div class="form-group">
              <label class="col-lg-2 control-label">Tingkat Gol</label>
              <div class="col-lg-10">
                  <input type="text" name="tingkat_gol" class="form-control" value="<?php echo $data->tingkat_gol ;?>" placeholder="Tingkat Golongan" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Pangkat</label>
              <div class="col-lg-10">
                  <input type="text" name="judul_golongan" class="form-control" value="<?php echo $data->judul_golongan ;?>" placeholder="Pangkat Golongan" required>
              </div>
          </div>

          


          <div class="form-group well">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
              <a href="<?php echo site_url('Golongan');?>" class="btn btn-default">Kembali</a>
          </div>
</form>



    </div>
    </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->