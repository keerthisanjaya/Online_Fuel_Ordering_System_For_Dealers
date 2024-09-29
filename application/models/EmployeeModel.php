

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeModel extends CI_Model {

    public function get_employee()
    {
        $this->db->where('isdelete', false);
        $query = $this->db->get('employee');
        return $query->result();
    }

    public function insert_employee($data) 
    {
        $this->db->insert('employee', $data);
        return $this->db->insert_id();
    }

    public function getwhere_employee($idemployee)
    {
        $query = $this->db->get_where('employee', array('idemployee' => $idemployee));
        return $query->row();
    }

    public function update_employee($idemployee, $data) {
        $this->db->where('idemployee', $idemployee);
        return $this->db->update('employee', $data);
    }

    public function delete_employee($idemployee) {
        $data = array(
            'isdelete' => 1,
        );
        $this->db->where('idemployee', $idemployee);
        return $this->db->update('employee', $data);
    }

    public function availabledrivers()
    {
        $query = $this->db->query('SELECT `epf` FROM `employee`, `employeetype` where `employee`.`employeetype_idemployeetype` = `employeetype`.`idemployeetype` AND `employee`.`employeetype_idemployeetype` = 4;');
        return $query->result();
    }

    public function getEpfnum($userid)
    {
        $query = $this->db->query("SELECT `epf` FROM `employee` WHERE `userid` = ".$userid);

        return $query->result();
    }


    public function get_name()
    {
        $query = $this->db->query('SELECT `users`.`idUsers`,`users`.`firstname`, `users`.`lastname` FROM `users`,`employee` WHERE `users`.`idUsers`=`employee`.`userid`;');

        return $query->result();
    }
	
	public function gradewisepiechart()
    {
        $query = $this->db->query('SELECT `grade`,COUNT(*) AS `grade_count`  FROM `employee` WHERE `isactive`=1 GROUP by `grade`;');
        return $query->result();
    }
	
	public function genderwisepiechart()
    {
        $query = $this->db->query('SELECT `gender`,COUNT(*) AS `gender_count`  FROM `employee` WHERE `isactive`=1 GROUP by `gender`;');
        return $query->result();
    }
    
    	public function getemployeeAll()
    {
        $query = $this->db->query("SELECT * from `employee`
                                            LEFT JOIN employeetype ON employeetype.idemployeetype = employee.employeetype_idemployeetype
                                            LEFT JOIN users ON users.idUsers = employee.userid
                                            WHERE employee.isdelete =0;");
        return $query->result();
    }
    
    

}