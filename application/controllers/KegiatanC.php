<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class KegiatanC extends CI_Controller {

	var $data = array();
	private $data_menu;

	public function __construct(){
		parent::__construct();
		$this->load->model(['PenggunaM','KegiatanM']);
		in_access(); //helper buat batasi akses login/session

		$data_akses_menu = $this->PenggunaM->get_akses_menu()->result();
		$data_array_akses_menu = array();
		foreach ($data_akses_menu as $menu) {
			array_push($data_array_akses_menu, $menu->kode_menu);
		}
		$this->data_menu = $data_array_akses_menu; // array akses menu berdasarkan user login
	}

	public function persetujuan_kegiatan_mahasiswa(){ //halaman persetujuan kegiatan
		if(in_array(1, $this->data_menu)){
			$data['menu'] = $this->data_menu;
			$id_pengguna = $this->session->userdata('id_pengguna');
		$kode_jenis_kegiatan = 2; //kegiatan mahasiswa
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Persetujuan Kegiatan Mahasiswa | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$this->data['data_pengajuan_kegiatan_mahasiswa'] = $this->KegiatanM->get_data_pengajuan($kode_jenis_kegiatan)->result();
		$this->data['KegiatanM'] = $this->KegiatanM ;
		$this->data['cek_max'] = $this->KegiatanM->cek_max();
		$this->data['cek_id_staf_keu'] = $this->KegiatanM->cek_id_staf_keu()->result();	
		$this->data['data_diri'] = $data_diri; //get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('pengguna/persetujuan_kegiatan_mahasiswa_content', $this->data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}else{
		redirect('LoginC/logout');
	}
}

	public function detail_progress($id){ //menampilkan modal dengan isi dari detail_kegiatan.php
		$data['detail_progress']	= $this->KegiatanM->get_detail_progress_staf($id)->result();
		$this->load->view('pengguna/detail_progress', $data);
	}

	// public function detail_progress_staf($id){ //menampilkan modal dengan isi dari detail_kegiatan.php
	// 	$data['detail_progress']	= $this->KegiatanM->get_detail_progress_staf($id)->result();
	// 	$this->load->view('pengguna/detail_progress', $data);
	// }

	public function detail_kegiatan($id){ //menampilkan modal dengan isi dari detail_kegiatan.php
		$data['detail_kegiatan'] 	= $this->KegiatanM->get_data_pengajuan_by_id($id)->result()[0];
		$data['data_diri'] 			= $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$this->load->view('pengguna/detail_kegiatan', $data);
	}

	public function detail_pengajuan($id){ //menampilkan modal dengan isi dari detail_pengajuan.php
		$data['menu'] = $this->data_menu;
		$data['detail_kegiatan'] 	= $this->KegiatanM->get_data_pengajuan_by_id($id)->result()[0];
		$data['data_diri'] 			= $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['nama_progress'] 		= $this->KegiatanM->get_pilihan_nama_progress()->result();
		$this->load->view('pengguna/detail_pengajuan', $data);
	}

	public function detail_pengajuan_staf($id){ //menampilkan modal dengan isi dari detail_pengajuan.php
		$data['menu'] = $this->data_menu;
		$data['detail_kegiatan'] 	= $this->KegiatanM->get_data_pengajuan_by_id($id)->result()[0];
		$data['data_diri'] 			= $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['nama_progress'] 		= $this->KegiatanM->get_pilihan_nama_progress()->result();
		$this->load->view('pengguna/detail_pengajuan_staf', $data);
	}

	public function edit_pengajuan($id){ //menampilkan modal dengan isi dari detail_pengajuan.php
		$data['detail_kegiatan'] 	= $this->KegiatanM->get_data_pengajuan_by_id($id)->result()[0];
		$data['data_diri'] 			= $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['nama_progress'] 		= $this->KegiatanM->get_pilihan_nama_progress()->result();
		$this->load->view('pengguna/edit_pengajuan', $data);
	}

	public function persetujuan_kegiatan_pegawai(){ //halaman persetujuan kegiatan pegawai (kadep)
		if(in_array(2, $this->data_menu)){
			$data['menu'] = $this->data_menu;
			$no_identitas = $this->session->userdata('no_identitas');
		$kode_jenis_kegiatan = 1; //kegiatan pegawai
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Persetujuan Kegiatan Pegawai | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$this->data['data_pengajuan_kegiatan_pegawai'] = $this->PenggunaM->get_data_pengajuan($kode_jenis_kegiatan)->result();
		$this->data['KegiatanM'] = $this->KegiatanM ;	
		$this->data['cek_id_staf_keu'] = $this->KegiatanM->cek_id_staf_keu()->result();
		$this->data['cek_max_pegawai'] = $this->KegiatanM->cek_max_pegawai();	
		$this->data['KegiatanM'] = $this->KegiatanM ;
		$this->data['data_diri'] = $data_diri;  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('pengguna/persetujuan_kegiatan_pegawai_content', $this->data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}else{
		redirect('LoginC/logout');
	}
}

public function riwayat_pengajuan(){ 
	if(in_array(20, $this->data_menu)){
		$data['menu'] = $this->data_menu;
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Riwayat Pengajuan Unit | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$this->data['data_kegiatan'] = $this->KegiatanM->get_kegiatan_unit()->result();
		$this->data['data_diri'] = $data_diri;  	//get data diri buat nampilin nama di pjok kanan
		$this->data['data_prosedur'] = $this->PenggunaM->get_prosedur()->result();
		$data['body'] = $this->load->view('pengguna/riwayat_pengajuan_content', $this->data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}else{
		redirect('LoginC/logout');
	}
}

	public function persetujuan_kegiatan_staf(){ //halaman persetujuan kegiatan staf (manajer keuangan)
		if(in_array(3, $this->data_menu)){
			$data['menu'] = $this->data_menu;
			$id_pengguna = $this->session->userdata('id_pengguna');
			$kode_unit 	= $this->session->userdata('kode_unit');
			$kode_jabatan = $this->session->userdata('kode_jabatan');

		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Persetujuan Kegiatan Staf | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$this->data['cek_id_staf_keu'] = $this->KegiatanM->cek_id_staf_keu()->result();
		$this->data['cek_min_pegawai'] = $this->KegiatanM->cek_min_pegawai();
		$this->data['data_pengajuan_kegiatan'] = $this->KegiatanM->get_data_pengajuan_staf($kode_unit, $kode_jabatan)->result();
		$this->data['KegiatanM'] = $this->KegiatanM ;
		$this->data['data_diri'] = $data_diri;  	//get data diri buat nampilin nama di pjok kanan
		$data['body'] = $this->load->view('pengguna/persetujuan_kegiatan_staf_content', $this->data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}else{
		redirect('LoginC/logout');
	}
}


public function pengajuan_kegiatan_mahasiswa(){
	if(in_array(6, $this->data_menu)){
		$data['menu'] = $this->data_menu;
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Pengajuan Kegiatan Mahasiswa | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;

		$this->data['data_kegiatan'] = $this->PenggunaM->get_kegiatan_pegawai()->result();	//menampilkan kegiatan yang diajukan user sebagai pegwai
		$this->data['cek_id_staf_keu'] = $this->KegiatanM->cek_id_staf_keu()->result();	
		$this->data['data_diri'] =	$data_diri;  	//get data diri buat nampilin nama di pjok kanan
		$this->data['KegiatanM'] = $this->KegiatanM ;
		$data['body'] = $this->load->view('pengguna/pengajuan_kegiatan_mahasiswa_content', $this->data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}else{
		redirect('LoginC/logout');
	}
}

	public function pengajuan_kegiatan_pegawai(){ //halaman pengajuan kegiatan
		if(in_array(7, $this->data_menu)){
			$data['menu'] = $this->data_menu;
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Pengajuan Kegiatan Pegawai | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$kode_unit = $this->session->userdata('kode_unit');
		$this->data['data_diri'] = $data_diri; //get data diri buat nampilin nama di pjok kanan
		$this->data['id_pimpinan'] = $this->KegiatanM->get_id_pimpinan($kode_unit)->result()[0];
		$this->data['cek_max_pegawai'] = $this->KegiatanM->cek_max_pegawai();	
		$this->data['cek_id_staf_keu'] = $this->KegiatanM->cek_id_staf_keu()->result();
		$this->data['data_kegiatan'] = $this->KegiatanM->get_kegiatan_pegawai()->result();	//menampilkan kegiatan yang diajukan user sebagai pegwai
		$this->data['KegiatanM'] = $this->KegiatanM ;	
		$data['body'] = $this->load->view('pengguna/pengajuan_kegiatan_pegawai_content', $this->data, true);
		$this->load->view('pengguna/index_template', $data);
	}else{
		redirect('LoginC/logout');
	}
}

	public function hapus_pengajuan($kode_kegiatan){//hapus pengajuan kegiatan
		define('EXT', '.'.pathinfo(__FILE__, PATHINFO_EXTENSION));
		// define('FCPATH', __FILE__);
		// define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
		define('PUBPATH',str_replace(SELF,'',FCPATH));

		$this->db->where('kode_kegiatan',$kode_kegiatan);
		$file = $this->db->get('file_upload')->row()->nama_file;

		if(unlink(PUBPATH."assets/file_upload/".$file)){
			if($this->KegiatanM->hapus_pengajuan($kode_kegiatan)){
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

	public function status_pengajuan_kegiatan_pegawai(){ //halaman index Sekretaris Departemen (dashboard)
		if(in_array(11, $this->data_menu)){
			$data['menu'] = $this->data_menu;
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$this->data['data_diri'] = $data_diri;  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Status Pengajuan Kegiatan Pegawai | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;
		$kode_jenis_kegiatan = 1; //kegiatan mahasiswa
		$this->data['data_pengajuan_kegiatan'] = $this->KegiatanM->get_data_pengajuan($kode_jenis_kegiatan)->result();
		$this->data['KegiatanM'] = $this->KegiatanM ;
		$this->data['cek_min_pegawai'] = $this->KegiatanM->cek_min_pegawai();
		$this->data['cek_id_staf_keu'] = $this->KegiatanM->cek_id_staf_keu()->result();
		$data['body'] = $this->load->view('pengguna/status_pengajuan_kegiatan_pegawai_content', $this->data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}else{
		redirect('LoginC/logout');
	}
}

	public function status_pengajuan_kegiatan_mahasiswa(){ //halaman index Sekretaris Departemen (dashboard)
		if(in_array(10, $this->data_menu)){
			$data['menu'] = $this->data_menu;
		$data_diri = $this->PenggunaM->get_data_diri()->result()[0];  	//get data diri buat nampilin nama di pjok kanan
		$this->data['data_diri'] = $data_diri;  	//get data diri buat nampilin nama di pjok kanan
		$data['title'] = "Status Pengajuan Kegiatan Pegawai | ".$data_diri->nama_jabatan." ".$data_diri->nama_unit;

		$kode_jenis_kegiatan = 2; //kegiatan mahasiswa
		$this->data['data_pengajuan_kegiatan'] = $this->KegiatanM->get_data_pengajuan($kode_jenis_kegiatan)->result();
		$this->data['KegiatanM'] = $this->KegiatanM ;
		$this->data['cek_min_mhs'] = $this->KegiatanM->cek_min_mhs();
		$this->data['cek_id_staf_keu'] = $this->KegiatanM->cek_id_staf_keu()->result();
		$data['body'] = $this->load->view('pengguna/status_pengajuan_kegiatan_mahasiswa_content', $this->data, true) ;
		$this->load->view('pengguna/index_template', $data);
	}else{
		redirect('LoginC/logout');
	}
}




	// =================================POST+POST+POST+POST=================================



	public function post_progress(){ //posting progress dan update kegiatan (dana disetujuin)
		$this->form_validation->set_rules('kode_jabatan_unit', 'Kode Jabatan Unit','required');
		$this->form_validation->set_rules('id_pengguna', 'No Identitas','required');
		$this->form_validation->set_rules('kode_fk', 'Kode Kegiatan','required');
		$this->form_validation->set_rules('kode_nama_progress', 'Nama Progress','required'); //diterima/ditolak
		$this->form_validation->set_rules('komentar', 'Komentar','required');
		$this->form_validation->set_rules('jenis_progress', 'Jenis Progress','required'); //kegiatan/barang
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data Anda tidak berhasil disimpan, periksa lagi data yang Anda masukkan');
			redirect_back(); //kembali ke halaman sebelumnya -> helper
		}else{
			$kode_jabatan_unit	= $_POST['kode_jabatan_unit'];
			$id_pengguna		= $_POST['id_pengguna'];
			$kode_fk			= $_POST['kode_fk'];
			$kode_nama_progress	= $_POST['kode_nama_progress'];
			$komentar			= $_POST['komentar'];
			$jenis_progress		= $_POST['jenis_progress'];
			$email				= $_POST['email'];

			$format_tgl 	= "%Y-%m-%d";
			$tgl_progress 	= mdate($format_tgl);
			$format_waktu 	= "%H:%i:%s";
			$waktu_progress	= mdate($format_waktu);

			$data = array(
				'kode_jabatan_unit' 	=> $kode_jabatan_unit,
				'id_pengguna' 			=> $id_pengguna,
				'kode_fk'				=> $kode_fk,
				'kode_nama_progress' 	=> $kode_nama_progress,
				'komentar'				=> $komentar,
				'jenis_progress'		=> $jenis_progress,
				'tgl_progress'			=> $tgl_progress,
				'waktu_progress'		=> $waktu_progress

			);

			$progress_siapa = $this->KegiatanM->get_kegiatan_by_kode_fk($kode_fk)->result()[0]->kode_jenis_kegiatan;
			if($progress_siapa == "2"){ //mhs
				$rank_min 		=  $this->KegiatanM->cek_min_mhs()->ranking;
				$id_rank_min 	= $this->KegiatanM->cek_id_by_rank_mhs($rank_min)->kode_jabatan_unit;
			}elseif($progress_siapa == "1"){ //peg
				$rank_min 		=  $this->KegiatanM->cek_min_pegawai()->ranking;
				$id_rank_min 	= $this->KegiatanM->cek_id_by_rank_pegawai($rank_min)->kode_jabatan_unit;
			}
			if($this->KegiatanM->insert_progress($data)){ //insert progress
				if($id_rank_min == $kode_jabatan_unit && $kode_nama_progress == 1 && $jenis_progress != 'kegiatan_staf'){ //disetujui oleh rank min
					$data_update_kegiatan  = array('status_kegiatan' => 'Disetujui');
					$this->KegiatanM->update_kegiatan($kode_fk, $data_update_kegiatan);
					$this->sendemail($email, $kode_fk, $kode_nama_progress);
				}
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan');
				redirect_back(); // redirect kembali ke halaman sebelumnya
			}else{
				if($kode_nama_progress == 2){
					$this->sendemail($email, $kode_fk, $kode_nama_progress);
				}
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back(); //kembali ke halaman sebelumnya -> helper
			}
		}
	}

	public function sendemail($email,$kode_kegiatan, $kode_nama_progress){   //kirim email konfirmasi
		$from_mail  = 'dtedi.svugm@gmail.com';
		$to         = $email;

		$subject    = 'Pembaruan Status';

		$kegiatan 	= $this->KegiatanM->get_data_pengajuan_by_id($kode_kegiatan)->result()[0];

		$data       = array(
			'nama_kegiatan'=> $kegiatan->nama_kegiatan,
			'nama_pengaju'=> $kegiatan->nama,
			'tgl_kegiatan_mulai'=> $kegiatan->tgl_kegiatan,
			'tgl_kegiatan_selesai'=> $kegiatan->tgl_selesai_kegiatan,
			'dana_diajukan'=> $kegiatan->dana_diajukan,
			'kode_nama_progress' => $kode_nama_progress
		);

		$message    = $this->load->view('notifikasi_email.php',$data,TRUE);
    // '<h1>'.$url.'</h1><span style="color: red;"> Departemen Teknik Elektro dan Informatika </span>';

		$headers    = 'MIME-Version: 1.0' . "\r\n";
		$headers    .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers    .= 'To:  <'.$to.'>' . "\r\n";
		$headers    .= 'From: Departemen Teknik Elektro dan Informatika <'.$from_mail.'>' . "\r\n";

		$sendtomail = mail($to, $subject, $message, $headers);
	}

	public function post_pengajuan_kegiatan_mahasiswa(){ //fungsi post pengajuan kegiatan mahasiswa
		$this->form_validation->set_rules('id_pengguna', 'ID Pengguna','required');
		$this->form_validation->set_rules('kode_jenis_kegiatan', 'Kode Jenis Kegiatan','required');
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan','required');
		$this->form_validation->set_rules('tgl_kegiatan', 'Tanggal Kegiatan','required');
		$this->form_validation->set_rules('tgl_selesai_kegiatan', 'Tanggal Selesai Kegiatan','required');
		$this->form_validation->set_rules('dana_diajukan', 'Dana Diajukan','required');
		$this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan');
			redirect('KegiatanC/pengajuan_kegiatan_mahasiswa');
		}else{
			$id_pengguna 			= $_POST['id_pengguna'];
			$kode_jenis_kegiatan 	= $_POST['kode_jenis_kegiatan'];
			$nama_kegiatan 			= $_POST['nama_kegiatan'];
			$tgl_kegiatan 			= date('Y-m-d',strtotime($_POST['tgl_kegiatan']));
			$tgl_selesai_kegiatan 	= date('Y-m-d',strtotime($_POST['tgl_selesai_kegiatan']));
			$dana_diajukan 			= $_POST['dana_diajukan'];
			$dana_diajukan 			= str_replace('.', '', $dana_diajukan);
			$dana_diajukan 			= str_replace('Rp', '', $dana_diajukan);
			$tgl_pengajuan 			= $_POST['tgl_pengajuan'];

			$data_pengajuan_kegiatan = array(
				'id_pengguna' 			=> $id_pengguna,
				'kode_jenis_kegiatan' 	=> $kode_jenis_kegiatan,
				'nama_kegiatan' 		=> $nama_kegiatan,
				'tgl_kegiatan'			=> $tgl_kegiatan,
				'tgl_selesai_kegiatan'	=> $tgl_selesai_kegiatan,
				'dana_diajukan' 		=> $dana_diajukan,
				'tgl_pengajuan'			=> $tgl_pengajuan);

			$insert_id = $this->KegiatanM->insert_pengajuan_kegiatan($data_pengajuan_kegiatan);
				if($insert_id){ //get last insert id
					$upload = $this->KegiatanM->upload($insert_id); // lakukan upload file dengan memanggil function upload yang ada di KegiatanM.php
				if($upload['result'] == "success"){ // Jika proses upload sukses
					$this->KegiatanM->save($upload,$insert_id); // Panggil function save yang ada di KegiatanM.php untuk menyimpan data ke database
				}else{ // Jika proses upload gagal
					$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
					$this->KegiatanM->delete($insert_id);//hapus data pengajuan kegiatan ketka gagal upload file
					$this->session->set_flashdata('error','Data pengajuan kegiatan anda tidak berhasil ditambahkan');
					redirect('KegiatanC/pengajuan_kegiatan_mahasiswa');
				}
				$this->session->set_flashdata('sukses','Data pengajuan kegiatan anda berhasil ditambahkan');
				redirect('KegiatanC/pengajuan_kegiatan_mahasiswa');
			}else{
				$this->session->set_flashdata('error','Data pengajuan kegiatan anda tidak berhasil ditambahkan');
				redirect('KegiatanC/pengajuan_kegiatan_mahasiswa');
			}
		}
	}

	public function post_pengajuan_kegiatan_pegawai(){ //fungsi post pengajuan kegiatan pegawai
		$this->form_validation->set_rules('id_pengguna', 'ID Pengguna','required');
		$this->form_validation->set_rules('pimpinan', 'ID Pimpinan','required');
		$this->form_validation->set_rules('kode_jenis_kegiatan', 'Kode Jenis Kegiatan','required');
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan','required');
		$this->form_validation->set_rules('tgl_kegiatan', 'Tanggal Kegiatan','required');
		$this->form_validation->set_rules('tgl_selesai_kegiatan', 'Tanggal Selesai Kegiatan','required');
		$this->form_validation->set_rules('dana_diajukan', 'Dana Diajukan','required');
		$this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil ditambahkan');
			redirect('KegiatanC/pengajuan_kegiatan_pegawai');
		}else{
			$kode_jabatan_unit 	    = $_POST['kode_jabatan_unit'];
			$id_pengguna 	       	= $_POST['id_pengguna'];
			$pimpinan 	       		= $_POST['pimpinan'];
			$kode_jenis_kegiatan 	= $_POST['kode_jenis_kegiatan'];
			$nama_kegiatan 			= $_POST['nama_kegiatan'];
			$tgl_kegiatan 			= date('Y-m-d',strtotime($_POST['tgl_kegiatan']));
			$tgl_selesai_kegiatan 	= date('Y-m-d',strtotime($_POST['tgl_selesai_kegiatan']));
			$dana_diajukan 			= $_POST['dana_diajukan'];
			$dana_diajukan = str_replace('.', '', $dana_diajukan);
			$dana_diajukan = str_replace('Rp', '', $dana_diajukan);

			$tgl_pengajuan 			= $_POST['tgl_pengajuan'];

			$data_pengajuan_kegiatan = array(
				'id_pengguna' 			=> $id_pengguna,
				'kode_jenis_kegiatan' 	=> $kode_jenis_kegiatan,
				'nama_kegiatan' 		=> $nama_kegiatan,
				'tgl_kegiatan'			=> $tgl_kegiatan,
				'tgl_selesai_kegiatan'	=> $tgl_selesai_kegiatan,
				'dana_diajukan' 		=> $dana_diajukan,
				'tgl_pengajuan'			=> $tgl_pengajuan,
				'pimpinan'				=> $pimpinan);

			

			$insert_id = $this->KegiatanM->insert_pengajuan_kegiatan($data_pengajuan_kegiatan);
			if($insert_id){ //get last insert id
				$upload = $this->KegiatanM->upload($insert_id); // lakukan upload file dengan memanggil function upload yang ada di KegiatanM.php
				if($upload['result'] == "success"){ // Jika proses upload sukses
					$this->KegiatanM->save($upload,$insert_id); // Panggil function save yang ada di KegiatanM.php untuk menyimpan data ke database

					$format_tgl 	= "%Y-%m-%d";
					$tgl_progress 	= mdate($format_tgl);
					$format_waktu 	= "%H:%i:%s";
					$waktu_progress	= mdate($format_waktu);

					$kode_nama_progress	= "1";
					$komentar			= "Disetujui";
					$jenis_progress		= "kegiatan";

					$data = array(
						'kode_jabatan_unit	' 	=> $kode_jabatan_unit,
						'id_pengguna	' 		=> $id_pengguna,
						'kode_fk'				=> $insert_id,
						'kode_nama_progress' 	=> $kode_nama_progress,
						'komentar'				=> $komentar,
						'jenis_progress'		=> $jenis_progress,
						'tgl_progress'			=> $tgl_progress,
						'waktu_progress'		=> $waktu_progress

					);
					// $rank_pengaju = $this->KegiatanM->cek_rank_by_id_pegawai($kode_jabatan_unit)->ranking;
					// $rank_min_pegawai =  $this->KegiatanM->cek_min_pegawai()->ranking;
					// $rank_max_pegawai =  $this->KegiatanM->cek_max_pegawai()->ranking;

					// if($rank_pengaju == $rank_min_pegawai && $rank_pengaju == $rank_max_pegawai){
					// $this->KegiatanM->insert_progress($data); //insert progress langsung ketika mengajukan kegiatan rank tertinggi
					// }
				}else{ // Jika proses upload gagal
					$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
					$this->KegiatanM->delete($insert_id);//hapus data pengajuan kegiatan ketka gagal upload file
					$this->session->set_flashdata('error','Data pengajuan kegiatan anda tidak berhasil ditambahkan');
					redirect('KegiatanC/pengajuan_kegiatan_pegawai');
				}
				$this->session->set_flashdata('sukses','Data pengajuan kegiatan anda berhasil ditambahkan');
				redirect('KegiatanC/pengajuan_kegiatan_pegawai');
			}else{
				$this->session->set_flashdata('error','Data pengajuan kegiatan anda tidak berhasil ditambahkan');
				redirect('KegiatanC/pengajuan_kegiatan_pegawai');
			}
		}
	}

	public function post_ubah_pengajuan_kegiatan(){ //fungsi post pengajuan kegiatan pegawai
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan','required');
		$this->form_validation->set_rules('kode_kegiatan', 'Kode Kegiatan','required');
		$this->form_validation->set_rules('tgl_kegiatan', 'Tanggal Kegiatan','required');
		$this->form_validation->set_rules('tgl_selesai_kegiatan', 'Tanggal Selesai Kegiatan','required');
		$this->form_validation->set_rules('dana_diajukan', 'Dana Diajukan','required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data Pengajuan Kegiatan anda tidak berhasil diubah');
			redirect_back();
		}else{
			$kode_kegiatan 			= $_POST['kode_kegiatan'];
			$nama_kegiatan 			= $_POST['nama_kegiatan'];
			$tgl_kegiatan 			= date('Y-m-d',strtotime($_POST['tgl_kegiatan']));
			$tgl_selesai_kegiatan 	= date('Y-m-d',strtotime($_POST['tgl_selesai_kegiatan']));
			$dana_diajukan 			= $_POST['dana_diajukan'];
			$dana_diajukan 			= $_POST['dana_diajukan'];
			$dana_diajukan 			= str_replace('.', '', $dana_diajukan);
			$dana_diajukan 			= str_replace('Rp', '', $dana_diajukan);

			$data_ubah_pengajuan_kegiatan = array(
				'nama_kegiatan' 		=> $nama_kegiatan,
				'tgl_kegiatan'			=> $tgl_kegiatan,
				'tgl_selesai_kegiatan'	=> $tgl_selesai_kegiatan,
				'dana_diajukan' 		=> $dana_diajukan);

			$insert_id = $this->KegiatanM->insert_ubah_pengajuan_kegiatan($kode_kegiatan, $data_ubah_pengajuan_kegiatan);
			if($insert_id){ //get last insert id

				if($upload = $this->KegiatanM->upload($kode_kegiatan)){ // lakukan upload file dengan memanggil function upload yang ada di KegiatanM.php
					if($upload['result'] == "success"){
						$this->KegiatanM->update_pengajuan($upload,$kode_kegiatan); // Panggil function save yang ada di KegiatanM.php untuk menyimpan data ke database
						$this->session->set_flashdata('sukses','Data pengajuan kegiatan anda berhasil diubah');
						redirect_back();
					}else{
						$data['message'] = $upload['error'];
						$this->session->set_flashdata('sukses','Data pengajuan kegiatan anda berhasil diubah, namun berkas tidak berhasil diubah'); //meskipun ga upload tapi data ttp update dan file tidak berubah
						redirect_back();
					}
				}else{
					$this->session->set_flashdata('error','Berkas pengajuan kegiatan anda tidak berhasil diubah');
					redirect_back();
				}
			}else{
				$this->session->set_flashdata('error','Data pengajuan kegiatan anda tidak berhasil diubah');
				redirect_back();
			}
		}
	}
}