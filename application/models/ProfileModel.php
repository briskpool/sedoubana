<?php

/**
 *
 */
class ProfileModel extends CI_Model
{
    function get_passenger($email)
    {
        $this->db->where(['email' => $email, 'role' => 'passenger']);
        $query = $this->db->get('users');
        return $query;
    }

    function get_driver($email)
    {
        $this->db->where(['email' => $email, 'role' => 'driver']);
        $query = $this->db->get('users');
        return $query;
    }


    function additional($uid, $data, $name, $email)
    {
        if ($name == 'profile') {
            $this->db->where(['email' => $email]);
            $this->db->update('users', $data);
        }
        if ($name != 'profile') {
            $this->db->where('uid', $uid);
            $query = $this->db->get('driver_info');
            if ($query->num_rows() > 0) {
                $this->db->where('uid', $uid);
                $this->db->update('driver_info', $data);
            } else {
                $this->db->insert('driver_info', $data);
            }
        }
    }

    function vehicle_info($uid, $data, $email)
    {


        $this->db->where('uid', $uid);
        $query = $this->db->get('driver_info');
        if ($query->num_rows() > 0) {
            $this->db->where('uid', $uid);
            $this->db->update('driver_info', $data);
        } else {
            $this->db->insert('driver_info', $data);
        }
    }
    function subscription($uid)
    {
        $now = strtotime(date('Y-m-d H:i:s'));
        $this->db->where('uid', $uid);
        $this->db->where('subscription_end  >=', $now);
        $this->db->where('subscription_start  <=', $now);
        $data = $this->db->get('subscription');
        return $data->row();
    }
    function driversInfo($uid, $data, $email)
    {
        $this->db->where(['id' => $uid, 'role' => 'driver']);
        $this->db->update('users', $data);
    }

    function passengerInfo($uid, $data, $email)
    {
        $this->db->where(['id' => $uid, 'role' => 'passenger']);
        $this->db->update('users', $data);
    }

    function get_driver_info($uid)
    {
        $this->db->where('uid', $uid);
        $query = $this->db->get('driver_info');
        return $query;
    }
}
