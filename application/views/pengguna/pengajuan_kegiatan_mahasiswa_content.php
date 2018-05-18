tgl_selesai_kegiatan<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header text-center" style="margin-top: 0;">Pengajuan Kegiatan Mahasiswa</h3>
        <!-- <ol class="breadcrumb">
          <li><i class="fa fa-user"></i><a href="#">Pegawai</a></li>
          <li><i class="fa fa-pencil"></i>Kegiatan</li>                
        </ol> -->
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <!-- Alert -->
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

        <div class="card mb-3">
          <div class="card-header">
            <div class="card-body">
              <a class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="icon_plus_alt2"> </i> Ajukan Kegiatan </a>
              <div class="table-responsive">
                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <!-- <th>No. Identitas</th> -->
                      <th class="text-center">Nama Kegiatan</th>
                      <th class="text-center">Tgl Pengajuan</th>
                      <th class="text-center">Tgl Kegiatan</th>
                      <th class="text-center">Dana Diajukan</th>
                      <th class="text-center">File</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($data_kegiatan as $kegiatan) {
                      ?>
                      <tr>
                        <td class="text-center"><?php echo $kegiatan->nama_kegiatan; ?></td>
                        <?php 
                        $tgl_pengajuan = $kegiatan->tgl_pengajuan;
                        $new_tgl_pengajuan = date('d-m-Y',strtotime($tgl_pengajuan));
                        $tgl_kegiatan = $kegiatan->tgl_kegiatan;
                        $new_tgl_kegiatan = date('d-m-Y', strtotime($tgl_kegiatan));
                        $tgl_selesai = $kegiatan->tgl_selesai_kegiatan;
                        $new_tgl_selesai = date('d-m-Y', strtotime($tgl_selesai));
                        ?>
                        <td class="text-center"><?php echo $new_tgl_pengajuan; ?></td>
                        <td class="text-center"><?php echo $new_tgl_kegiatan." - ".$new_tgl_selesai; ?></td>
                        <td>Rp<?php echo number_format($kegiatan->dana_diajukan, 0,',','.') ?>,00</td>
                        <?php $link = base_url()."assets/file_upload/".$kegiatan->nama_file;?>
                        <td class="text-center"><a target="_blank" href="<?php echo $link?>"><span><img src="<?php echo base_url()?>assets/image/logo/pdf.svg" style="height: 30px;"></span></a></td>

                        <td class="text-center">

                          <?php 
                          $progress       = $KegiatanM->get_progress($kegiatan->kode_kegiatan);
                          $progress_tolak = $KegiatanM->get_progress_tolak($kegiatan->kode_kegiatan);

                          $kode = $kegiatan->kode_kegiatan; 
                          $id_staf_keu = $cek_id_staf_keu[0]->kode_jabatan_unit; 
                          $progress_staf_keu = $KegiatanM->get_own_progress($kode, $id_staf_keu);
                              //disetujui
                          $rank_min_mhs =  $KegiatanM->cek_min_mhs()->ranking;
                          $id_rank_min_mhs = $KegiatanM->cek_id_by_rank_mhs($rank_min_mhs)->kode_jabatan_unit;
                          $progress_min_mhs = $KegiatanM->get_own_progress($kode, $id_rank_min_mhs);

                        if($progress_staf_keu > 0){ //sudah ada input staf keu
                          $progress_nama = $KegiatanM->get_progress_by_id($id_staf_keu, $kode)->result()[0]->nama_progress;
                          ?>
                          <a class="label label-warning" href="#modal_progress" id="custID" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" title="klik untuk melihat detail progress"><?php echo $progress_nama?></a>
                          <?php
                        }else{
                          if($progress_tolak == 0 && $progress == 0){ //belum punya progress
                            ?>
                            <a class="label label-info">Mengajukan</a>
                            <?php
                          }else{
                            if($progress_tolak > 0){ //punya progress yang ditolak
                              ?>
                              <a class="label label-danger" href="#modal_progress" id="custID" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" title="klik untuk melihat detail progress">Ditolak</a>
                              <?php
                            }elseif ($progress_min_mhs > 0) { //jika ada inputan progress dari acc kegiatan yang min (ranking trtinggi)
                              ?>
                              <a class="label label-success" href="#modal_progress" id="custID" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" title="klik untuk melihat detail progress">Disetujui</a>
                              <?php
                            }else{
                              ?>
                              <a class="label label-default" href="#modal_progress" id="custID" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" title="klik untuk melihat detail progress">Proses</a>
                              <?php
                            }
                          }
                        }     
                        ?>
                      </td>
                      <td class="text-center">
                        <?php 
                        if($progress > 0 || $progress_tolak > 0){?>
                          <div class="btn-group">
                            <a disabled data-toggle='tooltip' title='edit' class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                            <a disabled data-toggle='tooltip' title='hapus' class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>                            
                          </div>
                          <?php 
                        }else{?>
                          <div class="btn-group">
                            <a href="#" id="custId" data-toggle="modal" data-target="#modal_edit-<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Ubah Pengajuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>

                            <a href="<?php echo base_url('KegiatanC/hapus_pengajuan')."/".$kegiatan->kode_kegiatan;?>" onClick="return confirm('Anda yakin akan menghapus data pengajuan ini?')" data-toggle='tooltip' title='hapus' class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>                            
                          </div>
                          <?php 
                        }
                        ?>
                      </td>
                    </tr>


                    <div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="modal_edit-<?php echo $kegiatan->kode_kegiatan;?>" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                            <h4 class="modal-title">Ubah Pengajuan Kegiatan Mahasiswa</h4>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="panel-body">
                               <div class="alert alert-warning">
                                <ol type="1"> <strong>Perhatian !</strong>
                                  <li>Isi <b>Nama Kegiatan</b> sesuai dengan kegiatan yang ingin dilaksanakan.</li>
                                  <li>Berkas yang diunggah hanya <b>satu(1)</b> berupa berkas <b>.pdf</b>. Apabila membutuhkan lebih dari satu berkas, maka harus dijadikan satu berkas <b>.pdf</b>.</li>
                                  <li>Data yang sudah mendapat persetujuan <b>tidak dapat diubah</b>.</li>
                                </ol>
                              </div>
                              <?php echo form_open_multipart('KegiatanC/post_ubah_pengajuan_kegiatan');?>
                              <form role="form" action="<?php echo base_url(); ?>KegiatanC/post_ubah_pengajuan_kegiatan" method="post">
                                <!-- Alert -->
                                <!-- sampai sini -->
                                <div class="form-group">
                                  <!-- <label>ID Pengguna Jabatan</label> -->
                                  <input class="form-control" type="hidden" id="kode_kegiatan" name="kode_kegiatan" value="<?php echo $kegiatan->kode_kegiatan;?>" required> <!-- ambil id_pimpinan berdasarkan user yang login-->
                                </div>
                                <div class="form-group">
                                  <!-- <label>Kode Jenis Kegiatan</label> -->
                                  <?php
                                  $tgl_kegiatan = $kegiatan->tgl_kegiatan;
                                  $new_tgl_kegiatan = date('d-m-Y', strtotime($tgl_kegiatan));
                                  $tgl_selesai = $kegiatan->tgl_selesai_kegiatan;
                                  $new_tgl_selesai = date('d-m-Y', strtotime($tgl_selesai)); 
                                  if($data_diri->kode_jabatan == '5'){
                                    ?>  
                                    <input class="form-control" type="hidden" id="kode_jenis_kegiatan" name="kode_jenis_kegiatan" value="2" required>
                                    <?php
                                  }else{
                                    ?>
                                    <input class="form-control" type="hidden" id="kode_jenis_kegiatan" name="kode_jenis_kegiatan" value="1" required>
                                    <?php
                                  }
                                  ?>
                                </div>
                                <div class="form-group">
                                  <label>Nama Kegiatan</label>
                                  <input class="form-control" placeholder="Nama Kegiatan" type="text" id="nama_kegiatan" name="nama_kegiatan" value="<?php echo $kegiatan->nama_kegiatan?>" required>
                                  <span class="text-danger" style="color: red;"><?php echo form_error('nama_kegiatan'); ?></span>  
                                </div>
                                <div class="form-group">
                                  <label>Tanggal Pelaksanaan Kegiatan</label>
                                  <div class="row">
                                   <div class="col-md-5">
                                    <input type="text" class="form-control"  id="from-<?php echo $kegiatan->kode_kegiatan;?>" placeholder="hh/bb/ttt" name="tgl_kegiatan" value="<?php echo $new_tgl_kegiatan; ?>" required>
                                  </div>
                                  <div class="col-md-2 text-center">Sampai</div>
                                  <div class="col-md-5">
                                    <input type="text" class="form-control" id="to-<?php echo $kegiatan->kode_kegiatan;?>" placeholder="hh/bb/ttt" name="tgl_selesai_kegiatan" value="<?php echo $new_tgl_selesai ?>" required>
                                  </div>
                                </div>
                                <span class="text-danger" style="color: red;"><?php echo form_error('tgl_kegiatan'); ?></span>  
                              </div>
                              <div class="form-group">
                                <label>Dana yang diajukan</label>
                                <input class="form-control" placeholder="Dana yang diajukan" type="text" onkeypress="return hanyaAngka(event)" id="dana_diajukan-<?php echo $kegiatan->kode_kegiatan;?>" name="dana_diajukan" value="Rp<?php echo number_format($kegiatan->dana_diajukan, 0,',','.') ?>" required>
                                <span class="text-danger" style="color: red;"><?php echo form_error('dana_diajukan'); ?></span>  
                              </div>
                              <div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>
                              <div class="form-group">
                                <label>Unggah Berkas</label>
                                <input type="file" name="file_upload">
                              </div>
                            </div> 
                            <!-- <button type="reset" class="btn btn-default">Reset Button</button> -->
                            <div class="modal-footer">
                              <input type="submit" class="btn btn-info col-lg-2"  value="Submit">
                            </div> 
                          </form>
                          <?php echo form_close()?>
                        </div>
                        <div class="col-lg-1"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <script type="text/javascript">
                  $(function() {
                   var dp = document.getElementById('dana_diajukan-<?php echo $kegiatan->kode_kegiatan?>');
                   dp.addEventListener('keyup', function(e){
                    dp.value = formatRupiah(this.value, 'Rp');
                  });

                   function formatRupiah(angka, prefix){
                    var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split    = number_string.split(','),
                    sisa     = split[0].length % 3,
                    rupiah     = split[0].substr(0, sisa),
                    ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

                    if (ribuan){
                      separator = sisa ? '.' : '';
                      rupiah += separator + ribuan.join('.');
                    }

                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                    return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
                  }
                  $("#from-<?php echo $kegiatan->kode_kegiatan;?>").datepicker({
                    defaultDate: new Date(),
                    minDate: new Date(),
                    onSelect: function(dateStr) 
                    {         
                      $("#to-<?php echo $kegiatan->kode_kegiatan;?>").datepicker("destroy");
                      $("#to-<?php echo $kegiatan->kode_kegiatan;?>").val(dateStr);
                      $("#to-<?php echo $kegiatan->kode_kegiatan;?>").datepicker({ minDate: new Date(dateStr)})
                    }
                  });
                });
              </script>



              <?php
                        # code...
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<!-- project team & activity end -->

</section>

</section>

<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Pengajuan Kegiatan</h4>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="panel-body">
           <div class="alert alert-warning">
            <ol type="1"> <strong>Perhatian !</strong>
              <li>Isi <b>Nama Kegiatan</b> sesuai dengan kegiatan yang ingin dilaksanakan.</li>
              <li>Berkas yang diunggah hanya <b>satu(1)</b> berupa berkas <b>.pdf</b>. Apabila membutuhkan lebih dari satu berkas, maka harus dijadikan satu berkas <b>.pdf</b>.</li>
              <li>Data yang sudah mendapat persetujuan <b>tidak dapat diubah</b>.</li>
            </ol>
          </div>
          <?php echo form_open_multipart('KegiatanC/post_pengajuan_kegiatan_mahasiswa');?>
          <form role="form" action="<?php echo base_url(); ?>KegiatanC/post_pengajuan_kegiatan_mahasiswa" method="post">
            <!-- Alert -->
            <!-- sampai sini -->
            <div class="form-group">
              <!-- <label>ID Pengguna Jabatan</label> -->

              <input class="form-control" type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $data_diri->id_pengguna;?>" required> <!-- ambil id_pengguna_jabatan berdasarkan user yang login-->
            </div>
            <div class="form-group">
              <!-- <label>Kode Jenis Kegiatan</label> -->
              <?php 
              if($data_diri->kode_jabatan == '5'){
                ?>  
                <input class="form-control" type="hidden" id="kode_jenis_kegiatan" name="kode_jenis_kegiatan" value="2" required>
                <?php
              }else{
                ?>
                <input class="form-control" type="hidden" id="kode_jenis_kegiatan" name="kode_jenis_kegiatan" value="1" required>
                <?php
              }
              ?>
            </div>
            <div class="form-group">
              <label>Nama Kegiatan</label>
              <input class="form-control" placeholder="Nama Kegiatan" type="text" id="nama_kegiatan" name="nama_kegiatan" required>
              <span class="text-danger" style="color: red;"><?php echo form_error('nama_kegiatan'); ?></span>  
            </div>
            <div class="form-group">
              <label>Tanggal Pelaksanaan Kegiatan</label>
              <div class="row">
               <div class="col-md-5">
                <input type="text" class="form-control" placeholder="hh/bb/ttt" id="from" name="tgl_kegiatan" required>
              </div>
              <div class="col-md-2 text-center">Sampai</div>
              <div class="col-md-5">
                <input type="text" class="form-control" placeholder="hh/bb/ttt" id="to" name="tgl_selesai_kegiatan" required>
              </div>
            </div>
            <span class="text-danger" style="color: red;"><?php echo form_error('tgl_kegiatan'); ?></span>  
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control" placeholder id="tgl_pengajuan" name="tgl_pengajuan" required value="<?php echo date('Y-m-d');?>">
          </div>
          <div class="form-group">
            <label>Dana yang diajukan</label>
            <input class="form-control" placeholder="Dana yang diajukan" type="text" onkeypress="return hanyaAngka(event)" id="dana_diajukan" name="dana_diajukan" required>
            <span class="text-danger" style="color: red;"><?php echo form_error('dana_diajukan'); ?></span>  
          </div>
          <div class="form-group">
            <input class="form-control" type="hidden" id="dana_disetujui" name="dana_disetujui" value="0">
          </div>

          <div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>
          <div class="form-group">
            <label>Unggah Berkas</label>
            <input type="file" name="file_upload">
          </div>
        </div> 
        <!-- <button type="reset" class="btn btn-default">Reset Button</button> -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-info col-lg-2"  value="Kirim">
        </div> 
        <?php echo form_close()?>
      </form>
    </div>
    <div class="col-lg-1"></div>
  </div>
</div>
</div>
</div>

<script type="text/javascript">
  /* Dengan Rupiah */
  var dp = document.getElementById('dana_diajukan');
  dp.addEventListener('keyup', function(e){
    dp.value = formatRupiah(this.value, 'Rp');
  });

//  var cash = document.getElementById('cash');
//  cash.addEventListener('keyup', function(e){
//   cash.value = formatRupiah(this.value, 'Rp. ');
// });

/* Fungsi */
function formatRupiah(angka, prefix){
  var number_string = angka.replace(/[^,\d]/g, '').toString(),
  split    = number_string.split(','),
  sisa     = split[0].length % 3,
  rupiah     = split[0].substr(0, sisa),
  ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

  if (ribuan){
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }

  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
}
</script>