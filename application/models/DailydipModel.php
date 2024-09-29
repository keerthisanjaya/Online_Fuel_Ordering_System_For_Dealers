<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DailydipModel extends CI_Model {

    public function get_dailydip()
    {
        $this->db->where('isdelete', false);
        $query = $this->db->get('dailydip');
        return $query->result();
    }

    public function insert_dailydip($data) 
    {
        $this->db->insert('dailydip', $data);
        return $this->db->insert_id();
    }

    public function getwhere_dailydip($iddailydip)
    {
        $query = $this->db->get_where('dailydip', array('iddailydip' => $iddailydip));
        return $query->row();
    }

    public function update_dailydip($iddailydip, $data) {
        $this->db->where('iddailydip', $iddailydip);
        return $this->db->update('dailydip', $data);
    }

    public function delete_dailydip($iddailydip) 
    {
        $data = array(
            'isdelete' => 1,
        );
        $this->db->where('iddailydip', $iddailydip);
        return $this->db->update('dailydip', $data);
    }

    public function checklevel($userid)
    {
        $query = $this->db->query("SELECT `fillingstation`.`fillingstation_name`, `dailydip`.`checkdate`, `fillingstation`.`capacityofpetroltank`,
			`fillingstation`.`capacityofdieseltank`,
			`fillingstation`.`capacityofsuperpetrol`,
			`fillingstation`.`capacityofsuperdiesel`,
			(`fillingstation`.`capacityofpetroltank` - `dailydip`.`petrol`) AS 'remainpetrollevel', (`fillingstation`.`capacityofdieseltank` - `dailydip`.`diesel`) AS 'remaindiesellevel',
            (`fillingstation`.`capacityofsuperdiesel` - `dailydip`.`superdiesel`) AS 'remainsuperdiesellevel',
            (`fillingstation`.`capacityofsuperpetrol` - `dailydip`.`superpetrol`) AS 'remainsuperpetrollevel'
            FROM `fillingstation`, `dailydip` WHERE `fillingstation`.`idfillingstation` = `dailydip`.`fillingstation_idfillingstation` AND `fillingstation`.`Users_idUsers` = ".$userid.";");
        return $query->result();
    }
    
     public function dailydipbyUserID($userid)
    {
        $query = $this->db->query("SELECT * FROM `dailydip` 
                                                    left join fillingstation ON fillingstation.idfillingstation = dailydip.fillingstation_idfillingstation
                                                    left join users ON users.idUsers = fillingstation.Users_idUsers
                                                    where dailydip.isdelete =0 AND users.idUsers = '$userid';");
        return $query->result();
    }
    
}