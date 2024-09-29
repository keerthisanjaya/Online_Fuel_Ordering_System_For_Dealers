<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('LocationModel'); 
        
        $this->load->library('form_validation'); 
        
        if($this->session->userdata('is_otp_verify') == false){
			redirect('login/auth');
		}
    }

    public function index() {
        

        $data['location'] = $this->LocationModel->get_location();
        
        $this->load->view('template/header');
        $this->load->view('location/location_tableview', $data);
        $this->load->view('template/footer');
    }

    public function formview()
    {
        

        $this->load->view('template/header');
        $this->load->view('/location/location_formview.php');
        $this->load->view('template/footer');
    }

    public function formupdate($idLocation)
    {
        

        $data['location'] = $this->LocationModel->getwhere_location($idLocation);
        $data['primaryid'] = $idLocation;

        $this->load->view('template/header');
        $this->load->view('/location/location_updateview.php',$data);
        $this->load->view('template/footer');
    }

    public function create() {
        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->form_validation->set_rules('locationname', 'locationname', 'required|min_length[0]|max_length[45]');
           // $this->form_validation->set_rules('location_is_active', 'location_is_active', 'min_length[0]|max_length[45]');
            //$this->form_validation->set_rules('isdelete', 'isdelete', 'required|min_length[0]|max_length[1]');


            if ($this->form_validation->run()) {
                
                $data = array(
                    'locationname' => $this->input->post('locationname'),
                    'location_is_active' => 0,
                    'isdelete' => 0,

                );

                $resultid = $this->LocationModel->insert_location($data);
                if($resultid>0){
                    $this->session->set_flashdata('message', 'Add record successfully!');
                    redirect('location');
                }else{
                    $this->session->set_flashdata('error', 'Error in submitting form');
                     redirect('location/insert');
                }
                
            }else{
                $this->session->set_flashdata('error', validation_errors());
                redirect('location/insert');
            }
        }else{
            $this->session->set_flashdata('error', "Bad Request");
        }
   
       
        $this->load->view('template/header');
        $this->load->view('/location/location_formview.php');
        $this->load->view('template/footer');
    }

    public function edit($idLocation) {
        
              
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $this->form_validation->set_rules('locationname', 'locationname', 'required|min_length[0]|max_length[45]');
            $this->form_validation->set_rules('location_is_active', 'location_is_active', 'min_length[0]|max_length[45]');
            
            if ($this->form_validation->run()) {
            
            $data = array(
                'locationname' => $this->input->post('locationname'),
                'location_is_active' => $this->input->post('location_is_active'),
                //'isdelete' => $this->input->post('isdelete'),

            );

            $resultid = $this->LocationModel->update_location($idLocation, $data);

            if($resultid>0){
                $this->session->set_flashdata('message', 'Record updated successfully!');
                redirect('location');
            }else{
                $this->session->set_flashdata('error', 'Error in updating form');
                redirect('location');
            }
        }else{
                $this->session->set_flashdata('error', validation_errors());
                redirect('location/insert');
            }
        }else{
            $this->session->set_flashdata('error', "Bad Request");
        }
        
        $data['location'] = $this->LocationModel->get_location();
        
        
        
        $this->load->view('template/header');
        $this->load->view('location/location_tableview', $data);
        $this->load->view('template/footer');
    }

    public function delete($idLocation) {
       
       
        $resultid = $this->LocationModel->delete_location($idLocation);

        if($resultid>0){
            $this->session->set_flashdata('message', 'Row Delete successfully!');
        }else{
            $this->session->set_flashdata('error', 'Error in Delete Row');
        }
        
        $data['location'] = $this->LocationModel->get_location();
        
        

        $this->load->view('template/header');
        $this->load->view('location/location_tableview', $data);
        $this->load->view('template/footer');
    }
}
