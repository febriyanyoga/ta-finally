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
	<title>Sistem Pengajuan Kegiatan dan Pengadaan Barang</title>

	<!-- CSS -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<link href="<?php echo base_url();?>assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url()?>assets_2/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets_2/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets_2/css/form-elements.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets_2/css/style.css">

</head>

<body>

	<!-- Fixed navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">SI</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown" style="">
						<a href="#" class="dropdown-toggle btn" style="padding: 10px 20px 10px 20px; margin-top: 4px;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Unduh Prosedur<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<?php 
							$new_tgl_brg 		= date('d-m-Y', strtotime($prosedur_barang[0]->created_at)); 
							$new_time_brg		= date('H:i:s', strtotime($prosedur_barang[0]->created_at));
							$new_tgl_peg 		= date('d-m-Y', strtotime($prosedur_pegawai[0]->created_at)); 
							$new_time_peg		= date('H:i:s', strtotime($prosedur_pegawai[0]->created_at));
							$new_tgl_mhs 		= date('d-m-Y', strtotime($prosedur_mahasiswa[0]->created_at)); 
							$new_time_mhs		= date('H:i:s', strtotime($prosedur_mahasiswa[0]->created_at));
							$link_peg = base_url()."assets/file_prosedur/".$prosedur_pegawai[0]->nama_file;
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
					<li><a class="btn btn-primary masuk" style="padding: 10px 20px 10px 20px; margin-top: 4px; margin-left: 10px;" href="<?php echo base_url('LoginC/')?>">Masuk</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<!-- Top content -->
	<div class="top-content">

		<div class="inner-bg">
			<div class="container">
				?>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 form-box" style="margin-top: 1%; ">
						<form role="form" action="<?php echo base_url(); ?>UserC/daftar" method="post" class="registration-form">
							<fieldset>
								<div class="form-top">
									<div class="form-top-left">
										<h4>Isi Data Diri :</h4>
									</div>
								</div>
								<div class="form-bottom">
									<?php echo $this->session->flashdata('msg');  
									$data=$this->session->flashdata('sukses');
									if($data!=""){ ?>
									<div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
									<?php } ?>
									<?php 
									$data2=$this->session->flashdata('error');
									if($data2!=""){ ?>
									<div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
									<?php } ?>

									<div class="form-group">
										<label class="sr-only" for="form-first-name">No Identitas</label>
										<input type="text" onkeypress="return hanyaAngka(event)" class="form-control" id="no_identitas" name="no_identitas" placeholder="Nomor Identitas" required>
										<span class="text-danger" style="color: red;"><?php echo form_error('no_identitas'); ?></span>  
									</div>
									<div class="form-group">
										<label class="sr-only" for="form-last-name">Nama Lengkap</label>
										<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>  
										<span class="text-danger" style="color: red;"><?php echo form_error('nama'); ?></span> 
									</div>
									<div class="form-group">
										<label>Jenis Kelamin  </label><span> <label> : </label></span>
										<label class="radio-inline">
											<input type="radio" name="jen_kel" id="Laki - laki" value="Laki - laki" checked>Laki - laki
										</label>
										<label class="radio-inline">
											<input type="radio" name="jen_kel" id="Perempuan" value="Perempuan">Perempuan
										</label>
									</div> 
									<div class="form-group">
										<!-- <label>Nomor Handphone</label> -->
										<input type="text" onkeypress="return hanyaAngka(event)" class="form-control" name="no_hp" placeholder="Nomor Handphone" required>
									</div>
									<div class="row">  
										<div class="col-sm-7">
											<div class="form-group">  
												<!-- <label class="control-label" for="tmp_lahir">Tempat Lahir</label>   -->
												<div>  
													<input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" placeholder="Tempat Lahir" required>  
													<span class="text-danger" style="color: red;"><?php echo form_error('tmp_lahir'); ?></span>  
												</div>  
											</div>  
										</div>
										<div class="col-sm-4">
											<div class="form-group">  
												<!-- <label class="control-label" for="tmp_lahir">Tanggal Lahir</label>   -->
												<div class="input-group date">
													<input type="text" class="form-control" id="tgl_lahir" style="width: 190px;" name="tgl_lahir" value="<?php echo set_value('tgl_lahir');?>" placeholder="dd-mm-yyyy" required>
												</div>           
											</div>  
										</div>
									</div>
									<div class="form-group">
										<!-- <label>Alamat</label> -->
										<textarea name="alamat" value="" class="form-control" placeholder="Alamat" rows="2" required></textarea>
									</div>
									<button type="button" class="btn btn-next btn-primary">Next</button>
								</div>
							</fieldset>

							<fieldset>
								<div class="form-top">
									<div class="form-top-left">
										<h4>Isi Data Akun :</h4>
									</div>
								</div>
								<div class="form-bottom">
									<div class="form-group">
										<label for="bidang"> Bidang yang akan di lamar :</label> 
										<select class="form-control" name="kode_unit" id="kode_unit" required>

											<option value="">---- Pilih Unit ---- </option>
											<?php 
											foreach ($pilihan_unit as $unit) {
												?>
												<option value="<?php echo $unit['kode_unit'] ;?>"> <?php echo $unit['nama_unit'] ;?> </option>
												<?php
											}
											?>
										</select> 

										<span class="text-danger" style="color: red;"><?php echo form_error('kode_jabatan'); ?></span>  
									</div>
									<div class="form-group">
										<!-- <label for="bidang"> Bidang yang akan di lamar :</label> -->
										<select class="form-control" name="kode_jabatan" id="kode_jabatan" required>
											<option>---- Pilih Jabatan ---- </option>
										</select>
										<span class="text-danger" style="color: red;"><?php echo form_error('kode_jabatan'); ?></span>  
									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="sr-only" for="form-email">Email</label>
											<input type="email" class="form-control" id="email" name="email" placeholder="Email..." required>  
											<span class="text-danger" style="color: red;"><?php echo form_error('email'); ?></span> 
										</div>
										<div class="form-group">
											<label class="sr-only" for="form-password">Password</label>
											<input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi..." required>  
											<span class="text-danger"><?php echo form_error('password'); ?></span>
										</div>
										<div class="form-group">
											<label class="sr-only" for="form-repeat-password">Repeat password</label>
											<input type="password" class="form-control" id="confirmpswd" name="confirmpswd" placeholder="konfirmasi Kata Sandi..." required>  
											<span class="text-danger"><?php echo form_error('confirmpswd'); ?></span>
										</div>
										<button type="button" class="btn btn-previous">Previous</button>
										<button type="submit" id="btnSubmit" class="btn pull-right">Daftar</button>
									</div>
								</div>
							</fieldset>
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
		function hanyaAngka(evt) {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))

				return false;
			return true;
		}
		$(function() {
			$("#tgl_lahir").datepicker({
				maxDate : "-20yy",
				dateFormat: 'dd-mm-yy'
			});
		});

		var baseURL= "<?php echo base_url();?>";
		
		$(document).ready(function(){
			
                // City change
                $('#kode_unit').change(function(){
                	var unit = $(this).val(); //ambil value dr kode_unit
                	// window.alert(unit);

                    // AJAX request
                    $.ajax({
                    	url:'<?=base_url()?>UserC/get_jabatan',
                    	method: 'post',
                    	data: {kode_unit: unit}, // data post ke controller 
                    	dataType: 'json',
                    	success: function(response){
                            // Remove options
                            $('#kode_jabatan').find('option').not(':first').remove();

                            // Add options
                            $.each(response,function(daftar,data){
                            	$('#kode_jabatan').append('<option value="'+data['kode_jabatan']+'">'+data['nama_jabatan']+' '+data['nama_unit']+'</option>');
                            });
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
		$(function () {
			$("#btnSubmit").click(function () {
				var password = $("#password").val();
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