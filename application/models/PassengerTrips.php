<?php

/**
 * 
 */
class PassengerTrips extends CI_Model
{

    function postTrip($data)
    {
        $status =  $this->db->insert('passenger_trips', $data);
        if ($status) {
            $id = $this->db->insert_id();
            // $test = $this->db->query('select * from passenger_trips where id=' . $id);

            $data = $this->db->select('p.*, r.*, i.*')
                ->from('passenger_trips as p')
                ->join('rides as r', ' r.id = p.ride_id')
                ->join('driver_info as i', ' r.driver_id = i.uid')
                ->where('p.id =', $id)
                ->get();
            // $data = $this->db->get();
            dd($data->result());
            return ["status" => $status, "data" => $data];
        } else {
            return ["status" => false, "error" => "Error In inserting record"];
        }
    }
    function getTrips($uid)
    {
        $this->db->where('uid', $uid);
        $data = $this->db->get('passenger_trips');
        return $data;
    }

    function getMyTrips($uid)
    {
        $this->db->select('p.*, r.*, i.*');
        $this->db->from('passenger_trips as p');
        $this->db->join('rides as r', ' r.id = p.ride_id');
        $this->db->join('driver_info as i', ' r.driver_id = i.uid', 'left');
        $this->db->group_by('p.ride_id');
        $this->db->where('p.uid =', $uid);
        $this->db->order_by('p.id', 'desc');
        $data = $this->db->get();
        return $data;
    }

    function getMyRides($rideId)
    {
        $this->db->select('t.*, u.*');
        $this->db->from('passenger_trips as t');
        $this->db->join('users as u', ' t.uid = u.id');
        $this->db->where('t.ride_id =', $rideId);
        $data = $this->db->get();
        return $data;
    }

    function search($data)
    {
        $this->db->where($data);
        $getGata = $this->db->get('passenger_trips');
        $id = $getGata->row()->id;
        $this->db->select('p.*, r.*, i.*');
        $this->db->from('passenger_trips as p');
        $this->db->join('rides as r', ' r.id = p.ride_id');
        $this->db->join('driver_info as i', ' r.driver_id = i.uid');
        $this->db->where('p.id =', $id);

        $data = $this->db->get();
        return $data;
    }
}
