      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Data Pengguna Aplikasi
            <small>Anda Bisa Manajemen Data Pengguna Aplikasi</small>
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

              <form id="myform" class="form-horizontal" action="<?php echo base_url("Pengguna/run_save");?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">No Register</label>
        <div class="col-lg-10">
            <input type="text" name="id_user" class="form-control" value='USR<?php echo date('dHis')?>' readonly="readonly">
        </div>
    </div>
          <div class="form-group">
              <label class="col-lg-2 control-label">Nama Pengguna</label>
              <div class="col-lg-10">
                  <input type="text" name="nama_user" class="form-control" placeholder="Nama Pengguna" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Username</label>
              <div class="col-lg-10">
                  <input type="text" name="username" class="form-control" placeholder="Username"  onkeypress="return karakter(event)" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Password</label>
              <div class="col-lg-10">
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password"  onkeypress="return karakter(event)" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Re-Password</label>
              <div class="col-lg-10">
                  <input type="password" id="repassword" name="repassword" class="form-control" placeholder="Masukan Kembali Password"  onkeypress="return karakter(event)" required>
              </div>
          </div>


          <div class="form-group">
              <label class="col-lg-2 control-label">Wilayah Kerja</label>
              <div class="col-lg-10">
                  <select name="wilayah" class="form-control" required>
                      <option value="BPSB">BPSB Jawaa Tengah / Provinsi</option>
                      <option value="BPSB-SKA">WKPB Surakarta</option>
                      <option value="BPSB-">WKPB Kedu</option>
                      <option value="BPSB-BMS">WKPB Banyumas</option>
                      <option value="BPSB-">WKPB Pekalongan</option>
                      <option value="BPSB-SMG">WKPB Semarang</option>
                      <option value="BPSB-PTI">WKPB Pati</option>
                  </select>
              </div>
          </div>


          <div class="form-group">
              <label class="col-lg-2 control-label">Kategori Pengguna</label>
              <div class="col-lg-10">
                  <select name="status" class="form-control" required>
                      <option>Pilih Kategori</option>
                      <option value="Administrator">Administrator - Hak Penuh</option>
                      <option value="Pengguna">Pengguna - Hak Terbatas</option>
                  </select>
              </div>
          </div>


          <div class="form-group well">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
              <a href="<?php echo site_url('Pengguna');?>" class="btn btn-default">Kembali</a>
          </div>
</form>



    </div>
    </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->