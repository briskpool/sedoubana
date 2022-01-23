<?php 
/**
 * 
 */
class Driver extends CI_Controller
{
	
	function index(){
		$data = array(
			'title' => "Driver"
		);
		$this->load->view('drivers', $data);
	}
	
}
 ?>