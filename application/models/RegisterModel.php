<?php 
/**
 * 
 */
class RegisterModel extends CI_Model
{
	function reg_passenger($data, $email, $role)
	{
		$this->db->where(['email'=>$email,'role'=>$role]);
		$query = $this->db->get('users');
		 if($query->num_rows() == 0)  
           {  
           	$this->db->insert('users', $data);
           	return $this->db->insert_id();
           }
          else{
          	return false;
          }
		
	}
	function reg_driver($data, $email,$role)
	{
		$this->db->where(['email'=>$email,'role'=>$role]);
		$query = $this->db->get('users');
		 if($query->num_rows() == 0)  
           {  
           	$this->db->insert('users', $data);
           	return $this->db->insert_id();
           }
          else{
          	return false;
          }
	}
	public function getDriver($id){
		$query = $this->db->get_where('users',array('id'=>$id,'role'=>'driver'));
		return $query->row_array();
	}
	public function getPassenger($id){
		$query = $this->db->get_where('users',array('id'=>$id,'role'=>'passenger'));
		return $query->row_array();
	}
 
	public function activate_driver($data, $id){
		$this->db->where(['users.id'=> $id,'users.role'=>'driver']);
		return $this->db->update('users', $data);
	}
	public function activate_passenger($data, $id){
		$this->db->where(['users.id'=> $id,'users.role'=>'passenger']);
		return $this->db->update('users', $data);
	}
	
}
 ?>