<?php

/**
 * 
 */
class Postride extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->check_isvalidated();
	}

	private function check_isvalidated()
	{
		if (!$this->session->userdata('validated_driver')) {
			redirect('/');
		} else {
			$uid = $this->session->userdata('uid');
			// $subscription_status = subscriptionStatus($uid);
			$driver_status = getDriverStatus($uid, 'driver');
			if ($driver_status != '1') {
				redirect('profile');
				// 	if (!$subscription_status) {
				// 		redirect('stripe');
				// 	}
				// } else {
			}
		}
	}
	function index()
	{
		$data['title'] = "Post Ride";
		$this->load->model('ride');
		$data['cites'] = $this->ride->getAllCites();
		$this->load->view('post_ride', $data);
	}
	function upload_ride()
	{
		$uid = $this->session->userdata('uid');
		$data = array(
			'driver_id' => $uid,
			'dep_date' => $this->input->post('dep_date'),
			'dep_time' => $this->input->post('dep_time'),
			'dep_time' => $this->input->post('dep_time'),
			'dep_city' => $this->input->post('dep_city'),
			'dest_city' => $this->input->post('dest_city'),
			'pickup' => $this->input->post('pickup'),
			'dropoff' => $this->input->post('dropoff'),
			'seats' => $this->input->post('seats'),
			'price' => $this->input->post('price'),
			'details' => $this->input->post('details')
		);
		$this->load->model('ride');
		$this->ride->postRide($data);
		redirect(base_url() . 'rides');
	}
}
