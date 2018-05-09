<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class BarangC extends CI_Controller {

	var $data = array();
	private $data_menu;

	public function __construct(){
		parent::__construct();
		$this->load->model(['BarangM','PenggunaM','BarangM']);
		in_access(); //helper buat batasi akses login/session

		$data_akses_menu = $this->PenggunaM->get_akses_menu()->result();
		$data_array_akses_menu = array();
		foreach ($data_akses_menu as $menu) {
			array_push($data_array_akses_menu, $menu->kode_menu);
		}
		$this->data_menu = $data_array_akses_menu; // array akses menu berdasarkan user login
	}

	// =============================FUNGSI PER HALAMAN===============================

	public function persetujuan_barang(){ //halaman persetujuan barang (mansarpras)
		// menampilkan pengajuan item barang yang telah di beri porgress oleh pimpinan 
		$data['menu'] = $this->data_menu;
		$id_pengguna = $this->session->userdata('id_pengguna');
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Persetujuan Item Pengajuan | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$this->data['data_persetujuan_barang'] = $this->BarangM->get_data_item_pengajuan()->result();
		$this->data['BarangM'] = $this->BarangM ;
		$this->data['data_diri'] = $data_diri; //get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('pengguna/persetujuan_barang_content', $this->data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}

	public function persetujuan_barang_staf(){ //halaman persetujuan barang staf 
		// menampilkan pengajuan item barang yang telah di beri porgress oleh pimpinan 
		$data['menu'] = $this->data_menu;
		$id_pengguna = $this->session->userdata('id_pengguna');
		$kode_unit 	= $this->session->userdata('kode_unit');
		$kode_jabatan = $this->session->userdata('kode_jabatan');
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Persetujuan Item Pengajuan | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$this->data['data_barang_staf'] = $this->BarangM->get_data_item_pengajuan_staf($kode_unit, $kode_jabatan)->result();
		$this->data['BarangM'] = $this->BarangM ;
		$this->data['data_diri'] = $data_diri; //get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('pengguna/persetujuan_barang_staf_content', $this->data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}

	public function kelola_barang(){ //halaman kelola barang (mansarpras & staf sarpras)
		// menampilkan daftar semua barang
		$data['menu'] = $this->data_menu;
		$id_pengguna = $this->session->userdata('id_pengguna');
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Kelola Barang | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$this->data['data_barang'] = $this->BarangM->get_barang()->result();
		$this->data['jenis_barang'] = $this->BarangM->get_pilihan_jenis_barang()->result();
		$this->data['data_diri'] = $data_diri; //get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('pengguna/barang_content', $this->data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}

	public function klasifikasi_barang(){ //halaman klasifikasi barang (mansarpras & staf sarpras)
		// menampilkan daftar barang yang belum terklasifikasi
		$data['menu'] = $this->data_menu;
		$id_pengguna = $this->session->userdata('id_pengguna');
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Klasifikasi Barang | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$this->data['data_klasifikasi'] = $this->BarangM->get_data_klasifikasi_barang()->result();
		$this->data['data_diri'] = $data_diri; //get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('pengguna/klasifikasi_barang_content', $this->data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}

	public function ajukan_barang(){ //halaman untuk pengajuan RAB(mansarpras )
		// menampilkan daftar barang untuk dijadikan RAB dan data RAB
		$data['menu'] = $this->data_menu;
		$id_pengguna = $this->session->userdata('id_pengguna');
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = " Daftar Pengajuan Barang | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$this->data['data_ajukan_barang'] = $this->BarangM->get_ajukan_barang()->result();
		$kode_unit = $this->session->userdata('kode_unit');
		$this->data['data_pimpinan'] = $this->BarangM->get_id_pimpinan($kode_unit)->result()[0];
		$this->data['pilihan_barang'] = $this->BarangM->get_pilihan_barang()->result();
		$this->data['pilihan_barang_tambah'] = $this->BarangM->get_pilihan_barang()->result();
		$this->data['BarangM'] = $this->BarangM;
		$this->data['data_diri'] = $data_diri; //get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('pengguna/ajukan_barang_content', $this->data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}

	public function ajukan_RAB(){ //halaman untuk pengajuan RAB(mansarpras )
		// menampilkan daftar barang untuk dijadikan RAB dan data RAB
		$data['menu'] = $this->data_menu;
		$id_pengguna = $this->session->userdata('id_pengguna');
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Pengajuan RAB | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$this->data['data_barang_setuju'] = $this->BarangM->get_barang_setuju()->result();
		$this->data['pengajuan'] = $this->BarangM->get_pengajuan_rab()->result();
		$this->data['BarangM'] = $this->BarangM;
		$this->data['data_diri'] = $data_diri; //get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('pengguna/ajukan_RAB_content', $this->data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}

	public function buat_rab(){ //halaman untuk pengajuan RAB(mansarpras )
		// menampilkan daftar barang untuk dijadikan RAB dan data RAB
		$data['menu'] = $this->data_menu;
		$id_pengguna = $this->session->userdata('id_pengguna');
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Pengajuan RAB | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$this->data['data_pengajuan_all'] = $this->BarangM->data_rab_all()->result();
		$this->data['BarangM'] = $this->BarangM;
		$this->data['data_diri'] = $data_diri; //get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('pengguna/data_rab_content', $this->data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}

	public function persetujuan_rab(){ //halaman untuk pengajuan RAB(mansarpras )
		// menampilkan daftar barang untuk dijadikan RAB dan data RAB
		$data['menu'] = $this->data_menu;
		$id_pengguna = $this->session->userdata('id_pengguna');
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Persetujuan RAB | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$this->data['rab'] = $this->BarangM->get_rab()->result();
		$this->data['BarangM'] = $this->BarangM;
		$this->data['data_diri'] = $data_diri; //get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('pengguna/persetujuan_rab_content', $this->data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}

	
	// ================================FUNGSI DI HALAMAN=====================

	public function detail_progress_barang($id){ //menampilkan modal dengan isi dari detail progres barang.php
		$data['detail_progress_barang']	= $this->BarangM->get_detail_progress_barang_by_id($id)->result();
		$this->load->view('penggunaB/detail_progress_barang', $data);
	}

	public function ubah_barang($kode_barang){ //menampilkan modal dengan isi dari ubah_barang.php
		$data['ubah_barang']          = $this->BarangM->get_barang_by_kode_barang($kode_barang)->result()[0];
		$data['pilihan_jenis_barang'] = $this->BarangM->get_pilihan_jenis_barang($kode_barang)->result();
		echo json_encode($data);
	}

	public function getListAjax() 
	{
		$data = $this->db->get('jenis_barang')->result();
		echo json_encode($data);
	}

	public function ubah_data_barang(){ //update data barang
		$id 				= $_POST['id'];
		$nama_barang 		= $_POST['nama_barang'];
		$kode_jenis_barang  = $_POST['kode_jenis_barang'];
		$data = array(
			'nama_barang'       => $nama_barang,
			'kode_jenis_barang' => $kode_jenis_barang
		);
		$this->BarangM->ubah_data_barang($id,$data);
		redirect('BarangC/kelola_barang');
	}

	public function update_klasifikasi($kode_jenis_barang, $kode_barang){ //edit data diri
		$kode_barang     	= $kode_barang;
		$kode_jenis_barang  = $kode_jenis_barang;

		$data = array(
			'kode_barang'     	=> $kode_barang,
			'kode_jenis_barang' => $kode_jenis_barang
		);
		$this->BarangM->update_klasifikasi_barang($kode_barang,$data);
		$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
		redirect('BarangC/klasifikasi_barang');
	}

	public function setuju($kode){ //mengubah status pengajuan menjadi diajukan karena barang disetujui untuk diajukan
		if($this->BarangM->setuju($kode)){
			$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
			redirect('BarangC/ajukan_RAB');
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');	
			redirect('BarangC/ajukan_RAB');
		}
	}

	public function tunda($kode){ //mengubah status pengajuan menjadi tunda karena barang belum bisa diajukan untuk diajukan
		if($this->BarangM->tunda($kode)){
			$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
			redirect('BarangC/ajukan_RAB');
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect('BarangC/ajukan_RAB');
		}
	}

	// =================================POST+POST+POST+POST=================================



	public function post_tambah_barang(){ //fungsi untuk tambah barang
		$this->form_validation->set_rules('nama_barang', 'Nama Barang','required');
		$this->form_validation->set_rules('kode_jenis_barang', 'Jenis Barang','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->kelola_barang();
			//redirect ke halaman kelola barang
		}else{
			$nama_barang 		= $_POST['nama_barang'];
			$kode_jenis_barang	= $_POST['kode_jenis_barang'];
			$data_pengguna		= array(
				'nama_barang'		=> $nama_barang,
				'kode_jenis_barang'	=> $kode_jenis_barang
			);
			if($this->BarangM->insert_tambah_barang($data_pengguna)){
				$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
				redirect('BarangC/kelola_barang');
			}else{
				$this->session->set_flashdata('error','Data Barang tidak berhasil ditambahkan');
				redirect('BarangC/kelola_barang');
			}
		}

	}

	public function post_persetujuan_barang(){ //fungsi untuk tambah progress persetujuan barang
		$this->form_validation->set_rules('id_pengguna', 'Id Pengguna','required');
		$this->form_validation->set_rules('kode_fk', 'Kode FK','required');
		$this->form_validation->set_rules('kode_nama_progress', 'Kode Nama Progress','required');
		$this->form_validation->set_rules('komentar', 'Komentar','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Data Persetujuan anda tidak berhasil ditambahkan1 ');
			redirect('BarangC/persetujuan_barang') ;
			//redirect ke halaman pengajuan barang
		}else{
			
			$id_pengguna 		= $_POST['id_pengguna'];
			$kode_fk 		    = $_POST['kode_fk'];
			$kode_nama_progress = $_POST['kode_nama_progress'];
			$komentar           = $_POST['komentar'];
			$jenis_progress 	= "barang";

			$format_waktu 		= "%H:%i";
			$waktu_progress 	= mdate($format_waktu);

			$format_tgl 		= "%Y-%m-%d";
			$tgl_progress 		= mdate($format_tgl);

			$kode_jabatan_unit 	= $_POST['kode_jabatan_unit'];

			$data_progress		= array(
				'id_pengguna'			=> $id_pengguna,
				'kode_fk'				=> $kode_fk,
				'kode_nama_progress'	=> $kode_nama_progress,
				'komentar'				=> $komentar,
				'jenis_progress'		=> $jenis_progress,
				'tgl_progress'			=> $tgl_progress,
				'waktu_progress'		=> $waktu_progress,
				'kode_jabatan_unit	' 	=> $kode_jabatan_unit

			);

			if($kode_nama_progress == '1'){
				$persetujuan = 'proses';
			}elseif ($kode_nama_progress == "2") {
				$persetujuan = 'tolak';
			}
			
			$data = array(
				'status_pengajuan' => $persetujuan
			);
			if($this->BarangM->insert_progress($data_progress)){
				$this->BarangM->update_persetujuan($data,$kode_fk);
				$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
				redirect('BarangC/persetujuan_barang');
			}else{
				$this->session->set_flashdata('error','Data Barang tidak berhasil ditambahkan2');
				redirect('BarangC/persetujuan_barang');
			}

		}

	}	

	public function post_tambah_ajukan_barang(){ //fungsi untuk tambah pengajuan barang
		$this->form_validation->set_rules('id_pengguna', 'Id Pengguna','required');
		$this->form_validation->set_rules('pimpinan', 'ID Pimpinan','required');
		$this->form_validation->set_rules('kode_barang', 'Nama Barang','required');
		$this->form_validation->set_rules('tgl_item_pengajuan', 'Tanggal Item Pengajuan','required');
		$this->form_validation->set_rules('nama_item_pengajuan', 'Nama Item Pengajuan','required');
		$this->form_validation->set_rules('url', 'URL','required');
		$this->form_validation->set_rules('harga_satuan', 'Harga Satuan','required');
		$this->form_validation->set_rules('merk', 'Merk','required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Barang','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 1');
			redirect('BarangC/ajukan_barang') ;
			//redirect ke halaman pengajuan barang
		}else{
			$upload = $this->BarangM->upload(); // lakukan upload file dengan memanggil function upload yang ada di BarangMprasM.php
			$id_pengguna 		= $_POST['id_pengguna'];
			$kode_barang 		= $_POST['kode_barang'];
			$tgl_item_pengajuan = $_POST['tgl_item_pengajuan'];
			$nama_item_pengajuan= $_POST['nama_item_pengajuan'];
			$url 				= $_POST['url'];
			$harga_satuan 		= $_POST['harga_satuan'];
			$merk 				= $_POST['merk'];
			$jumlah 			= $_POST['jumlah'];
			$pimpinan			= $_POST['pimpinan'];
			$kode_jabatan_unit 	= $_POST['kode_jabatan_unit'];

			$baru = "baru"; //buat status pengajuan berstatus baru ketika baru dibuat

			$data_pengguna		= array(
				'id_pengguna'			=> $id_pengguna,
				'kode_barang'			=> $kode_barang,
				'status_pengajuan'		=> $baru,
				'tgl_item_pengajuan'	=> $tgl_item_pengajuan,
				'nama_item_pengajuan'	=> $nama_item_pengajuan,
				'url'					=> $url,
				'harga_satuan'			=> $harga_satuan,
				'merk'					=> $merk,
				'jumlah'				=> $jumlah,
				'file_gambar' 			=> $upload['file']['file_name'],
				'pimpinan'				=> $pimpinan

			);
			if($upload['result'] == "success"){ // Jika proses upload sukses
				$insert_id = $this->BarangM->insert_pengajuan_barang($data_pengguna);  // untuk memasukkan data ke tabel item_pengajuan

				if($insert_id){ // Jika proses insert ke item barang sukses

					$format_tgl 	= "%Y-%m-%d";
					$tgl_progress 	= mdate($format_tgl);
					$format_waktu 	= "%H:%i:%s";
					$waktu_progress	= mdate($format_waktu);
					$kode_nama_progress	= "1";
					$komentar			= "insert otomatis";
					$jenis_progress		= "barang";

					$data = array(
						'kode_jabatan_unit	' 	=> $kode_jabatan_unit,
						'id_pengguna' 			=> $id_pengguna,
						'kode_fk'				=> $insert_id,
						'kode_nama_progress' 	=> $kode_nama_progress,
						'komentar'				=> $komentar,
						'jenis_progress'		=> $jenis_progress,
						'tgl_progress'			=> $tgl_progress,
						'waktu_progress'		=> $waktu_progress

					);
					if($kode_jabatan_unit == $pimpinan){
				$this->BarangM->insert_progress($data); //insert progress langsung ketika mengajukan kegiatan untuk manajer, kepala, dan pimpinan yang lain
			}
		}else{ 
			$this->session->set_flashdata('error','Data Pengajuan Pengajuan Barang anda tidak berhasil ditambahkan');
			redirect('BarangC/ajukan_barang');
		}

		$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
				redirect('BarangC/ajukan_barang');//redirect ke halaman pengajuan barang
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
				$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan ');
				redirect('BarangC/ajukan_barang');//redirect ke halaman pengajuan barang
			}

		}

	}

	public function post_tambah_barang_baru(){ //fungsi untuk tambah barang baru
		$this->form_validation->set_rules('nama_barang', 'Nama Barang','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->ajukan_barang();
			//redirect ke halaman ajukan barang
		}else{
			$nama_barang 		= $_POST['nama_barang'];
			$kode_jenis_barang  = "3";
			$data_pengguna		= array(
				'nama_barang'		=> $nama_barang,
				'kode_jenis_barang' => $kode_jenis_barang
			);
			if($this->BarangM->insert_tambah_barang($data_pengguna)){
				$this->session->set_flashdata('sukses','Data Barang Baru berhasil ditambahkan');
				redirect('BarangC/ajukan_barang');
			}else{
				$this->session->set_flashdata('error','Data Barang Baru tidak berhasil ditambahkan');
				redirect('BarangC/ajukan_barang');
			}
		}

	}
	
	function upload_image(){
		$id_pengguna=$this->input->post('id_pengguna');

        $config['upload_path'] = './assets/image/profil'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = FALSE; //Enkripsi nama yang terupload
        $config['overwrite'] = TRUE;
        $new_name = md5($id_pengguna);
        $config['file_name'] = $new_name;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if(!empty($_FILES['foto_profil']['name'])){

        	if ($this->upload->do_upload('foto_profil')){
        		$gbr = $this->upload->data();
                //Compress Image
        		$config['image_library']='gd2';
        		$config['source_image']='./assets/image/profil/'.$gbr['file_name'];
        		$config['create_thumb']= FALSE;
        		$config['maintain_ratio']= FALSE;
        		$config['quality']= '50%';
        		$config['width']= 100;
        		$config['height']= 100;
        		$config['new_image']= './assets/image/profil/'.$gbr['file_name'];
        		$this->load->library('image_lib', $config);
        		// $this->image_lib->crop();
        		$this->image_lib->resize();

        		$gambar=$gbr['file_name'];
        		$this->BarangM->simpan_upload($id_pengguna,$gambar);
        		$this->session->set_flashdata('sukses','Foto berhasil diunggah');
        		redirect('BarangC/data_diri');
        		// echo "Image berhasil diupload";
        	}

        }else{
        	$this->session->set_flashdata('error','Foto tidak berhasil diunggah');
        	redirect('BarangC/data_diri');
        }

    }

	public function post_persetujuan_tersedia($kode_item_pengajuan, $kode_jabatan_unit){ // untuk mengubah status persediaan dan pengajuan jd selese serta tambah progres
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];

		

		$data = array(
			'status_pengajuan' => 'selesai',
			'status_persediaan' => 'tersedia'
		);

		if($this->BarangM->update_persetujuan_tersedia($data, $kode_item_pengajuan)){
			$id_pengguna 		= $data_diri->id_pengguna;
			$kode_fk 		    = $kode_item_pengajuan;
			$kode_nama_progress = "1";
			$komentar           = "barang tersedia";
			$jenis_progress 	= "barang";

			$format_waktu 		= "%H:%i";
			$waktu_progress 	= mdate($format_waktu);

			$format_tgl 		= "%Y-%m-%d";
			$tgl_progress 		= mdate($format_tgl);


			$data_progress		= array(
				'kode_jabatan_unit	' 	=> $kode_jabatan_unit,
				'id_pengguna'			=> $id_pengguna,
				'kode_fk'				=> $kode_fk,
				'kode_nama_progress'	=> $kode_nama_progress,
				'komentar'				=> $komentar,
				'jenis_progress'		=> $jenis_progress,
				'tgl_progress'			=> $tgl_progress,
				'waktu_progress'		=> $waktu_progress

			);
			$this->BarangM->insert_progress($data_progress);
			$this->session->set_flashdata('sukses','Sukses Menyetujui Barang');
			redirect('BarangC/persetujuan_barang');
		}else{
			$this->session->set_flashdata('error','Data Barang tidak berhasil ditambahkan2');
			redirect('BarangC/persetujuan_barang');
		}

	}


	public function post_ajukan_rab(){ //fungsi untuk tambah pengajuan barang
		$this->form_validation->set_rules('nama_pengajuan', 'Nama Pengajuan','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Data Barang Baru tidak berhasil ditambahkan 0');
			$this->ajukan_RAB();
	// 		//redirect ke halaman ajukan RAB
		}else{
			$upload = $this->BarangM->upload_file(); // lakukan upload file dengan memanggil function upload yang ada di BarangMprasM.php
			$nama_pengajuan 		= $_POST['nama_pengajuan'];
			$data_rab			= array(
				'nama_pengajuan'	 => $nama_pengajuan,
				'file_rab'  		 => $upload['file']['file_name']
			);

			if($upload['result'] == "success"){ // Jika proses upload sukses
				$insert_id = $this->BarangM->insert_pengajuan_rab($data_rab);
				if($insert_id){

					$kode_pengajuan = $insert_id;
					$status_pengajuan = 'pengajuan';

					$data_update = array(
						'kode_pengajuan' => $kode_pengajuan
					);
					$update_fk = $this->BarangM->update_fk($status_pengajuan, $data_update);
					if($update_fk){
						$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
						redirect('BarangC/ajukan_RAB');//redirect ke halaman pengajuan barang
					}else{
						$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
						$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan ');
						redirect('BarangC/ajukan_RAB');//redirect ke halaman pengajuan barang	
					}

				}else{
					$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
					$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan ');
				redirect('BarangC/ajukan_RAB');//redirect ke halaman pengajuan barang
			}
			
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
				$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan ');
				redirect('BarangC/ajukan_RAB');//redirect ke halaman pengajuan barang
			}

		}

	}

}