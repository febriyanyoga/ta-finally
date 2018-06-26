<script src="<?php echo base_url(); ?>/assets/js/Chart.bundle.js"></script>
<link href="<?php echo base_url(); ?>/assets/css/custom1.css" rel="stylesheet">
<style type="text/css">
/* Timeline */
.timeline,
.timeline-horizontal {
  list-style: none;
  padding: 20px;
  position: relative;
}
.timeline:before {
  top: 40px;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 3px;
  background-color: #eeeeee;
  left: 50%;
  margin-left: -1.5px;
}
.timeline .timeline-item {
  margin-bottom: 20px;
  position: relative;
}
.timeline .timeline-item:before,
.timeline .timeline-item:after {
  content: "";
  display: table;
}
.timeline .timeline-item:after {
  clear: both;
}
.timeline .timeline-item .timeline-badge {
  color: #fff;
  width: 54px;
  height: 54px;
  line-height: 52px;
  font-size: 22px;
  text-align: center;
  position: absolute;
  top: 18px;
  left: 50%;
  margin-left: -25px;
  background-color: #7c7c7c;
  border: 3px solid #ffffff;
  z-index: 100;
  border-top-right-radius: 50%;
  border-top-left-radius: 50%;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
}
.timeline .timeline-item .timeline-badge i,
.timeline .timeline-item .timeline-badge .fa,
.timeline .timeline-item .timeline-badge .glyphicon {
  top: 2px;
  left: 0px;
}
.timeline .timeline-item .timeline-badge.primary {
  background-color: #1f9eba;
}
.timeline .timeline-item .timeline-badge.info {
  background-color: #5bc0de;
}
.timeline .timeline-item .timeline-badge.success {
  background-color: #59ba1f;
}
.timeline .timeline-item .timeline-badge.warning {
  background-color: #d1bd10;
}
.timeline .timeline-item .timeline-badge.danger {
  background-color: #ba1f1f;
}
.timeline .timeline-item .timeline-panel {
  position: relative;
  width: 46%;
  float: left;
  right: 16px;
  border: 1px solid #c0c0c0;
  background: #ffffff;
  border-radius: 2px;
  padding: 20px;
  -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
}
.timeline .timeline-item .timeline-panel:before {
  position: absolute;
  top: 26px;
  right: -16px;
  display: inline-block;
  border-top: 16px solid transparent;
  border-left: 16px solid #c0c0c0;
  border-right: 0 solid #c0c0c0;
  border-bottom: 16px solid transparent;
  content: " ";
}
.timeline .timeline-item .timeline-panel .timeline-title {
  margin-top: 0;
  color: inherit;
}
.timeline .timeline-item .timeline-panel .timeline-body > p,
.timeline .timeline-item .timeline-panel .timeline-body > ul {
  margin-bottom: 0;
}
.timeline .timeline-item .timeline-panel .timeline-body > p + p {
  margin-top: 5px;
}
.timeline .timeline-item:last-child:nth-child(even) {
  float: right;
}
.timeline .timeline-item:nth-child(even) .timeline-panel {
  float: right;
  left: 16px;
}
.timeline .timeline-item:nth-child(even) .timeline-panel:before {
  border-left-width: 0;
  border-right-width: 14px;
  left: -14px;
  right: auto;
}
.timeline-horizontal {
  list-style: none;
  position: relative;
  padding: 0px 0px 20px 0px;
  display: inline-block;
}
.timeline-horizontal:before {
  height: 3px;
  top: auto;
  bottom: 26px;
  left: 56px;
  right: 0;
  width: 93%;
  margin-bottom: 20px;
}
.timeline-horizontal .timeline-item {
  display: table-cell;
  height: 200px;
  width: 20%;
  min-width: 320px;
  float: none !important;
  padding-left: 0px;
  padding-right: 20px;
  margin: 0 auto;
  vertical-align: bottom;
}
.timeline-horizontal .timeline-item .timeline-panel {
  top: auto;
  bottom: 64px;
  display: inline-block;
  float: none !important;
  left: 0 !important;
  right: 0 !important;
  width: 100%;
  margin-bottom: 20px;
}
.timeline-horizontal .timeline-item .timeline-panel:before {
  top: auto;
  bottom: -16px;
  left: 28px !important;
  right: auto;
  border-right: 16px solid transparent !important;
  border-top: 16px solid #c0c0c0 !important;
  border-bottom: 0 solid #c0c0c0 !important;
  border-left: 16px solid transparent !important;
}
.timeline-horizontal .timeline-item:before,
.timeline-horizontal .timeline-item:after {
  display: none;
}
.timeline-horizontal .timeline-item .timeline-badge {
  top: auto;
  bottom: 0px;
  left: 43px;
  }s
