<script src="<?php echo base_url(); ?>/assets/js/Chart.bundle.js"></script>
<link href="<?php echo base_url(); ?>/assets/css/custom1.css" rel="stylesheet">
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
            <div class="count"><?php echo number_format($total, 0,',','.').',00 / '.$total_setuju;?></div>
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
