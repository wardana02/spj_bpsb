  

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Page Header
            <small>Optional description</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <br><br>

        <div class="box-body table-responsive no-padding">
          <div class="box col-sm-12">
            <div class="col-sm-11">

            <?php echo $this->session->flashdata('pesan');?>
            <?php echo $this->session->flashdata('error');?>
            <?php echo form_open_multipart(base_url('upload/proses_upload'));?>
            <br><br>
              <div class="form-group">
                      <label for="exampleInputEmail1">ID</label>
                      <input type="text" class="form-control" name='id' placeholder="ID" value='<?php echo date('YmdHis')?>'>
                </div>

               <div class="form-group">
                      <label for="exampleInputEmail">Judul</label>
                      <input type="text" class="form-control" name='id_spj' placeholder="Judul">
                </div>

                <div class="form-group">
                      <label for="exampleInputEmai">File</label><br>
                      <input class="form-control" name="userfile" id="foto" type="file" accept="image/*"  onchange="tampilkanPreview(this,'preview')"><br>
                      <div class="col-sm-5">
                        <img class="col-xs-12" id="preview" src="" alt="" width="320px"/>
                      </div>
                      
                                                
                </div>

              <?php

                if($error!=''){
                  echo "<div class='callout callout-danger lead'> $error </div>";
                }
                
            ?>
              <br /><br />
              <input type="submit" class="btn btn-success" value="Upload" />
             </form>

             </div>
          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


    </div><!-- ./wrapper -->

   