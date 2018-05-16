<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header text-center" style="margin-top: 0;"> Rancangan Anggaran Bulanan </h3>
      </div>
    </div>
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
       <!-- tab menu atas -->
       <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active program-title" data-toggle="tab" href="#1" role="tab"><span class="glyphicon glyphicon-th-list"></span><br class="hidden-md-up"> Buat RAB </a>
        </li>
        <li class="nav-item">
          <a class="nav-link program-title" data-toggle="tab" href="#2" role="tab"><span class="glyphicon glyphicon-open"></span><br class="hidden-md-up"> Pengajuan RAB </a>
        </li>
      </ul>
      <!-- tab menu atas -->
    </div>
  </div>
  <!-- ================================================== -->
  <div class="row">
   <div class="col-md-2 col-lg-2 col-sm-12">
   </div>

   <div class="col-md-8 col-lg-8 col-sm-12">
    <div class="tab-content" >
      <!-- Data tabel jabatan-->
      <div id="1" class="tab-pane active" role="tabpanel">
        <div class="row pt-5">
          <div class="col-lg-12">
            <div style="margin-top: 20px;">
             <div class="table-responsive">
               <table id="buat_rab" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr >
                    <!-- <th>No. Identitas</th> -->
                    <th class="text-center">No</th>
                    <th class="text-center" style="width: 15%;">Nama Pengajuan Barang</th>
                    <th class="text-center" style="width: 15%;">Nama Pengaju</th>
                    <th class="text-center" style="width: 15%;">Jabatan Pengaju</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Tgl Pengajuan</th>
                    <th class="text-center" style="width: 5%;">Jumlah</th>
                    <th class="text-center">Total Harga</th>
                    <th class="text-center" >Status</th>
                    <th class="text-center"  style="width: 13%;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($data_barang_setuju as $barang_setuju) {
                    ?>
                    <tr class="text-center" >
                      <td><?php echo $no ?></td>
                      <td><?php echo $barang_setuju->nama_item_pengajuan ?></td>
                      <td><?php 
                     // mendapatkan nama pengaju dari kode item pengajuan berdasarkan id
                      $pengaju = $BarangM->get_data_item_pengajuan_by_id($barang_setuju->kode_item_pengajuan)->result()[0]->nama;
                      echo $pengaju;
                      ?>
                    </td>
                    <td>
                      <?php 
                    // mendapatkan nama jabatan dari kode item pengajuan berdasarkan id
                      $jabatan      = $BarangM->get_data_item_pengajuan_by_id($barang_setuju->kode_item_pengajuan)->result()[0]->nama_jabatan;
                    // mendapatkan kode jabatan dari kode item pengajuan berdasarkan id
                      $kode_jabatan = $BarangM->get_data_item_pengajuan_by_id($barang_setuju->kode_item_pengajuan)->result()[0]->kode_jabatan;
                    // mendapatkan nama unit dari kode item pengajuan berdasarkan id
                      $unit = $BarangM->get_data_item_pengajuan_by_id($barang_setuju->kode_item_pengajuan)->result()[0]->nama_unit;
                    // mendapatkan kode unit dari kode item pengajuan berdasarkan id
                      $kode_unit = $BarangM->get_data_item_pengajuan_by_id($barang_setuju->kode_item_pengajuan)->result()[0]->kode_unit;
                    //menampilkan nama jabatan dan unit dari pengaju item pengajuan
                      echo $jabatan." ".$unit;
                      ?>
                    </td>
                    <td><center><img style="height: 40px;" src="<?php echo base_url();?>assets/file_gambar/<?php echo $barang_setuju->file_gambar;?>"></center></td>
                    <td><?php echo $barang_setuju->tgl_item_pengajuan;?></td>
                    <td><?php echo $barang_setuju->jumlah;?></td>
                    <?php 
                    $jumlah = $barang_setuju->jumlah;
                    $harga = $barang_setuju->harga_satuan;
                    //menghitung hasil total biaya item pengajuan dari perkalian harga satuan dengan jumlah barang
                    $total = $jumlah*$harga;
                    ?>
                    <td><?php echo $total;?></td>
                    <td><?php echo $barang_setuju->status_pengajuan;?></td>
                    <?php
                    if($barang_setuju->status_pengajuan == "proses"){
                      ?>
                      <td>
                        <center>
                          <a class="btn btn-success" href="<?php echo base_url('BarangC/setuju')."/".$barang_setuju->kode_item_pengajuan;?>" id="custId" data-toggle="tooltip" data-toggle="tooltip" title="ajukan"><i class="glyphicon glyphicon-ok" onClick="return confirm('Anda yakin akan mengajukan barang ini?')"> </i></a></span>
                          <a class="btn btn-warning" href="<?php echo base_url('BarangC/tunda')."/".$barang_setuju->kode_item_pengajuan;?>" id="custId" data-toggle="tooltip" data-toggle="tooltip" title="tunda"><i class="glyphicon glyphicon-time" onClick="return confirm('Anda yakin akan menunda pengajuan barang ini?')"></i></a></span>
                        </center>
                      </td>
                      <?php
                    }elseif ($barang_setuju->status_pengajuan == "tunda") {
                      ?>
                      <td>
                        <center>
                          <a class="btn btn-success" href="<?php echo base_url('BarangC/setuju')."/".$barang_setuju->kode_item_pengajuan;?>" id="custId" data-toggle="tooltip" data-toggle="tooltip" title="ajukan"><i class="glyphicon glyphicon-ok" onClick="return confirm('Anda yakin akan mengajukan barang ini?')"> </i></a></span>
                          <a class="btn btn-warning" href="<?php echo base_url('BarangC/tunda')."/".$barang_setuju->kode_item_pengajuan;?>" id="custId" data-toggle="tooltip" data-toggle="tooltip" title="tunda" disabled><i class="glyphicon glyphicon-time"></i></a></span>
                        </center>
                      </td>
                      <?php
                    } elseif ($barang_setuju->status_pengajuan == "pengajuan") {
                      ?>
                      <td>
                        <center>
                          <a class="btn btn-success" href="<?php echo base_url('BarangC/setuju')."/".$barang_setuju->kode_item_pengajuan;?>" id="custId" data-toggle="tooltip" data-toggle="tooltip" title="ajukan" disabled><i class="glyphicon glyphicon-ok"> </i></a></span>
                          <a class="btn btn-warning" href="<?php echo base_url('BarangC/tunda')."/".$barang_setuju->kode_item_pengajuan;?>" id="custId" data-toggle="tooltip" data-toggle="tooltip" title="tunda"><i class="glyphicon glyphicon-time" onClick="return confirm('Anda yakin akan menunda pengajuan barang ini?')"></i></a></span>
                        </center>
                      </td>
                      <?php
                    }
                    ?>
                  </tr>
                  <?php
                  $no++;
                }
                ?>
              </tbody>
            </table>
            <center>
              <a class="btn btn-info" href="<?php echo base_url('ExcelC/');?>" id="custId" data-toggle="tooltip" data-toggle="tooltip" title="tersedia" onClick="return confirm('Anda yakin akan mengajukan pengajuan barang yang sudah terpilih ?')"> Buat Data Pengajuan </a></span>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Data tabel pengajuan RAB-->
  <div id="2" class="tab-pane" role="tabpanel">
    <div class="row pt-5">
      <div class="col-lg-12">
       <div style="margin-top: 20px;">
        <a class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="icon_plus_alt2"> </i>Ajukan RAB</a>
        <div class="table-responsive" style="margin-top: 20px">
         <table id="ajukan_rab" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama Pengajuan RAB</th>
              <th class="text-center">Tanggal Pengajuan RAB</th>
              <th class="text-center">File Pengajuan RAB</th>
              <th class="text-center">Status Pengajuan</th>
              <th class="text-center"> Aksi </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=1;
            foreach ($pengajuan as $barang) {
              ?>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $barang->nama_pengajuan;?></td>
                <td>
                    <center>
                      <?php
                      $tgl =  $barang->updated_at;
                      $new_tgl = date('d-m-Y', strtotime($tgl));
                      echo $new_tgl;
                      ?>
                    </center>
                </td>
                <?php $link = base_url()."assets/file_rab/".$barang->file_rab;?>
                <td class="text-center"><a target="_blank" href="<?php echo $link?>"><span><img src="<?php echo base_url()?>assets/image/logo/excel.svg" style="height: 30px;"></span></a></td>
                <td class="text-center">
                  <?php
                    if($barang->status_pengajuan_rab == "baru"){
                      ?>
                      <a class="label label-primary" href="#modal_progress_rab" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_pengajuan;?>" title="klik untuk melihat detail progress"> Baru</a>
                      <?php
                    }elseif ($barang->status_pengajuan_rab == "diterima") {
                      ?>
                      <a class="label label-success" href="#modal_progress_rab" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_pengajuan;?>" title="klik untuk melihat detail progress"> Diterima</a>
                      <?php
                    }elseif ($barang->status_pengajuan_rab == "ditolak") {
                      ?>
                      <a class="label label-danger" href="#modal_progress_rab" id="custID" data-toggle="modal" data-id="<?php echo $barang->kode_pengajuan;?>" title="klik untuk melihat detail progress"> ditolah</a>
                      <?php
                    }
                  ?>
                </td>
                <td class="text-center">
                  <?php
                    if($barang->status_pengajuan_rab == "diterima"){
                      echo "selesai";
                      ?>
                        <center><span class="glyphicon glyphicon-ok"></span></center>
                      <?php
                    }else{
                      ?>
                         <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEdit<?php echo $barang->kode_pengajuan;?>"><span class="glyphicon glyphicon-pencil"></span></a>
                      <?php
                    }
                  ?>
               </td>

               <!-- Modal Ubah Pengajuan RAB -->
               <div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="modalEdit<?php echo $barang->kode_pengajuan;?>" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                      <h4 class="modal-title">Ubah Ajukan RAB</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url('BarangC/post_ubah_ajukan_rab');?>" method="post" enctype="multipart/form-data" role="form">
                      <div class="modal-body">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder id="kode_pengajuan" name="kode_pengajuan" required value="<?php echo $barang->kode_pengajuan;?>">
                          <!-- untuk mengirimkan kode_pengajuan -->
                          <label class="col-lg-4 col-sm-2 control-label">Nama File RAb :</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" id="nama_pengajuan" name="nama_pengajuan" value="<?php echo $barang->nama_pengajuan?>">
                          </div>
                        </div>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label class="col-lg-4 col-sm-2 control-label">Unggah File :</label>
                          <div class="col-lg-8">
                            <input type="file" id="file_rab" name="file_rab">
                          </div>
                        </div>           
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-info" type="submit" style="margin-top: 10px" onClick="return confirm('Anda yakin akan mengubah pengajuan RAB ini?')"> Simpan </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Modal Ubah Pengajuan RAB -->
            </tr>
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

<!-- Modal Tambah Pengajuan Barang -->
<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Ajukan RAB</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url('BarangC/post_ajukan_rab');?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <div class="form-group">
            <label class="col-lg-4 col-sm-2 control-label">Nama File RAb :</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" id="nama_pengajuan" name="nama_pengajuan" placeholder="Nama File RAB">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 col-sm-2 control-label">Unggah File :</label>
            <div class="col-lg-8">
              <input type="file" id="file_rab" name="file_rab" >
            </div>
          </div>           
        </div>
        <div class="modal-footer">
          <button class="btn btn-info" type="submit" onClick="return confirm('Anda yakin akan mengajukan pengajuan RAB ini?')"> Simpan </button>
          <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>        

</div>
<!-- END Modal Tambah Pengajuan Barang -->

<!-- modal progress rab -->
<div class="modal fade" id="modal_progress_rab" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Progress RAB</h4>
      </div>
      <div class="modal-body">
        <div class="fetched-data"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- ===================================== -->
</div>
</div>
<div class="col-md-2 col-lg-3 col-sm-12">
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
<script>
  $(document).ready(function() {
    // Untuk sunting
    $('#myModal').on('show.bs.modal', function (event) {

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

  // js progress barang
    $(document).ready(function(){
      $('#modal_progress_rab').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
              type : 'get',
              url : '<?php echo base_url().'BarangC/detail_progress_rab/'?>'+rowid,
                //data :  'rowid='+ rowid, // $_POST['rowid'] = rowid
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
              }
            });
          });
    });
</script>
