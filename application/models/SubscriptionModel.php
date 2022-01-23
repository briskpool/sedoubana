<?php
/**
 *
 */
class SubscriptionModel extends CI_Model
{


    function insert($data){

        $data = $this->db->insert('subscription', $data);
//        dd($data->result());
        return $data;
    }


    function getUserById($id){
        $this->db->where('id', $id);
        $data = $this->db->get('users');
//        dd($data->result());
        return $data->row();
    }

    function getSetting(){
        $this->db->where('id', '1');
        $data = $this->db->get('settings');
        return $data->row();
    }

}
?>