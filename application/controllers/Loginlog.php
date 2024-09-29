<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginlog extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('LoginlogModel'); 
        $this->load->model('UsersModel');

        $this->load->library('form_validation'); 
        
        if($this->session->userdata('is_otp_verify') == false){
			redirect('login/auth');
		}
    }

    public function index() {
        

        $data['loginlog'] = $this->LoginlogModel->getLoginDetails();
        $data["users"] = $this->UsersModel->get_users();

        $this->load->view('template/header');
        $this->load->view('loginlog/loginlog_tableview', $data);
        $this->load->view('template/footer');
    }

    public function formview()
    {
        

        $this->load->view('template/header');
        $this->load->view('/loginlog/loginlog_formview.php');
        $this->load->view('template/footer');
    }

    public function formupdate($idloginlog)
    {
        

        $data['loginlog'] = $this->LoginlogModel->getwhere_loginlog($idloginlog);
        $data['primaryid'] = $idloginlog;

        $this->load->view('template/header');
        $this->load->view('/loginlog/loginlog_updateview.php',$data);
        $this->load->view('template/footer');
    }

    public function create() {
        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->form_validation->set_rules('logindate', 'logindate', '|valid_date|min_length[0]');
			$this->form_validation->set_rules('Users_idUsers', 'Users_idUsers', 'required|min_length[0]|max_length[11]');
			$this->form_validation->set_rules('otpcode', 'otpcode', '|min_length[0]|max_length[45]');
			$this->form_validation->set_rules('iscorrect', 'iscorrect', '|min_length[0]|max_length[4]');
			$this->form_validation->set_rules('isdelete', 'isdelete', 'required|min_length[0]|max_length[1]');


            if ($this->form_validation->run()) {
                
                $data = array(
                    'logindate' => $this->input->post('logindate'),
					'Users_idUsers' => $this->input->post('Users_idUsers'),
					'otpcode' => $this->input->post('otpcode'),
					'iscorrect' => $this->input->post('iscorrect'),
					'isdelete' => $this->input->post('isdelete'),

                );

                $resultid = $this->LoginlogModel->insert_loginlog($data);
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
   
       
        $this->load->view('template/header');
        $this->load->view('/loginlog/loginlog_formview.php');
        $this->load->view('template/footer');
    }

    public function edit($idloginlog) {
        
              
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $data = array(
                'logindate' => $this->input->post('logindate'),
                'Users_idUsers' => $this->input->post('Users_idUsers'),
                'otpcode' => $this->input->post('otpcode'),
                'iscorrect' => $this->input->post('iscorrect'),
                'isdelete' => $this->input->post('isdelete'),

            );

            $resultid = $this->LoginlogModel->update_loginlog($idloginlog, $data);

            if($resultid>0){
                $this->session->set_flashdata('message', 'Form updated successfully!');
            }else{
                $this->session->set_flashdata('error', 'Error in updating form');
            }
        }
        
        $data['loginlog'] = $this->LoginlogModel->get_loginlog();
        
        $data["users"] = $this->UsersModel->get_users();

        
        $this->load->view('template/header');
        $this->load->view('loginlog/loginlog_tableview', $data);
        $this->load->view('template/footer');
    }

    public function delete($idloginlog) {
        
       
        $resultid = $this->LoginlogModel->delete_loginlog($idloginlog);

        if($resultid>0){
            $this->session->set_flashdata('message', 'Row Delete successfully!');
        }else{
            $this->session->set_flashdata('error', 'Error in Delete Row');
        }
        
        $data['loginlog'] = $this->LoginlogModel->get_loginlog();
        
        $data["users"] = $this->UsersModel->get_users();


        $this->load->view('template/header');
        $this->load->view('loginlog/loginlog_tableview', $data);
        $this->load->view('template/footer');
    }
}
