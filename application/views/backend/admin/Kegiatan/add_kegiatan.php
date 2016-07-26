      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Data Jenis Belanja Kegiatan 
            <small> Aplikasi SPJ BPSB</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box col-sm-12">
            <div class="col-sm-10">
            <br>

              <form class="form-horizontal" action="<?php echo base_url("Kegiatan/run_save");?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">No Register</label>
        <div class="col-lg-10">
            <input type="text" name="id_kegiatan" class="form-control" value='ASK<?php echo date('His')?>' readonly="readonly">
        </div>
    </div>
          <div class="form-group">
              <label class="col-lg-2 control-label">Kode Kegiatan</label>
              <div class="col-lg-10">
                  <input type="text" name="kode_kegiatan" class="form-control" placeholder="Kode Kegiatan ex : 001" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Judul Hasil Kegiatan</label>
              <div class="col-lg-10">
                  <input type="text" name="judul_kegiatan" class="form-control" placeholder="Judul Hasil Kegiatan" required>
              </div>
          </div>

               


          <div class="form-group well">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
              <a href="<?php echo site_url('Kegiatan');?>" class="btn btn-default">Kembali</a>
          </div>
</form>



    </div>
    </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->