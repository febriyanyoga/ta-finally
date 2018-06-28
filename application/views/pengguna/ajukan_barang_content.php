<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header" style="margin-top: 0;"><center>Daftar Pengajuan Barang</center></h3>
      </div>
    </div>
    
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
       <div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>

       <button data-toggle="collapse" data-target="#demo" class="btn btn-info btn-md" title="klik untuk melihat informasi"><i class="glyphicon glyphicon-alert"> Informasi</i></button><br><br>

       <div class="collapse" id="demo">
        <div class="col-lg-6">
          <!-- Info Status -->
          <div class="alert alert-info">
            <strong>Informasi!</strong>
            <p>Berikut adalah penjelasan dari <strong>status</strong> pada tabel pengajuan barang<strong>:</strong></p>
            <table border="3" style="border-color: transparent;" class="table table-sm table-hover borderless">
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
            <!-- Keterangan Edit -->
            <div class="alert alert-warning">
              <strong>Perhatian!</strong>
              <p>Berikut adalah penjelasan dari <strong>tombol ubah</strong> pada tabel pengajuan barang<strong>:</strong></p>
              <table border="3" style="border-color: transparent;" class="table table-sm table-hover borderless" >
                <tr style="height: 30px">
                  <td style="width: 10%"><a href="#" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></a></td>
                  <td style="width: 6%">
                    <i class="glyphicon glyphicon-arrow-right"></i>
                  </td>
                  <td style="width: 62%"> Jika tombol tampil seperti ini, maka tombol dapat digunakan untuk mengubah data pengajuan barang</td>
                </tr>
                <tr style="height: 30px">
                  <td>
                    <a class="btn btn-success btn-sm" disabled><span class="glyphicon glyphicon-pencil"></span></a>
                  </td>
                  <td><i class="glyphicon glyphicon-arrow-right"></i></td>
                  <td> Jika tombol tampil seperti ini, maka sudah tidak dapat digunakan lagi untuk mengubah data pengajuan barang dikarenakan pengajuan tersebut sudah sudah memiliki progres</td>
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
                  <a class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="icon_plus_alt2"> </i>Ajukan Barang</a>
                  <a class="btn btn-info" data-toggle="modal" data-target="#myModal1"><i class="icon_plus_alt2"> </i>Ajukan Barang Baru</a>
                  <div class="row">
                    <div class="text-center col-lg-12">
                      <div class="page-header">
                        <center><h5>Alur persetujuan pengajuan Barang</h5></center>
                      </div>
                      <div style="display:inline-block;width:100%;overflow-y:auto;">
                        <ul class="timeline timeline-horizontal">
                          <?php
                            if($data_diri->atasan == "tidak"){ //bukan atasan dan tidak ada pengajuan kegiatan mahasiswa pada akses menunya
                              // echo "kamu bukan atasan";
                              ?>
                              <li class="timeline-item">
                                <div class="timeline-badge success"><i class="glyphicon glyphicon-check"></i></div>
                                <div class="timeline-panel">
                                  <div class="timeline-heading">
                                    <h4 class="timeline-title">Pertama, </h4>
                                    <!-- <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p> -->
                                  </div>
                                  <div class="timeline-body">
                                    <p>Disetujui oleh atasan anda.</p>
                                  </div>
                                </div>
                              </li>
                              <?php
                              $i = 2;
                            }else{
                              $i = 1;
                            }
                            // print_r($persetujuan_kegiatan);
                            // print_r($persetujuan_kegiatan_mhs);
                            // echo sizeof($persetujuan_kegiatan);
                            if(in_array('9', $menu)){
                              foreach ($persetujuan_pengajuan_barang as $persetujuan) { //kegiatan mahasiswa
                                ?>
                                <li class="timeline-item">
                                  <div class="timeline-badge success"><i class="glyphicon glyphicon-check"></i></div>
                                  <div class="timeline-panel">
                                    <div class="timeline-heading">
                                      <h4 class="timeline-title">
                                        <?php if($i == 1){
                                          echo "Pertama ";
                                        }else if($i == 2){
                                          echo "Kedua ";
                                        }else{
                                          echo "Selanjutnya ";
                                        }?>
                                      </h4>
                                      <!-- <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p> -->
                                    </div>
                                    <div class="timeline-body">
                                      <p>Disetujui oleh <?php echo $persetujuan->nama_jabatan.' '.$persetujuan->nama_unit.'.';?></p>
                                    </div>
                                  </div>
                                </li>
                                <?php
                                $i++;
                              }
                            }
                            ?>
                            <li class="timeline-item">
                              <div class="timeline-badge success"><i class="glyphicon glyphicon-check"></i></div>
                              <div class="timeline-panel">
                                <div class="timeline-heading">
                                  <h4 class="timeline-title">Selesai</h4>
                                  <!-- <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p> -->
                                </div>
                                <div class="timeline-body">
                                  <p>Barang siap diajukan dalam RAB.</p>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th class="text-center">Nama Item Pengajuan</th>
                            <th class="text-center">File</th>
                            <th class="text-center">Barang</th>
                            <th class="text-center">Jenis Barang</th>
                            <th class="text-center">Harga Satuan</th>
                            <th class="text-center" style="width: 10%">Jumlah</th>
                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($data_ajukan_barang as $barang) {
                            ?>
                            <tr class="text-center">
                              <td><?php echo $barang->nama_item_pengajuan; ?></td>
                              <td><center><img style="height: 50px;" src="<?php echo base_url();?>assets/file_gambar/<?php echo $barang->file_gambar;?>"></center></td>
                              <td><?php echo $barang->nama_barang; ?></td>
                              <td><?php echo $barang->nama_jenis_barang; ?></td>
                              <td>Rp<?php echo number_format($barang->harga_satuan, 0,',','.') ?>,00</td>
                              <td><?php echo $barang->jumlah; ?></td>
                              <td><?php echo $barang->tgl_item_pengajuan; ?></td>
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
                              <a class="label label-primary"> BARU</a>
                              <?php
                            }else if($barang->status_pengajuan == "proses"){
                              ?>
                              <a class="label label-info" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress">PROSES</a>
                              <?php
                            }else if($barang->status_pengajuan == "proses_pengajuan"){
                              ?>
                              <a class="label label-info" href="#modal_progress_barang" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_item_pengajuan;?>" title="klik untuk melihat detail progress">PROSES PENGAJUAN</a>
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

                        <td>
                          <?php
                          $progress_barang = $BarangM->get_progress_barang($barang->kode_item_pengajuan);
                          if($barang->status_pengajuan == "disetujui"){
                            ?>
                            <a class="btn btn-success btn-sm" disabled><span class="glyphicon glyphicon-pencil"></span></a>
                            <?php
                          }else if($barang->status_pengajuan =="tolak"){
                            ?>
                            <a class="btn btn-success btn-sm" disabled><span class="glyphicon glyphicon-pencil"></span></a>
                            <?php
                          }else{
                            if($progress_barang == 0){
                              ?>
                              <div class="btn-group">
                                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-<?php echo $barang->kode_item_pengajuan; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="<?php echo base_url('BarangC/hapus_pengajuan_barang')."/".$barang->kode_item_pengajuan;?>" onClick="return confirm('Anda yakin akan menghapus data pengajuan ini?')" data-toggle='tooltip' title='Hapus pengajuan' class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>  
                              </div>                
                              <?php
                            }else{
                              ?>
                              <a class="btn btn-success btn-sm" disabled><span class="glyphicon glyphicon-pencil"></span></a>
                              <?php
                            }
                          }
                          ?>
                        </td>
                      </tr>
                      <!-- Modal Edit Item Pengajuan -->
                      <div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="modal-<?php echo $barang->kode_item_pengajuan; ?>" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                              <h4 class="modal-title" id="titlemodal">Edit Pengajuan Barang</h4>
                            </div>
                            <form class="form-horizontal" action="<?php echo base_url('BarangC/post_ubah_ajukan_barang');?>" method="post" enctype="multipart/form-data" role="form">
                              <div class="modal-body">
                                <div class="form-group">
                                  <div class="modal-body">
                                    <label class="col-lg-4 col-sm-2 control-label" for="jenis_barang"> Barang :</label>
                                    <div class="col-lg-8">
                                     <input type="hidden" class="form-control" placeholder id="kode_item_pengajuan" name="kode_item_pengajuan" required value="<?php echo $barang->kode_item_pengajuan;?>">
                                     <!-- untuk mengirimkan kode_item_pengajuan -->
                                     <select class="form-control" name="kode_barang" id="kode_barang">
                                      <option value="">---- Pilih Barang ---- </option>
                                      <?php 
                                      foreach ($pilihan_barang as $pilihan_bar) {
                                        ?>
                                        <option <?php if ($pilihan_bar->kode_barang == $barang->kode_barang) {echo "selected=selected";} ?> value="<?php echo $pilihan_bar->kode_barang ?>"><?php echo $pilihan_bar->nama_barang ?></option>
                                        <?php
                                      }
                                      ?>
                                    </select>
                                    <span class="text-danger" style="color: red;"><?php echo form_error('kode_barang'); ?></span>  
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="modal-body">
                                  <input class="form-control" type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $data_diri->id_pengguna;?>" required> <!-- ambil id_pengguna_jabatan berdasarkan user yang login-->
                                  <label class="col-lg-4 col-sm-2 control-label">Nama Item Pengajuan Barang :</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="nama_item_pengajuan" class="form-control" value="<?php echo $barang->nama_item_pengajuan ?>">
                                  </div>
                                </div>
                              </div>
                              <input type="hidden" class="form-control" placeholder id="tgl_item_pengajuan" name="tgl_item_pengajuan" required value="<?php echo date('Y-m-d');?>">
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
                                    <input type="text" class="form-control" id="harga_satuan-<?php echo $barang->kode_item_pengajuan;?>" name="harga_satuan" value="Rp<?php echo number_format($barang->harga_satuan, 0,',','.') ?>,00" onkeypress="return hanyaAngka(event)">
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
                                  <label class="col-lg-4 col-sm-2 control-label">Unggah Foto :</label>
                                  <div class="col-lg-8">
                                   <img style="height: 50px; margin-bottom: 20px" src="<?php echo base_url();?>assets/file_gambar/<?php echo $barang->file_gambar;?>"> 
                                   <input type="file" id="file_gambar" name="file_gambar">
                                 </div>
                               </div>
                             </div>           
                           </div>
                           <div class="modal-footer" style="margin-top: 70px">
                            <button class="btn btn-info" type="submit"> Simpan </button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END Modal Edit Item Pengajuan-->

              <?php
            }
            ?>
            <script type="text/javascript">
              /* Dengan Rupiah */
              var dp = document.getElementById('harga_satuan-<?php echo $barang->kode_item_pengajuan?>');
              dp.addEventListener('keyup', function(e){
                dp.value = formatRupiah(this.value, 'Rp');
              });

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
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<!-- project team & activity end -->

