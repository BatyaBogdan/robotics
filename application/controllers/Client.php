<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	public function lk()
	{
		$this->load->view('temp/head.php');
		if($this->session->userdata('id_role') == 1){
			$this->load->view('temp/navbar_client.php');
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
			redirect('main/login');
		}
		$id_user = $this->session->userdata('id_user');
		$this->load->model('orders');
		$data['orders'] = $this->orders->select_order($id_user);
		$this->load->view('lk.php', $data);
		$this->load->view('temp/footer.php');
	}

	public function order()
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
			redirect('main/login');
		}
		if(!empty($_GET)){
			$id_product = $_GET['id_product'];
			$product_name = $_GET['product_name'];
			$price = $_GET['price'];
		}
		$data = [
			'id_product' => $id_product,
			'product_name' => $product_name,
			'price' => $price
		];
		$this->load->view('order.php', $data);
		$this->load->view('temp/footer.php');
	}
	public function new_order(){
		if(!empty($_POST)){
			$price = $_POST['price'];
			$id_user = $this->session->userdata('id_user');
			$id_product = $_POST['id_product'];
			$quantity = $_POST['quantity'];
			$order_date = date('Y-m-d');
			$inn = $_POST['inn'];
			$kpp = $_POST['kpp'];
			$payer = $_POST['payer'];
			$payer_bank = $_POST['payer_bank'];
			$beneficiary_bank = $_POST['beneficiary_bank'];
			$sum = $quantity * $price;
			$account = $_POST['account'];
			$bik = $_POST['bik'];
			$type_pay = $_POST['type_pay'];
			$purpose_payment = $_POST['purpose_payment'];
			$this->load->model('orders');
			$this->orders->new_order($id_user, $id_product, $quantity, $order_date, $inn, $kpp, $payer, $payer_bank, $beneficiary_bank, $sum, $account, $bik, $type_pay, $purpose_payment);
			redirect('client/lk');
		}
	}
	public function pay(){
		if(!empty($_POST)){
			$id_order = $_POST['id_order'];
			$date_pay = date('Y-m-d');
			$this->load->model('orders');
			$this->orders->update_pay($date_pay, $id_order);
			redirect('client/lk');
		}
	}
}
