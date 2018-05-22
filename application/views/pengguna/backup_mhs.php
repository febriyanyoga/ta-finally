 <td class="text-center">
  <?php 
                      $own_id     = $data_diri->kode_jabatan_unit; //id jabatan unit sendri
                      $max        = $cek_max->ranking; //id pengguna rank tertinggi
                      $id_max     = $KegiatanM->cek_id_by_rank_mhs($max)->kode_jabatan_unit; //id yang rank nya max

                      $kode = $kegiatan->kode_kegiatan; 
                      $own  = $KegiatanM->get_own_progress($kode, $own_id);
                      $kegiatan_created = $kegiatan->created_at; //waktu kegiatan dibuat
                      $acc_created = $KegiatanM->created_at_mhs($data_diri->kode_jabatan_unit)->created_at;

                      if($own_id == $id_max){
                       if($own > 0){ //SUDAH INPUT 
                        ?>
                        <a disabled title="Sudah"><span class="glyphicon glyphicon-ok"></a>
                          <p class="kecil">Selesai</p>
                          <?php
                        }else{
                         $progress_tolak = $KegiatanM->get_progress_tolak($kegiatan->kode_kegiatan);
                         if($progress_tolak == 1){
                           ?>
                           <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Selesai" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                           <?php
                         }else{
                          if($acc_created > $kegiatan_created && $progress_min_mhs > 0){ //jika acc dibikin setelah kkegiatan dibikin dan suda disetujui
                           ?>
                           <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="tidak diijinkan menyetujui" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                           <?php
                         }else{
                           ?>
                           <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan Persetujuan 2" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                           <?php
                         }
                       }
                     }
                   }else{
                      $own_rank   = $KegiatanM->cek_rank_by_id_mhs($own_id)->ranking; //rank sendiri
                      $rank_next  = ((int)$own_rank + 1); //id yang punya rank sendri + 1
                      $id_next    = $KegiatanM->cek_id_by_rank_mhs($rank_next)->kode_jabatan_unit; //id yang ranknya ranksendiri + 1
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
                           <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Selesai" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                           <?php
                         }else{
                           ?>
                           <a href="#myModal" id="custId" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Masukkan Persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                           <?php 
                         }
                       }
                     }else{
                      ?>
                      <a id="custId" disabled data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" data-toggle="tooltip" title="Belum dapat melakukan Persetujuan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                      <?php
                    }
                  }
                  ?>
                </td>