<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class LoginC extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();	
		$this->load->model(['LoginM','PenggunaM']);
		$this->load->helper('url');

	}
	public function index() //load captcha
	{
		$data['prosedur_pegawai'] = $this->PenggunaM->get_prosedur_pegawai()->result();
		$data['prosedur_mahasiswa'] = $this->PenggunaM->get_prosedur_mahasiswa()->result();
		$data['prosedur_barang'] = $this->PenggunaM->get_prosedur_barang()->result();
		$data['cap_img'] = $this->LoginM->make_captcha();
		$this->load->view('LoginV', $data);
	}
	public function signin(){ //post login
		if($this->input->post('submit')){
			if($this->LoginM->check_captcha() == TRUE)
				echo "<span style=\"color:blue\">Captcha cocok</span>";
			else echo "<span style=\"color:red\">Captcha salah</span>";
		}
		$email		=$this->input->post('email');
		$password	=$this->input->post('password');
		$ceknum		=$this->LoginM->ceknum($email,$password)->num_rows();
		$query		=$this->LoginM->ceknum($email,$password)->row();
		$cek_jabatan = $this->LoginM->cek_jabatan($query->kode_jabatan_unit)->row();
		if($ceknum>0){
			if($this->LoginM->check_captcha() == TRUE){
				$userData 	= array(
					'email' 			=> $query->email,
					'password' 			=> $query->password,
					'id_pengguna' 		=> $query->id_pengguna,
					'kode_jabatan' 		=> $cek_jabatan->kode_jabatan,
					'kode_unit' 		=> $cek_jabatan->kode_unit,
					'status'			=> $query->status,
					'status_email'		=> $query->status_email,
					'id_pengguna'		=> $query->id_pengguna,
					'kode_jabatan_unit'	=> $query->kode_jabatan_unit,
					'logged_in' 		=> TRUE
				);
				$this->session->set_userdata($userData);
				if ($this->session->userdata('status_email') == 1) {
					if($this->session->userdata('status') == "aktif"){
						redirect('PenggunaC');	
					}else{
						$this->session->set_flashdata('error','Mohon maaf untuk saat ini akun anda belum aktif. Silahkan hubungi <b>Administrator </b> untuk melakukan aktifasi akun.');
						redirect('LoginC');	
					}
				}else{
					$this->session->set_flashdata('error','Email belum dikonfirmasi, silahkan cek email anda dan klik tautan yang dibagikan.');
					redirect('LoginC');
				}

			}else{
				$this->session->set_flashdata('error','Captcha salah');
				redirect('LoginC');
			}
		}else{
			if($this->LoginM->check_captcha() == TRUE){
				$this->session->set_flashdata('error','Email atau kata sandi salah');
				redirect('LoginC');
			}else{
				$this->session->set_flashdata('error','Email atau kata sandi dan captcha salah');
				redirect('LoginC');
			}
		}

	}	
	public function logout(){
		$this->session->sess_destroy();	
		redirect(base_url().'LoginC/');	
	}

	// Lupa kata sandi
	public function atur_ulang(){
		$data['prosedur_pegawai'] = $this->PenggunaM->get_prosedur_pegawai()->result();
		$data['prosedur_mahasiswa'] = $this->PenggunaM->get_prosedur_mahasiswa()->result();
		$data['prosedur_barang'] = $this->PenggunaM->get_prosedur_barang()->result();
		$this->load->view('ResetPasswordV', $data);
	}

	public function kirim_email(){
		date_default_timezone_set("Asia/jakarta");

		$email = $this->input->post('email');

		$rs = $this->LoginM->getByEmail($email);

  // cek email ada atau engga
		if (!$rs->num_rows() > 0){
			$this->session->set_flashdata('style', 'danger');
			$this->session->set_flashdata('alert', 'Email tidak ditemukan!');
			$this->session->set_flashdata('message', 'Cek kembali email yang terdaftar.');
			redirect ('LoginC/atur_ulang');
		}

		$user = $rs->row();

  // get id user
		$user_token = $user->id_pengguna;

  //create valid dan expire token
		$date_create_token = date("Y-m-d H:i");
		$date_expired_token = date('Y-m-d H:i',strtotime('+2 hour',strtotime($date_create_token)));

  // create token string
		$tokenstring = md5(sha1($user_token.$date_create_token));

  // simpan data token
		$data = array('token'=>$tokenstring,'id_pengguna'=>$user_token,'created'=>$date_create_token,'expired'=>$date_expired_token);
		$simpan = $this->LoginM->simpanToken($data);

		if ($simpan > 0){

			$url        = base_url()."UserC/confirmation/".$email_encryption;  
			$from_mail  = 'dtedi.svugm@gmail.com';
			$to         = $email;

			$subject    = 'Reset Password';
			$data       = array(
				'token'=> $tokenstring
			);
			$message    = $this->load->view('reset_password_email.php',$data,TRUE);
    // '<h1>'.$url.'</h1><span style="color: red;"> Departemen Teknik Elektro dan Informatika </span>';

			$headers    = 'MIME-Version: 1.0' . "\r\n";
			$headers    .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers    .= 'To:  <'.$to.'>' . "\r\n";
			$headers    .= 'From: Departemen Teknik Elektro dan Informatika <'.$from_mail.'>' . "\r\n";

			$sendtomail = mail($to, $subject, $message, $headers);

			if (!$sendtomail) {
				echo $this->email->print_debugger();
				exit;
			}

			$this->session->set_flashdata('style', 'success');
			$this->session->set_flashdata('alert', 'Berhasil !');
			$this->session->set_flashdata('message', 'Silahkan cek email anda');

			redirect ('LoginC/atur_ulang');
		}
	}

	public function reset($token){
		date_default_timezone_set("Asia/jakarta");
		$token = $token;

  // get token ke nodel user
		$cekToken = $this->LoginM->cekToken($token);
		$rs = $cekToken->num_rows();

  // cek token ada atau engga
		if ($rs > 0){

			$data = $cekToken->row();
			$tokenExpired = $data->expired;
			$timenow = date("Y-m-d H:i:s");

    // cek token expired atau engga
			if ($timenow < $tokenExpired){

      // tampilkan form reset
				$datatoken['token'] = $token;
				$datatoken['prosedur_pegawai'] = $this->PenggunaM->get_prosedur_pegawai()->result();
				$datatoken['prosedur_mahasiswa'] = $this->PenggunaM->get_prosedur_mahasiswa()->result();
				$datatoken['prosedur_barang'] = $this->PenggunaM->get_prosedur_barang()->result();
				$this->load->view('PostResetPasswordV',$datatoken);

			}else{

      // redirect form forgot
				$this->session->set_flashdata('style', 'danger');
				$this->session->set_flashdata('alert', 'Maaf, Token Anda Sudah Expired!');
				$this->session->set_flashdata('message', 'Coba masukkan email anda kembali');

				redirect ('LoginC/atur_ulang');
			}
		}else{
			$this->session->set_flashdata('style', 'danger');
			$this->session->set_flashdata('alert', 'Maaf, Token Anda Tidak Ditemukan!');
			$this->session->set_flashdata('message', 'Coba masukkan email anda kembali');
			redirect ('LoginC/atur_ulang');
		}
	}	

	public function kirim_reset(){
		$this->form_validation->set_rules('kata_sandi', 'Kata sandi', 'trim|required|min_length[6]|max_length[50]|matches[confirmpswd]');
		$this->form_validation->set_rules('confirmpswd', 'Password Confirmation', 'trim|required|min_length[6]|max_length[50]'); 
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('style', 'danger');
			$this->session->set_flashdata('alert', 'Kata sandi tidak Berhasil Dirubah!');
			$this->session->set_flashdata('message', 'Cek kembali yang anda masukkan');
			redirect_back();
		}else{
			$password = $this->input->post('kata_sandi');
			$token = $this->input->post('token');
			$cekToken = $this->LoginM->cekToken($token);
			$data = $cekToken->row();
			$id = $data->id_pengguna;

  // ubah password
			$data = array ('password'=>md5($password));
			$simpan = $this->LoginM->ubahData($data,$id);

			if ($simpan > 0){
				$this->session->set_flashdata('style', 'success');
				$this->session->set_flashdata('alert', 'Kata sandi Berhasil Dirubah!');
				$this->session->set_flashdata('message', 'Silahkan login kembali');
			}else{
				$this->session->set_flashdata('style', 'danger');
				$this->session->set_flashdata('alert', 'Kata sandi Gagal Dirubah');
				$this->session->set_flashdata('message', 'Cek kembali yang anda masukkan');
			}
			redirect('LoginC/');
		}

	}

}