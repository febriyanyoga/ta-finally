<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header" style="margin-top: 0;"><i class="fa fa-pencil"></i>Daftar Pengajuan Barang</h3>
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

       <div class="card mb-3">
        <div class="card-header">
          <div class="card-body">
            <a class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="icon_plus_alt2"> </i>Ajukan Barang</a>
            <a class="btn btn-info" data-toggle="modal" data-target="#myModal1"><i class="icon_plus_alt2"> </i>Ajukan Barang Baru</a>
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
                      <!-- <td><?php echo $barang->harga_satuan; ?></td> -->
                      <td>Rp<?php echo number_format($barang->harga_satuan, 0,',','.') ?>,-</td>
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

                        <td>
                          <?php
                          $progress_saya = $BarangM->get_progress_barang_by_id($barang->kode_item_pengajuan, $data_diri->kode_jabatan_unit);
                          $progress_barang = $BarangM->get_progress_barang($barang->kode_item_pengajuan);
                          $pimpinan_saya = $data_pimpinan->kode_jabatan_unit;
                          $jabatan_saya = $data_diri->kode_jabatan_unit;

                          if($pimpinan_saya == $jabatan_saya){
                            if($progress_saya == 1){?>
                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-<?php echo $barang->kode_item_pengajuan; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                            <?php
                          }else{?>
                          <a class="btn btn-success btn-sm" disabled><span class="glyphicon glyphicon-pencil"></span></a>
                          <?php
                        }
                      }else{
                        if($progress_barang == 0){?>
                        <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-<?php echo $barang->kode_item_pengajuan; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                        <?php
                      }else{?>
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
             <select class="form-control" name="kode_barang" id="kode_barang">
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
              <input type="text" class="form-control" id="nama_item_pengajuan" name="nama_item_pengajuan" placeholder="Nama Item Pengajuan Barang">
            </div>
          </div>
          <input type="hidden" class="form-control" placeholder id="tgl_item_pengajuan" name="tgl_item_pengajuan" required value="<?php echo date('Y-m-d');?>">
          <div class="form-group">
            <label class="col-lg-4 col-sm-2 control-label">url :</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="url" name="url" placeholder="Url Barang">
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
              <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk">
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
              <input type="file" id="file_gambar" name="file_gambar" >
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
      <form class="form-horizontal" action="<?php echo base_url('BarangC/post_tambah_barang_baru');?>" method="post">
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
          <a class="btn btn-info" data-toggle="modal" data-target="#myModal">Simpan dan Ajukan</a>
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

<script>
  $(document).ready(function() {
    // Untuk sunting
    $('#myModal').on('show.bs.modal', function (event) {

    });
  });
</script>
<link href="<?php echo base_url();?>assets/css/easy-autocomplete.css" rel="stylesheet"/>
<script src="<?php echo base_url();?>assets/js/jquery.easy-autocomplete.js"></script>
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
       var options = {

        url: "<?php echo base_url().'BarangC/dropdown'?>",

        getValue: function(element) {
          return element.kode_barang;
        },

        list: {
          onSelectItemEvent: function() {
            var selectedItemValue = $("#brg").getSelectedItemData().kode_barang;

            $("#idbrg").val(selectedItemValue).trigger("change");
          },
            //   onHideListEvent: function() {
            //     $("#inputTwo").val("").trigger("change");
            // }wait okey
          }
        };

        $("#brg").easyAutocomplete(options);
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

    // $('.itemName').select2({
    //   placeholder: '--- Select Item ---',
    //   ajax: {
    //     url: '<?php// echo base_url().'BarangC/dropdown'?>',
    //     dataType: 'json',
    //     delay: 250,
    //     processResults: function (data) {
    //       return {
    //         results: data
    //       };
    //     },
    //     cache: true
    //   }
    // });

      // body...
    

 
    </script>