</style>
<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header text-center" style="margin-top: 0;">Beranda</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
       <?php
       if(in_array('15', $menu)){

         $kadep = $PenggunaM->get_pengguna_by_kode_jabatan_unit('1','aktif');
         $sekdep = $PenggunaM->get_pengguna_by_kode_jabatan_unit('2','aktif');
         $manajer_sarpras = $PenggunaM->get_pengguna_by_kode_jabatan_unit('3','aktif');
         $staf_sarpras = $PenggunaM->get_pengguna_by_kode_jabatan_unit('4','aktif');
         $manajer_keuangan = $PenggunaM->get_pengguna_by_kode_jabatan_unit('5','aktif');
         $staf_keuangan = $PenggunaM->get_pengguna_by_kode_jabatan_unit('6','aktif');

         $acc_keg = $PenggunaM->get_persetujuan_kegiatan()->result();
         $i=0;
         $j=0;
         foreach ($acc_keg as $acc) {
          $i++;

          if($PenggunaM->get_pengguna_by_kode_jabatan_unit($acc->kode_jabatan_unit,'aktif')->num_rows() == 1){
            $j++;
          }
        }
        if($kadep->num_rows() > 0 && $sekdep->num_rows() > 0 && $manajer_sarpras->num_rows() > 0 && $staf_sarpras->num_rows() > 0 && $manajer_keuangan->num_rows() > 0 && $staf_keuangan->num_rows() > 0){
          ?>   
          <div class="alert alert-success">
            <i class="glyphicon glyphicon-ok"></i><strong> Lengkap!</strong> Semua jabatan penting telah terpenuhi, sistem dapat berjalan dengan baik.
          </div> 
          <?php
        }else{
          if($i != $j){
           ?>
           <div class="alert alert-warning">
            <i class="glyphicon glyphicon-exclamation-sign"></i><strong> Perhatian!</strong> Masih ada Jabatan penting yang kosong. Silahkan dilengkapi terlebih dahulu, agar sistem dapat berjalan dengan baik.<br>
          </div>
          <?php
        }else{
          ?>
          <div class="alert alert-warning">
            <i class="glyphicon glyphicon-exclamation-sign"></i><strong> Perhatian!</strong> Masih ada Jabatan penting yang kosong. Silahkan dilengkapi terlebih dahulu, agar sistem dapat berjalan dengan baik.<br>
          </div>
          <?php
        }
      }
    }
    ?>

    <?php
    if(in_array('1', $menu) || in_array('2', $menu) || in_array('3', $menu) || in_array('4', $menu) || in_array('5', $menu) || in_array('17', $menu)){
      ?>  
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="info-box blue-bg">
          <i class="fa fa fa-edit"></i>
          <div class="count"><?php echo $data_kegiatan?></div>
          <div class="title">Pengajuan Kegiatan</div>           
        </div><!--/.info-box-->     
      </div><!--/.col-->

      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="info-box green-bg">
          <i class="fa fa-cubes"></i>
          <div class="count"><?php echo $data_ajukan_barang;?></div>
          <div class="title">Pengajuan Barang</div>            
        </div><!--/.info-box-->     
      </div><!--/.col-->

      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="info-box brown-bg">
          <i class="fa fa fa-check"></i>
          <?php
          if(in_array('1', $menu)){
            $p1 = $KegiatanM->get_data_pengajuan('2')->num_rows(); //kegiatan mahasiswa
          }else{
            $p1 = 0;
          }

          if(in_array('2', $menu)){
            $p2 = $KegiatanM->get_data_pengajuan('1')->num_rows(); //kegiatan Pegawai
          }else{
            $p2 = 0;
          }

          if(in_array('3', $menu)){
            $kode_unit = $data_diri->kode_unit;
            $kode_jabatan = $data_diri->kode_jabatan;
            $p3 = $KegiatanM->get_data_pengajuan_staf($kode_unit, $kode_jabatan)->num_rows();
          }else{
            $p3 = 0;
          }

          if(in_array('4', $menu)){
            $p4 = $BarangM->get_rab_diajukan()->num_rows();
          }else{
            $p4=0;
          }

          if(in_array('5', $menu)){
            $p5 = $BarangM->get_data_item_pengajuan()->num_rows();
          }else{
            $p5 = 0;
          }

          if(in_array('17', $menu)){
            $kode_unit = $data_diri->kode_unit;
            $kode_jabatan = $data_diri->kode_jabatan;
            $p6 = $BarangM->get_data_item_pengajuan_staf($kode_unit, $kode_jabatan)->num_rows();
          }else{
            $p6 = 0;
          }
          ?>
          <div class="count"><?php echo $p1+$p2+$p3+$p4+$p5+$p6?></div>
          <div class="title">Persetujuan</div>            
        </div><!--/.info-box-->     
      </div><!--/.col-->     
      <?php
    }else{
      if(in_array('6', $menu)){
        ?>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="info-box blue-bg">
            <i class="fa fa fa-edit"></i>
            <div class="count"><?php echo $data_kegiatan?></div>
            <div class="title">Pengajuan Kegiatan</div>           
          </div><!--/.info-box-->     
        </div><!--/.col-->
        <?php
        $total = 0;
        foreach ($data_kegiatan_mhs as $data_mhs) {
          $total += $data_mhs->dana_diajukan;
        }

        $rank_min_pegawai =  $KegiatanM->cek_min_pegawai()->ranking;
        $id_rank_min_pegawai = $KegiatanM->cek_id_by_rank_pegawai($rank_min_pegawai)->kode_jabatan_unit;
        $dana_disetujui = $PenggunaM->get_kegiatan_pegawai_setuju($id_rank_min_pegawai)->result();
        $total_setuju = 0;
        // print_r($dana_disetujui);
        foreach ($dana_disetujui as $setuju) {
          $total_setuju += $setuju->dana_diajukan;
        }
        ?>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="info-box green-bg">
            <i class="fa fa-money"></i>
            <div class="count"><?php echo number_format($total_setuju, 0,',','.').',00 / '.number_format($total, 0,',','.').',00';?></div>
            <div class="title">Jumlah Pengajuan Dana</div>            
          </div><!--/.info-box-->     
        </div><!--/.col-->
        <?php
      }else{
        ?>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="info-box blue-bg">
            <i class="fa fa fa-edit"></i>
            <div class="count"><?php echo $data_kegiatan?></div>
            <div class="title">Pengajuan Kegiatan</div>           
          </div><!--/.info-box-->     
        </div><!--/.col-->

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="info-box green-bg">
            <i class="fa fa-cubes"></i>
            <div class="count"><?php echo $data_ajukan_barang;?></div>
            <div class="title">Pengajuan Barang</div>            
          </div><!--/.info-box-->     
        </div><!--/.col-->
        <?php
      }
    }
    ?>

  </div>
