<?php 
/**
 * 
 */
class Passenger_trips extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('passengerTrips');

    }
	function index()
	{
		$data['title']="Passenger Trips";
        $uid=$this->session->userdata('uid');
        $data['data']= $this->passengerTrips->getMyTrips($uid);
		$this->load->view('passenger/my_trips', $data);
	
	}
	
}
 ?>