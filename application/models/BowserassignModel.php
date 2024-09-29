<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BowserassignModel extends CI_Model {

    public function get_bowserassign()
    {
        $query = $this->db->get('bowserassign');
        return $query->result();
    }

    public function insert_bowserassign($data, $orderitemid) 
    {
        
        $this->db->where('idorderitems', $orderitemid);
        $data2 = array(
            'orderstatus' => 3,
        );
        $this->db->update('orderitems', $data2);

        $this->db->insert('bowserassign', $data);
        return $this->db->insert_id();
    }

    public function getwhere_bowserassign($idbowser)
    {
        $query = $this->db->get_where('bowserassign', array('idbowser' => $idbowser));
        return $query->row();
    }

    public function update_bowserassign($idbowser, $data) {
        $this->db->where('idbowser', $idbowser);
        return $this->db->update('bowserassign', $data);
    }

    public function delete_bowserassign($idbowser) {
        $data = array(
            'isdelete' => 1,
        );
        $this->db->where('idbowser', $idbowser);
        return $this->db->update('bowserassign', $data);
    }

    public function getvehiclenumanddriver($invnum)
    {
        $this->db->where('invnum', $invnum);
        $query = $this->db->get('bowserassign');
        return $query->result();
    }

    public function getSecurityData()
    {
        $query = $this->db->query("SELECT `bowserassign`.`idbowser`, `bowserassign`.`invnum`, `vehicle`.`vehicle_number` AS 'vehiclenum', `employee`.`epf` AS 'drivernum', `bowserassign`.`sealnumber`, `bowserassign`.`exittime`, `orderitems`.`orderstatus` FROM `bowserassign`, `vehicle`, `employee`,`orderitems` WHERE `bowserassign`.`vehiclenum` = `vehicle`.`idvehicle` AND `bowserassign`.`drivernum` = `employee`.`idemployee` AND `bowserassign`.`orderitemid`=`orderitems`.`idorderitems` AND `bowserassign`.`allowgateexit` = 1 order by  `bowserassign`.`idbowser` desc;");

        return $query->result();
    }
    
    public function Updategatestatus($idbowser)
    {
        
        $query = $this->db->query("UPDATE `orderitems` 
                                         SET `orderstatus` = '5' 
                                        WHERE `idorderitems` IN (
                                        SELECT `orderitems`.`idorderitems` 
                                        FROM `orderitems` 
                                        INNER JOIN `bowserassign` ON `orderitems`.`idorderitems` = `bowserassign`.`orderitemid` 
                                        WHERE `bowserassign`.`idbowser` = '$idbowser');");
       
    }
    
    public function update_exit_time($idbowser)
	{
        $data = array(
            'exittime' => date("Y-m-d H:i:s"),
        );

        $this->db->where('idbowser', $idbowser);
        $this->db->update('bowserassign', $data);

	}
	
	 public function getUserdatabyID($idbowser)
    {
        $query = $this->db->query("SELECT * FROM `bowserassign` 
															left join orderitems ON bowserassign.orderitemid = orderitems.idorderitems
															left join orders ON bowserassign.invnum = orders.invoicenum
															left JOIN fillingstation ON orders.fillingstation_idfillingstation = fillingstation.idfillingstation
															left join users On fillingstation.Users_idUsers = users.idUsers
															where bowserassign.idbowser= '$idbowser';");

        return $query->result();
    }

}