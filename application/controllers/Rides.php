<?php 
/**
 * 
 */
class Rides extends CI_Controller
{
	public function __construct() { 
      parent::__construct(); 
      $this->load->helper(array('form', 'url')); 
        $this->check_isvalidated();
       
   	}

	 private function check_isvalidated(){

            if(! $this->session->userdata('validated_driver')){
                redirect('/');
           }
      }
	function index()
	{
		$data['title']='My Rides';
		$this->load->model('ride');
		$uid=$this->session->userdata('uid');
		$data['rides']=$this->ride->getRide($uid);
		$this->load->view('my_rides',$data);
	}

	function post()
	{
		$data['title']='My Rides';
		$this->load->model('ride');
		$data['rides']=$this->ride->getRide();
		$this->load->view('my_rides',$data);
	}

}
 ?>