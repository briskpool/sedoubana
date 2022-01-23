<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Auth model class
 */
class AuthModel extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function login($data) {
        $password=md5($data['password']);
       $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $password . "'";
        $this->db->select(' `id`, `fname`, `lname`, `gender`, `email`, `phone`, `photo`, `role`, `status`');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->where('role', 'admin');
        //$this->db->where('status', 'admin');
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return ['status'=>true,'data'=>$query->row()];
        } else {
            return false;
        }
    }

    public function email_check($email)
    {
            $this->db->where('email',$email);
            $query=$this->db->get('users');
            if ($query->num_rows()>0) {
                return ['status'=>true, 'user'=>$query->row()];
            }
            else{
                return ['status'=>false];
            }
    }


    public function insertToken($user_id)
    {
        $token = substr(sha1(rand()), 0, 30);
        $data = array(
            'token'=> $token,
        );
        $this->db->where('id',$user_id);
        $status = $this->db->update('users',$data);
        return $token;

    }


    public function getUserByToken($token)
    {
        $this->db->where('token',$token);
        $query=$this->db->get('users');
        if ($query->num_rows()>0) {
            return ['status'=>true, 'user'=>$query->row()];
        }
        else{
            return ['status'=>false];
        }
    }

    public function change_password($data,$user_id)
    {

            $this->db->where('id',$user_id);
            $this->db->update('users',$data);

    }
}
?>