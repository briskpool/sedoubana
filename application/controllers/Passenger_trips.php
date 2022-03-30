<?php

/**
 * 
 */
class Passenger_trips extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->check_isvalidated();
        $this->load->helper(array('form', 'url'));
        $this->load->model('passengerTrips');
    }
    private function check_isvalidated()
    {
        if (!$this->session->userdata('validated')) {
            redirect('/login');
        }
    }
    function index()
    {
        $data['title'] = "Passenger Trips";
        $uid = $this->session->userdata('uid');
        $data['data'] = $this->passengerTrips->getMyTrips($uid);
        $this->load->view('passenger/my_trips', $data);
    }
}
