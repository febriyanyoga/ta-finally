<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">        
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- u/ membuat title berjalan -->
  <script type="text/javascript">
    var txt="SISTEM INFORMASI PENGAJUAN KEGIATAN DAN PENGADAAN BARANG- ";
    var speed=300;
    var refresh=null;
    function action(){
      document.title=txt;
      txt=txt.substring(1,txt.length)+txt.charAt(0);
      refresh=setTimeout("action()",speed);
    }
    action();
  </script>        

  <!-- CSS -->
  <!--  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/form-elements.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_2.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/media-queries.css"> -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
  <link href="<?php echo base_url();?>assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url()?>assets_2/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets_2/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets_2/css/form-elements.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style_2.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets_2/css/style.css"> -->
  <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url();?>assets/icon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assets/icon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/icon/favicon-16x16.png">
</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li class="dropdown" style="">
            <a href="#" class="dropdown-toggle btn " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Unduh Prosedur<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <?php 
              $new_tgl_brg    = date('d-m-Y', strtotime($prosedur_barang[0]->created_at)); 
              $new_time_brg   = date('H:i:s', strtotime($prosedur_barang[0]->created_at));
              $new_tgl_peg    = date('d-m-Y', strtotime($prosedur_pegawai[0]->created_at)); 
              $new_time_peg   = date('H:i:s', strtotime($prosedur_pegawai[0]->created_at));
              $new_tgl_mhs    = date('d-m-Y', strtotime($prosedur_mahasiswa[0]->created_at)); 
              $new_time_mhs   = date('H:i:s', strtotime($prosedur_mahasiswa[0]->created_at));
              $link_peg       = base_url()."assets/file_prosedur/".$prosedur_pegawai[0]->nama_file;
              ?>

              <li class="dropdown-header"><strong>Kegiatan</strong></li>
              <?php $link_mhs = base_url()."assets/file_prosedur/".$prosedur_mahasiswa[0]->nama_file;?>
              <li><a href="<?php echo $link_mhs?>" target="_blank">Pengajuan Kegiatan Mahasiswa</a></li>
              <li class="dropdown-header" style="margin-top: -10px;"><small>diperbarui tanggal <?php echo $new_tgl_mhs." ".$new_time_mhs;?></small></li>
              <li><a href="<?php echo $link_peg?>" target="_blank">Pengajuan Kegiatan Pegawai</a></li>
              <li class="dropdown-header" style="margin-top: -10px;"><small>diperbarui tanggal <?php echo $new_tgl_peg." ".$new_time_peg;?></small></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-header"><strong>Barang</strong></li>
              <?php $link_brg = base_url()."assets/file_prosedur/".$prosedur_barang[0]->nama_file;?>
              <li><a href="<?php echo $link_brg;?>" target="_blank">Pengadaan Barang</a></li>
              <li class="dropdown-header" style="margin-top: -10px;"><small>diperbarui tanggal <?php echo $new_tgl_brg." ".$new_time_brg;?></small></li>
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <!-- Loader -->
  <div class="loader" style="display: none;">
    <div class="loader-img" style="display: none;"></div>
  </div>

  <!-- Top content -->
  <div class="top-content" style="position: relative; z-index: 0; background: none;">
   <header class="header-top">

   </header>
   <div class="background">
    <div class="inner-bg">
      <div class="container">
        <div class="row">
          <div class="col-sm-7 text sticky-top sticky-pills">
            <div class="">
              <img src="<?php echo base_url();?>assets/img/logo2.png" style="height: 20%; width: 20%;">
              <h4> Sistem Pengajuan Kegiatan dan Pengadaan Barang</h4>
              <h4>Departemen Teknik Elektro dan Informatika</h4>
              <h4>Sekolah Vokasi</h4>
              <h4>Universitas Gadjah Mada</h4>
            </div>
          </div>
          <div class="col-sm-5 form-box wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
            <div class="form-top">
              <div class="form-top-left">
                <h3>Silahkan Masuk </h3>
                <p>Masukkan email dan sandi anda disini : </p>
              </div>
              <div>
              <!--   <div>  
                  <p><?php echo $this->session->flashdata('msg'); ?></p>  
                </div> -->
              </div>
            </div>
            <div class="form-bottom">
             <form action="<?php echo site_url('LoginC/signin'); ?>" method="post">

              <?php 
              $data=$this->session->flashdata('sukses');
              if($data!=""){ ?>
                <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
                <?php } ?>
                <?php 
                $data2=$this->session->flashdata('error');
                if($data2!=""){ ?>
                  <div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
                  <?php } ?>

                  <!-- Alert -->

                  <?php if ($this->session->flashdata('message')): ?>
                    <div class="alert alert-<?php echo $this->session->flashdata('style'); ?> fade in">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <strong><?php echo $this->session->flashdata('alert'); ?></strong>&nbsp; <?php echo $this->session->flashdata('message'); ?>
                    </div>
                  <?php endif; ?>
                  <!-- End Alert -->

                  <div class="form-group">
                    <label class="sr-only" for="form-email">Email</label>
                    <input type="email" name="email" class="form-control email" placeholder="Masukkan email" autofocus required oninvalid="this.setCustomValidity('email tidak boleh kosong')" oninput="setCustomValidity('')">
                  </div>

                  <div class="form-group">
                    <label class="sr-only" for="form-password">Sandi</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan kata sandi" autofocus required oninvalid="this.setCustomValidity('Kata Sandi tidak boleh kosong')" oninput="setCustomValidity('')">
                  </div>

                  <div class="form-group">
                    <center><?=$cap_img?></center>
                  </div>

                  <div class="form-group">
                    <input type="text" name="captcha" class="form-control" placeholder="Masukkan Captcha" required oninvalid="this.setCustomValivdity('Captcha tidak boleh kosong')" oninput="setCustomValidity('')">
                  </div>
                  <input name="submit" type="submit" class="btn btn-lg btn-primary" value="Masuk">
                  <div class="form-links" pull-left>
                    <p style="color: white; font-size: 12pt;">Belum punya akun?   <a href="<?php echo site_url('UserC/daftar')?>" style="color: white; font-weight: normal; text-decoration: underline;">Daftar</a></p>
                    <p style="color: white; margin-top: -20px; font-size: 12pt;">Lupa kata sandi?   <a href="<?php echo site_url('LoginC/atur_ulang')?>" style="color: white; font-weight: normal; text-decoration: underline;">Atur Ulang</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>       
  </div>             
</body>
</html>
<script src="<?php echo base_url()?>assets_2/js/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo base_url()?>assets_2/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets_2/js/jquery.backstretch.min.js"></script>
<script src="<?php echo base_url()?>assets_2/js/retina-1.1.0.min.js"></script>
<script src="<?php echo base_url()?>assets_2/js/scripts.js"></script>