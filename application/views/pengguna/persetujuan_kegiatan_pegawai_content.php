<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header text-center" style="margin-top: 0;">Persetujuan Kegiatan Pegawai</h3>
       <!--  <ol class="breadcrumb">
          <li><i class="fa fa-user"></i><a href="#">Kepala Departemen</a></li>
          <li><i class="fa fa-pencil"></i>Pengajuan Kegiatan</li>                
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
      </div>
    </div>

    <button data-toggle="collapse" data-target="#demo" class="btn btn-info btn-md" title="klik untuk melihat informasi"><i class="glyphicon glyphicon-alert"> Informasi</i></button>
    <br>
    <br>
    <div class="collapse" id="demo">
      <div class="col-lg-6">
        <!-- Info Status -->
        <div class="alert alert-info">
          <p>Berikut adalah penjelasan dari <strong>status</strong> pada tabel persetujuan kegiatan pegawai<strong>:</strong></p>
          <table border="3" style="border-color: transparent; border-radius: 5px;" class="table table-sm table-hover borderless">
            <tr style="height: 30px">
              <td style="width: 10%"><a class="label label-info">Mengajukan</a></td>
              <td style="width: 6%"><i class="glyphicon glyphicon-arrow-right"></td>
                <td style="width: 62%"> Status ini menjelaskan bahwa pengajuan kegiatan pegawai baru saja di ajukan dan belum memiliki progres</td>
              </tr>
              <tr style="height: 30px">
                <td><a class="label label-default">Proses</a></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td> Status ini menjelaskan bahwa pengajuan kegiatan pegawai sedang dalam proses persetujuan</td>
              </tr>
              <tr style="height: 30px">
                <td><a class="label label-success">Disetujui</a></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td> Status ini menjelaskan bahwa pengajuan kegiatan pegawai sudah disetujui</td>
              </tr>
              <tr style="height: 30px">
                <td><a class="label label-danger">Ditolak</a></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Status ini menjelaskan bahwa pengajuan kegiatan pegawai ditolak</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-lg-6">
          <!-- Keterangan Edit -->
          <div class="alert alert-info">
            <p>Berikut adalah penjelasan dari <strong>tombol</strong> di kolom aksi pada tabel persetujuan kegiatan pegawai<strong>:</strong></p>
            <table border="3" style="border-color: transparent;" class="table table-sm table-hover borderless">
              <tr style="height: 30px">
                <td style="width: 10%"><a href="#" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a></td>
                <td style="width: 6%"><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td style="width: 62%"> Jika tombol tampil seperti ini, maka tombol dapat digunakan untuk menyetujui atau menolak pengajuan kegiatan pegawai dan memberikan komentar.</td>
              </tr>
              <tr style="height: 30px">
                <td><a class="btn btn-success btn-sm" disabled><span class="glyphicon glyphicon-edit"></span></a></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td> Jika tombol tampil seperti ini, maka tombol sudah tidak dapat digunakan untuk menyetujui atau menolak pengajuan kegiatan pegawai dan memberikan komentar.</td>
              </tr>
              <tr style="height: 30px">
                <td><a disabled title="Sudah"><span class="glyphicon glyphicon-ok" style="margin-left: 11px;"></span></a><p class="kecil">Selesai</p></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td> Jika tombol dan keterangan tampil seperti ini, menandakan bahwa anda telah memberikan persetujuan terhadap pengajuan kegiatan pegawai tersebut.</td>
              </tr>
              <tr>
                <td></td>
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
                  // var_dump($detail_kegiatan);
                  ?>
                  <table id="example" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                    <thead>
                      <tr class="text-center">
                        <th class="text-center">Nama Kegiatan</th>
                        <th class="text-center">Nama Pengaju</th>
                        <th class="text-center">Jabatan Pengaju</th>
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
                      foreach ($data_pengajuan_kegiatan_pegawai as $kegiatan) {
                        ?>
                        <tr>
                          <td class="text-center relative">
                            <div class="relative">
                              <strong><?php echo $kegiatan->nama_kegiatan;?></strong>
                              <a href="#myModal1" id="custID" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" title="klik untuk melihat detail kegiatan"><small class="kecil">Lihat detail</small></a>
                            </div>
                          </td>
                          <?php 
                          $jabatan        = $KegiatanM->get_data_pengajuan_by_id($kegiatan->kode_kegiatan)->result()[0];
                          $unit           = $KegiatanM->get_data_pengajuan_by_id($kegiatan->kode_kegiatan)->result()[0];
                          $progress       = $KegiatanM->get_progress($kegiatan->kode_kegiatan);
                          $progress_tolak = $KegiatanM->get_progress_tolak($kegiatan->kode_kegiatan);
                          $progress_staf       = $KegiatanM->get_progress_staf($kegiatan->kode_kegiatan);
                          $progress_tolak_staf = $KegiatanM->get_progress_tolak_staf($kegiatan->kode_kegiatan);
                          ?>
                          <td class="text-center"><?php echo $jabatan->nama;?></td>
                          <td class="text-center"><?php echo $jabatan->nama_jabatan." ".$unit->nama_unit;?></td>
                          <?php 
                          $tgl_pengajuan = $kegiatan->tgl_pengajuan;
                          $new_tgl_pengajuan = date('d-m-Y',strtotime($tgl_pengajuan));
                          $tgl_kegiatan = $kegiatan->tgl_kegiatan;
                          $new_tgl_kegiatan = date('d-m-Y', strtotime($tgl_kegiatan));
                          $tgl_selesai = $kegiatan->tgl_selesai_kegiatan;
                          $new_tgl_selesai = date('d-m-Y', strtotime($tgl_selesai));
                          ?>
                          <td class="text-center"><?php echo $new_tgl_pengajuan; ?></td>
                          <td class="text-center">
                            <div class="relative">
                             <small class="kecil"><strong><?php echo $new_tgl_kegiatan?></strong></small>
                             <small class="kecil">sampai</small>
                             <small class="kecil"><strong><?php echo $new_tgl_selesai; ?></strong></small>
                           </div>
                         </td>
                         <td>Rp<?php echo number_format($kegiatan->dana_diajukan, 0,',','.') ?>,00</td>
                         <?php 
                         $link = base_url()."assets/file_upload/".$kegiatan->nama_file;
                         if(substr($kegiatan->nama_file,32,4) == ".zip"){
                          ?>
                          <td class="text-center"><a target="_blank" href="<?php echo $link?>"><span><img src="<?php echo base_url()?>assets/image/logo/zip.svg" style="height: 30px;"></span></a></td>
                          <?php
                        }else{
                          ?>
                          <td class="text-center"><a target="_blank" href="<?php echo $link?>"><span><img src="<?php echo base_url()?>assets/image/logo/pdf.svg" style="height: 30px;"></span></a></td>
                          <?php
                        }
                        ?>
                        <td class="text-center">
                          <?php 
                        $progress       = $KegiatanM->get_progress($kegiatan->kode_kegiatan); //progress yang diterima
                        $progress_tolak = $KegiatanM->get_progress_tolak($kegiatan->kode_kegiatan); //progress yang ditolak
                        $progress_staf       = $KegiatanM->get_progress_staf($kegiatan->kode_kegiatan);
                        $progress_tolak_staf = $KegiatanM->get_progress_tolak_staf($kegiatan->kode_kegiatan);
                        $own_id         = $data_diri->kode_jabatan_unit; //id sendri
                        $max            = $cek_max_pegawai->ranking; //rank terbesar/terendah
                        $id_max         = $KegiatanM->cek_id_by_rank_pegawai($max)->kode_jabatan_unit; //id yang rank nya max
                        $kode           = $kegiatan->kode_kegiatan; 
                        $own            = $KegiatanM->get_own_progress($kode, $own_id);
                        $id_staf_keu    = $cek_id_staf_keu[0]->kode_jabatan_unit; 
                        $progress_staf_keu  = $KegiatanM->get_own_progress($kode, $id_staf_keu);
                        $rank_min_pegawai   =  $KegiatanM->cek_min_pegawai()->ranking; //ranking terkecil (1)
                        $id_min             = $KegiatanM->cek_id_by_rank_pegawai($rank_min_pegawai)->kode_jabatan_unit;//kode jabatan unit rank terkecil (1)
                        $progress_min_pegawai = $KegiatanM->get_own_progress($kode, $id_min);
                        $atasan               = $KegiatanM->cek_atasan_by_kode_jabatan_unit($kegiatan->kode_jabatan_unit)->result()[0]->atasan; //apakah jabatanya seorang pimpinan
                        $acc_atasan           = $KegiatanM->get_progress_atasan($kode, $kegiatan->pimpinan); //cek progress atasan (num_rows)
                        if($progress_staf_keu > 0){ //sudah ada input staf keu
                          $progress_nama = $KegiatanM->get_progress_by_id($id_staf_keu, $kode)->result()[0]->nama_progress;
                          ?>
                          <a class="label label-warning" href="#modal_progress" id="custID" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" title="klik untuk melihat detail progress"><?php echo $progress_nama?></a>
                          <?php
                        }else{
                          if($progress_tolak == 0 && $progress == 0 && $progress_staf == 0 && $progress_tolak_staf == 0){ //belum punya progress
                            ?>
                            <a class="label label-info">Mengajukan</a>
                            <?php
                          }else{
                            if($progress_tolak > 0 || $progress_tolak_staf > 0){ //punya progress yang ditolak
                              ?>
                              <a class="label label-danger" href="#modal_progress" id="custID" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" title="klik untuk melihat detail progress">Ditolak</a>
                              <?php
                            }elseif (!is_null($kegiatan->status_kegiatan)) { //jika ada inputan progress dari acc kegiatan yang min (ranking trtinggi)
                              ?>
                              <a class="label label-success" href="#modal_progress" id="custID" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" title="klik untuk melihat detail progress"><?php echo $kegiatan->status_kegiatan?></a>
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
                      $kegiatan_created = $kegiatan->created_at; //waktu kegiatan dibuat
                      $acc_created = $KegiatanM->created_at($data_diri->kode_jabatan_unit)->created_at; //waktu acc kegiatan/akses persetujuan dibuat
                      if($own > 0){ //jika sudah input progress
                        ?>
                        <a disabled title="Sudah"><span class="glyphicon glyphicon-ok"></span></a><p class="kecil">Selesai</p>
                        <?php
                      }else{
                        if($kegiatan->status_kegiatan == "Disetujui"){
                          ?>
                          <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                          <?php
                        }else{
                          if($progress_tolak == 0){
                            if($own_id == $id_max && $own_id == $id_min){ //ranking asesor max dan min
                              if($kegiatan->kode_jabatan_unit == $data_diri->kode_jabatan_unit){//pengaju dia sendiri->bisa acc
                                if($kegiatan_created < $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                  if(!is_null($kegiatan->status_kegiatan)){//sudah disetujui->tidak bisa acc
                                    ?>
                                    <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }else{//belum disetujui
                                    ?>
                                    <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }
                                }else{
                                  ?>
                                  <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                  <?php
                                }
                              }elseif($atasan == "tidak"){  //pengaju STAF (bukan atasan)
                                $kode_unit_pengaju = $KegiatanM->cek_staf_sendiri($Kegiatan->kode_jabatan_unit)->result()[0]->kode_unit;
                                if($kode_unit_pengaju == $data_diri->kode_unit){ // pengaju staf sendiri->bisa acc
                                  if($kegiatan_created < $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                    if(!is_null($kegiatan->status_kegiatan)){//sudah disetujui->tidak bisa acc
                                      ?>
                                      <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }else{//belum disetujui
                                      ?>
                                      <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }
                                  }else{
                                    $progress_atasan_terima = $KegiatanM->get_progress_terima_by_kode_jabatan_unit($kegiatan->kode_kegiatan, $kegiatan->pimpinan,'1'); //progress dari atasan yang "diterima"(kode 1)
                                    $progress_atasan_tolak = $KegiatanM->get_progress_terima_by_kode_jabatan_unit($kegiatan->kode_kegiatan, $kegiatan->pimpinan,'2'); //progress dari atasan yang "ditolak"(kode 2)
                                    if($acc_atasan > 0){ // kegiatan sudah diberikan progress atsan
                                      if($progress_atasan_terima > 0){ // diterima ->bisa acc
                                        if($kegiatan_created < $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                          if(!is_null($kegiatan->status_kegiatan)){//sudah disetujui->tidak bisa acc
                                            ?>
                                            <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                            <?php
                                          }else{//belum disetujui
                                            ?>
                                            <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                            <?php
                                          }
                                        }else{
                                          ?>
                                          <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                          <?php
                                        }
                                      }elseif($progress_atasan_tolak > 0){ //ditolak ->tidak bisa acc
                                        ?>
                                        <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        <?php
                                      }
                                    }elseif($acc_atasan == 0){ //kegiatan belum acc atasan->tidak bisa acc
                                      ?>
                                      <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }
                                  }
                                }elseif($kode_unit_pengaju != $data_diri->kode_unit){ //pengaju bukan staf sendiri
                                  $progress_atasan_terima = $KegiatanM->get_progress_terima_by_kode_jabatan_unit($kegiatan->kode_kegiatan, $kegiatan->pimpinan,'1'); //progress dari atasan yang "diterima"(kode 1)
                                  $progress_atasan_tolak = $KegiatanM->get_progress_terima_by_kode_jabatan_unit($kegiatan->kode_kegiatan, $kegiatan->pimpinan,'2'); //progress dari atasan yang "ditolak"(kode 2)
                                  if($acc_atasan > 0){ // kegiatan sudah diberikan progress atsan
                                    if($progress_atasan_terima > 0){ // diterima ->bisa acc
                                      if($kegiatan_created < $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                        if(!is_null($kegiatan->status_kegiatan)){//sudah disetujui->tidak bisa acc
                                          ?>
                                          <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                          <?php
                                        }else{//belum disetujui
                                          ?>
                                          <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                          <?php
                                        }
                                      }else{
                                        ?>
                                        <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        <?php
                                      }
                                    }elseif($progress_atasan_tolak > 0){ //ditolak ->tidak bisa acc
                                      ?>
                                      <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }
                                  }elseif($acc_atasan == 0){ //kegiatan belum acc atasan->tidak bisa acc
                                    ?>
                                    <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }
                                }
                              }elseif($atasan == "ya"){//pengaju atasan -> bisa acc
                                if($kegiatan_created < $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                  if(!is_null($kegiatan->status_kegiatan)){//sudah disetujui->tidak bisa acc
                                    ?>
                                    <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }else{//belum disetujui
                                    ?>
                                    <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }
                                }else{
                                  ?>
                                  <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                  <?php
                                }
                              }
                            }elseif($own_id == $id_min && $own_id != $id_max){ // ranking asesor min tapi tidak max (tertinggi dan punya bawahan)
                              $own_rank   = $KegiatanM->cek_rank_by_id_pegawai($own_id)->ranking; //rank sendiri
                              $rank_next  = ((int)$own_rank + 1); //rank sendri + 1 (rank bawahnya)
                              $id_next    = $KegiatanM->cek_id_by_rank_pegawai($rank_next)->kode_jabatan_unit; //id yang ranknya (ran ksendiri + 1)
                              $progress_id_next = $KegiatanM->get_own_progress($kegiatan->kode_kegiatan, $id_next); //progress id yang ranknya (rank sendiri+1)
                              if($progress_id_next > 0){ //sudah diberi progress rank bawahnya
                                if($progress_tolak == 0 && $progress_tolak_staf == 0){ // tidak ditolak
                                  if($kegiatan_created < $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                    if(!is_null($kegiatan->status_kegiatan)){//sudah disetujui->tidak bisa acc
                                      ?>
                                      <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }else{//belum disetujui
                                      $rank_p = $KegiatanM->get_progress_by_kode_kegiatan($kegiatan->kode_kegiatan)->result()[0]->kode_jabatan_unit;//cari progress berdasarkan kode kegiatan
                                      $rank_progress = $KegiatanM->cek_rank_by_id_pegawai($rank_p)->ranking; // cari ranking by kode jabatan unit
                                      if($own_rank > $rank_progress){ //progress sampe diatas 
                                        ?>
                                        <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        <?php
                                      }else{ //progress sampe bawah
                                        ?>
                                        <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        <?php
                                      }
                                    }
                                  }else{ //acc masuk dulu baru kegiatan
                                    ?>
                                    <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }
                                }else{ //ditolak
                                  ?>
                                  <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Kegiatan ditolak" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                  <?php
                                }
                              }else{ //belum di kasih progress rank bawahnya
                                ?>
                                <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Belum disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                <?php
                              }
                            }elseif ($own_id != $id_min && $own_id != $id_max) { //ranking asesor bukan min dan bukan max (ditengah tengah rankingnya)
                              $own_rank   = $KegiatanM->cek_rank_by_id_pegawai($own_id)->ranking; //rank sendiri
                              $rank_next  = ((int)$own_rank + 1); //rank sendri + 1 (rank bawahnya)
                              $id_next    = $KegiatanM->cek_id_by_rank_pegawai($rank_next)->kode_jabatan_unit; //id yang ranknya (ran ksendiri + 1)
                              $progress_id_next = $KegiatanM->get_own_progress($kegiatan->kode_kegiatan, $id_next); //progress id yang ranknya (rank sendiri+1)
                              if($progress_id_next > 0){ //sudah diberi progress rank bawahnya
                                if($progress_tolak == 0 && $progress_tolak_staf == 0){ // tidak ditolak
                                  if($kegiatan_created < $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                    if(!is_null($kegiatan->status_kegiatan)){//sudah disetujui->tidak bisa acc
                                      ?>
                                      <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }else{//belum disetujui
                                      $rank_p = $KegiatanM->get_progress_by_kode_kegiatan($kegiatan->kode_kegiatan)->result()[0]->kode_jabatan_unit;//cari progress berdasarkan kode kegiatan
                                      $rank_progress = $KegiatanM->cek_rank_by_id_pegawai($rank_p)->ranking; // cari ranking by kode jabatan unit
                                      if($own_rank > $rank_progress){ //progress sampe diatas 
                                        ?>
                                        <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        <?php
                                      }else{ //progress sampe bawah
                                        ?>
                                        <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        <?php
                                      }
                                    }
                                  }else{ //acc masuk dulu baru kegiatan
                                    $progres_atas = $KegiatanM->get_progress_by_rank($kegiatan->kode_kegiatan, $own_rank)->result();
                                    if(!is_null($progres_atas) || !empty($progres_atas)){
                                      ?>
                                      <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Tidak dapat disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }else{
                                      ?>
                                      <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }
                                  }
                                }else{ //ditolak
                                  ?>
                                  <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Kegiatan ditolak" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                  <?php
                                }
                              }else{ //belum di kasih progress rank bawahnya
                                ?>
                                <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Belum disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                <?php
                              }
                            }elseif ($own_id != $id_min && $own_id == $id_max) { //rank asesor paling bawah (acc pertama kali)
                              if($kegiatan->kode_jabatan_unit == $data_diri->kode_jabatan_unit){//pengaju dia sendiri->bisa acc
                                ?>  
                                <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                <?php
                              }elseif($atasan == "tidak"){ //pengaju STAF (bukan atsan)
                                $kode_unit_pengaju = $KegiatanM->cek_staf_sendiri($kegiatan->kode_jabatan_unit)->result()[0]->kode_unit;
                                if($kode_unit_pengaju == $data_diri->kode_unit){ //pengaju staf sendiri->bisa acc
                                  if($kegiatan_created < $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                    if(!is_null($kegiatan->status_kegiatan)){//sudah disetujui->tidak bisa acc
                                      ?>
                                      <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }else{//belum disetujui
                                      $rank_p = $KegiatanM->get_progress_by_kode_kegiatan($kegiatan->kode_kegiatan)->result()[0]->kode_jabatan_unit;//cari progress berdasarkan kode kegiatan
                                      $rank_progress = $KegiatanM->cek_rank_by_id_pegawai($rank_p)->ranking; // cari ranking by kode jabatan unit
                                      if($own_rank > $rank_progress){ //progress sampe diatas 
                                        ?>
                                        <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        <?php
                                      }else{ //progress sampe bawah
                                        $progress_atasan_terima = $KegiatanM->get_progress_terima_by_kode_jabatan_unit($kegiatan->kode_kegiatan, $kegiatan->pimpinan,'1'); //progress dari atasan yang "diterima"(kode 1)
                                        $progress_atasan_tolak = $KegiatanM->get_progress_terima_by_kode_jabatan_unit($kegiatan->kode_kegiatan, $kegiatan->pimpinan,'2'); //progress dari atasan yang "ditolak"(kode 2)
                                        if($acc_atasan > 0){ // kegiatan sudah diberikan progress atsan
                                          if($progress_atasan_terima > 0){ // diterima ->bisa acc
                                            if($kegiatan_created < $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                              if(!is_null($kegiatan->status_kegiatan)){//sudah disetujui->tidak bisa acc
                                                ?>
                                                <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                                <?php
                                              }else{//belum disetujui
                                                $own_rank   = $KegiatanM->cek_rank_by_id_pegawai($own_id)->ranking; //rank sendiri
                                                $rank_p = $KegiatanM->get_progress_by_kode_kegiatan($kegiatan->kode_kegiatan)->result()[0]->kode_jabatan_unit;//cari progress berdasarkan kode kegiatan
                                                $rank_progress = $KegiatanM->cek_rank_by_id_pegawai($rank_p)->ranking; // cari ranking by kode jabatan unit
                                                if($own_rank > $rank_progress){ //progress sampe diatas 
                                                  ?>
                                                  <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                                  <?php
                                                }else{ //progress sampe bawah
                                                  ?>
                                                  <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                                  <?php
                                                }
                                              }
                                            }else{ //acc masuk dulu baru kegiatan
                                              ?>
                                              <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                              <?php
                                            }
                                          }elseif($progress_atasan_tolak > 0){ //ditolak ->tidak bisa acc
                                            ?>
                                            <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                            <?php
                                          }
                                        }elseif($acc_atasan == 0){ //kegiatan belum acc atasan->tidak bisa acc
                                          ?>
                                          <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                          <?php
                                        }
                                      }
                                    }
                                  }else{ //acc masuk dulu baru kegiatan
                                    $progress_atasan_terima = $KegiatanM->get_progress_terima_by_kode_jabatan_unit($kegiatan->kode_kegiatan, $kegiatan->pimpinan,'1'); //progress dari atasan yang "diterima"(kode 1)
                                    $progress_atasan_tolak = $KegiatanM->get_progress_terima_by_kode_jabatan_unit($kegiatan->kode_kegiatan, $kegiatan->pimpinan,'2'); //progress dari atasan yang "ditolak"(kode 2)
                                    if($acc_atasan > 0){ // kegiatan sudah diberikan progress atsan
                                      if($progress_atasan_terima > 0){ // diterima ->bisa acc
                                        if($kegiatan_created < $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                          if(!is_null($kegiatan->status_kegiatan)){//sudah disetujui->tidak bisa acc
                                            ?>
                                            <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                            <?php
                                          }else{//belum disetujui
                                            $own_rank   = $KegiatanM->cek_rank_by_id_pegawai($own_id)->ranking; //rank sendiri
                                            $rank_p = $KegiatanM->get_progress_by_kode_kegiatan($kegiatan->kode_kegiatan)->result()[0]->kode_jabatan_unit;//cari progress berdasarkan kode kegiatan
                                            $rank_progress = $KegiatanM->cek_rank_by_id_pegawai($rank_p)->ranking; // cari ranking by kode jabatan unit
                                            if($own_rank > $rank_progress){ //progress sampe diatas 
                                              ?>
                                              <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                              <?php
                                            }else{ //progress sampe bawah
                                              ?>
                                              <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                              <?php
                                            }
                                          }
                                        }else{ //acc masuk dulu baru kegiatan
                                          ?>
                                          <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                          <?php
                                        }
                                      }elseif($progress_atasan_tolak > 0){ //ditolak ->tidak bisa acc
                                        ?>
                                        <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        <?php
                                      }
                                    }elseif($acc_atasan == 0){ //kegiatan belum acc atasan->tidak bisa acc
                                      ?>
                                      <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }
                                  }
                                }elseif ($kode_unit_pengaju != $data_diri->kode_unit) { //pengaju bukan staf sendiri
                                  $progress_atasan_terima = $KegiatanM->get_progress_terima_by_kode_jabatan_unit($kegiatan->kode_kegiatan, $kegiatan->pimpinan,'1'); //progress dari atasan yang "diterima"(kode 1)
                                  $progress_atasan_tolak = $KegiatanM->get_progress_terima_by_kode_jabatan_unit($kegiatan->kode_kegiatan, $kegiatan->pimpinan,'2'); //progress dari atasan yang "ditolak"(kode 2)
                                  if($acc_atasan > 0){ // kegiatan sudah diberikan progress atsan
                                    if($progress_atasan_terima > 0){ // diterima ->bisa acc
                                      if($kegiatan_created < $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                        if(!is_null($kegiatan->status_kegiatan)){//sudah disetujui->tidak bisa acc
                                          ?>
                                          <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                          <?php
                                        }else{//belum disetujui
                                          $own_rank   = $KegiatanM->cek_rank_by_id_pegawai($own_id)->ranking; //rank sendiri
                                          $rank_p = $KegiatanM->get_progress_by_kode_kegiatan($kegiatan->kode_kegiatan)->result()[0]->kode_jabatan_unit;//cari progress berdasarkan kode kegiatan
                                          $rank_progress = $KegiatanM->cek_rank_by_id_pegawai($rank_p)->ranking; // cari ranking by kode jabatan unit
                                          if($own_rank > $rank_progress){ //progress sampe diatas 
                                            ?>
                                            <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                            <?php
                                          }else{ //progress sampe bawah
                                            ?>
                                            <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan 1" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                            <?php
                                          }
                                        }
                                      }else{ //acc masuk dulu baru kegiatan
                                        ?>
                                        <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan 2" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        <?php
                                      }
                                    }elseif($progress_atasan_tolak > 0){ //ditolak ->tidak bisa acc
                                      ?>
                                      <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }
                                  }elseif($acc_atasan == 0){ //kegiatan belum acc atasan->tidak bisa acc
                                    ?>
                                    <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }
                                }
                              }elseif($atasan == "ya"){
                                if($kegiatan_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                  if(!is_null($kegiatan->status_kegiatan)){//sudah disetujui->tidak bisa acc
                                    ?>
                                    <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }else{//belum disetujui
                                    $rank_p = $KegiatanM->get_progress_by_kode_kegiatan($kegiatan->kode_kegiatan)->result()[0]->kode_jabatan_unit;//cari progress berdasarkan kode kegiatan
                                    $rank_progress = $KegiatanM->cek_rank_by_id_pegawai($rank_p)->ranking; // cari ranking by kode jabatan unit
                                    if($own_rank > $rank_progress){ //progress sampe diatas 
                                      ?>
                                      <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }else{ //progress sampe bawah
                                      ?>
                                      <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }
                                  }
                                }else{ //acc masuk dulu baru kegiatan
                                  $own_rank   = $KegiatanM->cek_rank_by_id_pegawai($own_id)->ranking; //rank sendiri
                                  $progres_atas = $KegiatanM->get_progress_by_rank($kegiatan->kode_kegiatan, $own_rank)->result();
                                  if(!empty($progres_atas)){
                                    ?>
                                    <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Tidak dapat disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }else{
                                    ?>
                                    <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }
                                }
                              }
                            }
                          }else{
                            ?>
                            <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Kegiatan ditolak" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                            <?php
                          }
                        }
                      }
                      ?>
                    </td>
                  </tr>
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
</section>

</section>
<!-- modal detail pengajuan -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Persetujuan Kegiatan</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- modal detail kegiatan -->
<div class="modal fade" id="myModal1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Kegiatan</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
    // js detail pengajuan
    $(document).ready(function(){
      $('#myModal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type : 'get',
              url : '<?php echo base_url().'KegiatanC/detail_pengajuan/'?>'+rowid,
                //data :  'rowid='+ rowid, // $_POST['rowid'] = rowid
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
              }
            });
          });
    });

// js detail kegiatan
$(document).ready(function(){
  $('#myModal1').on('show.bs.modal', function (e) {
    var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type : 'get',
              url : '<?php echo base_url().'KegiatanC/detail_kegiatan/'?>'+rowid,
                //data :  'rowid='+ rowid, // $_POST['rowid'] = rowid
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
              }
            });
          });
});

</script>