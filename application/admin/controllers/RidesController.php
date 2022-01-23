<?php


class RidesController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
            redirect('auth/login');
        }
        $this->load->model('rides');
        $this->load->library('session');
    }
    /*
    function for manage Rides.
    return all Ridess.
    created by your name
    created at 25-11-19.
    */
    public function rides() {
        $data["title"] = 'Rides';
        $data["rides"] = $this->rides->getAll();
        $this->load->view('rides/rides', $data);
    }
    /*
    function for  add Rides get
    created by your name
    created at 25-11-19.
    */
    public function addRide() {
        $this->load->model('usersModel');
        $data['driver'] =$this->usersModel->getAll('driver');
        $this->load->view('rides/add-ride',$data);
    }
    /*
    function for add Rides post
    created by your name
    created at 25-11-19.
    */
    public function addRidesPost() {
        $data['driver_id'] = $this->input->post('driver_id');
        $data['dep_date'] = $this->input->post('dep_date');
        $data['dep_time'] = $this->input->post('dep_time');
        $data['dep_city'] = $this->input->post('dep_city');
        $data['dest_city'] = $this->input->post('dest_city');
        $data['pickup'] = $this->input->post('pickup');
        $data['dropoff'] = $this->input->post('dropoff');
        $data['seats'] = $this->input->post('seats');
        $data['price'] = $this->input->post('price');
        $data['details'] = $this->input->post('details');
        $this->rides->insert($data);
        $this->session->set_flashdata('success', 'Ride added Successfully');
        redirect('rides');
    }
    /*
    function for edit Rides get
    returns  Rides by id.
    created by your name
    created at 25-11-19.
    */
    public function editRide($rides_id) {
        $this->load->model('usersModel');
        $data['rides_id'] = $rides_id;
        $data['ride'] = $this->rides->getDataById($rides_id);
        $data['cites'] = $this->rides->getAllCites();
        $data['driver'] = $this->usersModel->getAll('driver');
        $this->load->view('rides/edit-ride', $data);
    }
    /*
    function for edit Rides post
    created by your name
    created at 25-11-19.
    */
    public function editRidesPost() {
        $rides_id = $this->input->post('rides_id');
        $rides = $this->rides->getDataById($rides_id);
        $data['driver_id'] = $this->input->post('driver_id');
        $data['dep_date'] = $this->input->post('dep_date');
        $data['dep_time'] = $this->input->post('dep_time');
        $data['dep_city'] = $this->input->post('dep_city');
        $data['dest_city'] = $this->input->post('dest_city');
        $data['pickup'] = $this->input->post('pickup');
        $data['dropoff'] = $this->input->post('dropoff');
        $data['seats'] = $this->input->post('seats');
        $data['price'] = $this->input->post('price');
        $data['details'] = $this->input->post('details');
        $edit = $this->rides->update($rides_id,$data);
        if ($edit) {
            $this->session->set_flashdata('success', 'Ride Updated');
            redirect('rides');
        }
    }
    /*
    function for view Rides get
    created by your name
    created at 25-11-19.
    */
    public function viewRide($rides_id) {
        $data['title'] = "View Rides";
        $data['rides_id'] = $rides_id;
        $data['ride'] = $this->rides->getDataById($rides_id);
        $data['driver'] = $this->rides->getDriverById($data['ride']->driver_id);
        $data['booking'] = $this->rides->getRideTrips($data['ride']->id);
        $this->load->view('rides/view-ride', $data);
    }
    /*
    function for delete Rides    created by your name
    created at 25-11-19.
    */
    public function deleteRide($rides_id) {
        $delete = $this->rides->delete($rides_id);
        $this->session->set_flashdata('success', 'ride deleted');
        redirect('rides');
    }
    /*
    function for activation and deactivation of Rides.
    created by your name
    created at 25-11-19.
    */
    public function changeStatusRides($rides_id) {
        $edit = $this->rides->changeStatus($rides_id);
        $this->session->set_flashdata('success', 'ride '.$edit.' Successfully');
        redirect('rides');
    }

}