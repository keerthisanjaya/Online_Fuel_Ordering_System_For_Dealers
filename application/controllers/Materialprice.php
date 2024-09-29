<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materialprice extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('MaterialpriceModel'); 
        
        $this->load->library('form_validation'); 
        
        if($this->session->userdata('is_otp_verify') == false){
			redirect('login/auth');
		}
    }

    public function index() {
        

        $data['materialprice'] = $this->MaterialpriceModel->get_materialprice();
        
        $this->load->view('template/header');
        $this->load->view('materialprice/materialprice_tableview', $data);
        $this->load->view('template/footer');
    }

    public function formview()
    {
       

        $this->load->view('template/header');
        $this->load->view('/materialprice/materialprice_formview.php');
        $this->load->view('template/footer');
    }

    public function formupdate($idmaterialprice)
    {
        

        $data['materialprice'] = $this->MaterialpriceModel->getwhere_materialprice($idmaterialprice);
        $data['primaryid'] = $idmaterialprice;

        $this->load->view('template/header');
        $this->load->view('/materialprice/materialprice_updateview.php',$data);
        $this->load->view('template/footer');
    }

    public function create() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->form_validation->set_rules('materialtype', 'materialtype', 'required|min_length[0]|max_length[45]');
            $this->form_validation->set_rules('materialprice', 'materialprice', 'required|numeric|min_length[0]|max_length[11]');
            //$this->form_validation->set_rules('material_is_active', 'material_is_active', 'min_length[0]|max_length[45]');
            //$this->form_validation->set_rules('isdelete', 'isdelete', 'min_length[0]|max_length[1]');


            if ($this->form_validation->run()) {
                
                $data = array(
                    'materialtype' => $this->input->post('materialtype'),
                    'materialprice' => $this->input->post('materialprice'),
                    'material_is_active' => 1,
                    'isdelete' => 0,
                    'priceupdate' => date("Y-m-d H:i:s")
                );

                $mattype = $this->input->post('materialtype'); 

                $resultid = $this->MaterialpriceModel->insert_materialprice($data,$mattype);
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
   
       
        redirect("materialprice");
        /*$this->load->view('template/header');
        $this->load->view('materialprice/materialprice_formview');
        $this->load->view('template/footer');*/
    }

    public function edit($idmaterialprice) {
        
              
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->form_validation->set_rules('materialtype', 'materialtype', 'required|min_length[0]|max_length[45]');
            $this->form_validation->set_rules('materialprice', 'materialprice', 'required|numeric|min_length[0]|max_length[11]');
            $this->form_validation->set_rules('material_is_active', 'material_is_active', 'required|min_length[0]|max_length[45]');
            
            if ($this->form_validation->run()) {
                
            $data = array(
                'materialtype' => $this->input->post('materialtype'),
				'materialprice' => $this->input->post('materialprice'),
				'material_is_active' => $this->input->post('material_is_active'),
				'isdelete' => $this->input->post('isdelete'),

            );

            $resultid = $this->MaterialpriceModel->update_materialprice($idmaterialprice, $data);

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
        
        $data['materialprice'] = $this->MaterialpriceModel->get_materialprice();
        
        
        
        $this->load->view('template/header');
        $this->load->view('materialprice/materialprice_tableview', $data);
        $this->load->view('template/footer');
    }

    public function delete($idmaterialprice) {
        
       
        $resultid = $this->MaterialpriceModel->delete_materialprice($idmaterialprice);

        if($resultid>0){
            $this->session->set_flashdata('message', 'Row Delete successfully!');
        }else{
            $this->session->set_flashdata('error', 'Error in Delete Row');
        }
        
        $data['materialprice'] = $this->MaterialpriceModel->get_materialprice();
        
        

        $this->load->view('template/header');
        $this->load->view('materialprice/materialprice_tableview', $data);
        $this->load->view('template/footer');
    }
}
