<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VehicleModel extends CI_Model {

    public function get_vehicle()
    {
        $this->db->where('isdelete', false);
        $query = $this->db->get('vehicle');
        return $query->result();
    }

    public function insert_vehicle($data) 
    {
        $this->db->insert('vehicle', $data);
        return $this->db->insert_id();
    }

    public function getwhere_vehicle($idvehicle)
    {
        $query = $this->db->get_where('vehicle', array('idvehicle' => $idvehicle));
        return $query->row();
    }

    public function update_vehicle($idvehicle, $data) {
        $this->db->where('idvehicle', $idvehicle);
        return $this->db->update('vehicle', $data);
    }

    public function delete_vehicle($idvehicle) {
        $data = array(
            'isdelete' => 1,
        );
        $this->db->where('idvehicle', $idvehicle);
        return $this->db->update('vehicle', $data);
    }

    public function availablevehicledata()
    {
        $query = $this->db->query('SELECT `vehicle_number` FROM `vehicle` WHERE `vehicle_is_available` = 1');
        return $query->result();
    }
    
    public function vehicle_details()
    {
        $query = $this->db->query('SELECT *  FROM `vehicle`
	left join location on location.idLocation = vehicle.Location_idLocation
	left join vehicle_type on vehicle_type.idvehicle_type = vehicle.vehicle_type_idvehicle_type
	
	where `location`.`location_is_active`=1;');
        return $query->result();
    }
    
    public function vehicle_details_by_Id($idvehicle)
    {
        $query = $this->db->query("SELECT *  FROM `vehicle`
	left join location on location.idLocation = vehicle.Location_idLocation
	left join vehicle_type on vehicle_type.idvehicle_type = vehicle.vehicle_type_idvehicle_type
	
	where `location`.`location_is_active`=1 AND vehicle.idvehicle= '$idvehicle'");
        return $query->result();
    }
    
    public function get_vehicle_byID($idvehicle)
    {
        $this->db->where('isdelete', false);
        $this->db->where('idvehicle', $idvehicle);
        $query = $this->db->get('vehicle');
        return $query->result();
    }
    
    public function vehicle_details_join()
    {
        $query = $this->db->query("SELECT * FROM `vehicle` 
                                                left join vehicle_type ON vehicle_type.idvehicle_type = vehicle.vehicle_type_idvehicle_type
                                                left join location ON location.idLocation = vehicle.Location_idLocation;");
        return $query->result();
    }

}