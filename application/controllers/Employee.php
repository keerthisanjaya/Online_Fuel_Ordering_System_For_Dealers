<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('EmployeeModel'); 
        $this->load->model('EmployeetypeModel');

        $this->load->library('form_validation'); 
        if($this->session->userdata('is_otp_verify') == false){
			redirect('login/auth');
		}
    }

    public function index() {

        
        $data['employee'] = $this->EmployeeModel->getemployeeAll();

       /* $data['employee'] = $this->EmployeeModel->get_employee();
		$data['createdby'] = $this->EmployeeModel->get_name();     
        $data['employeetype'] = $this->EmployeetypeModel->get_employeetype();*/

        $this->load->view('template/header');
        $this->load->view('employee/employee_tableview', $data);
        $this->load->view('template/footer');
    }

    //employee register
    public function formview()
    {
        
		
		$data['employee'] = $this->EmployeeModel->get_employee();
        $data['employeetype'] = $this->EmployeetypeModel->getEmployeetypes();

        $this->load->view('template/header');
        $this->load->view('/employee/employee_formview',$data);
        $this->load->view('template/footer');
    }

    public function applyasemployee()
    {
        

        $data['employee'] = $this->EmployeeModel->get_employee();

        $data["employeetype"] = $this->EmployeetypeModel->get_employeetype();

        $this->load->view('template/header');
        $this->load->view('employee/emlpoyeeapplication',$data);
        $this->load->view('template/footer');
    }

    public function formupdate($idemployee)
    {
        

        $data['employee'] = $this->EmployeeModel->getwhere_employee($idemployee);
        $data['primaryid'] = $idemployee;
		$data["employeetype"] = $this->EmployeetypeModel->get_employeetype();
		$data['employee1'] = $this->EmployeeModel->get_employee();

        $this->load->view('template/header');
        $this->load->view('/employee/employee_updateview.php',$data);
        $this->load->view('template/footer');
    }

    public function create() {
        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->form_validation->set_rules('epf', 'epf', 'required|min_length[0]|max_length[45]');
			$this->form_validation->set_rules('fname', 'fname', 'required|min_length[0]|max_length[45]');
			$this->form_validation->set_rules('lname', 'lname', 'required|min_length[0]|max_length[45]');
			$this->form_validation->set_rules('grade', 'grade', 'required|min_length[0]|max_length[45]');
			$this->form_validation->set_rules('gender', 'gender', 'required|min_length[0]|max_length[45]');
            //$this->form_validation->set_rules('isactive', 'isactive', '|min_length[0]|max_length[4]');
            //$this->form_validation->set_rules('isavailable', 'isavailable', '|min_length[0]|max_length[4]');
            $this->form_validation->set_rules('employeetype_idemployeetype', 'employeetype_idemployeetype', 'required|min_length[0]|max_length[11]');
            //$this->form_validation->set_rules('userid', 'userid', '|numeric|min_length[0]|max_length[11]|is_unique[employee.userid,idemployee,{idemployee}]');
            //$this->form_validation->set_rules('isdelete', 'isdelete', 'required|min_length[0]|max_length[1]');
            

            if ($this->form_validation->run()) {
                
                $data = array(
                    'epf' => $this->input->post('epf'),
					'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'grade' => $this->input->post('grade'),
					'gender' => $this->input->post('gender'),							
                    'isactive' => 0,
                    'isavailable' => 0,
                    'employeetype_idemployeetype' => $this->input->post('employeetype_idemployeetype'),
                    'userid' => $this->session->user_id,
                    'isdelete' => 0,


                );

                $resultid = $this->EmployeeModel->insert_employee($data);
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
   
       
        redirect("dashboard/");
    }


    public function employeesave() {
        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->form_validation->set_rules('employeetype_idemployeetype', 'employeetype_idemployeetype', 'required|min_length[0]|max_length[11]');
			$this->form_validation->set_rules('epf', 'epf', 'required|min_length[0]|max_length[45]');
			$this->form_validation->set_rules('fname', 'fname', 'required|min_length[0]|max_length[45]');
			$this->form_validation->set_rules('lname', 'lname', 'required|min_length[0]|max_length[45]');
			$this->form_validation->set_rules('grade', 'grade', 'required|min_length[0]|max_length[45]');
			$this->form_validation->set_rules('gender', 'gender', 'required|min_length[0]|max_length[45]');
            //$this->form_validation->set_rules('isactive', 'isactive', '|min_length[0]|max_length[4]');
            //$this->form_validation->set_rules('isavailable', 'isavailable', '|min_length[0]|max_length[4]');
            $this->form_validation->set_rules('employeetype_idemployeetype', 'employeetype_idemployeetype', 'required|min_length[0]|max_length[11]');
            $this->form_validation->set_rules('userid', 'userid', '|numeric|min_length[0]|max_length[11]|is_unique[employee.userid,idemployee,{idemployee}]');
            //$this->form_validation->set_rules('isdelete', 'isdelete', 'required|min_length[0]|max_length[1]');
            $epfnum = $this->EmployeeModel->getEpfnum($this->session->user_id);
            

            if ($this->form_validation->run()) {
                
                $data = array(
                    'epf' =>  $this->input->post('epf'),
					'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'grade' => $this->input->post('grade'),
					'gender' => $this->input->post('gender'),
                    'isactive' => 0,
                    'isavailable' => 0,
                    'employeetype_idemployeetype' => $this->input->post('employeetype_idemployeetype'),
                    'userid' => $this->session->user_id,
                    'isdelete' => 0,
                );

                $resultid = $this->EmployeeModel->insert_employee($data);
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
   
        redirect("dashboard");
    }

    public function edit($idemployee) {
        
              
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $data = array(
                'epf' => $this->input->post('epf'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'grade' => $this->input->post('grade'),
				'gender' => $this->input->post('gender'),
				'isactive' => $this->input->post('isactive'),
				'isavailable' => $this->input->post('isavailable'),
				'employeetype_idemployeetype' => $this->input->post('employeetype_idemployeetype'),
				'isdelete' => $this->input->post('isdelete'),


            );

            $resultid = $this->EmployeeModel->update_employee($idemployee, $data);

            if($resultid>0){
                $this->session->set_flashdata('message', 'Form updated successfully!');
            }else{
                $this->session->set_flashdata('error', 'Error in updating form');
            }
        }
        $data['employee'] = $this->EmployeeModel->getemployeeAll();
        $data['employee1'] = $this->EmployeeModel->get_employee();
        $data['createdby'] = $this->EmployeeModel->get_name();       
        $data["employeetype"] = $this->EmployeetypeModel->get_employeetype();

        
        $this->load->view('template/header');
        $this->load->view('employee/employee_tableview', $data);
        $this->load->view('template/footer');
    }

    public function delete($idemployee) {
        
       
        $resultid = $this->EmployeeModel->delete_employee($idemployee);

        if($resultid>0){
            $this->session->set_flashdata('message', 'Row Delete successfully!');
        }else{
            $this->session->set_flashdata('error', 'Error in Delete Row');
        }
        
        $data['employee'] = $this->EmployeeModel->get_employee();
		$data['createdby'] = $this->EmployeeModel->get_name();        
        $data["employeetype"] = $this->EmployeetypeModel->get_employeetype();


        $this->load->view('template/header');
        $this->load->view('employee/employee_tableview', $data);
        $this->load->view('template/footer');
    }

    public function empRegisterApproval()
    {
        

        $data['employee'] = $this->EmployeeModel->get_employee();

        $this->load->view('template/header');
        $this->load->view('employee/emlpoyeeapplication',$data);
        $this->load->view('template/footer');
    }

    public function empApproved($idemployee)
    {
        
              
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            
            $data['isactive'] = 1;

            $resultid = $this->EmployeeModel->update_employee($idemployee, $data);

            if($resultid>0){
                $this->session->set_flashdata('message', 'Form updated successfully!');
            }else{
                $this->session->set_flashdata('error', 'Error in updating form');
            }
        }
        
        $data['employee'] = $this->EmployeeModel->get_employee();
        
        $data["employeetype"] = $this->EmployeetypeModel->get_employeetype();

        
        $this->load->view('template/header');
        $this->load->view('employee/emlpoyeeapplication', $data);
        $this->load->view('template/footer');
    }


    public function empApprovedActivate($idemployee)
    {
        
              
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            
            $data['isavailable'] = 1;

            $resultid = $this->EmployeeModel->update_employee($idemployee, $data);

            if($resultid>0){
                $this->session->set_flashdata('message', 'Form updated successfully!');
            }else{
                $this->session->set_flashdata('error', 'Error in updating form');
            }
        }
        
        $data['employee'] = $this->EmployeeModel->get_employee();
        
        $data["employeetype"] = $this->EmployeetypeModel->get_employeetype();

        
        $this->load->view('template/header');
        $this->load->view('employee/emlpoyeeapplication', $data);
        $this->load->view('template/footer');
    }

    public function empApprovedDeactivate($idemployee)
    {
        
              
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            
            $data['isavailable'] = 0;

            $resultid = $this->EmployeeModel->update_employee($idemployee, $data);

            if($resultid>0){
                $this->session->set_flashdata('message', 'Form updated successfully!');
            }else{
                $this->session->set_flashdata('error', 'Error in updating form');
            }
        }
        
        $data['employee'] = $this->EmployeeModel->get_employee();
        
        $data["employeetype"] = $this->EmployeetypeModel->get_employeetype();

        
        $this->load->view('template/header');
        $this->load->view('employee/emlpoyeeapplication', $data);
        $this->load->view('template/footer');
    }
}
