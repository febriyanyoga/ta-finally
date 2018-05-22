<form class="form-horizontal" action="<?php echo base_url(); ?>KegiatanC/post_progress" method="post">
    <div class="form-group">
        <label class="control-label col-sm-5" for="nama_kegiatan" style="text-align: left;">Nama Kegiatan</label>
        <div class="col-sm-5">
            <p class="form-control-static"> <?php echo ": ".$detail_kegiatan->nama_kegiatan; ?> </p>
        </div>
        <input type="hidden" name="kode_fk" value="<?php echo $detail_kegiatan->kode_kegiatan?>"> <!-- buat input ke tabel progress -->
        <input type="hidden" name="id_pengguna" value="<?php echo $data_diri->id_pengguna;?>"> <!-- buat input ke tabel progress -->
        <input type="hidden" name="kode_jabatan_unit" value="<?php echo $data_diri->kode_jabatan_unit;?>"> <!-- buat input ke tabel progress -->
        <input type="hidden" name="email" id="email" value="<?php echo $detail_kegiatan->email;?>"> <!-- buat input ke tabel progress -->
        <input type="hidden" name="jenis_progress" id="jenis_progress" value="kegiatan_staf"> <!-- buat input ke tabel progress -->

        
    </div>
    <div class="form-group">
        <label class="control-label col-sm-5" for="tgl_pengajuan" style="text-align: left;">Tanggal Pengajuan Kegiatan</label>
        <div class="col-sm-5">
            <?php
            $tgl_pengajuan = $detail_kegiatan->tgl_pengajuan;
            $new_tgl_pengajuan = date('d-m-Y',strtotime($tgl_pengajuan));
            ?>
            <p class="form-control-static"> <?php echo ": ".$new_tgl_pengajuan; ?> </p>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-5" for="tgl_kegiatan" style="text-align: left;">Tanggal Pelaksanaan Kegiatan</label>
        <div class="col-sm-5">
            <?php
            $tgl_mulai = $detail_kegiatan->tgl_kegiatan;
            $new_tgl_mulai = date('d-m-Y',strtotime($tgl_mulai));
            $tgl_selesai = $detail_kegiatan->tgl_selesai_kegiatan;
            $new_tgl_selesai = date('d-m-Y', strtotime($tgl_selesai));
            ?>
            <p class="form-control-static"> <?php echo ": ".$new_tgl_mulai." - ".$new_tgl_selesai; ?> </p>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-5" for="dana_diajukan" style="text-align: left;">Dana Yang Diajukan</label>
        <div class="col-sm-5">
            <p class="form-control-static"> <?php echo ": Rp".number_format($detail_kegiatan->dana_diajukan, 0,',','.').",00"; ?> </p>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-5" for="status" name="kode_nama_progress" id="kode_nama_progress" style="text-align: left;">Status<i style="color: red;">*</i></label>
        <?php 
        if(in_array('11', $menu)){
            ?>
            <div class="col-sm-5">
                <select class="form-control" name="kode_nama_progress" id="kode_nama_progress">
                    <?php 
                    foreach ($nama_progress as $nama_progress) {
                        if($nama_progress->kode_nama_progress != '1'){
                            if($nama_progress->kode_nama_progress != '2'){
                                ?>
                                <option value="<?php echo $nama_progress->kode_nama_progress ;?>"> <?php echo $nama_progress->nama_progress;?> </option>
                                <?php       
                            }
                        }
                    }
                    ?>
                </select>
            </div>
            <?php 
        }else{
            ?>
            <div class="col-sm-5">
              <input type="radio" name="kode_nama_progress" id="kode_nama_progress" value="1" checked> DITERIMA
              <input style="margin-left: 10px;" type="radio" name="kode_nama_progress" id="kode_nama_progress" value="2"> DITOLAK
          </div>
          <?php
      }
      ?>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5" for="komentar" style="text-align: left;">Komentar<i style="color: red;">*</i></label>
    <div class="col-sm-5">
        <textarea name="komentar" id="komentar" class="form-control" id="focusedInput" required> </textarea>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-5" for="komentar" style="text-align: left; font-style: italic;"><i style="color: red;">*</i> Harus Diisi</label>
    <div class="col-sm-5">
    </div>
</div>
<div class="form-group">
    <div class="col-sm-5"></div>
    <div class="col-sm-5">
        <button class="btn btn-primary">Simpan</button>
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button> -->
    </div>
</div>
</form>