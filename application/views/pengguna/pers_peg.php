<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header text-center" style="margin-top: 0;">Persetujuan Kegiatan Pegawai</h3>
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
                <?php
                  // var_dump($detail_kegiatan);
                ?>
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
                    foreach ($data_pengajuan_kegiatan_pegawai as $kegiatan) {
                      ?>
                      <tr>
                        <td class="text-center relative">
                          <div class="relative">
                            <strong><?php echo $kegiatan->nama_kegiatan;?></strong>
                            <a href="#myModal1" id="custID" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" title="klik untuk melihat detail kegiatan"><small class="kecil">Lihat detail</small></a>
                          </div>
                        </td>
                        <?php 
                        $jabatan        = $KegiatanM->get_data_pengajuan_by_id($kegiatan->kode_kegiatan)->result()[0];
                        $unit           = $KegiatanM->get_data_pengajuan_by_id($kegiatan->kode_kegiatan)->result()[0];
                        $progress       = $KegiatanM->get_progress($kegiatan->kode_kegiatan);
                        $progress_tolak = $KegiatanM->get_progress_tolak($kegiatan->kode_kegiatan);
                        ?>
                        <td class="text-center"><?php echo $jabatan->nama;?></td>
                        <td class="text-center"><?php echo $jabatan->nama_jabatan." ".$unit->nama_unit;?></td>
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
                        <?php 
                        $progress       = $KegiatanM->get_progress($kegiatan->kode_kegiatan);
                        $progress_tolak = $KegiatanM->get_progress_tolak($kegiatan->kode_kegiatan);
                        $kegiatan->kode_kegiatan;
                        $own_id     = $data_diri->kode_jabatan_unit; //id sendri
                        $max        = $cek_max_pegawai->ranking; //id pengguna rank tertinggi
                        $id_max     = $KegiatanM->cek_id_by_rank_pegawai($max)->kode_jabatan_unit; //id yang rank nya max
                        $kode = $kegiatan->kode_kegiatan; 
                        $own  = $KegiatanM->get_own_progress($kode, $own_id);
                          // echo $progress;
                          // echo $progress_tolak;
                        $id_staf_keu = $cek_id_staf_keu[0]->kode_jabatan_unit; 
                        $progress_staf_keu = $KegiatanM->get_own_progress($kode, $id_staf_keu);
                             //disetujui
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
                        $kegiatan_created = $kegiatan->created_at; //waktu kegiatan dibuat
                        $acc_created = $KegiatanM->created_at($data_diri->kode_jabatan_unit)->created_at; //waktu akses dibuat
                      if($own_id == $id_max){ //apakah rankingnya max(terendah)
                       if($own > 0){ //SUDAH INPUT 
                        ?>
                        <a disabled title="Sudah"><span class="glyphicon glyphicon-ok"></a>
                          <p class="kecil">Selesai</p>
                          <?php
                        }else{
                          $atasan = $KegiatanM->cek_atasan_by_kode_jabatan_unit($kegiatan->kode_jabatan_unit)->result()[0]->atasan; //apakah jabatanya seorang pimpinan
                          if($atasan == "tidak"){
                            $progress_tolak = $KegiatanM->get_progress_tolak($kegiatan->kode_kegiatan); //ada progress tolak?
                            if($progress_tolak > 0){
                             ?>
                             <a  id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Selesai" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                             <?php
                           }else{
                            if($KegiatanM->cek_rank_by_id_pegawai($kegiatan->pimpinan) == NULL || $KegiatanM->cek_rank_by_id_pegawai($kegiatan->pimpinan) == "data tidak ada"){ //jika atasan tidak punya ranking
                              $acc_atasan = $KegiatanM->get_own_progress($kode, $kegiatan->pimpinan);
                              if ($acc_atasan > 0){
                                if($acc_created > $kegiatan_created && $progress_min_pegawai > 0){
                                 ?>
                                 <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Tidak diijinkan menyetujui 1" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                 <?php
                               }else{
                                ?>
                                <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan Persetujuan 1" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                <?php
                              }
                               }else{ //tidak butuh atasan kalo dia atasan
                                 ?>
                                 <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                 <?php
                               }  
                            }else{ //punya ranking
                              $rank_atasan = $KegiatanM->cek_rank_by_id_pegawai($kegiatan->pimpinan)->ranking;
                            if($id_max == $rank_atasan){  //jika atasannya input pertaama (sekdep) maka langsung acc ketika atasan acc jadinya tombol acc keg nya di disabled karena cuku 1 kali aja pas acc keg staf
                              if($acc_created > $kegiatan_created  && $progress_min_pegawai > 0){
                               ?>
                               <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Tidak diijinkan menyetujui 2" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                               <?php
                             }else{
                               ?>
                               <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan Persetujuan 2" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                               <?php   
                             }
                           }else{ //jika atasan tidak input pertama (butuh acc atasan kalo dia staf)
                            $acc_atasan = $KegiatanM->get_own_progress($kode, $kegiatan->pimpinan);
                            if ($acc_atasan > 0){
                              if($acc_created > $kegiatan_created  && $progress_min_pegawai > 0){
                               ?>
                               <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Tidak diijinkan menyetujui 3" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                               <?php
                             }else{
                              ?>
                              <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan Persetujuan 3" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                              <?php
                            }
                           }else{ //tidak butuh atasan kalo dia atasan
                             ?>
                             <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Belum disetujui atasan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                             <?php
                           }  
                         }    
                       }
                     }
                   }else{
                    if($acc_created > $kegiatan_created && $progress_min_pegawai > 0){
                     ?>
                     <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Tidak diijinkan menyetujui 4" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                     <?php
                   }else{
                    ?>
                    <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan Persetujuan 4" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                    <?php
                  }
                }
              }

            }else{
                      $own_rank   = $KegiatanM->cek_rank_by_id_pegawai($own_id)->ranking; //rank sendiri
                      $rank_next  = ((int)$own_rank + 1); //id yang punya rank sendri + 1
                      $id_next    = $KegiatanM->cek_id_by_rank_pegawai($rank_next)->kode_jabatan_unit; //id yang ranknya ranksendiri + 1
                      $progress_id_next = $KegiatanM->get_own_progress($kegiatan->kode_kegiatan, $id_next); //progress id yang ranknya ranksendiri + 1
                      if($progress_id_next == "1"){
                       if($own > 0){?>
                        <a disabled title="Sudah"><span class="glyphicon glyphicon-ok"></a>
                          <p class="kecil">Selesai</p>
                          <?php
                        }else{
                         $progress_tolak = $KegiatanM->get_progress_tolak($kegiatan->kode_kegiatan);
                         if ($progress_tolak == 1) {
                           ?>
                           <a href="#" id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Selesai" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                           <?php
                         }else{
                          if($acc_created > $kegiatan_created && $progress_min_pegawai > 0){
                            ?>
                            <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Tidak diijinkan menyetujui 4" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                            <?php
                          }else{
                           ?>
                           <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan Persetujuan 5" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                           <?php  
                         }
                       }
                     }
                   }else{
                    ?>
                    <a href="#" id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Selesai" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                    <?php
                  }
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
<!-- modal detail pengajuan -->
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
      <div class="modal-footer">
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
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
    // js detail pengajuan
    $(document).ready(function(){
      $('#myModal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
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

// js detail kegiatan
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