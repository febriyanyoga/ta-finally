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
         <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
         <?php } ?>
         <?php 
         $data2=$this->session->flashdata('error');
         if($data2!=""){ ?>
           <div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
           <?php } ?>

           <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
        <!-- <li class="nav-item">
          <a class="nav-link program-title" data-toggle="tab" href="#1" role="tab"><span class="glyphicon glyphicon-user"></span><br class="hidden-md-up"> Jabatan </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link active program-title" data-toggle="tab" href="#2" role="tab"><span class="glyphicon glyphicon-user"></span><br class="hidden-md-up"> Unit </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link program-title" data-toggle="tab" href="#3" role="tab"><span class="glyphicon glyphicon-gift"></span><br class="hidden-md-up"> Jenis Barang </a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link program-title" data-toggle="tab" href="#4" role="tab"><span class="glyphicon glyphicon-list-alt"></span><br class="hidden-md-up"> Jenis Kegiatan </a>
        </li> -->
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
          <a class="nav-link program-title" data-toggle="tab" href="#7" role="tab"><span class="glyphicon glyphicon-list"></span><br class="hidden-md-up"> Akses Menu </a>
        </li>
       <!--  <li class="nav-item">
          <a class="nav-link program-title" data-toggle="tab" href="#8" role="tab"><span class="glyphicon glyphicon-th-large"></span><br class="hidden-md-up"> Unit dan Jabatan </a>
        </li> -->
      </ul>
    </div>
  </div>
  <!-- project team & activity end -->

  <div class="row">
   <div class="col-md-2 col-lg-2 col-sm-12">
   </div>

   <div class="col-md-8 col-lg-8 col-sm-12">
    <div class="tab-content" >
      <!-- Data tabel jabatan-->
      <div id="1" class="tab-pane" role="tabpanel">
        <div class="row pt-5">
          <div class="col-lg-12">
            <div style="margin-top: 20px;">
             <a class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_jabatan"><i class="glyphicon glyphicon-plus-sign"> </i> Tambah Jabatan </a>
             <div class="table-responsive">
               <table id="jabatan" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th style="width: 10px;">No</th>
                    <!-- <th style="width: 10px;">ID</th> -->
                    <th>Nama Jabatan</th>
                    <!-- <th>Status</th> -->
                    <th style="width: 50px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                 $i=0;
                 foreach ($jabatan as $jabatan) {
                  $i++;              
                  ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <!-- <td><?php echo $jabatan->kode_jabatan;?></td> -->
                    <td><?php echo $jabatan->nama_jabatan;?></td>
                    <!-- <td><?php echo "status blm ada";?></td> -->
                    <td class="text-center"> 
                      <a href="#modal_jabatan" id="custId" data-toggle="modal" data-id="<?php echo $jabatan->kode_jabatan;?>" data-toggle="tooltip" title="Edit Jabatan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
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

  <!-- modal edit jabatan -->
  <div class="modal fade" id="modal_jabatan" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Jabatan</h4>
        </div>
        <div class="modal-body">
          <div class="fetched-data"></div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

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
                      <a href="<?php echo base_url('PenggunaC/hapus_unit/').$unit->kode_unit?>" title="Hapus Unit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
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

<!-- Data tabel jenis_barang-->
<div id="3" class="tab-pane" role="tabpanel">
  <div class="row pt-5">
    <div class="col-lg-12">
      <div style="margin-top: 20px;">
        <a class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_jenis_barang"><i class="glyphicon glyphicon-plus-sign"> </i> Tambah Jenis Barang </a>
        <div class="table-responsive">
         <table id="jenis_barang" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="width: 10px;">No</th>
              <!-- <th style="width: 10px;">ID</th> -->
              <th>Nama Jenis Barang</th>
              <!-- <th>Status</th> -->
              <th style="width: 50px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i=0;
            foreach ($jenis_barang as $jenis_barang) {
              $i++;
              ?>
              <tr>
                <td><?php echo $i;?></td>
                <!-- <td><?php echo $jenis_barang->kode_jenis_barang;?></td> -->
                <td><?php echo $jenis_barang->nama_jenis_barang;?></td>
                <!-- <td><?php echo "status";?></td> -->
                <td class="text-center"> 
                  <a href="#modal_jenis_barang" id="custId" data-toggle="modal" data-id="<?php echo $jenis_barang->kode_jenis_barang;?>" data-toggle="tooltip" title="Edit Jenis Barang" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
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

<!-- modal jenis barang -->
<div class="modal fade" id="modal_jenis_barang" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Jenis Barang</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- modal tambah_jenis_barang -->
<div aria-hidden="true" aria-labelledby="modal_tambah_jenis_barang" role="dialog" tabindex="-1" id="modal_tambah_jenis_barang" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Tambah Jenis Barang</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('PenggunaC/tambah_jenis_barang');?>
        <form role="form" action="<?php echo base_url(); ?>PenggunaC/tambah_jenis_barang" method="post">
          <div class="form-group">
            <label>Nama Jenis Barang</label>
            <input class="form-control" placeholder="Nama Jenis Barang" type="text" id="nama_jenis_barang" name="nama_jenis_barang" required>
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


<!-- Data tabel jenis_kegiatan-->
<div id="4" class="tab-pane" role="tabpanel">
  <div class="row pt-5">
    <div style="margin-top: 20px;">
      <a class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_jenis_kegiatan"><i class="glyphicon glyphicon-plus-sign"> </i> Tambah Jenis Kegiatan </a>
      <div class="table-responsive">
       <table id="jenis_kegiatan" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th style="width: 10px;">No</th>
            <!-- <th style="width: 10px;">ID</th> -->
            <th>Nama Jenis Kegiatan</th>
            <!-- <th>Status</th> -->
            <th style="width: 50px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i=0;
          foreach ($jenis_kegiatan as $jenis_kegiatan) {
            $i++;
            ?>
            <tr>
              <td><?php echo $i;?></td>
              <!-- <td><?php echo $jenis_kegiatan->kode_jenis_kegiatan;?></td> -->
              <td><?php echo $jenis_kegiatan->nama_jenis_kegiatan;?></td>
              <!-- <td><?php echo "status";?></td> -->
              <td class="text-center"> 
                <a href="#modal_jenis_kegiatan" id="custId" data-toggle="modal" data-id="<?php echo $jenis_kegiatan->kode_jenis_kegiatan;?>" data-toggle="tooltip" title="Edit Jenis Kegiatan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
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

<!-- modal edit jenis kegiatan -->
<div class="modal fade" id="modal_jenis_kegiatan" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Jenis Kegiatan</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- modal tambah_jenis_kegiatan -->
<div aria-hidden="true" aria-labelledby="modal_tambah_jenis_kegiatan" role="dialog" tabindex="-1" id="modal_tambah_jenis_kegiatan" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Tambah Jenis Kegiatan</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('PenggunaC/tambah_jenis_kegiatan');?>
        <form role="form" action="<?php echo base_url(); ?>PenggunaC/tambah_jenis_kegiatan" method="post">
          <div class="form-group">
            <label>Nama Jenis Barang</label>
            <input class="form-control" placeholder="Nama Jenis Kegiatan" type="text" id="nama_jenis_kegiatan" name="nama_jenis_kegiatan" required>
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
        <a class="btn btn-primary" data-toggle="modal" data-target="#tambah_persetujuan_kegiatan_pegawai"><i class="glyphicon glyphicon-plus-sign"> </i> Tambah Persetujuan Pegawai </a>
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
                      if($PenggunaM->get_min_rank_peg()->result()[0]->ranking){
                       ?>
                       <a title="tidak bisa dihapus" disabled class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                       <?php
                     }else{
                       ?>
                       <a href="<?php echo base_url('PenggunaC/hapus/'.$persetujuan_kegiatan->kode_acc_kegiatan);?>"  onClick="return confirm('Anda yakin akan menghapus data ini?')" id="custId" data-toggle="tooltip" data-toggle="tooltip" title="Hapus Persetujuan Kegiatan" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                       <?php
                     }
                   }else{
                    echo $PenggunaM->get_max_rank_peg()->result()[0]->ranking;

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
                        echo $pengguna->nama_jabatan.' '.$pengguna->nama_unit;
                        ?>
                        <a  href="<?php echo base_url('PenggunaC/hapus_akses_menu/').$pengguna->kode_akses_menu ?>"  onClick="return confirm('Anda yakin akan menghapus Jabatan <?php echo $pengguna->nama_jabatan.' '.$pengguna->nama_unit?>?')" style="color: red;"><i class="glyphicon glyphicon-trash text-danger"></i></a><br>
                        <?php
                      } 
                    }
                    ?>
                    <p><small class="kecil" style="font-size: 12px; color: blue;"></small></p>
                  </div>
                </td>
                <td>
                  <a data-toggle="modal" title="Tambah Jabatan Unit" class="btn btn-primary btn-sm" data-target="#modal_tambah_akses_menu-<?php echo $pengguna->kode_akses_menu?>"><span class="glyphicon glyphicon-plus-sign"></span></a>
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
                      <?php echo form_open_multipart('PenggunaC/tambah_jabatan');?>
                      <form role="form" action="<?php echo base_url(); ?>PenggunaC/tambah_jabatan" method="post">
                        <div class="form-group">
                          <label>Nama Jabatan</label>
                          <input class="form-control" placeholder="Nama Jabatan" type="hidden" id="kode_unit" name="kode_unit" value="<?php echo $unit->kode_unit?>" required>
                          <select class="form-control" name="kode_jabatan" id="kode_jabatan">
                            <option value="">---- Pilih Jabatan Unit ---- </option>
                            <?php 
                            foreach ($jabatan_unit_menu as $pilihan_unit_menu) {
                              ?>
                              <option value="<?php echo $pilihan_unit_menu->kode_jabatan_unit;?>"><?php echo $pilihan_unit_menu->nama_jabatan." - ".$pilihan_unit_menu->nama_unit?></option>
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

<!-- Data tabel jabatan_unit-->
<div id="8" class="tab-pane" role="tabpanel">
  <div class="row pt-5">
    <div class="col-lg-12">
     <div style="margin-top: 20px;">
       <a class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_unit"><i class="glyphicon glyphicon-plus-sign"> </i> Tambah Unit </a>
       <div class="table-responsive">
         <table id="jabatan_unit" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="width: 10px;">No</th>
              <!-- <th style="width: 10px;">ID</th> -->
              <th> Nama Unit</th>
              <!-- <th>Status</th> -->
              <th style="width: 50px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
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
        <a class="btn btn-primary" data-toggle="modal" data-target="#tambah_persetujuan_kegiatan_mahasiswa"><i class="glyphicon glyphicon-plus-sign"> </i> Tambah Persetujuan Mahasiswa </a>
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
                ?>
                <option value="<?php echo $pilihan_jabatan->kode_jabatan_unit;?>"><?php echo $pilihan_jabatan->nama_jabatan." ".$pilihan_jabatan->nama_unit?></option>
                <?php
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
                ?>
                <option value="<?php echo $pilihan_jabatan->kode_jabatan_unit;?>"><?php echo $pilihan_jabatan->nama_jabatan." ".$pilihan_jabatan->nama_unit?></option>
                <?php
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

</div>
</div>
<div class="col-md-2 col-lg-3 col-sm-12">
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