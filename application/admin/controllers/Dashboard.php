<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!isset($this->session->userdata['logged_in'])) {
            redirect('auth/login');
        }
        $this->load->helper('form');
        $this->load->model('usersModel');
    }

	public function index() {

		$data = array(
			'title' => "Dashboard"
		);
        $data['drives'] = $this->usersModel->getAll('driver');
        $data['activeDrives'] = $this->usersModel->getAllActive('driver');
        $data['pandingDrives'] = $this->usersModel->getAllPanding('driver');
        $data['approvedDrives'] = $this->usersModel->getAllApproved('driver');

        $data['passengers'] = $this->usersModel->getAll('passenger');
        $data['activePassenger'] = $this->usersModel->getAllActive('passenger');
        $data['inactivePassenger'] = $this->usersModel->getAllinactive('passenger');

        $data['rides'] = $this->usersModel->getAllRides();
        $data['activeRides'] = $this->usersModel->getAllRidesByStatys('1');
        $data['inactiveRides'] = $this->usersModel->getAllRidesByStatys('0');

        $data['unApprovedDrives'] = $this->usersModel->getUnApprovedDrivers();
		$this->load->view('index', $data);
	}

}
