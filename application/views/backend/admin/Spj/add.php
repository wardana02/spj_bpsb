      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SPJ
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
            <div class="col-sm-12">
            <br>
            <div class="callout callout-success">
                    <h2>Data Surat Tugas!</h2>
                    <h5>
                    <p>Pastikan Anda Telah Memilih Surat Tugas Yang Muncul.</p>
                    <p>Nama Pegawai Yang dimunculkan Hanya Terbatas pada Jumlah Pegawai Yang Ada Pada Surat Tugas.</p>
                    <p>Nomor Surat Tugas : <br><b><?php echo $tugas->nomor_surat; ?></b></p>
                    <p>Tanggal Surat : <br><b><?php echo dateindo($tugas->tanggal_surat); ?></b></p>
                    <p>Tanggal Berangkat / Tiba : <br><b><?php echo dateindo($tugas->tgl_berangkat)." / ".dateindo($tugas->tgl_tiba); ?></b></p>
                    <p>Jumlah Hari : <br><b><?php echo $tugas->hari." Hari"; ?></b></p>
                    <p>Perihal : <br><b>
                    <?php 
                        echo "Melaksanakan Perjalanan dinas dari ".$tugas->dari." ke ".$tugas->ke."
                         pada tanggal ".dateindo($tugas->tgl_berangkat)." dalam rangka ".$tugas->judul_rangka." pada ".$tugas->judul_komp_keg; 
                     

                        $tgl    = explode('-', $tugas->tanggal_surat);
                        $kd_bln   = romawi($tgl[1]);
                        $kd = $this->pengguna->edit($tugas->by_);
                        $no_surat = tost($tugas->tanggal_surat,$kd_bln,$tugas->nomor_surat,$kd->wilayah);

                        //pengkondisian pada uang saku
                        if(($tugas->kode_perjalanan=='524119') AND ($tugas->hari>=3) ){
                          $ctrl='';
                          $this->session->set_userdata('ctrl',TRUE);
                        }else {$ctrl = "disabled=''";
                        $this->session->set_userdata('ctrl',false);
                        }

                        //pengkondisian hotel
                        if ($tugas->hari > 2) { $htl=''; }
                        else $htl= "disabled=''";;


                     ?>
                    </b></p>
                    </h5>

                  </div>

                  <div class="callout callout-danger">
                    <h4>Peringatan!!</h4>
                    <p>Apabila Nama Tidak Muncul, Kemungkinan Nama Tersebut Telah Membuat Spj Berdasarkan Surat Tugas Yang Sama</p>
                    <p>Atau, Mungkin Anda Tidak Menyertakan Nama Pegawai Pada Saat Membuat Surat Tugas</p>
                  </div>

            </div>
        </div>
          <div class="box col-sm-12">
            <div class="col-sm-10">
            <br>



              <form class="form-horizontal" action="<?php echo base_url("spj/run_save/$tugas->id_surat");?>" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id_relasi2" value='<?php echo $tugas->id_relasi2; ?>'>
    <input type="hidden" name="id_surat" value='<?php echo $tugas->id_surat; ?>'>
    <input type="hidden" name="tgl_tiba" value='<?php echo $tugas->tgl_tiba; ?>'>
    <input type="hidden" name="tgl_berangkat" value='<?php echo $tugas->tgl_berangkat; ?>'>
    


    <div class="form-group">
        <label class="col-lg-2 control-label">No Register</label>
        <div class="col-lg-10">
            <input type="text" name="id_spj" class="form-control" value='SPJ<?php echo date('His')?>' readonly="readonly">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">No SPT</label>
        <div class="col-lg-10">
            <input type="text" class="form-control" value='<?php echo $no_surat ?>' readonly="readonly">
        </div>
    </div>
          <div class="form-group">
              <label class="col-lg-2 control-label">Nomor SPD</label>
              <div class="col-lg-10">
                  <input type="text" name="no_surat" 
                   maxlength="3" onkeypress="return runScript(event)"
                  class="form-control" placeholder="Masukan Nomor Surat ex : 001" required>
              </div>
          </div>

         
                   
          <div class="form-group">
                      <label class="col-lg-2 control-label">Atas Nama </label>
                      <div class="col-lg-10">
                        <select class="form-control" name="id_pegawai" id="id_pegawai" required>
                            <?php
                              foreach($pegawai as $dt){
                                    echo "<option value='".$dt->id_pegawai."'"; 
                                    echo ">".$dt->nama_pegawai." / ".$dt->jabatan."</option>";
                              }
                            ?>
                      </select>
                      </div>
          </div>

          <script type="text/javascript">
            function findselected2() {
                var selMenu = document.getElementById('id_kendaraan');
                var ongkos = document.getElementById('ongkos');
                var pasfoto = document.getElementById('foto');
                if(selMenu.value == 'TRS215624'){
                  ongkos.disabled = false;
                  pasfoto.disabled = false;
                } 
                    
                else{
                  ongkos.disabled = true;
                  pasfoto.disabled = true;
                }
                    
            }

          </script>


          <div class="form-group">
                      <label class="col-lg-2 control-label">Transport & Ongkos</label>
                      <div class="col-lg-5">
                        <select class="form-control" name="id_kendaraan" id="id_kendaraan"  onChange="findselected2()">
                            <?php
                              foreach($kendaraan as $dt){
                                    echo "<option value='".$dt->id_kendaraan."'"; 
                                    echo ">".$dt->nama_kendaraan."</option>";
                              }
                            ?>
                      </select>
                      </div>
                      <div class="col-lg-5">
                          <input type="text" name="ongkos" id="ongkos" class="form-control" disabled="" placeholder="Isi Dengan Nominal Transport ex : 50000">
                      </div>
          </div>

          <div class="form-group">
                <label class="col-lg-2 control-label">Scan Bukti Tiket</label>
                <div class="col-lg-10">
                    <input class="form-control" name="userfile" id="foto" type="file" accept="image/*" disabled=""  onchange="tampilkanPreview(this,'preview')"><br>
                 </div>
                 <div class="col-sm-2"> </div>
                      <div class="col-sm-5">
                        <img class="col-xs-12" id="preview" src="" alt="" width="320px"/>
                      </div>

          </div>


        <div class="form-group">
                      <label class="col-lg-2 control-label">Penginapan / Hotel</label>
            <div class="col-lg-5">
                  <select class="form-control" name="selmenu" id="selmenu" onChange="findselected3()" <?php echo $htl;?> >
                      <option value="1">Tidak Menggunakan Biaya Penginapan</option>
                      <option value="2">Menggunakan Biaya Penginapan</option>
                  </select>
             </div>
             <div class="col-lg-5">
                  <input type="text" id="penginapan2" name="penginapan2" class="form-control" disabled="" placeholder="Isi Dengan Nominal Penginapan ex : 50000">
              </div>
         </div>


        <script type="text/javascript">
            function findselected3() {
                var selMenua = document.getElementById('selmenu');
                var txtField = document.getElementById('penginapan2');
                if(selMenua.value == '1') 
                    penginapan2.disabled = true
                else
                    penginapan2.disabled = false
            }

          </script>



        <div class="form-group">
                      <label class="col-lg-2 control-label">Uang Saku</label>
            <div class="col-lg-5">
                  <select class="form-control" name="selmenu2" id="selmenu2" onChange="findselected()"<?php echo $ctrl;?>>
                      <option value="1">Tidak Menggunakan Uang Saku</option>
                      <option value="2">Menggunakan Uang Saku</option>
                  </select>
             </div>
             <div class="col-lg-5">
                  <input type="text" id="uang_saku" name="uang_saku" class="form-control" disabled="" placeholder="Isi Dengan Nominal Uang Saku ex : 50000">
              </div>
         </div>



        <script type="text/javascript">
            function findselected() {
                var selMenu = document.getElementById('selmenu2');
                var txtField = document.getElementById('uang_saku');
                if(selMenu.value == '1') 
                    uang_saku.disabled = true
                else
                    uang_saku.disabled = false
            }

          </script>

          <div class="form-group">
              <label class="col-lg-2 control-label">Nama Pejabat Yang Dituju</label>
              <div class="col-lg-10">
                  <input type="text" name="nm_ttd" class="form-control" placeholder="Nama Pejabat Yang Dituju Instansi" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">NIP</label>
              <div class="col-lg-10">
                  <input type="text" name="nip_ttd" class="form-control" placeholder="NIP Penandatangan Instansi"  required>
              </div>
          </div>

         <div class="form-group">
              <label class="col-lg-2 control-label">Jabatan</label>
              <div class="col-lg-10">
                  <input type="text" name="jb_ttd" class="form-control" placeholder="Jabatan Penandatangan Instansi" required>
              </div>
          </div>

          

          <div class="form-group">
              <label class="col-lg-2 control-label">Nama Produsen</label>
              <div class="col-lg-10">
                  <input type="text" name="nm_produsen" class="form-control" placeholder="Nama Produsen / Instansi" required>
              </div>
          </div>
               


          <div class="form-group well">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
              <a href="<?php echo site_url('s_tugas');?>" class="btn btn-default">Kembali</a>
              <a href=<?php echo site_url('spj/add/'.$tugas->id_surat);?> class="btn btn-dropbox">Muat Ulang</a>
          </div>
</form>



    </div>
    </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->