</section>
<div class="text-center">
  <div class="credits">
    <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
  </div>
</div>
</section>

<!-- Modal Tambah Pengajuan Barang -->
<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Ajukan Barang</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url('BarangC/post_tambah_ajukan_barang');?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <div class="form-group">
            <label class="col-lg-4 col-sm-2 control-label" for="barang"> Barang :</label>
            <div class="col-lg-8">
             <select class="form-control" name="kode_barang" id="kode_barang_a">
              <option value="">---- Pilih Barang ---- </option>
              <?php 
              foreach ($pilihan_barang_tambah as $barang) {
                ?>
                <option value="<?php echo $barang->kode_barang ;?>"> <?php echo $barang->nama_barang ;?> </option>
                <?php
              }
              ?>
            </select>
            <span class="text-danger" style="color: red;"><?php echo form_error('kode_barang'); ?></span>  
          </div>
        </div>
        <div class="form-group">
          <input class="form-control" type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $data_diri->id_pengguna;?>" required> <!-- ambil id_pengguna_jabatan berdasarkan user yang login-->
          <input class="form-control" type="hidden" id="pimpinan" name="pimpinan" value="<?php echo $data_pimpinan->kode_jabatan_unit;?>" required> <!-- ambil id_pimpinan berdasarkan user yang login-->
          <input class="form-control" type="hidden" id="kode_jabatan_unit" name="kode_jabatan_unit" value="<?php echo $data_diri->kode_jabatan_unit;?>" required> 
          <!-- ambil kode_jabatan_unit yang login -->
          <label class="col-lg-4 col-sm-2 control-label">Nama Item Pengajuan Barang :</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="nama_item_pengajuan" name="nama_item_pengajuan" placeholder="Nama Item Pengajuan Barang" required="">
          </div>
        </div>
        <input type="hidden" class="form-control" placeholder id="tgl_item_pengajuan" name="tgl_item_pengajuan" required value="<?php echo date('Y-m-d');?>">
        <div class="form-group">
          <label class="col-lg-4 col-sm-2 control-label">url :</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="url" name="url" placeholder="Url Barang" required="">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-4 col-sm-2 control-label">Harga Satuan :</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="harga_satuan_barang" name="harga_satuan" placeholder="Harga Satuan" onkeypress="return hanyaAngka(event)" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-4 col-sm-2 control-label">Merk :</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk" required="">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-4 col-sm-2 control-label">Jumlah :</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah"onkeypress="return hanyaAngka(event)" required="">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-4 col-sm-2 control-label">Unggah Foto :</label>
          <div class="col-lg-8">
            <input type="file" id="file_gambar" name="file_gambar" required="">
          </div>
        </div>           

      </div>
      <div class="modal-footer">
        <button class="btn btn-info" type="submit" onClick="return confirm('Anda yakin akan mengajukan pengajuan barang ini?')"> Simpan </button>
        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<!-- END Modal Tambah Pengajuan Barang -->

