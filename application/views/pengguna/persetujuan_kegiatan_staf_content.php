<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header text-center" style="margin-top: 0;">Persetujuan Kegiatan Staf</h3>
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
      
      <div class="card mb-3">
        <div class="card-header">
          <div class="card-body">
            <div class="table-responsive">
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
                // print_r($data_pengajuan_kegiatan);
                foreach ($data_pengajuan_kegiatan as $kegiatan) {
                  $jabatan        = $KegiatanM->get_data_pengajuan_by_id_staf($kegiatan->kode_kegiatan)->result();
                  $unit           = $KegiatanM->get_data_pengajuan_by_id_staf($kegiatan->kode_kegiatan)->result();
                  // print_r($kegiatan->kode_kegiatan);
                  ?>
                  <tr>
                    <td class="text-center relative">
                      <div class="relative">
                        <strong><?php echo $kegiatan->nama_kegiatan;?></strong>
                        <a href="#myModal1" id="custID" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" title="klik untuk melihat detail kegiatan"><small class="kecil">Lihat detail</small></a>
                      </div>
                    </td>
                    <td class="text-center"><?php echo $kegiatan->nama;?></td>
                    <td class="text-center"><?php echo $kegiatan->nama_jabatan;?></td>
                    <!-- <td class="text-center"><?php echo $jabatan->nama;?></td> -->
                    <!-- <td class="text-center"><?php echo $jabatan->nama_jabatan." ".$unit->nama_unit;?></td> -->
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
                    <!-- //disetujui -->
                    <?php
                    $progress       = $KegiatanM->get_progress($kegiatan->kode_kegiatan);
                    $progress_tolak = $KegiatanM->get_progress_tolak($kegiatan->kode_kegiatan);
                    $own_id = $data_diri->kode_jabatan_unit;
                    $kode = $kegiatan->kode_kegiatan; 
                    $own  = $KegiatanM->get_own_progress($kode, $own_id);


                      // if ada progress dari staf keuangan , nama progress ambil dari database
                    $id_staf_keu = $cek_id_staf_keu[0]->kode_jabatan_unit; 
                    $progress_staf_keu = $KegiatanM->get_own_progress($kode, $id_staf_keu);
                      $min = $cek_min_pegawai->ranking; //cek rannking min
                      $id_min     = $KegiatanM->cek_id_by_rank_pegawai($min)->kode_jabatan_unit; //id yang rank nya min

                      $kode = $kegiatan->kode_kegiatan; 
                      $rank_min_pegawai =  $KegiatanM->cek_min_pegawai()->ranking;
                      $id_rank_min_pegawai = $KegiatanM->cek_id_by_rank_pegawai($rank_min_pegawai)->kode_jabatan_unit;
                      $progress_min_pegawai = $KegiatanM->get_own_progress($kode, $id_rank_min_pegawai);
                        if($progress_staf_keu > 0){ //sudah ada input staf keu
                          $progress_nama = $KegiatanM->get_progress_by_id($id_staf_keu, $kode)->result()[0]->nama_progress;
                          ?>
                          <a class="label label-warning" href="#modal_progress" id="custID" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" title="klik untuk melihat detail progress"><?php echo $progress_nama?></a>
                          <?php
                        }else{
                          if($progress_tolak == 0 && $progress == 0){ //belum punya progress
                            ?>
                            <a class="label label-info">Mengajukan</a>
                            <?php
                          }else{
                            if($progress_tolak > 0){ //punya progress yang ditolak
                              ?>
                              <a class="label label-danger" href="#modal_progress" id="custID" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" title="klik untuk melihat detail progress">Ditolak</a>
                              <?php
                            }elseif ($progress_min_pegawai > 0) { //jika ada inputan progress dari acc kegiatan yang min (ranking trtinggi)
                              ?>
                              <a class="label label-success" href="#modal_progress" id="custID" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" title="klik untuk melihat detail progress">Disetujui</a>
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
                        $kode = $kegiatan->kode_kegiatan;
                        $id   = $data_diri->kode_jabatan_unit;
                        $own  = $KegiatanM->get_own_progress($kode, $id);
                        // print_r($own);
                        if($own > 0){
                          ?>
                          <a disabled title="Sudah"><span class="glyphicon glyphicon-ok"></a>
                            <p class="kecil">Selesai</p>
                            <?php
                          }elseif ($own == 0) {
                            ?>
                            <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan Persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
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
    </section>

  </section>


  <!-- modal persetujuan kegiatan -->
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
      </div>
    </div>
  </div>


  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script type="text/javascript">
    // js persetujuan kegiatan
    $(document).ready(function(){
      $('#myModal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        var kode  = 3;
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

    // js detail_kegiatan
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
