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
	<title>Sistem Pengajuan Kegiatan dan Pengadaan Barang - Atur Ulang Kata Sandi</title>

	<!-- CSS -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<link href="<?php echo base_url();?>assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url()?>assets_2/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets_2/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets_2/css/form-elements.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets_2/css/style.css">

</head>

<body>
	<!-- Top content -->
	<div class="top-content">

		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 form-box" style="margin-top: 1%; ">
						<form role="form" action="<?php echo base_url(); ?>LoginC/kirim_reset" method="post" class="registration-form">
							<div class="form-top" style="margin-top: auto;">
								<div class="form-top-left">
									<h4>Masukkan Kata Sandi Baru</h4>
								</div>
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
									<input type="submit" class="btn btn-primary" id="btnSubmit" value="Kirim" style="padding-left: 5%; padding-right: 5%;"></input>
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