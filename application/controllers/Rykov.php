<?php
class Rykov extends CI_Controller{
    public function index(){
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
			$this->load->view('temp/navbar_leader.php');
		}
		else {
			redirect('main/login');
		}
        $this->load->view('index.php');
		$this->load->view('temp/footer.php');
    }
    public function analysis(){
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
			$this->load->view('temp/navbar_leader.php');
		}
		else {
			redirect('main/login');
		}
        $this->load->model('orders');
        $data['orders'] = $this->orders->result();
        $this->load->view('sales_analysis.php', $data);
		$this->load->view('temp/footer.php');
    }
}
?>