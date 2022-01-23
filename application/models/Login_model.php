<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* Author: Jorge Torres
 * Description: Auth model class
 */

class login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function getUserById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }
    public function updateCodeById($id, $code)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('users', ['code' => $code]);
        return $query;
    }
    public function validate($email, $password, $user)
    {

        $password = md5($password);
        // Prep the query
        $this->db->where('email', $email);
        $this->db->where('password', $password);

        if ($user == 'passenger') {
            $this->db->where('role', 'passenger');
        } else if ($user == 'driver') {
            $this->db->where('role', 'driver');
        }
        $query = $this->db->get('users');
        if ($user == 'passenger') {
            // Let's check if there are any results
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    # code...
                    if ($row->status == '0') {
                        return ['status' => '5'];
                    } elseif ($row->activation == '0') {
                        return ['status' => '9', 'user_id' => $row->id];
                    } else {
                        $data = array(
                            'validated' => true,
                            'uid' => $row->id,
                            'fullname' => $row->fname . ' ' . $row->lname,
                            'email' => $row->email,
                            'role' => $row->role
                        );
                        $this->session->set_userdata($data);
                        return ['status' => '10'];
                    }
                }
            } else {
                return ['status' => '0'];;
            }
        } else if ($user == 'driver') {
            // Let's check if there are any results
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    # code...
                    if ($row->status == '0') {
                        return ['status' => '5'];
                    } elseif ($row->activation == '0') {
                        return ['status' => '9', 'user_id' => $row->id];
                    } else {
                        $data = array(
                            'validated_driver' => true,
                            'uid' => $row->id,
                            'fullname' => $row->fname . ' ' . $row->lname,
                            'email' => $row->email,
                            'role' => $row->role
                        );
                        $this->session->set_userdata($data);
                        return ['status' => '10'];
                    }
                }
            } else {
                return ['status' => '0'];
            }
        }
    }

    function social_validate($email, $user)
    {
        $this->db->where('email', $email);
        if ($user == 'passenger') {
            $this->db->where('role', 'passenger');
        } else if ($user == 'driver') {
            $this->db->where('role', 'driver');
        }
        $query = $this->db->get('users');

        if ($user == 'passenger') {
            // Let's check if there are any results
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    # code...

                    $data = array(
                        'validated' => true,
                        'uid' => $row->id,
                        'fullname' => $row->fname . ' ' . $row->lname,
                        'email' => $row->email,
                        'role' => $row->role,
                    );
                    $this->session->set_userdata($data);
                    return true;
                }
            } else {
                return false;
            }
        } else if ($user == 'driver') {
            // Let's check if there are any results
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    # code...

                    $data = array(
                        'validated_driver' => true,
                        'uid' => $row->id,
                        'fullname' => $row->fname . ' ' . $row->lname,
                        'email' => $row->email,
                        'role' => $row->role

                    );
                    $this->session->set_userdata($data);
                    return true;
                }
            } else {
                return false;
            }
        }
    }

    public function email_check($email, $user)
    {
        if ($user == 'passenger') {


            $this->db->where('email', $email);
            $query = $this->db->get('users');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else if ($user == 'driver') {
            $this->db->where('email', $email);
            $query = $this->db->get('users');
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function change_password($data, $email, $user)
    {

        if ($user == 'driver') {
            $this->db->where(['email' => $email, 'role' => 'driver']);
            $this->db->update('users', $data);
        } else if ($user == 'passenger') {
            $this->db->where(['email' => $email, 'role' => 'passenger']);
            $this->db->update('users', $data);
        }
    }
}
