<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
class BarangM extends CI_Model  
{  
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	public function get_id_pimpinan($kode_unit){
		$this->db->select('pengguna.kode_jabatan_unit');
		$this->db->from('pengguna');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
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

 	// Ambil Data Pengajuan Barang 
	function get_data_item_pengajuan(){
		$this->db->select('*');
		$this->db->from('item_pengajuan');
		$this->db->join('pengguna', 'pengguna.id_pengguna = item_pengajuan.id_pengguna');
		$this->db->join('data_diri', 'pengguna.no_identitas = pengguna.no_identitas');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->join('barang', 'barang.kode_barang = item_pengajuan.kode_barang');
		$this->db->join('jenis_barang', 'jenis_barang.kode_jenis_barang = barang.kode_jenis_barang');
		$this->db->join('progress', 'progress.kode_fk = item_pengajuan.kode_item_pengajuan');
		$this->db->where('progress.jenis_progress ="barang"');
		$this->db->where('progress.kode_nama_progress ="1"');
 		$this->db->order_by('item_pengajuan.tgl_item_pengajuan', 'DESC');
		$this->db->group_by('item_pengajuan.kode_item_pengajuan');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	}

	function get_data_item_pengajuan_by_id($id){ // menampilkan detail item pengajuan berdasarkan id
		$this->db->select('*');
		$this->db->from('item_pengajuan');
		$this->db->join('pengguna', 'pengguna.id_pengguna = item_pengajuan.id_pengguna');
		$this->db->join('data_diri', 'pengguna.no_identitas = data_diri.no_identitas');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->join('barang', 'barang.kode_barang = item_pengajuan.kode_barang');
		$this->db->join('jenis_barang', 'jenis_barang.kode_jenis_barang = barang.kode_jenis_barang');
		$this->db->where('kode_item_pengajuan', $id);
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	}

 	public function insert_tambah_barang($data){ //post barang
 		return $this->db->insert('barang', $data);
 	}

	public function get_pilihan_jenis_barang(){ // untuk menampilkan pilihan jenis barang dengan dropdown
		$this->db->select('*');
		$this->db->from('jenis_barang');
		$query = $this->db->get();
		return $query;
	}

	public function get_pilihan_jenis_barang_by_id($kode_barang){ // untuk menampilkan pilihan jenis barang dengan dropdown
		$this->db->select('*');
		$this->db->from('jenis_barang');
		$this->db->join('barang', 'barang.kode_jenis_barang = jenis_barang.kode_jenis_barang');
		$this->db->where('barang.kode_barang',$kode_barang);
		$query = $this->db->get();
		return $query;
	}

	public function insert_pengajuan_barang($data){   //insert tabel item_pengajuan
		if($this->db->insert('item_pengajuan', $data)){
			return $this->db->insert_id(); //return last insert ID
		} 
	} 

	public function insert_pengajuan_rab($data){   //insert tabel pengajuan
		if($this->db->insert('pengajuan', $data)){
			return $this->db->insert_id(); //return last insert ID
		} 
	} 

	public function upload($kode_item_pengajuan){ // Fungsi untuk upload gambar ke folder
		$config['upload_path'] 		= './assets/file_gambar'; 	// alamat folder penyimpanan gambar
		$config['allowed_types'] 	= 'jpg|png|jpeg|PNG';	 	// tipe file yang boleh diunggah
		$config['max_size']			= '2048';					// maksimal ukuran file yang diunggah
		$config['encrypt_name'] 	= FALSE;					// mengenkripsi nama file yang diunggah
		$config['overwrite'] 		= TRUE; 					//supaya bisa di replace file gambarnya
		$new_name 					= md5($kode_item_pengajuan);// mengenkripsi kode_item_pengajuan untuk dijadikan nama file gambar
		$config['file_name'] 		= $new_name; 				//mengisi nama file dengan enkripsi dari kode_item_pengajuan

		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file_gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => ''); // file akan di upload dan pindah ke folder penyimpanan gambar
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors()); // akan muncul pesan error 
			return $return;
		}
	}

	public function upload_file(){ // Fungsi untuk upload file RAB ke folder
		$config['upload_path'] = './assets/file_rab'; // alamat folder penyimpanan gambar
		$config['allowed_types'] = 'xlsx|xls';	 // tipe file yang boleh diunggah
		$config['max_size']	= '';					 // maksimal ukuran file yang diunggah
		$config['remove_space'] = TRUE;					 // menghilangkan spasi pada nama file
		$config['encrypt_name'] = TRUE;					 // mengenkripsi nama file yang diunggah

		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file_rab')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => ''); // file akan di upload dan pindah ke folder penyimpanan RAB
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors()); // akan muncul pesan error 
			return $return;
		}
	}

	function get_data_klasifikasi_barang(){ // menampilkan data barang yang belum memiliki jenis barang / belum terklasifikasi
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('jenis_barang','jenis_barang.kode_jenis_barang=barang.kode_jenis_barang');
		$this->db->where('barang.kode_jenis_barang = "3"');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	}

	public function update_klasifikasi_barang($kode_barang, $data){ //update barang dengan klasifikasi
		$this->db->where('kode_barang', $kode_barang);
		$this->db->update('barang', $data);
		return TRUE;
	}

	public function update_persetujuan($data, $kode_fk){ //update persetujuan progres jadi proses
		$this->db->where('item_pengajuan.kode_item_pengajuan', $kode_fk);
		$this->db->update('item_pengajuan', $data);
		return TRUE;
	}

	public function update_persetujuan_tersedia($data, $kode_item_pengajuan){ //update persetujuan status persediaan sama progres
		$this->db->where('item_pengajuan.kode_item_pengajuan', $kode_item_pengajuan);
		$this->db->update('item_pengajuan', $data);
		return TRUE;
	}

	public function update_fk($status_pengajuan, $data_update){ //update persetujuan status persediaan sama progres
		$this->db->where('item_pengajuan.status_pengajuan', $status_pengajuan);
		$this->db->update('item_pengajuan', $data_update);
		return TRUE;
	}

	public function update_nama_file($insert_id, $file_name){ //untuk memasukkan data item pengajuan yang telah diubah
		$this->db->where('item_pengajuan.kode_item_pengajuan', $insert_id);
		$this->db->update('item_pengajuan', $file_name);
		return TRUE;
	}

	public function update_item_pengajuan($kode_item_pengajuan, $data_update){ //untuk memasukkan data item pengajuan yang telah diubah
		$this->db->where('item_pengajuan.kode_item_pengajuan', $kode_item_pengajuan);
		$this->db->update('item_pengajuan', $data_update);
		return TRUE;
	}

	function get_ajukan_barang(){ //menampilkan pengajuan barang yang diajukan user sebagai pegwai
		$id_pengguna = $this->session->userdata('id_pengguna');
		$this->db->select('*');
		$this->db->from('item_pengajuan');
		$this->db->join('pengguna', 'pengguna.id_pengguna = item_pengajuan.id_pengguna');
		$this->db->join('barang', 'barang.kode_barang = item_pengajuan.kode_barang');
		$this->db->join('jenis_barang', 'jenis_barang.kode_jenis_barang = barang.kode_jenis_barang');
		$this->db->where('pengguna.id_pengguna', $id_pengguna);

		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	} 

	public function insert_progress($data){   //post progress
		$query = $this->db->insert('progress', $data);
		return $query; 
	}
	
	function get_barang(){ //menampilkan data seluruh barang
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('jenis_barang','jenis_barang.kode_jenis_barang = barang.kode_jenis_barang');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}

	}

	public function get_barang_setuju(){ // menampilkan data item pengajuan barag yang memiliki status pengajuan proses atau pending
		$this->db->select('*');
		$this->db->from('item_pengajuan');
		$this->db->join('pengguna', 'pengguna.id_pengguna = item_pengajuan.id_pengguna');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->join('barang', 'barang.kode_barang = item_pengajuan.kode_barang');
		$this->db->join('jenis_barang', 'jenis_barang.kode_jenis_barang = barang.kode_jenis_barang');
		$this->db->join('progress', 'progress.kode_fk = item_pengajuan.kode_item_pengajuan');
		$this->db->where('item_pengajuan.status_pengajuan ="proses" OR item_pengajuan.status_pengajuan = "tunda" OR item_pengajuan.status_pengajuan = "pengajuan"');
		$this->db->where('progress.jenis_progress ="barang"');
		$this->db->where('progress.kode_nama_progress ="1"');
		$this->db->group_by('item_pengajuan.kode_item_pengajuan');
		$query = $this->db->get();
		return $query;


	}

	public function get_progress_barang($kode_item_pengajuan){ //untuk mengecek apakah user sudah memberikan progres barang di item pengajuan . Berhubungan dengan tombol persetujuan akan hilang jika sudah dimasukan persetujuan
		$this->db->select('*');
		$this->db->from('progress');
		$this->db->where('jenis_progress = "barang"');
		$this->db->where('kode_fk', $kode_item_pengajuan);
		$query = $this->db->get();
		return $query->num_rows();
	}	

	public function get_progress_barang_by_id($kode_item_pengajuan, $kode_jabatan_unit){ //untuk mengecek apakah user sudah memberikan progres barang di item pengajuan . Berhubungan dengan tombol persetujuan akan hilang jika sudah dimasukan persetujuan
		$this->db->select('*');
		$this->db->from('progress');
		$this->db->where('jenis_progress = "barang"');
		$this->db->where('kode_fk', $kode_item_pengajuan);
		$this->db->where('kode_jabatan_unit', $kode_jabatan_unit);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_detail_progress_barang_by_id($id){ //menampilkan progress masing masing item pengajuan
		$this->db->select('*');
		$this->db->from('progress');
		$this->db->join('pengguna', 'progress.id_pengguna = pengguna.id_pengguna');
		$this->db->join('data_diri', 'pengguna.no_identitas = data_diri.no_identitas');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->join('nama_progress', 'progress.kode_nama_progress = nama_progress.kode_nama_progress');
		$this->db->where('progress.kode_fk', $id);
		$this->db->where('progress.jenis_progress = "barang"'); //barang
		$query = $this->db->get();
		return $query;
	}

	public function get_pilihan_barang(){ // untuk menampilkan dropdown pilihan barang di halaman tambah pengajuan barang
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('jenis_barang', 'barang.kode_jenis_barang = jenis_barang.kode_jenis_barang');
		$query = $this->db->get();
		return $query;
	}

	public function setuju($kode){ //mengubah status item_pengajuan menjadi pengajuan karena item pengajuan masuk ke dalam RAb
		$status = 'pengajuan';
		$data = array(
			'status_pengajuan' => $status
		);
		$this->db->where('kode_item_pengajuan', $kode);
		$this->db->update('item_pengajuan',$data);
		return TRUE;
	}

	public function tunda($kode){ //mengubah status item_pengajuan menjadi pengajuan karena item pengajuan masuk ke dalam RAb
		$status = 'tunda';
		$data = array(
			'status_pengajuan' => $status
		);
		$this->db->where('kode_item_pengajuan', $kode);
		$this->db->update('item_pengajuan',$data);
		return TRUE;
	}

	public function data_rab_all(){ // menampilkan data yang siap untuk diajukan untuk RAB
		$this->db->select('*');
		$this->db->from('item_pengajuan');
		$this->db->join('pengguna', 'pengguna.id_pengguna=item_pengajuan.id_pengguna');
		$this->db->join('barang', 'barang.kode_barang=item_pengajuan.kode_barang');
		$this->db->join('data_diri', 'data_diri.no_identitas=pengguna.no_identitas');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->where('item_pengajuan.status_pengajuan = "pengajuan"');
		$query = $this->db->get()->result();
		return $query;
	}

	public function get_pengajuan_rab(){ //menampilkan data rab
		$this->db->select('*');
		$this->db->from('pengajuan');
		$query = $this->db->get();
		return $query;
	}

	public function get_data_item_pengajuan_staf($kode_unit, $kode_jabatan){
		$this->db->select('*');
		$this->db->from('item_pengajuan');
		$this->db->join('barang', 'barang.kode_barang = item_pengajuan.kode_barang');
		$this->db->join('jenis_barang', 'barang.kode_jenis_barang = jenis_barang.kode_jenis_barang');
		$this->db->join('pengguna', 'pengguna.id_pengguna = item_pengajuan.id_pengguna');
		$this->db->join('data_diri', 'data_diri.no_identitas = pengguna.no_identitas');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->where('unit.kode_unit', $kode_unit);
		$this->db->where('jabatan.kode_jabatan !=', $kode_jabatan);
		$query= $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	}

	public function cek_id_staf_sarpras(){ //untuk mengetahui ketika staf sarpras sudah memasukan progres 
 		$this->db->select('pengguna.kode_jabatan_unit');
 		$this->db->from('pengguna');
 		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
 		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
 		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->where('unit.kode_unit = "2"'); //keuangan
		$this->db->where('jabatan.kode_jabatan = "4"'); //staf
		$this->db->where('status = "aktif"');
		$query = $this->db->get();
		return $query;
	}

	public function get_progress_oleh_staf($kode_fk, $kode_jabatan_unit){ //untuk mengetahui barang sudah mendapat progres dari kode_jabatan_unit apa saja
		$this->db->select('*');
		$this->db->from('progress');
		$this->db->where('progress.kode_fk', $kode_fk);
		$this->db->where('progress.jenis_progress = "barang"');
		$this->db->where('progress.kode_jabatan_unit', $kode_jabatan_unit);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_nama_progress_by_id($kode_jabatan_unit, $kode_fk){ //untuk menampilkan nama progress yang dimasukkan oleh kode_jabatan_unit berdasarkan kode_itempengajuan
		$this->db->select('*');
		$this->db->from('progress');
		$this->db->join('nama_progress','nama_progress.kode_nama_progress = progress.kode_nama_progress');
		$this->db->join('item_pengajuan', 'item_pengajuan.kode_item_pengajuan = progress.kode_fk');
		$this->db->where('progress.kode_jabatan_unit', $kode_jabatan_unit);
		$this->db->where('progress.kode_fk = item_pengajuan.kode_item_pengajuan');
		$this->db->where('item_pengajuan.kode_item_pengajuan', $kode_fk);
		$this->db->where('progress.jenis_progress = "barang"');
		$this->db->order_by('progress.created_at','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}

	public function get_rab_diajukan(){ //untuk menampilkan rab yang sedang diajukan untuk di setujui
		$this->db->select('*');
		$this->db->from('pengajuan');
		$this->db->where('pengajuan.status_pengajuan_rab = "baru"');
		$query = $this->db->get();
		return $query;
	}

	public function get_barang_disetujui(){ //untuk menampilkan item_pengajuan yang memiliki status disetujui yaitu yang telah disetujui di rab, untuk diberikan progress lanjutan
		$this->db->select('*');
		$this->db->from('item_pengajuan');
		$this->db->join('pengguna', 'pengguna.id_pengguna = item_pengajuan.id_pengguna');
		$this->db->join('data_diri', 'pengguna.no_identitas = data_diri.no_identitas');
		$this->db->join('jabatan_unit', 'jabatan_unit.kode_jabatan_unit = pengguna.kode_jabatan_unit');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = jabatan_unit.kode_jabatan');
		$this->db->join('unit', 'unit.kode_unit = jabatan_unit.kode_unit');
		$this->db->join('barang', 'barang.kode_barang = item_pengajuan.kode_barang');
		$this->db->join('jenis_barang', 'jenis_barang.kode_jenis_barang = barang.kode_jenis_barang');
		$this->db->where('item_pengajuan.status_pengajuan = "disetujui"');
		$query = $this->db->get();
		if($query){
			return $query;
		}else{
			return null;
		}
	}

}