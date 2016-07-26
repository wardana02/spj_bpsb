      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header">
          <h1>
            Edit Asset Transportasi
            <small> Aplikasi SPJ BPSB Jawa Tengah</small>
          </h1>
     
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box col-sm-12">
            <div class="col-sm-10">
            <br>

               <form class="form-horizontal" action="<?php echo base_url("transportasi/run_edit");?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">No Register</label>
        <div class="col-lg-10">
            <input type="text" name="id_kendaraan" class="form-control" value='<?php echo $data->id_kendaraan ?>' readonly="readonly">
        </div>
    </div>
          <div class="form-group">
              <label class="col-lg-2 control-label">Nama Kendaraan</label>
              <div class="col-lg-10">
                  <input type="text" name="nama_kendaraan" class="form-control" value='<?php echo $data->nama_kendaraan ?>' placeholder="Nama Kendaraan" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Jenis Bahan Bakar</label>
              <div class="col-lg-10">
                  <input type="text" name="bahan_bakar" class="form-control" value='<?php echo $data->bahan_bakar ?>' placeholder="Jenis Bahan Bakar" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Jenis Pembiayaan</label>
              <div class="col-lg-10">
                  <input type="text" name="jenis_pembiayaan" class="form-control" value='<?php echo $data->jenis_pembiayaan ?>' placeholder="Jenis Pembiayaan" required>
              </div>
          </div>

          


          <div class="form-group well">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
              <a href="<?php echo site_url('transportasi');?>" class="btn btn-default">Kembali</a>
          </div>
</form>



    </div>
    </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->