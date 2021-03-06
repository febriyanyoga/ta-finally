<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url();?>assets/icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assets/icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/icon/favicon-16x16.png">
	<script type="text/javascript">
		var txt="SISTEM INFORMASI PENGAJUAN KEGIATAN DAN PENGADAAN BARANG - ";
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
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<link href="<?php echo base_url();?>assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url()?>assets_2/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets_2/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets_2/css/form-elements.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets_2/css/style.css">

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
	<!-- Top content -->
	<div class="top-content">

		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 form-box" style="margin-top: 1%; ">
						<form role="form" action="<?php echo base_url(); ?>LoginC/kirim_reset" method="post" class="registration-form">
							<div class="form-top" style="margin-top: 30px; vertical-align: middle;">
								<center><h4 style="color: white; margin-top: 30px;">Atur ulang kata sandi </h4></center>
							</div>
							<div class="form-bottom">
								<!-- Alert -->
								<?php if ($this->session->flashdata('message')): ?>
									<div class="alert alert-<?php echo $this->session->flashdata('style'); ?> fade in">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<strong><?php echo $this->session->flashdata('alert'); ?></strong>&nbsp; <?php echo $this->session->flashdata('message'); ?>
									</div>
								<?php endif; ?>
								<!-- End Alert -->
								<div class="form_error">
									<?php echo validation_errors(); ?>
								</div>
								<div class="form-group">
									<label class="sr-only" for="form-email">Kata Sandi Baru</label>
									<input type="text" name="token" id="token" value="<?php echo $token; ?>" hidden>
									<input type="password" class="form-control" id="kata_sandi" name="kata_sandi" placeholder="Kata Sandi Baru..." required >  
								</div>
								<div class="form-group">
									<label class="sr-only" for="form-email">Ulangi Kata Sandi Baru</label>
									<input type="password" class="form-control" id="confirmpswd" name="confirmpswd" placeholder="Ulangi Kata Sandi Baru ..." required >  
									<p id="demo" style="color: red;"></p>
								</div>
								<div>
									<center><input type="submit" class="btn btn-primary" id="btnSubmit" value="Kirim" style="padding-left: 5%; padding-right: 5%;"></input></center>
								</div>
								<div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Javascript -->
	<script src="<?php echo base_url()?>assets_2/js/jquery-1.11.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.4.min.js"></script>
	<script src="<?php echo base_url()?>assets_2/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets_2/js/jquery.backstretch.min.js"></script>
	<script src="<?php echo base_url()?>assets_2/js/retina-1.1.0.min.js"></script>
	<script src="<?php echo base_url()?>assets_2/js/scripts.js"></script>

	<script type="text/javascript">
		$(function () {
			$("#btnSubmit").click(function () {
				var password = $("#kata_sandi").val();
				var confirmPassword = $("#confirmpswd").val();
				var pass_length = password.length;
				if (password != confirmPassword) {
					alert("Kata sandi tidak sama.");
                    // document.getElementById("demo").innerHTML = "Kata sandi tidak sama.";
                    return false;
                }else{
                	if(pass_length < 6){
                		alert("Panjang Kata sandi minimal 6 karakter");
                		return false;
                	}else{
                		if(pass_length > 50){
                			alert("Panjang Kata sandi maksimal 50 karakter");
                			return false;
                		}else{
                			return true;
                		}
                	}
                }
            });
		});
	</script>
</body>

</html>