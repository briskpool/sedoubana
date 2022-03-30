<?php 
/**
 * 
 */
class Passenger_support extends CI_Controller
{
	


    public function __construct()
    {
        parent::__construct();
        $this->check_isvalidated();
        $this->load->helper(array('form', 'url'));
        $this->load->model('supportModel');
    }

    private function check_isvalidated()
    {
        if (!$this->session->userdata('validated')) {
            redirect('/login');
        }
    }


    function index()
    {
        $data['title']="Passenger Support";
        $data['category'] = ['cat1','cat2','cat3'];
        $this->load->view('passenger/contact_support', $data);

    }
}
