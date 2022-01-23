<?php

class SettingsModel extends CI_Model {


    public function getAll() {
        $this->db->where('id','1');
        $data = $this->db->get('settings');
        return $data->row();
    }
    public function update($data) {
        $this->db->where('id', '1');
        $this->db->update('settings', $data);
        return true;
    }

}