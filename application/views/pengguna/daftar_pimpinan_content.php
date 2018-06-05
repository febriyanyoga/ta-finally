<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header text-center" style="margin-top: 0;"> Daftar Pimpinan Unit </h3>
        <!-- <ol class="breadcrumb">
          <li><i class="fa fa-user"></i><a href="#">Admin</a></li>
          <li><i class="fa fa-user"></i>Pengguna</li>                
        </ol> -->
      </div>
    </div>
    <!-- isi content disini -->

    <div class="row">
      <div class="col-lg-12">
       <?php 
       $data=$this->session->flashdata('sukses');
       if($data!=""){ ?>
        <div class="alert alert-success fade in" id="success-alert"><strong>Sukses! </strong> <?=$data;?>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div>
    <?php } ?>
    <?php 
    $data2=$this->session->flashdata('error');
    if($data2!=""){ ?>
      <div class="alert alert-danger fade in" id="success-alert"><strong> Galat! </strong> <?=$data2;?>
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
  <?php } ?>
</div>
</div>  

<div class="row"> 
  <div class="col-lg-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="card-body">
         <a class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="icon_plus_alt2"></i> Tambah akun pimpinan </a>
         <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center">No.</th>
                <th class="text-center" style="width: 150px;">Nama</th>
                <th class="text-center">No. Identitas</th>
                <th class="text-center">Unit</th>
                <th class="text-center">Jabatan</th>
                <!-- <th class="text-center" style="width: 150px;">Periode</th> -->
                <th class="text-center" style="width: 150px;">aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=0;
              foreach ($data_pengguna as $pengguna) {
                if($pengguna->id_pengguna != $data_diri->id_pengguna && $pengguna->atasan == "ya" && $pengguna->status == "aktif" && $pengguna->status_email == 1){
                  $i++;
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $i;?></td>
                    <td class="text-center relative">
                      <div class="relative">
                        <?php 
                        $data_pengguna = $PenggunaM->get_data_diri_by_id($pengguna->id_pengguna)->result();
                        // var_dump($data_pengguna);
                        if(empty($data_pengguna)){
                          ?>   
                          Belum ada pengguna
                          <?php
                        }else{
                         ?>   
                         <strong><?php echo $data_pengguna[0]->nama?></strong>
                         <a href="#detail_pengguna" id="custID" data-toggle="modal" data-id="<?php echo $pengguna->id_pengguna;?>" title="klik untuk melihat detail kegiatan"><small class="kecil">Lihat detail</small></a>
                         <?php
                       }
                       ?>
                     </div>
                   </td>
                   <td class="text-center">
                    <?php 
                    if($pengguna->no_identitas){
                      echo $pengguna->no_identitas;
                    }else{
                      echo "Belum ada pengguna";
                    }
                    ?>
                  </td>
                  <td class="text-center"><?php echo $pengguna->nama_unit; ?></td>                          
                  <td class="text-center"><?php echo $pengguna->nama_jabatan." ". $pengguna->nama_unit; ?></td>
                  <!-- <td class="text-center"></td> -->
                  <td class="text-center">
                    <a data-toggle="modal" title="Ganti pengguna" class="btn btn-default btn-sm" data-target="#modal_ubah_jabatan-<?php echo $pengguna->id_pengguna?>"><span class="glyphicon glyphicon-user"></span></a>
                    <a href="<?php echo base_url().'PenggunaC/reset_password/'.$pengguna->id_pengguna;?>" onClick="return confirm('Anda yakin akan mengatur ulang kata sandi akun ini?')" data-toggle="modal" title="Reset kata sandi" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-refresh"></span></a>
                  </td>
                  <?php
                }
                ?>

              </td>
            </tr>

            <div aria-hidden="true" aria-labelledby="modal_ubah_jabatan-<?php echo $pengguna->id_pengguna?>" role="dialog" tabindex="-1" id="modal_ubah_jabatan-<?php echo $pengguna->id_pengguna?>" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Ubah Pengguna</h4>
                  </div>
                  <div class="modal-body">
                    <?php echo form_open_multipart('PenggunaC/ganti_pengguna');?>
                    <form role="form" action="<?php echo base_url(); ?>PenggunaC/ganti_pengguna" method="post">
                      <div class="form-group">
                        <input type="hidden" name="id_pengguna" value="<?php echo $pengguna->id_pengguna?>">
                        <div class="relative">
                          <h3><strong><?php echo $pengguna->nama_jabatan." ".$pengguna->nama_unit?></strong></h3> 
                          <h4><?php
                          if(empty($data_pengguna)){
                            echo "Belum ada pengguna";
                          }else{
                            echo $data_pengguna[0]->nama;
                          }
                          ?></h4>
                        </div>
                        <br>
                        <label for="bidang"> di pindah jabatan ke :</label> 
                        <select class="form-control" name="no_identitas" required>

                          <option value="">---- Pilih pengguna ---- </option>
                          <?php 
                          foreach ($data_pengguna_lagi as $pengguna_){
                            if($pengguna_->status == "aktif" && $pengguna_->status_email == 1){ 
                              ?>
                              <option value="<?php echo $pengguna_->no_identitas?>"> <?php echo $pengguna_->nama;?> </option>
                              <?php
                            }
                          }
                          ?>
                        </select> 

                        <span class="text-danger" style="color: red;"><?php echo form_error('kode_jabatan'); ?></span>  
                      </div>
                      <div class="modal-footer">
                        <input type="submit" class="btn btn-primary"  value="Kirim">
                      </div> 
                      <?php echo form_close()?>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>


<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title"> Tambah akun pimpinan</h4>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="panel-body">
            <?php echo form_open_multipart('PenggunaC/tambah_akun_pimpinan');?>
            <form role="form" action="<?php echo base_url(); ?>PenggunaC/tambah_akun_pimpinan" method="post">
              <div class="form-group">
                <select class="form-control" name="kode_unit" id="kode_unit" required>
                  <option value="">---- Pilih Unit ----</option>
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
                <select class="form-control" name="kode_jabatan" id="kode_jabatan" required>
                  <option>---- Pilih Jabatan ----</option>
                </select>
                <span class="text-danger" style="color: red;"><?php echo form_error('kode_jabatan'); ?></span>  
              </div>
              <div class="form-group">
                <label>Email</label>
                <input class="form-control" placeholder="Email" type="email" id="email" name="email" required>
                <span class="text-danger" style="color: red;"><?php echo form_error('email'); ?></span>  
              </div>
              <div class="form-group">
                <label for="kata_sandi">Kata sandi</label>
                <input type="password" class="form-control" id="kata_sandi" name="kata_sandi" required placeholder="Kata Sandi Baru">
                <span class="text-danger"><?php echo form_error('kata_sandi'); ?></span>
              </div>
              <div class="form-group">
                <label for="konfirmasi_kata_sandi">Konfirmasi kata sandi</label>
                <input type="password" class="form-control" id="konfirmasi_kata_sandi" name="konfirmasi_kata_sandi" required placeholder="Konfirmasi Kata Sandi Baru">
                <span class="text-danger"><?php echo form_error('konfirmasi_kata_sandi'); ?></span>
              </div>
            </div> 
            <!-- <button type="reset" class="btn btn-default">Reset Button</button> -->
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary col-lg-2" id="btnSubmit" value="Simpan">
            </div> 
          </form>
          <?php echo form_close()?>
        </div>
        <div class="col-lg-1"></div>
      </div>
    </div>
    <!-- batas content -->

  </section>

</section>


<!-- modal detail kegiatan -->
<div class="modal fade" id="detail_pengguna" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Pengguna</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    // js detail pengajuan
    $(document).ready(function(){
      $('#detail_pengguna').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type : 'get',
              url : '<?php echo base_url().'PenggunaC/detail_pengguna/'?>'+rowid,
                //data :  'rowid='+ rowid, // $_POST['rowid'] = rowid
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
              }
            });
          });
        // kode_unit change
        $('#kode_unit').change(function(){
          var unit = $(this).val(); //ambil value dr kode_unit
            // AJAX request
            $.ajax({
              url:'<?=base_url()?>UserC/get_jabatan_pimpinan',
              method: 'post',
              asycn : false,
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

    $(function () {
      $("#btnSubmit").click(function () {
        var password        = $("#kata_sandi").val();
        var confirmPassword = $("#konfirmasi_kata_sandi").val();
        var kode_unit       = $("#kode_unit").val();
        var kode_jabatan    = $("#kode_jabatan").val();
        var email           = $("#email").val();
        var pass_length     = password.length;
        if (password != confirmPassword && kode_unit != '' && kode_jabatan != '' && email != '') {
          alert("Kata sandi tidak sama.");
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
  <script type="text/javascript">

  </script>