<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class PenggunaC extends CI_Controller {

	var $data = array();
	private $data_menu;

	public function __construct(){
		parent::__construct();
		$this->load->model(['PenggunaM','BarangM','KegiatanM']);
		in_access(); //helper buat batasi akses login/session
		$data_akses_menu = $this->PenggunaM->get_akses_menu()->result();
		$data_array_akses_menu = array();
		foreach ($data_akses_menu as $menu) {
			array_push($data_array_akses_menu, $menu->kode_menu);
		}
		$this->data_menu = $data_array_akses_menu; // array akses menu berdasarkan user login
	}
	
	// pindah pindah halaman
	public function index(){ //halaman index kadep (dashboard)
		// print_r($this->data_menu);
		$data['menu'] = $this->data_menu;
		$data['data_kegiatan'] = $this->PenggunaM->get_kegiatan_pegawai()->num_rows();	//menampilkan kegiatan yang diajukan user sebagai pegwai
		$data['data_ajukan_barang'] = $this->BarangM->get_ajukan_barang()->num_rows();
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['data_diri'] = $data_diri;
		$data['PenggunaM']			= $this->PenggunaM;
		$data['KegiatanM']			= $this->KegiatanM;
		$data['KegiatanM']			= $this->KegiatanM;
		$data['BarangM']			= $this->BarangM;
		$data['title'] = "Beranda | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$data['body'] = $this->load->view('pengguna/index_content', $data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}

	public function data_diri(){ //halaman data diri
		$data['menu'] = $this->data_menu;
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['data_diri'] = $data_diri;
		$data['title'] = "Data Diri | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$data['body'] = $this->load->view('pengguna/data_diri_content', $data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}

	public function pengaturan_akun(){ //halaman pengaturan akun
		$data['menu'] = $this->data_menu;
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['data_diri'] = $data_diri;
		$data['title'] = "Pengaturan Akun | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$data['body'] = $this->load->view('pengguna/pengaturan_akun_content', $data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}

	public function pengguna(){//halaman pengguna (admin)
		if(in_array(14, $this->data_menu)){
			$data['menu'] = $this->data_menu;
			$this->data['PenggunaM']			= $this->PenggunaM;
			$this->data['pilihan_unit'] = $this->PenggunaM->get_unit();
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$this->data['data_pengguna'] = $this->PenggunaM->get_data_pengguna()->result();
		$this->data['data_diri'] = $data_diri;  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Daftar Pengguna | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$data['body'] = $this->load->view('pengguna/pengguna_content', $this->data, true);
		$this->load->view('pengguna/index_template', $data);
	}else{
		redirect('LoginC/logout');
	}
}

public function konfigurasi_sistem(){
	if(in_array(15, $this->data_menu)){

			$data_kode_jabatan_unit = $this->PenggunaM->get_kode_jabatan_unit_by_menu('1')->result(); //pers keg mahasiswa
			$data_array_jabatan_unit = array();
			foreach ($data_kode_jabatan_unit as $jabatan_unit) {
				array_push($data_array_jabatan_unit, $jabatan_unit->kode_jabatan_unit);
			}
			$this->data['data_jabatan_unit_mahasiswa'] = $data_array_jabatan_unit;


			$data_kode_jabatan_unit_peg = $this->PenggunaM->get_kode_jabatan_unit_by_menu('2')->result();//pers keg peg
			$data_array_jabatan_unit_peg = array();
			foreach ($data_kode_jabatan_unit_peg as $jabatan_unit_peg) {
				array_push($data_array_jabatan_unit_peg, $jabatan_unit_peg->kode_jabatan_unit);
			}
			$this->data['data_jabatan_unit_pegawai'] = $data_array_jabatan_unit_peg;


			$data['menu'] = $this->data_menu;
			$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
			$data['title'] = "Konfigurasi Sistem | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;

			$this->data['persetujuan_kegiatan']	= $this->PenggunaM->get_persetujuan_kegiatan()->result();
			$this->data['persetujuan_kegiatan_mahasiswa']	= $this->PenggunaM->get_persetujuan_kegiatan()->result();
			$this->data['persetujuan_pengajuan_barang']	= $this->PenggunaM->get_persetujuan_barang()->result();
			$this->data['persetujuan_pengajuan_RAB']	= $this->PenggunaM->get_persetujuan_RAB()->result();
			// $this->data['detail_jabatan'] 		= $this->PenggunaM->get_pilihan_jabatan_by_id($kode_jabatan)->result()[0];
			// $this->data['nama_pengguna']		= $this->PenggunaM->get_data_pengguna()->result();
			$this->data['nama_progress']		= $this->PenggunaM->get_nama_progress()->result();
			$this->data['jenis_kegiatan']		= $this->PenggunaM->get_jenis_kegiatan()->result();
			$this->data['jenis_kegiatan_persetujuan']	= $this->PenggunaM->get_jenis_kegiatan()->result();
			$this->data['jenis_barang']			= $this->PenggunaM->get_jenis_barang()->result();
			$this->data['jabatan_pilihan']		= $this->PenggunaM->get_pilihan_jabatan()->result();
			$this->data['unit']					= $this->PenggunaM->get_pilihan_unit()->result();
			$this->data['akses_menu']			= $this->PenggunaM->get_akses_menu_2()->result();
			$this->data['jabatan_unit_menu']	= $this->PenggunaM->get_jabatan_unit()->result();
			$this->data['PenggunaM']			= $this->PenggunaM;
			$this->data['data_diri'] 			= $data_diri;  	//get data diri buat nampilin nama di pjok kanan
			$data['body'] = $this->load->view('pengguna/konfigurasi_sistem_content', $this->data, true);
			$this->load->view('pengguna/index_template', $data);
		}else{
			redirect('LoginC/logout');
		}
	}

public function prosedur(){ //halaman index kadep (dashboard)
	if(in_array(16, $this->data_menu)){
		$data['menu'] = $this->data_menu;
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Konfigurasi Sistem | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;

		$this->data['data_diri'] = $data_diri;  	//get data diri buat nampilin nama di pjok kanan
		$this->data['data_prosedur'] = $this->PenggunaM->get_prosedur()->result();
		$data['body'] = $this->load->view('pengguna/prosedur_content', $this->data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}else{
		redirect('LoginC/logout');
	}
}


	//pengguna
public function ganti_jabatan(){
	$this->form_validation->set_rules('id_pengguna', 'ID Pengguna','required');
	$this->form_validation->set_rules('kode_unit', 'Kode Unit','required');
	$this->form_validation->set_rules('kode_jabatan', 'Kode Jabatan','required');
	$this->form_validation->set_rules('own_kode_jabatan', 'Kode Jabatan Sendiri','required');
	$this->form_validation->set_rules('own_kode_unit', 'Kode Unit Sendiri','required');
	$this->form_validation->set_rules('own_kode_jabatan_unit', 'Kode Jabatan Unit Sendiri','required');
	$this->form_validation->set_rules('own_atasan', 'Atasan','required');
	if($this->form_validation->run() == FALSE){
		$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
		redirect_back(); //kembali ke halaman sebelumnya -> helper
	}else{
		$id_pengguna 			= $_POST['id_pengguna']; //id pengguna yang dipilih buat diganti
		$kode_unit 				= $_POST['kode_unit']; //kode unit tujuan pengganti
		$kode_jabatan 			= $_POST['kode_jabatan']; //kode jabatan tujuan pengganti
		$own_kode_jabatan 		= $_POST['own_kode_jabatan']; //kode jabatan sendiri
		$own_kode_unit 			= $_POST['own_kode_unit']; //kode unit sendiri
		$own_kode_jabatan_unit 	= $_POST['own_kode_jabatan_unit']; //kode jabatan unit sendiri
		$own_atasan 			= $_POST['own_atasan']; //apakah atasan ?(own)
		$ganti 					= $_POST['ganti']; //apakah atasan ?(own)

		$kode_jabatan_unit = $this->PenggunaM->cek_kode_jabatan_unit($kode_unit, $kode_jabatan)->result()[0]->kode_jabatan_unit;//kode jabatan unit berdasarkan unit dan jabatan yang dipilih
		$atasan_baru = $this->PenggunaM->cek_kode_jabatan_unit($kode_unit, $kode_jabatan)->result()[0]->atasan; //apakah dia atasan(jabatan unit yang dituju)

		$data_update_jabatan_unit = array('kode_jabatan_unit' => $kode_jabatan_unit);
		$cek_atasan_tujuan = $this->PenggunaM->cek_atasan_by_kode_jabatan_unit($kode_jabatan_unit); //pengguna, atasan, aktif

		if($atasan_baru == "ya"){
				if($cek_atasan_tujuan == 1){//ada pengguna diposisi yang dituju
					$this->session->set_flashdata('error','Jabatan tidak berhasil diubah. Sudah ada Pengguna sebagai atasan di unit yang anda tuju');
					redirect_back();
				}else{ //tidak ada pengguna diposisi yang dituju
					if($ganti == 1){ //ya (minta ganti)
							$get_id_bukan_atasan = $this->PenggunaM->get_id_bukan_atasan($own_kode_unit)->result()[0]->id_pengguna;//id pengguna yang bukan atasan yang satu unit, aktif
						if($this->PenggunaM->update_jabatan_unit($id_pengguna, $data_update_jabatan_unit)){ //ganti jabatan
							$data_update_ganti_atasan = array('kode_jabatan_unit' => $own_kode_jabatan_unit);
							if($this->PenggunaM->update_jabatan_unit($get_id_bukan_atasan, $data_update_ganti_atasan)){
								$this->session->set_flashdata('sukses','Jabatan berhasil diubah dan diganti pengguna lain');	
								redirect_back();
							}else{
								$this->session->set_flashdata('sukses','Jabatan berhasil diubah dan tapi tidak berhasil diganti pengguna lain');
								redirect_back();
							}
						}else{
							$this->session->set_flashdata('error','Jabatan tidak berhasil diubah');	
							redirect_back();
						}
					}else{
						if($this->PenggunaM->update_jabatan_unit($id_pengguna, $data_update_jabatan_unit)){ //ganti jabatan
							$this->session->set_flashdata('sukses','Jabatan berhasil diubah');	
							redirect_back();
						}else{
							$this->session->set_flashdata('error','Jabatan tidak berhasil diubah');	
							redirect_back();
						}
					}
				}
		}else{ //jabatan yang dituju bukan atasan
				if($ganti == 1){ //ya (minta ganti)
						$get_id_bukan_atasan = $this->PenggunaM->get_id_bukan_atasan($own_kode_unit)->result()[0]->id_pengguna;//id pengguna yang bukan atasan yang satu unit, aktif
					if($this->PenggunaM->update_jabatan_unit($id_pengguna, $data_update_jabatan_unit)){ //ganti jabatan
						$data_update_ganti_atasan = array('kode_jabatan_unit' => $own_kode_jabatan_unit);
						if($this->PenggunaM->update_jabatan_unit($get_id_bukan_atasan, $data_update_ganti_atasan)){
							$this->session->set_flashdata('sukses','Jabatan berhasil diubah dan diganti pengguna lain');	
							redirect_back();
						}else{
							$this->session->set_flashdata('sukses','Jabatan berhasil diubah dan tapi tidak berhasil diganti pengguna lain');
							redirect_back();
						}
					}else{
						$this->session->set_flashdata('error','Jabatan tidak berhasil diubah');	
						redirect_back();
					}
				}else{
					if($this->PenggunaM->update_jabatan_unit($id_pengguna, $data_update_jabatan_unit)){ //ganti jabatan
						$this->session->set_flashdata('sukses','Jabatan berhasil diubah dan tidak diganti pengguna lain');	
						redirect_back();
					}else{
						$this->session->set_flashdata('error','Jabatan tidak berhasil diubah');	
						redirect_back();
					}
				}
			}
		}
	}

	// umum
	public function detail_pengguna($id_pengguna){ //menampilkan modal dengan isi dari detail_kegiatan.php
		$data['data_pengguna'] 			= $this->PenggunaM->get_data_diri_by_id($id_pengguna)->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$this->load->view('pengguna/detail_pengguna', $data);
	}

	public function aktif($id_pengguna, $kode_jabatan_unit, $kode_unit, $kode_jabatan){ //aktifasi akun pengguna
		$cek_atasan_tujuan = $this->PenggunaM->cek_atasan_by_kode_jabatan_unit($kode_jabatan_unit); //pengguna, atasan, aktif
		$own_atasan = $this->PenggunaM->cek_kode_jabatan_unit($kode_unit, $kode_jabatan)->result()[0]->atasan; //apakah dia atasan(jabatan unit yang dituju)
		$get_id_bukan_atasan = $this->PenggunaM->jabatan_unit_by_unit($kode_unit)->result()[0]->kode_jabatan_unit;//id pengguna yang bukan atasan yang satu unit, aktif
		if($cek_atasan_tujuan > 0){//ada pengguna di jabatan itu
			if($own_atasan == "ya"){
				if($get_id_bukan_atasan){
					$data_update_ganti_atasan = array('kode_jabatan_unit' => $get_id_bukan_atasan);
					$this->PenggunaM->aktif($id_pengguna);
					$this->PenggunaM->update_jabatan_unit($id_pengguna, $data_update_ganti_atasan);
					$this->session->set_flashdata('sukses','Akun berhasil diaktifkan. Ada pengguna aktif di jabatan tersebut sehingga dirubah menjadi staf');	
					redirect('PenggunaC/pengguna');
				}else{
					$this->session->set_flashdata('error','Akun tidak berhasil diaktifkan. Ada pengguna Aktif di jabatan tersebut');	
					redirect('PenggunaC/pengguna');
				}
			}

		}else{
			if($this->PenggunaM->aktif($id_pengguna)){
				$this->session->set_flashdata('sukses','Akun berhasil diaktifkan');	
				redirect('PenggunaC/pengguna');
			}else{
				$this->session->set_flashdata('error','Akun tidak berhasil diaktifkan');	
				redirect('PenggunaC/pengguna');
			}	
		}
	}

    public function non_aktif($id_pengguna){ //deaktifasi akun pengguna
    	if($this->PenggunaM->non_aktif($id_pengguna)){
    		$this->session->set_flashdata('sukses','Akun berhasil di non-aktifkan');	
    		redirect('PenggunaC/pengguna');
    	}else{
    		$this->session->set_flashdata('error','Akun tidak berhasil di non-aktifkan');	
    		redirect('PenggunaC/pengguna');
    	}
    }

    // Jabatan
    public function tambah_jabatan(){
    	$this->form_validation->set_rules('kode_unit', 'Kode Unit','required');
    	$this->form_validation->set_rules('kode_jabatan', 'Kode Jabatan','required');
    	if($this->form_validation->run() == FALSE){
    		$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$kode_jabatan 	= $_POST['kode_jabatan'];
			$kode_unit 		= $_POST['kode_unit'];

			$data_jabatan_unit = array(
				'kode_unit' 	=> $kode_unit, 
				'kode_jabatan'	=> $kode_jabatan 
			);

			if($insert_id_2 = $this->PenggunaM->insert('jabatan_unit', $data_jabatan_unit)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect_back(); // redirect kembali ke halaman sebelumnya
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back();
			}
		}
	}

	public function tambah_jabatan_2(){
		$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$nama_jabatan 	= $_POST['nama_jabatan'];
			$db 			= "jabatan";

			$data = array(
				'nama_jabatan'      => $nama_jabatan);

			if($this->PenggunaM->insert($db, $data)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect_back(); // redirect kembali ke halaman sebelumnya
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back(); //kembali ke halaman sebelumnya -> helper
			}
		}
	}


	public function detail_jabatan($id){ //menampilkan modal dengan isi dari detail_jabatan.php
		$data['detail_jabatan'] = $this->PenggunaM->get_pilihan_jabatan_by_id($id)->result()[0];
		$this->load->view('pengguna/detail_jabatan', $data);
	}

	public function update_jabatan(){
		$this->form_validation->set_rules('kode_jabatan', 'Kode Jabatan','required');
		$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$kode_jabatan = $_POST['kode_jabatan'];
			$nama_jabatan = $_POST['nama_jabatan'];
			$db = "jabatan";
			$kode = "kode_jabatan";

			$data = array(
				'nama_jabatan'      => $nama_jabatan);

			if($this->PenggunaM->update($kode_jabatan, $kode, $db, $data)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect_back(); // redirect kembali ke halaman sebelumnya
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back(); //kembali ke halaman sebelumnya -> helper
			}
		}
	}

	// Unit
	public function tambah_unit(){
		$this->form_validation->set_rules('nama_unit', 'Nama Unit','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$nama_unit = $_POST['nama_unit'];
			$db 		= "unit";

			$data = array(
				'nama_unit'      => $nama_unit);

			if($this->PenggunaM->insert($db, $data)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect_back(); // redirect kembali ke halaman sebelumnya
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back(); //kembali ke halaman sebelumnya -> helper
			}
		}
	}

	public function detail_unit($id){ //menampilkan modal dengan isi dari detail_jabatan.php
		$data['detail_unit'] = $this->PenggunaM->get_pilihan_unit_by_id($id)->result()[0];
		$this->load->view('pengguna/detail_unit', $data);
	}

	public function update_unit(){
		$this->form_validation->set_rules('kode_unit', 'Kode Unit','required');
		$this->form_validation->set_rules('nama_unit', 'Nama Unit','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$kode_unit = $_POST['kode_unit'];
			$nama_unit = $_POST['nama_unit'];
			$db = "unit";
			$kode = "kode_unit";

			$data = array(
				'nama_unit'      => $nama_unit);

			if($this->PenggunaM->update($kode_unit, $kode, $db, $data)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect_back(); // redirect kembali ke halaman sebelumnya
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back(); //kembali ke halaman sebelumnya -> helper
			}
		}
	}

	public function hapus_jabatan_unit($kode_jabatan_unit){
		if($this->PenggunaM->get_pengguna_by_kode_jabatan_unit($kode_jabatan_unit, 'aktif')->num_rows() > 0 || $this->PenggunaM->get_pengguna_by_kode_jabatan_unit($kode_jabatan_unit, 'tidak aktif')->num_rows() > 0){
			$this->session->set_flashdata('error','Data anda tidak berhasil dihapus, karena masih ada pengguna yang menjabat. Silahkan ganti atau pindah jabatan terlebih dahulu.');
			redirect_back();
		}else{
			if($this->PenggunaM->hapus_jabatan_unit($kode_jabatan_unit)){
				$this->session->set_flashdata('sukses','Data anda berhasil dihapus');
				redirect_back();
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
				redirect_back();
			}
		}
	}

	public function hapus_akses_menu($kode_akses_menu){
		if($this->PenggunaM->hapus_akses_menu($kode_akses_menu)){
			$this->session->set_flashdata('sukses','Data anda berhasil dihapus');
			redirect_back();
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
			redirect_back();
		}

	}

	public function hapus($kode_acc_kegiatan){//hapus persetujuan kegiatan
		$hapus_jabatan_unit 	= $this->PenggunaM->get_acc_by_kode($kode_acc_kegiatan)->result()[0]->kode_jabatan_unit;
		$hapus_jenis_kegiatan 	= $this->PenggunaM->get_acc_by_kode($kode_acc_kegiatan)->result()[0]->kode_jenis_kegiatan;
		if($hapus_jenis_kegiatan == '1'){ //kode jenis kegiatan pegawai
			$kode_menu = '2'; //kode menu pers pegawai
		}elseif($hapus_jenis_kegiatan == '2'){ //kode jenis keg mhs
			$kode_menu = '1'; //kode menu pers mhs
		}

		$hapus_acc_kode = $this->PenggunaM->get_akses_menu_by_kode_jabatan_kode_menu($hapus_jabatan_unit, $kode_menu)->result()[0]->kode_akses_menu;

		if($this->PenggunaM->hapus($kode_acc_kegiatan)){
			if($this->PenggunaM->hapus_akses_menu($hapus_acc_kode)){
				$this->session->set_flashdata('sukses','Data anda berhasil dihapus');
				redirect_back();
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
				redirect_back();
			}
		}
	}

	public function hapus_barang_rab($kode_acc_barang){//hapus persetujuan kegiatan
		$hapus_jabatan_unit 	= $this->PenggunaM->get_acc_barang_rab_by_kode($kode_acc_barang)->result()[0]->kode_jabatan_unit;
		$hapus_jenis_pengajuan 	= $this->PenggunaM->get_acc_barang_rab_by_kode($kode_acc_barang)->result()[0]->kode_jenis_pengajuan;
		if($hapus_jenis_pengajuan == '1'){ //kode jenis pengajuan barang
			$kode_menu = '5'; //kode menu pers barang
		}elseif($hapus_jenis_kegiatan == '2'){ //kode jenis pengajuan rab
			$kode_menu = '4'; //kode menu pers rab
		}

		$hapus_acc_kode = $this->PenggunaM->get_akses_menu_by_kode_jabatan_kode_menu($hapus_jabatan_unit, $kode_menu)->result()[0]->kode_akses_menu;

		if($this->PenggunaM->hapus_acc_barang_rab($kode_acc_barang)){
			if($this->PenggunaM->hapus_akses_menu($hapus_acc_kode)){
				$this->session->set_flashdata('sukses','Data anda berhasil dihapus');
				redirect_back();
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
				redirect_back();
			}
		}
	}

	public function tambah_akses_menu(){
		$this->form_validation->set_rules('kode_menu', 'Kode Menu','required');
		$this->form_validation->set_rules('kode_jabatan_unit', 'Kode Jabatan Unit','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$kode_menu 			= $_POST['kode_menu'];
			$kode_jabatan_unit 	= $_POST['kode_jabatan_unit'];

			$data_insert_akses_menu = array(
				'kode_menu' 		=> $kode_menu, 
				'kode_jabatan_unit' => $kode_jabatan_unit
			);

			if($this->PenggunaM->insert_akses_menu($data_insert_akses_menu)){
				if($kode_menu == 2){
					$ranking = $this->PenggunaM->get_max_rank_peg()->result()[0]->ranking; //pegawai
					$ranking_new = (int)$ranking + 1;
					$kode = "1"; //jenis kegiatan pegawai

					$data = array(
						'kode_jabatan_unit'      	=> $kode_jabatan_unit,
						'ranking'      				=> $ranking_new,
						'kode_jenis_kegiatan'      	=> $kode);
					$db = "acc_kegiatan";
					if($this->PenggunaM->insert($db, $data)){
						$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
						redirect_back();
					}else{
						$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
						redirect_back(); //kembali ke halaman sebelumnya -> helper
					}
				}elseif($kode_menu == 1){
					$ranking = $this->PenggunaM->get_max_rank_mhs()->result()[0]->ranking; //mahasiswa
					$ranking_new = (int)$ranking + 1;
					$kode = "2"; //jenis kegiatan mhs

					$data = array(
						'kode_jabatan_unit'      	=> $kode_jabatan_unit,
						'ranking'      				=> $ranking_new,
						'kode_jenis_kegiatan'      	=> $kode);
					$db = "acc_kegiatan";
					if($this->PenggunaM->insert($db, $data)){
						$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
						redirect_back();
					}else{
						$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
						redirect_back(); //kembali ke halaman sebelumnya -> helper
					}
				}elseif($kode_menu == 5){
					$ranking = $this->PenggunaM->get_max_rank_barang()->result()[0]->ranking;
					$ranking_new = (int)$ranking + 1;
					$kode = "1"; // jenis_pengajuan

					$data = array(
						'kode_jabatan_unit'		=> $kode_jabatan_unit,
						'ranking'				=> $ranking_new,
						'kode_jenis_pengajuan'	=> $kode
					);
					$db = "acc_barang";
					if($this->PenggunaM->insert($db, $data)){
						$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
						redirect_back();
					}else{
						$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
						redirect_back();
					}
				}elseif($kode_menu == 4){
					$ranking = $this->PenggunaM->get_max_rank_RAB()->result()[0]->ranking;
					$ranking_new = (int)$ranking + 1;
					$kode = "2"; // jenis_pengajuan

					$data = array(
						'kode_jabatan_unit'		=> $kode_jabatan_unit,
						'ranking'				=> $ranking_new,
						'kode_jenis_pengajuan'	=> $kode
					);
					$db = "acc_barang";
					if($this->PenggunaM->insert($db, $data)){
						$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
						redirect_back();
					}else{
						$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
						redirect_back();
					}
				}

				$this->session->set_flashdata('sukses','Data anda berhasil disimpan1');
				redirect_back();

			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back();
			}
		}
	}

	public function tambah_persetujuan_kegiatan($kode){
		$this->form_validation->set_rules('kode_jabatan_unit', 'Kode Jabatan Unit','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan 1');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$kode_jabatan_unit 		= $_POST['kode_jabatan_unit'];

			if($kode == 1){
				$ranking = $this->PenggunaM->get_max_rank_peg()->result()[0]->ranking; //pegawai
				$ranking_new = (int)$ranking + 1;
			}elseif ($kode == 2){
				$ranking = $this->PenggunaM->get_max_rank_mhs()->result()[0]->ranking;
				$ranking_new = (int)$ranking + 1;
			}

			$data = array(
				'kode_jabatan_unit'      	=> $kode_jabatan_unit,
				'ranking'      				=> $ranking_new,
				'kode_jenis_kegiatan'      	=> $kode);
			$db = "acc_kegiatan";

			if($this->PenggunaM->insert($db, $data)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect_back(); // redirect kembali ke halaman sebelumnya
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back(); //kembali ke halaman sebelumnya -> helper
			}
		}
	}

	public function hapus_unit($kode_unit){
		if($this->PenggunaM->get_jabatan_unit_by_unit($kode_unit) > 0){
			$this->session->set_flashdata('error','Data anda tidak berhasil dihapus, karena masih ada pengguna yang menjabat. Silahkan ganti atau pindah jabatan terlebih dahulu.');
			redirect_back();
		}else{
			if($this->PenggunaM->hapus_unit($kode_unit)){
				$this->session->set_flashdata('sukses','Data anda berhasil dihapus');
				redirect_back();
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
				redirect_back();
			}
		}
	}

	public function update_pimpinan($kode_jabatan_unit, $kode_unit){
		$data_ya = array('atasan' => "ya");
		$data_tidak = array('atasan' => "tidak");

		$atasan_lama = $this->PenggunaM->get_pimpinan_unit($kode_unit)->result()[0]->kode_jabatan_unit;
		if($this->PenggunaM->update_pimpinan($kode_jabatan_unit, $data_ya)){
			$this->PenggunaM->update_pimpinan($atasan_lama, $data_tidak);
			$this->session->set_flashdata('sukses','Data anda berhasil diubah');
			redirect_back();
		}else{
			$this->session->set_flashdata('error','Data anda tidak berhasil diubah');
			redirect_back();
		}

	}

	// Jenis Barang
	public function tambah_jenis_barang(){
		$this->form_validation->set_rules('nama_jenis_barang', 'Nama Jenis Barang','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$nama_jenis_barang = $_POST['nama_jenis_barang'];
			$db 		= "jenis_barang";

			$data = array(
				'nama_jenis_barang'      => $nama_jenis_barang);

			if($this->PenggunaM->insert($db, $data)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect_back(); // redirect kembali ke halaman sebelumnya
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back(); //kembali ke halaman sebelumnya -> helper
			}
		}
	}

	public function detail_jenis_barang($id){ //menampilkan modal dengan isi dari detail_jabatan.php
		$data['detail_jenis_barang'] = $this->PenggunaM->get_jenis_barang_by_id($id)->result()[0];
		$this->load->view('pengguna/detail_jenis_barang', $data);
	}

	public function update_jenis_barang(){
		$this->form_validation->set_rules('kode_jenis_barang', 'Kode Jenis barang','required');
		$this->form_validation->set_rules('nama_jenis_barang', 'Nama Jenis barang','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$kode_jenis_barang = $_POST['kode_jenis_barang'];
			$nama_jenis_barang = $_POST['nama_jenis_barang'];
			$db = "jenis_barang";
			$kode = "kode_jenis_barang";

			$data = array(
				'nama_jenis_barang'      => $nama_jenis_barang);

			if($this->PenggunaM->update($kode_jenis_barang, $kode, $db, $data)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect_back(); // redirect kembali ke halaman sebelumnya
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back(); //kembali ke halaman sebelumnya -> helper
			}
		}
	}

	// Jenis KEgiatan
	public function tambah_jenis_kegiatan(){
		$this->form_validation->set_rules('nama_jenis_kegiatan', 'Nama Jenis kegiatan','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$nama_jenis_kegiatan = $_POST['nama_jenis_kegiatan'];
			$db 		= "jenis_kegiatan";

			$data = array(
				'nama_jenis_kegiatan'      => $nama_jenis_kegiatan);

			if($this->PenggunaM->insert($db, $data)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect_back(); // redirect kembali ke halaman sebelumnya
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back(); //kembali ke halaman sebelumnya -> helper
			}
		}
	}

	public function detail_jenis_kegiatan($id){ //menampilkan modal dengan isi dari detail_jenis_kegiatan.php
		$data['detail_jenis_kegiatan'] = $this->PenggunaM->get_jenis_kegiatan_by_id($id)->result()[0];
		$this->load->view('pengguna/detail_jenis_kegiatan', $data);
	}

	public function update_jenis_kegiatan(){
		$this->form_validation->set_rules('kode_jenis_kegiatan', 'Kode Jenis Kegiatan','required');
		$this->form_validation->set_rules('nama_jenis_kegiatan', 'Nama Jenis Kegiatan','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$kode_jenis_kegiatan = $_POST['kode_jenis_kegiatan'];
			$nama_jenis_kegiatan = $_POST['nama_jenis_kegiatan'];
			$db = "jenis_kegiatan";
			$kode = "kode_jenis_kegiatan";

			$data = array(
				'nama_jenis_kegiatan'      => $nama_jenis_kegiatan);

			if($this->PenggunaM->update($kode_jenis_kegiatan, $kode, $db, $data)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect_back(); // redirect kembali ke halaman sebelumnya
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back(); //kembali ke halaman sebelumnya -> helper
			}
		}
	}

	// Nama Progress
	public function tambah_nama_progress(){
		$this->form_validation->set_rules('nama_progress', ' Nama Progress','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$nama_progress = $_POST['nama_progress'];
			$db 		= "nama_progress";

			$data = array(
				'nama_progress'      => $nama_progress);

			if($this->PenggunaM->insert($db, $data)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect_back(); // redirect kembali ke halaman sebelumnya
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back(); //kembali ke halaman sebelumnya -> helper
			}
		}
	}

	public function detail_nama_progress($id){ //menampilkan modal dengan isi dari detail_jenis_kegiatan.php
		$data['detail_nama_progress'] = $this->PenggunaM->get_nama_progress_by_id($id)->result()[0];
		$this->load->view('pengguna/detail_nama_progress', $data);
	}

	public function update_nama_progress(){
		$this->form_validation->set_rules('kode_nama_progress', 'Kode Nama Progress','required');
		$this->form_validation->set_rules('nama_progress', 'Nama Progress','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$kode_nama_progress = $_POST['kode_nama_progress'];
			$nama_progress = $_POST['nama_progress'];
			$db = "nama_progress";
			$kode = "kode_nama_progress";

			$data = array(
				'nama_progress'      => $nama_progress);

			if($this->PenggunaM->update($kode_nama_progress, $kode, $db, $data)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect_back(); // redirect kembali ke halaman sebelumnya
			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back(); //kembali ke halaman sebelumnya -> helper
			}
		}
	}

	// ACC KEgiatan
	public function naik($kode_acc_kegiatan, $ranking, $kode_jenis_kegiatan){
		$rank_max_peg = $this->PenggunaM->get_max_rank_peg()->result()[0]->ranking;
		$rank_max_mhs = $this->PenggunaM->get_max_rank_mhs()->result()[0]->ranking;
		$rank_min_mhs = $this->PenggunaM->get_min_rank_mhs()->result()[0]->ranking;
		$rank_min_peg = $this->PenggunaM->get_min_rank_peg()->result()[0]->ranking;

		if($kode_jenis_kegiatan == 1){ //kegiatan pegawai
			if($ranking == $rank_max_peg){ //rank nya max(terbesar)
				if($kode_min_1_row = $this->PenggunaM->cek_peg_by_rank($ranking-1)->result() != NULL){
					$kode_min_1 = $this->PenggunaM->cek_peg_by_rank($ranking-1)->result()[0]; //simpan id rank-1
					//naikin
					$ranking_new_naik = (int)$ranking - 1; //ranking nya dikurangin 1
					$data_update_naik = array('ranking' => $ranking_new_naik); 
					$this->PenggunaM->update_acc($kode_acc_kegiatan, $data_update_naik); //update datanya dia

					//turunin
					$ranking_new_turun = (int)$kode_min_1->ranking + 1; //rankingnya tambah 1
					$data_update_turun = array('ranking' => $ranking_new_turun);
					$this->PenggunaM->update_acc($kode_min_1->kode_acc_kegiatan, $data_update_turun); //update data kode acc-1
					$this->session->set_flashdata('sukses','Berhasil');
					// redirect_back(); 
					redirect('PenggunaC/konfigurasi_sistem');
				}else{
					$this->session->set_flashdata('error','Ranking sudah tertinggi');
					redirect_back(); 
				}
			}elseif ($ranking == $rank_min_peg){ //ranknya terkecil
				$this->session->set_flashdata('error','Ranking sudah tertinggi');
				redirect_back(); 
			}else{
				$kode_min_1 = $this->PenggunaM->cek_peg_by_rank($ranking-1)->result()[0];
					//naikin
				$ranking_new_naik = (int)$ranking - 1;
				$data_update_naik = array('ranking' => $ranking_new_naik);
				$this->PenggunaM->update_acc($kode_acc_kegiatan, $data_update_naik);
					//turunin
				$ranking_new_turun = (int)$kode_min_1->ranking + 1;
				$data_update_turun = array('ranking' => $ranking_new_turun);
				$this->PenggunaM->update_acc($kode_min_1->kode_acc_kegiatan, $data_update_turun);
				$this->session->set_flashdata('sukses','Berhasil');
				// redirect_back(); 
				redirect('PenggunaC/konfigurasi_sistem');
			}
		}elseif ($kode_jenis_kegiatan == 2) {//mahasiswa
			if($ranking == $rank_max_mhs){ //rank nya max(terbesar)
				if($kode_min_1_row = $this->PenggunaM->cek_mhs_by_rank($ranking-1)->result() != NULL){
					$kode_min_1 = $this->PenggunaM->cek_mhs_by_rank($ranking-1)->result()[0]; //simpan id rank-1
					//naikin
					$ranking_new_naik = (int)$ranking - 1; //ranking nya dikurangin 1
					$data_update_naik = array('ranking' => $ranking_new_naik); 
					$this->PenggunaM->update_acc($kode_acc_kegiatan, $data_update_naik); //update datanya dia

					//turunin
					$ranking_new_turun = (int)$kode_min_1->ranking + 1; //rankingnya tambah 1
					$data_update_turun = array('ranking' => $ranking_new_turun);
					$this->PenggunaM->update_acc($kode_min_1->kode_acc_kegiatan, $data_update_turun); //update data kode acc-1
					$this->session->set_flashdata('sukses','Berhasil');
					redirect_back(); 
				}else{
					$this->session->set_flashdata('error','Ranking sudah tertinggi');
					redirect_back(); 
				}
			}elseif ($ranking == $rank_min_mhs){ //ranknya terkecil
				$this->session->set_flashdata('error','Ranking sudah tertinggi');
				redirect_back(); 
			}else{
				$kode_min_1 = $this->PenggunaM->cek_mhs_by_rank($ranking-1)->result()[0];
					//naikin
				$ranking_new_naik = (int)$ranking - 1;
				$data_update_naik = array('ranking' => $ranking_new_naik);
				$this->PenggunaM->update_acc($kode_acc_kegiatan, $data_update_naik);
					//turunin
				$ranking_new_turun = (int)$kode_min_1->ranking + 1;
				$data_update_turun = array('ranking' => $ranking_new_turun);
				$this->PenggunaM->update_acc($kode_min_1->kode_acc_kegiatan, $data_update_turun);
				$this->session->set_flashdata('sukses','Berhasil');
				redirect_back(); 
			}
		}

	}


	public function turun($kode_acc_kegiatan, $ranking, $kode_jenis_kegiatan){
		$rank_max_peg = $this->PenggunaM->get_max_rank_peg()->result()[0]->ranking;
		$rank_max_mhs = $this->PenggunaM->get_max_rank_mhs()->result()[0]->ranking;
		$rank_min_mhs = $this->PenggunaM->get_min_rank_mhs()->result()[0]->ranking;
		$rank_min_peg = $this->PenggunaM->get_min_rank_peg()->result()[0]->ranking;

		if($kode_jenis_kegiatan == 1){ //kegiatan pegawai
			if($ranking == $rank_max_peg){ //rank nya max(terbesar)
				$this->session->set_flashdata('error','Ranking sudah terendah');
				redirect_back(); 
			}elseif ($ranking == $rank_min_peg){ //ranknya terkecil
				if($kode_min_1_row = $this->PenggunaM->cek_peg_by_rank($ranking+1)->result() != NULL){
					$kode_min_1 = $this->PenggunaM->cek_peg_by_rank($ranking+1)->result()[0]; //simpan id rank+1
					//naikin
					$ranking_new_naik = (int)$ranking +1; //ranking nya dikurangin 1
					$data_update_naik = array('ranking' => $ranking_new_naik); 
					$this->PenggunaM->update_acc($kode_acc_kegiatan, $data_update_naik); //update datanya dia

					//turunin
					$ranking_new_turun = (int)$kode_min_1->ranking -1; //rankingnya dikurangi 1
					$data_update_turun = array('ranking' => $ranking_new_turun);
					$this->PenggunaM->update_acc($kode_min_1->kode_acc_kegiatan, $data_update_turun); //update data kode acc+1
					$this->session->set_flashdata('sukses','Berhasil');
					redirect_back(); 
				}else{
					$this->session->set_flashdata('error','Ranking sudah terendah');
					redirect_back(); 
				}
			}else{
				$kode_min_1 = $this->PenggunaM->cek_peg_by_rank($ranking+1)->result()[0];
					//naikin
				$ranking_new_naik = (int)$ranking +1;
				$data_update_naik = array('ranking' => $ranking_new_naik);
				$this->PenggunaM->update_acc($kode_acc_kegiatan, $data_update_naik);
					//turunin
				$ranking_new_turun = (int)$kode_min_1->ranking -1;
				$data_update_turun = array('ranking' => $ranking_new_turun);
				$this->PenggunaM->update_acc($kode_min_1->kode_acc_kegiatan, $data_update_turun);
				$this->session->set_flashdata('sukses','Berhasil');
				redirect_back(); 
			}
		}elseif ($kode_jenis_kegiatan == 2) {//mahasiswa
			if($ranking == $rank_max_mhs){ //rank nya max(terbesar)
				$this->session->set_flashdata('error','Ranking sudah terendah');
				redirect_back(); 
			}elseif ($ranking == $rank_min_mhs){ //ranknya terkecil
				if($kode_min_1_row = $this->PenggunaM->cek_mhs_by_rank($ranking+1)->result() != NULL){
					$kode_min_1 = $this->PenggunaM->cek_mhs_by_rank($ranking+1)->result()[0]; //simpan id rank+1
					//naikin
					$ranking_new_naik = (int)$ranking +1; //ranking nya dikurangin 1
					$data_update_naik = array('ranking' => $ranking_new_naik); 
					$this->PenggunaM->update_acc($kode_acc_kegiatan, $data_update_naik); //update datanya dia

					//turunin
					$ranking_new_turun = (int)$kode_min_1->ranking -1; //rankingnya dikurangi 1
					$data_update_turun = array('ranking' => $ranking_new_turun);
					$this->PenggunaM->update_acc($kode_min_1->kode_acc_kegiatan, $data_update_turun); //update data kode acc+1
					$this->session->set_flashdata('sukses','Berhasil');
					redirect_back(); 
				}else{
					$this->session->set_flashdata('error','Ranking sudah terendah');
					redirect_back(); 
				}
			}else{
				$kode_min_1 = $this->PenggunaM->cek_mhs_by_rank($ranking+1)->result()[0];
					//naikin
				$ranking_new_naik = (int)$ranking +1;
				$data_update_naik = array('ranking' => $ranking_new_naik);
				$this->PenggunaM->update_acc($kode_acc_kegiatan, $data_update_naik);
					//turunin
				$ranking_new_turun = (int)$kode_min_1->ranking -1;
				$data_update_turun = array('ranking' => $ranking_new_turun);
				$this->PenggunaM->update_acc($kode_min_1->kode_acc_kegiatan, $data_update_turun);
				$this->session->set_flashdata('sukses','Berhasil');
				redirect_back(); 
			}
		}

	}		

	// Naik barang & rab
	public function naik_keatas($kode_acc_barang, $ranking, $kode_jenis_pengajuan){
		$rank_max_barang = $this->PenggunaM->get_max_rank_barang()->result()[0]->ranking;
		$rank_max_rab = $this->PenggunaM->get_max_rank_RAB()->result()[0]->ranking;
		$rank_min_barang = $this->PenggunaM->get_min_rank_barang()->result()[0]->ranking;
		$rank_min_rab = $this->PenggunaM->get_min_rank_RAB()->result()[0]->ranking;

		if($kode_jenis_pengajuan == 1){ // pengajuan barang
			if($ranking == $rank_max_barang){ //rank nya max(terbesar)
				if($kode_min_1_row = $this->PenggunaM->cek_barang_by_rank($ranking-1)->result() != NULL){
					$kode_min_1 = $this->PenggunaM->cek_barang_by_rank($ranking-1)->result()[0]; //simpan id rank-1
					//naikin
					$ranking_new_naik = (int)$ranking - 1; //ranking nya dikurangin 1
					$data_update_naik = array('ranking' => $ranking_new_naik); 
					$this->PenggunaM->update_acc_barang_rab($kode_acc_barang, $data_update_naik); //update datanya dia

					//turunin
					$ranking_new_turun = (int)$kode_min_1->ranking + 1; //rankingnya tambah 1
					$data_update_turun = array('ranking' => $ranking_new_turun);
					$this->PenggunaM->update_acc_barang_rab($kode_min_1->kode_acc_barang, $data_update_turun); //update data kode acc-1
					$this->session->set_flashdata('sukses','Berhasil');
					// redirect_back(); 
					redirect('PenggunaC/konfigurasi_sistem');
				}else{
					$this->session->set_flashdata('error','Ranking sudah tertinggi');
					redirect_back(); 
				}
			}elseif ($ranking == $rank_min_barang){ //ranknya terkecil
				$this->session->set_flashdata('error','Ranking sudah tertinggi');
				redirect_back(); 
			}else{
				$kode_min_1 = $this->PenggunaM->cek_barang_by_rank($ranking-1)->result()[0];
					//naikin
				$ranking_new_naik = (int)$ranking - 1;
				$data_update_naik = array('ranking' => $ranking_new_naik);
				$this->PenggunaM->update_acc_barang_rab($kode_acc_barang, $data_update_naik);
					//turunin
				$ranking_new_turun = (int)$kode_min_1->ranking + 1;
				$data_update_turun = array('ranking' => $ranking_new_turun);
				$this->PenggunaM->update_acc_barang_rab($kode_min_1->kode_acc_barang, $data_update_turun);
				$this->session->set_flashdata('sukses','Berhasil');
				// redirect_back(); 
				redirect('PenggunaC/konfigurasi_sistem');
			}
		}elseif ($kode_jenis_pengajuan == 2) {//rab
			if($ranking == $rank_max_rab){ //rank nya max(terbesar)
				if($kode_min_1_row = $this->PenggunaM->cek_rab_by_rank($ranking-1)->result() != NULL){
					$kode_min_1 = $this->PenggunaM->cek_rab_by_rank($ranking-1)->result()[0]; //simpan id rank-1
					//naikin
					$ranking_new_naik = (int)$ranking - 1; //ranking nya dikurangin 1
					$data_update_naik = array('ranking' => $ranking_new_naik); 
					$this->PenggunaM->update_acc_barang_rab($kode_acc_barang, $data_update_naik); //update datanya dia

					//turunin
					$ranking_new_turun = (int)$kode_min_1->ranking + 1; //rankingnya tambah 1
					$data_update_turun = array('ranking' => $ranking_new_turun);
					$this->PenggunaM->update_acc_barang_rab($kode_min_1->kode_acc_barang, $data_update_turun); //update data kode acc-1
					$this->session->set_flashdata('sukses','Berhasil 1');
					redirect_back(); 
				}else{
					$this->session->set_flashdata('error','Ranking sudah tertinggi');
					redirect_back(); 
				}
			}elseif($ranking == $rank_min_rab){ //ranknya terkecil
				$this->session->set_flashdata('error','Ranking sudah tertinggi');
				redirect_back(); 
			}else{
				$kode_min_1 = $this->PenggunaM->cek_rab_by_rank($ranking-1)->result()[0];
					//naikin
				$ranking_new_naik = (int)$ranking - 1;
				$data_update_naik = array('ranking' => $ranking_new_naik);
				$this->PenggunaM->update_acc_barang_rab($kode_acc_barang, $data_update_naik);
					//turunin
				$ranking_new_turun = (int)$kode_min_1->ranking + 1;
				$data_update_turun = array('ranking' => $ranking_new_turun);
				$this->PenggunaM->update_acc_barang_rab($kode_min_1->kode_acc_barang, $data_update_turun);
				$this->session->set_flashdata('sukses','Berhasil 2');
				redirect_back(); 
			}
		}

	}	

	//turun barang & rab
	public function turun_kebawah($kode_acc_barang, $ranking, $kode_jenis_pengajuan){
		$rank_max_barang = $this->PenggunaM->get_max_rank_barang()->result()[0]->ranking;
		$rank_max_rab = $this->PenggunaM->get_max_rank_RAB()->result()[0]->ranking;
		$rank_min_barang = $this->PenggunaM->get_min_rank_barang()->result()[0]->ranking;
		$rank_min_rab = $this->PenggunaM->get_min_rank_RAB()->result()[0]->ranking;

		if($kode_jenis_pengajuan == 1){ //rab
			if($ranking == $rank_max_barang){ //rank nya max(terbesar)
				$this->session->set_flashdata('error','Ranking sudah terendah');
				redirect_back(); 
			}elseif ($ranking == $rank_min_barang){ //ranknya terkecil
				if($kode_min_1_row = $this->PenggunaM->cek_barang_by_rank($ranking+1)->result() != NULL){
					$kode_min_1 = $this->PenggunaM->cek_barang_by_rank($ranking+1)->result()[0]; //simpan id rank+1
					//naikin
					$ranking_new_naik = (int)$ranking +1; //ranking nya dikurangin 1
					$data_update_naik = array('ranking' => $ranking_new_naik); 
					$this->PenggunaM->update_acc_barang_rab($kode_acc_barang, $data_update_naik); //update datanya dia

					//turunin
					$ranking_new_turun = (int)$kode_min_1->ranking -1; //rankingnya dikurangi 1
					$data_update_turun = array('ranking' => $ranking_new_turun);
					$this->PenggunaM->update_acc_barang_rab($kode_min_1->kode_acc_barang, $data_update_turun); //update data kode acc+1
					$this->session->set_flashdata('sukses','Berhasil');
					redirect_back(); 
				}else{
					$this->session->set_flashdata('error','Ranking sudah terendah');
					redirect_back(); 
				}
			}else{
				$kode_min_1 = $this->PenggunaM->cek_barang_by_rank($ranking+1)->result()[0];
					//naikin
				$ranking_new_naik = (int)$ranking +1;
				$data_update_naik = array('ranking' => $ranking_new_naik);
				$this->PenggunaM->update_acc_barang_rab($kode_acc_barang, $data_update_naik);
					//turunin
				$ranking_new_turun = (int)$kode_min_1->ranking -1;
				$data_update_turun = array('ranking' => $ranking_new_turun);
				$this->PenggunaM->update_acc_barang_rab($kode_min_1->kode_acc_barang, $data_update_turun);
				$this->session->set_flashdata('sukses','Berhasil');
				redirect_back(); 
			}
		}elseif ($kode_jenis_pengajuan == 2) {//mahasiswa
			if($ranking == $rank_max_rab){ //rank nya max(terbesar)
				$this->session->set_flashdata('error','Ranking sudah terendah');
				redirect_back(); 
			}elseif ($ranking == $rank_min_rab){ //ranknya terkecil
				if($kode_min_1_row = $this->PenggunaM->cek_rab_by_rank($ranking+1)->result() != NULL){
					$kode_min_1 = $this->PenggunaM->cek_rab_by_rank($ranking+1)->result()[0]; //simpan id rank+1
					//naikin
					$ranking_new_naik = (int)$ranking +1; //ranking nya dikurangin 1
					$data_update_naik = array('ranking' => $ranking_new_naik); 
					$this->PenggunaM->update_acc_barang_rab($kode_acc_barang, $data_update_naik); //update datanya dia

					//turunin
					$ranking_new_turun = (int)$kode_min_1->ranking -1; //rankingnya dikurangi 1
					$data_update_turun = array('ranking' => $ranking_new_turun);
					$this->PenggunaM->update_acc_barang_rab($kode_min_1->kode_acc_barang, $data_update_turun); //update data kode acc+1
					$this->session->set_flashdata('sukses','Berhasil');
					redirect_back(); 
				}else{
					$this->session->set_flashdata('error','Ranking sudah terendah');
					redirect_back(); 
				}
			}else{
				$kode_min_1 = $this->PenggunaM->cek_rab_by_rank($ranking+1)->result()[0];
					//naikin
				$ranking_new_naik = (int)$ranking +1;
				$data_update_naik = array('ranking' => $ranking_new_naik);
				$this->PenggunaM->update_acc_barang_rab($kode_acc_barang, $data_update_naik);
					//turunin
				$ranking_new_turun = (int)$kode_min_1->ranking -1;
				$data_update_turun = array('ranking' => $ranking_new_turun);
				$this->PenggunaM->update_acc_barang_rab($kode_min_1->kode_acc_barang, $data_update_turun);
				$this->session->set_flashdata('sukses','Berhasil');
				redirect_back(); 
			}
		}

	}

	// Prosedur
	public function aktif_pro($kode_doc){ //aktifasi akun pengguna
		$this->PenggunaM->aktif_pro($kode_doc);
		redirect('PenggunaC/prosedur');
	}

    public function non_aktif_pro($kode_doc){ //deaktifasi akun pengguna
    	$this->PenggunaM->non_aktif_pro($kode_doc);
    	redirect('PenggunaC/prosedur');
    }



	// =================================POST+POST+POST+POST=================================

	public function edit_data_diri($no_identitas){ //edit data diri
		$this->form_validation->set_rules('jen_kel', 'Jenis Kelamin','required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir','required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir','required');
		$this->form_validation->set_rules('alamat', 'Alamat','required');
		$this->form_validation->set_rules('no_hp', 'no_hp','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			redirect('PenggunaC/data_diri');
		}else{
			$jen_kel    = $_POST['jen_kel'];
			$tmp_lahir  = $_POST['tmp_lahir'];
			$tgl_lahir  = date('Y-m-d',strtotime($_POST['tgl_lahir']));
			$alamat     = $_POST['alamat'];
			$no_hp      = $_POST['no_hp'];

			$data = array(
				'jen_kel'     => $jen_kel,
				'tmp_lahir'   => $tmp_lahir,
				'tgl_lahir'   => $tgl_lahir,
				'alamat'      => $alamat,
				'no_hp'       => $no_hp
			);

			if($this->PenggunaM->edit_data_diri($no_identitas,$data)){
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect('PenggunaC/data_diri');
			}else{
				redirect('PenggunaC/data_diri');
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
			}	
		}
	}

	public function upload_image(){
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
        		$config['quality']= '75%';
        		$config['width']= '';
        		$config['height']= '';
        		$config['new_image']= './assets/image/profil/'.$gbr['file_name'];
        		$this->load->library('image_lib', $config);
        		// $this->image_lib->crop();
        		$this->image_lib->resize();

        		$gambar=$gbr['file_name'];
        		$this->PenggunaM->simpan_upload($id_pengguna,$gambar);
        		$this->session->set_flashdata('sukses','Foto berhasil diunggah');
        		redirect('PenggunaC/data_diri');
        		// echo "Image berhasil diupload";
        	}else{
        		$this->session->set_flashdata('error','Foto tidak berhasil diunggah. Ukuran terlalu besar');
        		redirect('PenggunaC/data_diri');
        	}

        }else{
        	$this->session->set_flashdata('error','Foto tidak berhasil diunggah');
        	redirect('PenggunaC/data_diri');
        }

    }

    public function post_ganti_password(){
    	$this->form_validation->set_rules('sandi_lama', 'Sandi Lama', 'trim|required|min_length[6]|max_length[50]');
    	$this->form_validation->set_rules('sandi_baru', 'Sandi Baru', 'trim|required|min_length[6]|max_length[50]');
    	$this->form_validation->set_rules('konfirmasi_sandi_baru', 'Konfirmasi Sandi Baru', 'trim|required|min_length[6]|max_length[50]|matches[sandi_baru]'); 
    	if ($this->form_validation->run() == FALSE)  
    	{  
    		$this->session->set_flashdata('Error','Input yang anda masukkan salah, silahkan dicoba lagi...');
    		redirect('PenggunaC/pengaturan_akun');
    	}else{ 
    		$sandi_lama   = $_POST['sandi_lama'];  
    		$sandi_baru   = $_POST['sandi_baru'];  
    		$id_pengguna  = $_POST['id_pengguna']; 

    		$sandi_baru   = $_POST['sandi_baru'];  
    		$passhash     = md5($sandi_baru);

    		$data_update  = array(
    			'password'        => $passhash);

    		$ada = $this->PenggunaM->cek_row($id_pengguna, $sandi_lama);
    		if($ada > 0){
    			if($this->PenggunaM->update_pass($id_pengguna, $data_update)){
    				$this->session->set_flashdata('sukses','Data berhasil dirubah');
    				redirect('PenggunaC/pengaturan_akun');
    			}else{
    				$this->session->set_flashdata('error','Data tidak berhasil dirubah');
    				redirect('PenggunaC/pengaturan_akun');
    			}
    		}else{
    			$this->session->set_flashdata('error','Kata sandi lama tidak cocok');
    			redirect('PenggunaC/pengaturan_akun');
    		}	
    	}
    }

    public function post_prosedur(){ //fungsi post pengajuan kegiatan pegawai
    	$this->form_validation->set_rules('tipe_doc', 'Tipe Dokumen','required');
    	if($this->form_validation->run() == FALSE){
    		$this->session->set_flashdata('error','Data prosedur anda tidak berhasil ditambahkan');
    		redirect('PenggunaC/prosedur');
    	}else{

    		$tipe_doc 	       		= $_POST['tipe_doc'];
    		$status 				= $_POST['status'];

    		$data_prosedur = array(
    			'tipe_doc' 			=> $tipe_doc,
    			'status' 			=> $status);


			$upload = $this->PenggunaM->upload_prosedur(); // lakukan upload file dengan memanggil function upload yang ada di UserM.php
			if($upload['result'] == "success"){ // Jika proses upload sukses
				$this->PenggunaM->save_prosedur($upload, $data_prosedur); // Panggil function save_prosedur yang ada di UserM.php untuk menyimpan data ke database
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
				$this->session->set_flashdata('error','Data pengajuan kegiatan anda tidak berhasil ditambahkan');
				redirect('PenggunaC/prosedur');
			}
			$this->session->set_flashdata('sukses','Data pengajuan kegiatan anda berhasil ditambahkan');
			redirect('PenggunaC/prosedur');
		}
	}
}