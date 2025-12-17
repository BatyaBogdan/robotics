<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{
    public function sales_book()
    {
        $this->load->view('temp/head.php');
		if($this->session->userdata('id_role') == 1){
			redirect('main/index');
		}
		else if($this->session->userdata('id_role') == 2){
			$this->load->view('temp/navbar_manager.php');
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
        $this->load->model('orders');
        $date_start = 0;
        $date_end = 0;
        if (!empty($_POST)) {
            $date_start = $_POST['date_start'];
            $date_end = $_POST['date_end'];
        }
        $data['sales'] = $this->orders->select_sales_book($date_start, $date_end);
        $this->load->view('sales_book', $data);
        $this->load->view('temp/footer.php');
    }
    public function orders()
    {
        $this->load->view('temp/head.php');
		if($this->session->userdata('id_role') == 1){
			redirect('main/index');
		}
		else if($this->session->userdata('id_role') == 2){
			$this->load->view('temp/navbar_manager.php');
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
        $this->load->model('orders');
        $data['orders'] = $this->orders->select_orders();
        $this->load->view('orders', $data);
        $this->load->view('temp/footer.php');
    }
	public function accept(){
		if(!empty($_POST)){
			$id_order = $_POST['id_order'];
			$this->load->model('orders');
			$this->orders->update_order_accept($id_order);
			redirect('manager/orders');
		}
	}
	public function end(){
		if(!empty($_POST)){
			$id_order = $_POST['id_order'];
			$this->load->model('orders');
			$this->orders->update_order_end($id_order);
			redirect('manager/orders');
		}
	}
}
?>