<!-- Modal Tambah Pengajuan Barang Baru-->
<div aria-hidden="true" aria-labelledby="myModal1" role="dialog" tabindex="-1" id="myModal1" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Ajukan Barang Baru</h4>
      </div>
      <form id="form_barang" class="form-horizontal" action="<?php echo base_url('BarangC/post_tambah_barang_baru');?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label class="col-lg-4 col-sm-2 control-label">Nama Barang :</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-info" type="submit"> Simpan </button>
          <button onclick="ajukan()" class="btn btn-info" data-toggle="modal" data-target="#myModal" data-dismiss="modal" >Simpan dan Ajukan</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- END Modal Tambah Pengajuan Barang Baru-->

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

<script src="<?php echo base_url(); ?>/assets/js/jquery-1.4.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery-ui-1.8.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    // Untuk sunting
    $('#myModal').on('show.bs.modal', function (event) {

    });

    $( "#autocomplete" ).autocomplete({
      source: function(request, response) {
        $.ajax({ 
          url: "<?php echo site_url('BarangC/sugesti'); ?>",
          data: { nama_barang: $("#autocomplete").val()},
          dataType: "json",
          type: "POST",
          success: function(data){
            response(data);
          }    
        });
      },
    });

    /* Dengan Rupiah */
    var dp = document.getElementById('harga_satuan_barang');
    dp.addEventListener('keyup', function(e){
      dp.value = formatRupiah(this.value, 'Rp');
    });
    
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

  });

  function ajukan() {
    $.ajax({ 
      url: "<?php echo site_url('BarangC/insertBarangAjax'); ?>",
      data: $("#form_barang").serialize(),
      dataType: "json",
      type: "POST",
      async: false,
      success: function(data){
        $("#form_barang")[0].reset();
        refreshlist();

      }    
    });
  }
  function refreshlist() {
    $.ajax({ 
      url: "<?php echo site_url('BarangC/getBarangAjax'); ?>",
      dataType: "json",
      type: "GET",
      success: function(data){
        $("#kode_barang_a").empty();
        $("#form_barang")[0].reset();
        $.each(data,function(key, value){
          $("#kode_barang_a").append('<option value=' + value.kode_barang + '>' + value.nama_barang + '</option>');
        });
      }    
    });
  }
</script>

