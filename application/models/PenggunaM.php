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

 	public function get_pengguna_by_kode_jabatan_unit($kode_jabatan_unit, $status){
 		$this->db->select('*');
 		$this->db->from('pengguna');
 		$this->db->join('jabatan_unit','pengguna.kode_jabatan_unit = jabatan_unit.kode_jabatan_unit');
 		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
 		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
 		$this->db->where('jabatan_unit.kode_jabatan_unit', $kode_jabatan_unit);
 		$this->db->where('pengguna.status', $status);
 		return $this->db->get();
 	}

 	public function get_jabatan_unit_by_unit($kode_unit){
 		$this->db->select('*');
 		$this->db->from('jabatan_unit');
 		$this->db->where('kode_unit', $kode_unit);
 		return $this->db->get()->num_rows();
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

	public function insert_akses_menu($data){
		$query = $this->db->insert('akses_menu', $data);
		return $query;
	}

	public function get_kode_jabatan_unit_by_menu($kode_menu){
		$this->db->select('kode_jabatan_unit');
		$this->db->from('akses_menu');
		$this->db->where('akses_menu.kode_menu', $kode_menu);
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
		$this->db->order_by('unit.kode_unit');
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
		$this->db->insert($db, $data);
		return $this->db->insert_id();
	}

	public function update($id, $kode, $db, $data){
		$this->db->where($kode, $id);
		return $query = $this->db->update($db, $data);
	}

	public function cek_kode_jabatan_unit($kode_unit, $kode_jabatan){
		$this->db->select('*');
		$this->db->from('jabatan_unit');
		$this->db->where('kode_unit', $kode_unit);
		$this->db->where('kode_jabatan', $kode_jabatan);
		$query = $this->db->get();
		return $query;
	}

	public function get_id_bukan_atasan($kode_unit){
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->where('unit.kode_unit', $kode_unit);
		$this->db->where('pengguna.status = "aktif"');
		$this->db->where('jabatan_unit.atasan = "tidak"');
		$query = $this->db->get();
		return $query;
	}

	public function jabatan_unit_by_unit($kode_unit){
		$this->db->select('*');
		$this->db->from('jabatan_unit');
		$this->db->where('kode_unit', $kode_unit);
		$this->db->where('atasan = "tidak"');
		return $this->db->get();
	}

	public function get_id_bukan_atasan_bukan_dia($kode_unit, $id_pengguna){
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->where('unit.kode_unit', $kode_unit);
		$this->db->where('pengguna.status = "aktif"');
		$this->db->where('pengguna.id_pengguna !=', $id_pengguna);
		$this->db->where('jabatan_unit.atasan = "tidak"');
		$query = $this->db->get();
		return $query;
	}

	public function cek_atasan_by_kode_jabatan_unit($kode_jabatan_unit){
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->where('jabatan_unit.atasan = "ya"');
		$this->db->where('pengguna.status = "aktif"');
		$this->db->where('jabatan_unit.kode_jabatan_unit', $kode_jabatan_unit);
		$query = $this->db->get()->num_rows();

		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
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
		$this->db->join('jabatan_unit','jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->join('file_upload', 'kegiatan.kode_kegiatan = file_upload.kode_kegiatan');
		$this->db->where('pengguna.id_pengguna', $id_pengguna);

		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	}

	public function get_kegiatan_pegawai_setuju($kode_jabatan_unit){ //menampilkan kegiatan yang diajukan user sebagai pegwai
		$id_pengguna = $this->session->userdata('id_pengguna');
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->join('pengguna', 'pengguna.id_pengguna = kegiatan.id_pengguna');
		$this->db->join('jabatan_unit','jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->join('file_upload', 'kegiatan.kode_kegiatan = file_upload.kode_kegiatan');
		$this->db->join('progress','progress.kode_fk = kegiatan.kode_kegiatan');
		$this->db->where('progress.kode_nama_progress = "1"');
		$this->db->where('progress.kode_jabatan_unit', $kode_jabatan_unit);
		$this->db->where('pengguna.id_pengguna', $id_pengguna);

		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	} 

	public function get_kegiatan_tolak($kode_jabatan_unit){ //menampilkan kegiatan yang diajukan user sebagai pegwai
		$id_pengguna = $this->session->userdata('id_pengguna');
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->join('pengguna', 'pengguna.id_pengguna = kegiatan.id_pengguna');
		$this->db->join('jabatan_unit','jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->join('file_upload', 'kegiatan.kode_kegiatan = file_upload.kode_kegiatan');
		$this->db->join('progress','progress.kode_fk = kegiatan.kode_kegiatan');
		$this->db->where('progress.kode_nama_progress = "2"'); //ditolak
		$this->db->where('pengguna.id_pengguna', $id_pengguna);

		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	} 

	public function update_jabatan_unit($id_pengguna, $data){
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('pengguna', $data);
		return "berhasil";
	}
	// =====Konfigurasi Sistem=======
	//acc kegiatan (persetujuan  kegiatan)
	public function get_persetujuan_kegiatan(){
		$this->db->select('*');
		$this->db->from('acc_kegiatan');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = acc_kegiatan.kode_jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->join('jenis_kegiatan','acc_kegiatan.kode_jenis_kegiatan = jenis_kegiatan.kode_jenis_kegiatan');
		$this->db->order_by('acc_kegiatan.ranking');
		return $query = $this->db->get();
	}

	public function get_persetujuan_barang(){ // persetujuan barang
		$this->db->select('*');
		$this->db->from('acc_barang');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = acc_barang.kode_jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->where('acc_barang.kode_jenis_pengajuan = "1"');
		$this->db->order_by('acc_barang.ranking');
		return $query = $this->db->get();
	}

	public function get_persetujuan_RAB(){ // persetujuan RAB
		$this->db->select('*');
		$this->db->from('acc_barang');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = acc_barang.kode_jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->where('acc_barang.kode_jenis_pengajuan = "2"');
		$this->db->order_by('acc_barang.ranking');
		return $query = $this->db->get();
	}

	public function hapus($id){//hapus persetujuan kegiatan
		$this->db->where('kode_acc_kegiatan', $id);
		$this->db->delete('acc_kegiatan');
		return "berhasil";
	}

	public function hapus_acc_barang_rab($id){//hapus persetujuan barang
		$this->db->where('kode_acc_barang', $id);
		$this->db->delete('acc_barang');
		return "berhasil";
	}

	public function get_acc_by_kode($kode_acc_kegiatan){
		$this->db->select('*');
		$this->db->from('acc_kegiatan');
		$this->db->where('kode_acc_kegiatan', $kode_acc_kegiatan);
		return $this->db->get();
	}

	public function get_acc_barang_rab_by_kode($kode_acc_barang){
		$this->db->select('*');
		$this->db->from('acc_barang');
		$this->db->where('kode_acc_barang', $kode_acc_barang);
		return $this->db->get();
	}

	public function get_akses_menu_by_kode_jabatan_kode_menu($kode_jabatan_unit, $kode_menu){ //get 
		$this->db->select('*');
		$this->db->from('akses_menu');
		$this->db->where('kode_jabatan_unit', $kode_jabatan_unit);
		$this->db->where('kode_menu', $kode_menu);
		return $this->db->get();
	}

	public function update_kegiatan_by_kode_keg($kode_kegiatan,$kode_jenis_kegiatan, $data){
		$this->db->where('kode_jenis_kegiatan', $kode_jenis_kegiatan);
		$this->db->where_in('kode_kegiatan',$kode_kegiatan);
		$this->db->update('kegiatan', $data);
		return TRUE;
	}

	public function update_barang_by_kode($kode_pengajuan, $data){ //untuk mengupdate status item_pengajuan semua jadi disetujui
		$this->db->where_in('kode_pengajuan',$kode_pengajuan);
		$this->db->update('item_pengajuan', $data);
		return TRUE;
	}

	public function update_rab_by_kode($kode_pengajuan, $data){ //untuk mengupdate status item_pengajuan semua jadi disetujui
		$this->db->where_in('kode_pengajuan',$kode_pengajuan);
		$this->db->update('pengajuan', $data);
		return TRUE;
	}

	public function get_kode_fk_by_kode_jabatan_unit($kode_jabatan_unit, $kode_jenis_kegiatan){
		$this->db->select('*');
		$this->db->from('progress');
		$this->db->join('kegiatan', 'progress.kode_fk = kegiatan.kode_kegiatan');
		$this->db->where('kode_jabatan_unit', $kode_jabatan_unit);
		$this->db->where('kode_nama_progress = "1"');
		$this->db->where('progress.jenis_progress = "kegiatan"');
		$this->db->where('kegiatan.kode_jenis_kegiatan', $kode_jenis_kegiatan);
		return $query = $this->db->get();
	}

	public function get_item_pengajuan(){ //untuk mengetahui semua item pengajuan
		$this->db->select('*');
		$this->db->from('item_pengajuan');
		return $query = $this->db->get();
	}

	public function get_kode_fk_rab_by_kode_jabatan_unit($kode_jabatan_unit){ //untuk mengetahui progress diterima yang diberikan oleh jabatan unit untuk jenis pengajuan rab 
		$this->db->select('*');
		$this->db->from('progress');
		$this->db->join('item_pengajuan', 'progress.kode_fk = item_pengajuan.kode_item_pengajuan');
		$this->db->where('kode_jabatan_unit', $kode_jabatan_unit);
		$this->db->where('kode_nama_progress = "1"');
		$this->db->where('progress.jenis_progress = "rab"');
		return $query = $this->db->get();
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

	public function get_jabatan_unit(){
		$this->db->select('*');
		$this->db->from('jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		
		$query = $this->db->get();
		return $query;
	}

	public function get_max_rank_peg(){
		$this->db->select('*');
		$this->db->select_max('ranking');
		$this->db->where('kode_jenis_kegiatan = "1"'); //peg
		$query = $this->db->get('acc_kegiatan'); 
		if ($query) {
			return $query;
		}else{
			return FALSE;
		}
	}

	public function get_min_rank_peg(){
		$this->db->select_min('ranking');
		$this->db->where('kode_jenis_kegiatan = "1"'); //peg
		$query = $this->db->get('acc_kegiatan'); 
		if ($query) {
			return $query;
		}else{
			return NULL;
		}
	}

	public function get_rank_peg($kode_acc_kegiatan){
		$this->db->select('ranking');
		$this->db->where('$kode_acc_kegiatan', $kode_acc_kegiatan);
		$this->db->where('kode_jenis_kegiatan = "1"'); //peg
		$query = $this->db->get('acc_kegiatan'); 
		if ($query) {
			return $query;
		}else{
			return NULL;
		}
	}

	public function cek_peg_by_rank($ranking){
		$this->db->where('ranking', $ranking);
		$this->db->where('kode_jenis_kegiatan = "1"'); //peg
		$query = $this->db->get('acc_kegiatan'); 
		if ($query) {
			return $query;
		}else{
			return NULL;
		}
	}

	public function cek_barang_by_rank($ranking){ 
		$this->db->where('ranking', $ranking);
		$this->db->where('kode_jenis_pengajuan = "1"'); 
		$query = $this->db->get('acc_barang'); 
		if ($query) {
			return $query;
		}else{
			return NULL;
		}
	}

	public function cek_mhs_by_rank($ranking){
		$this->db->where('ranking', $ranking);
		$this->db->where('kode_jenis_kegiatan = "2"'); //mhs
		$query = $this->db->get('acc_kegiatan'); 
		if ($query) {
			return $query;
		}else{
			return NULL;
		}
	}

	public function cek_rab_by_rank($ranking){ 
		$this->db->where('ranking', $ranking);
		$this->db->where('kode_jenis_pengajuan = "2"'); 
		$query = $this->db->get('acc_barang'); 
		if ($query) {
			return $query;
		}else{
			return NULL;
		}
	}

	public function get_rank_mhs($kode_acc_kegiatan){
		$this->db->select('ranking');
		$this->db->where('$kode_acc_kegiatan', $kode_acc_kegiatan);
		$this->db->where('kode_jenis_kegiatan = "2"'); //mhs
		$query = $this->db->get('acc_kegiatan'); 
		if ($query) {
			return $query;
		}else{
			return NULL;
		}
	}

	public function get_max_rank_mhs(){
		$this->db->select('*');
		$this->db->select_max('ranking');
		$this->db->where('kode_jenis_kegiatan = "2"'); //mhs
		$query = $this->db->get('acc_kegiatan'); 
		if ($query) {
			return $query;
		}else{
			return NULL;
		}
	}

	public function get_min_rank_mhs(){
		$this->db->select_min('ranking');
		$this->db->where('kode_jenis_pengajuan = "2"'); //mhs
		$query = $this->db->get('acc_barang'); 
		if ($query) {
			return $query;
		}else{
			return NULL;
		}
	}

	public function get_max_rank_barang(){ // untuk mengetahui ranking  maksimal persetujuan barang
		$this->db->select('*');
		$this->db->select_max('ranking');
		$this->db->where('kode_jenis_pengajuan = "1"'); 
		$query = $this->db->get('acc_barang'); 
		if ($query) {
			return $query;
		}else{
			return FALSE;
		}
	}

	public function get_min_rank_barang(){ // untuk mengetahui ranking  maksimal persetujuan barang
		$this->db->select_min('ranking');
		$this->db->where('kode_jenis_pengajuan = "1"'); 
		$query = $this->db->get('acc_barang'); 
		if ($query) {
			return $query;
		}else{
			return NULL;
		}
	}

	public function get_max_rank_RAB(){ // untuk mengetahui ranking  maksimal persetujuan RAB
		$this->db->select('*');
		$this->db->select_max('ranking');
		$this->db->where('kode_jenis_pengajuan = "2"'); 
		$query = $this->db->get('acc_barang'); 
		if ($query) {
			return $query;
		}else{
			return FALSE;
		}
	}

	public function get_min_rank_RAB(){ // untuk mengetahui ranking  maksimal persetujuan RAB
		$this->db->select_min('ranking');
		$this->db->where('kode_jenis_pengajuan = "2"'); 
		$query = $this->db->get('acc_barang'); 
		if ($query) {
			return $query;
		}else{
			return NULL;
		}
	}

	public function update_acc($kode_acc_kegiatan, $data){
		$this->db->where('kode_acc_kegiatan', $kode_acc_kegiatan);
		$this->db->update('acc_kegiatan', $data);
		return TRUE;
	}

	public function update_acc_barang_rab($kode_acc_barang, $data){
		$this->db->where('kode_acc_barang', $kode_acc_barang);
		$this->db->update('acc_barang', $data);
		return TRUE;
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
		$this->db->order_by('created_at','DESC');
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
	public function get_jabatan_by_unit($unit){
		$this->db->select('*');
		$this->db->from('jabatan_unit');
		$this->db->join('jabatan', 'jabatan_unit.kode_jabatan = jabatan.kode_jabatan');
		$this->db->join('unit', 'jabatan_unit.kode_unit = unit.kode_unit');
		$this->db->where('unit.kode_unit', $unit);
		$this->db->group_by('jabatan_unit.kode_jabatan');
		$query = $this->db->get();
		return $query;
	}

	public function hapus_jabatan_unit($kode_jabatan_unit){//hapus persetujuan kegiatan
		$this->db->where('kode_jabatan_unit', $kode_jabatan_unit);
		$this->db->delete('jabatan_unit');
		return "berhasil";
	}

	public function hapus_akses_menu($kode_akses_menu){
		$this->db->where('kode_akses_menu', $kode_akses_menu);
		$this->db->delete('akses_menu');
		return TRUE;
	}

	public function hapus_unit($kode_unit){//hapus persetujuan kegiatan
		$this->db->where('kode_unit', $kode_unit);
		$this->db->delete('unit');
		return "berhasil";
	}

	public function update_pimpinan($kode_jabatan_unit, $data){
		$this->db->where('kode_jabatan_unit', $kode_jabatan_unit);
		$this->db->update('jabatan_unit', $data);
		return TRUE;
	}

	public function get_pimpinan_unit($kode_unit){
		$this->db->select('jabatan_unit.kode_jabatan_unit');
		$this->db->from('jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->where('unit.kode_unit', $kode_unit);
		$this->db->where('jabatan_unit.atasan = "ya"');

		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			echo "kasiyan deh ga punya pimpinan";
		}
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
		$this->db->from('menu');
		$query = $this->db->get();
		return $query;
	}

	public function get_jabatan_unit_by_menu($kode_menu){
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->join('akses_menu','akses_menu.kode_menu = menu.kode_menu');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = akses_menu.kode_jabatan_unit');
		$this->db->join('jabatan','jabatan_unit.kode_jabatan = jabatan.kode_jabatan');
		$this->db->join('unit','unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->where('menu.kode_menu',$kode_menu);
		$this->db->group_by('jabatan_unit.kode_jabatan_unit');
		$this->db->order_by('jabatan_unit.kode_jabatan_unit');
		$query = $this->db->get();
		return $query;
	}

	public function get_unit(){
		$response = array();
		$this->db->select('*');
		$this->db->from('jabatan_unit');
		$this->db->join('unit', 'unit.kode_unit=jabatan_unit.kode_unit');
		$this->db->group_by('unit.kode_unit');
		$query = $this->db->get();
		$response = $query->result_array();
		return $response;
	}

	public function get_jabatan($postData){
		$response = array();
		$this->db->select('jabatan_unit.kode_jabatan, jabatan.nama_jabatan, unit.nama_unit');
		$this->db->from('jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan=jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit=jabatan_unit.kode_unit');
		$this->db->where('jabatan_unit.kode_unit', $postData['kode_unit']);
		$query = $this->db->get();
		$response = $query->result_array();
		return $response;
	}

}