<?php 
/**
 * 
 */
class Passenger_support extends CI_Controller
{
	


    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('supportModel');
    }


    function index()
    {
        $data['title']="Passenger Support";
        $data['category'] = ['cat1','cat2','cat3'];
        $this->load->view('passenger/contact_support', $data);

    }
}
 ?>