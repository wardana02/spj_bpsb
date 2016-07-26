      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            Tambah Data Pegawai BPSB Jawa Tengah
            <small>Anda Bisa Manajemen Data Pegawai BPSB Jawa Tengah</small>
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

              <form class="form-horizontal" action="<?php echo base_url("Pegawai/run_save");?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">No Register</label>
        <div class="col-lg-10">
            <input type="text" name="id_pegawai" class="form-control" value='PEG<?php echo date('dHis')?>' readonly="readonly">
        </div>
    </div>
          <div class="form-group">
              <label class="col-lg-2 control-label">Nomor Induk</label>
              <div class="col-lg-10">
                  <input type="text" name="nip_pegawai" class="form-control"  placeholder="Nompor Induk Pegawai" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Nama Pegawai</label>
              <div class="col-lg-10">
                  <input type="text" name="nama_pegawai" class="form-control"  placeholder="Nama Pegawai" required>
              </div>
          </div>

        
          <div class="form-group">
                      <label class="col-lg-2 control-label">Golongan</label>
                      <div class="col-lg-10">
                        <select class="form-control" name="golongan">
                            <?php
                              foreach($golongan as $gol){
                                    echo "<option value='".$gol->id_golongan."'"; 
                                    echo ">".$gol->tingkat_gol." / ".$gol->judul_golongan."</option>";
                              }
                            ?>
                      </select>
                      </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Jabatan</label>
              <div class="col-lg-10">
                  <select name="jabatan" class="form-control" required>
                      <option>Pilih Jabatan</option>
                      <option value="Kepala">Kepala</option>
                      <option value="Kasi Pelayanan Teknis">Kasi Pelayanan Teknis</option>
                      <option value="Pelaksana Teknis">Pelaksana Teknis</option>
                      <option value="Kasubag Tata Usaha">Kasubag Tata Usaha</option>
                      <option value="Staff Tata Usaha">Staff Tata Usaha</option>
                      <option value="Bendahara Pengeluaran Pembantu">Bendahara Pengeluaran Pembantu</option>
                  </select>
                </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Uang Harian</label>
              <div class="col-lg-10">
                  <input type="text" name="gaji_pokok" class="form-control" placeholder="Uang Harian Perjalanan Pegawai" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Golongan Perjalanan</label>
              <div class="col-lg-10">
                  <input type="text" name="gol_perjalanan" class="form-control" placeholder="Golongan Perjalanan Pegawai" required>
              </div>
          </div>


          <div class="form-group well">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
              <a href="<?php echo site_url('Pegawai');?>" class="btn btn-default">Kembali</a>
          </div>
</form>



    </div>
    </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->