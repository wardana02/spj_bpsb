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

          <form id="myform" class="form-horizontal" action="<?php echo base_url("pengguna/save_pass");?>" method="post" enctype="multipart/form-data">

          <div class="form-group">
              <label class="col-lg-2 control-label">Nama Pengguna</label>
              <div class="col-lg-10">
                  <input type="text" name="nama_user"  value="<?php echo $data->nama_user;?>" class="form-control" readonly="">
                  <input type="hidden" name="id_user"  value="<?php echo $data->id_user;?>" class="form-control" readonly="">
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Username</label>
              <div class="col-lg-10">
                  <input type="text" name="username" class="form-control" value="<?php echo $data->username;?>"  onkeypress="return karakter(event)" readonly="">
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

          <div class="form-group well">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Ubah Password</button>
              <a href="<?php echo site_url('Pengguna');?>" class="btn btn-default">Kembali</a>
          </div>
</form>



    </div>
    </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->