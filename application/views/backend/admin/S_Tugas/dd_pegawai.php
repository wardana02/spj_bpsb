      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Surat Tugas BPSB
            <small>Surat Tugas Ini Akan Dijadikan Sebagai Acuan Dari SPJ</small>
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

            <div class="callout callout-success">
                    <h2>Data Surat Tugas!</h2>
                    <h5>
                    <p>Pastikan Anda Telah Memilih Surat Tugas Yang Muncul.</p>
                    <p>Nama Pegawai Yang dimunculkan Hanya Terbatas pada Jumlah Pegawai Yang Ada Pada Surat Tugas.</p>
                    <p>Nomor Surat Tugas : <br><b><?php echo $tugas->nomor_surat; ?></b></p>
                    <p>Tanggal Surat : <br><b><?php echo $tugas->tanggal_surat; ?></b></p>
                    <p>Perihal : <br><b>
                    <?php 
                        echo "Melaksanakan Perjalanan dinas dari ".$tugas->dari." ke ".$tugas->ke."
                         pada tanggal ".$tugas->tgl_berangkat." dalam rangka ".$tugas->judul_rangka." pada ".$tugas->judul_komp_keg; 
                     ?>
                    </b></p>
                    </h5>

                  </div>


           
          <div class="form-group well">
                    <h2>Pegawai Yang Ditugaskan Berdasarkan Surat Nomor !</h2>
                    <table class="table table-bordered table-striped">
                      <tbody>
            <?php
                $i=1;
                  foreach($peg_tugas as $dt){
                    echo "<tr>";
                     echo "<td>".$i++.". ". $dt->nama_pegawai." / ".$dt->jabatan."</td>";
                     echo "<td><a href=".site_url("s_tugas/dell_relasi2/".$dt->id_relasi2."/".$tugas->id_surat)." class='btn btn-danger'> Hapus </a></td>";
                    

                    echo "</tr>";   
                  }
            ?>
              </tbody>
            </table>
            </div>
 <form class="form-horizontal" action="<?php echo base_url("s_tugas/add_relasi2/$tugas->id_surat");?>" method="post" enctype="multipart/form-data">
            <div class="form-group">

            <input type="hidden" name="id_surat" value="<?php echo $tugas->id_surat ?>">
                      <label class="col-lg-2 control-label">Menugaskan Pegawai</label>
                      <div class="col-lg-10">
                        <select class="form-control" name="id_pegawai" id="id_pegawai">
                            <?php
                              foreach($pegawai as $dt){
                                    echo "<option value='".$dt->id_pegawai."'"; 
                                    echo ">".$dt->nama_pegawai." / ".$dt->jabatan."</option>";
                              }
                            ?>
                      </select>
                      </div>

                      <br><br>
          </div>

          <div class="form-group well">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Tambahkan</button>
              <a href="<?php echo site_url('s_tugas');?>" class="btn btn-default">Selesai</a>
          </div>
            <br><br>
        </form>

    </div>
    </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->