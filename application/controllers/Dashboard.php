<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('FillingstationModel');
		$this->load->model('OrdersModel');
		 $this->load->model('EmployeeModel');
		 
		 if($this->session->userdata('is_otp_verify') == false){
			redirect('login/auth');
		}
        
    }

   public function dashboard()
   {

        $iduser = $this->session->user_id;
        $data['fillingstations'] = $this->FillingstationModel->get_fillingstation_byuserid($iduser);
        $data['fillingstationspending'] = $this->FillingstationModel->get_fillingstation_byuseridunapproved($iduser);
        $data['fillingstationspending2'] = $this->FillingstationModel->get_fillingstation_byuseridapproved2($iduser);
		$data['districtpie'] = $this->FillingstationModel->showDistrictCount();
		$data['orders'] = $this->OrdersModel->showodersdashboard($iduser);
		$data['genderwisepiechart'] = $this->EmployeeModel->genderwisepiechart();
		$data['gradewisepiechart'] = $this->EmployeeModel->gradewisepiechart();
		$data['orders_data'] = $this->OrdersModel->get_orders_data();
		
        
   
        $this->load->view('template/header');
        $this->load->view('dashboard/dashboard',$data);
        $this->load->view('template/footer');
   }
   
   
}
