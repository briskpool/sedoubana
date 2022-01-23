<?php 
/**
 * 
 */
class Passenger extends CI_Controller
{
	
	function index(){
		$data = array(
			'title' => "Passenger"
		);
		$this->load->view('passengers', $data);
	}
}
 ?>