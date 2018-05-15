<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">

       <!-- Alert -->
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
       <!-- sampai sini -->
       <h3 class="page-header" style="margin-top: 0;"><i class="fa fa-pencil"></i>Status Pengajuan Barang</h3>
     </div>
   </div>
   <div class="row">
    <div class="col-lg-12">
      <div class="card mb-3">
        <div class="card-header">
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                <thead>
                  <tr class="text-center">
                    <!-- <th>No. Identitas</th> -->
                    <th>Nama Pengajuan Barang</th>
                    <th>Nama Pengaju</th>
                    <th>Jabatan Pengaju</th>
                    <th>Gambar</th>
                    <th>Tgl Pengajuan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($item_barang_disetujui as $barang) {
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
                <td><?php echo $total;?></td>
                <td><?php echo $barang->status_pengajuan;?></td>
                <td><center>
                  <?php 
                  ?>
                  <a href="#" data-toggle="modal" data-target="#modalProgress-<?php echo $barang->kode_item_pengajuan; ?>" title="Tambah Progress" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                </center>
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
                      <p class="form-control-static"> <?php echo ": ".$barang->harga_satuan; ?> </p>
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

          <!-- Modal Tambah Progress Item Pengajuan -->
          <div aria-hidden="true" aria-labelledby="myModal1" role="dialog" tabindex="-1" id="modalProgress-<?php echo $barang->kode_item_pengajuan; ?>" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title" id="titlemodal">Tambah Progress Item Pengajuan Barang</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url('BarangC/post_tambah_progress');?>" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <!-- ambil id_pengguna_jabatan berdasarkan user yang login-->
                      <input class="form-control" type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $data_diri->id_pengguna;?>" required> 
                      <!-- kirim kode_fk berdasarkan kode_item_pengajuan dari barang yang terpilih -->
                      <input class="form-control" type="hidden" id="kode_fk" name="kode_fk" value="<?php echo $barang->kode_item_pengajuan;?>" required>
                      <input class="form-control" type="hidden" id="kode_jabatan_unit" name="kode_jabatan_unit" value="<?php echo $data_diri->kode_jabatan_unit;?>" required> 
                      <!-- ambil kode_jabatan_unit yang login -->
                      <div class="modal-body">
                        <label class="col-lg-4 col-sm-2 control-label">Nama Item Pengajuan Barang :</label>
                        <div class="col-lg-8">
                          <p class="form-control-static"> <?php echo ": ".$barang->nama_item_pengajuan; ?> </p>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="modal-body">
                        <label class="col-lg-4 col-sm-2 control-label">url :</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="url" name="url" value="<?php echo $barang->url ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="modal-body">
                        <label class="col-lg-4 col-sm-2 control-label">Harga Satuan :</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" value="<?php echo $barang->harga_satuan ?>" onkeypress="return hanyaAngka(event)">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="modal-body">
                        <label class="col-lg-4 col-sm-2 control-label">Merk :</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="merk" name="merk" value="<?php echo $barang->merk ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="modal-body">
                        <label class="col-lg-4 col-sm-2 control-label">Jumlah :</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo $barang->jumlah ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="modal-body">
                        <label class="col-lg-4 col-sm-2 control-label"> Foto :</label>
                        <div class="col-lg-8">
                          <img style="height: 50px; margin-bottom: 20px" src="<?php echo base_url();?>assets/file_gambar/<?php echo $barang->file_gambar;?>"> 
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="modal-body">
                        <label class="col-lg-4 col-sm-2 control-label">Tambah Progress :</label>
                        <div class="col-lg-8">
                         <input type="hidden" class="form-control" placeholder id="kode_item_pengajuan" name="kode_item_pengajuan" required value="<?php echo $barang->kode_item_pengajuan;?>">
                         <!-- untuk mengirimkan kode_item_pengajuan -->
                         <select class="form-control" name="kode_barang" id="kode_barang">
                          <option value="">---- Pilih Barang ---- </option>
                          <?php 
                          foreach ($pilihan_progress as $pilihan) {
                            if($pilihan->kode_nama_progress != 1){
                              if($pilihan->kode_nama_progress != 2){
                                ?>
                                <option value="<?php echo $pilihan->kode_nama_progress ;?>"> <?php echo $pilihan->nama_progress ;?> </option>
                                <?php
                              }
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <div class="modal-body">
                        <label class="col-lg-4 col-sm-2 control-label">Komentar :</label>
                        <div class="modal-body">
                         <textarea name="komentar" value="" class="form-control" placeholder="Komentar" rows="3" required></textarea>
                       </div>
                      </div>
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button class="btn btn-info" type="submit" onClick="return confirm('Anda yakin akan menambahkan progress lanjutan pada pengajuan ini?')"> Simpan </button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- END Modal Tambah Progress Item Pengajuan-->
        <!-- ================== -->
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

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
