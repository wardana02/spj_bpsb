<html>
  <head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href=<?=base_url("assets/img/fava.png");?> />
    <title>Login On Aplikasi SPJ BPSB Jateng! || </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->

    <link href=<?=base_url("assets/backend/adminlte/bootstrap/css/bootstrap.min.css");?> rel="stylesheet" type="text/css" />
            <!-- FontAwesome 4.3.0 -->
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href=<?=base_url("assets/backend/adminlte/bootstrap/css/ionicons.min.css");?> rel="stylesheet" type="text/css" />    

    <!-- Morris chart -->
    <link href=<?=base_url("assets/backend/adminlte/plugins/morris/morris.css");?> rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href=<?=base_url("assets/backend/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css");?> rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href=<?=base_url("assets/backend/adminlte/plugins/daterangepicker/daterangepicker-bs3.css");?> rel="stylesheet" type="text/css" />
        <!-- Theme style -->
    <link href=<?=base_url("assets/backend/adminlte/dist/css/AdminLTE.min.css");?> rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href=<?=base_url("assets/backend/adminlte/dist/css/skins/_all-skins.min.css");?> rel="stylesheet" type="text/css" />

    <script>
      function karakter(e) {
        if (e.keyCode == 34) { return false}
          else if (e.keyCode == 35){return false}
          else if (e.keyCode == 61){return false}
          else if (e.keyCode == 39){return false}
          else if (e.keyCode == 38){return false}
          else if (e.keyCode == 45){return false}
          else if (e.keyCode == 94){return false}
        else{return true;}
      }
  </script>

  </head>
  <body background="<?=base_url('assets/img/bpsbjateng_blur.jpg')?>" style="background-repeat:no-repeat center center fixed; 
 background-size:cover";>

    <div class="login-box">
      <div class="login-logo">
      <div class="box">
        <a href='#'><b>SPJ BPSB</b>Jawa Tengah!</a>
        </div>

      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Masuk Menggunakan Username dan Password anda untuk <br> SPJ BPSB <b>Jawa Tengah!</b></p>
        <!-- <p class="login-box-msg">Untuk Login Gunakan Username dan Password <b>"super"</b>, atau menggunakan <b>"admin"</b> atau dapat pula menggunakan <b>"user"</b></p>
        --><p class="login-box-msg"><?php echo $pesan; ?></p>


        <form action=<?=base_url('login/index');?> method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username');?>" onkeypress="return karakter(event)" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <?php echo form_error('username', '<p class="field_error">', '</p>');?>
          </div>

          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password');?>" onkeypress="return karakter(event)" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?php echo form_error('password', '<p class="field_error">', '</p>');?>

          </div>

          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Masuk!">
            </div><!-- /.col -->
          </div>

        </form>


        <p>Butuh Bantuan?<br>Call<b>ME : </b>0857 25 4858 10 (Aji Pratamax)</p>
        <a href="help/lupa_password">Saya Lupa Password Login!!</a><br>
        <a href="help" class="text-center">Mendaftar Akun Login Baru!!</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src=<?=base_url("assets/backend/adminlte/plugins/jQuery/jQuery-2.1.3.min.js");?>></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src=<?=base_url("assets/backend/adminlte/bootstrap/js/bootstrap.min.js");?> type="text/javascript"></script>
    <!-- iCheck -->
    <script src=<?=base_url("assets/backend/adminlte/plugins/iCheck/icheck.min.js");?> type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>