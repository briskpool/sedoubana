<?php

/**
 * 
 */
class Alerts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('alertsModel');
        $this->check_isvalidated();
    }

    private function check_isvalidated()
    {

        if (!$this->session->userdata('validated_driver') && !$this->session->userdata('validated')) {
            redirect('/login');
        }
    }

    function index()
    {
        $data['title'] = "Passenger Alerts";
        $uid = $this->session->userdata('uid');
        $data['data'] = $this->alertsModel->getAlerts($uid);
        $this->load->view('my_alerts', $data);
    }
}
