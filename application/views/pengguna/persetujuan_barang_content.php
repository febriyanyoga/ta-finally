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
       <h3 class="page-header" style="margin-top: 0;"><center>Barang Diajukan</center></h3>
     </div>
   </div>
   <div class="row">
    <div class="col-lg-12">
      <div class="card mb-3">
        <div class="card-header">
          <div class="card-body">

            <div class="row">
              <div class="col-lg-6">
                <!-- Info Status -->
                <div class="alert alert-info">
                  <strong>Informasi!</strong>
                  <p>Berikut adalah penjelasan dari <strong>status</strong> pada tabel pengajuan barang<strong>:</strong></p>
                  <table border="3" style="border-color: transparent;" >
                    <tr style="height: 30px">
                      <td style="width: 10%"><a class="label label-primary">BARU</a></td>
                      <td style="width: 6%"><i class="glyphicon glyphicon-arrow-right"></td>
                        <td style="width: 62%"> Status ini menjelaskan bahwa pengajuan barang baru saja di ajukan dan belum memiliki progres</th>
                        </tr>
                        <tr style="height: 30px">
                          <td><a class="label label-info">PROSES</a></td>
                          <td><i class="glyphicon glyphicon-arrow-right"></td>
                            <td> Status ini menjelaskan bahwa pengajuan barang sedang dalam proses persetujuan</td>
                          </tr>
                          <tr style="height: 30px">
                            <td><a class="label label-success">PENGAJUAN</a></td>
                            <td><i class="glyphicon glyphicon-arrow-right"></td>
                              <td> Status ini menjelaskan bahwa pengajuan barang sudah disetujui dan sedang dalam proses pengajuan RAB</td>
                            </tr>
                            <tr style="height: 30px">
                              <td><a class="label label-success">SELESAI</a></td>
                              <td><i class="glyphicon glyphicon-arrow-right"></td>
                                <td> Status ini menjelaskan bahwa pengajuan barang telah selesai</td>
                              </tr>
                              <tr style="height: 30px">
                                <td><a class="label label-warning">TUNDA</a></td>
                                <td><i class="glyphicon glyphicon-arrow-right"></td>
                                  <td> Status ini menjelaskan bahwa pengajuan barang sedang di tunda untuk diajukan dalam RAB dan akan diajukan pada pengajuan RAB berikutnya</td>
                                </tr>
                                <tr style="height: 30px">
                                  <td><a class="label label-success">DISETUJUI</a></td>
                                  <td><i class="glyphicon glyphicon-arrow-right"></td>
                                    <td> Status ini menjelaskan bahwa pegajuan barang telah disetujui pada RAB yang diajukan</td>
                                  </tr>
                                  <tr style="height: 30px">
                                    <td><a class="label label-danger">TOLAK</a></td>
                                    <td><i class="glyphicon glyphicon-arrow-right"></td>
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
                                      <td style="width: 6%"><i class="glyphicon glyphicon-arrow-right"></td>
                                        <td style="width: 62%"> Tombol ini digunakan untuk menyetujui pengajuan barang yang diajukan oleh staf</td>
                                      </tr>
                                      <tr style="height: 30px">
                                        <td><a class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
                                        <td><i class="glyphicon glyphicon-arrow-right"></td>
                                          <td> Tombol ini digunakan untuk menolak pengajuan barang yang diajukan</td>
                                        </tr>
                                      </tr>
                                      <tr style="height: 30px">
                                        <td><a class="btn btn-info btn-info"><span class="glyphicon glyphicon-briefcase"></span></a></td>
                                        <td><i class="glyphicon glyphicon-arrow-right"></td>
                                          <td> Tombol ini digunakan untuk menyetujui pengajuan barang yang diajukan dikarenakan barang yang diajukan sudah tersedia</td>
                                        </tr>
                                      </table>
                                    </table>
                                    <p> </p>
                                    <p>Tombol-tombol untuk melakukan persetujuan hanya bisa dilakukan sebanyak satu kali, ketika persetujuan sudah dilakukan maka persetujuan tidak bisa diubah lagi dan akan digantikan dengan kata "selesai" disertai tanda centang (<span class="glyphicon glyphicon-ok"></span>).</p>
                                    <p> </p>
                                    <table border="3" style="border-color: transparent;" >
                                      <tr style="height: 30px" style="width: 15%">
                                        <td>
                                          <div class="btn-group">
                                            <a class="btn btn-success btn-sm">Aset</span></a>
                                            <a class="btn btn-danger btn-sm">Habis Pakai</span></a>
                                          </div>
                                        </td>
                                        <td style="width: 6%"><i class="glyphicon glyphicon-arrow-right"></td>
                                          <td style="width: 69%"> Untuk pengajuan barang yang berwarna <strong>biru</strong>, harus terlebih dahulu diberikan klasifikasi jenis barang, karena barang yang diajukan tersebut belum terklasifikasikan. Setelah dilakukan klasifikasi maka pengajuan akan berwarna sama seperti pengajuan yang sudah bisa diberikan persetujuan.</td>
                                        </tr>
                                      </table>
                                    </table>
                                  </div>
                                  <!-- End Ket Tolak dan Setuju -->
                                </div>
                              </div>

                              <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                                  <thead>
                                    <tr class="text-center">
                                      <!-- <th>No. Identitas</th> -->
                                      <th class="text-center">Nama Pengajuan Barang</th>
                                      <th class="text-center">Nama Pengaju</th>
                                      <th class="text-center">Jabatan Pengaju</th>
                                      <th class="text-center">Gambar</th>
                                      <th class="text-center">Tgl Pengajuan</th>
                                      <th class="text-center">Jumlah</th>
                                      <th class="text-center">Total Harga</th>
                                      <th class="text-center">Status</th>
                                      <th class="text-center">Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    foreach ($data_persetujuan_barang as $barang) {
                                     $jenis_barang = $BarangM->get_data_item_pengajuan_by_id($barang->kode_item_pengajuan)->result()[0]->kode_jenis_barang;
                                     if($jenis_barang != 3){?>
                                     <tr class="text-center" >
                                      <td> 
                                       <a href="#" data-toggle="modal" data-target="#modal-<?php echo $barang->kode_item_pengajuan; ?>"><?php echo $barang->nama_item_pengajuan ?></a>
                                     </td>
                                     <td><?php 
                                  // mendapatkan nama pengaju dari kode item pengajuan berdasarkan id
                                     $pengaju = $BarangM->get_data_item_pengajuan_by_id($barang->kode_item_pengajuan)->result()[0]->nama;
                                     echo $pengaju;
                                     ?>
                                   </td>
                                   <td>
                                    <?php 
                                  // mendapatkan nama jabatan dari kode item pengajuan berdasarkan id
                                    $jabatan      = $BarangM->get_data_item_pengajuan_by_id($barang->kode_item_pengajuan)->result()[0]->nama_jabatan;
                                  // mendapatkan kode jabatan dari kode item pengajuan berdasarkan id
                                    $kode_jabatan = $BarangM->get_data_item_pengajuan_by_id($barang->kode_item_pengajuan)->result()[0]->kode_jabatan;
                                  // mendapatkan nama unit dari kode item pengajuan berdasarkan id
                                    $unit = $BarangM->get_data_item_pengajuan_by_id($barang->kode_item_pengajuan)->result()[0]->nama_unit;
                                  // mendapatkan kode unit dari kode item pengajuan berdasarkan id
                                    $kode_unit = $BarangM->get_data_item_pengajuan_by_id($barang->kode_item_pengajuan)->result()[0]->kode_unit;
                                  //menampilkan nama jabatan dan unit dari pengaju item pengajuan
                                    echo $jabatan." ".$unit;
                                    ?>
                                  </td>
                                  <td><center><img style="height: 60px;" src="<?php echo base_url();?>assets/file_gambar/<?php echo $barang->file_gambar;?>"></center></td>
                                  <td><?php echo $barang->tgl_item_pengajuan;?></td>
                                  <td><?php echo $barang->jumlah;?></td>
                                  <?php 
                                  $jumlah = $barang->jumlah;
                                  $harga = $barang->harga_satuan;
                                //menghitung hasil total biaya item pengajuan dari perkalian harga satuan dengan jumlah barang
                                  $total = $jumlah*$harga;
                                  ?>
                                  <td>Rp<?php echo number_format($total, 0,',','.') ?>,00</td>
                                  <td> 
                                    <?php
                        $kode_fk = $barang->kode_item_pengajuan; //untuk mengambil kode_item_pengajuan
                        $id_staf_sarpras = $BarangM->cek_id_staf_sarpras()->result()[0]->kode_jabatan_unit; // untuk menmeriksa pengajuan tersebut mendapatkan progress dari siapa saja
                        $progress_oleh_staf = $BarangM->get_progress_oleh_staf($kode_fk, $id_staf_sarpras);//untuk mengetahui jika pengajuan sudah mendapat progress yang diberikan oleh staff sarpras, dimana staff sarpras adalah yang paling akhir memberikan progress tambahan

                        if($progress_oleh_staf > 0){ //jika item_pengajuan sudah mendapat progress dari staf sarpras

                          // ===================
                            $progress_terima       = $BarangM->get_progress_barang_terima_id($barang->kode_item_pengajuan); //mengetahui progress yang diterima
                            $progress_tolak = $BarangM->get_progress_barang_tolak_id($barang->kode_item_pengajuan); //mengetahui progress yang ditolak
                            $progress_terima_staf  = $BarangM->get_progress_staf_terima($barang->kode_item_pengajuan); // mengetahui progress barang_staf diterima 
                            $progress_tolak_staf = $BarangM->get_progress_staf_tolak($barang->kode_item_pengajuan); //mengetahui progress barang_staff ditolak
                            $jabatan_saya   = $data_diri->kode_jabatan_unit; //mengetahui jabatan nya dia apa 
                            $rank_max       = $BarangM->cek_max_barang()->ranking;// mengetahui ranking terbesar dari jenis_pengajuan_barang
                            $id_max         = $BarangM->cek_id_by_rank_barang($rank_max)->kode_jabatan_unit; // mengetahui id yang rank jenis pengajuan barangnya max
                            $kode_fk        = $barang->kode_item_pengajuan; //mengetahui kode_item_pengajuan
                            $progress_sendiri = $BarangM->progress_sendiri($kode_fk,$jabatan_saya); //untuk cek dia sudah memiliki progress di progress barang
                            $id_staf_sarpras  = $BarangM->cek_id_staf_sarpras()->result()[0]->kode_jabatan_unit;//untuk mengetahui jika staf sarpras sudah memiliki progress di barang
                            $progress_staf_sarpras = $BarangM->progress_sendiri($kode_fk, $id_staf_sarpras); //untuk cek staf sarprass sudah miliki progres di progress barang
                            $rank_min_barang  = $BarangM->cek_min_barang()->ranking; //mengetahui ranking terkecil di jenis pengajuan barang
                            $id_min      = $BarangM->cek_id_by_rank_barang($rank_min_barang)->kode_jabatan_unit; // mengetahui jabatan unit rank terkecil di jenis pengajuan barang
                            $progress_min_barang  = $BarangM->progress_sendiri($kode_fk, $id_min); // mengetahui progres yang dimasukkan oleh rank terkecil
                            $atasan       = $BarangM->cek_atasan_by_kode_jabatan_unit($barang->kode_jabatan_unit)->result()[0]->atasan; //untuk mengecek jika jabatan dia adalah pimpinan
                            $acc_atasan   = $BarangM->get_progress_atasan($kode_fk, $barang->pimpinan); // untuk mengecek jika pimpinan sudah memberikan progress

                          // ===================

                            $nama_progress = $BarangM->get_nama_progress_by_id($id_staf_sarpras, $kode_fk)->result()[0]->nama_progress; //untuk menampilkan nama_progress yangdiberikan oleh staf_sarpras 
                            ?>
                            <a class="label label-success" href="#modal_progress_barang" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="Aksi"><?php echo $nama_progress; ?></a>
                            <?php
                          }else{
                            if($barang->status_pengajuan == "baru"){
                              ?>
                              <a class="label label-primary" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress"> BARU</a>
                              <?php
                            }else if($barang->status_pengajuan == "proses"){
                              ?>
                              <a class="label label-info" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress">PROSES</a>
                              <?php
                            }else if($barang->status_pengajuan == "pengajuan"){
                              ?>
                              <a class="label label-success" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress">PENGAJUAN</a>
                              <?php
                            }else if($barang->status_pengajuan == "pengajuanRAB"){
                              ?>
                              <a class="label label-success" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress">PENGAJUAN RAB</a>
                              <?php
                            }else if($barang->status_pengajuan == "selesai"){
                              ?>
                              <a class="label label-success" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress">SELESAI</a>
                              <?php
                            }else if($barang->status_pengajuan == "tunda"){
                              ?>
                              <a class="label label-warning" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress">TUNDA</a>
                              <?php
                            }else if($barang->status_pengajuan == "disetujui"){
                              ?>
                              <a class="label label-success" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress">DISETUJUI</a>
                              <?php
                            }else if($barang->status_pengajuan == "tolak"){
                              ?>
                              <a class="label label-danger" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress">TOLAK</a>
                              <?php
                            }
                          }
                          ?>

                        </td>
                        <td class="text-center">
                          <?php
                      $barang_created = $barang->created_at; //waktu item pengajuan dibuat
                      $acc_created = $BarangM->created_at($data_diri->kode_jabatan_unit)->created_at; //waktu acc barang/akses persetujuan dibuat
                      if($progress_sendiri > 0){ //jika sudah input progress
                        ?>
                        <a disabled title="Sudah"><span class="glyphicon glyphicon-ok"></span></a><p class="kecil">Selesai</p>
                        <?php
                      }else{
                        if($jabatan_saya == $id_max && $jabatan_saya == $id_min){ //ranking asesor max dan min
                          if($barang->kode_jabatan_unit == $data_diri->kode_jabatan_unit){//pengaju dia sendiri->bisa acc
                            if($barang_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                              if(!is_null($barang->status_pengajuan)){//sudah disetujui->tidak bisa 
                                ?>
                                <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                <?php
                              }else{//belum disetujui
                                ?>
                                <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                <?php
                              }
                            }else{
                              ?>
                              <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                              <?php
                            }
                          }elseif($atasan == "tidak"){  //pengaju STAF (bukan atasan)
                            $kode_unit_pengaju = $BarangM->staf_sendiri($barang->kode_jabatan_unit)->result()[0]->kode_unit;
                            if($kode_unit_pengaju == $data_diri->kode_unit){ // pengaju staf sendiri->bisa acc
                              if($barang_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                if(!is_null($barang->status_pengajuan)){//sudah disetujui->tidak bisa acc
                                  ?>
                                  <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                  <?php
                                }else{//belum disetujui
                                  ?>
                                  <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                  <?php
                                }
                              }else{
                                $progress_atasan_terima = $BarangM->get_progress_terima_by_kode_jabatan_unit($barang->kode_item_pengajuan, $barang->pimpinan,'1'); //progress dari atasan yang "diterima"(kode 1)
                                $progress_atasan_tolak = $BarangM->get_progress_terima_by_kode_jabatan_unit($barang->kode_item_pengajuan, $barang->pimpinan,'2'); //progress dari atasan yang "ditolak"(kode 2)
                                if($acc_atasan > 0){ // kegiatan sudah diberikan progress atsan
                                  if($progress_atasan_terima > 0){ // diterima ->bisa acc
                                    if($barang_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                      if(!is_null($barang->status_pengajuan)){//sudah disetujui->tidak bisa acc
                                        ?>
                                        <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        <?php
                                      }else{//belum disetujui
                                        ?>
                                        <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        <?php
                                      }
                                    }else{
                                      ?>
                                      <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }
                                  }elseif($progress_atasan_tolak > 0){ //ditolak ->tidak bisa acc
                                    ?>
                                    <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }
                                }elseif($acc_atasan == 0){ //kegiatan belum acc atasan->tidak bisa acc
                                  ?>
                                  <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                  <?php
                                }
                              }
                            }elseif($kode_unit_pengaju != $data_diri->kode_unit){ //pengaju bukan staf sendiri
                              $progress_atasan_terima = $BarangM->get_progress_terima_by_kode_jabatan_unit($barang->kode_item_pengajuan, $barang->pimpinan,'1'); //progress dari atasan yang "diterima"(kode 1)
                              $progress_atasan_tolak = $BarangM->get_progress_terima_by_kode_jabatan_unit($barang->kode_item_pengajuan, $barang->pimpinan,'2'); //progress dari atasan yang "ditolak"(kode 2)
                              if($acc_atasan > 0){ // kegiatan sudah diberikan progress atsan
                                if($progress_atasan_terima > 0){ // diterima ->bisa acc
                                  if($barang_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                    if(!is_null($barang->status_pengajuan)){//sudah disetujui->tidak bisa acc
                                      ?>
                                      <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }else{//belum disetujui
                                      ?>
                                      <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }
                                  }else{
                                    ?>
                                    <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }
                                }elseif($progress_atasan_tolak > 0){ //ditolak ->tidak bisa acc
                                  ?>
                                  <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                  <?php
                                }
                              }elseif($acc_atasan == 0){ //kegiatan belum acc atasan->tidak bisa acc
                                ?>
                                <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                <?php
                              }
                            }
                          }elseif($atasan == "ya"){//pengaju atasan -> bisa acc
                            if($barang_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                              if(!is_null($barang->status_pengajuan)){//sudah disetujui->tidak bisa acc
                                ?>
                                <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                <?php
                              }else{//belum disetujui
                                ?>
                                <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                <?php
                              }
                            }else{
                              ?>
                              <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                              <?php
                            }
                          }
                        }elseif($jabatan_saya == $id_min && $jabatan_saya != $id_max){ // ranking asesor min tapi tidak max (tertinggi dan punya bawahan)
                          $rank_sendiri   = $BarangM->cek_rank_barang_by_id_pegawai($jabatan_saya)->ranking; //rank sendiri
                          $rank_lebih_besar  = ((int)$rank_sendiri + 1); //rank sendri + 1 (rank bawahnya)
                          $id_lebih_besar    = $BarangM->cek_id_by_rank_barang($rank_lebih_besar)->kode_jabatan_unit; //id yang ranknya (ran ksendiri + 1)
                          $progress_id_lebih_besar = $BarangM->progress_sendiri($barang->kode_item_pengajuan, $id_lebih_besar); //progress id yang ranknya (rank sendiri+1)
                          if($progress_id_lebih_besar > 0){ //sudah diberi progress rank bawahnya
                            if($progress_tolak == 0 && $progress_tolak_staf == 0){ // tidak ditolak
                              if($barang_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                if(!is_null($barang->status_pengajuan)){//sudah disetujui->tidak bisa acc
                                  ?>
                                  <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                  <?php
                                }else{//belum disetujui
                                  $rank_p = $BarangM->get_progress_by_kode_item_pengajuan($barang->kode_item_pengajuan)->result()[0]->kode_jabatan_unit;//cari progress berdasarkan kode kegiatan
                                  $rank_progress = $BarangM->cek_rank_barang_by_id_pegawai($rank_p)->ranking; // cari ranking by kode jabatan unit
                                  if($rank_sendiri > $rank_progress){ //progress sampe diatas 
                                    ?>
                                    <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }else{ //progress sampe bawah
                                    ?>
                                    <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }
                                }
                              }else{ //acc masuk dulu baru kegiatan
                                ?>
                                <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                <?php
                              }
                            }else{ //ditolak
                              ?>
                              <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Kegiatan ditolak" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                              <?php
                            }
                          }else{ //belum di kasih progress rank bawahnya
                            ?>
                            <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Belum disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                            <?php
                          }
                        }elseif ($jabatan_saya != $id_min && $jabatan_saya != $id_max) { //ranking asesor bukan min dan bukan max (ditengah tengah rankingnya)
                          $rank_sendiri   = $BarangM->cek_rank_barang_by_id_pegawai($jabatan_saya)->ranking; //rank sendiri
                          $rank_lebih_besar  = ((int)$rank_sendiri + 1); //rank sendri + 1 (rank bawahnya)
                          $id_lebih_besar    = $BarangM->cek_id_by_rank_barang($rank_lebih_besar)->kode_jabatan_unit; //id yang ranknya (ran ksendiri + 1)
                          $progress_id_lebih_besar = $BarangM->progress_sendiri($barang->kode_item_pengajuan, $id_lebih_besar); //progress id yang ranknya (rank sendiri+1)
                          if($progress_id_lebih_besar > 0){ //sudah diberi progress rank bawahnya
                            if($progress_tolak == 0 && $progress_tolak_staf == 0){ // tidak ditolak
                              if($barang_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                if(!is_null($barang->status_pengajuan)){//sudah disetujui->tidak bisa acc
                                  ?>
                                  <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                  <?php
                                }else{//belum disetujui
                                  $rank_p = $BarangM->get_progress_by_kode_item_pengajuan($barang->kode_item_pengajuan)->result()[0]->kode_jabatan_unit;//cari progress berdasarkan kode kegiatan
                                  $rank_progress = $BarangM->cek_rank_barang_by_id_pegawai($rank_p)->ranking; // cari ranking by kode jabatan unit
                                  if($rank_sendiri > $rank_progress){ //progress sampe diatas 
                                    ?>
                                    <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }else{ //progress sampe bawah
                                    ?>
                                    <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }
                                }
                              }else{ //acc masuk dulu baru kegiatan
                                ?>
                                <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                <?php
                              }
                            }else{ //ditolak
                              ?>
                              <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Kegiatan ditolak" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                              <?php
                            }
                          }else{ //belum di kasih progress rank bawahnya
                            ?>
                            <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Belum disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                            <?php
                          }
                        }elseif ($jabatan_saya != $id_min && $jabatan_saya == $id_max) { //rank asesor paling bawah (acc pertama kali)
                          if($barang->kode_jabatan_unit == $data_diri->kode_jabatan_unit){//pengaju dia sendiri->bisa acc
                            ?>  
                            <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                            <?php
                          }elseif($atasan == "tidak"){ //pengaju STAF (bukan atsan)
                            $kode_unit_pengaju = $BarangM->staf_sendiri($barang->kode_jabatan_unit)->result()[0]->kode_unit;
                            if($kode_unit_pengaju == $data_diri->kode_unit){ //pengaju staf sendiri->bisa acc
                              if($barang_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                if(!is_null($barang->status_pengajuan)){//sudah disetujui->tidak bisa acc
                                  ?>
                                  <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                  <?php
                                }else{//belum disetujui
                                  $rank_p = $BarangM->get_progress_by_kode_item_pengajuan($barang->kode_item_pengajuan)->result()[0]->kode_jabatan_unit;//cari progress berdasarkan kode kegiatan
                                  $rank_progress = $BarangM->cek_rank_barang_by_id_pegawai($rank_p)->ranking; // cari ranking by kode jabatan unit
                                  if($rank_sendiri > $rank_progress){ //progress sampe diatas 
                                    ?>
                                    <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }else{ //progress sampe bawah
                                    $progress_atasan_terima = $BarangM->get_progress_terima_by_kode_jabatan_unit($barang->kode_item_pengajuan, $barang->pimpinan,'1'); //progress dari atasan yang "diterima"(kode 1)
                                    $progress_atasan_tolak = $BarangM->get_progress_terima_by_kode_jabatan_unit($barang->kode_item_pengajuan, $barang->pimpinan,'2'); //progress dari atasan yang "ditolak"(kode 2)
                                    if($acc_atasan > 0){ // kegiatan sudah diberikan progress atsan
                                      if($progress_atasan_terima > 0){ // diterima ->bisa acc
                                        if($barang_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                          if(!is_null($barang->status_pengajuan)){//sudah disetujui->tidak bisa acc
                                            ?>
                                            <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                            <?php
                                          }else{//belum disetujui
                                            $rank_sendiri   = $BarangM->cek_rank_barang_by_id_pegawai($jabatan_saya)->ranking; //rank sendiri
                                            $rank_p = $BarangM->get_progress_by_kode_item_pengajuan($barang->kode_item_pengajuan)->result()[0]->kode_jabatan_unit;//cari progress berdasarkan kode kegiatan
                                            $rank_progress = $BarangM->cek_rank_barang_by_id_pegawai($rank_p)->ranking; // cari ranking by kode jabatan unit
                                            if($rank_sendiri > $rank_progress){ //progress sampe diatas 
                                              ?>
                                              <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                              <?php
                                            }else{ //progress sampe bawah
                                              ?>
                                              <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                              <?php
                                            }
                                          }
                                        }else{ //acc masuk dulu baru kegiatan
                                          ?>
                                          <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                          <?php
                                        }
                                      }elseif($progress_atasan_tolak > 0){ //ditolak ->tidak bisa acc
                                        ?>
                                        <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        <?php
                                      }
                                    }elseif($acc_atasan == 0){ //kegiatan belum acc atasan->tidak bisa acc
                                      ?>
                                      <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }
                                  }
                                }
                              }else{ //acc masuk dulu baru kegiatan
                                $progress_atasan_terima = $BarangM->get_progress_terima_by_kode_jabatan_unit($barang->kode_item_pengajuan, $barang->pimpinan,'1'); //progress dari atasan yang "diterima"(kode 1)
                                $progress_atasan_tolak = $BarangM->get_progress_terima_by_kode_jabatan_unit($barang->kode_item_pengajuan, $barang->pimpinan,'2'); //progress dari atasan yang "ditolak"(kode 2)
                                if($acc_atasan > 0){ // kegiatan sudah diberikan progress atsan
                                  if($progress_atasan_terima > 0){ // diterima ->bisa acc
                                    if($barang_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                      if(!is_null($barang->status_pengajuan)){//sudah disetujui->tidak bisa acc
                                        ?>
                                        <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        <?php
                                      }else{//belum disetujui
                                        $rank_sendiri   = $BarangM->cek_rank_barang_by_id_pegawai($jabatan_saya)->ranking; //rank sendiri
                                        $rank_p = $BarangM->get_progress_by_kode_item_pengajuan($barang->kode_item_pengajuan)->result()[0]->kode_jabatan_unit;//cari progress berdasarkan kode kegiatan
                                        $rank_progress = $BarangM->cek_rank_barang_by_id_pegawai($rank_p)->ranking; // cari ranking by kode jabatan unit
                                        if($rank_sendiri > $rank_progress){ //progress sampe diatas 
                                          ?>
                                          <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                          <?php
                                        }else{ //progress sampe bawah
                                          ?>
                                          <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                          <?php
                                        }
                                      }
                                    }else{ //acc masuk dulu baru kegiatan
                                      ?>
                                      <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }
                                  }elseif($progress_atasan_tolak > 0){ //ditolak ->tidak bisa acc
                                    ?>
                                    <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }
                                }elseif($acc_atasan == 0){ //kegiatan belum acc atasan->tidak bisa acc
                                  ?>
                                  <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                  <?php
                                }
                              }
                            }elseif ($kode_unit_pengaju != $data_diri->kode_unit) { //pengaju bukan staf sendiri
                              $progress_atasan_terima = $BarangM->get_progress_terima_by_kode_jabatan_unit($barang->kode_item_pengajuan, $barang->pimpinan,'1'); //progress dari atasan yang "diterima"(kode 1)
                              $progress_atasan_tolak = $BarangM->get_progress_terima_by_kode_jabatan_unit($barang->kode_item_pengajuan, $barang->pimpinan,'2'); //progress dari atasan yang "ditolak"(kode 2)
                              if($acc_atasan > 0){ // kegiatan sudah diberikan progress atsan
                                if($progress_atasan_terima > 0){ // diterima ->bisa acc
                                  if($barang_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                                    if(!is_null($barang->status_pengajuan)){//sudah disetujui->tidak bisa acc
                                      ?>
                                      <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                      <?php
                                    }else{//belum disetujui
                                      $rank_sendiri   = $BarangM->cek_rank_barang_by_id_pegawai($jabatan_saya)->ranking; //rank sendiri
                                      $rank_p = $BarangM->get_progress_by_kode_item_pengajuan($barang->kode_item_pengajuan)->result()[0]->kode_jabatan_unit;//cari progress berdasarkan kode kegiatan
                                      $rank_progress = $BarangM->cek_rank_barang_by_id_pegawai($rank_p)->ranking; // cari ranking by kode jabatan unit
                                      if($rank_sendiri > $rank_progress){ //progress sampe diatas 
                                        ?>
                                        <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        <?php
                                      }else{ //progress sampe bawah
                                        ?>
                                        <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan 1" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        <?php
                                      }
                                    }
                                  }else{ //acc masuk dulu baru kegiatan
                                    ?>
                                    <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan 2" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                    <?php
                                  }
                                }elseif($progress_atasan_tolak > 0){ //ditolak ->tidak bisa acc
                                  ?>
                                  <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                  <?php
                                }
                              }elseif($acc_atasan == 0){ //kegiatan belum acc atasan->tidak bisa acc
                                ?>
                                <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                <?php
                              }
                            }
                          }elseif($atasan == "ya"){
                            if($barang_created > $acc_created){ //kegiatan dullu baru acc_kegiatan masuk
                              if(!is_null($barang->status_pengajuan)){//sudah disetujui->tidak bisa acc
                                ?>
                                <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                <?php
                              }else{//belum disetujui
                                $rank_p = $BarangM->get_progress_by_kode_item_pengajuan($barang->kode_item_pengajuan)->result()[0]->kode_jabatan_unit;//cari progress berdasarkan kode kegiatan
                                $rank_progress = $BarangM->cek_rank_barang_by_id_pegawai($rank_p)->ranking; // cari ranking by kode jabatan unit
                                if($rank_sendiri > $rank_progress){ //progress sampe diatas 
                                  ?>
                                  <a id="custId" disabled data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Sudah disetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                  <?php
                                }else{ //progress sampe bawah
                                  ?>
                                  <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                  <?php
                                }
                              }
                            }else{ //acc masuk dulu baru kegiatan
                              ?>
                              <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" data-toggle="tooltip" title="Masukkan persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                              <?php
                            }
                          }
                        }
                      }
                      ?>
                    </td>
                  </tr>

                  <!-- Modal Detail Item Pengajuan -->
                  <div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="modal-<?php echo $barang->kode_item_pengajuan; ?>" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                          <h4 class="modal-title" id="titlemodal">Item Pengajuan Barang</h4>
                        </div>
                        <form class="form-horizontal" role="form">
                          <div class="modal-body">                        
                            <label class="control-label col-sm-5" style="text-align: left;">Nama Barang</label>
                            <p class="form-control-static"> <?php echo ": ".$barang->nama_barang; ?> </p>
                            <label class="control-label col-sm-5" style="text-align: left;">Nama Item Pengajuan</label>
                            <p class="form-control-static"> <?php echo ": ".$barang->nama_item_pengajuan; ?> </p>
                            <!-- // -->
                            <label class="control-label col-sm-5" style="text-align: left;">Nama Pengaju</label>
                            <p class="form-control-static"> <?php echo ": ".$barang->nama; ?> </p>
                            <label class="control-label col-sm-5" style="text-align: left;">Jabatan</label>
                            <p class="form-control-static"> <?php echo ": ".$barang->nama_jabatan." ".$barang->nama_unit; ?> </p>
                            <!-- // -->
                            <label class="control-label col-sm-5" style="text-align: left;">Status Persediaan</label>
                            <p class="form-control-static"> <?php echo ": ".$barang->status_persediaan; ?> </p>
                            <label class="control-label col-sm-5" style="text-align: left;">URL</label>
                            <p class="form-control-static"> <?php echo ": ".$barang->url; ?> </p>
                            <label class="control-label col-sm-5" style="text-align: left;">Harga Satuan</label>
                            <p class="form-control-static"> <?php echo ": Rp".number_format($barang->harga_satuan, 0,',','.').",00"; ?> </p>
                            <label class="control-label col-sm-5" style="text-align: left;">Merk</label>
                            <p class="form-control-static"> <?php echo ": ".$barang->merk; ?> </p>
                          </div>
                          <div class="modal-footer">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END Modal Item Pengajuan-->

                <!-- Modal Terima Item Pengajuan -->
                <div aria-hidden="true" aria-labelledby="myModal1" role="dialog" tabindex="-1" id="mymodal1-<?php echo $barang->kode_item_pengajuan; ?>" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title" id="titlemodal">Terima Item Pengajuan Barang</h4>
                      </div>
                      <form class="form-horizontal" action="<?php echo base_url('BarangC/post_persetujuan_barang');?>" method="post">
                        <div class="modal-body">
                          <div class="form-group">
                            <!-- ambil id_pengguna_jabatan berdasarkan user yang login-->
                            <input class="form-control" type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $data_diri->id_pengguna;?>" required> 
                            <!-- kirim kode_fk berdasarkan kode_item_pengajuan dari barang yang terpilih -->
                            <input class="form-control" type="hidden" id="kode_fk" name="kode_fk" value="<?php echo $barang->kode_item_pengajuan;?>" required>
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
                        <button class="btn btn-info" type="submit" onClick="return confirm('Anda yakin akan menyetujui pengajuan ini?')"> Simpan </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END Modal Terima Item Pengajuan-->

              <!-- Modal Tolak Item Pengajuan -->
              <div aria-hidden="true" aria-labelledby="myModal2" role="dialog" tabindex="-1" id="mymodal2-<?php echo $barang->kode_item_pengajuan; ?>" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                      <h4 class="modal-title" id="titlemodal">Tolak Item Pengajuan Barang</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url('BarangC/post_persetujuan_barang');?>" method="post">
                      <div class="modal-body">
                        <div class="form-group">
                          <!-- ambil id_pengguna_jabatan berdasarkan user yang login-->
                          <input class="form-control" type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $data_diri->id_pengguna;?>" required> 
                          <!-- kirim kode_fk berdasarkan kode_item_pengajuan dari barang yang terpilih -->
                          <input class="form-control" type="hidden" id="kode_fk" name="kode_fk" value="<?php echo $barang->kode_item_pengajuan;?>" required>
                          <!-- kirim kode_nama_progress = 2 untuk tolak -->
                          <input class="form-control" type="hidden" id="kode_jabatan_unit" name="kode_jabatan_unit" value="<?php echo $data_diri->kode_jabatan_unit;?>" required> 
                          <!-- ambil kode_jabatan_unit yang login -->
                          <input type="hidden" class="form-control" placeholder id="kode_nama_progress" name="kode_nama_progress" required value="2">
                          <label class="col-lg-4 col-sm-2 control-label">Komentar Penolakan:</label>
                          <div class="modal-body">
                            <input class="form-control" type="hidden" id="jenis_progress" name="jenis_progress" value="barang" required>
                            <textarea name="komentar" value="" class="form-control" placeholder="Komentar" rows="3" required></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-info" type="submit" onClick="return confirm('Anda yakin akan menolak pengajuan ini?')"> Simpan </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
            <!-- END Modal Tolak Item Pengajuan-->

            <!-- ================== -->
            <?php
          }else{
            ?>
            <tr class="text-center" style="background-color: lightblue">
              <td> 
               <a href="#" data-toggle="modal" data-target="#modal-<?php echo $barang->kode_item_pengajuan; ?>"><?php echo $barang->nama_item_pengajuan ?></a>
             </td>
             <td><?php 
                     // mendapatkan nama pengaju dari kode item pengajuan berdasarkan id
             $pengaju = $BarangM->get_data_item_pengajuan_by_id($barang->kode_item_pengajuan)->result()[0]->nama;
             echo $pengaju;
             ?>
           </td>
           <td>
            <?php 
                    // mendapatkan nama jabatan dari kode item pengajuan berdasarkan id
            $jabatan      = $BarangM->get_data_item_pengajuan_by_id($barang->kode_item_pengajuan)->result()[0]->nama_jabatan;
                    // mendapatkan kode jabatan dari kode item pengajuan berdasarkan id
            $kode_jabatan = $BarangM->get_data_item_pengajuan_by_id($barang->kode_item_pengajuan)->result()[0]->kode_jabatan;
                    // mendapatkan nama unit dari kode item pengajuan berdasarkan id
            $unit = $BarangM->get_data_item_pengajuan_by_id($barang->kode_item_pengajuan)->result()[0]->nama_unit;
                    // mendapatkan kode unit dari kode item pengajuan berdasarkan id
            $kode_unit = $BarangM->get_data_item_pengajuan_by_id($barang->kode_item_pengajuan)->result()[0]->kode_unit;
                    //menampilkan nama jabatan dan unit dari pengaju item pengajuan
            echo $jabatan." ".$unit;
            ?>
          </td>
          <td><center><img style="height: 60px;" src="<?php echo base_url();?>assets/file_gambar/<?php echo $barang->file_gambar;?>"></center></td>
          <td><?php echo $barang->tgl_item_pengajuan;?></td>
          <td><?php echo $barang->jumlah;?></td>
          <?php 
          $jumlah = $barang->jumlah;
          $harga = $barang->harga_satuan;
                  //menghitung hasil total biaya item pengajuan dari perkalian harga satuan dengan jumlah barang
          $total = $jumlah*$harga;
          ?>
          <td>Rp<?php echo number_format($total, 0,',','.') ?>,00</td>
          <td> 
            <?php
                        $kode_fk = $barang->kode_item_pengajuan; //untuk mengambil kode_item_pengajuan
                        $id_staf_sarpras = $BarangM->cek_id_staf_sarpras()->result()[0]->kode_jabatan_unit; // untuk menmeriksa pengajuan tersebut mendapatkan progress dari siapa saja
                        $progress_oleh_staf = $BarangM->get_progress_oleh_staf($kode_fk, $id_staf_sarpras);//untuk mengetahui jika pengajuan sudah mendapat progress yang diberikan oleh staff sarpras, dimana staff sarpras adalah yang paling akhir memberikan progress tambahan

                        if($progress_oleh_staf > 0){ //jika item_pengajuan sudah mendapat progress dari staf sarpras
                            $nama_progress = $BarangM->get_nama_progress_by_id($id_staf_sarpras, $kode_fk)->result()[0]->nama_progress; //untuk menampilkan nama_progress yangdiberikan oleh staf_sarpras 
                            ?>
                            <a class="label label-success" href="#modal_progress_barang" id="custId" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="Aksi"><?php echo $nama_progress; ?></a>
                            <?php
                          }else{
                            if($barang->status_pengajuan == "baru"){
                              ?>
                              <a class="label label-primary" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress"> BARU</a>
                              <?php
                            }else if($barang->status_pengajuan == "proses"){
                              ?>
                              <a class="label label-info" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress">PROSES</a>
                              <?php
                            }else if($barang->status_pengajuan == "pengajuan"){
                              ?>
                              <a class="label label-success" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress">PENGAJUAN</a>
                              <?php
                            }else if($barang->status_pengajuan == "selesai"){
                              ?>
                              <a class="label label-success" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress">SELESAI</a>
                              <?php
                            }else if($barang->status_pengajuan == "tunda"){
                              ?>
                              <a class="label label-warning" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress">TUNDA</a>
                              <?php
                            }else if($barang->status_pengajuan == "disetujui"){
                              ?>
                              <a class="label label-success" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress">DISETUJUI</a>
                              <?php
                            }else if($barang->status_pengajuan == "tolak"){
                              ?>
                              <a class="label label-danger" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress">TOLAK</a>
                              <?php
                            }
                          }
                          ?>

                        </td>
                        <td><center>
                          <div class="btn-group">
                            <a href="<?php echo base_url('BarangC/update_klasifikasi/'."2/".$barang->kode_barang);?>" id="custId" data-toggle="tooltip" data-toggle="tooltip" title="Aksi" class="btn btn-success btn-sm">Aset</span></a>
                            <a href="<?php echo base_url('BarangC/update_klasifikasi/'."1/".$barang->kode_barang);?>" id="custId" data-toggle="tooltip" data-toggle="tooltip" title="Aksi" class="btn btn-danger btn-sm">Habis Pakai</span></a>
                          </div>
                        </center></td>
                      </tr>

                      <!-- Modal Detail Item Pengajuan -->
                      <div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="modal-<?php echo $barang->kode_item_pengajuan; ?>" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title" id="titlemodal">Item Pengajuan Barang</h4>
                            </div>
                            <form class="form-horizontal" role="form">
                              <div class="modal-body">                        
                                <label class="control-label col-sm-5" style="text-align: left;">Nama Barang</label>
                                <p class="form-control-static"> <?php echo ": ".$barang->nama_barang; ?> </p>
                                <label class="control-label col-sm-5" style="text-align: left;">Nama Item Pengajuan</label>
                                <p class="form-control-static"> <?php echo ": ".$barang->nama_item_pengajuan; ?> </p>
                                <!-- // -->
                                <label class="control-label col-sm-5" style="text-align: left;">Nama Pengaju</label>
                                <p class="form-control-static"> <?php echo ": ".$barang->nama; ?> </p>
                                <label class="control-label col-sm-5" style="text-align: left;">Jabatan</label>
                                <p class="form-control-static"> <?php echo ": ".$barang->nama_jabatan." ".$barang->nama_unit; ?> </p>
                                <!-- // -->
                                <label class="control-label col-sm-5" style="text-align: left;">Status Persediaan</label>
                                <p class="form-control-static"> <?php echo ": ".$barang->status_persediaan; ?> </p>
                                <label class="control-label col-sm-5" style="text-align: left;">URL</label>
                                <p class="form-control-static"> <?php echo ": ".$barang->url; ?> </p>
                                <label class="control-label col-sm-5" style="text-align: left;">Harga Satuan</label>
                                <p class="form-control-static"> <?php echo ": Rp".number_format($barang->harga_satuan, 0,',','.').",00"; ?> </p>
                                <label class="control-label col-sm-5" style="text-align: left;">Merk</label>
                                <p class="form-control-static"> <?php echo ": ".$barang->merk; ?> </p>
                              </div>
                              <div class="modal-footer">
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- END Modal Item Pengajuan-->
                    <?php
                  }
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

<!-- modal progress barang -->
<div class="modal fade" id="myModal2" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Progress Barang</h4>
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
  $(document).ready(function(){
    $('#myModal2').on('show.bs.modal', function (e) {
      var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type : 'get',
              url : '<?php echo base_url().'BarangC/detail_progress_barang/'?>'+rowid,
                //data :  'rowid='+ rowid, // $_POST['rowid'] = rowid
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
              }
            });
          });
  };
</script>
