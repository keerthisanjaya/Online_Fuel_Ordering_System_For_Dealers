<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otp extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('FillingstationModel');
        $this->load->model('LoginlogModel');
        
    }

   public function otppage()
   {    
       if($this->session->userdata('email') == true && $this->session->userdata('is_otp_verify') == false){    
           $this->load->view('otp/otp');
        }
		else if($this->session->userdata('email') == true && $this->session->userdata('is_otp_verify') == true){
			redirect('dashboard');
		}
		else if($this->session->userdata('email') == false && $this->session->userdata('is_otp_verify') == true){
			redirect('login/auth');
		}
		else if($this->session->userdata('email') == false && $this->session->userdata('is_otp_verify') == false){
			redirect('login/auth');
		}
   }

   public function checkotp()
   {    
       
            
        $userid = $this->session->userdata('user_id');
        $userotp = $this->input->post("otpcode");

        $result = $this->LoginlogModel->checkotp($userid);

        if(strcmp($result[0]->otpcode,$userotp)==0)
        {
            $data = array(
                'is_otp_verify' => true,
                'isactive' => 1
            );

            $this->session->set_userdata($data);
           /* $this->session->set_flashdata('message', 'Login.');*/

            redirect('dashboard');
        }else{
            $this->session->set_flashdata('error', 'Invalid OTP. Please try again.');
            redirect('otp');
        }
    }


   
   
   public function forgetpage()
   {
	   if($this->session->userdata('email') == true && $this->session->userdata('is_otp_verify') == false){    
           $this->load->view('login/forgetotp');
        }
		else if($this->session->userdata('email') == true && $this->session->userdata('is_otp_verify') == true){
			redirect('forgetpassword/password');
		}
		else if($this->session->userdata('email') == false && $this->session->userdata('is_otp_verify') == true){
			redirect('login/auth');
		}
		else if($this->session->userdata('email') == false && $this->session->userdata('is_otp_verify') == false){
			redirect('login/auth');
		}
   }
   
   public function checkotpforget()
   {
   	
   	
        $userid = $this->session->userdata('user_id');
        $userotp = $this->input->post("otpcode");

        $result = $this->LoginlogModel->checkotp($userid);

        if(strcmp($result[0]->otpcode,$userotp)==0)
        {
            $data = array(
                'is_otp_verify' => true,
                'isactive' => 1
            );

            $this->session->set_userdata($data);

            redirect('forgetpassword/password');
        }else{
			$this->session->set_flashdata('error', 'Invalid OTP. Please try again.');
            redirect('otp/forget');
        }


   }
   
   
}
