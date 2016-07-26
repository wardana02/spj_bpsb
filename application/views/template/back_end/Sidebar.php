      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src=<?=base_url("assets/img/logo-jateng.jpg");?> class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $nama_user; ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form (Optional) -->

          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">SPJ_BPSB !!</li>
            <!-- Optionally, you can add icons to the links -->

            <?php
              if ($status=="Super") {
            ?>

            <li class="treeview <?php echo $a;?>">
              
              <a href=<?=base_url('#');?>>
                <i class="glyphicon glyphicon-cloud-upload"></i> <span> Super Admin Menu</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $a1;?>"><a href=<?=base_url("tahun");?>><i class="glyphicon glyphicon-wrench"></i>Ubah Tahun Anggaran</a></li>
                <li class="<?php echo $a2;?>"><a href=<?=base_url('pengguna');?>> <i class="glyphicon glyphicon-user"></i> <span>Manajemen Pengguna</span></a></li>
                
              </ul>
              
            </li>

            <?php
            } 
              if($status=="Administrator" OR $status=="Super") {
              ?>
            <li class="treeview <?php echo $b;?>">
              <a href="#"> 
                <i class="glyphicon glyphicon-tower"></i> <span>Master Data SPJ</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $b1;?>"<?php echo $a;?>><a href=<?=base_url("golongan");?>><i class="glyphicon glyphicon-chevron-down"></i>Data Golongan Pegawai</a></li>
                <li class="<?php echo $b2;?>"><a href=<?=base_url("pegawai");?>><i class="glyphicon glyphicon-chevron-down"></i>Data Pegawai</a></li>
                <li class="<?php echo $b3;?>"><a href=<?=base_url("belanja");?>><i class="glyphicon glyphicon-chevron-down"></i>Data Sub Kegiatan</a></li>
                <li class="<?php echo $b7;?>"><a href=<?=base_url("transportasi");?>><i class="glyphicon glyphicon-chevron-down"></i>Data Asset Transportasi</a></li>

                <li class="<?php echo $b4;?>"><a href=<?=base_url("kegiatan");?>><i class="glyphicon glyphicon-chevron-down"></i>Data Jenis Belanja Keg</a></li>
                <li class="<?php echo $b5;?>"><a href=<?=base_url("perjalanan");?>><i class="glyphicon glyphicon-chevron-down"></i>Data Akun Perjalanan</a></li>
                <li class="<?php echo $b6;?>"><a href=<?=base_url("rangka");?>><i class="glyphicon glyphicon-chevron-down"></i>Data Rangka Kegiatan</a></li>
                
                <li class="<?php echo $b8;?>"><a href=<?=base_url("komponen");?>><i class="glyphicon glyphicon-chevron-down"></i>Data Komponen Kegiatan</a></li>
                <li class="<?php echo $b9;?>"><a href=<?=base_url("relasi");?>><i class="glyphicon glyphicon-chevron-down"></i>Data Relasi Kegiatan->Rangka</a></li>
              </ul>
            </li>


            <li class="treeview <?php echo $c;?>">
              <a href="#"> 
                <i class="glyphicon glyphicon-eye-open"></i> <span>Rekap Data SPJ</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $c1;?>"><a href=<?=base_url("rekap");?>><i class="glyphicon glyphicon-paperclip"></i>Rekap Data SPJ</a></li>
                
                <li class="<?php echo $c4 ;?>">
                  <a href="#"><i class="fa fa-circle-o"></i> Grafik & Monitoring <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu" style="display: none;">
                    <li class="<?php echo $c2;?>"><a href=<?=base_url("rekap/by_pegawai");?>><i class="glyphicon glyphicon-shopping-cart"></i>Berdasarkan Pegawai</a></li>
                    <li class="<?php echo $c3;?>"><a href=<?=base_url("rekap/by_anggaran");?>><i class="glyphicon glyphicon-shopping-cart"></i>Berdasarkan Anggaran </a></li>
                  </ul>
                </li>
               
              </ul>
            </li>
            <?php
              } if($this->session->userdata('login'))
                {
            ?>
            <li class="treeview <?php echo $d;?>">
              <a href=<?=base_url('#');?>>
                <i class="glyphicon glyphicon-tags"></i> <span> Data SPJ & Surat Tugas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li class="<?php echo $d1;?>"><a href=<?=base_url("s_tugas");?>><i class="glyphicon glyphicon-saved"></i>Surat Tugas</a></li>
                <li class="<?php echo $d2;?>"><a href=<?=base_url("spj");?>><i class="glyphicon glyphicon-saved"></i> SPJ Masuk</a></li>
                
              </ul>
            </li>
            <?php
               }
            ?>

            <li class="treeview <?php echo $e;?>">
              <a href=<?=base_url('#');?>>
                <i class="glyphicon glyphicon-bullhorn"></i> <span> Bantuan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li class="<?php echo $e1;?>"><a href=<?=base_url("help/index");?>><i class="glyphicon glyphicon-info-sign"></i>Buat Akun Baru</a></li>
                <li class="<?php echo $e2;?>"><a href=<?=base_url("help/lupa_password");?>><i class="glyphicon glyphicon-info-sign"></i> Lupa Password</a></li>
                <li class="<?php echo $e3;?>"><a href=<?=base_url("help/cetak_spj");?>><i class="glyphicon glyphicon-info-sign"></i> Cetak SPJ</a></li>
                <li class="<?php echo $e4;?>"><a href=<?=base_url("help/lokasi");?>><i class="glyphicon glyphicon-info-sign"></i> Lokasi BPSB</a></li>
                
              </ul>
            </li>

            <?php
              
              if($this->session->userdata('login'))
                {
            ?>
            <li class="">
              <a href=<?=base_url('login/logout');?>>
                <i class="glyphicon glyphicon-eject"></i> <span>Keluar</span>
              </a>
            </li>
            <?php
               }
            ?>
            
            


          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>