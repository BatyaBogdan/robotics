<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {
    public function create_user($first_name, $email, $login, $password){
        $sql = "INSERT INTO users (first_name, email, login, password) VALUES (?, ?, ?, ?)";
        $return = $this->db->query($sql, array($first_name, $email, $login, $password));
        return $return;
    }
    public function select_user($login, $password){
        $sql = "SELECT * from users where login = ? AND password = ?";
        $return = $this->db->query($sql, array($login, $password));
        return $return->row_array();
    }
    public function check_login($login){
        $sql = "SELECT * from users where login = ?";
        $return = $this->db->query($sql, $login);
        return $return;
    }
}
