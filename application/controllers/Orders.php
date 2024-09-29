<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('OrdersModel'); 
        $this->load->model('OrderitemsModel'); 
        $this->load->model('FillingstationModel');
        $this->load->model('VehicleModel');
        $this->load->model('EmployeeModel');
        $this->load->model('MaterialpriceModel');
        $this->load->model('BowserassignModel');
        $this->load->library('smsgateway');
        $this->load->library('form_validation'); 
        $this->load->library('pdf');
        
        
         if($this->session->userdata('is_otp_verify') == false){
			redirect('login/auth');
		}
    }

    public function index() {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }

        $data['orders'] = $this->OrdersModel->get_orders();
        $data["fillingstation"] = $this->FillingstationModel->get_fillingstation();
        $data["vehicle"] = $this->VehicleModel->get_vehicle();
        $data["employee"] = $this->EmployeeModel->get_employee();

        $this->load->view('template/header');
        $this->load->view('fuelorder/orders_tableview', $data);
        $this->load->view('template/footer');
    }

    //depreciated
    public function showtables()
    {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }
        
        $data['orders'] = $this->OrdersModel->getAllOrdersJoin();

//          $data['orders'] = $this->OrdersModel->showordersforbowserassign();

// 	    	$data["fillingstation"] = $this->FillingstationModel->get_fillingstation();

//          $data['completedorders'] = $this->OrdersModel->showCompletedOrders();

