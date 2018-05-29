<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header text-center" style="margin-top: 0;"> Daftar Pengguna </h3>
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

  <button data-toggle="collapse" data-target="#demo" class="btn btn-info btn-md" title="klik untuk melihat informasi"><i class="glyphicon glyphicon-alert"> Informasi</i></button>
  <br>
  <br>
  <div class="collapse" id="demo">
    <div class="col-lg-6">
      <!-- Info Status -->
      <div class="alert alert-info">
        <p>Berikut adalah penjelasan dari <strong>tombol</strong> di kolom aksi pada tabel daftar pengguna<strong>:</strong></p>
        <table border="3" style="border-color: transparent; border-radius: 5px;" class="table table-sm table-hover borderless">
          <tr style="height: 30px">
            <td style="width: 10%"><a href="#" style="margin-left: 12px;"><span class="glyphicon glyphicon-ok"></span></a></td>
            <td style="width: 6%"><i class="glyphicon glyphicon-arrow-right"></i></td>
            <td style="width: 62%">Tanda seperti ini, menandakan bahwa status aktif</td>
          </tr>
          <tr style="height: 30px">
            <td style="width: 10%"><a href="#" style="margin-left: 12px;"><span class="glyphicon glyphicon-remove"></span></a></td>
            <td style="width: 6%"><i class="glyphicon glyphicon-arrow-right"></i></td>
            <td style="width: 62%">Tanda seperti ini, menandakan bahwa status tidak aktif</td>
          </tr>
          <tr style="height: 30px">
            <td style="width: 10%"><a class="btn btn-sm btn-info"><span class="glyphicon glyphicon-ok"></span></a></td>
            <td style="width: 6%"><i class="glyphicon glyphicon-arrow-right"></i></td>
            <td style="width: 62%">Tombol seperti ini digunakan untuk mengaktifkan akun pengguna.</td>
          </tr>
          <tr style="height: 30px">
            <td style="width: 10%"><a disabled class="btn btn-sm btn-info"><span class="glyphicon glyphicon-ok"></span></a></td>
            <td style="width: 6%"><i class="glyphicon glyphicon-arrow-right"></i></td>
            <td style="width: 62%">Tombol seperti ini sudah tidak bisa digunakan untuk mengaktifkan akun pengguna.</td>
          </tr>
          <br>
          <br>
        </table>
      </div>
    </div>
    <div class="col-lg-6">
      <!-- Keterangan Edit -->
      <div class="alert alert-info">
        <p>Berikut adalah penjelasan dari <strong>tombol</strong> di kolom aksi pada tabel daftar pengguna<strong>:</strong></p>
        <table border="3" style="border-color: transparent;" class="table table-sm table-hover borderless">
          <tr style="height: 30px">
            <td style="width: 10%"><a class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a></td>
            <td style="width: 6%"><i class="glyphicon glyphicon-arrow-right"></i></td>
            <td style="width: 62%">Tombol seperti ini digunakan untuk menon-aktifkan akun pengguna.</td>
          </tr>
          <tr style="height: 30px">
            <td><a disabled class="btn btn-danger btn-sm" disabled><span class="glyphicon glyphicon-remove"></span></a></td>
            <td><i class="glyphicon glyphicon-arrow-right"></i></td>
            <td>Tombol seperti ini sudah tidak bisa digunakan untuk menon-aktifkan akun pengguna.</td>
          </tr>
          <tr style="height: 30px">
            <td><a class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh"></span></a></td>
            <td><i class="glyphicon glyphicon-arrow-right"></i></td>
            <td>Tombol seperti ini digunakan untuk mengganti jabatan pengguna.</td>
          </tr>
          <tr style="height: 30px">
            <td><a disabled class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh"></span></a></td>
            <td><i class="glyphicon glyphicon-arrow-right"></i></td>
            <td>Tombol seperti ini sudah tidak bisa digunakan untuk mengganti jabatan pengguna.</td>
          </tr>
        </table>
      </div>
      <!-- End Ket Edit -->
    </div>
  </div>
  

  <div class="row"> 
    <div class="col-lg-12">
      <div class="card mb-3">
        <div class="card-header">
          <div class="card-body">
            <div class="table-responsive">
             <?php
             $kadep = $PenggunaM->get_pengguna_by_kode_jabatan_unit('1','aktif');
             $sekdep = $PenggunaM->get_pengguna_by_kode_jabatan_unit('2','aktif');
             $manajer_sarpras = $PenggunaM->get_pengguna_by_kode_jabatan_unit('3','aktif');
             $staf_sarpras = $PenggunaM->get_pengguna_by_kode_jabatan_unit('4','aktif');
             $manajer_keuangan = $PenggunaM->get_pengguna_by_kode_jabatan_unit('5','aktif');
             $staf_keuangan = $PenggunaM->get_pengguna_by_kode_jabatan_unit('6','aktif');

             $acc_keg = $PenggunaM->get_persetujuan_kegiatan()->result();
             $i=0;
             $j=0;
             foreach ($acc_keg as $acc) {
              $i++;

              if($PenggunaM->get_pengguna_by_kode_jabatan_unit($acc->kode_jabatan_unit, 'aktif')->num_rows() == 1){
                $j++;
              }
            }
            if($kadep->num_rows() > 0 && $sekdep->num_rows() > 0 && $manajer_sarpras->num_rows() > 0 && $staf_sarpras->num_rows() > 0 && $manajer_keuangan->num_rows() > 0 && $staf_keuangan->num_rows() > 0){
              ?>   
              <div class="alert alert-success">
                <i class="glyphicon glyphicon-ok"></i><strong> Sempurna!</strong> Semua Jabatan Penting telah terpenuhi, Sistem dapat berjalan dengan baik.
              </div> 
              <?php
            }else{
              ?>
              <div class="alert alert-warning">
                <i class="glyphicon glyphicon-exclamation-sign"></i><strong> Perhatian!</strong> Masih ada Jabatan penting yang kosong. Silahkan dilengkapi terlebih dahulu, agar sistem dapat berjalan dengan baik.<br>
                <p>Jabatan yang kosong adalah : </p>
                <?php 
                if($sekdep->num_rows() == 0){
                  echo "<strong>Sekretaris Departemen</strong><br>";
                }
                if ($kadep->num_rows() == 0) {
                  echo "<strong>Kepala Departemen</strong><br>";
                }
                if ($manajer_sarpras->num_rows() == 0) {
                  echo "<strong>Manajer Sarana dan Prasarana</strong><br>";
                }
                if ($staf_sarpras->num_rows() == 0) {
                  echo "<strong>Staf Sarana dan Prasarana</strong><br>";
                }
                if ($manajer_keuangan->num_rows() == 0) {
                  echo "<strong>Manajer Keuangan</strong><br>";
                }
                if ($staf_keuangan->num_rows() == 0) {
                  echo "<strong> Staf Keuangan</strong><br>";
                }

                if($i != $j){
                  echo "<strong>Jabatan yang terlibat pada proses Persetujuan Kegiatan</strong><br>";
                }

                ?>
              </div>
              <?php
            }
            ?>
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="text-center">No.</th>
                  <th class="text-center" style="width: 150px;">Nama</th>
                  <th class="text-center">No. Identitas</th>
                  <th class="text-center">Unit</th>
                  <th class="text-center">Jabatan</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Akun</th>
                  <th class="text-center" style="width: 150px;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i=0;
                foreach ($data_pengguna as $pengguna) {
                  if($pengguna->id_pengguna != $data_diri->id_pengguna){
                    $i++;
                    ?>
                    <tr>
                      <td class="text-center"><?php echo $i;?></td>
                      <td class="relative">
                        <div class="relative">
                          <strong><?php echo $pengguna->nama;?></strong>
                          <a href="#detail_pengguna" id="custID" data-toggle="modal" data-id="<?php echo $pengguna->id_pengguna;?>" title="klik untuk melihat detail kegiatan"><small class="kecil">Lihat detail</small></a>
                        </div>
                      </td>
                      <td class="text-center"><?php echo $pengguna->no_identitas; ?></td>
                      <td class="text-center"><?php echo $pengguna->nama_unit; ?></td>                          
                      <td class="text-center"><?php echo $pengguna->nama_jabatan." ". $pengguna->nama_unit; ?></td>
                      <td class="text-center"><?php if($pengguna->status_email == 0){
                        ?>
                        <a title="Belum Aktif"><span class="glyphicon glyphicon-remove"></a>  
                          <?php
                        }else{
                         ?>
                         <a title="Aktif"><span class="glyphicon glyphicon-ok"></a>
                           <?php
                         } 
                         ?>
                       </td>
                       <?php
                       if($pengguna->status == "tidak aktif"){
                        ?>
                        <td class="text-center">
                          <a title="Belum Aktif"><span class="glyphicon glyphicon-remove"></a>
                          </td>
                          <?php 
                          if($pengguna->status_email == 0){
                            ?>
                            <td class="text-center">
                              <div class="btn-group">
                                <a data-toggle='tooltip' title='Aktifkan email terlebih dahulu' class="btn btn-info btn-sm" disabled><span class="glyphicon glyphicon-ok"></span></a>
                                <a data-toggle='tooltip' title='Non-aktif' class="btn btn-danger btn-sm" disabled><span class="glyphicon glyphicon-remove"></span></a>  
                                <a data-toggle='tooltip' title='Ganti Jabatan' class="btn btn-warning btn-sm" disabled><span class="glyphicon glyphicon-refresh"></span></a>  
                              </div>
                            </td>
                            <?php
                          }else{?>
                           <td class="text-center">
                            <div class="btn-group">
                              <a data-toggle='tooltip' title='Aktif' class="btn btn-info btn-sm" href="<?php echo base_url('PenggunaC/aktif')."/".$pengguna->id_pengguna."/".$pengguna->kode_jabatan_unit."/".$pengguna->kode_unit."/".$pengguna->kode_jabatan;?>"><span class="glyphicon glyphicon-ok"></span></a>
                              <a data-toggle='tooltip' title='Non-aktif' class="btn btn-danger btn-sm" disabled><span class="glyphicon glyphicon-remove"></span></a>   
                              <a data-toggle='tooltip' title='Ganti Jabatan' class="btn btn-warning btn-sm" disabled><span class="glyphicon glyphicon-refresh"></span></a>  
                            </div>
                          </td>
                          <?php 
                        }
                      }else{
                        ?>
                        <td class="text-center">
                          <a title="Aktif"><span class="glyphicon glyphicon-ok"></a>
                          </td>
                          <td class="text-center">
                            <div class="btn-group">
                              <a  data-toggle='tooltip' title='Aktif' class="btn btn-info btn-sm" disabled><span class="glyphicon glyphicon-ok"></span></a>
                              <a data-toggle='tooltip' title='Non-aktif' class="btn btn-danger btn-sm" href="<?php echo base_url('PenggunaC/non_aktif')."/".$pengguna->id_pengguna;?>" ><span class="glyphicon glyphicon-remove"></span></a>

                              <a data-toggle="modal" title="Ganti Jabatan" class="btn btn-warning btn-sm" data-target="#modal_ubah_jabatan-<?php echo $pengguna->id_pengguna?>"><span class="glyphicon glyphicon-refresh"></span></a>
                            </div>
                            <?php
                          }
                        }
                        ?>

                      </td>
                    </tr>

                    <div aria-hidden="true" aria-labelledby="modal_ubah_jabatan-<?php echo $pengguna->id_pengguna?>" role="dialog" tabindex="-1" id="modal_ubah_jabatan-<?php echo $pengguna->id_pengguna?>" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                            <h4 class="modal-title">Ubah Jabatan</h4>
                          </div>
                          <div class="modal-body">
                            <?php echo form_open_multipart('PenggunaC/ganti_jabatan');?>
                            <form role="form" action="<?php echo base_url(); ?>PenggunaC/ganti_jabatan" method="post">
                              <div class="alert alert-warning">
                                <strong>Perhatian!</strong>
                                <ol type="1">
                                  <li>Pergantian <strong>jabatan </strong>seorang <strong>pimpinan unit</strong> dapat dicarikan pengganti <strong>(dari unit yang sama/staf)</strong> agar jabatan <strong>tidak kosong</strong> dan sistem dapat berjalan dengan <strong>baik</strong>.</li>
                                  <li>Jabatan <strong>pimpinan unit</strong> hanya dapat diisi oleh <strong>1 pengguna aktif</strong> saja.</li>
                                  <li>Pergantian jabatan dari <strong>pimpinan unit</strong> ke <strong>pimpinan unit</strong> dapat dilakukan apabila pimpinan unit yang akan digantikan <strong>dinon-aktifkan</strong></li>
                                </ol>
                              </div>
                              <div class="form-group">
                                <input type="hidden" name="id_pengguna" value="<?php echo $pengguna->id_pengguna?>">
                                <input type="hidden" name="own_kode_unit" value="<?php echo $pengguna->kode_unit?>">
                                <input type="hidden" name="own_kode_jabatan" value="<?php echo $pengguna->kode_jabatan?>">
                                <input type="hidden" name="own_kode_jabatan_unit" value="<?php echo $pengguna->kode_jabatan_unit?>">
                                <input type="hidden" name="own_atasan" value="<?php echo $pengguna->atasan?>">
                                <div class="relative">
                                  <h4><strong><?php echo $pengguna->nama?></strong></h4>
                                  <h5><?php echo $pengguna->nama_jabatan." ".$pengguna->nama_unit?></h5> 
                                </div>
                                <br>
                                <label for="bidang"> Pindah Ke Jabatan Unit :</label> 
                                <select class="form-control" name="kode_unit" id="kode_unit-<?php echo $pengguna->id_pengguna?>" required>

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
                                <select class="form-control" name="kode_jabatan" id="kode_jabatan-<?php echo $pengguna->id_pengguna?>" required>
                                  <option>---- Pilih Jabatan ---- </option>
                                </select>
                                <span class="text-danger" style="color: red;"><?php echo form_error('kode_jabatan'); ?></span>  
                              </div>
                              <?php
                              $pengganti = $PenggunaM->get_id_bukan_atasan_bukan_dia($pengguna->kode_unit, $pengguna->id_pengguna)->num_rows();
                              if($pengganti == 0 || $pengguna->atasan == "tidak"){

                              }else{
                                ?>  
                                <div class="form-group">
                                  <label for="bidang"> Cari Pengganti : </label> 
                                  <input type="radio" name="ganti" id="ganti" value="1" checked> Ya
                                  <input type="radio" name="ganti" id="ganti" value="2"> Tidak
                                </div>
                                <label for="bidang"><?php echo "ada ".$pengganti." orang yang dapat mengganti";?> </label> 
                                <?php
                              }
                              ?>
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-primary"  value="Kirim">
                              </div> 
                              <?php echo form_close()?>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <script type="text/javascript">
                             // kode_unit change
                             $('#kode_unit-<?php echo $pengguna->id_pengguna?>').change(function(){
                                var unit = $(this).val(); //ambil value dr kode_unit
                                  // AJAX request
                                  $.ajax({
                                    url:'<?=base_url()?>UserC/get_jabatan',
                                    method: 'post',
                                    asycn : false,
                                    data: {kode_unit: unit}, // data post ke controller 
                                    dataType: 'json',
                                    success: function(response){
                                          // Remove options
                                          $('#kode_jabatan-<?php echo $pengguna->id_pengguna?>').find('option').not(':first').remove();

                                          // Add options
                                          $.each(response,function(daftar,data){
                                            $('#kode_jabatan-<?php echo $pengguna->id_pengguna?>').append('<option value="'+data['kode_jabatan']+'">'+data['nama_jabatan']+' '+data['nama_unit']+'</option>');
                                          });
                                        }
                                      });
                                });
                              </script>
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

       // City change
       $('#kode_unit').change(function(){
        alert("assassass");
        var unit = $(this).val(); //ambil value dr kode_unit
        // window.alert(unit);

          // AJAX request
          $.ajax({
            url:'<?=base_url()?>UserC/get_jabatan',
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
   </script>