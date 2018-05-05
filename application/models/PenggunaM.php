 <?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class PenggunaM extends CI_Model  
 {  
 	function __construct(){
 		parent:: __construct();
 		$this->load->database();
 	}

 	// UMUM
 	public function insert_data_pengguna($data){ //post pengguna
 		$this->db->insert('pengguna', $data);
 		return $this->db->insert_id();

 	}

 	public function insert_data_diri($data){
 		$this->db->insert('data_diri', $data);
 		return TRUE;
 	}

 	public function hapus_id($id){
 		$this->db->where('no_identitas', $id);
 		$this->db->delete('data_diri');
 		return TRUE;
 	}

 	public function hapus_data_pengguna($id){
 		$this->db->where('id_pengguna', $id);
 		$this->db->delete('pengguna');
 		return TRUE;
 	}

 	public function get_pengguna_by_id($id_pengguna){
 		$this->db->select('status_email');
 		$this->db->from('pengguna');
 		$this->db->where('id_pengguna', $id_pengguna);
 		return $this->db->get();
 	}

 	public function insert_data_resend($data, $id_pengguna){ //post resend data email
 		$this->db->where('id_pengguna',$id_pengguna); 
 		return $this->db->update('pengguna',$data);
 	}  

 	public function get_pengguna_by_email($key){
		// $this->db->select('')
 		$this->db->where('md5(email)', $key);
 		$query = $this->db->get('pengguna');
 		return $query;
 	}

 	public function delete_pengguna_by_email($key){
 		$this->db->where('md5(email)', $key);
 		$this->db->delete('pengguna');
 		return TRUE;
 	}
 	
 	public function delete_data_diri_by_no_identitas($no_identitas){
 		$this->db->where('no_identitas', $no_identitas);
 		$this->db->delete('data_diri');
 		return TRUE;
 	}

 	public function verifyemail($key){  //post konfirmasi email ubah value status_email jadi 1 (aktif)
 		$data = array(
 			'status_email' => '1',
 		);  
 		$this->db->where('md5(email)', $key);
 		return $this->db->update('pengguna', $data);  
 	}

 	public function get_data_diri(){ //ambil data diri user berdasarkan session
 		$id_pengguna = $this->session->userdata('id_pengguna');
 		$this->db->select('*');
 		$this->db->from('pengguna');
 		$this->db->where('pengguna.id_pengguna', $id_pengguna);
 		$this->db->join('data_diri', 'pengguna.no_identitas = data_diri.no_identitas');
 		$this->db->join('jabatan_unit', 'pengguna.kode_jabatan_unit = jabatan_unit.kode_jabatan_unit');
 		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
 		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
 		$query = $this->db->get();
 		if($query){
 			return $query;
 		}else{
 			return null;
 		}
 	} 

	public function edit_data_diri($no_identitas, $data){ //edit data diri
		$this->db->where('no_identitas', $no_identitas);
		$this->db->update('data_diri', $data);
		return TRUE;
	}

	public function simpan_upload($id_pengguna, $gambar){ // Fungsi untuk menyimpan data ke database
		$data = array(
			'file_profil' 	=> $gambar
		);
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('pengguna', $data);
	}

	public function get_akses_menu(){
		$kode_jabatan_unit 	= $this->session->userdata('kode_jabatan_unit');
		$this->db->select('kode_menu');
		$this->db->from('akses_menu');
		$this->db->where('akses_menu.kode_jabatan_unit', $kode_jabatan_unit);
		$query = $this->db->get();
		return $query;
	}

	public function cek_row($id_pengguna, $password){ //cek akun di db pengguna jabatan (berapa rows)
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->where('password', md5($password));
		return $this->db->get('pengguna')->num_rows();
	}

	public function update_pass($id_pengguna, $data){
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('pengguna', $data);
		return TRUE;
	}

	public function get_data_pengguna(){ //ambil data seluruh pengguna yang terdaftar
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->join('data_diri', 'pengguna.no_identitas = data_diri.no_identitas');
		$query = $this->db->get(); 
		return $query;
	}

	public function get_data_diri_by_id($id_pengguna){ //ambil data diri user berdasarkan session
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('pengguna.id_pengguna', $id_pengguna);
		$this->db->join('data_diri', 'pengguna.no_identitas = data_diri.no_identitas');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	}

	public function aktif($id_pengguna){ //aktifasi akun pengguna
		$status = "aktif";
		$data = array('status' =>$status);

		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('pengguna', $data);
		return TRUE;
	}

	public function non_aktif($id_pengguna){ //deaktifasi akun pengguna
		$status = "tidak aktif";
		$data = array('status' =>$status);

		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('pengguna', $data);
		return TRUE;
	}

	public function insert($db, $data){
		return $query = $this->db->insert($db, $data);
	}

	public function update($id, $kode, $db, $data){
		$this->db->where($kode, $id);
		return $query = $this->db->update($db, $data);
	}

	public function cek_kode_jabatan_unit($kode_unit, $kode_jabatan){
		$this->db->select('kode_jabatan_unit');
		$this->db->from('jabatan_unit');
		$this->db->where('kode_unit', $kode_unit);
		$this->db->where('kode_jabatan', $kode_jabatan);
		$query = $this->db->get();
		return $query;
	}

	public function get_data_pengajuan($kode_jenis_kegiatan){
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->join('jenis_kegiatan', 'jenis_kegiatan.kode_jenis_kegiatan = kegiatan.kode_jenis_kegiatan');
		$this->db->join('file_upload', 'file_upload.kode_kegiatan = kegiatan.kode_kegiatan');
		$this->db->join('pengguna', 'pengguna.id_pengguna = kegiatan.id_pengguna');
		$this->db->join('data_diri', 'data_diri.no_identitas = pengguna.no_identitas');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->where('kegiatan.kode_jenis_kegiatan', $kode_jenis_kegiatan);
		$this->db->order_by('kegiatan.created_at', 'DESC');
		$this->db->group_by('kegiatan.kode_kegiatan');
 		// $this->db->where('progress.kode_nama_progress = "1"');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	}

	public function get_kegiatan_pegawai(){ //menampilkan kegiatan yang diajukan user sebagai pegwai
		$id_pengguna = $this->session->userdata('id_pengguna');
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->join('pengguna', 'pengguna.id_pengguna = kegiatan.id_pengguna');
		$this->db->join('file_upload', 'kegiatan.kode_kegiatan = file_upload.kode_kegiatan');
		$this->db->where('pengguna.id_pengguna', $id_pengguna);

		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	} 

	// =====Konfigurasi Sistem=======
	//acc kegiatan (persetujuan  kegiatan)
	public function get_persetujuan_kegiatan(){
		$this->db->select('*');
		$this->db->from('acc_kegiatan');
		$this->db->join('pengguna','pengguna.id_pengguna = acc_kegiatan.id_pengguna');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->join('data_diri', 'pengguna.no_identitas = data_diri.no_identitas');
		$this->db->join('jenis_kegiatan','acc_kegiatan.kode_jenis_kegiatan = jenis_kegiatan.kode_jenis_kegiatan');
		return $query = $this->db->get();
	}

	public function hapus($id){//hapus persetujuan kegiatan
		$this->db->where('kode_acc_kegiatan', $id);
		$this->db->delete('acc_kegiatan');
		return "berhasil";
	}

	public function get_pilihan_jabatan_by_id($id){ //mengambil jabatan dari db jabatan berdasarkan id
		$this->db->where('kode_jabatan', $id);
		$query = $this->db->get('jabatan');	
		return $query;
	}

	public function get_nama_progress(){
		return $query = $this->db->get('nama_progress');
	}
	public function get_nama_progress_by_id($id){
		$this->db->where('kode_nama_progress', $id);
		return $query = $this->db->get('nama_progress');
	}

	//jenis kegiatan
	public function get_jenis_kegiatan(){
		$this->db->select('*');
		$this->db->from('jenis_kegiatan');
		return $query = $this->db->get();
	}
	public function get_jenis_kegiatan_by_id($id){
		$this->db->where('kode_jenis_kegiatan', $id);
		return $query = $this->db->get('jenis_kegiatan');
	}

	//jenis barang
	public function get_jenis_barang(){
		return $query = $this->db->get('jenis_barang');
	}
	public function get_jenis_barang_by_id($id){
		$this->db->where('kode_jenis_barang', $id);
		return $query = $this->db->get('jenis_barang');
	}

	// jabatan
	public function get_pilihan_jabatan(){ //mengambil jabatan dari db jabatan
		$query = $this->db->get('jabatan');	
		return $query;
	}

	// Unit
	public function get_pilihan_unit(){
		$query = $this->db->get('unit');
		return $query;
	}
	public function get_pilihan_unit_by_id($id){ //mengambil jabatan dari db jabatan berdasarkan id
		$this->db->where('kode_unit', $id);
		$query = $this->db->get('unit');	
		return $query;
	}


	// Prosedur
	public function get_prosedur_pegawai(){
		$this->db->select('*');
		$this->db->from('dokumen_prosedur');
		$this->db->where('status = "aktif"');
		$this->db->where('tipe_doc = "pegawai"');
		$this->db->order_by('created_at','DESC');
		if($query = $this->db->get()){
			return $query;
		}else{
			return NULL;
		}
	}
	public function get_prosedur_mahasiswa(){
		$this->db->select('*');
		$this->db->from('dokumen_prosedur');
		$this->db->where('status = "aktif"');
		$this->db->where('tipe_doc = "mahasiswa"');
		$this->db->order_by('created_at','DESC');
		if($query = $this->db->get()){
			return $query;
		}else{
			return NULL;
		}
	}
	public function get_prosedur_barang(){
		$this->db->select('*');
		$this->db->from('dokumen_prosedur');
		$this->db->where('status = "aktif"');
		$this->db->where('tipe_doc = "barang"');
		$this->db->order_by('created_at','DESC');
		if($query = $this->db->get()){
			return $query;
		}else{
			return NULL;
		}
	}

	public function get_prosedur(){
		$this->db->order_by('created_at','DESC');
		$query = $this->db->get('dokumen_prosedur');
		return $query;
	}

	public function upload_prosedur(){ // Fungsi untuk upload file ke folder
		$config['upload_path'] = './assets/file_prosedur';
		$config['allowed_types'] = 'pdf';
		$config['remove_space'] = TRUE;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file_upload')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function save_prosedur($upload, $data_prosedur){ // Fungsi untuk menyimpan data ke database
		$data = array(
			'tipe_doc'		=> $data_prosedur['tipe_doc'],
			'nama_file' 	=> $upload['file']['file_name'],
			'size' 			=> $upload['file']['file_size']
		);
		$this->db->insert('dokumen_prosedur', $data);
	}

	public function aktif_pro($kode_doc){ //aktifasi akun pengguna
		$status = "aktif";
		$data = array('status' =>$status);

		$this->db->where('kode_doc', $kode_doc);
		$this->db->update('dokumen_prosedur', $data);
		return TRUE;
	}

	public function non_aktif_pro($kode_doc){ //deaktifasi akun pengguna
		$status = "tidak";
		$data = array('status' =>$status);

		$this->db->where('kode_doc', $kode_doc);
		$this->db->update('dokumen_prosedur', $data);
		return TRUE;
	}

	// Akses Menu

	public function get_akses_menu_2(){
		$this->db->select('*');
		$this->db->from('akses_menu');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = akses_menu.kode_jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->join('menu','akses_menu.kode_menu = menu.kode_menu');
		// $this->db->group_by('akses_menu.kode_menu');
		$query = $this->db->get();
		return $query;
	}

	public function get_jabatan_unit(){
		$this->db->select('*');
		$this->db->from('jabatan_unit');
		$this->db->join('akses_menu', 'akses_menu.kode_jabatan_unit = jabatan_unit.kode_jabatan_unit');
		$this->db->join('menu', 'akses_menu.kode_menu = menu.kode_menu');
		$query = $this->db->get();
		return $query;
	}
}