<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">

       <!-- Alert -->
       <?php
       $data=$this->session->flashdata('sukses');
       if($data!=""){ ?>
       <div class="alert alert-success" id="success-alert"><strong>Sukses! </strong> <?=$data;?></div>
       <?php } ?>
       <?php 
       $data2=$this->session->flashdata('error');
       if($data2!=""){ ?>
       <div class="alert alert-danger" id="success-alert"><strong> Error! </strong> <?=$data2;?></div>
       <?php } ?>
       <!-- sampai sini -->
       <h3 class="page-header" style="margin-top: 0;"><center>Persetujuan RAB</center></h3>
     </div>
   </div>

   <button data-toggle="collapse" data-target="#demo" class="btn btn-info btn-md" title="klik untuk melihat informasi"><i class="glyphicon glyphicon-alert"> Informasi</i></button><br><br>

   <div class="collapse" id="demo">
    <div class="col-lg-6">
      <!-- Info Status -->
      <div class="alert alert-info">
        <strong>Informasi!</strong>
        <p>Berikut adalah penjelasan dari <strong>status</strong> pada tabel pengajuan barang<strong>:</strong></p>
        <table border="3" style="border-color: transparent;" >
          <tr style="height: 30px">
            <td style="width: 10%"><a class="label label-primary">BARU</a></td>
            <td style="width: 6%"><i class="glyphicon glyphicon-arrow-right"></i></td>
            <td style="width: 62%"> Status ini menjelaskan bahwa pengajuan barang baru saja di ajukan dan belum memiliki progres</th>
            </tr>
            <tr style="height: 30px">
              <td><a class="label label-info">PROSES</a></td>
              <td><i class="glyphicon glyphicon-arrow-right"></i></td>
              <td> Status ini menjelaskan bahwa pengajuan barang sedang dalam proses persetujuan</td>
            </tr>
            <tr style="height: 30px">
              <td><a class="label label-success">PENGAJUAN</a></td>
              <td><i class="glyphicon glyphicon-arrow-right"></i></td>
              <td> Status ini menjelaskan bahwa pengajuan barang sudah disetujui dan sedang dalam proses pengajuan RAB</td>
            </tr>
            <tr style="height: 30px">
              <td><a class="label label-success">SELESAI</a></td>
              <td><i class="glyphicon glyphicon-arrow-right"></i></td>
              <td> Status ini menjelaskan bahwa pengajuan barang telah selesai</td>
            </tr>
            <tr style="height: 30px">
              <td><a class="label label-warning">TUNDA</a></td>
              <td><i class="glyphicon glyphicon-arrow-right"></i></td>
              <td> Status ini menjelaskan bahwa pengajuan barang sedang di tunda untuk diajukan dalam RAB dan akan diajukan pada pengajuan RAB berikutnya</td>
            </tr>
            <tr style="height: 30px">
              <td><a class="label label-success">DISETUJUI</a></td>
              <td><i class="glyphicon glyphicon-arrow-right"></i></td>
              <td> Status ini menjelaskan bahwa pegajuan barang telah disetujui pada RAB yang diajukan</td>
            </tr>
            <tr style="height: 30px">
              <td><a class="label label-danger">TOLAK</a></td>
              <td><i class="glyphicon glyphicon-arrow-right"></i></td>
              <td> Status ini menjelaskan bahwa pengajuan barang ditolak</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- End Info Status -->
      <div class="col-lg-6">
        <!-- Keterangan Tolak dan Setuju -->
        <div class="alert alert-warning">
          <strong>Perhatian!</strong>
          <p>Berikut adalah penjelasan <strong>tombol persetujuan</strong> dari persetujuan pada tabel pengajuan barang<strong>:</strong></p>
          <table border="3" style="border-color: transparent;" >
            <tr style="height: 30px">
              <td style="width: 10%"><a class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></a>
              </td>
              <td style="width: 6%"><i class="glyphicon glyphicon-arrow-right"></i></td>
              <td style="width: 62%"> Tombol ini digunakan untuk menyetujui pengajuan barang yang diajukan oleh staf</td>
            </tr>
            <tr style="height: 30px">
              <td><a class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
              <td><i class="glyphicon glyphicon-arrow-right"></td>
                <td> Tombol ini digunakan untuk menolak pengajuan barang yang diajukan oleh staf</td>
              </tr>
            </table>
            <p> </p>
            <p>Tombol-tombol untuk melakukan persetujuan hanya bisa dilakukan sebanyak satu kali, ketika persetujuan sudah dilakukan maka persetujuan tidak bisa diubah lagi dan akan digantikan dengan kata "selesai" disertai tanda centang (<span class="glyphicon glyphicon-ok"></span>).</p>
          </div>
          <!-- End Ket Tolak dan Setuju -->
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="card-body">
                <div class="table-responsive">
                 <table id="ajukan_rab" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Nama Pengajuan RAB</th>
                      <th class="text-center">File Pengajuan RAB</th>
                      <th class="text-center">Tanggal Pengajuan</th>
                      <th class="text-center">Status Pengajuan Pengajuan</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    foreach ($rab as $val) {
                      ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $val->nama_pengajuan;?></td>

                        <?php $link = base_url()."assets/file_rab/".$val->file_rab;?>
                        <td class="text-center"><a target="_blank" href="<?php echo $link?>"><span><img src="<?php echo base_url()?>assets/image/logo/excel.svg" style="height: 30px;"></span></a></td>
                        <td><center><?php echo $val->created_at ?></center></td>
                        <td class="text-center">
                          <?php

                      $progress_rab_terima   = $BarangM->get_progress_rab_terima_id($val->kode_pengajuan); //untuk mengetahui progress pengajuan yang diterima
                      $progress_rab_tolak   = $BarangM->get_progress_rab_tolak_id($val->kode_pengajuan); //untuk mengetahui progress pengajuan yang ditolak
                      $kode_pengajuan       = $val->kode_pengajuan; //engetahui kode pengajuan
                      $jabatan_unit_sendiri    = $data_diri->kode_jabatan_unit; //untuk mengetahui jabatan_unit_sendiri
                      $progress_rab_sendiri = $BarangM->progress_rab_sendiri($kode_pengajuan,$jabatan_unit_sendiri); //untuk cek dia sudah memiliki progress di progress barang
                      $rank_max       = $BarangM->cek_max_rab()->ranking;// mengetahui ranking terbesar dari jenis_pengajuan rab
                      $id_max         = $BarangM->cek_id_by_rank_rab($rank_max)->kode_jabatan_unit; // mengetahui id yang rank jenis pengajuan rabnya max
                      $rank_min_rab  = $BarangM->cek_min_rab()->ranking; //mengetahui ranking terkecil di jenis pengajuan barang
                      $id_min      = $BarangM->cek_id_by_rank_rab($rank_min_rab)->kode_jabatan_unit; // mengetahui jabatan unit rank terkecil di jenis pengajuan rab
                      $rab_created = $val->created_at; //waktu item pengajuan dibuat
                      $acc_created = $BarangM->created_at_rab($data_diri->kode_jabatan_unit)->created_at; //waktu acc barang/akses persetujuan dibuat


                      if($val->status_pengajuan_rab == "baru"){
                        ?>
                        <a class="label label-primary" id="custID" data-toggle="modal" data-id="">BARU</a>
                        <?php
                      }elseif ($val->status_pengajuan_rab == "diterima") {
                        ?>
                        <a class="label label-success" id="custID" data-toggle="modal" data-id="">DITERIMA</a>
                        <?php
                      }elseif ($val->status_pengajuan_rab == "proses") {
                        ?>
                        <a class="label label-info" id="custID" data-toggle="modal" data-id="">PROSES</a>
                        <?php
                      }elseif ($val->status_pengajuan_rab == "ditolak") {
                        ?>
                        <a class="label label-danger" id="custID" data-toggle="modal" data-id="">DITOLAK</a>
                        <?php
                      }
                      ?>
                    </td>
                    <td class="text-center">
                      <?php
                        $rab_created = $val->created_at; //waktu kegiatan dibuat
                        $acc_created = $BarangM->created_at_rab($data_diri->kode_jabatan_unit)->created_at; //waktu acc kegiatan/akses persetujuan dibuat
                        if($val->status_pengajuan_rab == "diterima"){
                          ?>
                          <a disabled title="Sudah"><span class="glyphicon glyphicon-ok"></span></a><p class="kecil">Selesai</p>
                          <?php
                        }else if($val->status_pengajuan_rab == "ditolak"){
                          ?>
                          <a disabled title="Sudah"><span class="glyphicon glyphicon-ok"></span></a><p class="kecil">Selesai</p>
                          <?php
                        }else{
                          if($progress_rab_sendiri > 0){ //jika sudah input progress ========================================================
                            ?>
                            <a disabled title="Sudah"><span class="glyphicon glyphicon-ok"></span></a><p class="kecil">Selesai</p>
                            <?php
                          }else{
                            if($jabatan_unit_sendiri == $id_min && $jabatan_unit_sendiri == $id_max){ //ranking asesor max dan min ==========
                              if($rab_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk =====================================
                                if($progress_rab_sendiri!= 0){//sudah disetujui->tidak bisa acc =======================================
                                  ?>
                                  <div class="btn-group">
                                    <a disabled class="btn btn-info btn-info" ><span class="glyphicon glyphicon-ok"></span></a>
                                    <a disabled class="btn btn-info btn-warning" ><span class="glyphicon glyphicon-remove"></span></a>
                                  </div>
                                  <?php
                                }else{//belum disetujui =====================================================================================
                                  ?>
                                  <div class="btn-group">
                                    <a href="#" data-toggle="modal" data-target="#modal_terima-<?php echo $val->kode_pengajuan; ?>" title="Terima" class="btn btn-info btn-info" ><span class="glyphicon glyphicon-ok"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#modal_tolak-<?php echo $val->kode_pengajuan; ?>" title="Tolak" class="btn btn-info btn-warning" ><span class="glyphicon glyphicon-remove"></span></a>
                                  </div>
                                  <?php
                                }
                              }else{ //acc dulu baru kegiatan ==============================================================================
                                ?>
                                <div class="btn-group">
                                  <a href="#" data-toggle="modal" data-target="#modal_terima-<?php echo $val->kode_pengajuan; ?>" title="Terima" class="btn btn-info btn-info" ><span class="glyphicon glyphicon-ok"></span></a>
                                  <a href="#" data-toggle="modal" data-target="#modal_tolak-<?php echo $val->kode_pengajuan; ?>" title="Tolak" class="btn btn-info btn-warning" ><span class="glyphicon glyphicon-remove"></span></a>
                                </div>
                                <?php
                              }
                            }elseif($jabatan_unit_sendiri == $id_min && $jabatan_unit_sendiri != $id_max){ //ranking asesor min tp tdk max ==
                              $rank_sendiri   = $BarangM->cek_rank_rab_by_id_pegawai($jabatan_unit_sendiri)->ranking; //rank sendiri 
                              $rank_lebih_besar  = ((int)$rank_sendiri + 1); //rank sendri + 1 (rank bawahnya) 
                              $id_lebih_besar    = $BarangM->cek_id_by_rank_rab($rank_lebih_besar)->kode_jabatan_unit; //id yang ranknya (ran ksendiri + 1) 
                              $progress_id_lebih_besar = $BarangM->progress_rab_sendiri($val->kode_pengajuan, $id_lebih_besar); //progress id yang ranknya (rank sendiri+1)
                              if($progress_id_lebih_besar > 0){ //sudah diberi progress rank bawahnya =======================================
                                if($progress_rab_tolak == 0){ // tidak ditolak ==============================================================
                                  if($rab_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk =================================
                                    if($progress_rab_sendiri!= 0){//sudah disetujui->tidak bisa acc ===================================
                                      ?>
                                      <div class="btn-group">
                                        <a disabled class="btn btn-info btn-info" ><span class="glyphicon glyphicon-ok"></span></a>
                                        <a disabled class="btn btn-info btn-warning" ><span class="glyphicon glyphicon-remove"></span></a>
                                      </div>
                                      <?php
                                    }else{//belum disetujui =================================================================================
                                       $rank_p = $BarangM->get_progress_by_kode_pengajuan($val->kode_pengajuan)->result()[0]->kode_jabatan_unit;//cari progress berdasarkan kode item pengajuan
                                      $rank_progress = $BarangM->cek_rank_rab_by_id_pegawai($rank_p)->ranking; // cari ranking by kode jabatan unit
                                      if($rank_sendiri > $rank_progress){ //progress sampe diatas ===========================================
                                        ?>
                                        <div class="btn-group">
                                          <a disabled class="btn btn-info btn-info" ><span class="glyphicon glyphicon-ok"></span></a>
                                          <a disabled class="btn btn-info btn-warning" ><span class="glyphicon glyphicon-remove"></span></a>
                                        </div>
                                        <?php
                                      }else{ //progress sampe bawah =========================================================================
                                        ?>
                                        <div class="btn-group">
                                          <a href="#" data-toggle="modal" data-target="#modal_terima-<?php echo $val->kode_pengajuan; ?>" title="Terima" class="btn btn-info btn-info" ><span class="glyphicon glyphicon-ok"></span></a>
                                          <a href="#" data-toggle="modal" data-target="#modal_tolak-<?php echo $val->kode_pengajuan; ?>" title="Tolak" class="btn btn-info btn-warning" ><span class="glyphicon glyphicon-remove"></span></a>
                                        </div>
                                        <?php
                                      }
                                    }
                                  }else{ //acc masuk dulu baru kegiatan =====================================================================
                                    ?>
                                    <div class="btn-group">
                                      <a href="#" data-toggle="modal" data-target="#modal_terima-<?php echo $val->kode_pengajuan; ?>" title="Terima" class="btn btn-info btn-info" ><span class="glyphicon glyphicon-ok"></span></a>
                                      <a href="#" data-toggle="modal" data-target="#modal_tolak-<?php echo $val->kode_pengajuan; ?>" title="Tolak" class="btn btn-info btn-warning" ><span class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                    <?php
                                  }
                                }else{ //ditolak ===========================================================================================
                                  ?>
                                  <div class="btn-group">
                                    <a disabled class="btn btn-info btn-info" ><span class="glyphicon glyphicon-ok"></span></a>
                                    <a disabled class="btn btn-info btn-warning" ><span class="glyphicon glyphicon-remove"></span></a>
                                  </div>
                                  <?php
                                }
                              }else{ //belum di kasih progress rank bawahnya ===============================================================
                                ?>
                                <div class="btn-group">
                                  <a disabled class="btn btn-info btn-info" ><span class="glyphicon glyphicon-ok"></span></a>
                                  <a disabled class="btn btn-info btn-warning" ><span class="glyphicon glyphicon-remove"></span></a>
                                </div>
                                <?php
                              }
                            }elseif($jabatan_unit_sendiri != $id_min && $jabatan_unit_sendiri != $id_max){ //ranking asesor bukan min dan max
                              $rank_sendiri   = $BarangM->cek_rank_rab_by_id_pegawai($jabatan_unit_sendiri)->ranking; //rank sendiri
                              $rank_lebih_besar  = ((int)$rank_sendiri + 1); //rank sendri + 1 (rank bawahnya)
                              $id_lebih_besar    = $BarangM->cek_id_by_rank_rab($rank_lebih_besar)->kode_jabatan_unit; //id yang ranknya (ran ksendiri + 1)
                              $progress_id_lebih_besar = $BarangM->progress_rab_sendiri($val->kode_pengajuan, $id_lebih_besar); //progress id yang ranknya (rank sendiri+1)
                              if($progress_id_lebih_besar > 0){ //sudah diberi progress rank bawahnya =======================================
                                if($progress_rab_tolak == 0){ // tidak ditolak ==============================================================
                                  if($rab_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk =================================
                                    if($progress_rab_sendiri!= 0){//sudah disetujui->tidak bisa acc ===================================
                                      ?>
                                      <div class="btn-group">
                                        <a disabled class="btn btn-info btn-info" ><span class="glyphicon glyphicon-ok"></span></a>
                                        <a disabled class="btn btn-info btn-warning" ><span class="glyphicon glyphicon-remove"></span></a>
                                      </div>
                                      <?php
                                    }else{//belum disetujui ================================================================================
                                      $rank_p = $BarangM->get_progress_by_kode_pengajuan($val->kode_pengajuan)->result()[0]->kode_jabatan_unit;//cari progress berdasarkan kode item pengajuan
                                      $rank_progress = $BarangM->cek_rank_rab_by_id_pegawai($rank_p)->ranking; // cari ranking by kode jabatan unit
                                      if($rank_sendiri > $rank_progress){ //progress sampe diatas ===========================================
                                        ?>
                                        <div class="btn-group">
                                          <a disabled class="btn btn-info btn-info" ><span class="glyphicon glyphicon-ok"></span></a>
                                          <a disabled class="btn btn-info btn-warning" ><span class="glyphicon glyphicon-remove"></span></a>
                                        </div>
                                        <?php
                                      }else{ //progress sampe bawah =========================================================================
                                        ?>
                                        <div class="btn-group">
                                          <a href="#" data-toggle="modal" data-target="#modal_terima-<?php echo $val->kode_pengajuan; ?>" title="Terima" class="btn btn-info btn-info" ><span class="glyphicon glyphicon-ok"></span></a>
                                          <a href="#" data-toggle="modal" data-target="#modal_tolak-<?php echo $val->kode_pengajuan; ?>" title="Tolak" class="btn btn-info btn-warning" ><span class="glyphicon glyphicon-remove"></span></a>
                                        </div>
                                        <?php
                                      }
                                    }
                                  }else{ //acc masuk dulu baru kegiatan =====================================================================
                                    ?>
                                    <div class="btn-group">
                                      <a href="#" data-toggle="modal" data-target="#modal_terima-<?php echo $val->kode_pengajuan; ?>" title="Terima" class="btn btn-info btn-info" ><span class="glyphicon glyphicon-ok"></span></a>
                                      <a href="#" data-toggle="modal" data-target="#modal_tolak-<?php echo $val->kode_pengajuan; ?>" title="Tolak" class="btn btn-info btn-warning" ><span class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                    <?php
                                  }
                                }else{ //ditolak ============================================================================================
                                  ?>
                                  <div class="btn-group">
                                    <a disabled class="btn btn-info btn-info" ><span class="glyphicon glyphicon-ok"></span></a>
                                    <a disabled class="btn btn-info btn-warning" ><span class="glyphicon glyphicon-remove"></span></a>
                                  </div>
                                  <?php
                                }
                              }else{ //belum di kasih progress rank bawahnya ================================================================
                                ?>
                                <div class="btn-group">
                                  <a disabled class="btn btn-info btn-info" ><span class="glyphicon glyphicon-ok"></span></a>
                                  <a disabled class="btn btn-info btn-warning" ><span class="glyphicon glyphicon-remove"></span></a>
                                </div>
                                <?php
                              }
                            }elseif($jabatan_unit_sendiri != $id_min && $jabatan_unit_sendiri == $id_max){ //asesor max =====================
                              if($rab_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk =====================================
                                if($progress_rab_sendiri!= 0){//sudah disetujui->tidak bisa acc =======================================
                                  ?>
                                  <div class="btn-group">
                                    <a disabled class="btn btn-info btn-info" ><span class="glyphicon glyphicon-ok"></span></a>
                                    <a disabled class="btn btn-info btn-warning" ><span class="glyphicon glyphicon-remove"></span></a>
                                  </div>
                                  <?php
                                }else{//belum disetujui =====================================================================================
                                  ?>
                                  <div class="btn-group">
                                    <a href="#" data-toggle="modal" data-target="#modal_terima-<?php echo $val->kode_pengajuan; ?>" title="Terima" class="btn btn-info btn-info"><span class="glyphicon glyphicon-ok"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#modal_tolak-<?php echo $val->kode_pengajuan; ?>" title="Tolak" class="btn btn-info btn-warning"><span class="glyphicon glyphicon-remove"></span></a>
                                  </div>
                                  <?php
                                }
                              }else{ //acc dulu baru kegiatan ===============================================================================
                                ?>
                                <div class="btn-group">
                                  <a href="#" data-toggle="modal" data-target="#modal_terima-<?php echo $val->kode_pengajuan; ?>" title="Terima" class="btn btn-info btn-info"><span class="glyphicon glyphicon-ok"></span></a>
                                  <a href="#" data-toggle="modal" data-target="#modal_tolak-<?php echo $val->kode_pengajuan; ?>" title="Tolak" class="btn btn-info btn-warning"><span class="glyphicon glyphicon-remove"></span></a>
                                </div>
                                <?php
                              }
                            } 
                          }
                        }
                        ?>
                      </td>
                    </tr>

                    <!-- Modal Terima Pengajuan RAB-->
                    <div aria-hidden="true" aria-labelledby="modal_terima" role="dialog" tabindex="-1" id="modal_terima-<?php echo $val->kode_pengajuan; ?>" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                            <h4 class="modal-title" id="titlemodal">Terima Item Pengajuan Barang</h4>
                          </div>
                          <form class="form-horizontal" action="<?php echo base_url('BarangC/post_persetujuan_rab');?>" method="post">
                            <div class="modal-body">
                              <div class="form-group">
                                <!-- ambil id_pengguna_jabatan berdasarkan user yang login-->
                                <input class="form-control" type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $data_diri->id_pengguna;?>" required> 
                                <!-- kirim kode_fk berdasarkan kode_pengajuan dari barang yang terpilih -->
                                <input class="form-control" type="hidden" id="kode_fk" name="kode_fk" value="<?php echo $val->kode_pengajuan;?>" required>
                                <!-- kirim kode_nama_progress = 1 untuk terima -->
                                <input type="hidden" class="form-control" placeholder id="kode_nama_progress" name="kode_nama_progress" required value="1">
                                <input class="form-control" type="hidden" id="kode_jabatan_unit" name="kode_jabatan_unit" value="<?php echo $data_diri->kode_jabatan_unit;?>" required> 
                                <!-- ambil kode_jabatan_unit yang login -->
                                <label class="col-lg-4 col-sm-2 control-label">Komentar Persetujuan:</label>
                                <div class="modal-body">
                                 <textarea name="komentar" value="" class="form-control" placeholder="Komentar" rows="3" required></textarea>
                               </div>
                             </div>
                           </div>
                           <div class="modal-footer">
                            <button class="btn btn-info" type="submit"> Simpan </button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- END Modal Terima Pengajuan RAB-->

                  <!-- Modal Tolak Pengajuan RAB -->
                  <div aria-hidden="true" aria-labelledby="modal_tolak" role="dialog" tabindex="-1" id="modal_tolak-<?php echo $val->kode_pengajuan; ?>" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                          <h4 class="modal-title" id="titlemodal">Tolak Item Pengajuan Barang</h4>
                        </div>
                        <form class="form-horizontal" action="<?php echo base_url('BarangC/post_persetujuan_rab');?>" method="post">
                         <div class="modal-body">
                          <div class="form-group">
                            <!-- ambil id_pengguna_jabatan berdasarkan user yang login-->
                            <input class="form-control" type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $data_diri->id_pengguna;?>" required> 
                            <!-- kirim kode_fk berdasarkan kode_pengajuan dari barang yang terpilih -->
                            <input class="form-control" type="hidden" id="kode_fk" name="kode_fk" value="<?php echo $val->kode_pengajuan;?>" required>
                            <!-- kirim kode_nama_progress = 1 untuk terima -->
                            <input type="hidden" class="form-control" placeholder id="kode_nama_progress" name="kode_nama_progress" required value="2">
                            <input class="form-control" type="hidden" id="kode_jabatan_unit" name="kode_jabatan_unit" value="<?php echo $data_diri->kode_jabatan_unit;?>" required> 
                            <!-- ambil kode_jabatan_unit yang login -->
                            <label class="col-lg-4 col-sm-2 control-label">Komentar Penolakan:</label>
                            <div class="modal-body">
                             <textarea name="komentar" value="" class="form-control" placeholder="Komentar" rows="3" required></textarea>
                           </div>
                         </div>
                       </div>
                       <div class="modal-footer">
                        <button class="btn btn-info" type="submit"> Simpan </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
            <!-- END Modal Tolak Pengajuan RAB-->


            <?php
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
</section>
<div class="text-center">
  <div class="credits">
    <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
  </div>
</div>
</section>

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
