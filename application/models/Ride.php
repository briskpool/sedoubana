<?php 
/**
 * 
 */
class Ride extends CI_Model
{

	function postRide($data){
		$this->db->insert('rides', $data);
	}
    function getRideById($id){
        $this->db->where('id',$id);
        $data=$this->db->get('rides');
        return $data;
    }
	function getRide($uid){
		$this->db->where('driver_id',$uid);
        $this->db->order_by('id', 'desc');
		$data=$this->db->get('rides');
		return $data;
	}
    function getAllCites(){
        $data=$this->db->get('cites');
        return $data;
    }
    function getDepCites(){
        $this->db->select('dep_city');
        $this->db->group_by('dep_city');
        $data=$this->db->get('rides');
        return $data;
    }
    function getDesCites(){
        $this->db->select('dest_city');
        $this->db->group_by('dest_city');
        $data=$this->db->get('rides');
        return $data;
    }

    function search_city($title){
        $this->db->like('name', $title , 'both');
        $this->db->order_by('name', 'ASC');
        $this->db->limit(10);
        return $this->db->get('cities')->result();
    }
}
 ?>