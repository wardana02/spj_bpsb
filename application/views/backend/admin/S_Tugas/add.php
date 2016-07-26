      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Surat Tugas BPSB
            <small>Surat Tugas Ini Akan Dijadikan Sebagai Acuan Dari SPJ</small>
          </h1>
        
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box col-sm-12">
            <div class="col-sm-10">
            <br>
              <?php $id_surat = 'ST'.date('dmyHis') ; ?>
              <form class="form-horizontal" action="<?php echo base_url("s_tugas/run_save/$id_surat");?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">No Register</label>
        <div class="col-lg-10">
            <input type="text" name="id_surat" class="form-control" value='<?php echo $id_surat; ?>' readonly="readonly">
        </div>
    </div>
          <div class="form-group">
              <label class="col-lg-2 control-label">Nomor Surat</label>
              <div class="col-lg-10">
                  <input type="text" name="no_surat" 
                  class="form-control" maxlength="3" onkeypress="return runScript(event)"
                  placeholder="Masukan Nomor Surat ex : 001" required>
              </div>
          </div>

    
          <div class="form-group">
              <label class="col-lg-2 control-label">Tanggal Surat</label>
              <div class="col-lg-10">
              <div class="date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                 <input class="form-control datepicker"  data-date-format="yyyy-mm-dd" type="text" name="tgl_surat" required>
              </div>
              </div>
          </div>

          

          


                  <div class="form-group" id="propinsi">
                      <label class="col-lg-2 control-label">Komponen Kegiatan</label>
                      <div class="col-lg-10">
                        <select class="form-control" name="id_komp_keg" id="komponen_id">
                          <option value="0">Silahkan Pilih Komponen Kegiatan</option>
                            <?php
                              foreach($komponen as $dt){
                                    echo "<option value='".$dt->id_komp_keg."'"; 
                                    echo ">".$dt->judul_komp_keg."</option>";
                              } 
                            ?>
                      </select>
                      </div>
          </div>

            <div class="form-group" id="rangka">
                      <label class="col-lg-2 control-label">Dalam Rangka</label>
                      <div class="col-lg-10">
                        <select class="form-control" name="id_rangka" id="id_perjalanan" disabled="disabled" required>
                            <option value="0">Silahkan Pilih Komponen Kegiatan Dahulu</option>
                      </select>
                      </div>
          </div>

        <script type="text/javascript">
        $("#komponen_id").change(function(){
                var id_komp_keg = {id_komp_keg:$("#komponen_id").val()};
                $.ajax({
                        type: "POST",
                        url : "<?php echo site_url('s_tugas/select_rangka')?>",
                        data: id_komp_keg,
                        success: function(msg){
                            $('#rangka').html(msg);
                        }
                    });
        });
       </script>

           <div class="form-group">
                    <label class="col-lg-2 control-label">Tanggal Perjalanan</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        
                      </div>
                      <input type="text" class="form-control pull-right" name="tanggal" id="reservation" required>
                    </div><!-- /.input group -->
                  </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Lokasi Berangkat</label>
              <div class="col-lg-10">
                  <input type="text" name="dari" class="form-control" placeholder="Isi dengan Berangkat Dari" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-lg-2 control-label">Lokasi Tujuan</label>
              <div class="col-lg-10">
                  <input type="text" name="ke" class="form-control" placeholder="Isi Dengan Lokasi Tujuan" required>
              </div>
          </div>
               


          <div class="form-group well">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Tambahkan Pegawai</button>
              <a href="<?php echo site_url('s_tugas');?>" class="btn btn-default">Kembali</a>
          </div>
</form>



    </div>
    </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

