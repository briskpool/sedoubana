<?php

/**
 * 
 */
class Passenger_alerts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('AlertsModel');
        $this->check_isvalidated();
    }
    private function check_isvalidated()
    {
        if (!$this->session->userdata('validated')) {
            redirect('/login');
        }
    }
    function index()
    {
        $data['title'] = "Passenger AlertsModel";
        $uid = $this->session->userdata('uid');
        $data['data'] = $this->alerts->getAlerts($uid);
        $this->load->view('passenger/my_alerts', $data);
    }
}
