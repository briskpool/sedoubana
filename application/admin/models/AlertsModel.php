<?php

class AlertsModel extends CI_Model {


    public function getAll() {

        $this->db->select('a.*, (select COUNT(DISTINCT user_id) from alerts where alert_id = a.alert_id) as total_users');
        $this->db->from('alerts as a');
        $this->db->group_by('a.alert_id');
        $this->db->order_by('a.id', "DESC");
        $data = $this->db->get();
       
        return $data;
    }

    public function getAllUers() {

        $this->db->select("id, email");
        $this->db->where("role IN ('driver','Passenger')");
        $data = $this->db->get('users');
        return $data;
    }

    public function getAllUersByRole($role) {

        $this->db->select("id, email");
        $this->db->where("role",$role);
        $data = $this->db->get('users');
        return $data;
    }
    public function getUersById($id) {

        $this->db->where('id',$id);
        $data = $this->db->get('users');
        return $data;
    }
    public function getById($id) {

        $this->db->where('id',$id);
        $data = $this->db->get('alerts');
        return $data->row();
    }
    public function getAllByAlertId($alertId) {

        $this->db->select(" a.*, CONCAT(u.fname,' ',u.lname) as name,u.email, u.photo");
        $this->db->from('alerts as a');
        $this->db->join('users as u', ' u.id = a.user_id','left');
        $this->db->group_by('a.user_id');
        $this->db->where('a.alert_id',$alertId);
        $data = $this->db->get();
        return $data;
    }



    public function update($data) {
        $this->db->where('id', '1');
        $this->db->update('settings', $data);
        return true;
    }

    public function insert($data) {
        $this->db->insert('alerts', $data);
        return true;
    }


}