<?php

class Rides extends CI_Model
{

    /*
    return all Ridess.
    created by your name
    created at 25-11-19.
    */
    public function getAll()
    {
        $this->db->select("r.*, CONCAT(u.fname, ' ', u.lname) as dirver_name");
        $this->db->from('rides as r');
        $this->db->join('users as u', ' r.driver_id = u.id');
        $this->db->where('u.role =', 'driver');
        $data = $this->db->get();
        return $data;
    }

    /*
    function for create Rides.
    return Rides inserted id.
    created by your name
    created at 25-11-19.
    */
    public function insert($data)
    {
        $this->db->insert('rides', $data);
        return $this->db->insert_id();
    }

    function getCityById($id)
    {
        $this->db->where('id', $id);
        $data = $this->db->get('cites');
        if ($data->num_rows() > 0) {
            return $data->row()->name;
        } else {
            return '';
        }

    }

    function getAllCites()
    {
        $data = $this->db->get('cites');
        return $data;
    }

    /*
    return Rides by id.
    created by your name
    created at 25-11-19.
    */
    public function getDataById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('rides')->row();
    }

    public function getDriverById($id)
    {
        $this->db->where(['id' => $id, 'role' => 'driver']);
        return $this->db->get('users')->row();
    }


    function getRideTrips($rideid)
    {
        $this->db->select('p.*, u.*');
        $this->db->from('passenger_trips as p');
        $this->db->join('users as u', ' u.id = p.uid');
        $this->db->where('p.ride_id =', $rideid);
        $data = $this->db->get();
        return $data;
    }

    /*
    function for update Rides.
    return true.
    created by your name
    created at 25-11-19.
    */
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('rides', $data);
        return true;
    }

    /*
    function for delete Rides.
    return true.
    created by your name
    created at 25-11-19.
    */
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('rides');
        return true;
    }

    /*
    function for change status of Rides.
    return activated of deactivated.
    created by your name
    created at 25-11-19.
    */
    public function changeStatus($id)
    {
        $table = $this->getDataById($id);
        if ($table[0]->status == 0) {
            $this->update($id, array('status' => '1'));
            return "Activated";
        } else {
            $this->update($id, array('status' => '0'));
            return "Deactivated";
        }
    }

}