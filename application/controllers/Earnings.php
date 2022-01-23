<?php 
/**
 * 
 */
class Earnings extends CI_Controller
{
	function index(){
		$data['title']="Earnings";
		$this->load->view('my_earnings',$data);
	}
}
 ?>