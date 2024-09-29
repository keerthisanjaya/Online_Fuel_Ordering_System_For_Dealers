<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bowserassign extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('BowserassignModel'); 
        $this->load->library('form_validation'); 
        $this->load->library('smsgateway');
        
        if($this->session->userdata('is_otp_verify') == false){
			redirect('login/auth');
		}
    }

    public function index() {

        $data['bowserassign'] = $this->BowserassignModel->getSecurityData();
        
        $this->load->view('template/header');
        $this->load->view('businesslogic/gatesecurity', $data);
        $this->load->view('template/footer');
    }

    public function opengate($idbowser)
    {
        /*$data = array(
            'exittime' => date("Y-m-d H:i:s"),
        );

        $this->db->where('idbowser', $idbowser);
        $this->db->update('bowserassign', $data);
        $this->BowserassignModel->Updategatestatus($idbowser);*/
        
        $this->BowserassignModel->update_exit_time($idbowser);
        
		
		$exit_data = $this->BowserassignModel->getUserdatabyID($idbowser);
		
		 $this->BowserassignModel->Updategatestatus($idbowser);
		
		$message = "";
		$phoneNumber = $exit_data[0]->phonenumber;
		$sealnumber = $exit_data[0]->sealnumber;
		$invnum = $exit_data[0]->invnum;
		$exittime = $exit_data[0]->exittime;
		$itemname = $exit_data[0]->itemname;
		$qty= $exit_data[0]->qty;
		$orderdate = $exit_data[0]->orderdate;
		$fillingstationname = $exit_data[0]->fillingstation_name;
				
		$message = "Invoice No: " . $invnum . " is Gate Exit. Seal No " . $sealnumber . ". Item: " . $itemname . ". Qty: " . $qty . ". Order Date: " . $orderdate . ". Filling Station: " . $fillingstationname . ". Exit Time: " . $exittime . ".";
		
		
		 $this->smsgateway->sendSms($phoneNumber, $message);
		 
		 $this->session->set_flashdata('success', 'Exit time updated successfully.');

        redirect("security/gate");
    }

    public function formview()
    {

        $this->load->view('template/header');
        $this->load->view('/admin/bowserassign_formview.php');
        $this->load->view('template/footer');
    }

    public function formupdate($idbowser)
    {

        $data['bowserassign'] = $this->BowserassignModel->getwhere_bowserassign($idbowser);
        $data['primaryid'] = $idbowser;

        $this->load->view('template/header');
        $this->load->view('/admin/bowserassign_updateview.php',$data);
        $this->load->view('template/footer');
    }

    public function create() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->form_validation->set_rules('invnum', 'invnum', 'required|min_length[0]|max_length[50]');
            $this->form_validation->set_rules('vehiclenum', 'vehiclenum', 'required|min_length[0]|max_length[50]');
            $this->form_validation->set_rules('drivernum', 'drivernum', 'required|min_length[0]|max_length[50]');
            $this->form_validation->set_rules('allowgateexit', 'allowgateexit', 'required|numeric|min_length[0]|max_length[1]');
            $this->form_validation->set_rules('sealnumber', 'sealnumber', 'required|min_length[0]|max_length[50]');
            $this->form_validation->set_rules('exittime', 'exittime', '|valid_date|min_length[0]');


            if ($this->form_validation->run()) {
                
                $data = array(
                    'invnum' => $this->input->post('invnum'),
                    'vehiclenum' => $this->input->post('vehiclenum'),
                    'drivernum' => $this->input->post('drivernum'),
                    'allowgateexit' => $this->input->post('allowgateexit'),
                    'sealnumber' => $this->input->post('sealnumber'),
                    'exittime' => $this->input->post('exittime'),

                );

                $resultid = $this->BowserassignModel->insert_bowserassign($data);
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
        $this->load->view('/admin/bowserassign_formview.php');
        $this->load->view('template/footer');
    }

    public function edit($idbowser) {
              
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $data = array(
                'invnum' => $this->input->post('invnum'),
                'vehiclenum' => $this->input->post('vehiclenum'),
                'drivernum' => $this->input->post('drivernum'),
                'allowgateexit' => $this->input->post('allowgateexit'),
                'sealnumber' => $this->input->post('sealnumber'),
                'exittime' => $this->input->post('exittime'),

            );

            $resultid = $this->BowserassignModel->update_bowserassign($idbowser, $data);

            if($resultid>0){
                $this->session->set_flashdata('message', 'Form updated successfully!');
            }else{
                $this->session->set_flashdata('error', 'Error in updating form');
            }
        }
        
        $data['bowserassign'] = $this->BowserassignModel->get_bowserassign();
        
        
        
        $this->load->view('template/header');
        $this->load->view('admin/bowserassign_tableview', $data);
        $this->load->view('template/footer');
    }

    public function delete($idbowser) {
       
        $resultid = $this->BowserassignModel->delete_bowserassign($idbowser);

        if($resultid>0){
            $this->session->set_flashdata('message', 'Row Delete successfully!');
        }else{
            $this->session->set_flashdata('error', 'Error in Delete Row');
        }
        
        $data['bowserassign'] = $this->BowserassignModel->get_bowserassign();
        
        

        $this->load->view('template/header');
        $this->load->view('admin/bowserassign_tableview', $data);
        $this->load->view('template/footer');
    }
}