</div>

<div class="row">
 <div class="col-lg-12">
  <section class="panel">
                      <!-- <header class="panel-heading">
                          <h3> </Char>
                          </header> -->
                          <!-- <?php print_r($menu);?> -->
                          
                          <div class="panel-body">
                            <div class="tab-pane" id="chartjs">
                              <div class="row">
                                <?php 
                                if(in_array('7', $menu)){ //jika punya akses menu pengajuan kegiatan pegawai
                                  ?>  
                                  <div class="col-lg-6">
                                    <section class="panel">
                                      <header class="panel-heading">
                                        Pengajuan Kegiatan Pegawai
                                      </header>
                                      <div class="panel-body text-center">
                                        <canvas id="grafik1" width="300" height="200"></canvas>
                                      </div>
                                    </section>
                                  </div>  
                                  <?php
                                }
                                if(in_array('6', $menu)){
                                  ?>  
                                  <div class="col-lg-6">
                                    <section class="panel">
                                      <header class="panel-heading">
                                        Pengajuan Kegiatan Mahasiswa
                                      </header>
                                      <div class="panel-body text-center">
                                        <canvas id="grafik2" height="200" width="300"></canvas>
                                      </div>
                                    </section>
                                  </div>

                                  <div class="col-lg-6">
                                    <section class="panel">
                                      <header class="panel-heading">
                                        Dana Pengajuan Kegiatan Mahasiswa
                                      </header>
                                      <div class="panel-body text-center">
                                        <canvas id="grafik21" height="200" width="300"></canvas>
                                      </div>
                                    </section>
                                  </div>
                                  <?php
                                }
                                if(in_array('9', $menu)){
                                 ?>  
                                 <div class="col-lg-6">
                                  <section class="panel">
                                    <header class="panel-heading">
                                      Pengajuan Barang
                                    </header>
                                    <div class="panel-body text-center">
                                      <canvas id="grafik2" height="200" width="300"></canvas>
                                    </div>
                                  </section>
                                </div>
                                <?php
                              }
                              if(in_array('8', $menu)){
                               ?>  
                               <div class="col-lg-6">
                                <section class="panel">
                                  <header class="panel-heading">
                                    Pengajuan RAB
                                  </header>
                                  <div class="panel-body text-center">
                                    <canvas id="grafik3" height="200" width="300"></canvas>
                                  </div>
                                </section>
                              </div>
                              <?php
                            }
                            ?>
                          </div>
                        </div>
                      </div> 
                    </section>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="page-header">
                      <center><h3>Alur persetujuan pengajuan kegiatan</h3></center>
                    </div>
                    <div style="display:inline-block;width:100%;overflow-y:auto;">
                      <ul class="timeline timeline-horizontal">
                        <?php
                        if($data_diri->atasan == "tidak"){ //bukan atasan
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
                        foreach ($persetujuan_kegiatan as $persetujuan) {
                          ?>
                          <li class="timeline-item">
                            <div class="timeline-badge success"><i class="glyphicon glyphicon-check"></i></div>
                            <div class="timeline-panel">
                              <div class="timeline-heading">
                                <h4 class="timeline-title">
                                  <?php if($i == 1){
                                    echo "Pertama, ";
                                  }else if($i == 2){
                                    echo "Kedua, ";
                                  }else{
                                    echo "Selanjutnya, ";
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
                        ?>
                        <li class="timeline-item">
                          <div class="timeline-badge success"><i class="glyphicon glyphicon-check"></i></div>
                          <div class="timeline-panel">
                            <div class="timeline-heading">
                              <h4 class="timeline-title">Selesai</h4>
                              <!-- <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p> -->
                            </div>
                            <div class="timeline-body">
                              <p>Kegiatan siap dilaksanakan.</p>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- project team & activity end -->

              </section>
            </section>
            <?php
            if(in_array('7', $menu)){ //pengajuan kegiatan pegawai
              $rank_min_pegawai =  $KegiatanM->cek_min_pegawai()->ranking;
              $id_rank_min_pegawai = $KegiatanM->cek_id_by_rank_pegawai($rank_min_pegawai)->kode_jabatan_unit;
              $setuju = $PenggunaM->get_kegiatan_pegawai_setuju($id_rank_min_pegawai)->num_rows();
              $tolak = $PenggunaM->get_kegiatan_tolak()->num_rows();
              $belum = $data_kegiatan-$setuju-$tolak;
              ?>   
              <script>
                var ctx = document.getElementById("grafik1");
                var myChart = new Chart(ctx, {
                  type: 'pie',
                  data: {
                    labels: ["Disetujui", "Belum Disetujui", "ditolak"],
                    datasets: [{
                      label: 'Jumlah layanan',
                      data: [<?php echo $setuju?>, <?php echo $belum?>, <?php echo $tolak?>],
                      backgroundColor: [
                                // 'rgba(255, 206, 86, 1)', //kuning
                                'rgba(54, 162, 235, 1)', //biru
                                // 'rgba(255, 99, 132, 0.2)', //pink
                                'rgba(75, 192, 192, 1)', //h
                                'rgba(153, 102, 255, 1)', //u
                                // 'rgba(255, 159, 64, 1)' //o
                                ],
                                borderColor: [
                                // 'rgba(255, 206, 86, 0.2)',
                                'rgba(54, 162, 235, 1)',
                                // 'rgba(255,99,132,1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                // 'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                              }]
                            },
                            options: {
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    beginAtZero: true
                                  }
                                }]
                              }
                            }
                          });
                        </script>
                        <?php
                      }
                      if(in_array('6', $menu)){ //pengajuan kegiatan mahasiswa
                       $rank_min_pegawai =  $KegiatanM->cek_min_pegawai()->ranking;
                       $id_rank_min_pegawai = $KegiatanM->cek_id_by_rank_pegawai($rank_min_pegawai)->kode_jabatan_unit;
                       $setuju = $PenggunaM->get_kegiatan_pegawai_setuju($id_rank_min_pegawai)->num_rows();
                       $tolak = $PenggunaM->get_kegiatan_tolak()->num_rows();
                       $belum = $data_kegiatan-$setuju;
                       ?>   
                       <script>
                        var ctx = document.getElementById("grafik2");
                        var myChart = new Chart(ctx, {
                          type: 'pie',
                          data: {
                            labels: ["Disetujui", "Belum Disetujui","Ditolak"],
                            datasets: [{
                              label: 'Bidang',
                              data: [<?php echo $setuju?> , <?php echo $belum?>, <?php echo $tolak?>],
                              backgroundColor: [
                                'rgba(255, 206, 86, 1)', //kuning
                                // 'rgba(54, 162, 235, 1)', //biru
                                // 'rgba(255, 99, 132, 1)', //pink
                                'rgba(75, 192, 192, 1)', //hijau
                                'rgba(153, 102, 255, 1)',//ungu
                                // 'rgba(255, 159, 64, 1)'//orange
                                ],
                                borderColor: [
                                'rgba(255, 206, 86, 1)',
                                // 'rgba(54, 162, 235, 0.2)',
                                // 'rgba(255,99,132,1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                // 'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                              }]
                            },
                            options: {
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    beginAtZero: true
                                  }
                                }]
                              }
                            }
                          });
                        </script>
                        <?php
                        $total = 0;
                        foreach ($data_kegiatan_mhs as $data_mhs) {
                          $total += $data_mhs->dana_diajukan;
                        }
                        $rank_min_pegawai =  $KegiatanM->cek_min_pegawai()->ranking;
                        $id_rank_min_pegawai = $KegiatanM->cek_id_by_rank_pegawai($rank_min_pegawai)->kode_jabatan_unit;
                        $dana_disetujui = $PenggunaM->get_kegiatan_pegawai_setuju($id_rank_min_pegawai)->result();
                        $total_setuju = 0;
                        foreach ($dana_disetujui as $setuju) {
                          $total_setuju += $setuju->dana_diajukan;
                        }
                        $dana_ditolak = $PenggunaM->get_kegiatan_tolak()->result();
                        $total_tolak = 0;
                        foreach ($dana_ditolak as $tolak) {
                          $total_tolak += $tolak->dana_diajukan;
                        }
                        ?>   
                        <script>
                          var ctx = document.getElementById("grafik21");
                          var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                              labels: ["Dana Disetujui", "Belum Disetujui", "Dana Ditolak"],
                              datasets: [{
                                label: 'Bidang',
                                data: [<?php echo $total_setuju?> , <?php echo $total-$total_setuju-$total_tolak?>, <?php echo $total_tolak?>],
                                backgroundColor: [
                                'rgba(255, 206, 86, 1)', //kuning
                                // 'rgba(54, 162, 235, 1)', //biru
                                // 'rgba(255, 99, 132, 1)', //pink
                                'rgba(75, 192, 192, 1)', //hijau
                                'rgba(153, 102, 255, 1)',//ungu
                                // 'rgba(255, 159, 64, 1)'//orange
                                ],
                                borderColor: [
                                'rgba(255, 206, 86, 1)',
                                // 'rgba(54, 162, 235, 0.2)',
                                // 'rgba(255,99,132,1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                // 'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                              }]
                            },
                            options: {
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    beginAtZero: true
                                  }
                                }]
                              }
                            }
                          });
                        </script>
                        <?php
                      }
                      if(in_array('9', $menu)){ //pengajuan barang
                        $setuju = $BarangM->get_barang_disetujui()->num_rows();
                        $belum = $data_ajukan_barang-$setuju;
                        ?>   
                        <script>
                          var ctx = document.getElementById("grafik2");
                          var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                              labels: ["Disetujui", "Belum Disetujui"],
                              datasets: [{
                                label: 'Bidang',
                                data: [<?php echo $setuju?> , <?php echo $belum?>],
                                backgroundColor: [
                                'rgba(255, 206, 86, 1)', //kuning
                                // 'rgba(54, 162, 235, 1)', //biru
                                // 'rgba(255, 99, 132, 1)', //pink
                                'rgba(75, 192, 192, 1)', //hijau
                                // 'rgba(153, 102, 255, 1)',//ungu
                                // 'rgba(255, 159, 64, 1)'//orange
                                ],
                                borderColor: [
                                'rgba(255, 206, 86, 0.2)',
                                // 'rgba(54, 162, 235, 0.2)',
                                // 'rgba(255,99,132,1)',
                                'rgba(75, 192, 192, 1)',
                                // 'rgba(153, 102, 255, 1)',
                                // 'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                              }]
                            },
                            options: {
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    beginAtZero: true
                                  }
                                }]
                              }
                            }
                          });
                        </script>
                        <?php
                      }
                      if(in_array('8', $menu)){ //pengajuan RAB
                        $semua = $BarangM->get_rab_diajukan()->num_rows();  //pengajuan rab semua
                        $setuju = $BarangM->get_rab_diterima()->num_rows(); //pengajuan rab disetujui
                        $belum = $semua-$setuju;
                        ?>   
                        <script>
                          var ctx = document.getElementById("grafik3");
                          var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                              labels: ["Disetujui", "Belum Disetujui"],
                              datasets: [{
                                label: 'Bidang',
                                data: [<?php echo $setuju?> , <?php echo $belum?>],
                                backgroundColor: [
                                'rgba(255, 206, 86, 1)', //kuning
                                // 'rgba(54, 162, 235, 1)', //biru
                                // 'rgba(255, 99, 132, 1)', //pink
                                'rgba(75, 192, 192, 1)', //hijau
                                // 'rgba(153, 102, 255, 1)',//ungu
                                // 'rgba(255, 159, 64, 1)'//orange
                                ],
                                borderColor: [
                                'rgba(255, 206, 86, 0.2)',
                                // 'rgba(54, 162, 235, 0.2)',
                                // 'rgba(255,99,132,1)',
                                'rgba(75, 192, 192, 1)',
                                // 'rgba(153, 102, 255, 1)',
                                // 'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                              }]
                            },
                            options: {
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    beginAtZero: true
                                  }
                                }]
                              }
                            }
                          });
                        </script>
                        <?php
                      }
                      ?>
