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
        <ul class="nav navbar-nav navbar-right">
          <li><a class="btn btn-primary masuk" style="padding: 10px 20px 10px 20px; margin-top: 4px; margin-right: auto;" href="<?php echo base_url('LoginC/')?>">Masuk</a></li>
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
          <div class="col-md-2">
          </div>
          <div class="col-md-8" style="color: white;">
            <center>
              <img style="width: 25%; padding-top: 5%;" src="<?php echo base_url();?>assets/image/logo/email-sent.png">
              <div>
                <h1 style="color: white;">Mohon periksa email anda... </h1>
              </div>
              <div>
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
                    <?php echo $this->session->flashdata('msg'); 
                    ?>            
                    <p> Email Salah? Silahkan masukkan kembali <a href="#" name="email" onclick="formResend()">email</a> anda...</p>
                  </div>
                  <div>
                    <form id="formResend" action="<?php echo base_url(); ?>UserC/post_resend_email" method="post" style="display: none;" >
                      <div class="row">
                        <div class="form-group col-md-4 col-sm-4">
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                          <div>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required> 
                            <input type="hidden" name="id_pengguna" id="id_pengguna" value="<?php echo $_SESSION['id_pengguna']; ?>">  <!-- ambil data no identitas buat update email -->
                            <span class="text-danger"><?php echo form_error('email'); ?></span><br>  
                            <div class="form-group">
                              <button type="submit" class="btn btn-outline" name="submit"> Kirim Ulang </button>
                            </div>
                          </div>
                        </div> 
                        <div class="form-group col-md-4 col-sm-4">
                        </div> 
                      </div>
                      <div class="row">

                      </div>
                    </form>
                  </div>
                </center>

              </div>
              <div class="col-md-2">
              </div>
            </div>
          </div>
        </div>


      </div>       
    </div>             
  </body>
  </html>
  <script type="text/javascript">
    function formResend(){
      $('#formResend').show();
    }
  </script>
  <script src="<?php echo base_url()?>assets_2/js/jquery-1.11.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.4.min.js"></script>
  <script src="<?php echo base_url()?>assets_2/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assets_2/js/jquery.backstretch.min.js"></script>
  <script src="<?php echo base_url()?>assets_2/js/retina-1.1.0.min.js"></script>
  <script src="<?php echo base_url()?>assets_2/js/scripts.js"></script>