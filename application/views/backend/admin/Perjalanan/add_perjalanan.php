      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Data Jenis Belanja Perjalanan / Akun
            <small> Aplikasi SPJ BPSB</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box col-sm-12">
            <div class="col-sm-10">
            <br>

              <form class="form-horizontal" action="<?php echo base_url("Perjalanan/run_save");?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">No Register</label>
        <div class="col-lg-10">
            <input type="text" name="id_perjalanan" class="form-control" value='BLJP<?php echo date('His')?>' readonly="readonly">
        </div>
    </div>
          <div class="form-group">
              <label class="col-lg-2 control-label">Kode Jenis Belanja</label>
              <div class="col-lg-10">
                  <input type="text" name="kode_perjalanan" class="form-control" placeholder="Kode Jenis Belanja ex:524111" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Judul Jenis Belanja</label>
              <div class="col-lg-10">
                  <input type="text" name="judul_perjalanan" class="form-control" placeholder="Judul Jenis Belanja" required>
              </div>
          </div>

               


          <div class="form-group well">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
              <a href="<?php echo site_url('Perjalanan');?>" class="btn btn-default">Kembali</a>
          </div>
</form>



    </div>
    </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->