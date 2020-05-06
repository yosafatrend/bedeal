<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class UserController extends CI_Controller {


	public function userlogin(){

		

		$this->OuthModel->CSRFVerify();



		$post = $this->input->post();

		

		$data = [

			'username' => $post['email'],



		];



		$result = $this->OveModel->Authentication_Check($data);

		if($result != false){

			

			$login_user_id = $result['id'];

			$user = $this->OveModel->Read_User_Information($login_user_id);

			$hashed=$user['password'];





			if(password_verify($post['password'],$hashed)){

				



				 if($user['role'] == 'Admin' || $user['role'] == 'Vendor' || $user['role'] == 'Client_cs'){ //&& $user['status'] == 1



				 $userdata = [

				 	'id'  => $user['id'],

				 	'username'  => $user['username'],

				 	'email'     => $user['email'],

				 	'name'     => $user['name'],

				 	'role' => $user['role'],

				 	'last_logged' =>  $user['lastlogged'],

				 	'created' =>  $user['created'], 

				 	'logged_in' => 'TRUE'

				 ];



				 $this->session->set_userdata('Admin',$userdata);



				 $message = [ 'status' =>1 , 

				 'message' => 'You are now successfully Login !', 

				 'userDataDB' => $userdata, 

				 'redirectUrl' => base_url('v3/dashboard')

				];



			}else{



				$message = [ 'status' =>0 , 'message' => 'Unauthorized access !' ];

			}

			

		}else{

			$message = [ 'status' =>0 , 'message' => 'Your password is Incorrect  !' ];

		}



	}else{

		$message = [ 'status' =>0 , 'message' => 'Your username is Incorrect  !' ];

	}



	echo json_encode($message);



}



public function regist(){

	$this->form_validation->set_rules('full_name', 'Name','required|trim');
	$this->form_validation->set_rules('username', 'Username','required|trim|is_unique[users.username]', [
		'is_unique' => 'Username telah digunakan'
	]);
	$this->form_validation->set_rules('address', 'Address','required|trim');
	$this->form_validation->set_rules('as', 'Peran','required|trim');
	$this->form_validation->set_rules('email', 'Email','required|trim|valid_email|is_unique[users.email]', [
		'is_unique' => 'Email telah terdaftar'
	]);
	$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]',[
		'matches' => 'Password tidak cocok!',
		'min_length' => 'Password terlalu pendek'
	]);
	$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

	if ($this->form_validation->run() == false) {
		$this->load->view('register/register_v');
	}else{
		$post = $this->input->post();

		$data = [
			'name' => htmlspecialchars($this->input->post('full_name',true)),

			'username' => htmlspecialchars($this->input->post('username',true)),

			'password' => $this->OuthModel->HashPassword($post['password1']),

			'role' => $post['as'],

			'source' => 1,

			'status' => 1,

			'email' => $post['email'],

			'address' => $post['address'],

			'ip_address' => $this->input->ip_address(),

			'created' => date('Y-m-d H:i:s'),

		];
		$this->db->insert('users', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil dibuat. Silahkan login</div>');
		redirect('login');
	}
	
}
public function bayar(){
	$this->SeesionModel->not_logged_in();
	$this->form_validation->set_rules('username', 'Username','required|trim');
	$this->form_validation->set_rules('an_rek', 'Atas Nama Rekening','required|trim');
	$this->form_validation->set_rules('no_rek', 'No Rekening','required|trim');
	$this->form_validation->set_rules('bank', 'Bank','required');
	$this->form_validation->set_rules('usern_target', 'Username','required|trim');
	$this->form_validation->set_rules('an_rek_pemb', 'Atas Nama Rekening','required|trim');
	$this->form_validation->set_rules('bank_target', 'Bank','required');
	$this->form_validation->set_rules('norek_target', 'No Rekening','required|trim');
	if (empty($_FILES['bukti']['name']))
	{
		$this->form_validation->set_rules('bukti', 'Bukti Transfer','required');
	}

	
	
	if ($this->form_validation->run() == false) {
		$this->load->view('bayar/bayar');
	}else{
		$post = $this->input->post();
		$data = [
			'username' => htmlspecialchars($this->input->post('username',true)),

			'an_rek' => htmlspecialchars($this->input->post('an_rek',true)),

			'bank' => htmlspecialchars($this->input->post('bank',true)),

			'no_rek' => htmlspecialchars($this->input->post('no_rek',true)),

			'usern_target' => htmlspecialchars($this->input->post('usern_target',true)),

			'an_rek_target' => htmlspecialchars($this->input->post('an_rek_pemb',true)),

			'bank_target' => htmlspecialchars($this->input->post('bank_target',true)),
			
			'norek_target' => htmlspecialchars($this->input->post('norek_target',true)),
			
			'bukti' => $post['bukti'],

			'status' => 'pending',

			'tanggal' => date('Y-m-d H:i:s'),
		];
		$this->UserModel->bayar($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diinput, silahkan tunggu konfirmasi dari admin</div>');
		redirect('bayar');	
	}
}
public function terimabayar(){
	$this->SeesionModel->not_logged_in();
	$this->form_validation->set_rules('an_rek', 'Atas Nama Rekening', 'trim|required');
	$this->form_validation->set_rules('bank', 'Bank', 'trim|required');
	$this->form_validation->set_rules('no_rek', 'No Rekening', 'trim|required');
	if ($this->form_validation->run() == false) {
		$this->load->view('bayar/bayar');
	}else{
		$post = $this->input->post();

		$data = [
			'an_rek' => htmlspecialchars($this->input->post('an_rek',true)),

			'bank' => htmlspecialchars($this->input->post('bank',true)),

			'no_rek' => htmlspecialchars($this->input->post('no_rek',true)),
		];
		$this->db->where('id', $this->session->userdata['Admin']['id']);
		$this->db->update('users', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
		redirect('bayar');
	}
}
public function editrole(){
	$this->SeesionModel->not_logged_in();
	$this->form_validation->set_rules('as', 'Peran','required');
	$iduser = $this->session->userdata['Admin']['id'];
	if ($this->form_validation->run() == false) {
		$this->load->view('role/role');
	}else{
		$post = $this->input->post();

		$data = [ 
			'role' => $post['as'],

		];
		$this->db->where('id',$iduser);
		$this->db->update('users', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pergantian Role berhasil. Silahkan login kembali</div>');
		redirect('login');
	}
}
public function detail($id_bayar){
	$this->SeesionModel->not_logged_in();
	$out['detail_bayar'] = $this->UserModel->ambil_bayar($id_bayar);
	$this->load->view('detail/detail_v', $out);
}
public function bukti_pengirim(){
	$this->SeesionModel->not_logged_in();
	if (empty($_FILES['bukti_pengiriman']['name']))
	{
		$this->form_validation->set_rules('bukti_pengiriman', 'Bukti Pengirim','required');
	}
	if ($this->form_validation->run() == false) {

		$this->load->view('bukti_pengirim/bukti_pengirim');
	}else{
		$post = $this->input->post();

		$data = [
			'status' => 'dikirim',
			'bukti_pengiriman' => $post['bukti_pengiriman'],
		];
		$id_bayar = $this->uri->segment(3);
		echo $id_bayar;
		$this->UserModel->bukti_pengirim_m($id_bayar, $data);
		
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bukti berhasil dikirim!</div>');
		// 
		// redirect('riwayatp');
		
	}
}
public function detail2($id_bayar){
	$this->SeesionModel->not_logged_in();
	$out['detail_bayar'] = $this->UserModel->ambil_bayar2($id_bayar);
	$this->load->view('detail/detail_v', $out);
}
public function confirm($id){
	$data = [
		'status' => 'diterima',
		'diterima' => 1,
	];
	$this->db->where('id_bayar',$id);
	$this->db->update('bayar', $data);
	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan berhasil dikonfirmasi</div>');
	redirect('riwayat');
}
public function confirm2($id){
	$data = [
		'status' => 'terkonfirmasi',
	];
	$this->db->where('id_bayar',$id);
	$this->db->update('bayar', $data);
	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi berhasil dikonfirmasi</div>');
	redirect('UserController/semua');
}
public function semua(){
	$this->SeesionModel->not_logged_in();
	$data['bayar_a'] = $this->UserModel->semuatransaksi();
	$this->load->view("tampiltransaksi/tampiltransaksi_v",$data);
}
public function tampiltransaksi(){
	$this->SeesionModel->not_logged_in();
	$data['bayar'] = $this->UserModel->tampiltransaksi();
	$this->load->view("tampiltransaksi/tampiltransaksi_v",$data);
}
public function tampilpenjual(){
	$this->SeesionModel->not_logged_in();
	$data['bayar_p'] = $this->UserModel->tampilpenjual();
	$this->load->view("tampiltransaksi/tampiltransaksi_v",$data);
}
public function tampillapor(){
	$this->SeesionModel->not_logged_in();
	$data['data_lapor'] = $this->UserModel->tampillapor();
	$this->load->view("laporkan/laporkan",$data);
}
public function laporkan(){
	$this->SeesionModel->not_logged_in();
	$this->form_validation->set_rules('isi', 'aduan','required|trim');
	if ($this->form_validation->run() == false) {
		$this->load->view('laporkan/laporkan');
	}else{
		$post = $this->input->post();

		$data = [ 
			'username_pelapor' => $post['username'],
			'email_pelapor' => $post['email'],
			'isi' => $post['isi'],

		];
		$this->db->insert('laporan', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laporan berhasil dikirim, selanjutnya tunggu balasan dari kami setelah ditinjau</div>');
		redirect('UserController/laporkan');
	}
}
public function login(){

	$this->load->view("login/index_login");
}


public function logout(){

	
	$this->session->unset_userdata('Admin');
	$this->session->sess_destroy();

	redirect(base_url('login'));

	}

}

