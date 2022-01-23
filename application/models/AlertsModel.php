<?php
/**
 * 
 */
class AlertsModel extends CI_Model
{

	function getAlerts($uid){
        $this->db->where('user_id', $uid);
        $this->db->order_by('id', "DESC");
        $query = $this->db->get('alerts');
        return $query;
	}

}
 ?>