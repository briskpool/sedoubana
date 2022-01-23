<?php 
/**
 * 
 */
class Career extends CI_Controller
{
	
	function index(){
		$data = array(
			'title' => "Career"
		);
		$this->load->view('career', $data);
	}
}
 ?>