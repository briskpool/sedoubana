<?php

class Cites extends CI_Model {

    /*
    return all Citess.
    created by your name
    created at 16-12-19.
    */
    public function getAll() {
        return $this->db->get('cites');
    }
    /*
    function for create Cites.
    return Cites inserted id.
    created by your name
    created at 16-12-19.
    */
    public function insert($data) {
        $this->db->insert('cites', $data);
        return $this->db->insert_id();
    }
    /*
    return Cites by id.
    created by your name
    created at 16-12-19.
    */
    public function getDataById($id) {
        $this->db->where('id', $id);
        return $this->db->get('cites')->row();
    }
    /*
    function for update Cites.
    return true.
    created by your name
    created at 16-12-19.
    */
    public function update($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('cites', $data);
        return true;
    }
    /*
    function for delete Cites.
    return true.
    created by your name
    created at 16-12-19.
    */
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('cites');
        return true;
    }
    /*
    function for change status of Cites.
    return activated of deactivated.
    created by your name
    created at 16-12-19.
    */
    public function changeStatus($id) {
        $table=$this->getDataById($id);
        if($table[0]->status==0)
        {
            $this->update($id,array('status' => '1'));
            return "Activated";
        }else{
            $this->update($id,array('status' => '0'));
            return "Deactivated";
        }
    }

}