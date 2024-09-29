<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrdersModel extends CI_Model {

    public function get_orders()
    {
        $this->db->where('isdelete', false);
        $query = $this->db->get('orders');
        return $query->result();
    }

    public function insert_orders($data) 
    {
        $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }

    public function getwhere_orders($idorders)
    {
        $query = $this->db->get_where('orders', array('idorders' => $idorders));
        return $query->row();
    }

    public function update_orders($idorders, $data) {
        $this->db->where('idorders', $idorders);
        return $this->db->update('orders', $data);
    }

    public function delete_orders($idorders) {
        $data = array(
            'isdelete' => 1,
        );
        $this->db->where('idorders', $idorders);
        return $this->db->update('orders', $data);
    }

    public  function getlastrow()
    {
        $last = $this->db->order_by('idorders',"desc")->limit(1)->get('orders')->row();
        return $last;
    }

    public function showoders()
    {
        $query = $this->db->query('SELECT `orders`.`idorders`, `orders`.`orderdate`, `orders`.`invoicenum`, `orders`.`amount`, `orders`.`isapproved`, `orders`.`ispaid`, `fillingstation`.`fillingstation_name`, `fillingstation`.`fillingstation_address`,`fillingstation`.`district`  FROM `orders`, `fillingstation` WHERE `fillingstation`.`idfillingstation` = `orders`.`fillingstation_idfillingstation` ORDER BY `orders`.`idorders` DESC');
        return $query->result();
    }

    public function showordersforbowserassign()
    {
        $query = $this->db->query('SELECT `orderitems`.`idorderitems`, `orders`.`invoicenum`, `orders`.`orderdate`, `orders`.`approvedby`, `fillingstation`.`fillingstation_name`, `fillingstation`.`fillingstation_address`, `fillingstation`.`district`, `orderitems`.`itemname`, `orderitems`.`qty`, `orderitems`.`orderstatus` FROM `orders`, `fillingstation`, `orderitems` WHERE `orders`.`isapproved` = 1 AND `fillingstation`.`isapproved` = 1 AND `orders`.`idorders` = `orderitems`.`orders_idorders` AND `fillingstation`.`idfillingstation` = `orders`.`fillingstation_idfillingstation`  
            ORDER BY `orders`.`orderdate` DESC');

        return $query->result();
    }

     public function showordersforgantryop()
    {
        $query = $this->db->query('SELECT `orderitems`.`idorderitems`, `orders`.`invoicenum`, `orders`.`orderdate`, `orders`.`approvedby`, `fillingstation`.`fillingstation_name`, `fillingstation`.`fillingstation_address`, `fillingstation`.`district`, `orderitems`.`itemname`, `orderitems`.`qty`, `orderitems`.`orderstatus` FROM `orders`, `fillingstation`, `orderitems` WHERE `orders`.`isapproved` = 1 AND `fillingstation`.`isapproved` = 1 AND `orders`.`idorders` = `orderitems`.`orders_idorders` AND `fillingstation`.`idfillingstation` = `orders`.`fillingstation_idfillingstation`  
            ORDER BY `orders`.`orderdate` DESC');

        return $query->result();
    }



    public function showCompletedOrders()
    {
        $query = $this->db->query('SELECT `orderitemid` FROM `bowserassign`');
        return $query->result();
    }

    public function showodersbyorderid($orderid)
    {
        $query = $this->db->query('SELECT `orders`.`invoicenum`, `fillingstation`.`fillingstation_name` FROM `orders`, `fillingstation` WHERE `orders`.`fillingstation_idfillingstation`= `fillingstation`.`idfillingstation` AND `orders`.`idorders` = '.$orderid.';');
        return $query->result();
    }

    public function insert_bowserassign($data) 
    {
        $this->db->insert('bowserassign', $data);
        return $this->db->insert_id();
    }

    public function loaditemsfrominv($idorders)
    {
        $query = $this->db->query('SELECT `orderitems`.`qty`, `orderitems`.`itemname`, `orderitems`.`idorderitems`, `orders`.`invoicenum`, `orderitems`.`itemamount`, `orderitems`.`idorderitems` FROM `orders`, `orderitems` WHERE `orders`.`idorders` = `orderitems`.`orders_idorders` AND `orderitems`.`idorderitems` = '.$idorders.';');

        return $query->result();
    }

    public function availablebousers($orderitemid)
    {
        $query = $this->db->query('SELECT `qty` FROM `orderitems` WHERE `idorderitems` = '.$orderitemid.';');

        $result = $query->result();

        $itemamountqty = $result[0]->qty;

        $query2 = $this->db->query(" 
            SELECT
                v.idvehicle,
                v.vehicle_number,
                vt.vehicle_capacity AS vehicle_capacity,
                vt.vehicle_capacity - v.tankfillamount AS remaining_capacity
            FROM
                vehicle v
            JOIN
                vehicle_type vt ON v.vehicle_type_idvehicle_type = vt.idvehicle_type
            WHERE
                v.vehicle_is_active = 1 AND
                vt.vehicle_capacity - v.tankfillamount >= ".$itemamountqty.";");

        return $query2->result();
    }

    public function availabledrivers()
    {
        $query = $this->db->query("SELECT `idemployee`, `epf` FROM `employee` WHERE `isavailable` = 1 AND `employeetype_idemployeetype` = 4");

        return $query->result();
    }

    public function getDriverEPF($employeeid)
    {
        $query = $this->db->query("SELECT `epf` FROM `employee` WHERE `idemployee` = ".$employeeid);

        return $query->result();
    }

    public function getVehicleNo($vehicleid)
    {
        $query = $this->db->query("SELECT `vehicle_number` FROM `vehicle` WHERE `idvehicle` = ".$vehicleid);

        return $query->result();
    }

    public function updateGantryFuel($orderitemid)
    {
        $result = $this->db->query("UPDATE `orderitems` SET `orderstatus`='4' WHERE `idorderitems` = ".$orderitemid);

        $query = $this->db->query("SELECT `orders`.`invoicenum` FROM `orderitems`, `orders` WHERE `orderitems`.`orders_idorders` = `orders`.`idorders` AND `orderitems`.`idorderitems` = ".$orderitemid);

        $invnum = $query->result();

        $result = $this->db->query("UPDATE `bowserassign` SET `allowgateexit`= 1 WHERE `invnum` = '".$invnum[0]->invoicenum."'");

        return $result;
    }

    public function orderapproval($idorders,$username) {
        $this->db->where('idorders', $idorders);
        $data = array(
            'isapproved' => 1,
            'approvedby' => $username,
        );
        $this->db->update('orders', $data);

        $this->db->where('orders_idorders', $idorders);
        $data2 = array(
            'orderstatus' => 2,
        );
        return $this->db->update('orderitems', $data2);
    }
	
	public function showodersdashboard($userid)
    {
        $query = $this->db->query('SELECT `orders`.`amount`, `fillingstation`.`fillingstation_name`, `users`.`idUsers`, `orders`.`orderdate`,`orderitems`.`itemname`, `orderitems`.`qty`, `orderitems`.`itemamount` FROM `orders`, `fillingstation`,`users`, `orderitems` WHERE `fillingstation`.`Users_idUsers` = `users`.`idUsers` AND `orders`.`idorders`= `orderitems`.`orders_idorders`AND`users`.`idUsers` = '.$userid.';');
        return $query->result();
    }
    
    public function showphonenumber($orderid)
    {
        $query = $this->db->query('SELECT `phonenumber` FROM `users`, `fillingstation`, `orders` WHERE `orders`.`fillingstation_idfillingstation` = `fillingstation`.`idfillingstation` AND
        `fillingstation`.`Users_idUsers` = `users`.`idUsers` AND
        `orders`.`idorders` = '.$orderid.';');
        return $query->result();
    }
    
    public function update_amount($invoiceNum, $amount) {
        // Assuming you have a table named 'orders' and a field named 'amount'
        $this->db->where('invoicenum', $invoiceNum);
        $this->db->update('orders', array('amount' => $amount));
    }
    
    public function getAllOrdersJoin()
    {
        $query = $this->db->query('SELECT * , `orders`.approvedby as orders_approvedby,
											  `fillingstation`.approvedby as filling_approvedby FROM `orders`
																			left join fillingstation on orders.fillingstation_idfillingstation = fillingstation.idfillingstation
																			left join users on users.idUsers = fillingstation.Users_idUsers
																			left join orderitems on orderitems.orders_idorders = orders.idorders 
																			where `orders`.`isapproved`=1
																			ORDER BY `orders`.idorders DESC');
        return $query->result();
    }
	
	 public function getPhoneNumFromInvoiceId($ID)
    {
        $query = $this->db->query("SELECT `users`.`phonenumber` FROM `orders`
									left join fillingstation on orders.fillingstation_idfillingstation = fillingstation.idfillingstation
									left join users on users.idUsers = fillingstation.Users_idUsers
									WHERE `orders`.`invoicenum`= '$ID'");
        return $query->result();
    }
    
    public function getGantryCompletePhone($orderitemid)
    {
        $query = $this->db->query("SELECT users.phonenumber FROM  orderitems
				left join orders on orderitems.orders_idorders = orders.idorders
				left join fillingstation on orders.fillingstation_idfillingstation = fillingstation.idfillingstation
				left join users on fillingstation.Users_idUsers = users.idUsers
				WHERE idorderitems = '$orderitemid'");
        return $query->result();
    }
	
	public function getorderdetails($idorders)
    {
        $query = $this->db->query("SELECT * FROM  orders
									left join orderitems on orders.idorders = orderitems.orders_idorders
									left join fillingstation on orders.fillingstation_idfillingstation = fillingstation.idfillingstation
									WHERE idorders = '$idorders'");
        return $query->result();
    }
    
    public function get_orders_by_date_range($start_date, $end_date) {
        $this->db->select('orderdate, amount');
        $this->db->where('orderdate >=', $start_date);
        $this->db->where('orderdate <=', $end_date);
        $query = $this->db->get('orders');

        return $query->result();
    }
	
	public function get_orders_data() 
	{
        // Modify this query based on your requirements
        $query = $this->db->query("SELECT DATE(orderdate) as order_date, SUM(amount) as total_amount 
                                   FROM orders 
								   WHERE amount IS NOT NULL AND isapproved=1
                                   GROUP BY DATE(orderdate)
								   ORDER BY DATE(orderdate) DESC");
        return $query->result();
    }
	
	public function get_order_items($start_date, $end_date, $item_names)
	{
        // Formulate the SQL query
        $query = $this->db->query("SELECT oi.itemname, SUM(oi.qty) as total_qty,DATE(o.orderdate) as order_date
													FROM orderitems oi
													JOIN orders o ON oi.orders_idorders = o.idorders
													WHERE DATE(o.orderdate) >= '$start_date'
													AND DATE(o.orderdate) <= '$end_date'
													AND oi.itemname IN ('$item_names')
													GROUP BY oi.itemname, DATE(o.orderdate) DESC;");
        return $query->result();
    }
    
    public function get_order_items_date($start_date, $end_date)
	{
        // Formulate the SQL query
        $query = $this->db->query("SELECT oi.itemname, SUM(oi.qty) as total_qty,DATE(o.orderdate) as order_date
													FROM orderitems oi
													JOIN orders o ON oi.orders_idorders = o.idorders
													WHERE DATE(o.orderdate) >= '$start_date'
													AND DATE(o.orderdate) <= '$end_date'
												    GROUP BY oi.itemname, DATE(o.orderdate) DESC;");
        return $query->result();
    }
    
    public function get_users_order_items($start_date, $end_date, $item_names,$userId,$fillingstation) 
    {
        
        $query = $this->db->query("SELECT	oi.itemname,
                                        		oi.itemamount,
                                                SUM(oi.qty) AS total_qty,
                                                DATE(o.orderdate) AS order_date,
                                                fi.fillingstation_name,
                                                o.invoicenum
                                                        FROM orderitems oi
                                                        JOIN orders o ON oi.orders_idorders = o.idorders
                                                        JOIN fillingstation fi ON o.fillingstation_idfillingstation = fi.idfillingstation
                                                        JOIN users u ON fi.Users_idUsers = u.idUsers
                                                        WHERE DATE(o.orderdate) >= '$start_date'
                                                        AND DATE(o.orderdate) <= '$end_date'
                                                        AND oi.itemname IN ('$item_names')
                                                        AND u.idUsers='$userId'
                                                        AND fi.fillingstation_name = '$fillingstation'
                                                        GROUP BY oi.itemname, fi.fillingstation_name, o.invoicenum, DATE(o.orderdate) DESC;");
        return $query->result();
    }
    
     public function get_users_order_items_date($start_date, $end_date,$userId,$fillingstation) 
    {
        
        $query = $this->db->query("SELECT	oi.itemname,
                                        		oi.itemamount,
                                                SUM(oi.qty) AS total_qty,
                                                DATE(o.orderdate) AS order_date,
                                                fi.fillingstation_name,
                                                o.invoicenum
                                                        FROM orderitems oi
                                                        JOIN orders o ON oi.orders_idorders = o.idorders
                                                        JOIN fillingstation fi ON o.fillingstation_idfillingstation = fi.idfillingstation
                                                        JOIN users u ON fi.Users_idUsers = u.idUsers
                                                        WHERE DATE(o.orderdate) >= '$start_date'
                                                        AND DATE(o.orderdate) <= '$end_date'
                                                        AND u.idUsers='$userId'
                                                        AND fi.fillingstation_name = '$fillingstation'
                                                        GROUP BY oi.itemname, fi.fillingstation_name, o.invoicenum, DATE(o.orderdate) DESC;");
        return $query->result();
    }
    
    public function get_order_items_invoice($userId, $invoiceNo)

	{
        // Formulate the SQL query
        $query = $this->db->query("SELECT * 
											FROM `orders`
											left join fillingstation on orders.fillingstation_idfillingstation = fillingstation.idfillingstation
											left join users on users.idUsers = fillingstation.Users_idUsers
											left join orderitems on orderitems.orders_idorders = orders.idorders 
											where users.idUsers='$userId' AND `orders`.`invoicenum`='$invoiceNo'
											ORDER BY `orders`.idorders DESC;");
        return $query->result();
    }
	
	public function get_invoice_number($idorderitems)

	{
        // Formulate the SQL query
        $query = $this->db->query("SELECT `orders`.`invoicenum` 
													FROM `orders`
													left join orderitems on orderitems.orders_idorders = orders.idorders 
													where orderitems.idorderitems='$idorderitems';");
        return $query->result();
    }
    
    	public function getbowser($idbowser)
	{
        // Formulate the SQL query
        $query = $this->db->query("SELECT * FROM `vehicle` 
                                                WHERE vehicle.idvehicle='$idbowser';");
        return $query->result();
    }
    
    public function getdriver($iddriver)
	{
        // Formulate the SQL query
        $query = $this->db->query("SELECT * FROM `employee`
                                                WHERE employee.idemployee = '$iddriver';");
        return $query->result();
    }
    
    public function getmaterialbyorderitemID($itemid)
	{
        // Formulate the SQL query
        $query = $this->db->query("SELECT * FROM `orderitems` 
                                                    left join bowserassign ON bowserassign.orderitemid=orderitems.idorderitems
                                                    where idorderitems='$itemid';");
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
    
    

}