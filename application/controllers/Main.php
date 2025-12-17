<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{
		$this->load->view('temp/head.php');
		if($this->session->userdata('id_role') == 1){
			$this->load->view('temp/navbar_client.php');
		}
		else if($this->session->userdata('id_role') == 2){
			$this->load->view('temp/navbar_manager.php');
		}
		else if($this->session->userdata('id_role') == 3){
			$this->load->view('temp/navbar_accountant.php');
		}
		else if($this->session->userdata('id_role') == 4){
			$this->load->view('temp/navbar_leader.php');
		}
		else {
			$this->load->view('temp/navbar.php');
		}
		$this->load->model('products');
		$data['products'] = $this->products->select_products();
		$this->load->view('index.php', $data);
		$this->load->view('temp/footer.php');
	}
	public function login()
	{
		$this->load->view('temp/head.php');
		if($this->session->userdata('id_role') == 1){
			redirect('main/index');
		}
		else if($this->session->userdata('id_role') == 2){
			redirect('main/index');
		}
		else if($this->session->userdata('id_role') == 3){
			redirect('main/index');
		}
		else if($this->session->userdata('id_role') == 4){
			redirect('main/index');
		}
		else {
			$this->load->view('temp/navbar.php');
		}
		$this->load->view('login.php');
		$this->load->view('temp/footer.php');
	}
	public function auth(){
		if(!empty($_POST)){
			$login = $_POST['login'];
			$password = $_POST['password'];
			$this->load->model('users');
			$user = $this->users->select_user($login, $password);
			if($user){
				$user = array(
					'id_user' => $user['id_user'],
					'first_name' => $user['first_name'],
					'login' => $user['login'],
					'id_role' => $user['id_role']
				);
				$this->session->set_userdata($user);
				if($this->session->userdata('id_role') == 1){
					redirect('client/lk');
				}
				else if($this->session->userdata('id_role') == 2){
					redirect('manager/sales_book');
				}
				else if($this->session->userdata('id_role') == 3){
					redirect('main/index');
				}
				else if($this->session->userdata('id_role') == 4){
					redirect('rykov/analysis');
				}
				else {
					redirect('main/login');
				}
			}
			else {
				$this->session->set_flashdata('error', 'Неверный логин или пароль!');
				redirect('main/login');
			}
		}
	}
	public function reg()
	{
		$this->load->view('temp/head.php');
		if($this->session->userdata('id_role') == 1){
			redirect('main/index');
		}
		else if($this->session->userdata('id_role') == 2){
			redirect('main/index');
		}
		else if($this->session->userdata('id_role') == 3){
			redirect('main/index');
		}
		else if($this->session->userdata('id_role') == 4){
			redirect('main/index');
		}
		else {
			$this->load->view('temp/navbar.php');
		}
		$this->load->view('reg.php');
		$this->load->view('temp/footer.php');
	}
	public function new_acc(){
		if(!empty($_POST)){
			$first_name = $_POST['first_name'];
			$email = $_POST['email'];
			$login = $_POST['login'];
			$password = $_POST['password'];
			$this->load->model('users');
			$check = $this->users->check_login($login);
			if($check->num_rows() > 0){
				$this->session->set_flashdata('warning', 'Такой логин существует');
				redirect('main/reg');
			}
			else {
				$this->users->create_user($first_name, $email, $login, $password);
				redirect('main/login');
			}
		}
	}
	public function logout(){
		session_destroy();
		redirect('main/index');
	}
}
