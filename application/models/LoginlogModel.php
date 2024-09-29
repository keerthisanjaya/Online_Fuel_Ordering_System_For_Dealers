<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginlogModel extends CI_Model {

    public function get_loginlog()
    {
        $this->db->where('isdelete', false);
        $query = $this->db->get('loginlog');
        return $query->result();
    }

    public function insert_loginlog($data) 
    {
        $this->db->insert('loginlog', $data);
        return $this->db->insert_id();
    }

    public function getwhere_loginlog($idloginlog)
    {
        $query = $this->db->get_where('loginlog', array('idloginlog' => $idloginlog));
        return $query->row();
    }

    public function update_loginlog($idloginlog, $data) {
        $this->db->where('idloginlog', $idloginlog);
        return $this->db->update('loginlog', $data);
    }

    public function delete_loginlog($idloginlog) {
        $data = array(
            'isdelete' => 1,
        );
        $this->db->where('idloginlog', $idloginlog);
        return $this->db->update('loginlog', $data);
    }

    public function checkotp($userid)
    {
        $query = $this->db->query('SELECT `otpcode` FROM `loginlog`  WHERE `Users_idUsers` = '.$userid.' ORDER BY `idloginlog` DESC LIMIT 1');
        return $query->result();

    }

    public function usertype($userid)
    {
        $query = $this->db->query('SELECT `employeetype_idemployeetype` FROM `employee` WHERE `userid` = '.$userid.' ORDER BY idemployee DESC LIMIT 1');
        return $query->result();
    }
    
    public function getLoginDetails()
    {
        $query = $this->db->query("SELECT * FROM `loginlog` 
                                                    left JOIN users ON users.idUsers=loginlog.Users_idUsers
                                                    order by loginlog.logindate DESC;");
        return $query->result();

    }

}