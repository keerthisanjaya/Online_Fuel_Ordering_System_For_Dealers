<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fillingstation extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('FillingstationModel'); 
        $this->load->model('DocumentsModel');
        $this->load->model('OrderitemsModel');  
        $this->load->model('UsersModel');
        $this->load->library('smsgateway');

        $this->load->library('form_validation'); 
        
        if($this->session->userdata('is_otp_verify') == false){
			redirect('login/auth');
		}
    }

    public function index() {
        

        $data['fillingstation'] = $this->FillingstationModel->get_fillingstation_details();
        $fillingstationID= $data['fillingstation'][0]->idfillingstation;
        $data['docs'] = $this->DocumentsModel->get_documents();
        $data["users"] = $this->UsersModel->get_users();

        $this->load->view('template/header');
        $this->load->view('fillingstation/fillingstation_tableview', $data);
        $this->load->view('template/footer');
    }

    public function uploaddocuments()
    {
        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {

            $this->form_validation->set_rules('type', 'type', 'min_length[0]|max_length[45]');
            $this->form_validation->set_rules('filename', 'filename', 'min_length[0]|max_length[450]');
            //$this->form_validation->set_rules('uploaddate', 'uploaddate', 'valid_date|min_length[0]');
            //$this->form_validation->set_rules('isapproved', 'isapproved', 'min_length[0]|max_length[4]');
            $this->form_validation->set_rules('fillingstation_idfillingstation', 'fillingstation_idfillingstation', 'required|min_length[0]|max_length[11]');
            //$this->form_validation->set_rules('approvedby', 'approvedby', 'min_length[0]|max_length[45]');
            //$this->form_validation->set_rules('isdelete', 'isdelete', 'required|min_length[0]|max_length[1]');


            if ($this->form_validation->run()) {

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 4000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);


                if ( ! $this->upload->do_upload('filename'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->session->set_flashdata('error', $error);
                }
                else
                {
                $docdata = $this->upload->data('file_name'); 
                $upload_path =  $config['upload_path'].$docdata;
                    
                $data = array(
                    'type' => $this->input->post('type'),
                    'filename' => $docdata,
                    'uploaddate' => date("Y-m-d H:i:s"),
                    'isapproved' => 0,
                    'fillingstation_idfillingstation' => $this->input->post('fillingstation_idfillingstation'),
                    'approvedby' => 0,
                    'isdelete' => 0,
                    'document_path' => $upload_path
                );

                $resultid = $this->DocumentsModel->insert_documents($data);
                if($resultid>0){
                    $this->session->set_flashdata('message', 'Form submitted successfully!');
                    
                }else{
                    $this->session->set_flashdata('error', 'Error in submitting form');
                }

            }
                
            }else{
                $this->session->set_flashdata('error', validation_errors());
            }

        }else{
            $this->session->set_flashdata('error', "Bad Request");
        }
        
        redirect('dashboard');
        /*if ($this-> session->flashdata('message'))
        {
            redirect('dashboard');
        }
        else
        {   $this->load->view('template/header');
            $this->load->view('fillingstation/docuploads');
             $this->load->view('template/footer');
        }*/

   
    }

    public function documents()
    {

        $iduser = $this->session->user_id;
        $data['fillingstations'] = $this->FillingstationModel->get_fillingstation_byuserid($iduser);
   
        $this->load->view('template/header');
        $this->load->view('fillingstation/docuploads',$data);
        $this->load->view('template/footer');
    }

    public function formview()
    {
       

        $this->load->view('template/header');
        $this->load->view('/fillingstation/fillingstation_formview.php');
        $this->load->view('template/footer');
    }

    public function formupdate($idfillingstation)
    {
        

        $data['fillingstation'] = $this->FillingstationModel->getwhere_fillingstation($idfillingstation);
        $data['primaryid'] = $idfillingstation;

        $this->load->view('template/header');
        $this->load->view('/fillingstation/fillingstation_updateview.php',$data);
        $this->load->view('template/footer');
    }

    public function create() {
        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->form_validation->set_rules('fillingstation_name', 'fillingstation_name', 'min_length[0]|max_length[45]');
            $this->form_validation->set_rules('fillingstation_address', 'fillingstation_address', 'min_length[0]|max_length[450]');
            $this->form_validation->set_rules('numberoffueldespencers', 'numberoffueldespencers', 'numeric|min_length[0]|max_length[11]');
            $this->form_validation->set_rules('capacityofpetroltank', 'capacityofpetroltank', 'numeric|min_length[0]|max_length[11]');
            $this->form_validation->set_rules('capacityofdieseltank', 'capacityofdieseltank', 'numeric|min_length[0]|max_length[11]');
            $this->form_validation->set_rules('capacityofsuperpetrol', 'capacityofsuperpetrol', 'numeric|min_length[0]|max_length[11]');
            $this->form_validation->set_rules('capacityofsuperdiesel', 'capacityofsuperdiesel', 'numeric|min_length[0]|max_length[11]');
            $this->form_validation->set_rules('district', 'district', 'min_length[0]|max_length[45]');
            $this->form_validation->set_rules('Users_idUsers', 'Users_idUsers', 'required|min_length[0]|max_length[11]');
            $this->form_validation->set_rules('isapproved', 'isapproved', 'min_length[0]|max_length[4]');
            $this->form_validation->set_rules('approvedby', 'approvedby', 'min_length[0]|max_length[45]');
            $this->form_validation->set_rules('isdelete', 'isdelete', 'required|min_length[0]|max_length[1]');


            if ($this->form_validation->run()) {
                
                $data = array(
                    'fillingstation_name' => $this->input->post('fillingstation_name'),
                    'fillingstation_address' => $this->input->post('fillingstation_address'),
                    'numberoffueldespencers' => $this->input->post('numberoffueldespencers'),
                    'capacityofpetroltank' => $this->input->post('capacityofpetroltank'),
                    'capacityofdieseltank' => $this->input->post('capacityofdieseltank'),
                    'capacityofsuperpetrol' => $this->input->post('capacityofsuperpetrol'),
                    'capacityofsuperdiesel' => $this->input->post('capacityofsuperdiesel'),
                    'district' => $this->input->post('district'),
                    'Users_idUsers' => $this->input->post('Users_idUsers'),
                    'isapproved' => 0,
                    'approvedby' => "pending",
                    'isdelete' => 0,

                );

                $resultid = $this->FillingstationModel->insert_fillingstation($data);
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
   
       
       redirect('fuelstation/documents');
    }

    public function edit($idfillingstation) {
        
              
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $data = array(
                'fillingstation_name' => $this->input->post('fillingstation_name'),
                'fillingstation_address' => $this->input->post('fillingstation_address'),
                'numberoffueldespencers' => $this->input->post('numberoffueldespencers'),
                'capacityofpetroltank' => $this->input->post('capacityofpetroltank'),
                'capacityofdieseltank' => $this->input->post('capacityofdieseltank'),
                'capacityofsuperpetrol' => $this->input->post('capacityofsuperpetrol'),
                'capacityofsuperdiesel' => $this->input->post('capacityofsuperdiesel'),
                'district' => $this->input->post('district'),
                /*'Users_idUsers' => $this->input->post('Users_idUsers'),
                'isapproved' => $this->input->post('isapproved'),
                'approvedby' => $this->input->post('approvedby'),
                'isdelete' => $this->input->post('isdelete'),*/
            );

            $resultid = $this->FillingstationModel->update_fillingstation($idfillingstation, $data);

            if($resultid>0){
                $this->session->set_flashdata('message', 'Form updated successfully!');
            }else{
                $this->session->set_flashdata('error', 'Error in updating form');
            }
        }
        
        $data['fillingstation'] = $this->FillingstationModel->get_fillingstation_details();
        $data['docs'] = $this->DocumentsModel->get_documents();
        
        $data["users"] = $this->UsersModel->get_users();

        
        $this->load->view('template/header');
        $this->load->view('fillingstation/fillingstation_tableview', $data);
        $this->load->view('template/footer');
    }

    public function suspend($idfillingstation)
    {
        $resultid = $this->FillingstationModel->suspend_fillingstation($idfillingstation);
        redirect('fillingstation');
    }

    public function delete($idfillingstation) {
        
       
        $resultid = $this->FillingstationModel->delete_fillingstation($idfillingstation);

        if($resultid>0){
            $this->session->set_flashdata('message', 'Row Delete successfully!');
        }else{
            $this->session->set_flashdata('error', 'Error in Delete Row');
        }
        
        $data['fillingstation'] = $this->FillingstationModel->get_fillingstation();
        
        $data["users"] = $this->UsersModel->get_users();


        $this->load->view('template/header');
        $this->load->view('fillingstation/fillingstation_tableview', $data);
        $this->load->view('template/footer');
    }

    public function unapprovallist()
    {
       

        $data["fillingstations"] = $this->FillingstationModel->get_fillingstation_unapproved();    
        
        $this->load->view('template/header');
        $this->load->view('fillingstation/unapprovedfuelstations', $data);
        $this->load->view('template/footer');
    }

    public function unapprovallistbyid($id)
    {
       

        $data["fillingstation"] = $this->FillingstationModel->get_fillingstation_unapprovedbyid($id);         
        $data['docs'] = $this->DocumentsModel->getDocs($id);
        
        $this->load->view('template/header');
        $this->load->view('fillingstation/fuelstationdoc', $data);
        $this->load->view('template/footer');
    }

    public function approve($idfillingstation) {
        
              
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $data = array(
                'isapproved' => $this->input->post('isapproved'),
                'approvedby' => $this->input->post('approvedby')
            );

            $resultid = $this->FillingstationModel->update_fillingstation($idfillingstation, $data);

            if($resultid>0){
                $this->session->set_flashdata('message', 'Approved!');
            }else{
                $this->session->set_flashdata('error', 'Error in updating form');
            }
        }
        
       redirect("dashboard");
    }

    public function pendingOrderViewCustomer()
    {
        $userid = $this->session->userdata('user_id');

        $data['orderitems'] = $this->OrderitemsModel->get_orderitemsfordealer($userid);
        
        $this->load->view('template/header');
        $this->load->view('fillingstation/customerdash',$data);
        $this->load->view('template/footer');
    }

    public function btnorderaccepted($orderitemid)
    {
        $mynumber = $this->session->userdata('phone');
       
        $this->FillingstationModel->orderaccepted($orderitemid);
        $this->smsgateway->sendSms($mynumber, "Order Completed...Thank You");
        
        $this->session->set_flashdata('message', 'Order completed successfully.');
        
        
        redirect('fillingstation/customers');
    }
    
    public function deleteitems($idorderitems) {
        
       
        $resultid = $this->OrderitemsModel->delete_orderitems($idorderitems);

        if($resultid>0){
            $this->session->set_flashdata('message', 'Row Delete successfully!');
        }else{
            $this->session->set_flashdata('error', 'Error in Delete Row');
        }
        
        $userid = $this->session->userdata('user_id');
        $data['orderitems'] = $this->OrderitemsModel->get_orderitemsfordealer($userid);
        
        


        $this->load->view('template/header');
        $this->load->view('fillingstation/customerdash', $data);
        $this->load->view('template/footer');
    }

}
