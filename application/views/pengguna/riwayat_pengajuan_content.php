<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">

        <h3 class="page-header text-center" style="margin-top: 0;"> Riwayat Pengajuan Kegiatan Unit</h3>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-12">

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
          <table id="prosedur" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
               <th class="text-center">Nama Kegiatan</th>
               <th class="text-center">Tgl Pengajuan</th>
               <th class="text-center">Tgl Kegiatan</th>
               <th class="text-center">Dana Diajukan</th>
               <th class="text-center">File</th>
               <th class="text-center">Status</th>
             </tr>
           </thead>
           <tbody>
            <?php
            // print_r($data_kegiatan);
            foreach ($data_kegiatan as $kegiatan) {
              if(!empty($kegiatan->status_kegiatan)){
                ?>
                <tr>
                  <td class="text-center"><?php echo $kegiatan->nama_kegiatan?></td>
                  <?php 
                  $tgl_pengajuan = $kegiatan->tgl_pengajuan;
                  $new_tgl_pengajuan = date('d-m-Y',strtotime($tgl_pengajuan));
                  $tgl_kegiatan = $kegiatan->tgl_kegiatan;
                  $new_tgl_kegiatan = date('d-m-Y', strtotime($tgl_kegiatan));
                  $tgl_selesai = $kegiatan->tgl_selesai_kegiatan;
                  $new_tgl_selesai = date('d-m-Y', strtotime($tgl_selesai));
                  ?>
                  <td class="text-center"><?php echo $new_tgl_pengajuan; ?></td>
                  <td class="text-center"><?php echo $new_tgl_kegiatan." - ".$new_tgl_selesai; ?></td>
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
                    if($kegiatan->status_kegiatan == "Disetujui"){
                      ?>
                      <a class="label label-success" id="custID" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" title="klik untuk melihat detail progress"><?php echo $kegiatan->status_kegiatan?></a>
                      <?php
                    }elseif($kegiatan->status_kegiatan == "Ditolak"){
                      ?>
                      <a class="label label-danger" id="custID" data-toggle="modal" data-id="<?php echo $kegiatan->kode_kegiatan;?>" title="klik untuk melihat detail progress">Ditolak</a>
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
<!-- project team & activity end -->

</section>

</section>