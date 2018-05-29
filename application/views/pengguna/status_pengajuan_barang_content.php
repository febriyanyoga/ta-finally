<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
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
      <!-- sampai sini -->
      <h3 class="page-header" style="margin-top: 0;"><center>Status Pengajuan Barang</center></h3>
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
          <p>Berikut adalah penjelasan <strong>tombol tambah progres</strong> dari persetujuan pada tabel pengajuan barang<strong>:</strong></p>
          <table border="3" style="border-color: transparent;" >
            <tr style="height: 30px">
              <td style="width: 10%"><a class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
              </td>
              <td style="width: 6%"><i class="glyphicon glyphicon-arrow-right"></i></td>
              <td style="width: 62%"> Tombol ini digunakan untuk memberikan progres lanjutan setelah pengajuan barang telah disetujui dalam RAB</td>
            </tr>
          </table>
          <p> </p>
          <p>Tombol tersebut dapat digunakan selama pengajuan barang memiliki progres yang dibutuhkan untuk sampai pada tahap selesai. Ketika progres selesai telah dimasukkan, maka proses pengajuan telah selesai serta tombol tersebut akan hilang dan akan digantikan dengan kata "selesai" disertai tanda centang (<span class="glyphicon glyphicon-ok"></span>).</p>
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
                                 <select class="form-control" name="kode_nama_progress" id="kode_nama_progress">
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
  // js progress barang
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