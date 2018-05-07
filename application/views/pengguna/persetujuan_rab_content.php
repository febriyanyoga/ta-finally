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
       <h3 class="page-header" style="margin-top: 0;"><i class="fa fa-pencil"></i>Persetujuan RAB</h3>
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
                    <td><?php echo $val->created_at ?></td>
                    <td>
                      <center>
                        <div class="btn-group">
                          <a href="#" data-toggle="modal" data-target="#modal_terima-<?php echo $val->kode_pengajuan; ?>" title="Terima" class="btn btn-info btn-info"><span class="glyphicon glyphicon-ok"></span></a>
                         <a href="#" data-toggle="modal" data-target="#modal_tolak-<?php echo $val->kode_pengajuan; ?>" title="Tolak" class="btn btn-info btn-warning"><span class="glyphicon glyphicon-remove"></span></a>
                       </div>
                     </center>
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
                      <form class="form-horizontal" action="<?php echo base_url('BarangC/post_persetujuan_barang');?>" method="post">
                        <div class="modal-body">
                          <div class="form-group">
                            <!-- ambil id_pengguna_jabatan berdasarkan user yang login-->
                            <input class="form-control" type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $data_diri->id_pengguna;?>" required> 
                            <!-- kirim kode_fk berdasarkan kode_item_pengajuan dari barang yang terpilih -->
                            <input class="form-control" type="hidden" id="kode_fk" name="kode_fk" value="<?php echo $val->kode_pengajuan;?>" required>
                            <!-- kirim kode_nama_progress = 1 untuk terima -->
                            <input type="hidden" class="form-control" placeholder id="kode_nama_progress" name="kode_nama_progress" required value="1">
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
                    <form class="form-horizontal" action="<?php echo base_url('BarangC/post_persetujuan_barang');?>" method="post">
                      <div class="modal-body">
                        <div class="form-group">
                          <!-- ambil id_pengguna_jabatan berdasarkan user yang login-->
                          <input class="form-control" type="hidden" id="no_identitas" name="no_identitas" value="<?php echo $data_diri->id_pengguna;?>" required> 
                          <!-- kirim kode_fk berdasarkan kode_item_pengajuan dari barang yang terpilih -->
                          <input class="form-control" type="hidden" id="kode_fk" name="kode_fk" value="<?php echo $val->kode_pengajuan;?>" required>
                          <!-- kirim kode_nama_progress = 2 untuk tolak -->
                          <input type="hidden" class="form-control" placeholder id="kode_nama_progress" name="kode_nama_progress" required value="2">
                          <label class="col-lg-4 col-sm-2 control-label">Komentar Penolakan:</label>
                          <div class="modal-body">
                            <input class="form-control" type="hidden" id="jenis_progress" name="jenis_progress" value="barang" required>
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
