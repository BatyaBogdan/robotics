<?php
class Orders extends CI_Model{
    public function result(){
    $sql = "SELECT products.id_product, products.product_name, products.price, SUM(orders.sum), COUNT(orders.id_order) FROM products, orders WHERE orders.id_product = products.id_product GROUP BY products.id_product, products.product_name, products.price ORDER BY products.id_product";
    $result = $this->db->query($sql);
    return $result->result_array();
    }
    public function new_order($id_user, $id_product, $quantity, $order_date, $inn, $kpp, $payer, $payer_bank, $beneficiary_bank, $sum, $account, $bik, $type_pay, $purpose_payment){
        $sql = "INSERT INTO orders (id_user, id_product, quantity, order_date, inn, kpp, payer, payer_bank, beneficiary_bank, sum, account, bik, type_pay, purpose_payment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $result = $this->db->query($sql, array($id_user, $id_product, $quantity, $order_date, $inn, $kpp, $payer, $payer_bank, $beneficiary_bank, $sum, $account, $bik, $type_pay, $purpose_payment));
        return $result;
    }
    public function select_order($id_user){
        $sql = "SELECT orders.id_order, products.product_name, robots_type.robot_type, orders.quantity, orders.order_date, orders.date_pay, orders.type_pay, orders.sum, orders.status from orders, products, robots_type where orders.id_product = products.id_product and products.id_type = robots_type.id_type and orders.id_user = ? ORDER BY orders.id_order ASC";
        $result = $this->db->query($sql, array($id_user));
        return $result->result_array();
    }
    public function select_orders(){
        $sql = "SELECT orders.id_order, users.first_name, products.product_name, robots_type.robot_type, orders.quantity, orders.order_date, orders.date_pay, orders.type_pay, orders.sum, orders.status from orders, products, robots_type, users where orders.id_product = products.id_product and products.id_type = robots_type.id_type and users.id_user = orders.id_user ORDER BY orders.id_order ASC";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function update_pay($date_pay, $id_order){
        $sql = "UPDATE orders SET date_pay = ? where id_order = ?";
        $result = $this->db->query($sql, array($date_pay, $id_order));
        return $result;
    }
    public function update_order_accept($id_order){
        $sql = "UPDATE orders SET status = 2 where id_order = ?";
        $result = $this->db->query($sql, array($id_order));
        return $result;
    }
    public function update_order_end($id_order){
        $sql = "UPDATE orders SET status = 3 where id_order = ?";
        $result = $this->db->query($sql, array($id_order));
        return $result;
    }
    public function select_sales_book($date_start, $date_end)
    {
        $sql = "SELECT * FROM orders, products, users WHERE orders.id_order= products.id_product AND users.id_user = orders.id_order and order_date BETWEEN ? AND ?";
        $result = $this->db->query($sql, array($date_start, $date_end));
        return $result->result_array();
    }
}
?>