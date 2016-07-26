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
                    <h2>Data SPJ!</h2>
                    <h5>
                    <p>Anda Diijinkan Untuk Mengedit Data SPJ hanya pada pegawai tertentu.</p>
                    <p>Nama Pegawai Yang dimunculkan Hanya Terbatas.</p>
                    </b></p>
                    </h5>

                  </div>

                  <div class="callout callout-danger">
                    <h4>Peringatan!!</h4>
                    <p>Apabila Nama Tidak Muncul, Kemungkinan Nama Tersebut Telah Membuat Spj Berdasarkan Surat Tugas Yang Sama</p>
                    <p>Atau, Mungkin Anda Tidak Menyertakan Nama Pegawai Pada Saat Membuat Surat Tugas</p>
                  </div>
                  <?php 
                    if(($tugas->kode_perjalanan=='524119') AND ($tugas->hari>=3) ){
                          $ctrl='';
                          $this->session->set_userdata('ctrl',TRUE);
                          $hari = $tugas->hari-2;
                        }else {$ctrl = "disabled=''";
                        $this->session->set_userdata('ctrl',false);
                        }


                        //pengkondisian hotel
                        if ($tugas->hari > 2) { $htl=''; }
                        else $htl= "disabled=''";


                  ?>

            </div>
        </div>
          <div class="box col-sm-12">
            <div class="col-sm-10">
            <br>



              <form class="form-horizontal" action="<?php echo base_url("spj/run_edit");?>" method="post" enctype="multipart/form-data">
    
    <input type="hidden" name="id_relasi2" value='<?php echo $tugas->id_relasi2; ?>'>
    <input type="hidden" name="id_surat" value='<?php echo $tugas->id_surat; ?>'>
    <input type="hidden" name="tgl_tiba" value='<?php echo $tugas->tgl_tiba; ?>'>
    <input type="hidden" name="tgl_berangkat" value='<?php echo $tugas->tgl_berangkat; ?>'>


    <div class="form-group">
        <label class="col-lg-2 control-label">No Register</label>
        <div class="col-lg-10">
            <input type="text" name="id_spj" class="form-control" value='<?php echo $value->id_spj; ?>' readonly="readonly">
        </div>
    </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Nomor Surat</label>
              <div class="col-lg-10">
                  <input type="text" name="no_surat" 
                   maxlength="3" onkeypress="return runScript(event)"
                  class="form-control" value="<?php echo $value->no_surat?>" placeholder="Masukan Nomor Surat ex : 001" required>
              </div>
          </div>

         
                   
          <div class="form-group">
              <label class="col-lg-2 control-label">Atas Nama</label>
              <div class="col-lg-10">
                  <input type="text" class="form-control" value="<?php echo $pegawai->nama_pegawai?>"  required readonly='readonly'>
              </div>
          </div>


                    <script type="text/javascript">
            function findselected2() {
                var selMenu = document.getElementById('id_kendaraan');
                var ongkos = document.getElementById('ongkos');
                var pasfoto = document.getElementById('foto');
                if(selMenu.value == 'TRS215624'){ 
                    ongkos.disabled = false;
                    pasfoto.disabled = false;}
                else{
                    ongkos.disabled = true;
                    pasfoto.disabled = true;}
            }

          </script>


          <div class="form-group">
                      <label class="col-lg-2 control-label">Kedaraan</label>
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
                          <input type="text" name="ongkos" id="ongkos" class="form-control" disabled="" value="<?php echo $value->ongkos ?>" placeholder="Isi Dengan Nominal Transport ex : 50000">
                      </div>
          </div>

          <div class="form-group">
                <label class="col-lg-2 control-label">Scan Bukti Tiket</label>
                <div class="col-lg-10">
                    <input class="form-control" name="userfile" id="foto" type="file" accept="image/*" value="ASD.jpg" disabled=""  onchange="tampilkanPreview(this,'preview')"><br>
                 </div>
                 <div class="col-sm-2"> </div>
                      <div class="col-sm-5">
                        <img class="col-xs-12" id="preview" 
                        <?php if ($datafoto->nama_file != NULL) { ?>
                          src=<?=base_url('assets/img/uploads/'.$datafoto->nama_file);?> 
                        <?php } ?>
                        alt="" width="320px"/>
                      </div>

          </div>


        <div class="form-group">
                      <label class="col-lg-2 control-label">Penginapan</label>
                      <div class="col-lg-5">
                        <select class="form-control" name="selmenu" id="selmenu" onChange="findselected9()" <?php echo $htl;?>  >
                            <option value="1">Tidak Menggunakan Biaya Penginapan</option>
                            <option value="2">Menggunakan Biaya Penginapan</option>
                        </select>
                      </div>

                      <div class="col-lg-5">
                          <input type="text" id="penginapan2" name="penginapan2" class="form-control" disabled="" value="<?php echo $value->penginapan ?>" placeholder="Isi Dengan Nominal Penginapan ex : 50000">
                      </div>
         </div>


        <script type="text/javascript">
            function findselected9() {
                var selMenu = document.getElementById('selmenu');
                var txtField = document.getElementById('penginapan2');
                if(selMenu.value == '1') 
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
                  <input type="text" id="uang_saku" name="uang_saku" class="form-control" value="<?php echo $value->uang_saku/$hari ?>" disabled="" placeholder="Isi Dengan Nominal Uang Saku ex : 50000">
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
              <label class="col-lg-2 control-label">Jabatan Tanda Tangan</label>
              <div class="col-lg-10">
                  <input type="text" name="jb_ttd" class="form-control" value="<?php echo $value->jb_ttd?>" placeholder="Jabatan Penandatangan Instansi" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Nama Tanda Tangan</label>
              <div class="col-lg-10">
                  <input type="text" name="nm_ttd" class="form-control" value="<?php echo $value->nama_ttd?>" placeholder="Nama Penandatangan Instansi" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">NIP Tanda Tangan</label>
              <div class="col-lg-10">
                  <input type="text" name="nip_ttd" class="form-control" value="<?php echo $value->nip_ttd?>" placeholder="NIP Penandatangan Instansi" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Nama Produsen</label>
              <div class="col-lg-10">
                  <input type="text" name="nm_produsen" class="form-control" value="<?php echo $value->nm_produsen?>" placeholder="Nama Produsen / Instansi" required>
              </div>
          </div>
               


          <div class="form-group well">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan Perubahan</button>
              <a href="<?php echo site_url('spj');?>" class="btn btn-default">Kembali</a>
          </div>
</form>



    </div>
    </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->