<?php 
/**
 * 
 */
class Home extends CI_Controller
{
	function index(){
		$data = array(
			'title' => "Sedoubana - The Best Ride Share"
		);
		$this->load->view('index', $data);
	}
}
 ?>