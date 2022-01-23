<?php 
/**
 * 
 */
class Bookings extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('passengerTrips');
        $this->load->model('ride');

    }

	function index(){
		$data['title']="Bookings";
        $rideId = $this->input->get( 'id' );
        $data['rideInfo']=$this->ride->getRideById($rideId)->row();
        $data['rides']=$this->passengerTrips->getMyRides($rideId);
		$this->load->view('see_bookings',$data);
	}
}
 ?>