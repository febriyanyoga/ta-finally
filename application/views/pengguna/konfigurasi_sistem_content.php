<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header text-center" style="margin-top: 0;"> Konfigurasi Sistem </h3>
      </div>
    </div>
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

      <div class="collapse" id="demo">
        <div class="col-lg-12">
          <!-- Info Status -->
          <div class="alert alert-info">
            <a class="close" data-toggle="collapse" title="tutup" data-target="#demo">&times;</a>
            <p>Berikut adalah penjelasan dari tab menu<strong> Unit</strong> pada konfigurasi sistem<strong>:</strong></p>
            <table border="3" style="border-color: transparent; border-radius: 5px;" class="table table-sm table-hover borderless">
              <tr style="height: 30px">
                <td class="text-center" style="width: 10%"><a class="label label-warning">Kepala Departemen</a></td>
                <td style="width: 6%"><i class="glyphicon glyphicon-arrow-right"></td>
                  <td style="width: 62%"> Tanda seperti ini memiliki arti bahwa jabatan yang diberi warna tersebut merupakan jabatan sebagai pimpinan unit, sehingga jabatan lain dibawahnya membutuhkan persetujuan dari jabatan ini untuk mengajukan kegiatan pegawai dan pengajuan barang.</td>
                </tr>
                <tr style="height: 30px">
                  <td class="text-center"><i class="glyphicon glyphicon-trash text-danger"></i></td>
                  <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                  <td> Tombol seperti ini digunakan untuk menghapus jabatan disebelah kiri nya, namun apabila masih ada pengguna yang menjabat jabatan tersebut, maka jabatan tersebut tidak dapat dihapus.</td>
                </tr>
                <tr style="height: 30px">
                  <td class="text-center"><i class="glyphicon glyphicon-certificate text-warning"></i></td>
                  <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                  <td>Tombol ini digunakan untuk menjadikan jabatan disebelah kananya menjadi pimpinan unit dan berpengaruh dalam hal persetujuan pengajuan kegiatan dan barang.</td>
                </tr>
                <tr style="height: 30px">
                  <td class="text-center"><span class="btn btn-sm btn-success glyphicon glyphicon-edit"></span></td>
                  <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                  <td>Tombol ini digunakan untuk mengubah nama unit.</td>
                </tr>
                <tr style="height: 30px">
                  <td class="text-center"><span class="btn btn-sm btn-primary glyphicon glyphicon-plus-sign"></span></td>
                  <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                  <td>Tombol ini digunakan untuk menambah jabatan pada unit tertentu.</td>
                </tr>
                <tr style="height: 30px">
                  <td class="text-center"><span class="btn btn-sm btn-danger glyphicon glyphicon-trash"></span></td>
                  <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                  <td>Tombol ini digunakan untuk menghapus unit, namun apabila masih ada pengguna yang menjabat di unit tersebut, unit tidak dapat dihapus.</td>
                </tr>
                <tr style="height: 30px">
                  <td class="text-center"><a class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus-sign">Tambah Unit</span></a></td>
                  <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                  <td>Tombol ini digunakan untuk menambah unit.</td>
                </tr>
                <tr style="height: 30px">
                  <td class="text-center"><a class="btn btn-sm btn-primary "><span class="glyphicon glyphicon-plus-sign">Tambah Jabatan</span></a></td>
                  <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                  <td>Tombol ini digunakan untuk menambah jabatan yang dapat ditambahkan untuk semua unit.</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-lg-12">
            <!-- Keterangan Edit -->
            <div class="alert alert-info">
              <a class="close" data-toggle="collapse" title="tutup" data-target="#demo">&times;</a>
              <p>Berikut adalah penjelasan dari tab menu <strong>Nama Progress</strong> pada konfigurasi sistem<strong>:</strong></p>
              <table border="3" style="border-color: transparent;" class="table table-sm table-hover borderless">
               <tr style="height: 30px">
                <td class="text-center"><span class="btn btn-sm btn-success glyphicon glyphicon-edit"></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini digunakan untuk mengubah nama progress.</td>
              </tr>
              <tr style="height: 30px">
                <td class="text-center"><a class="btn btn-sm btn-primary "><span class="glyphicon glyphicon-plus-sign">Tambah Nama Progress</span></a></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini digunakan untuk menambah nama progress yang dapat digunakan untuk memasukkan status lanjutan sebuah pengajuan.</td>
              </tr>
            </table>
          </div>
          <!-- End Ket Edit -->
        </div>
        <div class="col-lg-12">
          <!-- Keterangan Edit -->
          <div class="alert alert-info">
            <a class="close" data-toggle="collapse" title="tutup" data-target="#demo">&times;</a>
            <p>Berikut adalah penjelasan dari tab menu <strong>Persetujuan Kegiatan Pegawai</strong> pada konfigurasi sistem<strong>:</strong></p>
            <table border="3" style="border-color: transparent;" class="table table-sm table-hover borderless">
              <tr style="height: 30px">
                <td class="text-center"><span class="btn btn-sm btn-danger glyphicon glyphicon-trash"></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini digunakan untuk menghapus jabatan dari urutan proses persetujuan dan sekaligus menghapus akses jabatan tersebut dari menu persetujuan kegiatan pegawai. Hanya jabatan dengan ranking terbawah yang dapat dihapus.</td>
              </tr>
              <tr style="height: 30px">
                <td class="text-center"><span class="btn btn-sm btn-danger glyphicon glyphicon-trash" disabled></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini menandakan bahwa tidak bisa menghapus jabatan dari urutan proses persetujuan dan sekaligus menghapus akses jabatan tersebut dari menu persetujuan kegiatan pegawai, karena ranking nya bukan terbawah.</td>
              </tr>
              <tr style="height: 30px">
                <td class="text-center"> <i class="glyphicon glyphicon-chevron-up"></i></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini digunakan untuk mengubah ranking jabatan keatas.</td>
              </tr>
              <tr style="height: 30px">
                <td class="text-center">  <i class="glyphicon glyphicon-chevron-down"></i></i></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini digunakan untuk mengubah ranking jabatan kebawah.</td>
              </tr>
            </table>
          </div>
          <!-- End Ket Edit -->
        </div>
        <div class="col-lg-12">
          <!-- Keterangan Edit -->
          <div class="alert alert-info">
            <a class="close" data-toggle="collapse" title="tutup" data-target="#demo">&times;</a>
            <p>Berikut adalah penjelasan dari tab menu <strong>Persetujuan Kegiatan Mahasiswa</strong> pada konfigurasi sistem<strong>:</strong></p>
            <table border="3" style="border-color: transparent;" class="table table-sm table-hover borderless">
              <tr style="height: 30px">
                <td class="text-center"><span class="btn btn-sm btn-danger glyphicon glyphicon-trash"></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini digunakan untuk menghapus jabatan dari urutan proses persetujuan dan sekaligus menghapus akses jabatan tersebut dari menu persetujuan kegiatan mahasiswa. Hanya jabatan dengan ranking terbawah yang dapat dihapus.</td>
              </tr>
              <tr style="height: 30px">
                <td class="text-center"><span class="btn btn-sm btn-danger glyphicon glyphicon-trash" disabled></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini menandakan bahwa tidak bisa menghapus jabatan dari urutan proses persetujuan dan sekaligus menghapus akses jabatan tersebut dari menu persetujuan kegiatan mahasiswa, karena ranking nya bukan terbawah.</td>
              </tr>
              <tr style="height: 30px">
                <td class="text-center"> <i class="glyphicon glyphicon-chevron-up"></i></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini digunakan untuk mengubah ranking jabatan keatas.</td>
              </tr>
              <tr style="height: 30px">
                <td class="text-center">  <i class="glyphicon glyphicon-chevron-down"></i></i></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini digunakan untuk mengubah ranking jabatan kebawah.</td>
              </tr>
            </table>
          </div>
          <!-- End Ket Edit -->
        </div>
        <div class="col-lg-12">
          <!-- Keterangan Edit -->
          <div class="alert alert-info">
            <a class="close" data-toggle="collapse" title="tutup" data-target="#demo">&times;</a>
            <p>Berikut adalah penjelasan dari tab menu <strong>Persetujuan Pengajuan Barang</strong> pada konfigurasi sistem<strong>:</strong></p>
            <table border="3" style="border-color: transparent;" class="table table-sm table-hover borderless">
              <tr style="height: 30px">
                <td class="text-center"><span class="btn btn-sm btn-danger glyphicon glyphicon-trash"></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini digunakan untuk menghapus jabatan dari urutan proses persetujuan dan sekaligus menghapus akses jabatan tersebut dari menu persetujuan pengajuan barang. Hanya jabatan dengan ranking terbawah yang dapat dihapus.</td>
              </tr>
              <tr style="height: 30px">
                <td class="text-center"><span class="btn btn-sm btn-danger glyphicon glyphicon-trash" disabled></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini menandakan bahwa tidak bisa menghapus jabatan dari urutan proses persetujuan dan sekaligus menghapus akses jabatan tersebut dari menu persetujuan pengajuan barang, karena ranking nya bukan terbawah.</td>
              </tr>
              <tr style="height: 30px">
                <td class="text-center"> <i class="glyphicon glyphicon-chevron-up"></i></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini digunakan untuk mengubah ranking jabatan keatas.</td>
              </tr>
              <tr style="height: 30px">
                <td class="text-center">  <i class="glyphicon glyphicon-chevron-down"></i></i></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini digunakan untuk mengubah ranking jabatan kebawah.</td>
              </tr>
            </table>
          </div>
          <!-- End Ket Edit -->
        </div>
        <div class="col-lg-12">
          <!-- Keterangan Edit -->
          <div class="alert alert-info">
            <a class="close" data-toggle="collapse" title="tutup" data-target="#demo">&times;</a>
            <p>Berikut adalah penjelasan dari tab menu <strong>Persetujuan Pengajuan RAB</strong> pada konfigurasi sistem<strong>:</strong></p>
            <table border="3" style="border-color: transparent;" class="table table-sm table-hover borderless">
              <tr style="height: 30px">
                <td class="text-center"><span class="btn btn-sm btn-danger glyphicon glyphicon-trash"></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini digunakan untuk menghapus jabatan dari urutan proses persetujuan dan sekaligus menghapus akses jabatan tersebut dari menu persetujuan pengajuan RAB. Hanya jabatan dengan ranking terbawah yang dapat dihapus.</td>
              </tr>
              <tr style="height: 30px">
                <td class="text-center"><span class="btn btn-sm btn-danger glyphicon glyphicon-trash" disabled></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini menandakan bahwa tidak bisa menghapus jabatan dari urutan proses persetujuan dan sekaligus menghapus akses jabatan tersebut dari menu persetujuan pengajuan RAB, karena ranking nya bukan terbawah.</td>
              </tr>
              <tr style="height: 30px">
                <td class="text-center"> <i class="glyphicon glyphicon-chevron-up"></i></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini digunakan untuk mengubah ranking jabatan keatas.</td>
              </tr>
              <tr style="height: 30px">
                <td class="text-center">  <i class="glyphicon glyphicon-chevron-down"></i></i></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini digunakan untuk mengubah ranking jabatan kebawah.</td>
              </tr>
            </table>
          </div>
          <!-- End Ket Edit -->
        </div>
        <div class="col-lg-12">
          <!-- Keterangan Edit -->
          <div class="alert alert-info">
            <a class="close" data-toggle="collapse" title="tutup" data-target="#demo">&times;</a>
            <p>Berikut adalah penjelasan dari tab menu <strong>Akses Menu</strong> pada konfigurasi sistem<strong>:</strong></p>
            <table border="3" style="border-color: transparent;" class="table table-sm table-hover borderless">
              <tr style="height: 30px">
                <td class="text-center"><span class="btn btn-sm btn-primary glyphicon glyphicon-plus-sign"></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini digunakan untuk menambah akses menu pada sebuah jabatan.</td>
              </tr>
              <tr style="height: 30px">
                <td class="text-center"><span class="btn btn-sm btn-primary glyphicon glyphicon-plus-sign" disabled></span></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini sudah tidak bisa digunakan untuk menambah akses menu pada sebuah jabatan. Ada beberapa akses menu yang tidak bisa ditambahkan lagi aksesnya.</td>
              </tr>
              <tr style="height: 30px">
                <td class="text-center"><i class="glyphicon glyphicon-trash text-danger"></i></td>
                <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                <td>Tombol ini digunakan untuk menghapus jabatan dari akses menu tertentu.</td>
              </tr>
            </table>
          </div>
          <!-- End Ket Edit -->
        </div>
      </div>

      <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active program-title" data-toggle="tab" href="#2" role="tab"><span class="glyphicon glyphicon-user"></span><br class="hidden-md-up"> Unit </a>
        </li>
        <li class="nav-item">
          <a class="nav-link program-title" data-toggle="tab" href="#5" role="tab"><span class="glyphicon glyphicon-time"></span><br class="hidden-md-up"> Nama Progress </a>
        </li>
        <li class="nav-item">
          <a class="nav-link program-title" data-toggle="tab" href="#6" role="tab"><span class="glyphicon glyphicon-ok"></span><br class="hidden-md-up"> Persetujuan Kegiatan Pegawai</a>
        </li>
        <li class="nav-item">
          <a class="nav-link program-title" data-toggle="tab" href="#9" role="tab"><span class="glyphicon glyphicon-ok"></span><br class="hidden-md-up"> Persetujuan Kegiatan Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link program-title" data-toggle="tab" href="#20" role="tab"><span class="glyphicon glyphicon-ok"></span><br class="hidden-md-up"> Persetujuan Pengajuan Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link program-title" data-toggle="tab" href="#21" role="tab"><span class="glyphicon glyphicon-ok"></span><br class="hidden-md-up"> Persetujuan Pengajuan RAB</a>
        </li>
        <li class="nav-item">
          <a class="nav-link program-title" data-toggle="tab" href="#7" role="tab"><span class="glyphicon glyphicon-list"></span><br class="hidden-md-up"> Akses Menu </a>
        </li>
      </ul>
    </div>
  </div>
  <!-- project team & activity end -->

  <div class="row">
    <div class="col-md-2 col-lg-2 col-sm-12">
      <br>
      <button data-toggle="collapse" data-target="#demo" class="btn btn-info btn-md" title="klik untuk melihat informasi"><i class="glyphicon glyphicon-alert"> Informasi</i></button>
    </div>
    <div class="col-md-8 col-lg-8 col-sm-12">
      <div class="tab-content" >
        <!-- Data tabel unit-->
        <div id="2" class="tab-pane active" role="tabpanel">
          <div class="row pt-5">
            <div class="col-lg-12">
             <div style="margin-top: 20px;">
               <a class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_unit"><i class="glyphicon glyphicon-plus-sign"> </i> Tambah Unit </a>
               <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal_tambah_jabatan"><i class="glyphicon glyphicon-plus-sign"> </i> Tambah Jabatan </a>


               <div class="table-responsive">
                 <table id="unit" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th style="width: 10px;">No</th>
                      <!-- <th style="width: 10px;">ID</th> -->
                      <th> Nama Unit</th>
                      <!-- <th>Status</th> -->
                      <th style="width: auto;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=0;
                    foreach ($unit as $unit) {
                      $i++;
                      ?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td>
                          <div class="relative">
                            <strong><?php echo $unit->nama_unit;?></strong>
                            <p><small class="kecil" style="font-size: 12px; color: blue;">
                              <?php
                              if($jabatan = $PenggunaM->get_jabatan_by_unit($unit->kode_unit)){
                                $max = count($jabatan->result());
                                $j = 0;
                                foreach ($jabatan->result() as $nama_jabatan) {
                                  $j++;
                                  if($j == $max){
                                    if($nama_jabatan->atasan == "tidak"){
                                      ?>
                                      <a href="<?php echo base_url('PenggunaC/update_pimpinan/').$nama_jabatan->kode_jabatan_unit.'/'.$nama_jabatan->kode_unit ?>" onClick="return confirm('Anda yakin akan menjadikan Jabatan <?php echo $nama_jabatan->nama_jabatan.' '.$unit->nama_unit?> sebagai pimpinan ?')" title="jadikan pimpinan" style="color: red;"><i class="glyphicon glyphicon-certificate text-warning"></i></a>
                                      <?php echo $nama_jabatan->nama_jabatan.' '.$nama_jabatan->nama_unit?> 
                                      <a href="<?php echo base_url('PenggunaC/hapus_jabatan_unit/').$nama_jabatan->kode_jabatan_unit ?>" onClick="return confirm('Anda yakin akan menghapus Jabatan <?php echo $nama_jabatan->nama_jabatan.' '.$unit->nama_unit?>?')" style="color: red;"><i class="glyphicon glyphicon-trash text-danger"></i></a>.
                                      <?php
                                    }else{
                                      ?>
                                      <a disabled title="Pimpinan Unit" class="label label-warning"><?php echo $nama_jabatan->nama_jabatan.' '.$nama_jabatan->nama_unit?> </a>
                                      <a href="<?php echo base_url('PenggunaC/hapus_jabatan_unit/').$nama_jabatan->kode_jabatan_unit ?>" onClick="return confirm('Anda yakin akan menghapus Jabatan <?php echo $nama_jabatan->nama_jabatan.' '.$unit->nama_unit?>?')" style="color: red;"><i class="glyphicon glyphicon-trash text-danger"></i></a>.
                                      <?php
                                    }
                                  }else{
                                    if($nama_jabatan->atasan == "tidak"){
                                      ?>
                                      <a href="<?php echo base_url('PenggunaC/update_pimpinan/').$nama_jabatan->kode_jabatan_unit.'/'.$nama_jabatan->kode_unit ?>" onClick="return confirm('Anda yakin akan menjadikan Jabatan <?php echo $nama_jabatan->nama_jabatan.' '.$unit->nama_unit?> sebagai pimpinan ?')" title="jadikan pimpinan" style="color: red;"><i class="glyphicon glyphicon-certificate text-warning"></i></a>
                                      <?php echo $nama_jabatan->nama_jabatan.' '.$nama_jabatan->nama_unit ?>
                                      <a href="<?php echo base_url('PenggunaC/hapus_jabatan_unit/').$nama_jabatan->kode_jabatan_unit ?>" onClick="return confirm('Anda yakin akan menghapus Jabatan <?php echo $nama_jabatan->nama_jabatan.' '.$unit->nama_unit?>?')" style="color: red;"><i class="glyphicon glyphicon-trash text-danger"></i></a>,
                                      <?php
                                    }else{
                                      ?>
                                      <a disabled title="Pimpinan Unit" class="label label-warning"><?php echo $nama_jabatan->nama_jabatan.' '.$nama_jabatan->nama_unit ?> </a>
                                      <a href="<?php echo base_url('PenggunaC/hapus_jabatan_unit/').$nama_jabatan->kode_jabatan_unit ?>" onClick="return confirm('Anda yakin akan menghapus Jabatan <?php echo $nama_jabatan->nama_jabatan.' '.$unit->nama_unit?>?')" style="color: red;"><i class="glyphicon glyphicon-trash text-danger"></i></a>,
                                      <?php
                                    }
                                  }
                                } 
                              }else{
                                echo "Belum ada Jabatan";
                              }
                              ?>
                            </small></p>
                          </div>
                        </td>
                        <!-- <td><?php echo "status";?></td> -->
                        <td class="text-center"> 
                          <div class="btn-group">
                            <a href="#modal_unit" id="custId" data-toggle="modal" data-id="<?php echo $unit->kode_unit;?>" data-toggle="tooltip" title="Edit Unit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                            <a data-toggle="modal" title="Tambah Jabatan Unit" class="btn btn-primary btn-sm" data-target="#modal_tambah_jabatan-<?php echo $unit->kode_unit?>"><span class="glyphicon glyphicon-plus-sign"></span></a>
                            <a href="<?php echo base_url('PenggunaC/hapus_unit/').$unit->kode_unit?>" title="Hapus Unit" class="btn btn-danger btn-sm" onClick="return confirm('Anda yakin akan menghapus unit <?php echo $unit->nama_unit?>?')"><span class="glyphicon glyphicon-trash"></span></a>
                          </div>
                        </td>
                      </tr>

                      <!-- modal tambah jabatan -->
                      <div aria-hidden="true" aria-labelledby="modal_tambah_jabatan-<?php echo $unit->kode_unit?>" role="dialog" tabindex="-1" id="modal_tambah_jabatan-<?php echo $unit->kode_unit?>" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title">Tambah Jabatan</h4>
                            </div>
                            <div class="modal-body">
                              <?php echo form_open_multipart('PenggunaC/tambah_jabatan');?>
                              <form role="form" action="<?php echo base_url(); ?>PenggunaC/tambah_jabatan" method="post">
                                <div class="form-group">
                                  <label>Nama Jabatan</label>
                                  <input class="form-control" placeholder="Nama Jabatan" type="hidden" id="kode_unit" name="kode_unit" value="<?php echo $unit->kode_unit?>" required>
                                  <select class="form-control" name="kode_jabatan" id="kode_jabatan">
                                    <option value="">---- Pilih Jabatan ---- </option>
                                    <?php 
                                    foreach ($jabatan_pilihan as $pilihan_jabatan) {
                                      ?>
                                      <option value="<?php echo $pilihan_jabatan->kode_jabatan;?>"><?php echo $pilihan_jabatan->nama_jabatan." - ".$unit->nama_unit?></option>
                                      <?php
                                    }
                                    ?>
                                  </select>
                                </div>
                                <div class="modal-footer">
                                  <input type="submit" class="btn btn-primary col-lg-2"  value="Simpan">
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

      <!-- modal tambah jabatan -->
      <div aria-hidden="true" aria-labelledby="modal_tambah_jabatan" role="dialog" tabindex="-1" id="modal_tambah_jabatan" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h4 class="modal-title">Tambah Jabatan</h4>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('PenggunaC/tambah_jabatan_2');?>
              <form role="form" action="<?php echo base_url(); ?>PenggunaC/tambah_jabatan_2" method="post">
                <div class="form-group">
                  <label>Nama Jabatan</label>
                  <input class="form-control" placeholder="Nama Jabatan" type="text" id="nama_jabatan" name="nama_jabatan" required>
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary col-lg-2"  value="Simpan">
                </div> 
                <?php echo form_close()?>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- modal edit unit -->
      <div class="modal fade" id="modal_unit" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Unit</h4>
            </div>
            <div class="modal-body">
              <div class="fetched-data"></div>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>

      <!-- modal tambah unit -->
      <div aria-hidden="true" aria-labelledby="modal_tambah_unit" role="dialog" tabindex="-1" id="modal_tambah_unit" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h4 class="modal-title">Tambah Unit</h4>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('PenggunaC/tambah_unit');?>
              <form role="form" action="<?php echo base_url(); ?>PenggunaC/tambah_unit" method="post">
                <div class="form-group">
                  <label>Nama Unit</label>
                  <input class="form-control" placeholder="Nama Unit" type="text" id="nama_unit" name="nama_unit" required>
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary col-lg-2"  value="Simpan">
                </div> 
                <?php echo form_close()?>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Data tabel nama_progress-->
      <div id="5" class="tab-pane" role="tabpanel">
        <div class="row pt-5">
          <div class="col-lg-12">
            <div style="margin-top: 20px;">
              <a class="btn btn-primary" data-toggle="modal" data-target="#tambah_nama_progress"><i class="glyphicon glyphicon-plus-sign"> </i> Tambah Nama Progress </a>
              <div class="table-responsive">
                <table id="nama_progress" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th style="width: 10px;">No</th>
                      <!-- <th style="width: 10px;">ID</th> -->
                      <th>Nama Progress</th>
                      <!-- <th>Status</th> -->
                      <th style="width: 50px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=0;
                    foreach ($nama_progress as $nama_progress) {
                      $i++;
                      ?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <!-- <td><?php echo $nama_progress->kode_nama_progress;?></td> -->
                        <td><?php echo $nama_progress->nama_progress;?></td>
                        <!-- <td><?php echo "status";?></td> -->
                        <td class="text-center"> 
                          <a href="#modal_nama_progress" id="custId" data-toggle="modal" data-id="<?php echo $nama_progress->kode_nama_progress;?>" data-toggle="tooltip" title="Edit Nama Progress" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
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

      <!-- modal edit nama_progress -->
      <div class="modal fade" id="modal_nama_progress" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Nama Progress</h4>
            </div>
            <div class="modal-body">
              <div class="fetched-data"></div>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>

      <!-- modal tambah nama progress -->
      <div aria-hidden="true" aria-labelledby="tambah_nama_progress" role="dialog" tabindex="-1" id="tambah_nama_progress" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h4 class="modal-title">Tambah Nama Progress</h4>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('PenggunaC/tambah_nama_progress');?>
              <form role="form" action="<?php echo base_url(); ?>PenggunaC/tambah_nama_progress" method="post">
                <div class="form-group">
                  <label>Nama Progress</label>
                  <input class="form-control" placeholder="Nama Progress" type="text" id="nama_progress" name="nama_progress" required>
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary col-lg-2"  value="Simpan">
                </div> 
                <?php echo form_close()?>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Data tabel persetujuan_kegiatan-->
      <div id="6" class="tab-pane" role="tabpanel">
        <div class="row pt-5">
          <div class="col-lg-12">
            <div style="margin-top: 20px;">
              <!-- <a class="btn btn-primary" data-toggle="modal" data-target="#tambah_persetujuan_kegiatan_pegawai"><i class="glyphicon glyphicon-plus-sign"> </i> Tambah Persetujuan Pegawai </a> -->
              <div class="table-responsive">
               <table id="persetujuan_kegiatan_peg" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 10px;">Ranking</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">Jenis Kegiatan</th>
                    <!-- <th class="text-center">Status</th> -->
                    <th class="text-center" style="width: 50px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($persetujuan_kegiatan as $persetujuan_kegiatan) {
                    if($persetujuan_kegiatan->kode_jenis_kegiatan == "1"){
                      ?>
                      <tr>
                        <td class="text-center">
                          <div class="relative">
                            <a href="<?php echo base_url('PenggunaC/naik/'.$persetujuan_kegiatan->kode_acc_kegiatan.'/'.$persetujuan_kegiatan->ranking.'/'.$persetujuan_kegiatan->kode_jenis_kegiatan);?>" title="naik"><small class="kecil-arrow"><i class="glyphicon glyphicon-chevron-up"></i></small></a>
                            <strong><?php echo $persetujuan_kegiatan->ranking;?></strong>
                            <a href="<?php echo base_url('PenggunaC/turun/'.$persetujuan_kegiatan->kode_acc_kegiatan.'/'.$persetujuan_kegiatan->ranking.'/'.$persetujuan_kegiatan->kode_jenis_kegiatan);?>" title="turun"><small class="kecil-arrow"><i class="glyphicon glyphicon-chevron-down"></i></small></a>
                          </div>
                        </td>
                        <td class="text-center"><?php echo $persetujuan_kegiatan->nama_jabatan." ".$persetujuan_kegiatan->nama_unit;?></td>
                        <td class="text-center"><?php echo $persetujuan_kegiatan->nama_jenis_kegiatan;?></td>
                        <!-- <td class="text-center"><?php echo "status";?></td> -->
                        <td class="text-center"> 
                          <?php
                          if($PenggunaM->get_max_rank_peg()->result()[0]->ranking == $persetujuan_kegiatan->ranking){
                            if($PenggunaM->get_min_rank_peg()->result()[0]->ranking == $persetujuan_kegiatan->ranking){
                             ?>
                             <a title="tidak bisa dihapus" disabled class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                             <?php
                           }else{
                             ?>
                             <a href="<?php echo base_url('PenggunaC/hapus/'.$persetujuan_kegiatan->kode_acc_kegiatan);?>"  onClick="return confirm('Anda yakin akan menghapus data ini?')" id="custId" data-toggle="tooltip" data-toggle="tooltip" title="Hapus Persetujuan Kegiatan" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                             <?php
                           }
                         }else{
                          ?>
                          <a title="tidak bisa dihapus" disabled class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                          <?php
                        }
                        ?>
                      </td>
                    </tr>
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

  <!-- Data tabel unit-->
  <div id="7" class="tab-pane" role="tabpanel">
    <div class="row pt-5">
      <div class="col-lg-12">
       <div style="margin-top: 20px;">
         <div class="table-responsive">
           <table id="akses_menu" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th style="width: 10px;">No</th>
                <!-- <th style="width: 10px;">ID</th> -->
                <th> Nama Menu</th>
                <!-- <th>Status</th> -->
                <th style="width: 50px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 0;
              foreach ($akses_menu as $menu) {
                $i++;
                ?>
                <tr>
                  <td><?php echo $i?></td>
                  <td>
                    <div class="relative">
                      <strong><?php echo $menu->nama_menu?><br></strong>
                      <?php
                      if($jabatan_unit_pengguna = $PenggunaM->get_jabatan_unit_by_menu($menu->kode_menu)){
                        foreach ($jabatan_unit_pengguna->result() as $pengguna) {
                          if($pengguna->kode_menu != 1 && $pengguna->kode_menu != 2 && $pengguna->kode_menu != 4 && $pengguna->kode_menu != 5){
                            echo $pengguna->nama_jabatan.' '.$pengguna->nama_unit;
                            if($menu->kode_menu == 10 || $menu->kode_menu == 11 || $menu->kode_menu == 18){
                              ?>
                              <!-- <a style="color: grey;" disabled><i class="glyphicon glyphicon-trash text-default"></i></a><br> -->
                              <?php
                            }else{
                              ?>
                              <a  href="<?php echo base_url('PenggunaC/hapus_akses_menu/').$pengguna->kode_akses_menu ?>"  onClick="return confirm('Anda yakin akan menghapus Jabatan <?php echo $pengguna->nama_jabatan.' '.$pengguna->nama_unit?>?')" style="color: red;"><i class="glyphicon glyphicon-trash text-danger"></i></a><br>
                              <?php
                            }                            
                          }else{
                            echo $pengguna->nama_jabatan.' '.$pengguna->nama_unit."<br>";
                          }
                        } 
                      }
                      ?>
                      <p><small class="kecil" style="font-size: 12px; color: blue;"></small></p>
                    </div>
                  </td>
                  <td>
                    <?php
                    if($menu->kode_menu == 10 || $menu->kode_menu == 11 || $menu->kode_menu == 18){
                      ?>
                      <a data-toggle="modal" title="Akses menu khusus staf keuangan" class="btn btn-primary btn-sm" disabled><span class="glyphicon glyphicon-plus-sign"></span></a>
                      <?php
                    }else{
                     ?>   
                     <a data-toggle="modal" title="Tambah Jabatan Unit" class="btn btn-primary btn-sm" data-target="#modal_tambah_akses_menu-<?php echo $pengguna->kode_akses_menu?>"><span class="glyphicon glyphicon-plus-sign"></span></a>
                     <?php
                   }
                   ?>
                 </td>
               </tr>

               <!-- modal tambah jabatan -->
               <div aria-hidden="true" aria-labelledby="modal_tambah_akses_menu-<?php echo $pengguna->kode_akses_menu?>" role="dialog" tabindex="-1" id="modal_tambah_akses_menu-<?php echo $pengguna->kode_akses_menu?>" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                      <h4 class="modal-title">Tambah Akses Menu</h4>
                    </div>
                    <div class="modal-body">
                      <?php echo form_open_multipart('PenggunaC/tambah_akses_menu');?>
                      <form role="form" action="<?php echo base_url(); ?>PenggunaC/tambah_akses_menu" method="post">
                        <div class="form-group">
                          <label>Nama Jabatan</label>
                          <input class="form-control" type="text" id="kode_menu" name="kode_menu" value="<?php echo $menu->kode_menu?>" required>
                          <select class="form-control" name="kode_jabatan_unit" id="kode_jabatan_unit">
                            <option value="">---- Pilih Jabatan Unit ---- </option>
                            <?php 
                            foreach ($jabatan_unit_menu as $pilihan_unit_menu) {
                              ?>
                              <option value="<?php echo $pilihan_unit_menu->kode_jabatan_unit;?>"><?php echo $pilihan_unit_menu->nama_jabatan.' '.$pilihan_unit_menu->nama_unit?></option>
                              <?php
                            }
                            ?>
                          </select>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-primary col-lg-2"  value="Simpan">
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

<!-- Data tabel persetujuan_kegiatan-->
<div id="9" class="tab-pane" role="tabpanel">
  <div class="row pt-5">
    <div class="col-lg-12">
      <div style="margin-top: 20px;">
        <!-- <a class="btn btn-primary" data-toggle="modal" data-target="#tambah_persetujuan_kegiatan_mahasiswa"><i class="glyphicon glyphicon-plus-sign"> </i> Tambah Persetujuan Kegiatan Mahasiswa </a> -->
        <div class="table-responsive">
          <table id="persetujuan_kegiatan_mhs" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center" style="width: 10px;">Ranking</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Jenis Kegiatan</th>
                <!-- <th class="text-center">Status</th> -->
                <th class="text-center" style="width: 50px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($persetujuan_kegiatan_mahasiswa as $persetujuan_kegiatan_mhs) {
                if($persetujuan_kegiatan_mhs->kode_jenis_kegiatan == "2"){
                  ?>
                  <tr>
                    <td class="text-center">
                      <div class="relative">
                        <a href="<?php echo base_url('PenggunaC/naik/'.$persetujuan_kegiatan_mhs->kode_acc_kegiatan.'/'.$persetujuan_kegiatan_mhs->ranking.'/'.$persetujuan_kegiatan_mhs->kode_jenis_kegiatan);?>" title="naik"><small class="kecil-arrow"><i class="glyphicon glyphicon-chevron-up"></i></small></a>
                        <strong><?php echo $persetujuan_kegiatan_mhs->ranking;?></strong>
                        <a href="<?php echo base_url('PenggunaC/turun/'.$persetujuan_kegiatan_mhs->kode_acc_kegiatan.'/'.$persetujuan_kegiatan_mhs->ranking.'/'.$persetujuan_kegiatan_mhs->kode_jenis_kegiatan);?>" title="turun"><small class="kecil-arrow"><i class="glyphicon glyphicon-chevron-down"></i></small></a>
                      </div>
                    </td>
                    <td class="text-center"><?php echo $persetujuan_kegiatan_mhs->nama_jabatan." ".$persetujuan_kegiatan_mhs->nama_unit;?></td>
                    <td class="text-center"><?php echo $persetujuan_kegiatan_mhs->nama_jenis_kegiatan;?></td>
                    <!-- <td class="text-center"><?php echo "status";?></td> -->
                    <td class="text-center"> 
                      <?php
                      if($PenggunaM->get_max_rank_mhs()->result()[0]->ranking == $persetujuan_kegiatan_mhs->ranking){
                        if($PenggunaM->get_min_rank_mhs()->result()[0]->ranking == $persetujuan_kegiatan_mhs->ranking){
                          ?>
                          <a title="tidak bisa dihapus" disabled class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                          <?php
                        }else{
                          ?>
                          <a href="<?php echo base_url('PenggunaC/hapus/'.$persetujuan_kegiatan_mhs->kode_acc_kegiatan);?>"  onClick="return confirm('Anda yakin akan menghapus data ini?')" id="custId" data-toggle="tooltip" data-toggle="tooltip" title="Hapus Persetujuan Kegiatan" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>

                          <?php
                        }
                      }else{
                       ?>
                       <a title="tidak bisa dihapus" disabled class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                       <?php
                     }
                     ?>
                   </td>
                 </tr>
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

<!-- modal tambah persetujuan kegiatan -->
<div aria-hidden="true" aria-labelledby="tambah_persetujuan_kegiatan_pegawai" role="dialog" tabindex="-1" id="tambah_persetujuan_kegiatan_pegawai" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Tambah Persetujuan Kegiatan Pegawai</h4>
      </div>
      <div class="modal-body">
        <!-- <?php var_dump($jenis_kegiatan_persetujuan) ?> -->
        <?php echo form_open_multipart('PenggunaC/tambah_persetujuan_kegiatan/1');?>
        <form role="form" action="<?php echo base_url(); ?>PenggunaC/tambah_persetujuan_kegiatan/1" method="post">
          <div class="form-group">
            <label>Nama Jabatan</label>
            <select class="form-control" name="kode_jabatan_unit" id="kode_jabatan_unit">
              <option value="">---- Pilih Jabatan ---- </option>
              <?php 
              foreach ($jabatan_unit_menu as $pilihan_jabatan) {
                if(in_array($pilihan_jabatan->kode_jabatan_unit, $data_jabatan_unit_pegawai)){ 
                  ?>
                  <option value="<?php echo $pilihan_jabatan->kode_jabatan_unit;?>"><?php echo $pilihan_jabatan->nama_jabatan." ".$pilihan_jabatan->nama_unit?></option>
                  <?php
                }
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label><strong><h4>Menyetujui Kegiatan Pegawai</h4></strong></label>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary col-lg-2"  value="Simpan">
          </div> 
          <?php echo form_close()?>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- modal tambah persetujuan kegiatan -->
<div aria-hidden="true" aria-labelledby="tambah_persetujuan_kegiatan_mahasiswa" role="dialog" tabindex="-1" id="tambah_persetujuan_kegiatan_mahasiswa" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Tambah Persetujuan Kegiatan Mahasiswa</h4>
      </div>
      <div class="modal-body">
        <!-- <?php var_dump($jenis_kegiatan_persetujuan) ?> -->
        <?php echo form_open_multipart('PenggunaC/tambah_persetujuan_kegiatan/2');?>
        <form role="form" action="<?php echo base_url(); ?>PenggunaC/tambah_persetujuan_kegiatan/2" method="post">
          <div class="form-group">
            <label>Nama Jabatan</label>
            <select class="form-control" name="kode_jabatan_unit" id="kode_jabatan_unit">
              <option value="">---- Pilih Jabatan ---- </option>
              <?php 
              foreach ($jabatan_unit_menu as $pilihan_jabatan) {
                if(in_array($pilihan_jabatan->kode_jabatan_unit, $data_jabatan_unit_mahasiswa)){ 
                  ?>
                  <option value="<?php echo $pilihan_jabatan->kode_jabatan_unit;?>"><?php echo $pilihan_jabatan->nama_jabatan." ".$pilihan_jabatan->nama_unit?></option>
                  <?php
                }
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label><strong><h4>Menyetujui Kegiatan Mahasiswa</h4></strong></label>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary col-lg-2"  value="Simpan">
          </div> 
          <?php echo form_close()?>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Data tabel persetujuan barang-->
<div id="20" class="tab-pane" role="tabpanel">
  <div class="row pt-5">
    <div class="col-lg-12">
      <div style="margin-top: 20px;">
        <div class="table-responsive">
          <table id="persetujuan_pengajuan_barang" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center" style="width: 10px;">Ranking</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Jenis Pengajuan</th>
                <th class="text-center" style="width: 50px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($persetujuan_pengajuan_barang as $barang) {
                ?>
                <tr>
                  <td class="text-center">
                    <div class="relative">
                      <a href="<?php echo base_url('PenggunaC/naik_keatas/'.$barang->kode_acc_barang.'/'.$barang->ranking.'/'.$barang->kode_jenis_pengajuan);?>" title="naik"><small class="kecil-arrow"><i class="glyphicon glyphicon-chevron-up"></i></small></a>
                      <strong><?php echo $barang->ranking;?></strong>
                      <a href="<?php echo base_url('PenggunaC/turun_kebawah/'.$barang->kode_acc_barang.'/'.$barang->ranking.'/'.$barang->kode_jenis_pengajuan);?>" title="turun"><small class="kecil-arrow"><i class="glyphicon glyphicon-chevron-down"></i></small></a>
                    </div>
                  </td>
                  <td class="text-center"><?php echo $barang->nama_jabatan." ".$barang->nama_unit;?></td>
                  <td class="text-center">Pengajuan Barang</td>
                  <td class="text-center"> 
                    <?php
                    if($PenggunaM->get_max_rank_barang()->result()[0]->ranking == $barang->ranking){
                      if($PenggunaM->get_min_rank_barang()->result()[0]->ranking == $barang->ranking){
                        ?>
                        <a title="tidak bisa dihapus" disabled class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                        <?php
                      }else{
                        ?>
                        <a href="<?php echo base_url('PenggunaC/hapus_barang_rab/'.$barang->kode_acc_barang);?>"  onClick="return confirm('Anda yakin akan menghapus data ini?')" id="custId" data-toggle="tooltip" data-toggle="tooltip" title="Hapus Persetujuan Kegiatan" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>

                        <?php
                      }
                    }else{
                     ?>
                     <a title="tidak bisa dihapus" disabled class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                     <?php
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
<!-- End Persetujuan Barang -->

<!-- Data tabel persetujuan RAB-->
<div id="21" class="tab-pane" role="tabpanel">
  <div class="row pt-5">
    <div class="col-lg-12">
      <div style="margin-top: 20px;">
        <div class="table-responsive">
          <table id="persetujuan_pengajuan_RAB" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center" style="width: 10px;">Ranking</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Jenis Pengajuan</th>
                <th class="text-center" style="width: 50px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($persetujuan_pengajuan_RAB as $rab) {
                ?>
                <tr>
                  <td class="text-center">
                    <div class="relative">
                      <a href="<?php echo base_url('PenggunaC/naik_keatas/'.$rab->kode_acc_barang.'/'.$rab->ranking.'/'.$rab->kode_jenis_pengajuan);?>" title="naik"><small class="kecil-arrow"><i class="glyphicon glyphicon-chevron-up"></i></small></a>
                      <strong><?php echo $rab->ranking;?></strong>
                      <a href="<?php echo base_url('PenggunaC/turun_kebawah/'.$rab->kode_acc_barang.'/'.$rab->ranking.'/'.$rab->kode_jenis_pengajuan);?>" title="turun"><small class="kecil-arrow"><i class="glyphicon glyphicon-chevron-down"></i></small></a>
                    </div>
                  </td>
                  <td class="text-center"><?php echo $rab->nama_jabatan." ".$rab->nama_unit;?></td>
                  <td class="text-center">Pengajuan RAB</td>
                  <td class="text-center"> 
                    <?php
                    if($PenggunaM->get_max_rank_rab()->result()[0]->ranking == $rab->ranking){
                      if($PenggunaM->get_min_rank_rab()->result()[0]->ranking == $rab->ranking){
                        ?>
                        <a title="tidak bisa dihapus" disabled class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                        <?php
                      }else{
                        ?>
                        <a href="<?php echo base_url('PenggunaC/hapus_barang_rab/'.$rab->kode_acc_barang);?>"  onClick="return confirm('Anda yakin akan menghapus data ini?')" id="custId" data-toggle="tooltip" data-toggle="tooltip" title="Hapus Persetujuan Kegiatan" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>

                        <?php
                      }
                    }else{
                     ?>
                     <a title="tidak bisa dihapus" disabled class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                     <?php
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
<!-- End Persetujuan RAB -->

</div>
</div>
<div class="col-md-2 col-lg-2 col-sm-12">
  <br>
  <button data-toggle="collapse" data-target="#demo" class="btn btn-info btn-md pull-right" title="klik untuk melihat informasi"><i class="glyphicon glyphicon-alert"> Informasi</i></button>
</div>
</div>

</section>
</section>

<script type="text/javascript">
    // js detail pengajuan
    $(document).ready(function(){
      $('#modal_jabatan').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type : 'get',
              url : '<?php echo base_url().'PenggunaC/detail_jabatan/'?>'+rowid,
                //data :  'rowid='+ rowid, // $_POST['rowid'] = rowid
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
              }
            });
          });

      $('#modal_unit').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type : 'get',
              url : '<?php echo base_url().'PenggunaC/detail_unit/'?>'+rowid,
                //data :  'rowid='+ rowid, // $_POST['rowid'] = rowid
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
              }
            });
          });

      $('#modal_jenis_barang').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type : 'get',
              url : '<?php echo base_url().'PenggunaC/detail_jenis_barang/'?>'+rowid,
                //data :  'rowid='+ rowid, // $_POST['rowid'] = rowid
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
              }
            });
          });

      $('#modal_jenis_kegiatan').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type : 'get',
              url : '<?php echo base_url().'PenggunaC/detail_jenis_kegiatan/'?>'+rowid,
                //data :  'rowid='+ rowid, // $_POST['rowid'] = rowid
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
              }
            });
          });

      $('#modal_nama_progress').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type : 'get',
              url : '<?php echo base_url().'PenggunaC/detail_nama_progress/'?>'+rowid,
                //data :  'rowid='+ rowid, // $_POST['rowid'] = rowid
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
              }
            });
          });


  //buat reoad ke current tab pane 
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        // save the latest tab; use cookies if you like 'em better:
        localStorage.setItem('lastTab', $(this).attr('href'));
      });

    // go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
      $('[href="' + lastTab + '"]').tab('show');
    }

  });
</script>