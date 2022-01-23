<?php 
/**
 * 
 */
class UsersModel extends CI_Model
{

    /*
    return all Driverss.
    created by your name
    created at 24-11-19.
    */
    public function getAll($type) {
        $this->db->where('role', $type);
        return $this->db->get('users');
    }

    public function getdriverInfo($id) {
        $this->db->where('uid', $id);
        return $this->db->get('driver_info');
    }

    public function getAdmin($id){
        $query = $this->db->get_where('users',array('id'=>$id,'role'=>'admin'));
        return $query->row();
    }

    public function updateProfile($id,$data){
        $this->db->where(['users.id'=> $id,'users.role'=>'admin']);
        return $this->db->update('users', $data);
    }

    /*
    function for create Drivers.
    return Drivers inserted id.
    created by your name
    created at 24-11-19.
    */
    public function insert($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }
    /*
    return Drivers by id.
    created by your name
    created at 24-11-19.
    */
    public function getDataById($id, $type) {
        $this->db->where('id', $id);
        $this->db->where('role', $type);
        return $this->db->get('users')->row();
    }
    /*
    function for update Drivers.
    return true.
    created by your name
    created at 24-11-19.
    */
    public function update($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return true;
    }
    /*
    function for delete Drivers.
    return true.
    created by your name
    created at 24-11-19.
    */
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('users');
        return true;
    }
    /*
    function for change status of Drivers.
    return activated of deactivated.
    created by your name
    created at 24-11-19.
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
 ?>