//           $data['bowserassign'] = $this->BowserassignModel->get_bowserassign();

        $this->load->view('template/header');
        $this->load->view('fuelorder/orderstable', $data);
        $this->load->view('template/footer');

    }


    //for edit 25555
    public function gantrydashboard()
    {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }

        $data['orders'] = $this->OrdersModel->showordersforgantryop();

        $data["fillingstation"] = $this->FillingstationModel->get_fillingstation();

        $data['completedorders'] = $this->OrdersModel->showCompletedOrders();

        $data['bowserassign'] = $this->BowserassignModel->get_bowserassign();

        $this->load->view('template/header');
        $this->load->view('fuelorder/gantrydash', $data);
        $this->load->view('template/footer');
    }

    //new approval table
    public function orderapprovaltbl()
    {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }

        $data['orders'] = $this->OrdersModel->showoders();
        $data["fillingstation"] = $this->FillingstationModel->get_fillingstation();

        $data['completedorders'] = $this->OrdersModel->showCompletedOrders();

        $data['bowserassign'] = $this->BowserassignModel->get_bowserassign();

        $this->load->view('template/header');
        $this->load->view('fuelorder/orderapprovaltbl', $data);
        $this->load->view('template/footer');
    }

    public function orderapproval($orderid)
    {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }

        $username = $this->session->userdata('username');

        $this->OrdersModel->orderapproval($orderid, $username);
        
        $orderDetails = $this->OrdersModel->getorderdetails($orderid);
		
		$invoiceNumber = $orderDetails[0]->invoicenum;
		$fillingstation = $orderDetails[0]->fillingstation_name;
		$fillingstationAdd = $orderDetails[0]->fillingstation_address;
		$date = $orderDetails[0]->orderdate;
		
		$currentDate = date("Y-m-d H:i:s");
        
        $data = $this->OrdersModel->showphonenumber($orderid);
        $message = " Your order invoice : $invoiceNumber, approved by Admin fillingstation Name: $fillingstation, orderdate : $date, Approved date: .$currentDate";
        
       $phonenum = $data[0]->phonenumber;
       
       $this->smsgateway->sendSms($phonenum,$message );

        redirect('orders/table');
    }



    public function opengate($idorders)
    {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }




    }

    public function assignbowser($orderid)
    {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }

        $data['orderdata'] = $this->OrdersModel->showodersbyorderid($orderid);
        $data['vehicledata'] = $this->VehicleModel->availablevehicledata();
        $data['driverdata'] = $this->EmployeeModel->availabledrivers();
        
        $this->load->view('template/header');
        $this->load->view('fuelorder/vehicleassignform', $data);
        $this->load->view('template/footer');
    }

    public function savebowser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->form_validation->set_rules('invnum', 'invnum', 'required|min_length[0]|max_length[50]');
            $this->form_validation->set_rules('fuelstationname', 'fuelstationname', 'required|min_length[0]|max_length[50]');
            $this->form_validation->set_rules('vehiclenum', 'vehiclenum', 'required|min_length[0]|max_length[50]');
            $this->form_validation->set_rules('drivernum', 'drivernum', 'required|min_length[0]|max_length[50]');


            if ($this->form_validation->run()) {
                
                $data = array(
                    'invnum' => $this->input->post('invnum'),
                    'fuelstationname' => $this->input->post('fuelstationname'),
                    'vehiclenum' => $this->input->post('vehiclenum'),
                    'drivernum' => $this->input->post('drivernum'),
                );

                $resultid = $this->OrdersModel->insert_bowserassign($data);
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

        redirect("/dashboard");
    }

    public function formview()
    {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }

        $this->load->view('template/header');
        $this->load->view('/fuelorder/orders_formview.php');
        $this->load->view('template/footer');
    }


    public function placeorders()
    {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }

        $stationid =  $this->input->get('fillingstation_idfillingstation');
        $data["materialprices"] = $this->MaterialpriceModel->get_materialpricetoday();
        $data['fillingstation'] = $this->FillingstationModel->get_fillingstation_byid($stationid);
        $last = $this->OrdersModel->getlastrow();
        $current = $last->idorders+1;

        $data['invnum'] = rand(1000,9999)."_RZ_".$current;
        
        $this->load->view('template/header');
        $this->load->view('fuelorder/purchaseorders', $data);
        $this->load->view('template/footer');
    }

    public function placeorderssave()
    {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {

            $materialprices = $this->MaterialpriceModel->get_materialpricetoday();

            //$this->form_validation->set_rules('orderdate', 'orderdate', 'valid_date|min_length[0]');
            $this->form_validation->set_rules('amount', 'amount', 'numeric|min_length[0]');
          //  $this->form_validation->set_rules('discount', 'discount', 'numeric|min_length[0]');
           // $this->form_validation->set_rules('tax', 'tax', 'numeric|min_length[0]');
            //$this->form_validation->set_rules('isapproved', 'isapproved', 'min_length[0]|max_length[4]');
            $this->form_validation->set_rules('fillingstation_idfillingstation', 'fillingstation_idfillingstation', 'required|min_length[0]|max_length[11]');
            //$this->form_validation->set_rules('approvedby', 'approvedby', 'min_length[0]|max_length[45]');
            //$this->form_validation->set_rules('vehicle_idvehicle', 'vehicle_idvehicle', 'required|min_length[0]|max_length[11]');
            //$this->form_validation->set_rules('employee_idemployee', 'employee_idemployee', 'required|min_length[0]|max_length[11]');
            //$this->form_validation->set_rules('isdelete', 'isdelete', 'required|min_length[0]|max_length[1]');

           

            if ($this->form_validation->run()) 
            {
                
                $data = array(
                    'invoicenum' => $this->input->post('invoicenum'),
                    'orderdate' => $this->input->post('orderdate'),
                    'amount' => $this->input->post('amount'),
                    'discount' => $this->input->post('discount'),
                    'tax' => $this->input->post('tax'),
                    'isapproved' => 0,
                    'fillingstation_idfillingstation' => $this->input->post('fillingstation_idfillingstation'),
                    'approvedby' => "none",
                    //'vehicle_idvehicle' => $this->input->post('vehicle_idvehicle'),
                    //'employee_idemployee' => $this->input->post('employee_idemployee'),
                    'isdelete' => 0,

                );

                $orderid = $this->OrdersModel->insert_orders($data);

                if($orderid>0){
                    $this->session->set_flashdata('message', 'Form submitted successfully!');
                }else{
                    $this->session->set_flashdata('error', 'Error in submitting form');
                }

                $ordeitemsmsg = "";

                $grandtotal_val = 0;

                foreach($materialprices as $mat)
                { 

                // $this->form_validation->set_rules('Itm_'.$mat->materialtype, 'Itm_'.$mat->materialtype, 'min_length[0]|max_length[45]');
                // $this->form_validation->set_rules('Qty_'.$mat->materialtype, 'Qty_'.$mat->materialtype, 'numeric|min_length[0]');
                // $this->form_validation->set_rules('Total_'.$mat->materialtype, 'Total_'.$mat->materialtype, 'numeric|min_length[0]');
                // $this->form_validation->set_rules('orders_idorders', 'orders_idorders', 'required|min_length[0]|max_length[11]');
                //$this->form_validation->set_rules('isdelete', 'isdelete', 'required|min_length[0]|max_length[1]');
    
                
                if ($this->form_validation->run()) {
                
                    $data = array(
                        'itemname' => $this->input->post('Itm_'.$mat->materialtype),
                        'qty' => $this->input->post('Qty_'.$mat->materialtype),
                        'itemamount' => $this->input->post('Total_'.$mat->materialtype),
                        'orders_idorders' => $orderid,
                        'isdelete' => 0,
                    );
                    $itemName = $data['itemname'];
                    $quantity = $data['qty'];

                    $grandtotal_val += $this->input->post('Total_'.$mat->materialtype);
                     
                    if($data['qty'] > 0){    
                        $orderitemid = $this->OrderitemsModel->insert_orderitems($data);
                        $ordermat = $this->OrderitemsModel->get_orderitems();
                    

                        if($orderitemid>0){
                            $this->session->set_flashdata('message', 'Form submitted successfully!');

                            $ordeitemsmsg .= "Your Order is pending:   " . $itemName . ",- " . $quantity . "Ltr ";

                        }else{
                            $this->session->set_flashdata('error', 'Error in submitting form');
                        }
                    }
                }else{
                    $this->session->set_flashdata('error', validation_errors());
                } 
                
            }//foreach end

            
            $mynumber = $this->session->userdata('phone');
            $this->load->library('Smsgateway');
            $this->smsgateway->sendSms($mynumber, $ordeitemsmsg." date ".date("Y-m-d H:i:s"));
                    
            }else{
                $this->session->set_flashdata('error', validation_errors());
            }
        
        }else{
            $this->session->set_flashdata('error', "Bad Request");
        }
        
        $data["invdata"] = array(
            'invoicenum' => $this->input->post('invoicenum'),
            'orderdate' => $this->input->post('orderdate'),
            'amount' => $grandtotal_val,
            'discount' => $this->input->post('discount'),
            'tax' => $this->input->post('tax')
        );
        
        //take the invoice num and update the tupel. amount update.
        
        $this->OrdersModel->update_amount($data["invdata"]['invoicenum'], $data["invdata"]['amount']);

        //http://localhost/OnlinePayment/Payment/order/
        
        $this->load->view('fuelorder/carddetails',$data);
    
    }

    public function formupdate($idorders)
    {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }

        $data['orders'] = $this->OrdersModel->getwhere_orders($idorders);
        $data['primaryid'] = $idorders;

        $this->load->view('template/header');
        $this->load->view('/fuelorder/orders_updateview.php',$data);
        $this->load->view('template/footer');
    }

    public function create() {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->form_validation->set_rules('orderdate', 'orderdate', '|valid_date|min_length[0]');
            $this->form_validation->set_rules('amount', 'amount', '|numeric|min_length[0]');
            $this->form_validation->set_rules('discount', 'discount', '|numeric|min_length[0]');
            $this->form_validation->set_rules('tax', 'tax', '|numeric|min_length[0]');
            $this->form_validation->set_rules('isapproved', 'isapproved', '|min_length[0]|max_length[4]');
            $this->form_validation->set_rules('fillingstation_idfillingstation', 'fillingstation_idfillingstation', 'required|min_length[0]|max_length[11]');
            $this->form_validation->set_rules('approvedby', 'approvedby', '|min_length[0]|max_length[45]');
            $this->form_validation->set_rules('vehicle_idvehicle', 'vehicle_idvehicle', 'required|min_length[0]|max_length[11]');
            $this->form_validation->set_rules('employee_idemployee', 'employee_idemployee', 'required|min_length[0]|max_length[11]');
            $this->form_validation->set_rules('isdelete', 'isdelete', 'required|min_length[0]|max_length[1]');


            if ($this->form_validation->run()) {
                
                $data = array(
                    'orderdate' => $this->input->post('orderdate'),
                    'amount' => $this->input->post('amount'),
                    'discount' => $this->input->post('discount'),
                    'tax' => $this->input->post('tax'),
                    'isapproved' => $this->input->post('isapproved'),
                    'fillingstation_idfillingstation' => $this->input->post('fillingstation_idfillingstation'),
                    'approvedby' => $this->input->post('approvedby'),
                    'vehicle_idvehicle' => $this->input->post('vehicle_idvehicle'),
                    'employee_idemployee' => $this->input->post('employee_idemployee'),
                    'isdelete' => $this->input->post('isdelete'),

                );

                $resultid = $this->OrdersModel->insert_orders($data);
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
        $this->load->view('/fuelorder/orders_formview.php');
        $this->load->view('template/footer');
    }

    public function edit($idorders) {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }
              
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $data = array(
                'orderdate' => $this->input->post('orderdate'),
                'amount' => $this->input->post('amount'),
                'discount' => $this->input->post('discount'),
                'tax' => $this->input->post('tax'),
                'isapproved' => $this->input->post('isapproved'),
                'fillingstation_idfillingstation' => $this->input->post('fillingstation_idfillingstation'),
                'approvedby' => $this->input->post('approvedby'),
                'vehicle_idvehicle' => $this->input->post('vehicle_idvehicle'),
                'employee_idemployee' => $this->input->post('employee_idemployee'),
                'isdelete' => $this->input->post('isdelete'),

            );

            $resultid = $this->OrdersModel->update_orders($idorders, $data);

            if($resultid>0){
                $this->session->set_flashdata('message', 'Form updated successfully!');
            }else{
                $this->session->set_flashdata('error', 'Error in updating form');
            }
        }
        
        $data['orders'] = $this->OrdersModel->get_orders();
        
        $data["fillingstation"] = $this->FillingstationModel->get_fillingstation();
        $data["vehicle"] = $this->VehicleModel->get_vehicle();
        $data["employee"] = $this->EmployeeModel->get_employee();

        
        $this->load->view('template/header');
        $this->load->view('fuelorder/orders_tableview', $data);
        $this->load->view('template/footer');
    }

    public function delete($idorders) {
        if(!$this->session->userdata('email')){    
            redirect('login/auth');
        }
       
        $resultid = $this->OrdersModel->delete_orders($idorders);

        if($resultid>0){
            $this->session->set_flashdata('message', 'Row Delete successfully!');
        }else{
            $this->session->set_flashdata('error', 'Error in Delete Row');
        }
        
        $data['orders'] = $this->OrdersModel->get_orders();
        
        $data["fillingstation"] = $this->FillingstationModel->get_fillingstation();
        $data["vehicle"] = $this->VehicleModel->get_vehicle();
        $data["employee"] = $this->EmployeeModel->get_employee();


        $this->load->view('template/header');
        $this->load->view('fuelorder/orders_tableview', $data);
        $this->load->view('template/footer');
    }
	
	public function paymentResponce()
	{
		//echo "response received";
		$this->load->view('template/header');		
		if( $_GET['status'] != 'FAILED'){
			$data = array("status"=>"OK","alertType"=>'success', "message"=>"Online Payment status: " . $_GET['status']);
		}
		else{
			$data = array("status"=>"FAIL","alertType"=>'danger', "message"=>"Online Payment status: " . $_GET['status']);
		}
		
		
		
		$this->load->view('fuelorder/status', $data);	
		$this->load->view('template/footer');	
	}

    //business logic need to fix
    public function selectmaterial($idorder)
    {
        $data['ordertable'] = $this->OrdersModel->loaditemsfrominv($idorder);

        $data['orderid'] = $idorder;

        $this->load->view('template/header');   
        $this->load->view('businesslogic/bouserassign',$data);   
        $this->load->view('template/footer');
    }


    //business logic
    public function gantryselectmaterial($idorder)
    {
        $data['ordertable'] = $this->OrdersModel->loaditemsfrominv($idorder);

        $data['orderid'] = $idorder;

        $this->load->view('template/header');   
        $this->load->view('businesslogic/gantryassign',$data);   
        $this->load->view('template/footer');
    }

    public function fillbousers($idorder)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

             $invnum = $this->input->post('invnumber');
             $itemid = $this->input->post('materialname');

             $data['bouserassign'] = $this->BowserassignModel->getvehiclenumanddriver($invnum);

             $data['vehicles'] = $this->OrdersModel->getVehicleNo($data['bouserassign'][0]->vehiclenum);

             $data['drivers'] = $this->OrdersModel->getDriverEPF($data['bouserassign'][0]->drivernum);

             $data['ordertable'] = $this->OrdersModel->loaditemsfrominv($idorder);

             $data['orderid'] = $idorder;

             $data['materialname'] = $itemid;

            $this->load->view('template/header');   
            $this->load->view('businesslogic/gantryassign',$data);   
            $this->load->view('template/footer');

        }
    }

    public function fuelcomplete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $idorderitems = $this->input->post('idorderitems');
            $invnumber = $this->input->post('invnumber');
			$sealnumber = $this->input->post('sealnumber');
			$bowser = $this->input->post('Bourser');
			$driver = $this->input->post('driveravailable');
			
            $this->OrdersModel->updateGantryFuel($idorderitems);
            
            $data = $this->OrdersModel->getGantryCompletePhone($this->input->post('idorderitems'));
			$phonenum =$data[0]->phonenumber;
			
			$materaildata = $this->OrdersModel->getmaterialbyorderitemID($this->input->post('idorderitems'));
			
			$itemname = $materaildata[0]->itemname;
			
			$currentDate = date("Y-m-d H:i:s");
			
		/*	var_dump($driver);
			die(); */
			$message ="Filling completed for invoice number: $invnumber, Material Name: $itemname, $currentDate";
			
			$this->smsgateway->sendSms($phonenum, $message);

        }

        redirect('gantry/gantrydashboard');
    }

    public function assignbousers($idorder)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

             $invnum = $this->input->post('invnumber');
             $itemid = $this->input->post('materialname');

             $data['vehicles'] = $this->OrdersModel->availablebousers($itemid);

             $data['drivers'] = $this->OrdersModel->availabledrivers();

             $data['ordertable'] = $this->OrdersModel->loaditemsfrominv($idorder);

             $data['orderid'] = $idorder;

             $data['materialname'] = $itemid;

            $this->load->view('template/header');   
            $this->load->view('businesslogic/bouserassign',$data);   
            $this->load->view('template/footer');

        }
    }

    public function assigndriver()
    {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->form_validation->set_rules('invnumber', 'invnum', 'required|min_length[0]|max_length[50]');
            $this->form_validation->set_rules('Bourser', 'vehiclenum', 'required|min_length[0]|max_length[50]');
            $this->form_validation->set_rules('driveravailable', 'drivernum', 'required|min_length[0]|max_length[50]');


            if ($this->form_validation->run()) {
                
                $data = array(
                    'invnum' => $this->input->post('invnumber'),
                    'vehiclenum' => $this->input->post('Bourser'),
                    'drivernum' => $this->input->post('driveravailable'),
                    'sealnumber' => rand(10000,99999)."_".rand(100,999),
                    'orderitemid' => $this->input->post('orderitemid'),
                );

                $resultid = $this->BowserassignModel->insert_bowserassign($data, $this->input->post('orderitemid'));
                if($resultid>0){
                    
                    $data = $this->OrdersModel->getPhoneNumFromInvoiceId($this->input->post('invnumber'));
					
					$phonenum =$data[0]->phonenumber;
					
					$driverdata = $this->OrdersModel->getdriver($this->input->post('driveravailable'));
					
					$driverepf = 	$driverdata[0]->epf;
					
					$bowserdata = $this->OrdersModel->getbowser($this->input->post('Bourser'));
					
					$bowserno = $bowserdata[0]->vehicle_number;
					
					$materaildata = $this->OrdersModel->getmaterialbyorderitemID($this->input->post('orderitemid'));
					
					$itemname = $materaildata[0]->itemname;
					
				/*	var_dump($bowserdata[0]->vehicle_number);
					var_dump($data);
					exit();  */
					
				$this->smsgateway->sendSms($phonenum, "Material " . $itemname . ", Order " . $this->input->post('invnumber') . " is assigned with. Bowser: " . $bowserno  . ", Driver EPF: " . $driverepf);

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
   
        redirect('order/showtable');    
    
    }
    
    public function view_order_items() {
        // Get filters from the form
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $item_name = $this->input->post('item_name');
        
        // If dates are not provided, set default range (example: last 30 days)
        if (!$start_date) {
            $start_date = date('Y-m-d', strtotime('-30 days'));
        }
        if (!$end_date) {
            $end_date = date('Y-m-d');
        }

        // Fetch order items data from the model based on filters 
        
        if ($item_name == 'All') {
             $data['order_items'] = $this->OrdersModel->get_order_items_date($start_date, $end_date);
        } else {
             $data['order_items'] = $this->OrdersModel->get_order_items($start_date, $end_date, $item_name);
         }
        
		

        // Load the view with data
		 $this->load->view('template/header');  
		 $this->load->view('report/order_items_view', $data);
		 $this->load->view('template/footer');  
	
    }
    
    public function view_order_item_users() {
        // Get filters from the form
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $item_name = $this->input->post('item_name');
        $fillingstaion_name = $this->input->post('fillingstaion_name');
        
        // If dates are not provided, set default range (example: last 30 days)
        if (!$start_date) {
            $start_date = date('Y-m-d', strtotime('-30 days'));
        }
        if (!$end_date) {
            $end_date = date('Y-m-d');
        }

        // Fetch order items data from the model based on filters 
         if ($item_name == 'All') {
            $iduser = $this->session->user_id;
            $data['fillingstation'] = $this->FillingstationModel->get_fillingstation_byuseridapproved2($iduser);
            $data['order_items'] = $this->OrdersModel->get_users_order_items_date($start_date, $end_date, $iduser, $fillingstaion_name);
         } else {
             $iduser = $this->session->user_id;
            $data['fillingstation'] = $this->FillingstationModel->get_fillingstation_byuseridapproved2($iduser);
            $data['order_items'] = $this->OrdersModel->get_users_order_items($start_date, $end_date, $item_name, $iduser, $fillingstaion_name);
         }
    		

        // Load the view with data
		 $this->load->view('template/header');  
		 $this->load->view('report/user_order_items', $data);
		 $this->load->view('template/footer');  
	
    }
    
    function printInvoice($idorderitems){

		
		
		//if($this->input->get('id'))
		//{
		date_default_timezone_set('Asia/Colombo');
		$date = date('Y-m-d');
		$time = date('H:i:s');
		//echo 'here';
		$user_id = $this->session->userdata('user_id');
		//$created_by = $this->session->userdata('user_id');
		//$invoiceData = $this->Inventory_retail_invoice_header_model->fetch_all_by_branch_id_invoice_id($branch_id, $this->input->get('id'));
		$invoiceData = $this->OrdersModel->get_invoice_number($idorderitems);
		$invoice_no = $invoiceData[0]->invoicenum;
		//var_dump($invoice_no);
		//die();
		
		//$invoiceData = $invoiceData->result_array();
		//$invoice_no = '5110_RZ_24';
		//$total_amount = $invoiceData[0]["total_amount"];


		//$customerData  = $this->Customer_model->fetch_single($invoiceData[0]['customer_id']);
		$data['orders'] = $this->OrdersModel->getAllOrdersJoin();
		$itemData  = $this->OrdersModel->get_order_items_invoice($user_id, $invoice_no);
		$datetime = $itemData[0]->orderdate;

		//$itemData  = $this->Inventory_retail_invoice_detail_model->fetch_all_by_invoice_id($invoice_no);
		//$itemData  = $itemData;



		$itemHtml = '';
		$itemamount=0;

//var_dump($datetime);
//die();
		foreach($itemData as $item){
			//var_dump($item);
		$itemamount += $item ->itemamount;
		$itemHtml .='<tr>
		<th>'.$item->itemname.'</th>
		
		<th style="text-align: right;">'.$item->qty.'</th>
		<th style="text-align: right;">'.$item->itemamount.'</th>
		 </tr>';
		}



		//$compData = $this->Company_model->fetch_all_active();
		//$compData = $compData->result_array();


		//$company_logo = base_url().'assets/img/logo.jpg';

		$message = file_get_contents(base_url().'assets/template/invoice.html');
		//echo base_url().'assets/template/email.html';
		//$message = str_replace('%company_email%', $compData[0]['company_logo'], $message);
		$message = str_replace('%customer_name%', $this->session->userdata('username'), $message);
		//$message = str_replace('%customer_address%', $customerData[0]['customer_working_address'], $message);
		$message = str_replace('%customer_contact%', $this->session->userdata('phone'), $message);
		$message = str_replace('%customer_email%', $this->session->userdata('email'), $message);
		$message = str_replace('%created_date%', $datetime, $message);
		$message = str_replace('%created_time%', $time, $message);
		$message = str_replace('%invoice_no%', $invoice_no, $message);
		$message = str_replace('%itemArr%',$itemHtml, $message);
		$message = str_replace('%total_amount%',$itemamount, $message);
		
		//var_dump($message);

		//---------------PDF----------------------//
		//$html = $this->load->view('template/pdfInvoice', $data, true);
		$pdfUrl = $this->pdf->createPDF($message, 'Invoice', true);
		//---------------PDF----------------------//

		//}


		}
    
    
}
