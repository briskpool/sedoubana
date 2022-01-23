<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passengers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
            redirect('auth/login');
        }
        $this->load->model('usersModel');
        $this->load->library('session');
    }

    public function index() {
        $data['title'] = 'Passengers';
        $data["data"] = $this->usersModel->getAll('passenger');
        $this->load->view('passengers/passengers', $data);
    }

    public function addPassenger() {
        $this->load->view('passengers/add-passenger');
    }

    public function addPassengerPost() {
        $data['fname'] = $this->input->post('fname');
        $data['lname'] = $this->input->post('lname');
        $data['gender'] = $this->input->post('gender');
        $data['dob'] = $this->input->post('dob');
        $data['country'] = $this->input->post('country');
        $data['city'] = $this->input->post('city');
        $data['province'] = $this->input->post('province');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['role'] = 'passenger';
        if ($_FILES['photo']['name']) {
            $data['photo'] = $this->doUpload('photo');
        }
        $data['status'] = $this->input->post('status');
        $this->usersModel->insert($data);
        $this->session->set_flashdata('success', 'Passenger added Successfully');
        redirect('passengers');
    }

    public function editPassenger($passenger_id) {
        $data['title'] = 'Passengers';
        $data['passenger_id'] = $passenger_id;
        $data['passenger'] = $this->usersModel->getDataById($passenger_id, 'passenger');
        $this->load->view('passengers/edit-passenger', $data);
    }

    public function editPassengerPost() {

        $passenger_id = $this->input->post('passenger_id');
        $drivers = $this->usersModel->getDataById($passenger_id,'passenger');
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

        $edit = $this->usersModel->update($passenger_id,$data);
        if ($edit) {
            $this->session->set_flashdata('success', 'Passenger Updated');
            redirect('passengers');
        }
    }

    public function viewPassenger($passenger_id) {
        $data['title'] = 'Passengers';
        $data['passenger_id'] = $passenger_id;
        $data['passenger'] = $this->usersModel->getDataById($passenger_id,'passenger');
        $this->load->view('passengers/view-passenger', $data);
    }

    public function deletePassenger($drivers_id) {
        $delete = $this->usersModel->delete($drivers_id);
        $this->session->set_flashdata('success', 'Passenger deleted');
        redirect('passengers');
    }

    public function changeStatusPassenger($drivers_id) {
        $edit = $this->usersModel->changeStatus($drivers_id);
        $this->session->set_flashdata('success', 'Passenger '.$edit.' Successfully');
        redirect('passengers');
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
