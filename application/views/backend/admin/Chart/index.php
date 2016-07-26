 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Rekap Data SPJ Perjalanan BPSB
            <small>Meliputi Rekap Surat Tugas, Serta Rekap Data SPJ</small>
          </h1>
      
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box">

          <?php echo   $this->session->userdata('pesan');?>


                      <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Rekap Data Master SPJ Kegiatan</h3>
                </div><!-- /.box-header -->

                <div class="box">
                <div class="box-header">
                  <p> Rekap Data Ini Bersifat Data Mentah </p>
                  <p> Sehingga Dapat diolah lagi menjadi bentuk lapiran sesuai yang dibutuhkan.</p>
                  <p> Disediakan Rekap Data SPJ Per Bulan, ataupun Pertahun, Dan Semua data Pada Sistem ini.</p>
                  <p> !!. Format Export Disediakan Dalam Bentuk File Excel (*.xls) Minimum dibuka dengan Microsoft Excel 2007</p>
                </div><!-- /.box-header -->


                <div class="box-body">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Download Data Rekap (To <a href="#">Excel</a>)</h3>
                </div>
                <div class="box-body">
                
                  
                  
                  
                </div>
                <div class="col-sm-4">
                  <a href=<?php echo site_url('rekap/download_excel/1'); ?> 
                  class="btn btn-block btn-dropbox">
                    <i class="glyphicon glyphicon-cloud-download"></i> <br>Download Data Master Pengajuan<br>
                  </a>
                </div>
                <div class="col-sm-4">
                  <a href=<?php echo site_url('rekap/download_excel/2'); ?> 
                  class="btn btn-block btn-dropbox">
                    <i class="glyphicon glyphicon-cloud-download"></i> <br>Download Data Master SPJ<br>
                  </a>
                </div>
                <div class="col-sm-4">
                  <a href=<?php echo site_url('rekap/download_excel/3'); ?> 
                  class="btn btn-block btn-dropbox">
                    <i class="glyphicon glyphicon-cloud-download"></i> <br>Download Data Master Surat Tugas<br>
                  </a>                  
                </div>
              </div>

                  <br><br>
                  <i class="pull-left">Sumber : Database E-SPJ Berdasarkan Data Tersimpan</i>
                <i class="pull-right">Export Tanggal <?php echo dateindo(date('Y-m-d'));?></i> 
                <br>
                <br> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
      </div>




        </section><!-- /.content -->
</div><!-- /.content-wrapper -->