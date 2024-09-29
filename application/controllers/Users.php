<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel'); 
        $this->load->library('smsgateway');
        
        $this->load->library('form_validation'); 
        
         if($this->session->userdata('is_otp_verify') == false){
			redirect('login/auth');
		}
    }

    public function index() {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }

        $data['users'] = $this->UsersModel->get_users();
        
        $this->load->view('template/header');
        $this->load->view('user/users_tableview', $data);
        $this->load->view('template/footer');
    }
    
    public function pendingUser() {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }

        $data['users'] = $this->UsersModel->get_users_pending();
        
        $this->load->view('template/header');
        $this->load->view('user/unapproved_users_tableview', $data);
        $this->load->view('template/footer');
    }

    public function formview()
    {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }

        $this->load->view('template/header');
        $this->load->view('/user/users_formview.php');
        $this->load->view('template/footer');
    }

    public function formupdate($idUsers)
    {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }

        $data['users'] = $this->UsersModel->getwhere_users($idUsers);
        $data['primaryid'] = $idUsers;

        $this->load->view('template/header');
        $this->load->view('/user/users_updateview.php',$data);
        $this->load->view('template/footer');
    }

    public function create() {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->form_validation->set_rules('firstname', 'firstname', 'min_length[0]|max_length[45]');
            $this->form_validation->set_rules('lastname', 'lastname', 'min_length[0]|max_length[45]');
			$this->form_validation->set_rules('nic', 'nic', 'min_length[0]|max_length[12]');
            $this->form_validation->set_rules('email', 'email', 'valid_email|min_length[0]|max_length[256]');
            $this->form_validation->set_rules('password', 'password', 'min_length[0]|max_length[300]');
            $this->form_validation->set_rules('phonenumber', 'phonenumber', 'min_length[0]|max_length[45]');
           


            if ($this->form_validation->run()) {
                
                $data = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
					'nic' => $this->input->post('nic'),
                    'email' => $this->input->post('email'),
                    'password' => hash_hmac('sha256',$this->input->post('password'), $this->config->item('systemkey')),
                    'isadmin' => $this->input->post('isadmin'),
                    'isdealer' => $this->input->post('isdealer'),
                    'isdriver' => $this->input->post('isdriver'),
                    'phonenumber' => $this->input->post('phonenumber'),
                    'isdelete' => $this->input->post('isdelete'),

                );

                $resultid = $this->UsersModel->insert_users($data);
                if($resultid>0){
                    $this->session->set_flashdata('message', 'Form submitted successfully!');
                }else{
                    $this->session->set_flashdata('error', 'Error in submitting form');
                }
                
            }else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }else{
            $this->session->set_flashdata('error', "Bad Request");
        }
   
       
        redirect("users/");
    }

    public function edit($idUsers) {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }
              
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->form_validation->set_rules('firstname', 'firstname', 'min_length[0]|max_length[45]');
            $this->form_validation->set_rules('lastname', 'lastname', 'min_length[0]|max_length[45]');
			$this->form_validation->set_rules('nic', 'nic', 'min_length[0]|max_length[12]');
            $this->form_validation->set_rules('email', 'email', 'valid_email|min_length[0]|max_length[256]');
            $this->form_validation->set_rules('password', 'password', 'min_length[0]|max_length[300]');
            $this->form_validation->set_rules('phonenumber', 'phonenumber', 'min_length[0]|max_length[45]');
            
            if ($this->form_validation->run()) {
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
				'nic' => $this->input->post('nic'),
               /* 'email' => $this->input->post('email'),*/
                'isadmin' => $this->input->post('isadmin'),
                'isdealer' => $this->input->post('isdealer'),
                'isdriver' => $this->input->post('isdriver'),
                'phonenumber' => $this->input->post('phonenumber'),
                /*'isdelete' => $this->input->post('isdelete'),*/

            );

            $resultid = $this->UsersModel->update_users($idUsers, $data);

            if($resultid>0){
                $this->session->set_flashdata('message', 'Form updated successfully!');
            }else{
                $this->session->set_flashdata('error', 'Error in updating form');
            }
        }else {
            $this->session->set_flashdata('error', validation_errors());
        }
    } else {
        $this->session->set_flashdata('error', "Bad Request");
    }
        
        $data['users'] = $this->UsersModel->get_users();
        
        
        
        $this->load->view('template/header');
        $this->load->view('user/users_tableview', $data);
        $this->load->view('template/footer');
    }

    public function delete($idUsers) {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }
       
        $resultid = $this->UsersModel->delete_users($idUsers);

        if($resultid>0){
            $this->session->set_flashdata('message', 'Row Delete successfully!');
        }else{
            $this->session->set_flashdata('error', 'Error in Delete Row');
        }
        
        $data['users'] = $this->UsersModel->get_users();
        
        

        $this->load->view('template/header');
        $this->load->view('user/users_tableview', $data);
        $this->load->view('template/footer');
    }
    
    public function forgetpasswordupdate()
   {
	   if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }
        $this->load->view('login/forgetpassword');
   }
	
	public function updatePassword()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->form_validation->set_rules('password', 'password', 'required|min_length[3]|max_length[300]');
			
			if ($this->form_validation->run()) {
				$password = hash_hmac('sha256', $this->input->post('password'), $this->config->item('systemkey'));

				// Assuming you have a function in your model to retrieve user data by user_id or email
				$user = $this->UsersModel->getUserById($this->session->userdata('user_id'));
				// Or you can retrieve user data by email
				// $user = $this->UsersModel->getUserByEmail($this->session->userdata('email'));

				if ($user) {
					// Update the password field with the new hashed password
					$data = array(
						'password' => $password
					);

					$result = $this->UsersModel->updateUserPassword($user->idUsers, $password); // Assuming updateUser function updates the user with given data

					if ($result>0) {
						$this->session->set_flashdata('message', 'Password updated successfully');
					} else {
						$this->session->set_flashdata('error', 'Error updating password');
						$this->load->view('forgetpassword/password');
					}
				} else {
					$this->session->set_flashdata('error', 'User not found');
				}
			} else {
				$this->session->set_flashdata('error', validation_errors());
			}
		} else {
			$this->session->set_flashdata('error', 'Bad Request');
		}
		
		redirect('login'); // Redirect to a relevant page after password update
	}
	
	public function formOwnupdate()
    {
        // Check if user is logged in
        if ($this->session->userdata('user_id')) {
            // Get user ID from session
            $user_id = $this->session->userdata('user_id');
            // Load user data based on user ID
            $user_data = $this->UsersModel->getwhere_users($user_id);
            // Pass user data to view
            $data['user_data'] = $user_data;
			//Set Userdata
			
			//$user_profile_name = ($user_data->firstname." ".$user_data->lastname);
			
			/* $data = array(
                         'username' => $user_data->firstname." ".$user_data->lastname,

						
						
                    ); */

                    $this->session->set_userdata($data);
			
            // Load the view
            

       // $data['users'] = $this->UsersModel->getwhere_users($this->session->userdata('user_id'));
		
		$this->load->view('template/header');
        $this->load->view('user/profile_edit',$data);
        $this->load->view('template/footer');
    }
	}
	
	public function editOwnUserdata($idUsers) 
	{
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }
              
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->form_validation->set_rules('firstname', 'First Name', 'required|min_length[1]|max_length[45]');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required|min_length[1]|max_length[45]');
			$this->form_validation->set_rules('phonenumber', 'Phone Number', 'required|min_length[1]|max_length[11]');

           	if ($this->form_validation->run()) {
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
				
                'phonenumber' => $this->input->post('phonenumber'),
                
            );

            $resultid = $this->UsersModel->update_users($idUsers, $data);

            if($resultid>0){
                $this->session->set_flashdata('message', 'Form updated successfully!');
            }else{
                $this->session->set_flashdata('error', 'Error in updating form');
            }
        }else {
            $this->session->set_flashdata('error', validation_errors());
        }
    } else {
        $this->session->set_flashdata('error', "Bad Request");
    }
        
        $data['users'] = $this->UsersModel->get_users();
        
        
        
      redirect('dashboard');
    }
    
    public function approveUser($idUsers) {
    // Check if the user ID is provided and is numeric
    if (!empty($idUsers) && is_numeric($idUsers)) {
        // Update the user_active field in the database
        $result = $this->UsersModel->approveUser($idUsers);
        $result_user = $this->UsersModel->getUserDetailsById($idUsers);
        
        if ($result_user) {
            // Assuming the phone number is stored in $result_user->phonenumber
            $phonenum = $result_user[0]->phonenumber;
			$name = $result_user[0]->firstname;
            // Compose your message
            $message = "WELCOME". ' ' .$name."!! Your pending registration with FUEL MANAGER is active now. Please visit the link: https://fuelorderdashboard.xyz/";
            
            // Call the sendSms function with the phone number and message
            $this->smsgateway->sendSms($phonenum, $message);
        } else {
            // User not found
            $this->session->set_flashdata('error', 'User not found.');
            redirect('users/pending');
            return;
        }

        if ($result) {
            // User approval successful
            $this->session->set_flashdata('success', 'User approved successfully.');
        } else {
            // User approval failed
            $this->session->set_flashdata('error', 'Failed to approve user.');
        }
    } else {
        // Invalid user ID provided
        $this->session->set_flashdata('error', 'Invalid user ID.');
    }

    // Redirect back to the page where the button was clicked
    redirect('users/pending');
}
	
	
    
}