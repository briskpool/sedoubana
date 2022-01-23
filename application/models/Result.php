<?php 
/**
 * 
 */
class Result extends CI_Model
{
	function getResult($getData){
	    $datRange = $getData['date-range'];
	    $dataArray = explode(' to ', $datRange);
        if(empty($dataArray[1])){
            $dataArray[1] = date("Y-m-d", strtotime($dataArray[0]." + 1 day"));
        }
//		$this->db->like('dep_city',$data['pickup']);
//		$data=$this->db->get('rides');
        $query = $this->db->query("SELECT * FROM `rides` WHERE `dep_date` BETWEEN '".$dataArray[0]."' AND '".$dataArray[1]."' AND `dep_city` = '".$getData['pickup']."' AND `dest_city` = '".$getData['drop']."' ORDER BY `dep_date` DESC");
        $totalRec = $query->result_id->num_rows;

        // dd($totalRec);
        
        return $query;
	}
	function getRideDetail($getData){

	    $rideId = $getData['rideId'];
        $data=$this->db->select('r.*, i.*')
        ->from('rides as r')
        ->join('driver_info as i', ' r.driver_id = i.uid', 'left')
        ->where('r.id', $rideId)
        ->get();
        // dd($data->result());
        return $data;
	}
	function getTrip($getData){

	    $rideId = $getData['rideId'];
        $data=$this->db->select('pt.created_at')
        ->from('passenger_trips as pt')
        ->where('pt.ride_id', $rideId)
        ->get();
        // dd($data->result());
        return $data;
	}

    function getUserDetail($id){

        $this->db->where('id',$id);
        $data = $this->db->get('users');
        return $data->row();
    }
    function getCityById($id){

        $this->db->where('id',$id);
        $data = $this->db->get('cites');
        return $data->row();
    }
    function getDriverById($id){

        $this->db->where('id',$id);
        $data = $this->db->get('users');
        return $data->row();
    }

}
 ?>