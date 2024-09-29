<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportModel extends CI_Model {


    public function get_fillingstation()
    {
        $query = $this->db->get('fillingstation');
        return $query->result();
    }

    public function get_employee()
    {
        $this->db->where('isdelete', false);
        $query = $this->db->get('employee');
        return $query->result();
    }

    public function get_fillingstationByfilter($district, $status)
    {
        $query = $this->db->query("SELECT * FROM `fillingstation`                                                      
                                                     left JOIN users ON users.idUsers = fillingstation.Users_idUsers
                                                     where fillingstation.district = '$district' AND
                                                     fillingstation.isapproved = '$status';");
        return $query->result();
    }
    
    public function get_fillingstationByfilterAll($district)
    {
        $query = $this->db->query("SELECT * FROM `fillingstation`                                                      
                                                     left JOIN users ON users.idUsers = fillingstation.Users_idUsers
                                                     where fillingstation.district = '$district';");
        return $query->result();
    }
    
    public function get_fillingstationByfilterAllDetails()
    {
        $query = $this->db->query("SELECT * FROM `fillingstation`                                                      
                                                     left JOIN users ON users.idUsers = fillingstation.Users_idUsers ;");
        return $query->result();
    }
    
    public function get_fillingstationBydistrictfilter($district)
    {
        $query = $this->db->query('SELECT * FROM `fillingstation` WHERE `district`= '.$district.';');
        return $query->result();
    }
	
	public function loginlog()
    {
        $query = $this->db->query('SELECT `loginlog`.`idloginlog`,`loginlog`.`logindate`,`loginlog`.`Users_idUsers`,`users`.`firstname`, `users`.`lastname`,`users`.`nic`,`users`.`email`,`users`.`phonenumber` FROM `loginlog`,`users` WHERE `users`.`idUsers`= `loginlog`.`Users_idUsers` ORDER BY `loginlog`.`logindate` DESC;');
        return $query->result();
    }
    
    public function getcalibrationDetails($start_date, $end_date)
	{
        // Formulate the SQL query
        $query = $this->db->query("SELECT *
                                        FROM vehicle_calibration_certificate v
                                        left join vehicle ON vehicle.idvehicle = v.vehicle_idvehicle
                                        WHERE (v.vehicle_calibration_certificate_issue_date) >= '$start_date'
                                        AND (v.vehicle_calibration_certificate_expiry_date) <= '$end_date'
                                        GROUP BY v.idvehicle_calibration_certificate;");
        return $query->result();
    }
    
    public function getcalibrationDetails_all()
	{
        // Formulate the SQL query
        $query = $this->db->query("SELECT *
                                        FROM vehicle_calibration_certificate v
                                        left join vehicle ON vehicle.idvehicle = v.vehicle_idvehicle
                                        GROUP BY v.idvehicle_calibration_certificate;");
        return $query->result();
    }
    
     public function showodersReport()
    {
        $query = $this->db->query("SELECT * FROM `orders`
                                            LEFT JOIN fillingstation ON fillingstation.idfillingstation = orders.fillingstation_idfillingstation
                                            where orders.isapproved = 1 AND orders.ispaid=1
                                            GROUP BY orderdate DESC;");
        return $query->result();
    }
    
     public function showoderswiseReport($idbowser)
    {
        $query = $this->db->query("SELECT * FROM `orders` 
                                            left join fillingstation ON fillingstation.idfillingstation = orders.fillingstation_idfillingstation
                                            left join orderitems ON orderitems.orders_idorders = orders.idorders
                                            left join bowserassign ON bowserassign.orderitemid = orderitems.idorderitems
                                            left join vehicle ON vehicle.idvehicle = bowserassign.vehiclenum
                                            where bowserassign.vehiclenum = '$idbowser';");
        return $query->result();
    }
    
    public function vehiclefororder()
    {
        $query = $this->db->query("SELECT * FROM `vehicle` 
                                    where vehicle_is_active =1 AND vehicle_is_available =1;");
        return $query->result();
    }
    
     public function showoderswiseReportAll()
    {
        $query = $this->db->query("SELECT * FROM `orders` 
                                            left join fillingstation ON fillingstation.idfillingstation = orders.fillingstation_idfillingstation
                                            left join orderitems ON orderitems.orders_idorders = orders.idorders
                                            left join bowserassign ON bowserassign.orderitemid = orderitems.idorderitems
                                           ;");
        return $query->result();
    }
    

    }

   
