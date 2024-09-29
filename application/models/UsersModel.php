<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

    public function get_users()
    {
        $this->db->where('isdelete', false);
        $this->db->where('user_active', 1);
		$this->db->order_by('idUsers', 'DESC');
        $query = $this->db->get('users');
        return $query->result();
    }

    public function insert_users($data) 
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function getwhere_users($idUsers)
    {
        $query = $this->db->get_where('users', array('idUsers' => $idUsers));
        return $query->row();
    }

    public function update_users($idUsers, $data) {
        $this->db->where('idUsers', $idUsers);
        return $this->db->update('users', $data);
    }

    public function delete_users($idUsers) {
        $data = array(
            'isdelete' => 1,
        );
        $this->db->where('idUsers', $idUsers);
        return $this->db->update('users', $data);
    }

    public function checkcredential($email, $password_hash)
    {
        $this->db->where('isdelete', false);
        $this->db->where('email', $email);
        $this->db->where('password', $password_hash);
        $query = $this->db->get('users');
        return $query->result();
    }
    
    // Function to get user by phone number
    public function getUserByPhoneNumber($phone) 
	{
        $query = $this->db->get_where('users', array('phonenumber' => $phone));
        return $query->row(); // Returns a single row if found, else returns false
    }
	
	public function getUserById($user_id) {
        return $this->db->get_where('users', array('idUsers' => $user_id))->row();
    }

    public function updateUserPassword($user_id, $password) {
        $this->db->where('idUsers', $user_id);
        return $this->db->update('users', array('password' => $password));
    }
    
    public function is_nic_unique($nic)
	{
        $this->db->where('nic', $nic);
        $query = $this->db->get('users');
        return $query->num_rows() == 0; // If the query returns 0 rows, NIC is unique
    }
	
	public function is_email_unique($email) 
	{
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->num_rows() == 0; // If the query returns 0 rows, email is unique
    }
    
    public function approveUser($userId) 
	{
    // Update the user_active field to 1 where the user ID matches
    $this->db->set('user_active', 1);
    $this->db->where('idUsers', $userId);
    return $this->db->update('users');
	}
	
	public function get_users_pending()
    {
        $this->db->where('isdelete', false);
		$this->db->where('user_active', 0);
		$this->db->order_by('idUsers', 'DESC');
        $query = $this->db->get('users');
        return $query->result();
    }
	
	public function getUserDetailsById($userId)
    {
        $query = $this->db->query("SELECT * FROM `users`
											WHERE users.idUsers='$userId';");
        return $query->result();
    }

}