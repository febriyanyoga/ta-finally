<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LoginM extends CI_Model{
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}
	public function ceknum($email, $password){ //cek akun di db pengguna jabatan (berapa rows)
		$this->db->where('email', $email);
		$this->db->where('password', md5($password));
		return $this->db->get('pengguna');
	}

	function make_captcha(){ //membuat captcha
		$this->load->helper('captcha');
		$vals = array(
			'img_path' => './/assets/image/captcha/',
			'img_url' => base_url().'/assets/image/captcha/',
			'img_width' => '250',
			'img_height' => '50',
			'pool'		=> '0123456789',
			'font_path' => '../system/fonts/texb.ttf',
			'expiration' => 3600
		);

		$cap = create_captcha($vals);

		if($cap){
			$data = array(
				'captcha_id' => '',
				'captcha_time' => $cap['time'],
				'ip_address' => $this -> input -> ip_address(),
				'word' => $cap['word']
			);
			$query = $this -> db -> insert_string('captcha', $data);
			$this -> db -> query($query);
		}else{
			return "captcha not work";
		}
		return $cap['image'];
	}

	function check_captcha(){  //post captcha
		$expiration = time()-3600;
		$sql = "DELETE FROM captcha WHERE captcha_time < ?";
		$binds = array($expiration);
		$query = $this->db->query($sql, $binds);

		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();

		if($row -> count > 0){
			return true;
		}
		return false;
	}

	public function cek_jabatan($kode_jabatan_unit){ //cek akun di db pengguna jabatan (berapa rows)
		$this->db->select('*');
		$this->db->from('jabatan_unit');
		$this->db->where('kode_jabatan_unit', $kode_jabatan_unit);
		return $this->db->get();
	}


	// Lupa kata sandi

	public function getByEmail($email){
		$this->db->where('email',$email);
		$result = $this->db->get('pengguna');
		return $result;
	}

	public function simpanToken($data){
		$this->db->insert('lupa_kata_sandi', $data);
		return $this->db->affected_rows();
	}

	public function cekToken($token){
		$this->db->where('token',$token);
		$result = $this->db->get('lupa_kata_sandi');
		return $result;
	}

	public function ubahData($data, $id_pengguna){
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('pengguna', $data);
		return TRUE;
	}


}