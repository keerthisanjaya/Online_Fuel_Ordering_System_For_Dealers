<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderitemsModel extends CI_Model {

    public function get_orderitems()
    {
        $this->db->where('isdelete', false);
        $query = $this->db->get('orderitems');
        return $query->result();
    }

    public function get_orderitemsfordealer($userid)
    {
        $query = $this->db->query('SELECT `orderitems`.`idorderitems`,`fillingstation`.`fillingstation_name`, `orderitems`.`itemname`, `orderitems`.`qty`, `orderitems`.`itemamount`, `orderitems`.`orderstatus`,`orders`.`invoicenum` FROM
                                        `orderitems`, `fillingstation`, `orders` WHERE `orders`.`fillingstation_idfillingstation` = `fillingstation`.`idfillingstation` AND `orderitems`.`orders_idorders` = `orders`.`idorders` AND
                                        `fillingstation`.`Users_idUsers` = '.$userid.'   ORDER BY `orderitems`.`idorderitems` DESC;');
        return $query->result();
    }

    public function insert_orderitems($data) 
    {
        $this->db->insert('orderitems', $data);
        return $this->db->insert_id();
    }

    public function getwhere_orderitems($idorderitems)
    {
        $query = $this->db->get_where('orderitems', array('idorderitems' => $idorderitems));
        return $query->row();
    }

    public function update_orderitems($idorderitems, $data) {
        $this->db->where('idorderitems', $idorderitems);
        return $this->db->update('orderitems', $data);
    }

    public function delete_orderitems($idorderitems) {
        $data = array(
            'isdelete' => 1,
        );

        $this->db->where('idorderitems', $idorderitems);
        return $this->db->update('orderitems', $data);
    }

}