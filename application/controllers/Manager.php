<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{
    public function sales_book()
    {
        $this->load->view('temp/head.php');
        $this->load->view('temp/navbar_manager.php');
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
}
?>