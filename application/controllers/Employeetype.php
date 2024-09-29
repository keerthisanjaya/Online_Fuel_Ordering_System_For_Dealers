<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employeetype extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('EmployeetypeModel'); 
        
        $this->load->library('form_validation'); 
        if($this->session->userdata('is_otp_verify') == false){
			redirect('login/auth');
		}
    }

    public function index() {
        

        $data['employeetype'] = $this->EmployeetypeModel->get_employeetype();
        
        $this->load->view('template/header');
        $this->load->view('employeetype/employeetype_tableview', $data);
        $this->load->view('template/footer');
    }

    public function formview()
    {
        

        $this->load->view('template/header');
        $this->load->view('/employeetype/employeetype_formview.php');
        $this->load->view('template/footer');
    }

    public function formupdate($idemployeetype)
    {
        

        $data['employeetype'] = $this->EmployeetypeModel->getwhere_employeetype($idemployeetype);
        $data['primaryid'] = $idemployeetype;

        $this->load->view('template/header');
        $this->load->view('/employeetype/employeetype_updateview.php',$data);
        $this->load->view('template/footer');
    }

    public function create() {
        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->form_validation->set_rules('employeetype', 'employeetype', 'min_length[0]|max_length[45]');
            //$this->form_validation->set_rules('isdelete', 'isdelete', 'required|min_length[0]|max_length[1]');

            if ($this->form_validation->run()) {
                
                $data = array(
                    'employeetype' => $this->input->post('employeetype'),
					'isdelete' => $this->input->post('isdelete'),
					'isactive' => 0,

                );

                $resultid = $this->EmployeetypeModel->insert_employeetype($data);
                if($resultid>0){
                    $this->session->set_flashdata('message', 'Add record successfully!');
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
        $this->load->view('/employeetype/employeetype_formview.php');
        $this->load->view('template/footer');
    }

    public function edit($idemployeetype) {
        
              
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $this->form_validation->set_rules('employeetype', 'employeetype', 'min_length[0]|max_length[45]');
            
            if ($this->form_validation->run()) {
            $data = array(
                'employeetype' => $this->input->post('employeetype'),
                'isdelete' => $this->input->post('isdelete'),
                'isactive' => $this->input->post('isactive'),

            );

            $resultid = $this->EmployeetypeModel->update_employeetype($idemployeetype, $data);

            if($resultid>0){
                $this->session->set_flashdata('message', 'Record updated successfully!');
            }else{
                $this->session->set_flashdata('error', 'Error in updating form');
            }
        }else{
                $this->session->set_flashdata('error', validation_errors());
            }
        }else{
            $this->session->set_flashdata('error', "Bad Request");
        }
        
        $data['employeetype'] = $this->EmployeetypeModel->get_employeetype();
        
        
        
        $this->load->view('template/header');
        $this->load->view('employeetype/employeetype_tableview', $data);
        $this->load->view('template/footer');
    }

    public function delete($idemployeetype) {
        
       
        $resultid = $this->EmployeetypeModel->delete_employeetype($idemployeetype);

        if($resultid>0){
            $this->session->set_flashdata('message', 'Row Delete successfully!');
        }else{
            $this->session->set_flashdata('error', 'Error in Delete Row');
        }
        
        $data['employeetype'] = $this->EmployeetypeModel->get_employeetype();
        
        

        $this->load->view('template/header');
        $this->load->view('employeetype/employeetype_tableview', $data);
        $this->load->view('template/footer');
    }
}
