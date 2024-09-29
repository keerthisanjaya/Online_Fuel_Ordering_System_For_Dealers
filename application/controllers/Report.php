<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ReportModel'); 
        $this->load->model('UsersModel');
        $this->load->model('EmployeetypeModel');
        
         if($this->session->userdata('is_otp_verify') == false){
			redirect('login/auth');
		}
        
    }
    public function index() {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }
         // Get filters from the form
        $district = $this->input->post('districtFilter');
        $status = $this->input->post('approvalFilter');
        
        /*if ($status == 'All') {
            $data['fillingstation'] = $this->ReportModel->get_fillingstationByfilterAll($district);
            $data["users"] = $this->UsersModel->get_users();
        } else {
            $data['fillingstation'] = $this->ReportModel->get_fillingstationByfilter($district, $status);
            $data["users"] = $this->UsersModel->get_users();
         } else ($status == 'All' || $district = 'All' ) {
             $data['fillingstation'] = $this->ReportModel->get_fillingstationByfilterAllDetails();
            $data["users"] = $this->UsersModel->get_users();
             
         }
        */
        if ($status == 'All') {
            if ($district == 'All') {
                // Both status and district are 'All'
                $data['fillingstation'] = $this->ReportModel->get_fillingstationByfilterAllDetails();
            } else {
                // Only status is 'All'
                $data['fillingstation'] = $this->ReportModel->get_fillingstationByfilterAll($district);
            }
        } else {
            // Status is not 'All'
            $data['fillingstation'] = $this->ReportModel->get_fillingstationByfilter($district, $status);
        }
        
        $data["users"] = $this->UsersModel->get_users();
        

        $this->load->view('template/header');
        $this->load->view('report/fillingstationdetails_report', $data);
        $this->load->view('template/footer');
    }
     
    public function empReport() {

        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }
        
        

        $data['employee'] = $this->ReportModel->get_employee();
        $data["employeetype"] = $this->EmployeetypeModel->get_employeetype();

        $this->load->view('template/header');
        $this->load->view('report/employeedetails_report', $data);
        $this->load->view('template/footer');
    }
	
	
	public function loginlog_report() {

        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }

        $data['login'] = $this->ReportModel->loginlog();
        $data["employeetype"] = $this->EmployeetypeModel->get_employeetype();

        $this->load->view('template/header');
        $this->load->view('report/loginlog_report', $data);
        $this->load->view('template/footer');
    }
    

    public function fillingsation_filter($district, $approve) {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }

        $data['fillingstation1'] = $this->get_fillingstationByfilter($district, $approve);
      
         
        
        $this->load->view('template/header');
        $this->load->view('report/fillingstationdetails_report', $data);
        $this->load->view('template/footer');
    }
    

    public function fillingsationDistrictFilter($district) {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }

        $data['fillingstation2'] = $this->get_fillingstationBydistrictfilter($district);
        
         
        
        
        $this->load->view('template/header');
        $this->load->view('report/fillingstationdetails_report', $data);
        $this->load->view('template/footer');
    }
    
    public function viewCalibration() {
        // Get filters from the form
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
       
        
        // If dates are not provided, set default range (example: last 30 days)
        if (!$start_date) {
            $start_date = date('Y-m-d', strtotime('-1 Year'));
        }
        if (!$end_date) {
            $end_date = date('Y-m-d', strtotime('+1 Year'));
        }

        // Fetch order items data from the model based on filters
        $data['calibration'] = $this->ReportModel->getcalibrationDetails_all();
       
        $data['calibration'] = $this->ReportModel->getcalibrationDetails($start_date, $end_date);

        // Load the view with data
		 $this->load->view('template/header');  
		 $this->load->view('report/calibration_report', $data);
		 $this->load->view('template/footer');  
	
    }
    
    public function FuelOrderReport() {
       
        $data['orders'] = $this->ReportModel->showodersReport();
        
        // Load the view with data
        
		 $this->load->view('template/header');  
		 $this->load->view('report/fuelorder', $data);
		 $this->load->view('template/footer');  
	
    }

     public function BowserwiseOrderReport() {
       
      /*  $data['$vehicle'] = $this-> ReportModel->vehiclefororder();
        var_dump($data['$vehicle']);
        die();
        $bowserID = $data['$vehicle'][0]->idvehicle;*/
         $data['vehicle'] = $this-> ReportModel->vehiclefororder();
          $data['orders'] = $this->ReportModel->showoderswiseReportAll();
          
       
         $idbowser = $this->input->post('bowser');
         
           $data['orders'] = $this->ReportModel->showoderswiseReportAll();
               
         $data['orders'] = $this->ReportModel->showoderswiseReport($idbowser);
        
		 $this->load->view('template/header');  
		 $this->load->view('report/filterbowser', $data);
		 $this->load->view('template/footer');  
	
    }
    
     


}