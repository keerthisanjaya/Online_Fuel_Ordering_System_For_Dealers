<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');         
        $this->load->model('LoginlogModel');         
        $this->load->library('form_validation'); 
        $this->load->library('smsgateway');
                    
    }

    public function index() 
    {
        $this->load->view('login/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('login/login');
    }

    /*public function checklogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
        
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required|min_length[0]|max_length[15]');
        
            if ($this->form_validation->run()) {
                
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                $password_hash = hash_hmac('sha256',$password, $this->config->item('systemkey'));

                $result = $this->UsersModel->checkcredential($email, $password_hash);

                $userrole = "";

                if($result != false){
                    $isdealer = $result[0]->isdealer;
                    if($isdealer == 1){
                        $userrole = 666;
                    }

                    $isadmin = $result[0]->isadmin;
                    if($isadmin == 1){
                        $userrole = 777;
                    }

                    if($isadmin == 0 && $isdealer == 0){
                        $resultusr = $this->LoginlogModel->usertype($result[0]->idUsers);
                        $userrole = $resultusr[0]->employeetype_idemployeetype;
                    }

                }

                if(sizeof($result)>0){
                    $data = array(
                        'user_id' => $result[0]->idUsers,
                        'username' => $result[0]->firstname." ".$result[0]->lastname,
                        'email' => $result[0]->email,
                        'isactive' => 0,
                        'phone' => $result[0]->phonenumber,
                        'userrole' => $userrole,
                        'is_otp_verify' => false
                    );

                    $this->session->set_userdata($data);

                    $otp = random_int(100000, 999999);

                    $data = array(
                        'logindate' => date("Y-m-d H:i:s"),
                        'Users_idUsers' => $result[0]->idUsers,
                        'otpcode' => $otp,
                        'iscorrect' => 0,
                        'isdelete' => 0,
                    );
    
                    $resultid = $this->LoginlogModel->insert_loginlog($data);
                    
                    
                    $this->smsgateway->sendSms($result[0]->phonenumber, "Your Test OTP code is :".$otp);

                    redirect("otp");

                }else{
                    $this->session->set_flashdata('error', 'Error in Credentials');
                    $this->load->view('login/login');
                }


            }else{
                $this->session->set_flashdata('error', validation_errors());
                $this->load->view('login/login');
            }
        }else{
            $this->session->set_flashdata('error', 'Bad Request');
            $this->load->view('login/login');
        }
    }*/

    public function register()
    {
        $this->load->view('login/register');
    }

    

    public function registeruser()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->form_validation->set_rules('firstname', 'First Name', 'required|min_length[1]|max_length[45]');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required|min_length[1]|max_length[45]');
			$this->form_validation->set_rules('nic', 'NIC', 'required|min_length[1]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[1]|max_length[256]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[1]|max_length[300]');
			$this->form_validation->set_rules('phonenumber', 'Phone Number', 'required|min_length[1]|max_length[11]');

			if ($this->form_validation->run()) {
				// Check if NIC is unique
    				$nic = $this->input->post('nic');
    				if ($this->UsersModel->is_nic_unique($nic)) {
    					// Check if email is unique
    					$email = $this->input->post('email');
    					if ($this->UsersModel->is_email_unique($email)) {
    						$this->load->helper('string');
						
					$phonenumber = $this->input->post('phonenumber');
                    // Format phone number
                    if (strpos($phonenumber, '+94') !== false) {
                        // Remove '+' if present
                        $phonenumber = str_replace('+94', '94', $phonenumber);
                    } elseif (strpos($phonenumber, '0') === 0) {
                        // Add '94' if it starts with '0'
                        $phonenumber = '94' . substr($phonenumber, 1);
                    }

						$data = array(
							'firstname' => $this->input->post('firstname'),
							'lastname' => $this->input->post('lastname'),
							'nic' => $nic,
							'email' => $email,
							'password' => hash_hmac('sha256', $this->input->post('password'), $this->config->item('systemkey')),
							'phonenumber' => $phonenumber,                    
							'isadmin' => 0,
							'isdealer' => $this->input->post('dealer'),
							'isdriver' => 0,
							'isdelete' => 0,
						);

						$resultid = $this->UsersModel->insert_users($data);

						if($resultid > 0){
							$this->session->set_flashdata('message', 'Successfully Registered');
							redirect("login");
						} else {
							$this->session->set_flashdata('error', 'Error in Register');
						}
					} else {
						$this->session->set_flashdata('error', 'Email is already registered');
						redirect("register");
					}
				} else {
					$this->session->set_flashdata('error', 'NIC is already registered');
					redirect("register");
				}
			} else {
				$this->session->set_flashdata('error', validation_errors());
				redirect("register");
			}
		} else {
			$this->session->set_flashdata('error', "Bad Request");
		}
			  
		$this->load->view('login/login');
	}
    
     public function forgetpasswordphone()
    {
        $this->load->view('login/forgetpasswordphone');
    }
    
    public function checkphone()
	{
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
		
				$this->form_validation->set_rules('phone', 'phone', 'required|numeric');
			
			if ($this->form_validation->run()) {
				
				$phone = $this->input->post('phone');
				
				// Format phone number
                    if (strpos($phone, '+94') !== false) {
                        // Remove '+' if present
                        $phone = str_replace('+94', '94', $phone);
                    } elseif (strpos($phone, '0') === 0) {
                        // Add '94' if it starts with '0'
                        $phone = '94' . substr($phone, 1);
                    }

				// Check if the phone number exists in the users table
				$user = $this->UsersModel->getUserByPhoneNumber($phone);
				
				
				if ($user !== null && is_object($user)) {
					// Get user_id from session
					$user_id = $user->idUsers;

					// Set user_id in session
					$data = array(
						'user_id' => $user->idUsers,
						'firstname' => $user->firstname,
						'lastname' => $user->lastname,
						'email' => $user->email,
						'is_otp_verify' => false
					);
					$this->session->set_userdata($data);
					
					// Generate OTP
					$otp = random_int(100000, 999999);

					// Store OTP in the database
					$data = array(
						'logindate' => date("Y-m-d H:i:s"),
						'Users_idUsers' => $user->idUsers,
						'otpcode' => $otp,
						'iscorrect' => 0,
						'isdelete' => 0,
					);

					$resultid = $this->LoginlogModel->insert_loginlog($data);

					// Send OTP via SMS
					 $this->smsgateway->sendSms($phone, "Your Test OTP code is: ".$otp);

					// Redirect to OTP page
					redirect("otp/forget");
				} else {
					// If phone number not found, display error message
					$this->session->set_flashdata('error', 'Phone number not found in database');
					redirect("login");
				}
				
			} else {
				// If validation fails, display validation errors
				$this->session->set_flashdata('error', validation_errors());
				redirect("login");
			}
		} else {
			// If not a POST request, display error message
			$this->session->set_flashdata('error', 'Bad Request');
		redirect("login");
		}
	}
	
	
	public function checklogin()	
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {    

			$this->form_validation->set_rules('email', 'email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'password', 'required|min_length[0]|max_length[15]');

			if ($this->form_validation->run()) {
			   
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$password_hash = hash_hmac('sha256',$password, $this->config->item('systemkey'));

				$result = $this->UsersModel->checkcredential($email, $password_hash);

				if($result != false){
					$user_active = $result[0]->user_active;

					if($user_active == 1) {
						// User is active, proceed with login
						$userrole = "";

						// Assign user role based on conditions
							$isdealer = $result[0]->isdealer;
						if($isdealer == 1){
							$userrole = 666;
						}

						$isadmin = $result[0]->isadmin;
						if($isadmin == 1){
							$userrole = 777;
						}

						if($isadmin == 0 && $isdealer == 0){
							$resultusr = $this->LoginlogModel->usertype($result[0]->idUsers);
							$userrole = $resultusr[0]->employeetype_idemployeetype;
						}

						$data = array(
							'user_id' => $result[0]->idUsers,
							'username' => $result[0]->firstname." ".$result[0]->lastname,
							'email' => $result[0]->email,
							'isactive' => 0,
							'phone' => $result[0]->phonenumber,
							'userrole' => $userrole,
							'is_otp_verify' => false
						);

						$this->session->set_userdata($data);

						$otp = random_int(100000, 999999);

						$data = array(
							'logindate' => date("Y-m-d H:i:s"),
							'Users_idUsers' => $result[0]->idUsers,
							'otpcode' => $otp,
							'iscorrect' => 0,
							'isdelete' => 0,
						);

						$resultid = $this->LoginlogModel->insert_loginlog($data);

						$this->smsgateway->sendSms($result[0]->phonenumber, "Your Test OTP code is :".$otp);

						redirect("otp");
					} else {
						// User registration is not approved
						$this->session->set_flashdata('error', 'WAIT !! Your registration is not approved.');
						$this->load->view('login/login');
					}
				} else {
					// Incorrect credentials
					$this->session->set_flashdata('error', 'Error in Credentials');
					$this->load->view('login/login');
				}

			} else {
				// Validation errors
				$this->session->set_flashdata('error', validation_errors());
				$this->load->view('login/login');
			}
		} else {
			// Bad request
			$this->session->set_flashdata('error', 'Bad Request');
			$this->load->view('login/login');
		}
}
    
}
