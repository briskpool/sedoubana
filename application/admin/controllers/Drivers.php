<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drivers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
            redirect('auth/login');
        }
        $this->load->model('usersModel');
        $this->load->library('session');
    }

    public function index() {
        $data['title'] = 'Drivers';
        $data["data"] = $this->usersModel->getAll('driver');
        $this->load->view('drivers/drivers', $data);
    }

    public function addDrivers() {
        $this->load->view('drivers/add-drivers');
    }

    public function addDriversPost() {
        $data['fname'] = $this->input->post('fname');
        $data['lname'] = $this->input->post('lname');
        $data['gender'] = $this->input->post('gender');
        $data['dob'] = $this->input->post('dob');
        $data['country'] = $this->input->post('country');
        $data['city'] = $this->input->post('city');
        $data['province'] = $this->input->post('province');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['approved'] = $this->input->post('approved');
        $data['role'] = 'driver';
        if ($_FILES['photo']['name']) {
            $data['photo'] = $this->doUpload('photo');
        }
        $data['status'] = $this->input->post('status');
        $this->usersModel->insert($data);
        $this->session->set_flashdata('success', 'Drivers added Successfully');
        redirect('drivers');
    }

    public function editDrivers($drivers_id) {
        $data['title'] = 'Drivers';
        $data['drivers_id'] = $drivers_id;
        $data['drivers'] = $this->usersModel->getDataById($drivers_id,'driver');
        $this->load->view('drivers/edit-drivers', $data);
    }

    public function editDriversPost() {

        $drivers_id = $this->input->post('drivers_id');
        $drivers = $this->usersModel->getDataById($drivers_id, 'driver');
        $data['fname'] = $this->input->post('fname');
        $data['lname'] = $this->input->post('lname');
        $data['gender'] = $this->input->post('gender');
        $data['dob'] = $this->input->post('dob');
        $data['country'] = $this->input->post('country');
        $data['city'] = $this->input->post('city');
        $data['province'] = $this->input->post('province');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['status'] = $this->input->post('status');
        $data['approved'] = $this->input->post('approved');

        $edit = $this->usersModel->update($drivers_id,$data);
        if ($edit) {
            $this->session->set_flashdata('success', 'Drivers Updated');
            redirect('drivers');
        }
    }

    public function viewDrivers($drivers_id) {
        $data['title'] = 'Drivers';
        $data['drivers_id'] = $drivers_id;
        $data['drivers'] = $this->usersModel->getDataById($drivers_id,'driver');
        $data["driverInfo"] = $this->usersModel->getdriverInfo($drivers_id)->row();
        $data['driver_sub'] = $this->usersModel->getSubscriptionById($drivers_id);
        $this->load->view('drivers/view-drivers', $data);
    }

    public function viewDriverSubscription($drivers_id) {
        $data['title'] = 'Driver Subscription';
        $data['drivers_id'] = $drivers_id;
        $data['drivers'] = $this->usersModel->getDataById($drivers_id,'driver');
        $data['driver_sub'] = $this->usersModel->getSubscriptionById($drivers_id);
        $this->load->view('drivers/driver_subscription', $data);
    }

    public function deleteDrivers($drivers_id) {
        $delete = $this->usersModel->delete($drivers_id);
        $this->session->set_flashdata('success', 'drivers deleted');
        redirect('drivers');
    }

    public function changeStatusDrivers($drivers_id) {
        $edit = $this->usersModel->changeStatus($drivers_id);
        $this->session->set_flashdata('success', 'drivers '.$edit.' Successfully');
        redirect('drivers');
    }

    function doUpload($file) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload($file))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            return $data['upload_data']['file_name'];
        }
    }

}
