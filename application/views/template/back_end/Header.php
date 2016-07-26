<html>
  <head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href=<?=base_url("assets/img/fava.png");?> />
    <title>SPJ_BPSB || Aplikasi Generate SPJ BPSB Jawa Tengah @2015 </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
    <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript" script type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <!-- jQuery 2.1.3 -->
    <script src=<?=base_url("assets/backend/adminlte/plugins/jQuery/jQuery-2.1.3.min.js");?>></script>
    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url() ?>assets/jquery-1.11.0.js"></script>


    <!--Pop Up Confirmation

    <script src=<?=base_url("assets/confirmation/jquery-1.9.1.min.js");?>></script>-->
    <script src=<?=base_url("assets/confirmation/jquery.confirm.js");?>></script>
    <script src=<?=base_url("assets/confirmation/run_prettify.js");?>></script>


     <script>
    function tampilkanPreview(gambar,idpreview){
//                membuat objek gambar
        var gb = gambar.files;
        
//                loop untuk merender gambar
        for (var i = 0; i < gb.length; i++){
//                    bikin variabel
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview=document.getElementById(idpreview);            
            var reader = new FileReader();
            
            if (gbPreview.type.match(imageType)) {
//                        jika tipe data sesuai
                preview.file = gbPreview;
                reader.onload = (function(element) { 
                    return function(e) { 
                        element.src = e.target.result; 
                    }; 
                })(preview);

//                    membaca data URL gambar
                reader.readAsDataURL(gbPreview);
            }else{
//                        jika tipe data tidak sesuai
                alert("Type file tidak sesuai. Khusus image.");
            }
           
        }    
    }
    </script>


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

     <!-- For Timeline -->
    <link href=<?=base_url("assets/timeline/css/style.css");?> rel="stylesheet" type="text/css" />
    
      <!-- For Pup up image -->
    <link rel="stylesheet" type="text/css" href=<?=base_url("assets/popup-image/css/jquery.lightbox-0.5.css");?> media="screen" />

    <!-- For Sate Picker -->
    <link href="<?php echo base_url()?>assets/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <!-- For Slider -->
  
    <link href=<?=base_url("assets/slider/responsiveslides.css");?> rel="stylesheet" type="text/css" /> 

    <!-- Bootstrap 3.3.2 -->
    <link href=<?=base_url("assets/backend/adminlte/bootstrap/css/bootstrap.min.css");?> rel="stylesheet" type="text/css" />
    
    <!-- FontAwesome 4.3.0 
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    -->
    <!-- Ionicons 2.0.0 -->
    <link href=<?=base_url("assets/backend/adminlte/bootstrap/css/ionicons.min.css");?> rel="stylesheet" type="text/css" />    

    <!-- DATA TABLES -->
    <link href=<?=base_url("assets/backend/adminlte/plugins/datatables/dataTables.bootstrap.css");?> rel="stylesheet" type="text/css" />
    
    <!-- jvectormap -->
    <link href=<?=base_url("assets/backend/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css");?> rel="stylesheet" type="text/css" />
    
    <!-- Daterange picker -->
    <link href=<?=base_url("assets/backend/adminlte/plugins/daterangepicker/daterangepicker-bs3.css");?> rel="stylesheet" type="text/css" />
    
    <!-- Theme style -->
    <link href=<?=base_url("assets/backend/adminlte/dist/css/AdminLTE.min.css");?> rel="stylesheet" type="text/css" />
    <link href=<?=base_url("assets/backend/adminlte/dist/css/skins/_all-skins.min.css");?> rel="stylesheet" type="text/css" />



  </head>

  <body class="skin-green">
    <div class="wrapper">

      <!-- Main Header -->

      <header class="main-header">
        <!-- Logo -->
        <a href=<?=base_url('dashboard');?> class="logo"><b>SPJ BPSB <?php echo $this->session->userdata('tahun')?></b></a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="glyphicon glyphicon-eject"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->


              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src=<?=base_url("assets/img/logo-jateng.jpg");?> class="user-image" alt="User Image"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"> <?php echo $nama_user; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src=<?=base_url("assets/img/logo-jateng.jpg");?> class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $nama_user; ?><br>
                      <small><?php $wil = $this->session->userdata('wilayah'); echo "Wilayah Kerja : $wil"; ?><br>
                      Terdaftar Sejak => <?php echo dateindo($this->session->userdata('registerd')); ?></small>
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href=<?=base_url('login/logout');?> class="btn btn-default btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>