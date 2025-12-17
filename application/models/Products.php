<?php
class Products extends CI_Model{
    public function select_products(){
    $sql = "SELECT products.id_product, products.product_name, products.price, products.description, products.product_photo, robots_type.robot_type, products.packaging_type, products.measure, products.weight, products.service_life from products, robots_type where products.id_type = robots_type.id_type";
    $result = $this->db->query($sql);
    return $result->result_array();
}
}
?>