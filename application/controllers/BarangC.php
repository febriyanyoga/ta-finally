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
		if(in_array(5, $this->data_menu)){
			$data['menu'] = $this->data_menu;
			$id_pengguna = $this->session->userdata('id_pengguna');
			$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
			$data['title'] = "Persetujuan Item Pengajuan | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
			$this->data['data_persetujuan_barang'] = $this->BarangM->get_data_item_pengajuan()->result();
			$this->data['BarangM'] = $this->BarangM ;
			$this->data['cek_menu'] = $this->data_menu;
			$this->data['data_diri'] = $data_diri; //get data diri buat nampilin nama di pjok kanan
			$data['body'] = $this->load->view('pengguna/persetujuan_barang_content', $this->data, true) ;
			$this->load->view('pengguna/index_template', $data);
		}else{
			redirect('LoginC/logout');
		}
	}

	public function persetujuan_barang_staf(){ //halaman persetujuan barang staf 
		// menampilkan pengajuan item barang yang telah di beri porgress oleh pimpinan 
		if(in_array(17, $this->data_menu)){
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
		}else{
			redirect('LoginC/logout');
		}
	}

	public function kelola_barang(){ //halaman kelola barang (mansarpras & staf sarpras)
		// menampilkan daftar semua barang
		if(in_array(12, $this->data_menu)){
			$data['menu'] = $this->data_menu;
			$id_pengguna = $this->session->userdata('id_pengguna');
			$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
			$data['title'] = "Kelola Barang | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
			$this->data['data_barang'] = $this->BarangM->get_barang()->result();
			$this->data['jenis_barang'] = $this->BarangM->get_pilihan_jenis_barang()->result();
			$this->data['data_diri'] = $data_diri; //get data diri buat nampilin nama di pjok kanan
			$data['body'] = $this->load->view('pengguna/barang_content', $this->data, true) ;
			$this->load->view('pengguna/index_template', $data);
		}else{
			redirect('LoginC/logout');
		}
	}

	public function klasifikasi_barang(){ //halaman klasifikasi barang (mansarpras & staf sarpras)
		// menampilkan daftar barang yang belum terklasifikasi
		if(in_array(13, $this->data_menu)){
			$data['menu'] = $this->data_menu;
			$id_pengguna = $this->session->userdata('id_pengguna');
			$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
			$data['title'] = "Klasifikasi Barang | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
			$this->data['data_klasifikasi'] = $this->BarangM->get_data_klasifikasi_barang()->result();
			$this->data['data_diri'] = $data_diri; //get data diri buat nampilin nama di pjok kanan
			$data['body'] = $this->load->view('pengguna/klasifikasi_barang_content', $this->data, true) ;
			$this->load->view('pengguna/index_template', $data);
		}else{
			redirect('LoginC/logout');
		}
	}

	public function ajukan_barang(){ //halaman untuk pengajuan RAB(mansarpras )
		// menampilkan daftar barang untuk dijadikan RAB dan data RAB
		if(in_array(9, $this->data_menu)){
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

			$data['nama_barang'] 		= '';
			$data['nama_item_pengajuan']= '';
			$data['url']				= '';
			$data['harga_satuan']		= '';			
			$data['merk']				= '';
			$data['jumlah']				= '';
			$data['kosong']				= '';

			$data['body'] = $this->load->view('pengguna/ajukan_barang_content', $this->data, true) ;
			$this->load->view('pengguna/index_template', $data);
		}else{
			redirect('LoginC/logout');
		}
	}

	public function ajukan_RAB(){ //halaman untuk pengajuan RAB(mansarpras )
		// menampilkan daftar barang untuk dijadikan RAB dan data RAB
		if(in_array(8, $this->data_menu)){
			$data['menu'] = $this->data_menu;
			$id_pengguna = $this->session->userdata('id_pengguna');
			$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
			$data['title'] = "Pengajuan RAB | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
			$this->data['data_barang_setuju'] = $this->BarangM->get_barang_setuju()->result();
			$this->data['data_barang_rab'] = $this->BarangM->get_barang_rab()->result();
			$this->data['pengajuan'] = $this->BarangM->get_pengajuan_rab()->result();
			$this->data['BarangM'] = $this->BarangM;
			$this->data['data_diri'] = $data_diri; //get data diri buat nampilin nama di pjok kanan
			$data['body'] = $this->load->view('pengguna/ajukan_RAB_content', $this->data, true) ;
			$this->load->view('pengguna/index_template', $data);
		}else{
			redirect('LoginC/logout');
		}
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
		if(in_array(4, $this->data_menu)){
			$data['menu'] = $this->data_menu;
			$id_pengguna = $this->session->userdata('id_pengguna');
			$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
			$data['title'] = "Persetujuan RAB | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
			$this->data['rab'] = $this->BarangM->get_rab_diajukan()->result();
			$this->data['BarangM'] = $this->BarangM;
			$this->data['data_diri'] = $data_diri; //get data diri buat nampilin nama di pjok kanan
			$data['body'] = $this->load->view('pengguna/persetujuan_rab_content', $this->data, true) ;
			$this->load->view('pengguna/index_template', $data);
		}else{
			redirect('LoginC/logout');
		}
	}

	public function status_pengajuan_barang(){ //halaman untuk tambah progress lanjutan item_pengajuan
		// menampilkan daftar barang untuk diberikan progress lanjutan
		if(in_array(18, $this->data_menu)){
			$data['menu'] = $this->data_menu;
			$id_pengguna = $this->session->userdata('id_pengguna');
			$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
			$data['title'] = "Status Pengajuan Barang | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
			$this->data['item_barang_disetujui'] = $this->BarangM->get_barang_disetujui()->result();
			$this->data['pilihan_progress'] = $this->BarangM->get_pilihan_progress()->result();
			$this->data['BarangM'] = $this->BarangM;
			$this->data['data_diri'] = $data_diri; //get data diri buat nampilin nama di pjok kanan
			$data['body'] = $this->load->view('pengguna/status_pengajuan_barang_content', $this->data, true) ;
			$this->load->view('pengguna/index_template', $data);
		}else{
			redirect('LoginC/logout');
		}
	}

	
	// ================================FUNGSI DI HALAMAN=====================

	public function detail_progress_barang($id){ //menampilkan modal dengan isi dari detail progres barang.php
		$data['detail_progress_barang']	= $this->BarangM->get_detail_progress_barang_by_id($id)->result();
		$this->load->view('pengguna/detail_progress_barang', $data);
	}

	public function detail_progress_rab($id){ //menampilkan modal dengan isi dari detail progres rab.php
		$data['detail_progress_rab']	= $this->BarangM->get_detail_progress_rab_by_id($id)->result();
		$this->load->view('pengguna/detail_progress_rab', $data);
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
		redirect_back(); //kembali ke halaman sebelumnya -> helper
	}

	public function setuju($kode){ //mengubah status pengajuan menjadi diajukan karena barang disetujui untuk diajukan
		if($this->BarangM->setuju($kode)){
			$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
			redirect_back();
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');	
			redirect_back();
		}
	}


	public function update_setuju()
	{
		$kode_item_pengajuan = $this->input->POST('kode_item_pengajuan');
		$status_pengajuan = $this->input->POST('status_pengajuan');
		$data = array(
			'kode_item_pengajuan' => $kode_item_pengajuan,
			'status_pengajuan' => $status_pengajuan
		);
		echo $kode_item_pengajuan;
		echo $status_pengajuan;
		$this->db->where('kode_item_pengajuan', $kode_item_pengajuan);
		$query = $this->db->update('item_pengajuan', $data);
		if($query){
			echo json_encode(array("status" => TRUE));
		}
	}

	public function tunda($kode){ //mengubah status pengajuan menjadi tunda karena barang belum bisa diajukan untuk diajukan
		if($this->BarangM->tunda($kode)){
			$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
			redirect_back();
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back();
		}
	}

	public function ulang($kode){ //mengubah status pengajuan menjadi proses seperti awal
		if($this->BarangM->ulang($kode)){
			$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
			redirect_back();
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back();
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
			redirect_back() ;
			//redirect ke halaman pengajuan barang
		}else{
			
			$id_pengguna 		= $_POST['id_pengguna'];
			$kode_fk 		    = $_POST['kode_fk'];
			$kode_nama_progress = $_POST['kode_nama_progress'];
			$komentar           = $_POST['komentar'];
			$jenis_progress 	= $_POST['jenis_progress'];

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
				redirect_back();
			}else{
				$this->session->set_flashdata('error','Data Barang tidak berhasil ditambahkan2');
				redirect_back();
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
		
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 1');
			redirect('BarangC/ajukan_barang') ;
			//redirect ke halaman pengajuan barang
		}else{
			$id_pengguna 		= $_POST['id_pengguna'];
			$kode_barang 		= $_POST['kode_barang'];
			$tgl_item_pengajuan = $_POST['tgl_item_pengajuan'];
			$nama_item_pengajuan= $_POST['nama_item_pengajuan'];
			$url 				= $_POST['url'];
			$harga_satuan 		= $_POST['harga_satuan'];
			$harga_satuan		= str_replace('.', '', $harga_satuan);
			$harga_satuan		= str_replace('Rp', '', $harga_satuan);
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
				'pimpinan'				=> $pimpinan

			);
			$insert_id = $this->BarangM->insert_pengajuan_barang($data_pengguna);  // untuk memasukkan data ke tabel item_pengajuan
			if($insert_id){ // Jika proses insert data item_pengajuan sukses
				
				$upload = $this->BarangM->upload($insert_id); // lakukan upload file dengan memanggil function upload yang ada di BarangM.php

				if($upload['result'] == "success"){ // Jika proses insert ke item barang sukses

					$file 				= array(
						'file_gambar'	=> $upload['file']['file_name']
					);

					$update_file = $this->BarangM->update_nama_file($insert_id, $file);
					if($update_file = TRUE){
						$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
						redirect('BarangC/ajukan_barang');//redirect ke halaman pengajuan barang
					}else{
						$this->session->set_flashdata('error','Data Pengajuan Pengajuan Barang anda tidak berhasil ditambahkan');
						redirect('BarangC/ajukan_barang');
					}

				}else{ 
					$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
					$this->session->set_flashdata('error','Data Pengajuan Pengajuan Barang anda tidak berhasil ditambahkan');
					redirect('BarangC/ajukan_barang');
				}

				$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
			redirect('BarangC/ajukan_barang');//redirect ke halaman pengajuan barang

			}else{ // Jika proses upload gagal
				$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan ');
				redirect('BarangC/ajukan_barang');//redirect ke halaman pengajuan barang
			}

		}
	}

	public function post_ajukan_rab(){ //fungsi untuk tambah pengajuan barang / RAB
		$this->form_validation->set_rules('nama_pengajuan', 'Nama Pengajuan','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Data Barang Baru tidak berhasil ditambahkan 00');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$nama_pengajuan 		= $_POST['nama_pengajuan'];
			$data_rab			= array(
				'nama_pengajuan'	 => $nama_pengajuan
			);
			$insert_id = $this->BarangM->insert_pengajuan_rab($data_rab);
			if($insert_id){ // Jika proses insert sukses
				
				$upload = $this->BarangM->upload_file($insert_id); // lakukan upload file dengan memanggil function upload yang ada di BarangM.php

				if($upload['result'] == "success"){

					$kode_pengajuan = $insert_id;
					$status_pengajuan = 'pengajuan';
					$status_baru = 'pengajuanRAB';
					$file 				= array(
						'file_rab'	=> $upload['file']['file_name']
					);

					$data_update = array(
						'kode_pengajuan' => $kode_pengajuan,
						'status_pengajuan'=> $status_baru
					);
					$update_file = $this->BarangM->update_nama_file_rab($kode_pengajuan, $file);
					if($update_file = TRUE){
						$update_fk = $this->BarangM->update_fk($status_pengajuan, $data_update);
						if($update_fk){
							$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
							redirect_back(); //kembali ke halaman sebelumnya -> helper
						}else{
							$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 0');
							redirect_back(); //kembali ke halaman sebelumnya -> helper
						}
					}else{
						$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 1');
						redirect_back(); //kembali ke halaman sebelumnya -> helper
					}
				}else{
					$this->BarangM->delete_data_rab_gagal($insert_id);
					$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
					$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 2');
					redirect_back(); //kembali ke halaman sebelumnya -> helper
				}

			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
				$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 3');
				redirect_back(); //kembali ke halaman sebelumnya -> helper
			}

		}

	}

	public function post_ubah_ajukan_barang(){ //fungsi untuk tambah pengajuan barang
		$this->form_validation->set_rules('id_pengguna', 'Id Pengguna','required');
		$this->form_validation->set_rules('kode_item_pengajuan', 'Kode Item Pengajuan','required');
		$this->form_validation->set_rules('kode_barang', 'Nama Barang','required');
		$this->form_validation->set_rules('tgl_item_pengajuan', 'Tanggal Item Pengajuan','required');
		$this->form_validation->set_rules('nama_item_pengajuan', 'Nama Item Pengajuan','required');
		$this->form_validation->set_rules('url', 'URL','required');
		$this->form_validation->set_rules('harga_satuan', 'Harga Satuan','required');
		$this->form_validation->set_rules('merk', 'Merk','required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Barang','required');
		
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 1');
			redirect('BarangC/ajukan_barang') ;
			//redirect ke halaman pengajuan barang
		}else{
			$id_pengguna 		= $_POST['id_pengguna'];
			$kode_item_pengajuan= $_POST['kode_item_pengajuan'];
			$kode_barang 		= $_POST['kode_barang'];
			$tgl_item_pengajuan = $_POST['tgl_item_pengajuan'];
			$nama_item_pengajuan= $_POST['nama_item_pengajuan'];
			$url 				= $_POST['url'];
			$harga_satuan 		= $_POST['harga_satuan'];
			$harga_satuan		= str_replace('.', '', $harga_satuan);
			$harga_satuan		= str_replace('Rp', '', $harga_satuan);
			$merk 				= $_POST['merk'];
			$jumlah 			= $_POST['jumlah'];

			$baru = "baru"; //buat status pengajuan berstatus baru ketika baru dibuat
			$upload = $this->BarangM->upload($kode_item_pengajuan); // lakukan upload file dengan memanggil function upload yang ada di BarangM.php
			$data_update		= array(
				'id_pengguna'			=> $id_pengguna,
				'kode_barang'			=> $kode_barang,
				'status_pengajuan'		=> $baru,
				'tgl_item_pengajuan'	=> $tgl_item_pengajuan,
				'nama_item_pengajuan'	=> $nama_item_pengajuan,
				'url'					=> $url,
				'harga_satuan'			=> $harga_satuan,
				'merk'					=> $merk,
				'jumlah'				=> $jumlah,
				'file_gambar' 			=> $upload['file']['file_name']

			);

			$data_update2		= array(
				'id_pengguna'			=> $id_pengguna,
				'kode_barang'			=> $kode_barang,
				'status_pengajuan'		=> $baru,
				'tgl_item_pengajuan'	=> $tgl_item_pengajuan,
				'nama_item_pengajuan'	=> $nama_item_pengajuan,
				'url'					=> $url,
				'harga_satuan'			=> $harga_satuan,
				'merk'					=> $merk,
				'jumlah'				=> $jumlah

			);

			if($upload['result'] == "success"){ // Jika proses insert data item_pengajuan sukses
				if($this->BarangM->update_item_pengajuan($kode_item_pengajuan, $data_update)){ // Jika proses insert ke item barang sukses
					$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
					redirect('BarangC/ajukan_barang');//redirect ke halaman pengajuan barang
				}else{ 
					$this->session->set_flashdata('error','Data Pengajuan Pengajuan Barang anda tidak berhasil ditambahkan 2');
					redirect('BarangC/ajukan_barang');
				}
			}else{ // Jika proses upload gagal
				if($this->BarangM->update_item_pengajuan($kode_item_pengajuan, $data_update2)){ // Jika proses insert ke item barang sukses
					$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
					redirect('BarangC/ajukan_barang');//redirect ke halaman pengajuan barang
				}else{ 
					$this->session->set_flashdata('error','Data Pengajuan Pengajuan Barang anda tidak berhasil ditambahkan 2');
					redirect('BarangC/ajukan_barang');
				}
			}

		}
	}

	public function post_ubah_ajukan_rab(){ //fungsi untuk tambah pengajuan barang
		$this->form_validation->set_rules('nama_pengajuan', 'Nama Pengajuan','required');
		$this->form_validation->set_rules('kode_pengajuan', 'Kode Pengajuan','required');
		$this->form_validation->set_rules('status_pengajuan_rab', 'Status Pengajuan RAB','required');
		$this->form_validation->set_rules('pengajuan_ke', 'Pengajuan RAB ke','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Data Barang Baru tidak berhasil ditambahkan 00');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$nama_pengajuan 		= $_POST['nama_pengajuan'];
			$kode_pengajuan 		= $_POST['kode_pengajuan'];
			$status_baru		 	= 'baru';

			$upload = $this->BarangM->upload_file($kode_pengajuan); // lakukan upload file dengan memanggil function upload yang ada di BarangM.php

			$data_rab				= array(
				'kode_pengajuan'	 	=> $kode_pengajuan,
				'nama_pengajuan'	 	=> $nama_pengajuan,
				'status_pengajuan_rab'	=> $status_baru,
				'file_rab'			 	=> $upload['file']['file_name']
			);

			$data_rab1				= array(
				'kode_pengajuan'	 	=> $kode_pengajuan,
				'nama_pengajuan'	 	=> $nama_pengajuan,
				'status_pengajuan_rab'	=> $status_baru
			);
			
			if($upload['result'] == "success"){ // Jika proses update sukses
				if($this->BarangM->update_ajukan_rab($data_rab, $kode_pengajuan)){ // jika update rab
					if($progress = $this->BarangM->cek_progress_rab($kode_pengajuan)->result()){ //ngecek rab sudah pernah diajukan belum
						if(empty($progress)){ //klw belum maka tidak update
							$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan 1');
							redirect_back(); //kembali ke halaman sebelumnya -> helper
						}else{ //klw udah, update status pengajuan jadi pengajuanRAB
							$status_baru = 'pengajuanRAB';
							$data_update = array(
								'status_pengajuan'=> $status_baru
							);
							$update_fk = $this->BarangM->update_fk_lanjutan($data_update, $kode_pengajuan);
							if($update_fk){ //update fk berhasil
								$status_pengajuan_rab = $_POST['status_pengajuan_rab'];
								$pengajuan_ke		  = $_POST['pengajuan_ke'];
								if($status_pengajuan_rab == "ditolak"){ //jika status pengajuan rab ditolak ketika mau ngedit pertama kali setelah ditolak
									$pengajuan_ke++;
									$data = array(
										'pengajuan_ke' => $pengajuan_ke
									);
									if($this->BarangM->update_ajukan_rab($data, $kode_pengajuan)){ //ketika berhasil update pengajuan ke
										$jenis_progress = 'rab_lama';
										$data_progress  = array(
											'jenis_progress' => $jenis_progress
										);
										if($this->BarangM->update_progress_rab($data_progress, $kode_pengajuan)){ //jika sukses update progress yang lama
											$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan 3');
											redirect_back(); //kembali ke halaman sebelumnya -> helper
										}else{ // jika gagal update progress yang lama
											$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 0');
											redirect_back(); //kembali ke halaman sebelumnya -> helper
										}
									}else{ //ketika gagal update pengajuan ke
										$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 0');
										redirect_back(); //kembali ke halaman sebelumnya -> helper
									}
								}else{ //ketika update bukan yang pertama kali setelah ditolak
									$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan 2');
									redirect_back(); //kembali ke halaman sebelumnya -> helper
								}
							}else{ //update fk gagal
								$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan ');
								redirect_back(); //kembali ke halaman sebelumnya -> helper
							}
						}
					}else{
						$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan 3');
						redirect_back(); //kembali ke halaman sebelumnya -> helper
					}
				}else{ //jika update gagal
					$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
					$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan ');
					redirect_back(); //kembali ke halaman sebelumnya -> helper
				}
			}else{ // Jika proses upload gagal
				if($this->BarangM->update_ajukan_rab($data_rab1, $kode_pengajuan)){ // jika update rab
					if($progress = $this->BarangM->cek_progress_rab($kode_pengajuan)->result()){ //ngecek rab sudah pernah diajukan belum
						if(empty($progress)){ //klw belum maka tidak update
							$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan 4');
							redirect_back(); //kembali ke halaman sebelumnya -> helper
						}else{ //klw udah, update status pengajuan jadi pengajuanRAB
							$status_baru = 'pengajuanRAB';
							$data_update = array(
								'status_pengajuan'=> $status_baru
							);
							$update_fk = $this->BarangM->update_fk_lanjutan($data_update, $kode_pengajuan);
							if($update_fk){ //update fk berhasil
								$status_pengajuan_rab = $_POST['status_pengajuan_rab'];
								$pengajuan_ke		  = $_POST['pengajuan_ke'];
								if($status_pengajuan_rab == "ditolak"){ //jika status pengajuan rab ditolak ketika mau ngedit pertama kali setelah ditolak
									$pengajuan_ke++;
									$data = array(
										'pengajuan_ke' => $pengajuan_ke
									);
									if($this->BarangM->update_ajukan_rab($data, $kode_pengajuan)){ //ketika berhasil update pengajuan ke
										$jenis_progress = 'rab_lama';
										$data_progress  = array(
											'jenis_progress' => $jenis_progress
										);
										if($this->BarangM->update_progress_rab($data_progress, $kode_pengajuan)){ //jika sukses update progress yang lama
											$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan 3');
											redirect_back(); //kembali ke halaman sebelumnya -> helper
										}else{ // jika gagal update progress yang lama
											$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 0');
											redirect_back(); //kembali ke halaman sebelumnya -> helper
										}
									}else{ //ketika gagal update pengajuan ke
										$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 0');
										redirect_back(); //kembali ke halaman sebelumnya -> helper
									}
								}else{ //ketika update bukan yang pertama kali setelah ditolak
									$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan 2');
									redirect_back(); //kembali ke halaman sebelumnya -> helper
								}
							}else{ //update fk gagal
								$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 0');
								redirect_back(); //kembali ke halaman sebelumnya -> helper
							}
						}
					}else{
						$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan 6');
						redirect_back(); //kembali ke halaman sebelumnya -> helper
					}
				}else{ //jika update gagal
					$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
					$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 3');
					redirect_back(); //kembali ke halaman sebelumnya -> helperz
				}
				
			}

		}

	}

	public function post_ubah_barang(){ //fungsi untuk mengubah barang
		$this->form_validation->set_rules('nama_barang', 'Nama Barang','required');
		$this->form_validation->set_rules('kode_barang', 'Kode Barang','required');
		$this->form_validation->set_rules('kode_jenis_barang', 'Kode Jenis Barang','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Data Barang Baru tidak berhasil ditambahkan 00');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$kode_barang 		= $_POST['kode_barang'];
			$nama_barang 		= $_POST['nama_barang'];
			$kode_jenis_barang 	= $_POST['kode_jenis_barang'];

			$data_barang				= array(
				'kode_barang'	 	=> $kode_barang,
				'nama_barang'	 	=> $nama_barang,
				'kode_jenis_barang'	=> $kode_jenis_barang,
			);
			
			if($this->BarangM->ubah_data_barang($kode_barang, $data_barang)){
				$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
				redirect_back(); //kembali ke halaman sebelumnya -> helper
			}else{
				$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan 1');
				redirect_back(); //kembali ke halaman sebelumnya -> helper
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

	public function post_persetujuan_rab(){ //fungsi untuk tambah progress persetujuan barang
		$this->form_validation->set_rules('id_pengguna', 'Id Pengguna','required');
		$this->form_validation->set_rules('kode_fk', 'Kode FK','required');
		$this->form_validation->set_rules('kode_nama_progress', 'Kode Nama Progress','required');
		$this->form_validation->set_rules('komentar', 'Komentar','required');
		$this->form_validation->set_rules('kode_jabatan_unit', 'Kode Jabatan Unit','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Data Persetujuan anda tidak berhasil ditambahkan1 ');
			redirect('BarangC/persetujuan_rab') ;
			//redirect ke halaman pengajuan barang
		}else{
			
			$id_pengguna 		= $_POST['id_pengguna'];
			$kode_fk 		    = $_POST['kode_fk'];
			$kode_nama_progress = $_POST['kode_nama_progress'];
			$komentar           = $_POST['komentar'];
			$jenis_progress 	= "rab";

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

			if($this->BarangM->insert_progress($data_progress)){
				if($kode_nama_progress == '1'){
					$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
                    $jabatan_unit_sendiri    = $data_diri->kode_jabatan_unit; //untuk mengetahui jabatan_unit_sendiri
                    $rank_sendiri   = $this->BarangM->cek_rank_rab_by_id_pegawai($jabatan_unit_sendiri)->ranking; //rank sendiri 
                    
                    if($rank_sendiri == 1){
                    	$status_pengajuan_rab = 'diterima';
                    	$status_pengajuan 	  = 'disetujui';
                    	$data1 = array(
                    		'status_pengajuan' => $status_pengajuan
                    	);
                    	$data2 = array(
                    		'status_pengajuan_rab' => $status_pengajuan_rab
                    	);
                    	if($this->BarangM->update_item_pengajuan_rab_terima($data1, $kode_fk)){
                    		if($this->BarangM->update_pengajuan_rab_terima($data2, $kode_fk)){
                    			$barang = $this->BarangM->get_data_item_pengajuan_by_rab($kode_fk)->result();
                    			foreach ($barang as $bar) {
                    				$email = $bar->email;
                    				$kode_pengajuan_bar = $bar->kode_item_pengajuan;
                    				$kode_nama_progress = '1';

                    				$this->sendemail($email,$kode_pengajuan_bar, $kode_nama_progress);
                    			}
                    			$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
                    			redirect('BarangC/persetujuan_rab');
                    		}else{
                    			$this->session->set_flashdata('error','Data Barang tidak berhasil ditambahkan2');
                    			redirect('BarangC/persetujuan_rab');
                    		}
                    	}else{
                    		$this->session->set_flashdata('error','Data Barang tidak berhasil ditambahkan2');
                    		redirect('BarangC/persetujuan_rab');
                    	}
                    }else{
                    	$status_pengajuan_rab = 'proses';
                    	$data2 = array(
                    		'status_pengajuan_rab' => $status_pengajuan_rab
                    	);
                    	if($this->BarangM->update_pengajuan_rab_terima($data2, $kode_fk)){
                    		$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
                    		redirect('BarangC/persetujuan_rab');
                    	}else{
                    		$this->session->set_flashdata('error','Data Barang tidak berhasil ditambahkan2');
                    		redirect('BarangC/persetujuan_rab');
                    	}
                    }

                }elseif ($kode_nama_progress == "2") {
                	$status_pengajuan_rab = 'ditolak';
                	$status_pengajuan 	  = 'pengajuan';

                	$data = array(
                		'status_pengajuan_rab' => $status_pengajuan_rab
                	);

                	$data1 = array(
                		'status_pengajuan' => $status_pengajuan
                	);
                	if($this->BarangM->update_persetujuan_rab_tolak($data, $kode_fk)){
                		$this->BarangM->update_item_pengajuan_rab_tolak($data1, $kode_fk);
                		$barang = $this->BarangM->get_data_item_pengajuan_by_rab($kode_fk)->result();
                		foreach ($barang as $bar) {
                			$email = $bar->email;
                			$kode_pengajuan_bar = $bar->kode_item_pengajuan;
                			$kode_nama_progress = '2';

                			sendemail($email,$kode_pengajuan_bar, $kode_nama_progress);
                		}
                		$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
                		redirect('BarangC/persetujuan_rab');
                	}else{
                		$this->session->set_flashdata('error','Data Barang tidak berhasil ditambahkan3');
                		redirect('BarangC/persetujuan_rab');
                	}
                }
            }else{
            	$this->session->set_flashdata('error','Data Barang tidak berhasil ditambahkan4');
            	redirect('BarangC/persetujuan_rab');
            }

        }

    }

    public function sendemail($email,$kode_item_pengajuan, $kode_nama_progress){   //kirim email konfirmasi
    	$from_mail  = 'dtedi.svugm@gmail.com';
    	$to         = $email;

    	$subject    = 'Pembaruan Status';

    	$barang 	= $this->BarangM->get_data_item_pengajuan_by_id($kode_item_pengajuan)->result()[0];
    	$total 		= (int)($barang->jumlah)*(int)($barang->harga_satuan);
    	$data       = array(
    		'nama_item_pengajuan'=> $barang->nama_item_pengajuan,
    		'nama_pengaju'=> $barang->nama ,
    		'tanggal_pengajuan'=> $barang->tgl_item_pengajuan ,
    		'total_biaya'=> $total ,
    		'kode_nama_progress' => $kode_nama_progress

    	);

    	$message    = $this->load->view('notifikasi_email_barang.php',$data,TRUE);
    // '<h1>'.$url.'</h1><span style="color: red;"> Departemen Teknik Elektro dan Informatika </span>';

    	$headers    = 'MIME-Version: 1.0' . "\r\n";
    	$headers    .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    	$headers    .= 'To:  <'.$to.'>' . "\r\n";
    	$headers    .= 'From: Departemen Teknik Elektro dan Informatika <'.$from_mail.'>' . "\r\n";

    	$sendtomail = mail($to, $subject, $message, $headers);
    }

	public function post_tambah_progress(){ //fungsi untuk tambah progress item pengajuan barang
		$this->form_validation->set_rules('id_pengguna', 'Id Pengguna','required');
		$this->form_validation->set_rules('kode_fk', 'Kode FK','required');
		$this->form_validation->set_rules('kode_nama_progress', 'Kode Nama Progress','required');
		$this->form_validation->set_rules('komentar', 'Komentar','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Data Persetujuan anda tidak berhasil ditambahkan1 ');
			redirect('BarangC/status_pengajuan_barang') ;
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
			
			if($this->BarangM->insert_progress($data_progress)){
				$this->session->set_flashdata('sukses','Data Barang berhasil ditambahkan');
				redirect('BarangC/status_pengajuan_barang');
			}else{
				$this->session->set_flashdata('error','Data Barang tidak berhasil ditambahkan2');
				redirect('BarangC/status_pengajuan_barang');
			}

		}

	}	
	
	public function hapus_pengajuan_barang($kode_item_pengajuan){//hapus pengajuan item pengajuan
		define('EXT', '.'.pathinfo(__FILE__, PATHINFO_EXTENSION));
		define('PUBPATH',str_replace(SELF,'',FCPATH));

		$this->db->where('kode_item_pengajuan',$kode_item_pengajuan);
		$file = $this->db->get('item_pengajuan')->row()->file_gambar;

		if(unlink(PUBPATH."assets/file_gambar/".$file)){
			if($this->BarangM->hapus_pengajuan_barang($kode_item_pengajuan)){
				$this->session->set_flashdata('sukses','Data anda berhasil dihapus');
				redirect_back();
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
				redirect_back();
			}
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
			redirect_back();
		}
	}

	function getBarangAjax()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}
		echo json_encode($this->BarangM->get_pilihan_barang()->result());
	}

	function insertBarangAjax()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}
		$nama_barang 		= $_POST['nama_barang'];
		$kode_jenis_barang  = "3";
		$data_pengguna		= array(
			'nama_barang'		=> $nama_barang,
			'kode_jenis_barang' => $kode_jenis_barang
		);
		$this->BarangM->insert_tambah_barang($data_pengguna);
		echo json_encode(true);
	}

}